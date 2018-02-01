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
<title>Avtec IP602IW IP Camera</title>
</head>

<body class="site">
<?php include("includes/header.php")?>
	
	<main class="site-content">
	<h3> Avtec IP602IW IP Camera</h3>
		<div>
			<p> This is a set of instructions for setting up an Avtec IP602IW IP camera on ZoneMinder v1.29.<p>
			<p> I still have to sort out the detail for the control file for this camera but the Wanscam one seems to work for now.</p>
			<p> The settings for the camera are as follows: </p>
			
			<table id="t003">
				<tr><td><img src="images/camera/avtec/monitor/general.png" alt="Monitor - IP602IW - General" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/avtec/monitor/source.png" alt="Monitor - IP602IW - Source" style="width:300px;height:300px;"></td></tr>
					<tr><td>The Remote Host Name is the local IP address the camera is on; something like 192.168.XX.XXX.</td></tr>
					<tr><td>The Remote Host Port is the port number the camera is on.</td></tr>
					<tr><td>The Remote Host Path should look something like http://[user]:[pwd]@;[IP_address]:[port]/videostream.cgi?user=[user]&amp;pwd=[pwd]&amp;resolution=32&amp;rate=13</td></tr>
				<tr><td><img src="images/camera/avtec/monitor/timestamp.png" alt="Monitor - IP602IW - Timestamp" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/avtec/monitor/buffers.png" alt="Monitor - IP602IW - Buffers" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/avtec/monitor/control.png" alt="Monitor - IP602IW - Control" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/avtec/monitor/misc.png" alt="Monitor - IP602IW - Misc" style="width:300px;height:300px;"></td></tr>
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