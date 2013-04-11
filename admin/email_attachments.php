<?php
include '../includes/header.php';
if (!$_SESSION['sasi_admin']) { exit; }

$result = mysql_query("SELECT * FROM events WHERE id = '".addslashes($_REQUEST['id'])."'");
$event = mysql_fetch_array($result);

if ($_REQUEST['mode'] == 'remove') {
$event['email_attachments'] = str_replace($_REQUEST['string'],"",$event['email_attachments']);
mysql_query("UPDATE events SET email_attachments = '".$event['email_attachments']."' WHERE id = '".$_REQUEST['id']."'");
}
if ($_REQUEST['mode'] == 'add') {
$event['email_attachments'] = $event['email_attachments']."|".urldecode($_REQUEST['file']);
mysql_query("UPDATE events SET `email_attachments` = '".$event['email_attachments']."' WHERE id = '".$_REQUEST['id']."'");
}

echo "<h3>Email Attachments - ".$event['name']."</h3><br />";

$att = explode("|",$event['email_attachments']);

echo '<strong>Current Attachments</strong><ol>';
foreach ($att as $key=>$value) {
if ($value) {
echo '<li><a href="http://www.sasiok.com/attachments/'.$value.'">http://www.sasiok.com/attachments/'.$value.'</a> [<a href="email_attachments.php?id='.$_REQUEST['id'].'&mode=remove&string='.($value).'">x</a>]</li>';
}
}
echo '</ol><br /><br /><br /><strong>Add a New Attachment</strong><br /><form action="email_attachments.php?mode=add&id='.$_REQUEST['id'].'" method="post">
http://www.sasiok.com/attachments/<input type="text" name="file" id="file" /><br /><input type="submit" name="submit" value="Add">
</form>';

?>
