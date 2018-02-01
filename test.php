<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="stylesheet" type="text/css" href="wrightfamily.css"

<script src="wrightfamily.js"></script>
<title>Testing Page</title>
<style>

</style>
</head>

<body class="site">

<?php require_once("includes/header.php");

	?>

<main class="site-content">

<h3>Testing Page</h3>	

<h3>To Do.</h3>
<ul>
<li>Add a moderated comment box <br>
	This might take a bit of work over a reasonable length of time.
	<ul>
		<li>Build Form <input type="checkbox" checked></li>
		<li>Use CAPTCHA. <input type="checkbox" checked></li>	
		<li>Create database table - MySQL. (Lamp Stack already installed to run apache) <input type="checkbox" checked></li>
		<li>Build Script to write info to database. (php)</li>
		<li>Part of building the form. <input type="checkbox" checked></li>
		<li>Build Script to email comment detail. (php Post?) <input type="checkbox" checked></li>
		<li>Sort out method of moderation. (Form on web page)</li>
		<li>Use password protected form to update record in database possibly by extracting the record number as part of the Email advising of a new record.</li>
		<li>Build script to construct comments on page, figure out how to trigger when comment approved (Perl or Python) <input type="checkbox" checked></li>
	</ul>
</li>	
<li>Reformat Navigation bar
	<ul>
	<li>Add Drop-down functionality <input type="checkbox" checked></li>
	</ul>
</li>
<li>Mobile devices
	<ul>
	<li>Set up the mobile device version properly <input type="checkbox"></li>
	</ul>
</li>
</ul>
<hr>

<div>
	<p>	<?php include("/home/steve/picture.png");?> </p>	

</div>


<!--<p><input type="button" class="rounded" value="ZoneMinder 1.30.4" onClick="window.open('https://zm.stevewright.nz/zm/')"/></p>-->
<br>
<p><input type="button" class="rounded" value="My Pi" onClick="window.open('https://stevewright.nz/mypi1')"/></p>

<!--a href="http://stevewright.nz/protected/camerafeeds/camera_views.php"> ZoneMinder Cameras</a></p>-->
	
<!--<p><a href="http://stevewright.nz/info.php"> Pi Index Page</a></p>-->
	
<!--<p><a href="https://zm.stevewright.nz/M91pinfo.php"> M91p Index Page</a></p>-->
	
<!--
<h1>Luctus Pharetra Ultricies</h1>

<p><strong>Class</strong> <em>et</em> ut rhoncus parturient. Integer sollicitudin primis euismod vitae. Scelerisque ante eget.
 Augue tempus per et magna auctor. Enim taciti vulputate suspendisse felis turpis porttitor diam cras litora duis at, potenti. 
 Integer taciti cras. Euismod. Senectus euismod massa pharetra, tempor. Dui. Aptent dictum ut pulvinar conubia semper risus lobortis 
 amet sollicitudin, tincidunt accumsan.</p>
 
<h2>Eros</h2>

<p>Tempus condimentum. Vivamus sollicitudin. Hendrerit mattis ultricies convallis porttitor imperdiet sollicitudin montes montes 
vitae et integer Tortor habitasse eget placerat integer gravida. Luctus felis condimentum elementum Pulvinar conubia. Vitae.</p>

<h2>Nullam Maecenas Metus Dolor Massa Nisi Mi Dolor</h2>

<p>Euismod nisi senectus risus metus integer massa senectus <em>laoreet</em> condimentum volutpat quis. Imperdiet. Sagittis magna
 metus. Luctus aenean pede diam proin, eu consectetuer et. Tellus platea convallis auctor quis rhoncus non felis sapien quam. 
 Ullamcorper magna <em>et</em> ante. Pulvinar curabitur quam Mus dictum parturient amet ipsum condimentum.</p>

<p>Molestie mollis sagittis odio dui imperdiet Luctus diam erat interdum aliquet sit. Auctor curabitur tellus tristique 
Sodales eros nisi varius tempus est dignissim <strong>vel</strong> amet cubilia nulla ultricies lobortis congue. Nunc mus 
curae; lacus lectus tempus velit taciti in imperdiet per nullam.</p>

<p>Parturient non at commodo curae; venenatis lorem malesuada vel blandit euismod. Volutpat ad tortor, feugiat mollis malesuada 
eros taciti ultrices torquent ipsum praesent commodo inceptos nullam nam orci eros dui lacus Aliquet. Vitae. Vel Nibh imperdiet 
sed velit nunc varius sapien. Metus porttitor est ante quis eros. Eros posuere varius vitae. Fusce habitant quisque pretium litora 
feugiat <strong>aliquam</strong> nunc dignissim. Fermentum adipiscing.</p>

<h2>Vivamus Natoque Dignissim</h2>

<p>Massa nisi cras eleifend nostra velit dui risus Ridiculus venenatis erat aliquet leo tempus eleifend risus. Elementum imperdiet 
fames, viverra fermentum risus tincidunt lobortis at fermentum sapien orci aptent massa cras mi ante feugiat litora 
odio <strong>feugiat</strong> nisi.</p>

<h2>Semper</h2>

<p>Leo ullamcorper. Curabitur. Habitant. Dui dictum donec sodales Vestibulum porttitor. Arcu imperdiet proin <strong>dis</strong> 
velit conubia eget nibh facilisi amet vitae sit, ut porta eros.</p>
-->

 </main>
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
	</body> 
</html>
