<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="stylesheet" type="text/css" href="wrightfamily.css"> 
<link rel="stylesheet" type="text/css" href="comment.css"> 
<script src="wrightfamily.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<title>Contacts</title>
</head>
<body class="site">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<?php include_once('includes/header.php');?> 
	
	<main class="site-content">
	
	
		<!-- Body Start -->
		<table id="tcontact">
			<!--<tr>
			<td><a href="mailto:wright-family@clear.net.nz">Family Email </a></td>
			</tr> -->
			<tr>
			<td><div>Steve
			
			</div></td>
			<td><div><a href="tel:+6449712020">+64 4 971 2020</a>
			</div></td> 
			<td><div><a href='mailto:<?php echo convert_email_adr('stevewrightnz@hotmail.com'); ?>'> <img src="/images/logos/email.png" alt="Email" style="width:15px;height:15px;"></a>
			</td></div>
			<td><div><a href="https://twitter.com/stevewrightwgtn" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div></td>
			<td><div class="fb-follow" data-href="https://www.facebook.com/SteveWrightWgtn" data-width="50" data-height="20" data-layout="button" data-size="small" data-show-faces="true">
			</div></td>
			<td><div><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-url="https://www.linkedin.com/in/steve-wright-b70941a4?trk=hp-identity-name"></script>
			</div></td>
			<td><div><style>.ig-b- { display: inline-block; } .ig-b- img { visibility: hidden; } .ig-b-:active { background-position: 0 -120px; }
			.ig-b-24 { width: 20px; height: 20px; background: url(/images/logos/ig-badge-20.png) no-repeat 0 0; } @media only screen and (-webkit-min-device-pixel-ratio: 2), 
			only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and 
			(min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {.ig-b-24 { background-image: url(/images/logos/ig-badge-20.png); background-size: 60px 178px; } }</style>
			<a href="https://www.instagram.com/stevewrightnz/?ref=badge" class="ig-b- ig-b-24"><img src="/images/logos/ig-badge-20.png" alt="Instagram" /></a>
			</div></td>
			</tr>
						
			<tr>
			<td><div>Joanne
			</div></td> 
			<td><div><a href="tel:+64212699900">+64 21 269 9900</a>
			</div></td>
			<td><div><a href='mailto:<?php echo convert_email_adr('wright-family@clear.net.nz'); ?>'><img src="/images/logos/email.png" alt="Email" style="width:15px;height:15px;"></a>
			</div></td>
			</tr>
						
			<tr>
			<td><div>Nicko 
			</div></td>	
			<td><div><a href="tel:+64226023426">+64 22 602 3426</a>
			</div></td> 
			<td><div><a href='mailto:<?php echo convert_email_adr('nicowright@gmail.com'); ?>'><img src="/images/logos/email.png" alt="Email" style="width:15px;height:15px;"></a>
			</div></td>
			</tr>
			
			<tr>
			<td><div>Home
			</div></td> 
			<td><div><a href="tel:+6449712020">+64 4 971 2020</a>
			</div></td> 
			<td><div><a href='mailto:<?php echo convert_email_adr('wright-family@clear.net.nz'); ?>'><img src="/images/logos/email.png" alt="Email" style="width:15px;height:15px;"></a>
			</div></td>
			</tr>
		</table>
		
	<div>
	
	<h3>Leave us a message</h3>

	<form id="comments" method="post" action="verify.php" autocomplete="off">
	  	  	    
	  <table>
	    <tr>
	      <td><label for="name">Name:</label></td>
	      <td><input type="text" id="name" name="name" size="48" required placeholder="Your name"></td>
		</tr>
		<tr>
		  <td><label for="email">Email:</label> </td>
		  <td><input type="email" id="email" name="email" size="48" required placeholder="Email address - Never made public!"></td>
		</tr>
		<tr>
		  <td><label for="website">Website:</label></td>
		  <td><input type="url" id="website" name="website" size="48" placeholder="Your website: https://example.com" pattern="https?://.+"></td>
		</tr>
		<tr>
		  <td><label>Comment:</label></td>
		  <td><textarea id="txtbox" name="comment" cols="35" rows="10" required placeholder="Enter a comment"></textarea></td>
		</tr>
		<tr>
		  <td></td>
		  <td> <div class="g-recaptcha" data-sitekey="6Lc9VSITAAAAAFIySrOtjxSfmshgrYT74cDZgK8e"></div> </td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="submit" id="submit" value="Submit"></td>
		</tr>
		<!--<tr><td>
		</td>
		<td><div class="g-recaptcha" data-sitekey="6Lc9VSITAAAAAFIySrOtjxSfmshgrYT74cDZgK8e"></div></td></tr>-->
	  </table>
	</form>	
  </div>
		<?php include_once('getcomments.php');?>
	</main>
		 
	<?php $pagemodified = filemtime(__FILE__);
	include_once("includes/footer.php");?>
</body>

</html>