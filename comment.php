 <?php
/*
 // define variables and set to empty values
$nameErr = $emailErr = $siteErr = $commentErr = "No Error";
$name = $email = $site = $comment = $entry = "";

if (isset($_POST["submit"])) {
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
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
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
  $comment = $_POST["comment"];
 }

  echo "<h2>Your Input:</h2>";

  echo "Name : "; echo $_POST["name"]; echo " "; echo $nameErr; echo "<br>";
  echo "Email : "; echo $_POST["email"]; echo " "; echo $emailErr; echo "<br>";
  echo "Website : "; echo $_POST["site"]; echo " "; echo $siteErr; echo "<br>";
  echo "Comment : ";echo $_POST["comment"];

  */
  // Post data to mysql table
  
  $servername = 'localhost';
  $dbname = 'comments';
  $dbuser = 'website';
  $dbpass = 'website';

  try{
	  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpass);
	  //set the PDO error mode to exception
	  $conn->setAttribute(PDP::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  echo "Connected sussessfully";
	  }
  catch(PDOExeption $e)
      {
	  echo "Connection failed" . $e->getMessage();
	  }
/*
	  
  if(! get_magic_quotes_gpc() ) {
	 $name = addslashes ($_POST['name']);
     $email = addslashes ($_POST['email']);
	 $site = addslashes ($_POST['site']);
     $comment = addslashes ($_POST['comment']);
  } else {
	 $name = ($_POST['name']);
     $email = ($_POST['email']);
	 $site = ($_POST['site']);
     $comment = ($_POST['comment']);
  }
  
 
  $sql = "INSERT INTO comment(name, 
							email,
							site, 
							comment) VALUES(
							$name, 
							$email,
							$site, 
							$comment)";
							
   $stmt = $PDO->prepare($sql);
   $stmt->bindParam('$name', $_POST['name'], PDO::PARAM_STR);
   $stmt->bindParam('$email', $_POST['email'], PDO::PARAM_STR);
   $stmt->bindParam('$site', $_POST['site'], PDO::PARAM_STR);
   $stmt->bindParam('$comment', $_POST['comment'], PDO::PARAM_STR);
   
  $stmt->execute();
//   if(!$stmt->execute()) {echo $_POST['name'];} else {echo $_POST['site'];};
   $newId = $pdo->lastInsertId();
  // check that it loaded
if ($stmt->execute()) { 
   // it worked
   echo $_POST['name'];
} else {
   // it didn't
   echo $_POST['site'];
}
      */

   
   
 /*  PDO::__construct( 'comment' );
   $retval = PDO::query( $sql, $conn );
   
   if(! $retval ) {
      die 'Could not enter data: ' . PDO::errorInfo();
   }
  echo "Entered data successfully\n";
   $conn=null;
	*/
}		
?>