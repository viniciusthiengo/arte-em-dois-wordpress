<?php
$text = $_POST["rad_highlighter_text"];
$background = $_POST["rad_highlighter_bg"]; 
$padding = $_POST["rad_highlighter_padding"]; 
$bold = $_POST["rad_highlighter_bold"]; 
$italic = $_POST["rad_highlighter_italic"]; 
if ($_POST) {
update_option('rad_highlighter_text', $text, '', 'yes');
update_option('rad_highlighter_bg', $background, '', 'yes');
update_option('rad_highlighter_padding', $padding, '', 'yes');
update_option('rad_highlighter_bold', $bold, '', 'yes');
update_option('rad_highlighter_italic', $italic, '', 'yes');
}
?>

<!-- BEGIN SETTINGS -->

<div id="normal-sortables" class="meta-box-sortables">
<div id="about" class="postbox">
<div class="inside">
<br class="clear" />
<center>
<b>Settings:</b><br><br>

<form method="POST" enctype="multipart/form-data">
<table border="0">
<tr>
<td width="50%">Text Color:</td>
<td width="50%"><input type="text" class="color {hash:true}" name="rad_highlighter_text" value="<?php echo get_option('rad_highlighter_text'); ?>" /></td>
</tr>
<tr>
<td>Background Color:</td>
<td><input type="text" class="color {hash:true}" name="rad_highlighter_bg" value="<?php echo get_option('rad_highlighter_bg'); ?>" /></td>
</tr>
<tr>
<td>Padding (px):</td>
<td><input type="text" name="rad_highlighter_padding" value="<?php echo get_option('rad_highlighter_padding'); ?>" /></td>
</tr>
<tr>
<td>Bold:</td>
<td>
<select name="rad_highlighter_bold">
<option value="<?php echo get_option('rad_highlighter_bold'); ?>">Current: <?php echo get_option('rad_highlighter_bold'); ?></option>
<option value="Lighter">Lighter</option>
<option value="Normal">Normal</option>
<option value="Bold">Bold</option>
</select>
</td>
</tr>
<tr>
<td>Italic:</td>
<td>
<select name="rad_highlighter_italic">
<option value="<?php echo get_option('rad_highlighter_italic'); ?>">Current: <?php echo get_option('rad_highlighter_italic'); ?></option>
<option value="Normal">Normal</option>
<option value="Italic">Italic</option>
</select>
</td>
</tr>
</table><br>
<input type="submit" name="save_settings" value="Save Settings!" class="button-primary" />
</form>

</center>
<br class="clear" />
</div>
</div>
</div>

<!-- BEGIN PREVIEW & USAGE -->

<div id="normal-sortables" class="meta-box-sortables">
<div id="about" class="postbox">
<div class="inside">
<br class="clear" />
<center>

<table border="0" width="40%">
<tr>
<td width="50%"><b>Preview:</b></td>
<td width="50%">This is what your <span style="color:<?php echo get_option('rad_highlighter_text'); ?>; background:<?php echo get_option('rad_highlighter_bg'); ?>; padding:<?php echo get_option('rad_highlighter_padding'); ?>; font-weight:<?php echo get_option('rad_highlighter_bold'); ?>; font-style:<?php echo get_option('rad_highlighter_italic'); ?>;">highlighted text</span> will look like. Do you like it? :)</td>
</tr>
</table>
<br class="clear" />
<table border="0" width="40%">
<tr>
<td width="50%"><b>Usage:</b></td>
<td width="50%"><pre>[rad-hl]  ...text here...  [/rad-hl]</pre></td>
</tr>
</table>

</center>
<br class="clear" />
</div>
</div>
</div>
