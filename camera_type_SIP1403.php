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
<script src="wrightfamily.js"></script>
<title>KaiCong SIP1403</title>
</head>

<body class="site">
<?php include("includes/header.php")?>
	
	<main class="site-content">
	<h3>KaiCong SIP1403</h3>
		<div>
			<p> This is a set of instructions for setting up a KaiCong SIP1403 IP Camera on ZoneMinder v1.30.<p>
			
			<p> The settings for the camera are as follows: </p>
			<table id="t003">
				<tr><td><img src="images/camera/sip1403/monitor/general.png" alt="Monitor - IP602IW - General" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/sip1403/monitor/source.png" alt="Monitor - IP602IW - Source" style="width:300px;height:300px;"></td></tr>
				<tr><td>The Source Path will be something like rtsp://username:password@ip_address/user=username_password=password_channel=1_stream=0.sdp?real_stream.</td></tr>
														
				<tr><td><img src="images/camera/sip1403/monitor/timestamp.png" alt="Monitor - IP602IW - Timestamp" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/sip1403/monitor/buffers.png" alt="Monitor - IP602IW - Buffers" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/sip1403/monitor/control.png" alt="Monitor - IP602IW - Control" style="width:300px;height:300px;"></td></tr>
				<tr><td><img src="images/camera/sip1403/monitor/misc.png" alt="Monitor - IP602IW - Misc" style="width:300px;height:300px;"></td></tr>
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