<?php
include 'includes/header.php';
if (!$_SESSION['event']) {
header("Location: index.php");
exit;
}
$result = mysql_query("SELECT * FROM events WHERE id = 'addslashes(".$_SESSION['event'])."'");
$event = mysql_fetch_array($result);

if ($_REQUEST['op'] == 'complete') {
unset($_POST['Submit']);
$q="INSERT INTO registrations SET ";
foreach ($_POST as $key=>$value) {
$q.="$key = 'addslashes".str_replace("'","",$value).")', ";
}
$q.=" `date` = NOW(), event = 'addslashes(".$_SESSION['event'])."'";

mysql_query($q) or die(mysql_error());
include 'finish.php';
}


else {
include 'form.php';
}
include 'includes/footer.php';
?>
