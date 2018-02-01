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
<title>The Wright's of Plowland</title>
</head>

<body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
	<form id="page-changer" action="" method="post">
    <select name="nav">
        <option value="">Go to page...</option>
        <option value="http://css-tricks.com/">CSS-Tricks</option>
        <option value="http://digwp.com/">Digging Into WordPress</option>
        <option value="http://quotesondesign.com/">Quotes on Design</option>
    </select>
    <input type="submit" value="Go" id="submit" />
</form>
	</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
</body> 
</html>