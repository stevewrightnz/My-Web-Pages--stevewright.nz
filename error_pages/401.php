<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<meta http-equiv="refresh" content="10;URL=https://stevewright.nz">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="stylesheet" type="text/css" href="https://stevewright.nz/wrightfamily.css">
<script src="wrightfamily.js"></script>
<title>401 Error Page</title>
</head>

<body class="site">

<?php include("https://stevewright.nz/includes/header.php")?>
	
	<main class="site-content">
	<h1>HTTP Error 401: Unauthorised Access</h1>
	<p>This server could not verify that you are authorized to access the document 
	requested. Either you supplied the wrong credentials (e.g. a bad password), 
	or your browser doesn't understand how to supply the credentials required.</p>
	
	
	<p>You will automatically be redirected to stevewright.nz's home page in ten seconds, 
	or click the following link to manually redirect to 
	<a href="https://stevewright.nz">stevewright.nz</p>
	</main>
<?php $pagemodified = filemtime(__FILE__);
	include("https://stevewright.nz/includes/footer.php");?>
</body> 
</html>