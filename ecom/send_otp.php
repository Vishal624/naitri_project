<?php
require('connection.inc.php');
require('functions.inc.php');

$type=get_safe_value($con,$_POST['type']);
if($type=='email'){
	$email=get_safe_value($con,$_POST['email']);
	$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
	if($check_user>0){
		echo "email_present";
		die();
	}
	
	$otp=rand(1111,9999);
	$_SESSION['EMAIL_OTP']=1234;
	$html="$otp is your otp";
	include 'sendinblue/mailing.php';
	// include('smtp/PHPMailerAutoload.php');
	// $mail=new PHPMailer(true);
	// $mail->isSMTP();
	// $mail->Host="smtp.gmail.com";
	// $mail->Port=587;
	// $mail->SMTPSecure="tls";
	// $mail->SMTPAuth=true;
	// $mail->Username="SMTP_EMAIL_ID";
	// $mail->Password="SMTP_EMAIL_PASSWORD";
	// $mail->SetFrom("SMTP_EMAIL_ID");
	// $mail->addAddress($email);
	// $mail->IsHTML(true);
	// $mail->Subject="New OTP";
	// $mail->Body=$html;
	// $mail->SMTPOptions=array('ssl'=>array(
	// 	'verify_peer'=>false,
	// 	'verify_peer_name'=>false,
	// 	'allow_self_signed'=>false
	// ));
	// if($mail->send()){
	// 	echo "done";
	// }else{
		
	// }
}

if($type=='mobile'){
	$mobile=get_safe_value($con,$_POST['mobile']);
	$check_mobile=mysqli_num_rows(mysqli_query($con,"select * from users where mobile='$mobile'"));
	if($check_mobile>0){
		echo "mobile_present";
		die();
	}
	$otp=rand(1111,9999);
	$_SESSION['MOBILE_OTP']=$otp;
	$message="$otp is your otp";
	
	$mobile=$mobile;
	
	/*$apiKey = urlencode('API_KEY');
	$numbers = array($mobile);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($message);
	$numbers = implode(',', $numbers);
 	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);*/

	$fields = array(
		"variables_values" => $message,
		"route" => "v3",
		"numbers" => $mobile,
	);
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: ZyG8mmxlFgQ16D4rekkZKIIdcUfxiRGoeBVEDAuL1QjW52hb0yFp9v9X4rmO",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
echo 'done';
}
}
?>       