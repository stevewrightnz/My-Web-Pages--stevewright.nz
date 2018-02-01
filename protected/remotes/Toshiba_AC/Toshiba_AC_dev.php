<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="author" content="Steve Wright">
<link rel="shortcut icon" href="favicon.ico" >
<title>Toshiba AC</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stevewright.nz/protected/remotes/Toshiba_AC/Toshiba_AC_dev.js"></script>
<link rel="stylesheet" type="text/css" href="https://stevewright.nz/protected/remotes/Toshiba_AC/Toshiba_AC_dev.css">

</head>

<body onload="startTime()">
<main>
<div class="container">
<h2 class="h2">TOSHIBA</h2>
<!-- Put a Screen in here -->
<div class="screen">
	<div class="scr-top">
	<br/>
	</div>
	<div class="scr-middle">
		<div class="space-even">
			<div id="temp" class='temp'><input type='text' name='quantity' value='20' class='tempno' maxlength='2'/></div>
			<div id="tempdeg"><sup>o</sup>C</div>
			<div></div>
			
		</div>		
<div id="time" class="time"></div>
	</div>	

	<div class="scr-bottom">
		<table>
			<tr>
				<td><div id="pwronoff" class="pwronoff"> </div> </td>
				<td><div id="hipwronoff" class="hipwronoff"> </div> </td>
				<td><div id="ecoonoff" class="ecoonoff"> </div> </td>
			</tr>
		</table>
	<!--
		<div class="space-even">
			<div id="pwronoff" class="pwronoff">|</div> 
			<div id="hipwronoff" class="hipwronoff">|</div>
			<div id="ecoonoff" class="ecoonoff">|</div>
		</div>-->
		
	</div>
</div>
<!-- End of Screen -->
<div class="top-div">
<div class="space-even">
<span class="text-row-a">PRESET</span>
<span class="text-row-a">&nbsp;</span>
<span class="text-row-a">FAN</span>
</div>

<div class="space-even">
	<!-- Preset button -->
	<div style="float:left;">	
		<button class="buttona" onclick=""></button>
	</div>
	<!-- End Preset Button -->
	<!--Up/Temp/Down button cluster-->		
	<div class="button-cluster">
	    <div><a id="buttond" class="tempup" field='quantity'><div class="up-arrow">&#x25B2;</div></a></div> <!--&#10148;-->
	    <div class="temp-div">TEMP</div>
		<div><a id="buttone" class="tempdn" field='quantity'><div class="dn-arrow">&#x25BC;</div></a></div>
	</div>
	<!-- Mode Button -->
	<div style="float:right;">
		<button class="buttona" onclick=""></button>
	</div>   
	<!-- End Mode Button -->
</div>
	
<div class="space-even">

<span class="text-row-a" style="white-space: nowrap;">ONE-TOUCH</span>
<span class="text-row-b">&nbsp;</span>
<span class="text-row-a">MODE</span>
</div>



<div class="space-even">
	<!-- One Touch Button -->
	<div class="flleft">
		<button class="buttona" onclick=""></button>
	</div>
	<!-- End One Touch Button -->
	<div>
		<button class="button-on" onclick="pwronoff()"></button>
	</div>
	<!-- Mode Button -->
	<div class="flright">
		<button class="buttona" onclick=""></button>
	</div>
	<!-- End Mode Button -->
</div>

</div>

<!--
<br>

<div class="bottom-div">
<div>
<div class="space-even">
<span class="text-row-c">QUIET</span>
<span class="text-row-c">&nbsp;</span>
<span class="text-row-c">&nbsp;</span>
<span class="text-row-c">COMFORT<br>SLEEP</span>
</div>

<div>
<a href="http://example.com" class="buttonc">&nbsp;</a>
<a href="http://example.com" class="buttonc" style="float:right;">&nbsp;</a>
</div>
</div>

<div>
<div class="space-even">
<span class="text-row-c">SWING</span>
<span class="text-row-c">FIX</span>
<span class="text-row-c">HI POWER</span>
<span class="text-row-c">ECO</span>
</div>
<div class="space-even">
<a href="http://example.com" class="buttonc">&nbsp;</a>
<a href="http://example.com" class="buttonc">&nbsp;</a>
<!--HI POWER Button -->
<!--<button href="#" class="buttonc" onclick="hipwronoff()"></button> <!--HIPOWER-->
<!--<button href="#" class="buttonc"onclick="ecoonoff()"></button><!--ECO-->
<!--</div>

</div>
<div>
<div class="space-even">
<span class="text-row-c">FLOOR</span>
<span class="text-row-c">TIMER</span>
<span class="text-row-d">&nbsp;</span>
</div>
<div class="space-even">
<a href="http://example.com" class="buttonc">&nbsp;</a>
<a href="http://example.com" class="buttonc"><div class="up-arrow">&#x25B2;</div></a>
<a href="http://example.com" class="buttonc"><div class="up-arrow">&#x25B2;</div></a>
<a href="http://example.com" class="buttonc">CLR</a>
</div>
</div>
<div>
<div class="space-even">
<span class="text-row-d">&nbsp;</span>
<span class="text-row-d">ON</span>
<span class="text-row-d">OFF</span>
<span class="text-row-d">&nbsp;</span>
</div>
<div class="space-even">
<a href="http://example.com" class="buttonc">SLEEP</a>
<a href="http://example.com" class="buttonc"><div class="dn-arrow">&#x25BC;</div></a>
<a href="http://example.com" class="buttonc"><div class="dn-arrow">&#x25BC;</div></a>
<a href="http://example.com" class="buttonc">SET</a>
</div>
</div>
</div>-->

<div class="button-div">
<p><button class="button-return" onClick="location.href = 'https://stevewright.nz/remotes.php'">Return to Main Page</button> </p>
</div>

</div>
<!-- JavaScript test button-->
<!--<div>

 <input href="#" type="button" class="button-return" value="OFF" onclick="myOff()">
 <input href="#" type="button" class="button-return" value="ON" onclick="myOn()">
 <button href="#" type="button" class="button-return" onclick="hipwronoff()">ON / OFF</button>
</div>-->
<div>

</div>
</main>



<script>


//-----MODE-----


var modearr = [];









</script>


<!-- 
 <div class="pwr-button-cluster">
          <input href="#" type="button" class="buttonf" value="ON" onclick="myOn()">
		  <div class="pwr-div">POWER</div>
          <input href="#" type="button" class="buttong" value="OFF" onclick="myOff()">
 </div>
 -->

	   <!--<div class="button-cluster">
          <div ><a href="http://example.com" class="buttond" onclick="tempup"><div class="up-arrow">&#x25B2;</div></a></div> 
		  <div class="temp-div">TEMP</div>
          <div ><a href="http://example.com" class="buttone"><div class="dn-arrow">&#x25BC;</div></a></div>
       </div>-->
</body> 
</html>