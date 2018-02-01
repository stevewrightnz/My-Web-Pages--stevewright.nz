

<?php 

	require_once 'dbconfig.php';
	/* Your Database Name */
    $dbname = 'speedtest';
    try {
      /* Establish the database connection */
      $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  	/* Function to convert datetime string to JSON compatible datetime
	   Borrowed from here: https://www.agcross.com/2014/10/using-php-to-convert-mysql-datetimes-to-javascript-format/ */	
	
	function JSdate($in,$type){
		if($type=='date'){
			//Dates are patterned 'yyyy-MM-dd'
			preg_match('/(\d{4})-(\d{2})-(\d{2})/', $in, $match);
		} elseif($type=='datetime'){
			//Datetimes are patterned 'yyyy-MM-dd hh:mm:ss'
			preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $in, $match);
		}
		 
		$year = (int) $match[1];
		$month = (int) $match[2] - 1; // Month conversion between indexes
		$day = (int) $match[3];
		 
		if ($type=='date'){
			return "Date($year, $month, $day)";
		} elseif ($type=='datetime'){
			$hours = (int) $match[4];
			$minutes = (int) $match[5];
			$seconds = (int) $match[6];
			return "Date($year, $month, $day, $hours, $minutes, $seconds)";    
		}
	}
	  
	  
	  
//DOWNLOAD CHART


      /* select all the weekly tasks from the table googlechart */
      $dresult = $conn->query('SELECT starttime, download FROM speeddata');


      $drows = array();
      $dtable = array();
      $dtable['cols'] = array(

        // Labels for your chart, these represent the column titles.
        array('label' => 'StartTime', 'type' => 'datetime'),
        array('label' => 'Download Speed', 'type' => 'number')//,
		//array('label' => 'Server', 'type' => 'string', 'role' => 'tooltip')
    );
        /* Extract the information from $result */
        foreach($dresult as $d) {
		
		$date = JSdate($d['starttime'],datetime);
		//echo JSdate($d['starttime'],datetime);	
        $dtemp = array();
					
          // the following line will be used to slice the chart+
        		
		$new_value = array(); 
		for ($i=0; $i < count($new_value); 
		$i++): array_push($new_value, $date[$i]); 
		endfor;
				
		$dtemp[] = array('v' => $date); 
		 
          // Values of each slice

          $dtemp[] = array('v' => (DOUBLE) $d['download']); 
		  $dtemp[] = array('v' =>  $d['server_name']); 
		  
          $drows[] = array('c' => $dtemp);
 
		}

    $dtable['rows'] = $drows;

	
#UPLOAD CHART	
      /* select all the weekly tasks from the table googlechart */
      $uresult = $conn->query('SELECT starttime, upload FROM speeddata');


      $urows = array();
      $utable = array();
      $utable['cols'] = array(

        // Labels for your chart, these represent the column titles.
        array('label' => 'StartTime', 'type' => 'datetime'),
        array('label' => 'Upload Speed', 'type' => 'number'),
		//array('label' => 'Ping', 'type' => 'number')
    );
        /* Extract the information from $result */
		foreach($uresult as $u) {
		
		$date = JSdate($u['starttime'],datetime);
	//echo JSdate($d['starttime'],'datetime');	
        $utemp = array();
					
          // the following line will be used to slice the chart+
        		
		$new_value = array(); 
		for ($i=0; $i < count($new_value); 
		$i++): array_push($new_value, $date[$i]); 
		endfor;
				
		$utemp[] = array('v' => $date); 		 
          // Values of each slice

          $utemp[] = array('v' => (DOUBLE) $u['upload']); 
		 // $temp[] = array('v' => (DOUBLE) $r['server_name']); 
		  
          $urows[] = array('c' => $utemp);
 
		}

    $utable['rows'] = $urows;
	
	
#PING CHART	
      /* select all the weekly tasks from the table googlechart */
      $presult = $conn->query('SELECT starttime, server_ping, server_name FROM speeddata');


      $prows = array();
      $ptable = array();
      $ptable['cols'] = array(

        // Labels for your chart, these represent the column titles.
        array('label' => 'StartTime', 'type' => 'datetime'),
        array('label' => 'Ping', 'type' => 'number'),
		//array('label' => 'Ping', 'type' => 'number')
    );
        /* Extract the information from $result */
		foreach($presult as $p) {
		
		$date = JSdate($p['starttime'],datetime);
	//echo JSdate($p['starttime'],'datetime');	
        $ptemp = array();
					
          // the following line will be used to slice the chart+
        		
		$new_value = array(); 
		for ($i=0; $i < count($new_value); 
		$i++): array_push($new_value, $date[$i]); 
		endfor;
				
		$ptemp[] = array('v' => $date); 		 
          // Values of each slice

          $ptemp[] = array('v' => (DOUBLE) $p['server_ping']); 
		  $temp[] = array('v' => (STRING) $r['server_name']); 
		  
          $prows[] = array('c' => $ptemp);
 
		}

    $ptable['rows'] = $prows;	
	
	// convert data into JSON format
    $djsonTable = json_encode($dtable);
    //echo $djsonTable;
    $ujsonTable = json_encode($utable);
    //echo $ujsonTable;     
	$pjsonTable = json_encode($ptable);
    //echo $pjsonTable;    
	
	} catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
	
    ?>

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
		<title>Speedtest Data</title>
		<!--Reload page on resize-->
		<script type="text/javascript">
		var currheight = document.documentElement.clientHeight;
		window.onresize = function(){
			if(currheight != document.documentElement.clientHeight) {
			location.replace(location.href);
			}    
		}
		</script>
        <!--Load the Ajax API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(downloadChart);
        google.setOnLoadCallback(pingChart);
		google.setOnLoadCallback(uploadChart);
		
        function downloadChart() {

          // Create our data table out of JSON data loaded from server.
          var ddata = new google.visualization.DataTable(<?=$djsonTable?>);
          var options = {
               //title: 'Speedtest Data',
			   //titleposition: 'none',
              is3D: 'true',
              width: '100%',
              height: 500,
			  //explorer: {},
			  lineWidth: 1,
			  hAxis:{title: 'Time', 
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : { fontSize: 8} // or the number you want
					},
			  vAxis:{title: 'Speed Mbit/s'},
			  legend: { position: 'bottom' },
			  chartArea: { top: 45, height: '40%',
							backgroundColor: {
							stroke: '#ccc',
							strokeWidth: 1}
						 },
			  trendlines: { 0: {color: 'red', 
								fontSize: 3,
								tooltip: false, 
								opacity: 0.75,
								pointsVisible: false,	

								} 
						  },    // Draw a trendline for data series 0.
						  
			
			  tooltip: {textStyle: {
							fontSize: 8,
							bold: true,
							//italic: true,
							// The color of the text.
							//color: '#871b47',
							// The color of the text outline.
							//auraColor: '#d799ae',
							// The transparency of the text.
							opacity: 1,
						},				  
						}	
											
            };
			
			//google.visualization.PatternFormat("Time: {0}").dateformat(data, [0], 'yyyy-MM-dd');
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID

          var chart = new google.visualization.LineChart(document.getElementById('download_chart_div'));
          chart.draw(ddata, options);
		 
		 	
		}
		
        function uploadChart() {

          // Create our data table out of JSON data loaded from server.
          var udata = new google.visualization.DataTable(<?=$ujsonTable?>);
           var options = {
               //title: 'Speedtest Data',
			   //titleposition: 'none',
              is3D: 'true',
              width: '100%',
              height: 500,
			  lineWidth: 1,
			  hAxis:{title: 'Time', 
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : { fontSize: 8} // or the number you want
					},
			  vAxis:{title: 'Speed Mbit/s'},
			  legend: { position: 'bottom' },
			  chartArea: { top: 45, height: '40%',
							backgroundColor: {
							stroke: '#ccc',
							strokeWidth: 1}
						 },
			  trendlines: { 0: {color: 'red', 
								fontSize: 3,
								tooltip: false, 
								opacity: 0.3,
								pointsVisible: false,	

								} 
						  },    // Draw a trendline for data series 0.
						  
			
			  tooltip: {textStyle: {
							fontSize: 8,
							bold: true,
							//italic: true,
							// The color of the text.
							//color: '#871b47',
							// The color of the text outline.
							//auraColor: '#d799ae',
							// The transparency of the text.
							opacity: 1,
						},				  
						}			  
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
 		         
		  var chart = new google.visualization.LineChart(document.getElementById('upload_chart_div'));
          chart.draw(udata, options);
		}		
		
		function pingChart() {

          // Create our data table out of JSON data loaded from server.
          var pdata = new google.visualization.DataTable(<?=$pjsonTable?>);
          var options = {
               //title: 'Speedtest Data',
			   //titleposition: 'none',
              is3D: 'true',
              width: '100%',
              height: 500,
			  lineWidth: 1,
			  hAxis:{title: 'Time', 
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : { fontSize: 8} // or the number you want
					},
			  vAxis:{title: 'Speed Mbit/s'},
			  legend: { position: 'bottom' },
			  chartArea: { top: 45, height: '40%',
							backgroundColor: {
							stroke: '#ccc',
							strokeWidth: 1}
						 },
			  trendlines: { 0: {color: 'red', 
								fontSize: 3,
								tooltip: false, 
								opacity: 0.3,
								pointsVisible: false,	

								} 
						  },    // Draw a trendline for data series 0.
						  
			
			  tooltip: {textStyle: {
							fontSize: 8,
							bold: true,
							//italic: true,
							// The color of the text.
							//color: '#871b47',
							// The color of the text outline.
							//auraColor: '#d799ae',
							// The transparency of the text.
							opacity: 1,
						},				  
						}			  
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
		  
          var chart = new google.visualization.LineChart(document.getElementById('ping_chart_div'));
          chart.draw(pdata, options);
		}

        </script>

	</head>

     <body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
        <!--this is the div that will hold the pie chart-->
		<h3> Speed test data</h3>
		<p>Connection:- 200/20Mbit/s Ultra Fast Broadband - FibreX by Vodafone NZ.</p>
		<p>Hardware profile:-</p>
		<ul>
			<li>Linux box running Ubuntu 16.04</li>
			<li>Gigabit wired Ethernet connection running through a standard Vodafone issue HG659 Router and Technicolor broadband modem</li>
			<li>CAT 6 Cabling</li>
		</ul>
		<p>The following charts show Speedtest results run since mid-January 2016.</p>	
		
		<div id="chart_title">Download Speed</div>
        <div id="download_chart_div"></div>
		<hr><br>
		<div id="chart_title">Upload Speed</div>
        <div id="upload_chart_div"></div>
		<hr><br>
		<div id="chart_title">Ping</div>
		<div id="ping_chart_div"></div>
		
		<p>These results are used for determining long term trends and for monitoring 
		excessive drops in speed.</p>

		</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>	
      </body>
    </html>