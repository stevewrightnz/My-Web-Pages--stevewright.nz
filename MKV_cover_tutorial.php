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
<title>Matroska MKV files</title>
</head>

<body class="site">
<?php include_once("includes/header.php")?>
	
	<main class="site-content">
	<h3>Adding Cover Art to Matroska MKV files.</h3>
	<h5>Background</h5>
	<p>This tutorial came about because I couldn't find anything to help me add cover art to my MKV files and had to figure it out by trial and error.  
	It turns out to be fairly simple.  This guide asssumes that you have an	MKV file and the relevant cover art files. See 
	<a href="https://www.matroska.org/technical/cover_art/index.html" target=_blank>here</a> for the files and formats you need.</p>
	
	<h5>Download and install MKVToolNix</h5>
	<p>Download and install the version of MKVToolNix that suits your operating system from <a href="https://mkvtoolnix.download/downloads.html" target=_blank>here.</a></p>
	<p></p>
	<h5>Select Your MKV File</h5>	
	<p>Open the MKVToolNix GUI and select the 'Multiplexer' tab on the left hand side.</p>
	<p><img src="images/mkv/1.png" alt="Multiplexer tab" style="width:600px;"></p>
	<p><img src="images/mkv/2.png" alt="Multiplexer tab" style="width:600px;"></p>
	<p>Select the 'Add files' option and load your MKV file.</p>
	<p>At the bottom of the screen you can change the name of the output file and its location if you want to.</p>
	<h5>Select your Cover Art</h5>	
	<p>Select the 'Header editor' tab.</p>
	<p><img src="images/mkv/3.png" alt="Header editor tab" style="width:600px;"></p>
	<p>Press the 'Open Matroska file' button and locate and open your MKV file.</p>
	<p><img src="images/mkv/4.png" alt="Header editor tab" style="width:600px;"></p>
	<p>Select the 'Attachments' line, press the 'Add attachments button' and choose the cover art files you want to include in the MKV.</p>	
	<p><img src="images/mkv/5.png" alt="Header editor tab" style="width:600px;"></p>
	<p>Save the changes. 
	<p><img src="images/mkv/7.png" alt="Header editor tab" style="width:600px;"></p>	
	<h5>Rebuild the MKV</h5>
	<p>Select the 'Multiplexer' tab.</p>
	<p><img src="images/mkv/6.png" alt="Multiplexer tab" style="width:600px;"></p>	
	<p>Press the 'Start Multiplexing' button.</p>
	<p>Thats pretty much it. Your file will be rebuilt with the cover art added to the resulting MKV.</p>
	<p></p>
	<p></p>
	<p></p>	
	</main>
	
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
	
</body> 
</html>
