<?php

require_once 'dbconfig.php';

//define variables

$subject = $message = $message2 = $from = "";

//form variables
	
	$name = $email = $site = $comment = "";
		
	//$name = $_POST["name"];
	//$email = $_POST["email"];
	//$site = $_POST["site"];
	//$comment = $_POST["comment"];

//validate form inputs

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
		
		//do stuff


		if (isset($_POST['submit'])) :	
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
					echo "Connection to database $dbname at $host closed successfully. <br>";
				}
			// connection error message
			catch (PDOException $pe) {
			die("Could not connect to the database $dbname :" . $pe->getMessage());
			
			}
		

		
	// end of stuff	
		
		

        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
}

?>