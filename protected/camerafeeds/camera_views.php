<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="../favicon.ico" >
<link rel="stylesheet" href="../wrightfamily.css">
<script src="../wrightfamily.js"></script>
<title>Cameras</title>
</head>
<body class="site">
	<?php include('../includes/header.php');?>

	<main class="site-content">
		<!-- Body Start -->
		<h3>Cameras</h3>
		<h4>Front Door</h4>
		<img src="https://zm.stevewright.nz/zm/cgi-bin/nph-zms?mode=jpeg&monitor=1&scale=100&maxfps=25&buffer=1000&user=web&pass=webstream" alt="Front Door"><br><hr><br>
		<h4>Back Door</h4>
		<img src="https://zm.stevewright.nz/zm/cgi-bin/nph-zms?mode=jpeg&monitor=5&scale=50&maxfps=25&buffer=1000&user=web&pass=webstream" alt="Back Door"><br><hr><br>
		<h4>Lounge</h4>
		<img src="https://zm.stevewright.nz/zm/cgi-bin/nph-zms?mode=jpeg&monitor=4&scale=100&maxfps=25&buffer=1000&user=web&pass=webstream" alt="Lounge"><br><hr><br>
		<h4>Driveway</h4>
		<img src="https://zm.stevewright.nz/zm/cgi-bin/nph-zms?mode=jpeg&monitor=3&scale=50&maxfps=25&buffer=1000&user=web&pass=webstream" alt="Driveway"><br><hr><br>
		<!-- Body End -->
		</main>

	<?php $pagemodified = filemtime(__FILE__);
	include("../includes/footer.php");?>
</body>
</html>