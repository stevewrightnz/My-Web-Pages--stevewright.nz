<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="stylesheet" href="navbar.css">
    <title>HTML5 Navigation Bar</title>
</head>
<body>
<div>
    <nav>
        <ul>
            <li style="float: left;"><a href="http://stevewright.nz/">Home</a></li>
			<li style="float: left;"><a href="http://stevewright.nz/genealogy.php">Genealogy</a></li>
            <li style="float: left;"><a href="http://blog.stevewright.nz/">Blog</a></li>
			<li style="float: left;"><a href="http://blog.stevewright.nz/about.php">About</a></li>
            <li style="float: left;"><a href="http://stevewright.nz/contact.php">Contact Us</a></li>
			<li style="float: right;">
				<form method="get" action="http://www.google.com/search">
					<table class="search">
					<th>
						<input type="text" class="rounded" name="q" size="25" maxlength="150" value="" />
						<input type="submit" class="rounded" value="Search" />
					</th>
					<tr><td>
						<div class="radio" >
							<input type="radio" name="sitesearch" value="" checked /> The Web 
							<input type="radio" name="sitesearch" value="stevewright.nz" /> stevewright.nz 
							<input type="radio" name="sitesearch" value="blog.stevewright.nz" /> blog.stevewright.nz 
						</div>
					</td></tr>
					</table>
				</form></a></li>
        </ul>
    </nav>
</div>
</body>
</html>