<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="stylesheet" type="text/css" href="blog.css"> 
<script src="wrightfamily.js"></script>
<title>Steve's Blog</title>
</head>


<body class="site">
<header class="site-header">

	<div class="header-container">
	<!-- left -->
		<div class="headernzflag">
		</div>
	<!-- center -->	
		<div class="headertxt">
			 <h1><a href="javascript:openHome();">Steve's Blog</a></h1> 
		</div>
	<!-- right -->	
		<div class="headerukflag">
		</div>
	</div>
	<!-- New Row -->
	<?php include_once("navbar.php") ?>
	</header>
<main class="site-content">
<?php include("steves_blog.php")?>
</main>
<footer class="site-footer">
<div class="footer-container">
<div class="pgupdated">
<?php
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.
$pagemodified = filemtime(__FILE__);
$last_mod = $pagemodified;
print("This page was last modified on ");
print(date(" l F j Y H:i:s T e" ,$last_mod)) ."<br />\r\n";
//print("This site runs on a RPi2 and is optimised for Firefox, Chrome and Edge.") ."<br />\r\n";
print("Copyright &copy; 2015 - ");
print(date(" Y " ,$last_mod));
print("- All Rights Reserved Steve Wright");
?>
</div>
</div>
</footer>
</body> 
</html>
