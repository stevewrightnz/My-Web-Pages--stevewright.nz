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
<script src="https://stevewright.nz/protected/remotes/Toshiba_AC/Toshiba_AC.js"></script>
<link rel="stylesheet" type="text/css" href="s.css">

</head>

<body ="startTime()">
<main>

<div class="container">
<h2 style="text-align:center;">TOSHIBA</h2>

<!-- Put a Screen in here -->
<div class="screen">
	<div class="scr-top">
	<br/>
	</div>

	<div class="scr-middle">
		<div class="scr-middle-left">
			<div><input type='text' name='quantity' value='20' class='tempno' maxlength='2'/></div>
		</div>	
		<div class="scr-middle-right">
			<div id="time" class="time"></div>
		</div>
	</div>	
	

</div>
<!-- End of Screen -->





















<div class="space-even">
<a href="http://example.com" class="buttonc">SLEEP</a>
<a href="http://example.com" class="buttonc"><div class="dn-arrow">&#x25BC;</div></a>
<a href="http://example.com" class="buttonc"><div class="dn-arrow">&#x25BC;</div></a>
<a href="http://example.com" class="buttonc">SET</a>
</div>
</div>
</main>



<script>

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML =
    // h + ":" + m + ":" + s;
	 h + ":" + m;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</body> 
</html>