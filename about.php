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
<title>About Us</title>
</head>

<body class="site">
<header class="site-header">
    <?php include_once("includes/phpfunctions.php")?>
	<div class="header-container">
	<!-- left -->
		<div class="headernzflag">
		</div>
	<!-- center -->	
		<div class="headertxt">
			 <h1><a href="javascript:openHome();">About Us</a></h1> 
		</div>
	<!-- right -->	
		<div class="headerukflag" >
		</div>
	</div>
	<!-- New Row -->
	<?php include_once("includes/navbar.php")?>
</header>	
<main class="site-content">

<p>Steve, Jo and Nicko live in the suburb of Kingston, Wellington, New Zealand. </p>
</main>

	<?php $pagemodified = filemtime(__FILE__);
	include_once("includes/footer.php");?>
</body> 
</html>

