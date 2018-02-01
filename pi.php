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
<title>Pi</title>
</head>
<body class="site">
	<?php 

	include('includes/header.php');?>
	<main class="site-content">
		<!-- Body Start -->
		<p>I recently bought a Raspberry Pi with the intention of making our son a MineCraft Server.</p>
		<p>It has since grown to include a home security camera monitor and is also hosting these web pages.</p>
		
		<table id='t001'>
		
		<tr>
			<td>Model:</td>
			<td>Raspberry Pi 2</td>
		</tr>		
		<tr>
			<td>OS:</td>
			<td>Raspbian - based on debian wheezy</td>
		</tr>
		<tr>
			<td>Storage:</td>
			<td>32gb micro SD card</td>
		</tr>
		<tr>
			<td>Software:</td>
			<td>A MineCraft Server<br>
				ZoneMinder<br>
				Our Web Pages</td>
		</tr>
		</table>

		<!-- Body End -->
	</main>
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>	
</body>

</html>