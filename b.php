<doctype html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="Toshiba_AC.css">

<title>Increment/Decrement</title>

<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">


jQuery(document).ready(function(temp){
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
                // Increment only if value is < 20
                if (currentVal < 30)
                {
                  $('input[name='+fieldName+']').val(currentVal + 1);
                  $('.tempdn').val("DN").removeAttr('style');
								}
                else
                {
                	$('.tempup').val("UP").css('color','#aaa');
            			$('.tempup').val("UP").css('cursor','not-allowed');
                }
            } else {
                // Otherwise put a 0 there
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
        // If it isn't undefined or its greater than 17
        if (!isNaN(currentVal) && currentVal > 17) {
            // Decrement one only if value is > 1
            $('input[name='+fieldName+']').val(currentVal - 1);
             $('.tempup').val("UP").removeAttr('style');
			} else {
            // Otherwise put a 17 there
            $('input[name='+fieldName+']').val(17);
			$('.tempdn').val("DN").css('color','#aaa');
            $('.tempdn').val("DN").css('cursor','not-allowed');
        }
    });
});




</script>
</head>
<body>


<div>
<div class="screen">
	<input type='text' name='quantity' value='20' class='tempno' />
	<br/>
	<div class="space-even">
		<div id="onoff" class="stat"> </div> 
		<div id="time" class="time"></div>
	</div>
</div>
     <h1>Input Number Incrementer</h1>

    <form id='myform' method='POST' action='#' class="numbo">
    <input  type='button' value='UP' class='tempup' field='quantity' style="font-weight: bold;" /><br>
    
	<!--<input type='text' name='quantity' value='20' class='qty' style="margin-bottom: 0px !important" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/><br>-->
    
	<input type='button' value='DN' class='tempdn' field='quantity' style="font-weight: bold;" />
    </form>

</div>


	   <div class="button-cluster">
          <div><a id="buttond" class="tempup" field='quantity' ><div class="up-arrow">&#x25B2;</div></a></div> <!--&#10148;-->
		  
		  <div class="temp-div">TEMP</div>
          
		  <div><a id="buttone"class="tempdn"field='quantity' ><div class="dn-arrow">&#x25BC;</div></a></div>
       </div>






</body>
</html>