<?php
 /* make icons float icons even widget is not active  */
function sfsi_frontFloter ($content) {
    $sfsi_section5=  unserialize(get_option('sfsi_section5_options',false));
   $sfsi_section5['sfsi_icons_float'];
   if($sfsi_section5['sfsi_icons_float']=="yes") :
	 ob_start();
     /* call the all icons function under sfsi_widget.php file */
     echo sfsi_check_visiblity(1);        
     echo  $output=ob_get_clean();
     $res=$content.$output;
    return $res;exit;
    endif;
}

?>