<?


$text = $event['confirmation'];


//create cost variable
$cost = explode("(",$_REQUEST['registrationtype']);
$cost = explode(")",$cost[1]);
$text = str_replace("[cost]",$cost[0],$text);


//Text output
foreach ($_POST as $key=>$value) {
$text = str_replace("[".$key."]",$value,$text);
}
echo $text;



//Send email controller
include_once('class.phpmailer.php');

$mailtext = $event['emailtext'];

foreach ($_POST as $key=>$value) {
$mailtext = str_replace("[".$key."]",$value,$mailtext);
}

$mail             = new PHPMailer(); // defaults to using php "mail()"

//$body             = ob_get_contents();
$body				= $mailtext;

$mail->From       = "info@sasiok.com";
$mail->FromName   = "SASI";

$mail->Subject    = "SASI ".$_REQUEST['type']." Registration";

$mail->AltBody    = str_replace("<br />","\n",$mailtext);

$mail->MsgHTML($body);

if ($_REQUEST['email']) {
$mail->AddAddress($_REQUEST['email'], $_REQUEST['first']." ".$_REQUEST['last']);
}
if ($_REQUEST['director_email']) {
$mail->AddAddress($_REQUEST['director_email'], $_REQUEST['director_name']);
}
if ($_REQUEST['parent_email']) {
$mail->AddAddress($_REQUEST['parent_email'], $_REQUEST['parent_name']);
}

$att = explode("|",$event['email_attachments']);
foreach ($att as $key=>$value) {
if ($value) {
$mail->AddAttachment("/home/docentus/sasiok.com/attachments/$value");
}
}

if(!$mail->Send()) {
  //echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  //echo "Message sent!";
}


?>