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
<title>Microsoft Lifecam VX5000 Web Camera</title>
</head>

<body class="site">
<?php include("includes/header.php")?>
	
	<main class="site-content">
	<h3>Microsoft Lifecam VX5000 Web Camera</h3>
		<div>
			<p> This is a set of instructions for setting up a Microsoft Lifecam VX5000 webcam on ZoneMinder v1.29<p>
			<p> This is a web cam and not an IP Camera.  
				I've got it plugged into the machine the ZoneMinder Software is running on.</p>
			<p> The settings for the camera are as follows: </p>
			<table id="t003">
				<tr><td><img src="images/camera/vx5000/monitor/general.png" alt="Monitor - VX5000 - General" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/vx5000/monitor/source.png" alt="Monitor - VX5000 - Source" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/vx5000/monitor/timestamp.png" alt="Monitor - VX5000 - Timestamp" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/vx5000/monitor/buffers.png" alt="Monitor - VX5000 - Buffers" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/vx5000/monitor/control.png" alt="Monitor - VX5000 - Control" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/vx5000/monitor/misc.png" alt="Monitor - VX5000 - Misc" style="width:300px;height:300px;"></td></tr>
			</table>
		</div>
		<p>Save everything.<br>
		   Reboot!<br>
		   Restart ZoneMinder -- sudo service zoneminder restart.</p>
	</main>
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
		
</body> 
</html>