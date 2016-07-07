<?php

	function send_message($name, $email, $phone, $message){
		$name = strip_tags(htmlspecialchars($name));
		$email = strip_tags(htmlspecialchars($email));
		$phone = strip_tags(htmlspecialchars($phone));
		$message = strip_tags(htmlspecialchars($message));
		   
		// Create the email and send the message
		$to = 'raza1778@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
		$email_subject = "Website Contact Form:  $name";
		$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
		$headers = "From: raza1778@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		$headers .= "Reply-To: $email";   
		mail($to,$email_subject,$email_body,$headers);
		return true;
	}

	if (isset($_GET['name']) && !empty($_GET['name'])) {
		$name = $_GET['name'];
		if (isset($_GET['email']) && !empty($_GET['email'])) {
			$email = $_GET['email'];
			if (isset($_GET['phone']) && !empty($_GET['phone'])) {
				$phone = $_GET['phone'];
				if (isset($_GET['message']) && !empty($_GET['message'])) {
					$message = $_GET['message'];
					if (send_message($name, $email, $phone, $message)) {
						echo json_encode(['status'=>'success','message'=>'Message sent.']);
					}
					else{
						echo json_encode(['status'=>'error','message'=>'Error sending message.']);
					}
				}
				else{
					echo json_encode(['status'=>'error','message'=>'Message is required.']);
				}
			}
			else{
				echo json_encode(['status'=>'error','message'=>'Phone is required.']);
			}
		}
		else{
			echo json_encode(['status'=>'error','message'=>'Email is required.']);
		}
	}
	else{
		echo json_encode(['status'=>'error','message'=>'Name is required.']);
	}
?>