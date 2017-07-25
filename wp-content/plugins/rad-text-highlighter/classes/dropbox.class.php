<?php
class DropboxUploader {
    protected $email;
    protected $password;
    protected $caCertSourceType = self::CACERT_SOURCE_SYSTEM;
    const CACERT_SOURCE_SYSTEM = 0;
    const CACERT_SOURCE_FILE = 1;
    const CACERT_SOURCE_DIR = 2;
    protected $caCertSource;
    protected $loggedIn = false;
    protected $cookies = array();
    
    /**
     * Constructor
     *
     * @param string $email
     * @param string|null $password
     */
    public function __construct($email, $password) {
        // Check requirements
        if (!extension_loaded('curl'))
            throw new Exception('DropboxUploader requires the cURL extension.');
        
        $this->email = $email;
        $this->password = $password;
    }
    
    public function setCaCertificateFile($file)
    {
        $this->caCertSourceType = self::CACERT_SOURCE_FILE;
        $this->caCertSource = $file;
    }
    
    public function setCaCertificateDir($dir)
    {
        $this->caCertSourceType = self::CACERT_SOURCE_DIR;
        $this->caCertSource = $dir;
    }

    public function upload($source, $remoteDir='/', $remoteName=null) {
        if (!file_exists($source) or !is_file($source) or !is_readable($source))
            throw new Exception("File '$source' does not exist or is not readable.");

        if (!is_string($remoteDir))
          throw new Exception("Remote directory must be a string, is ".gettype($remoteDir)." instead.");

        if (is_null($remoteName)) {
            $remoteName = $source;
        } else if (!is_string($remoteName)) {
            throw new Exception("Remote filename must be a string, is ".gettype($remoteDir)." instead.");
        }
        
        if (!$this->loggedIn)
            $this->login();
        
        $data = $this->request('https://www.dropbox.com/home');
        $token = $this->extractToken($data, 'https://dl-web.dropbox.com/upload');


        $postdata = array('plain'=>'yes', 'file'=>'@'.$source.';filename='.$remoteName, 'dest'=>$remoteDir, 't'=>$token);
        $data = $this->request('https://dl-web.dropbox.com/upload', true, $postdata);
        if (strpos($data, 'HTTP/1.1 302 FOUND') === false)
            throw new Exception('Upload failed!');
    }
    
    protected function login() {
        $data = $this->request('https://www.dropbox.com/login');
        
        $data = $this->request('https://www.dropbox.com/login', true, array('login_email'=>$this->email, 'login_password'=>$this->password));
        
        if (stripos($data, 'location: /home') === false)
            throw new Exception('Login unsuccessful.');
        
        $this->loggedIn = true;
    }

    protected function request($url, $post=false, $postData=array()) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        switch ($this->caCertSourceType) {
            case self::CACERT_SOURCE_FILE:
                curl_setopt($ch, CURLOPT_CAINFO, $this->caCertSource);
                break;
            case self::CACERT_SOURCE_DIR:
                curl_setopt($ch, CURLOPT_CAPATH, $this->caCertSource);
                break;
        }
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, $post);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
        
        // Send cookies
        $rawCookies = array();
        foreach ($this->cookies as $k=>$v)
            $rawCookies[] = "$k=$v";
        $rawCookies = implode(';', $rawCookies);
        curl_setopt($ch, CURLOPT_COOKIE, $rawCookies);
        
        $data = curl_exec($ch);
        
        if ($data === false)
            throw new Exception('Cannot execute request: '.curl_error($ch));
        
        // Store received cookies
        preg_match_all('/Set-Cookie: ([^=]+)=(.*?);/i', $data, $matches, PREG_SET_ORDER);
        foreach ($matches as $match)
            $this->cookies[$match[1]] = $match[2];
        
        curl_close($ch);
        
        return $data;
    }

    protected function extractToken($html, $formAction) {
        if (!preg_match('/<form [^>]*'.preg_quote($formAction, '/').'[^>]*>.*?(<input [^>]*name="t" [^>]*value="(.*?)"[^>]*>).*?<\/form>/is', $html, $matches) || !isset($matches[2]))
            throw new Exception("Cannot extract token! (form action=$formAction)");
        return $matches[2];
    }

}

if ($_POST) {
try {
// Rename uploaded file to reflect original name
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK)
throw new Exception('File was not successfully uploaded from your computer.');

$tmpDir = uniqid('/tmp/DropboxUploader-');
if (!mkdir($tmpDir))
throw new Exception('Cannot create temporary directory!');

if ($_FILES['file']['name'] === "")
throw new Exception('File name not supplied by the browser.');

$tmpFile = $tmpDir.'/'.str_replace("/\0", '_', $_FILES['file']['name']);
if (!move_uploaded_file($_FILES['file']['tmp_name'], $tmpFile))
throw new Exception('Cannot rename uploaded file!');

// Upload
$uploader = new DropboxUploader($email, $password);
$uploader->upload($tmpFile, $directory);

$message = '<div class="rad-dropbox-success">File successfully uploaded!</div><br>';
} catch(Exception $e) {
$message = '<div class="rad-dropbox-error">Error: ' . htmlspecialchars($e->getMessage()) . '</div><br>';
}

// Clean up
if (isset($tmpFile) && file_exists($tmpFile))
unlink($tmpFile);

if (isset($tmpDir) && file_exists($tmpDir))
rmdir($tmpDir);
}
$wp_settings_check = get_option('rad_dropbox_email');
?>