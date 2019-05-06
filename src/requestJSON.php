<?php
    if($_POST){
        $response = array('type'=>'', 'message'=>'');
 
        try{
            // // server side validation of JSON
            $required_fields = array('name', 'email', 'reason');
            foreach($required_fields as $field){
                if(empty($_POST[$field])){
                    throw new Exception('Required field "'.ucfirst($field).'" missing input.');
                }
            }
			
			$Name = $_POST['name'];
			$Email = $_POST['email'];
			$Reason = $_POST['reason'];		
			
			// define some mail variables
			$to = "ameyrupji@gmail.com";
			$from = "ameyrupji@gmail.com"; 
			$subject = "Amey Rupji - Requested Received"; 
			$msg = "$Name, Your request for my code has been received successfully. I will be mailing you the code in a few days. If you do not get the code within a weeks time please submit the request again.";
			$headers = "From: $from";
				
			
			// send the email
			$ok = mail($Email, $subject, $msg, $headers); 
			$ok1 = mail($to, "Code Requested by $Name", "Name: $Name, Email: $Email, Reason: $Reason", $headers); 
			
 			if ($ok && $ok1) {
				// ok, field validations are ok
				$response['type'] = 'success';
				$response['message'] = 'Your request has been successfully received';
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