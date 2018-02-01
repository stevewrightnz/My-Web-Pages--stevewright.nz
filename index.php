<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="preload" href="wrightfamily.css" as="style">
<link rel="stylesheet" type="text/css" href="wrightfamily.css">
<script src="wrightfamily.js"></script>
<title>Wright Family Web Pages</title>
</head>

<body class="site">
<?php include_once("includes/header.php")?>
	
	<main class="site-content">
	
		<p> These are the Wright family web pages.  They have been created primarily to publish some genealogy 
			information and to provide access to some other information while we are away from home. </p>
			<h3>Genealogy</h3>
				<p>There is some genealogy stuff <a title="This is our genealogy web site. It contains information on the 
				Wright Family." class="tooltip" href="https://stevewright.nz/genealogy.php" target="_blank"><span title="More"></span>here</a>.</p>

				<!--<h3>MineCraft Server</h3>-->
				<!--<p>Details for Nicko's MineCraft Server are <a href="https://stevewright.nz/minecraft.php" target="_blank">here</a>.</p>-->
				<!--<p><input type="button" value="Nicko's Minecraft Server" onClick="window.open('minecraft.php')"></p>-->

			<h3>ZoneMinder</h3>
				<p>Our ZoneMinder (v1.30.4) is <a href="https://zm.stevewright.nz/zm/" target="_blank">here</a>. </p>
				<p><a href="https://stevewright.nz/protected/camerafeeds/camera_views.php"> ZoneMinder Cameras</a></p>
				<p>Some details for setting up specific cameras on ZoneMinder are <a href="https://stevewright.nz/camera_types.php" target="_blank">here.</a></p>				
			
			<!--<h3>Camera Control</h3>
				<p><a href="https://stevewright.nz/protected/wanscam_access.php" target="_blank">Wanscam</a></p>
				<p><a href="https://stevewright.nz/protected/avtech_access.php" target="_blank">Avtech</a></p>
			-->
			<h3>Steve's Blog</h3>
				<p>Steve's Blog is <a title="This is a test version and has been created to prove some concepts."
				class="tooltip" href="https://blog.stevewright.nz/">here</a>.</p>
			
		<h3>Other</h3>	
		<p>I'm working on the mobile look and feel but it is proving to be a bit of a mission.</p>
		<!--
		<p><a href="https://stevewright.nz/google_chart.php" target="_blank">Test Google Chart.</a></p>
		<p><a href="https://stevewright.nz/speedtest_chart.php" target="_blank">Speedtest Chart.</a></p>
		<p><a href="https://stevewright.nz/MKV_tutorial.php" target="_blank">Adding Cover Art to Matroska MKV files.</a></p>
				<p><a href="https://192.168.20.200:80/index.php" target="_blank">My Pi.</a></p>		
		
			<p><input type="button" value="Page to test stuff" onClick="window.open('test.php')"> </p> 
			-->		
			<p><button class="button" onClick="window.open('test.php')">Page to Test Stuff</button></p>
			
	<?php include("lastline.php");?>
			<h3>My Latest Speedtest</h3>
		<!-- speedtest.php is built by running speedtest.pl -->	
	<!--<p>	<?php include("/home/steve/speedtest.php");?> </p> -->
	<p>	<?php include("/home/steve/speedtest-python.php");?> </p>	
	<a href='/home/steve/result.png' <img src='/home/steve/result.png' alt='last speedtest failed' style='width:200px; border:0;'>

	
	</main>
	
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
	
</body> 
</html>
