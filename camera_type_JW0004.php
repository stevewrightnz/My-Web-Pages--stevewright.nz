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
<title>Wanscam JW0004 IP Camera</title>
</head>

<body class="site">
<?php include("includes/header.php")?>
	
	<main class="site-content">
	<h3>Wanscam JW0004 IP Camera</h3>
	<div>
	<p>This is a set if instructions for setting up a Wanscam JW0004 IP camera on ZoneMinder v1.29.</p>  
	<p>The Pan / Tilt still needs a little bit of work to sort out the sensitivity.</p>
	<p>The control file for the Wanscam is now part of the ZoneMinder package and is complied and installed as part of the process.</p>
	</div>
	
	<p>The settings for the camera are as follows: </p>
	<div>
	<table id="t003">	
		<tr><td><img src="images/camera/jw0004/monitor/general.png" alt=" Monitor- Wanscam - General" style="width:300px;height:300px;"></td></tr>
		<tr><td><img src="images/camera/jw0004/monitor/source.png" alt=" Monitor- Wanscam - Source" style="width:300px;height:300px;"></td></tr>
			<tr><td>The Remote Host Name is the local IP address the camera is on; something like 192.168.XX.XXX.</td></tr>
			<tr><td>The Remote Host Port is the port number the camera is on.</td></tr>
			<tr><td>The Remote Host Path should look something like http://[user]:[pwd]@;[IP_address]:[port]/videostream.cgi?user=[user]&amp;pwd=[pwd]&amp;resolution=32&amp;rate=0</td></tr>
		<tr><td><img src="images/camera/jw0004/monitor/timestamp.png" alt=" Monitor- Wanscam - Timestamp" style="width:300px;height:300px;"></td></tr>
		<tr><td><img src="images/camera/jw0004/monitor/buffers.png" alt=" Monitor- Wanscam - Buffers" style="width:300px;height:300px;"></td></tr>
		<tr><td><img src="images/camera/jw0004/monitor/control.png" alt=" Monitor- Wanscam - Control" style="width:300px;height:300px;"></td></tr>
		<tr><td><img src="images/camera/jw0004/monitor/misc.png" alt=" Monitor- Wanscam - Misc" style="width:300px;height:300px;"></td></tr>
	</table>
	</div>
	<p>Save everything.<br>
	   Reboot!<br>
	   Restart ZoneMinder -- sudo service zoneminder restart </p>
	<p>It should all work now though it might need a little refinement.</p>
		
	</main>
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
		
</body> 
</html>