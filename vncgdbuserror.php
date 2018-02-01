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
<title>VNC GDBus Error</title>
</head>

<body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
		
	<h3>VNC GDBus Error</h3>
	<p>To fix the "GDBus Error:org freedesktop.PolicyKit1 Error.Failed; An Authentication agent already exists for the given subject" error do either of the following:-</p>
		<ol> 
		<li> <ol><li>Run <code>lxsession-edit</code> as root from a terminal window within the VNC session.</li>
				 <li>Remove the tick from LXPolKit and save.</li>
			 </ol>
		</li>
		<p>or if that option is not available then cancel and:-</p>
		<li> <ol> <li>Run <code>sudo nano /etc/xdg/autostart/lxpolkit.desktop</code> from a terminal window.</li>
			      <li>Change the line that says <code>Hidden=true</code> to <code>Hidden=false</code>
				  and save the file</li>
				  <li>Run <code>lxsession-edit</code> from a terminal window within the VNC session.</li>
				  <li>Remove the tick from LXPolKit and save.</li>
			 </ol>
			<p>and reboot the Pi.</p>
		</ol>

	
	</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
</body> 
</html>