<?php
include('smtp/PHPMailerAutoload.php');
$html='Hey There!';
echo smtp_mailer('rishabhkumar1509@gmail.com','Testing SMTP',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "mail.rishabhsajwal.in";
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "me@rishabhsajwal.in";
	$mail->Password = "Sajwal@0369";
	$mail->SetFrom("Rishabh Kumar Sajwal <me@rishabhsajwal.in>");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>