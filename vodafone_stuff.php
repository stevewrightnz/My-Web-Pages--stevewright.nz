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
<title>Vodafone Stuff</title>
</head>

<body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
	<h2>Vodafone specific information</h2>
	<h3>Disable IPV6 on Huawei HG659 router</h3>
	<p>Apparently this sorts issues with variable speeds</p>
	<a href="http://community.vodafone.co.nz/t5/Broadband-services/Disable-IPv6-on-fibre-connection-on-HG659/td-p/209206" class="nav_button">Disable IPv6 on fibre connection on HG659</a>

	<ol>
	<li> Access 192.168.1.1 </li>
	<li> Login with "Admin" and "@********" (@andlast8digisofyourserialno.)</li>
	<li> Click on Internet tab</li>
	<li> Scroll down to Internet_Ethernet</li>
	<li> Click Edit</li>
	<li> Scroll down and select only IPV4</li>
	</ol>
	</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
</body> 
</html>