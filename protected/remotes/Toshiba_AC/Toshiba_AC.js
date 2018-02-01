//-----Toshiba Air Conditioning-----
//-----Temperature Control-----
jQuery(document).ready(function(){
        // This button will increment the value
        $('.tempup').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment only if value is < 30
                if (currentVal < 30)
				{
                  $('input[name='+fieldName+']').val(currentVal + 1);
                  $('.tempdn').val("DN").removeAttr('style');
					var scriptNo = currentVal +1;	  
					var perlName = ("/cgi-bin/blackbean/ToshibaAC/ToshibaACT" + scriptNo + ".pl");
				  	$.get(perlName);
					document.getElementById('pwronoff').innerHTML = "ON";
				}
                else
                {
                	$('.tempup').val("+").css('color','#aaa');
            		$('.tempup').val("UP").css('cursor','not-allowed');
                }
            } else {
                // Otherwise put a 30 there
                $('input[name='+fieldName+']').val(1);
            }
        });
    // This button will decrement the value till 17
    $(".tempdn").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 17) {
            // Decrement one only if value is > 1
            $('input[name='+fieldName+']').val(currentVal - 1);
             $('.tempup').val("UP").removeAttr('style');
				var scriptNo = currentVal -1;	 
				var perlName = ("/cgi-bin/blackbean/ToshibaAC/ToshibaACT" + scriptNo + ".pl");
				$.get(perlName);
				document.getElementById('pwronoff').innerHTML = "ON";
        } else {
            // Otherwise put a 17 there
            $('input[name='+fieldName+']').val(17);
            $('.tempdn').val("DN").css('color','#aaa');
            $('.tempdn').val("DN").css('cursor','not-allowed');
        }
    });
});
//-----End Temperature Control-----

//-----Power Button Control-----
var pwrisOn = true;
localStorage.setItem("pwrisOn", JSON.stringify(pwrisOn));

function pwronoff(){

  if(!JSON.parse(localStorage.getItem("pwrisOn")))	{ 
     console.log(!pwrisOn);   
	pwrisOn=true;
    localStorage.setItem("pwrisOn", JSON.stringify(pwrisOn));
    $.get("/cgi-bin/blackbean/ToshibaAC/ToshibaACPWROFF.pl");
	document.getElementById('pwronoff').innerHTML = "OFF";
	  } else {
    pwrisOn=false;
	localStorage.setItem("pwrisOn", JSON.stringify(pwrisOn));
    console.log(hipwrisOn);
    $.get("/cgi-bin/blackbean/ToshibaAC/ToshibaACPWRON.pl");
	document.getElementById('pwronoff').innerHTML = "ON";
  }
 }
//-----End Power Button Control-----

//-----HIPOWER Control-----
var hipwrisOn = true;
localStorage.setItem("hipwrisOn", JSON.stringify(hipwrisOn));

function hipwronoff(){

  if(!JSON.parse(localStorage.getItem("hipwrisOn")))	{ 
     console.log(!hipwrisOn);   
	hipwrisOn=true;
    localStorage.setItem("hipwrisOn", JSON.stringify(hipwrisOn));
    $.get("/cgi-bin/blackbean/ToshibaAC/ToshibaAChipwroff.pl");
	document.getElementById('hipwronoff').innerHTML = "";
	  } else {
    hipwrisOn=false;
	localStorage.setItem("hipwrisOn", JSON.stringify(hipwrisOn));
    console.log(hipwrisOn);
    $.get("/cgi-bin/blackbean/ToshibaAC/ToshibaAChipwron.pl");
	document.getElementById('hipwronoff').innerHTML = "HIPOWER";
  }
 }
//-----End HIPOWER Control-----

/*//-----ECO Control-----
var ecoisOn = true;
localStorage.setItem("ecoisOn", JSON.stringify(ecoisOn));

function ecoonoff(){

  if(!JSON.parse(localStorage.getItem("ecoisOn")))	{ 
     console.log(!ecoisOn);   
	ecoisOn=true;
    localStorage.setItem("ecoisOn", JSON.stringify(ecoisOn));
    $.get("/cgi-bin/blackbean/ToshibaAC/ToshibaACecooff.pl");
	document.getElementById('ecoonoff').innerHTML = "";
	  } else {
    ecoisOn=false;
	localStorage.setItem("ecoisOn", JSON.stringify(ecoisOn));
    console.log(ecoisOn);
    $.get("/cgi-bin/blackbean/ToshibaAC/ToshibaACecoon.pl");
	document.getElementById('ecoonoff').innerHTML = "ECO";
  }
 }
//-----End ECO Control-----*/


 