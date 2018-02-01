	
	<div class="notes">
		<p class="right">The TLS/SSL certificates used on this website are issued by <a href="https://letsencrypt.org/" target="_blank">
			<img class="le" src="images/logos/le-logo-standard.png" alt="Let's Encrypt"/></a></p>
	</div>	

	<footer class="site-footer">
	<div class="footer-container">
		<div class="mailtolink">
			 <a href='mailto:<?php echo convert_email_adr('steve2wright@gmail.com'); ?>'> E-mail Us </a>
		</div>
		<div class="homelink">
			 <a href="javascript:openHome();"> Home </a>
		</div>
		<div class="footer-column-center contactuslink">
			<a href="javascript:openContact();"> Contact Us </a>
		</div>
	</div>
	
	<div class="pgupdated">
<?php
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.
$last_mod = $pagemodified;
print("This page was last modified on ");
print(date(" l F j Y H:i:s T e" ,$last_mod)) ."<br />\r\n";
//print("This site runs on a RPi2 and is optimised for Firefox, Chrome and Edge.") ."<br />\r\n";
print("Copyright &copy; 2015 - ");
print(date(" Y " ,$last_mod));
print("- Steve Wright. All Rights Reserved");
?>	
</div>
	</footer>
