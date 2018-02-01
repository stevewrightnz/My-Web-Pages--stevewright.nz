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
<title>Google Chromecast</title>
</head>

<body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
	<h3>Google Chromecast Audio</h3>
	<p>After spending hours getting my Chromecast Audio to stream sound from my Windows 10 PC to my Stereo it turned out to be as simple as:-
		<ol>
		<li> Creating a DHCP reservation on the router. Unfortunately the Chromecast won't let you create a static IP on the device itself. (optional)</li>
		<li> Setting the PC you want to stream from as discoverable. In Windows 10:- Settings > Network and Internet > Ethernet > Click 
		the network and slide the toggle to on!
		</li>
		</ol>
	<p>It should all now work :)</p>
		
	
	</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
</body> 
</html>