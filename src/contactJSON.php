<?php
if($_POST){
	$response = array('type'=>'', 'message'=>'');

	try{
		// // server side validation of JSON
		$required_fields = array('nameC', 'emailC', 'message_subject','message_body');
		foreach($required_fields as $field){
			if(empty($_POST[$field])){
				throw new Exception('Required field "'.ucfirst($field).'" missing input.');
			}
		}
		
		// get post data
		if ((isset($_POST['nameC'])) && (strlen(trim($_POST['nameC'])) > 0)) {
			$nameC = stripslashes(strip_tags($_POST['nameC']));
		} else {$nameC = 'No nameC entered';}
		if ((isset($_POST['emailC'])) && (strlen(trim($_POST['emailC'])) > 0)) {
			$emailC = stripslashes(strip_tags($_POST['emailC']));
		} else {$emailC = 'No emailC entered';}
		if ((isset($_POST['message_subject'])) && (strlen(trim($_POST['message_subject'])) > 0)) {
			$Subject = stripslashes(strip_tags($_POST['message_subject']));
		} else {$Subject = 'No Subject entered';}
		if ((isset($_POST['message_body'])) && (strlen(trim($_POST['message_body'])) > 0)) {
			$Body = stripslashes(strip_tags($_POST['message_body']));
		} else {$Body = 'No Body entered';}
		$Location = $_POST['location'];

		// define some mail variables
		$to = "ameyrupji@gmail.com";
		$from = "ameyrupji@gmail.com"; 
		$subject = "Contacted by $nameC - $Subject"; 
		$msg = "$nameC, $emailC, $Subject, $Body";
		$headers = "From: $from";

		// send the emailC
		$ok = mail($to, $subject, $msg.",Location ".$Location, $headers); 
		$ok1 = mail($emailC, "Contacted Amey Rupji Successfully", $msg, $headers);
		
		if ($ok && $ok1) {
			// ok, field validations are ok
			$response['type'] = 'success';
			$response['message'] = 'I have received the information you have provided. A copy of the data sent is sent to your provided email';
		}
		else {
			$response['type'] = 'error';
			$response['message'] = 'Error sending email please try again later';
		}
	}catch(Exception $e){
		$response['type'] = 'error';
		$response['message'] = $e->getMessage();
	}
	// now we are ready to turn this hash into JSON
	print json_encode($response);
	exit;
}
?>