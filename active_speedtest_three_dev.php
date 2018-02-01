

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
      $dresult = $conn->query('SELECT starttime, download, upload FROM speeddata');


      $drows = array();
      $dtable = array();
      $dtable['cols'] = array(

        // Labels for your chart, these represent the column titles.
        array('label' => 'StartTime', 'type' => 'datetime'),
        array('label' => 'Download Speed', 'type' => 'number'),
		array('label' => 'Upload Speed', 'type' => 'number')//,
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
		  $dtemp[] = array('v' => (DOUBLE) $d['upload']);
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


        <!--Load the Ajax API
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">


        // Load the current API and the corechart package.
        google.charts.load('current', {packages: ['corechart']});

        // Set a callback to run when the Google current API is loaded.
	    google.charts.setOnLoadCallback(downloadChart);
        google.charts.setOnLoadCallback(pingChart);
		google.charts.setOnLoadCallback(uploadChart);	

		// Create Charts
		function downloadChart() {

          // Create our data table out of JSON data loaded from server.
          var ddata = new google.visualization.DataTable(<?=$djsonTable?>);
          var options = {
              //title: 'Speedtest Data',
			  //titleposition: 'omit',
              is3D: 'false',
              width: '100%',
              height: 500,
			  //explorer: {},
			  lineWidth: 1,
			  
			  	  
			  hAxis:{title: 'Time',
					titleTextStyle: {color: 'black',
									 fontSize: 18},
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : {color: 'black',
								 fontSize: 12} 
					},
					
			  vAxis:{title: 'Speed Mbit/s',
					 titleTextStyle: {color: 'black',
									  fontSize: 18}
					},
			  
			  legend:{position: 'bottom',
					 textStyle:{color: 'black',
							    fontSize: 10}
					 },
			  
			  chartArea:{top: 30, height: '70%',
						 left: 75,
						 right: 50,
						 backgroundColor: {
						 stroke: '#ccc',
						 strokeWidth: 1}
						 },

			  trendlines:{0: {color: 'red',
							  lineWidth: 2,
							  fontSize: 3,
							  tooltip: false, 
							  opacity: 0.75,
							  pointsVisible: false,	
							  visibleInLegend: true
						
						 } 
						  },    // Draw a trendline for data series 0.
						  
			
			  tooltip:{textStyle: {
						 color: 'black',
						 fontSize: 10,
						 bold: true,
						 //italic: true,
						 // The color of the text.
						 //color: '#871b47',
						 // The color of the text outline.
						 //auraColor: '#d799ae',
						 // The transparency of the text.
						 //opacity: 1,
						 }				  
						}	
			};
			

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
			  //titleposition: 'omit',
              is3D: 'false',
              width: '100%',
              height: 500,
			  //explorer: {},
			  lineWidth: 1,
			  
			  	  
			  hAxis:{title: 'Time',
					titleTextStyle: {color: 'black',
									 fontSize: 18},
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : {color: 'black',
								 fontSize: 12} 
					},
					
			  vAxis:{title: 'Speed Mbit/s',
					 titleTextStyle: {color: 'black',
									  fontSize: 18}
					},
			  
			  legend:{position: 'bottom',
					 textStyle:{color: 'black',
							    fontSize: 10}
					 },
			  
			  chartArea:{top: 30, height: '70%',
						 left: 75,
						 right: 50,
						 backgroundColor: {
						 stroke: '#ccc',
						 strokeWidth: 1}
						 },

			  trendlines:{0: {color: 'red',
							  lineWidth: 2,
							  fontSize: 3,
							  tooltip: false, 
							  opacity: 0.75,
							  pointsVisible: false,	
							  visibleInLegend: true
						
						 } 
						  },    // Draw a trendline for data series 0.
						  
			
			  tooltip:{textStyle: {
						 color: 'black',
						 fontSize: 10,
						 bold: true,
						 //italic: true,
						 // The color of the text.
						 //color: '#871b47',
						 // The color of the text outline.
						 //auraColor: '#d799ae',
						 // The transparency of the text.
						 //opacity: 1,
						 }				  
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
			  //titleposition: 'omit',
              is3D: 'false',
              width: '100%',
              height: 500,
			  //explorer: {},
			  lineWidth: 1,
			  
			  	  
			  hAxis:{title: 'Time',
					titleTextStyle: {color: 'black',
									 fontSize: 18},
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : {color: 'black',
								 fontSize: 12} 
					},
					
			  vAxis:{title: 'Time ms',
					 titleTextStyle: {color: 'black',
									  fontSize: 18}
					},
			  
			  legend:{position: 'bottom',
					 textStyle:{color: 'black',
							    fontSize: 10}
					 },
			  
			  chartArea:{top: 30, height: '70%',
						 left: 75,
						 right: 50,
						 backgroundColor: {
						 stroke: '#ccc',
						 strokeWidth: 1}
						 },

			  trendlines:{0: {color: 'red',
							  lineWidth: 2,
							  fontSize: 3,
							  tooltip: false, 
							  opacity: 0.75,
							  pointsVisible: false,	
							  visibleInLegend: true
						
						 } 
						  },    // Draw a trendline for data series 0.
						  
			
			  tooltip:{textStyle: {
						 color: 'black',
						 fontSize: 10,
						 bold: true,
						 //italic: true,
						 // The color of the text.
						 //color: '#871b47',
						 // The color of the text outline.
						 //auraColor: '#d799ae',
						 // The transparency of the text.
						 //opacity: 1,
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
		<h4>Hardware profile</h4>
		<ul>
			<li>Linux box running Ubuntu 16.04</li>
			<li>Gigabit wired Ethernet connection running through a standard Vodafone issue HG659 Router and Technicolor broadband modem</li>
			<li>CAT 6 Cabling</li>
		</ul>
		<h4>Software profile</h4>
		<ul>
			<li>Perl script triggering speedtest-cli by Sivel available from <a href = https://github.com/sivel/speedtest-cli target=_blank>here</a></li>
		</ul>
		<h4>Repair Log</h4> 
		<p>This log records repairs to the network carried out to try and fix speed issues. Goal is to get upload speed consistantly 
		   between 180 and 200Mbits/s and the upload speed to between 18 and 20 Mbits/s.</p>
		<p><b>17 April 2017</b> - Downer Technician analysed Vodaforne network - determined there was a fault in the street 
		                          which probably effects 3 of 4 customers locally.  Connection apparently wired backwards for FibreX.<p>
		<p><b>19 April 2017</b> - Vodafone chased up Downers again.</p>
		<p>Away for a week</p>
		<p><b>28 April 2017</b> - Vodafone completed the required reconfiguration of the cabinet at the top of the street.</p>
		<p><b>04 May 2017</b> - Vodafone Modem replaced. Router not replaced at this stage.  
		                        Will monitor speed over the next few weeks and report back.</p>
		<p><b>05 May 2017</b> - Download maybe starting to stabilise - time will tell.</p>
		<p><b>29 May 2017</b> - Well time did tell - nearly a month and I've still got a crappy connection.  Have messaged Vodafone 
								yet again to have another go at getting it sorted.</p>
		
		
		
		<h4>Test Results</h4>
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
