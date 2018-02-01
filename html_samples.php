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
<title>HTML, CSS and PHP stuff</title>
</head>

<body class="site">

<?php include("includes/header.php")?>

<main class="site-content">
<p>This stuff is really here so that I can find it again when I need it.</p>
<h3>HTML Stuff</h3>
<p> </p>
<hr>

<h3>CSS Stuff</h3>
<p> Importing site wide fonts</p>
<p> Placing <code>@import url(https://fonts.googleapis.com/css?family=Raleway); </code> at the top of your CSS file will import the Google 
	Raleway font family.</p>
<p> This is used by adding "Raleway" to the font-family declaration in your CSS files like 
	this <code>font-family: "Raleway", Helvetica, sans-serif; </code><p>
<hr>

<h3>PHP Stuff</h3>
<p>A simple PHP script to print the date a web page was last modified.</p>
<pre><code> 
Last updated: &lt;?php url="http://www.example.com/"; //change the url to suit
                    $a= (get_headers($url,1));
                    $c = date("l F j Y T e", strtotime($a['Last-Modified']));
                    print_r ($c);
                    echo ("."); ?&gt;
</code></pre>
<p>Will produce this:- </p>

<p>Last updated: <?php $url="http://www.example.com/"; //change the url to suit
                    $a= (get_headers($url,1));
                    $c = date("l F j Y T e", strtotime($a['Last-Modified']));
					print_r ($c);
                    echo (".");
					?>
</p>
<!---OR-
<pre><code>
&lt;? $file="http://www.example.com/index.html";
		{
		  if(is_file($file))
  		  {
		    $mod_date=date("l F j Y H:i:s T e. ", filemtime($file));
    	    echo "Last Updated:  ". $mod_date;
  		  }
 		  else
  		  {
		  echo "Data not currently available";
  		  }
		}
		?&gt;
</code></pre>
<p>Will produce this:- </p> -->
<?php
/*				$file="http://www.example.com/index.htm";
				{
				  if(is_file($file))
  				  {
				    $mod_date=date("l F j Y H:i:s T e. ", filemtime($file));
    			  echo "Last Updated:  ". $mod_date;
  				  }
 				  else
  				  {
				  echo "Data not currently available";
  				  }
				}*/
			?>

</main>
<?php $pagemodified = filemtime(__FILE__);
include("includes/footer.php");?>
</body> 
</html>