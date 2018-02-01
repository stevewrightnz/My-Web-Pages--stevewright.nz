
	<footer class="site-footer">
		<hr>
	<div class="footer-container">
	<!--	<div class="mailtolink">
			 <a href="mailto:steve2wright@gmail.com">E-mail Us</a>
		</div>
		<div class="homelink">
			 <a href="javascript:openHome();" > Home </a>
		</div>
		<div class="footer-column-center contactuslink">
			<a href="javascript:openContact();"> Contact Us </a>
		</div>
	</div>-->
	
	<div class="pgupdated">
<?php
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.
$last_mod = $pagemodified;
print("This page was last modified on ");
print(date(" l F j Y H:i:s T e" ,$last_mod)) ."<br />\r\n";
// print("This site runs on a RPi2 and is optimised for Firefox, Chrome and Edge.") ."<br />\r\n";
print("Copyright &copy; 2015 - ");
print(date(" Y " ,$last_mod));
print("- All Rights Reserved Steve Wright");
?>	

</div>
	</footer>
