<?php
function mailUser($to_email, $to_name, $subject, $message, $from_email, $from_name){
	require_once("libraries/Mandrill.php");
	$mandrill = new Mandrill('UR0KlH08tLepOTRsRnyrqA');
	try {
	    $message = array(
		        'html' => $message,
		        'subject' => $subject,
		        'from_email' => $from_email,
		        'from_name' => $from_name,
		        'to' => array(
		            array(
		                'email' => $to_email,
		                'name' => $to_name,
		                'type' => 'to'
		            )
		        ),
		        'headers' => array('Reply-To' => $from_email)
		    );
	    $async = false;
	    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
	    echo "sent";
	} catch(Mandrill_Error $e) {
	    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
	    throw $e;
	}
}

function mynl2br($text) { 
   return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />')); 
} 

if($_POST){
	if($_POST["type"]=="contactform"){
		$your_name = $_POST["your_name"];
		$your_email = $_POST["your_email"];
		$company = $_POST["company"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];
		$message = mynl2br($message);
		$message = "Subject: ".$subject."<br><br>".$message."<br><hr><p>Name: ".$your_name."</p><p>Email: ".$your_email."</p><p>Company: ".$company."</p>";
		if($_POST["copyself"]==1){
			mailUser("richard@raktronics.com", "Richard Fisher", "Web Enquiry", $message, $your_email, $your_name);
			mailUser($your_email, $your_name, $subject, "<p>Copy of your email: </p><br>".$message, $your_email, $your_name);
		} else {
			mailUser("richard@raktronics.com", "Richard Fisher", "Web Enquiry", $message, $your_email, $your_name);
		}
	}
}
?>