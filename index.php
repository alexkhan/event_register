<?php
ob_start();
include 'includes/header.php';
$result = mysql_query("SELECT * FROM events WHERE id = '".$_REQUEST['id']."'");
	if (mysql_num_rows($result) == 0) {
	header("Location: http://www.sasiok.com/enrollment-center");
	
	}
else {
	$event = mysql_fetch_array($result);
?>
<h3><?=$event['name']?> Registration</h3><?=$event['dates']?><br /><br />
<?php
echo $event['description'];
echo '<br /><br />Registration Begins: '.$event['regstart'].'<br />Registration Ends: '.$event['regend'].'<br /><br />';


//check registration eligibility
if ($event ['regstart'] && $event['regstart'] > $today) {
echo '<p class="error">You cannot yet register for this event</p>';
}
else if ($event['regend'] < $today) {
echo '<p class="error">The registration deadline for this event has passed</p>';
}
else {
$_SESSION['event'] = $_REQUEST['id'];
$_SESSION['name'] = $event['name'];
echo '[<a href="register.php">Register for '.$event['name'].'</a>]';
}




}
include 'includes/footer.php';
?>