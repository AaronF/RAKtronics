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
	    print_r($result);
	} catch(Mandrill_Error $e) {
	    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
	    throw $e;
	}
}
?>