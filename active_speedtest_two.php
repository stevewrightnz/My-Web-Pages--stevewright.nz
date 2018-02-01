<?php
	require_once 'dbconfig.php';
	/* Your Database Name */
    $dbname = 'speedtest';
    try {
      /* Establish the database connection */
      $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
//DOWNLOAD CHART
      /* select all the weekly tasks from the table googlechart */
      $dresult = $conn->query('SELECT starttime, download FROM speeddata');


      $drows = array();
      $dtable = array();
      $dtable['cols'] = array(

        // Labels for your chart, these represent the column titles.
        /* 
            note that one column is in "string" format and another one is in "number" format 
            as pie chart only required "numbers" for calculating percentage 
            and string will be used for Slice title
        */

        array('label' => 'StartTime', 'type' => 'string'),
        array('label' => 'Download Speed', 'type' => 'number'),
		//array('label' => 'Ping', 'type' => 'number')
    );
        /* Extract the information from $result */
        foreach($dresult as $d) {

          $dtemp = array();

          // the following line will be used to slice the chart

          $dtemp[] = array('v' => (string) $d['starttime']); 

          // Values of each slice

          $dtemp[] = array('v' => (DOUBLE) $d['download']); 
		 // $temp[] = array('v' => (DOUBLE) $r['server_name']); 
		  
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
        /* 
            note that one column is in "string" format and another one is in "number" format 
            as pie chart only required "numbers" for calculating percentage 
            and string will be used for Slice title
        */

        array('label' => 'StartTime', 'type' => 'string'),

		array('label' => 'Upload Speed', 'type' => 'number')   
		//array('label' => 'Server Name', 'type' => 'string')
    );
        /* Extract the information from $result */
       foreach($uresult as $u) {

          $utemp = array();

          // the following line will be used to slice the chart

          $utemp[] = array('v' => (string) $u['starttime']); 

          // Values of each slice


		  $utemp[] = array('v' => (DOUBLE) $u['upload']); 
	      //$ptemp[] = array('v' => (string) $p['server_name']); 	  
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
        /* 
            note that one column is in "string" format and another one is in "number" format 
            as pie chart only required "numbers" for calculating percentage 
            and string will be used for Slice title
        */

        array('label' => 'StartTime', 'type' => 'string'),

		array('label' => 'Ping Time', 'type' => 'number')   
		//array('label' => 'Server Name', 'type' => 'string')
    );
        /* Extract the information from $result */
       foreach($presult as $p) {

          $ptemp = array();

          // the following line will be used to slice the chart

          $ptemp[] = array('v' => (string) $p['starttime']); 

          // Values of each slice


		  $ptemp[] = array('v' => (DOUBLE) $p['server_ping']); 
	      //$ptemp[] = array('v' => (string) $p['server_name']); 	  
          $prows[] = array('c' => $ptemp);
        }

    $ptable['rows'] = $prows;		
	
	// convert data into JSON format
    $djsonTable = json_encode($dtable);
    //echo $djsonTable;
    $pjsonTable = json_encode($ptable);
    //echo $pjsonTable;    
    $ujsonTable = json_encode($utable);
    //echo $ujsonTable; 	
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
        <!--Load the Ajax API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
              width: 1000,
              height: 500,
			  hAxis:{title: 'Time', 
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : { fontSize: 8} // or the number you want
					},
			  vAxis:{title: 'Speed Mbit/s'},
			  legend: { position: 'bottom' },
			  chartArea: { top: 45, height: '40%' }
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
			   //titleposition: 'none',
              is3D: 'true',
              width: 1000,
              height: 500,
			  hAxis:{title: 'Time', 
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : { fontSize: 8} // or the number you want
					},
			  vAxis:{title: 'Speed Mbit/s'},
			  legend: { position: 'bottom' },
			  chartArea: { top: 45, height: '40%' }
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
              width: 1000,
              height: 500,
			  hAxis:{title: 'Time', 
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : { fontSize: 8} // or the number you want
					},
			  vAxis:{title: 'Milliseconds'},
			  legend: { position: 'bottom' },
			  chartArea: { top: 45, height: '40%' }

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
		<p>The following charts show Speedtest results run since January 2016.</p>	
		<div id="chart_title"><center>Download Speed</center></div>
        <center><div id="download_chart_div"></div></center>
		<hr><br>
		<div id="chart_title"><center>Upload Speed</center></div>
        <center><div id="upload_chart_div"></div></center>
		<hr><br>
		<div id="chart_title"><center>Ping</center></div>
		<center><div id="ping_chart_div"></div></center>
		
		<p>These results are used for determining long term trends and for monitoring 
		excessive drops in speed.</p>
		<p>There would appear to be are a number of reliability issues 
		with the speedtest-cli and speedtest-cli extras results when run on high speed 
		connections.</p>
		</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>	
      </body>
    </html>