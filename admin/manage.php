<?php

include '../includes/header.php';
if (!$_SESSION['sasi_admin']) { exit; }

if ($_REQUEST['mode'] == 'update') {
foreach ($_POST as $key=>$value) {
$query .= " `$key` = '$value',";
}
mysql_query("UPDATE events SET$query id = '".$_REQUEST['id']."' WHERE id = '".$_REQUEST['id']."'");
}

$result = mysql_query("SELECT * FROM events WHERE id = '".$_REQUEST['id']."'");
$event = mysql_fetch_array($result);


?>
Registration URL: <a href="http://register.sasiok.com/?id=<?=$_REQUEST['id']?>">http://register.sasiok.com/?id=<?=$_REQUEST['id']?></a>
<br />
<br />

<strong>Basic Information</strong>
<form action="?mode=update&id=<?=$_REQUEST['id']?>" method="post">
<table width="75%" border="0">
  <tr>
    <td>Event Name</td>
    <td><label>
      <input name="name" type="text" id="name" value="<?=$event['name']?>">
    </label></td>
  </tr>
  <tr>
    <td>Registration Start</td>
    <td><input name="regstart" type="text" id="regstart" value="<?=$event['regstart']?>">
    YYYY-MM-DD</td>
  </tr>
  <tr>
    <td>Registration End</td>
    <td><input name="regend" type="text" id="regend" value="<?=$event['regend']?>">
    YYYY-MM-DD</td>
  </tr>
  <tr>
    <td>Event Dates</td>
    <td><input name="dates" type="text" id="dates" value="<?=$event['dates']?>"></td>
  </tr>
  <tr>
    <td>Event Description</td>
    <td><label>
      <textarea name="description" id="description" cols="45" rows="5"><?=$event['description']?></textarea>
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="Update"></td>
  </tr>
</table></form>
<hr />
<strong>Enrollment Options</strong>
<table width="75%" border="0">
  <tr>
    <td><ul><?php
	
	if ($_REQUEST['mode'] == 'removeopt') {
	$options = str_replace($_REQUEST['string'],'',$event['options']);
	mysql_query("UPDATE events SET options = '$options' WHERE id = '".$_REQUEST['id']."'");
	$event['options'] = $options;
	}
	if ($_REQUEST['mode'] == 'addoption') {
	mysql_query("UPDATE events SET options = '".$event['options']."/".$_REQUEST['name']." (".$_REQUEST['price'].")' WHERE id = '".$_REQUEST['id']."'");
	header("Location: ?id=".$_REQUEST['id']);
	}
	
    $opt = explode("/",$event['options']); foreach ($opt as $key=>$value) { if ($value) { echo "<li>$value [<a href='?id=".$_REQUEST['id']."&mode=removeopt&string=$value' onclick=\"return confirm('Are you sure you want to delete?')\">x</a>]</li>"; }} ?></ul></td>
    <td><p>Add a new option</p>
    <p><form action="?id=<?=$_REQUEST['id']?>&mode=addoption" method="post"><input type="text" name="name"><br /><input name="price" type="text" value="$" size="6">
      <br>
      <label>
      <input type="submit" name="button" id="button" value="Add">
      </label>
    </form></p></td>
  </tr>
</table>
<hr />
<strong>Enrollment Form Options</strong><br />
<?php
if ($_REQUEST['op'] == 'form') {
	$query = "UPDATE events SET";
	foreach ($_POST as $key=>$value) {
	$query .= " `$key` = '$value',";
	}
	$query .= " `docs` = '' WHERE id = '".$_REQUEST['id']."' LIMIT 1";
	mysql_query($query);

	header("Location: manage.php?id=".$_REQUEST['id']);
}
?>
<form action="?op=form&id=<?=$_REQUEST['id']?>" method="post">
<input type="hidden" name="f_first" value="" /> <input type="hidden" name="f_last" value="" /> <input type="hidden" name="f_address" value="" /> <input type="hidden" name="f_city" value="" /> <input type="hidden" name="f_state" value="" /> <input type="hidden" name="f_zip" value="" /> <input type="hidden" name="f_gender" value="" /> <input type="hidden" name="f_shirtsize" value="" /> <input type="hidden" name="f_home" value="" /> <input type="hidden" name="f_cell" value="" /> <input type="hidden" name="f_email" value="" /> <input type="hidden" name="f_registrationtype" value="" /> <input type="hidden" name="f_roommate" value="" /> <input type="hidden" name="f_school" value="" /> <input type="hidden" name="f_director_name" value="" /> <input type="hidden" name="f_director_email" value="" /> <input type="hidden" name="f_director_home" value="" /> <input type="hidden" name="f_director_work" value="" /> <input type="hidden" name="f_director_cell" value="" /> <input type="hidden" name="f_director_fax" value="" /> <input type="hidden" name="f_parent_name" value="" /> <input type="hidden" name="f_parent_address" value="" /> <input type="hidden" name="f_parent_city" value="" /> <input type="hidden" name="f_parent_state" value="" /> <input type="hidden" name="f_parent_zip" value="" /> <input type="hidden" name="f_parent_home" value="" /> <input type="hidden" name="f_parent_work" value="" /> <input type="hidden" name="f_parent_cell" value="" /> <input type="hidden" name="f_emergency_contact" value="" /> <input type="hidden" name="f_emergency_contact_phone" value="" />







<table width="75%" border="0">
  <tr>
    <td valign="top"><label><input name="f_first" type="checkbox" id="f_first" value="1"<? if ($event['f_first']) { echo ' checked="checked"'; } ?> />First Name</label><br /><label><input name="f_last" type="checkbox" id="f_last" value="1"<? if ($event['f_last']) { echo ' checked="checked"'; } ?> />Last Name</label><br />
   <label><input name="f_address" type="checkbox" id="f_" value="1"<? if ($event['f_address']) { echo ' checked="checked"'; } ?> />Address</label><br />
   <label><input name="f_city" type="checkbox" id="f_" value="1"<? if ($event['f_city']) { echo ' checked="checked"'; } ?> />City</label><br />
   <label><input name="f_state" type="checkbox" id="f_" value="1"<? if ($event['f_state']) { echo ' checked="checked"'; } ?> />State</label><br />
   <label><input name="f_zip" type="checkbox" id="f_" value="1"<? if ($event['f_zip']) { echo ' checked="checked"'; } ?> />Zip</label><br />
   <label><input name="f_gender" type="checkbox" id="f_gender" value="1"<? if ($event['f_gender']) { echo ' checked="checked"'; } ?> />Gender</label><br />
   <label><input name="f_shirtsize" type="checkbox" id="f_shirtsize" value="1"<? if ($event['f_shirtsize']) { echo ' checked="checked"'; } ?> />Shirt size</label><br />
   <label><input name="f_home" type="checkbox" id="f_home" value="1"<? if ($event['f_home']) { echo ' checked="checked"'; } ?> />Home Phone</label><br />
   <label><input name="f_cell" type="checkbox" id="f_cell" value="1"<? if ($event['f_cell']) { echo ' checked="checked"'; } ?> />Cell</label><br />
   <label><input name="f_email" type="checkbox" id="f_email" value="1"<? if ($event['f_email']) { echo ' checked="checked"'; } ?> />Email</label><br />
   
   
    </td>
    <td valign="top"><label><input name="f_registrationtype" type="checkbox" id="f_registrationtype" value="1"<? if ($event['f_registrationtype']) { echo ' checked="checked"'; } ?> />Enrollment Options</label><br />
   <label><input name="f_roommate" type="checkbox" id="f_" value="1"<? if ($event['f_roommate']) { echo ' checked="checked"'; } ?> />Roommate</label><br />
   <label><input name="f_school" type="checkbox" id="f_school" value="1"<? if ($event['f_school']) { echo ' checked="checked"'; } ?> />School</label><br />
   <label><input name="f_director_name" type="checkbox" id="f_director_name" value="1"<? if ($event['f_director_name']) { echo ' checked="checked"'; } ?> />Director Name</label>
   <br />
   <label><input name="f_director_email" type="checkbox" id="f_director_email" value="1"<? if ($event['f_director_email']) { echo ' checked="checked"'; } ?> />Director Email</label><br />
   <label><input name="f_director_home" type="checkbox" id="f_director_home" value="1"<? if ($event['f_director_home']) { echo ' checked="checked"'; } ?> />Director Home</label><br />
   <label><input name="f_director_work" type="checkbox" id="f_director_work" value="1"<? if ($event['f_director_work']) { echo ' checked="checked"'; } ?> />Director Work</label><br />
   <label><input name="f_director_cell" type="checkbox" id="f_director_cell" value="1"<? if ($event['f_director_cell']) { echo ' checked="checked"'; } ?> />Director Cell</label><br />
   <label><input name="f_director_fax" type="checkbox" id="f_director_fax" value="1"<? if ($event['f_director_fax']) { echo ' checked="checked"'; } ?> />Director Fax</label><br />
   </td>
    <td valign="top"><label><input name="f_parent_name" type="checkbox" id="f_parent_name" value="1"<? if ($event['f_parent_name']) { echo ' checked="checked"'; } ?> />Parent Name</label><br />
   <label><input name="f_parent_address" type="checkbox" id="f_parent_address" value="1"<? if ($event['f_parent_address']) { echo ' checked="checked"'; } ?> />Parent Address</label><br />
   <label><input name="f_parent_city" type="checkbox" id="f_parent_city" value="1"<? if ($event['f_parent_city']) { echo ' checked="checked"'; } ?> />Parent City</label><br />
   <label><input name="f_parent_state" type="checkbox" id="f_parent_state" value="1"<? if ($event['f_parent_state']) { echo ' checked="checked"'; } ?> />Parent State</label><br />
   <label><input name="f_parent_zip" type="checkbox" id="f_parent_zip" value="1"<? if ($event['f_parent_zip']) { echo ' checked="checked"'; } ?> />Parent Zip</label><br />
   <label><input name="f_parent_home" type="checkbox" id="f_parent_home" value="1"<? if ($event['f_parent_home']) { echo ' checked="checked"'; } ?> />Parent Home</label><br />
   <label><input name="f_parent_work" type="checkbox" id="f_parent_work" value="1"<? if ($event['f_parent_work']) { echo ' checked="checked"'; } ?> />Parent Work</label><br />
   <label><input name="f_parent_cell" type="checkbox" id="f_parent_cell" value="1"<? if ($event['f_parent_cell']) { echo ' checked="checked"'; } ?> />Parent Cell</label><br />
   <label><input name="f_emergency_contact" type="checkbox" id="f_emergency_contact" value="1"<? if ($event['f_emergency_contact']) { echo ' checked="checked"'; } ?> />Emergency Contact</label><br />
   <label><input name="f_emergency_contact_phone" type="checkbox" id="f_emergency_contact_phone" value="1"<? if ($event['f_emergency_contact_phone']) { echo ' checked="checked"'; } ?> />Emergency Contact Phone</label><br />
   </td>
  </tr>
</table><input type="submit" value="Update Form" />
</form>
<hr />
<strong>Participants</strong><br />
<ul>
<li><a href="rdb.php?PME_sys_qf1=<?=$_REQUEST['id']?>">Database of Participants</a></li>
<li><a href="genxls.php?id=<?=$_REQUEST['id']?>&fn=<?=str_replace(" ","",$event['name'].$today)?>">Download Excel Spreadsheet</a></li>
</ul><hr />
<strong>Confirmation Page and Email</strong><br />
<ul>
<li><a href="ckeditor/_samples/confirm_edit.php?id=<?=$_REQUEST['id']?>">Comfirmation Page</a></li>
<li><a href="ckeditor/_samples/email_edit.php?id=<?=$_REQUEST['id']?>">Comfirmation Email Text</a></li>
<li><a href="email_attachments.php?id=<?=$_REQUEST['id']?>">Comfirmation Email Attachments</a></li>
</ul>
<hr />
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
{
var agree=confirm("Are you sure you wish to continue?");
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>

<?php
if ($_REQUEST['op'] == 'remove' && $_REQUEST['remove'] == 'yes') {
mysql_query("DELETE FROM events WHERE id = '".$_REQUEST['id']."' LIMIT 1");
header("Location: index.php");
}
?>
<strong>Remove Event</strong><br />To delete this event, type <em>yes</em> in the box below.<br /><form onsubmit="return confirmSubmit()" action="?id=<?=$_REQUEST['id']?>&op=remove" method="post"><input type="text" width="5" name="remove" /><input type="submit" value="Yes, I'm sure I want to delete this event" /></form>
<? include '../includes/footer.php';?>
