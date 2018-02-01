<?php


        $captcha;

        if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
		  echo "<BUTTON onClick=" . "javascript:history.back()>" . "Back </BUTTON>";
          exit;
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret='6Lc9VSITAAAAAKJsGQJF-uRUhBKIdUh5yB3g-glv'&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {
          echo '<h2>You are a spammer! Get the @$%K off my website!!</h2>';
        }
        else
        { //Do stuff here
			
			
			

require_once('comment_dbconfig.php');
//define variables

$subject = $message = $message2 = $from = "";

//form variables
	
	$name = $email = $site = $comment = $publish = "";
	
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$site = $_POST["website"];
	$comment = $_POST["comment"];		
	$publish = $_POST["0"];	
	
	
          try {
	//connect to batabase
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //echo "Connected to database $dbname at $host successfully. <br/>";
	//insert data into database	
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO comment(name,email,site,comment,entered,publish)
					values('$name','$email','$site','$comment',now(),'$publish')";	
				$conn->exec($sql);
				$last_id = $conn->lastInsertId();
					echo "Your comment was recieved. <br/><br/>";
					echo "Name: " . htmlspecialchars($name) . "<br/>" ;
					echo "Email: " . htmlspecialchars($email) . "<br/>" ;
					echo "Website: " . htmlspecialchars($site) . "<br/>" ;
					echo "Comment: " . htmlspecialchars($comment) . "<br/>" ;
					//echo "Publish: " . htmlspecialchars($publish) . "<br/>" ;
					//echo "Entered: " . htmlspecialchars($entered) . "<br/>" ;
					//echo "Last Record: " . htmlspecialchars($last_id) . "<br/>" ;

 $conn=null;
	//echo "Connection to database $dbname at $host closed successfully. <br/>";
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
	$message = "Comment No : ". $last_id . "\n" . $comment;
	$headers = 'From:'. "website@stevewright.nz". "\r\n";
	$message = wordwrap($message, 70);
	
	}
mail("$to",$subject,$message,$headers);
	echo "An Email was sent to the site administrator. Thank you. <br/>";	
	echo "<BUTTON onClick=" . "location.href='contact.php';>". "Back </BUTTON>";
	//echo "<BUTTON onClick=" . "javascript:history.back()>" . "Back </BUTTON>";
	}
?>