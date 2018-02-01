<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="stylesheet" type="text/css" href="wrightfamily.css">
<script src="wrightfamily.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	
  </head>
  <body class="site">
    <?php require_once("includes/header.php");
	 ?>
  <main class="site-content">
  <div>

	<form id="comments" method="post" action="verify1.php">
	  	  	    
	  <table>
	    <tr>
	      <td><label for="name">Name:</label></td>
	      <td><input type="text" id="name" name="name" size="48" required placeholder="Your name"></td>
		</tr>
		<tr>
		  <td><label for="email">Email:</label> </td>
		  <td><input type="email" id="email" name="email" size="48" required placeholder="Email address - Never made public!"></td>
		</tr>
		<tr>
		  <td><label for="website">Website:</label></td>
		  <td><input type="url" id="website" name="website" size="48" placeholder="Your website: https://example.com" pattern="https?://.+"></td>
		</tr>
		<tr>
		  <td><label>Comment:</label></td>
		  <td><textarea id="txtbox" name="comment" cols="35" required placeholder="Enter a comment"></textarea></td>
		</tr>
		<tr>
		  <td></td>
		  <td> <div class="g-recaptcha" data-sitekey="6Lc9VSITAAAAAFIySrOtjxSfmshgrYT74cDZgK8e"></div> </td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="submit" id="submit" value="Submit"></td>
		</tr>
		<tr><td></td><td><div class="g-recaptcha" data-sitekey="6Lc9VSITAAAAAFIySrOtjxSfmshgrYT74cDZgK8e"></div></td></tr>
	  </table>
	</form>	
  </div>

  </main>  
  </body>
</html>
  
  