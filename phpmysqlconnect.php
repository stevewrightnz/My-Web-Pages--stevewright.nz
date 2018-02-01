<?php

require_once ("dbconfig.php");

//define variables

$subject = $message = $message2 = $from = "";

//form variables
	
	$name = $email = $site = $comment = "";
		
	//$name = $_POST["name"];
	//$email = $_POST["email"];
	//$site = $_POST["site"];
	//$comment = $_POST["comment"];

//validate form inputs
/*
if (isset($_POST['submit'])) {
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
		//your site secret key
        $secret = '6Lc9VSITAAAAAKJsGQJF-uRUhBKIdUh5yB3g-glv';
		//get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
		
		$name = !empty($_POST['name'])?$_POST['name']:'';
		$email = !empty($_POST['email'])?$_POST['email']:'';
		$message = !empty($_POST['message'])?$_POST['message']:'';
        
		
		if($responseData->success):
			//contact form submission code
			$to = 'steve2wright@gmail.com';
			$subject = 'New contact form have been submitted';
			$htmlContent = "
				<h1>Contact request details</h1>
				<p><b>Name: </b>".$name."</p>
				<p><b>Email: </b>".$email."</p>
				<p><b>Message: </b>".$message."</p>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
			//send email
			@mail($to,$subject,$htmlContent,$headers);
			
            $succMsg = 'Your contact request has submitted successfully.';
			$name = '';
			$email = '';
			$message = '';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
	

 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	  }  else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
	  }
	}
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
	//sanitise email address
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email= filter_var($email, FILTER_VALIDATE_EMAIL);
    // check if e-mail address is well-formed
	if (!$email){
		echo "Invalid Sender's Email";
		}
  }

if (empty($_POST["site"])) {
   $site = NULL;
  } else {
   $site = $_POST["site"];
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
 if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$site)) {
      $siteErr = "Invalid URL";
  }
 }

 if (empty($_POST["comment"])) {
   $commentErr = "Enter a comment!";
 } else {
  $comment = nl2br(htmlentities($_POST['comment'], ENT_HTML5, ENT_QUOTES, 'UTF-8'));
 }





*/

 //put data in database
try {
	//connect to batabase
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //echo "Connected to database $dbname at $host successfully. <br>";
	//insert data into database	
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO comment(name,email,site,comment,entered)
					values('$name','$email','$site','$comment',now())";	
				$conn->exec($sql);
				$last_id = $conn->lastInsertId();
					echo "Your comment was recieved. <br><br>";
					echo "Name: " . htmlspecialchars($name) . "<br>" ;
					echo "Email: " . htmlspecialchars($email) . "<br>" ;
					echo "Website: " . htmlspecialchars($site) . "<br>" ;
					echo "Comment: " . htmlspecialchars($comment) . "<br>" ;
					echo "Last Record: " . htmlspecialchars($last_id) . "<br>" ;
					
$conn=null;
	//echo "Connection to database $dbname at $host closed successfully. <br>";
	}
	// connection error message
	catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
	}

	
//send a notification email to database owner - me 
 if($_POST['name']==""||$_POST['email']==""){
	echo "Fill in required fields.....";
	}else{
	$subject = "A comment was left on stevewright.nz";
	$message = "Comment No : ". $last_id . "\r\n". $comment;
	$headers = 'From:'. "website@stevewright.nz". "\r\n";
	$message = wordwrap($message, 70);
	
	}
mail("$to",$subject,$message,$headers);
echo "Mail Sent. Thank you. <br/>";	
 }
?>