    <!DOCTYPE html>
    <html lang="en">
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>

    <body class="site">
    <main>
    <button href="#" class="buttonb" onclick="onoff()"><img class="on-button" src="images/power.png" alt="ON"></button>

    </main>
    <script>
    var isOn=false;
    function onoff(){
	  if(isOn)	{ 
	  isOn=true;
	  console.log(isOn);
	  window.location.href="/cgi-bin/ToshibaACPWRON.pl"
	}else {
      isOn=false;
	  console.log(isOn);
	  window.location.href="/cgi-bin/ToshibaACPWROFF.pl"
    }
    }
    </script>
    </body> 
    </html>