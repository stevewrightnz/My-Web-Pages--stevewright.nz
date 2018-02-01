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
<title>ZoneMinder</title>
</head>
<body class="site">
	<?php include('../includes/header.php');?>

	<main class="site-content">
		<!-- Body Start -->
		<div class="zmfluidMedia">
			<iframe src="https://zm.stevewright.nz/zm"> </iframe>
		</div>
		<!-- Body End -->
		</main>

	<?php $pagemodified = filemtime(__FILE__);
	include("../includes/footer.php");?>
</body>
</html>
