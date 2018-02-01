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
<title>Let's Encrypt</title>
</head>

<body class="site">

<?php include("includes/header.php")?>

<main class="site-content">

<h3>Let's Encrypt</h3>

<p>Let&rsquo;s&nbsp;Encrypt is a free, automated, and open certificate authority brought to you by the non-profit 
Internet Security Research Group (ISRG).</p>
<p>I've been using Let's Encrypt certificates to encrypt the connections to my web site since the beta version was 
available in December 2015. </p>

<p>You can find them <a href="https://letsencrypt.org/" target="_blank">here</a>.</p>

	</main>
	<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
	</body> 
</html>

