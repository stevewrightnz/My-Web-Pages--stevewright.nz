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
<title>Wanscam Access</title>
</head>

<body class="site">

<?php include("../includes/header.php")?>
	

	<main class="site-content">
		<!-- Body Start -->
		<p><input type="button" value="Avtech Control (int)" onClick="location.href='http://192.168.1.102:98/index.htm'"></p> <!-- 121.73.156.37:98 -->
		<p><input type="button" value="Avtech Control (ext)" onClick="location.href='https://www.stevewright.nz' + ':98/index.htm'"></p> <!-- 121.73.156.37:99 -->
		
<!--		
		<div class="wcfluidMedia">
			<iframe src='http://192.168.20.103:99/index.htm'> </iframe>
		</div>
		<!-- Body End -->
		</main>
	<?php $pagemodified = filemtime(__FILE__);
	include("../includes/footer.php");?>
	</body> 
</html>