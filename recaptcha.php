<?php

// grab recaptcha library
require_once "recaptchalib.php";

if(isset($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])): 
		//your site secret key
        $secret = $secretkey;
		//get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
	
		$name = !empty($_POST['name'])?$_POST['name']:'';	
		$email = !empty($_POST['email'])?$_POST['email']:'';
		$comment = !empty($_POST['comment'])?$_POST['comment']:'';
     
		if($responseData->success):
			//contact form submission code
			$to = 'steve2wright@gmail.com';
			$subject = 'A new contact form has been submitted';
			$htmlContent = "
				<h1>Contact request details</h1>
				<p><b>Name: </b>".$name."</p>
				<p><b>Email: </b>".$email."</p>
				<p><b>Comment: </b>".$comment."</p>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
			//send email
			@mail($to,$subject,$htmlContent,$headers);
			
            $succMsg = 'Your contact request have submitted successfully.';
			$name = '';
			$email = '';
			$comment = '';
        else: 
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
	$name = '';
	$email = '';
	$comment = '';
endif;   
?>