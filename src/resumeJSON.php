<?php
    if($_POST){
        $response = array('type'=>'', 'message'=>'');
 
        try{
            // // server side validation of JSON
            $required_fields = array('name', 'email', 'org');
            foreach($required_fields as $field){
                if(empty($_POST[$field])){
                    throw new Exception('Required field "'.ucfirst($field).'" missing input.');
                }
            }
			// get post data
			$Name = $_POST['name'];
			$Email = $_POST['email'];
			$Org = $_POST['org'];
			$Location = $_POST['location'];
			
			// define allowed extensions
			$allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt");
			$files = array();
			array_push($files,"AmeyRupji/-Resume.pdf");  
		
			// define some mail variables
			$to = "ameyrupji@gmail.com";
			$from = "ameyrupji@gmail.com"; 
			$subject = "Amey Rupji - Requested Resume"; 
			$msg = "$Name, My Requested resume is attached with this email";
			$headers = "From: $from";
		
			// define our boundary
			$semi_rand = md5(time()); 
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
		
			// tell the header about the boundary
			$headers .= "\nMIME-Version: 1.0\n";
			$headers .= "Content-Type: multipart/mixed;\n";
			$headers .= " boundary=\"{$mime_boundary}\""; 
		
			// part 1: define the plain text email
			$message ="\n\n--{$mime_boundary}\n";
			$message .="Content-Type: text/plain; charset=\"iso-8859-1\"\n";
			$message .="Content-Transfer-Encoding: 7bit\n\n" . $msg . "\n\n";
			$message .= "--{$mime_boundary}\n";
		
			// part 2: loop and define mail attachments
			foreach($files as $file) {
				$aFile = fopen($file,"rb");
				$data = fread($aFile,filesize($file));
				fclose($aFile);
				$data = chunk_split(base64_encode($data));
				$message .= "Content-Type: {\"application/octet-stream\"};\n";
				$message .= " name=\"$file\"\n";
				$message .= "Content-Disposition: attachment;\n";
				$message .= " filename=\"$file\"\n";
				$message .= "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
				$message .= "--{$mime_boundary}\n";
			}
			
			
			// send the email
			$ok = mail($Email, $subject, $message, $headers); 
			$ok1 = mail($to, "Resume Requested by $Name", "Name: $Name, Email: $Email, Organization: $Org, Location: $Location", $headers); 
			
 			if ($ok && $ok1) {
				// ok, field validations are ok
				$response['type'] = 'success';
				$response['message'] = 'My Resume has been successfully sent to your provided email -'.$Email;
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