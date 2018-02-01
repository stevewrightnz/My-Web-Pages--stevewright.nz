<?php
	require_once 'dbconfig.php';
	/* Your Database Name */
    $dbname = 'speedtest';
    try {
      /* Establish the database connection */
      $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      /* select all the weekly tasks from the table googlechart */
      $result = $conn->query('SELECT starttime, download FROM speeddata');

      /*
          ---------------------------
          example data: Table (googlechart)
          --------------------------
          weekly_task     percentage
          Sleep           30
          Watching Movie  10
          job             40
          Exercise        20       
      */



      $rows = array();
      $table = array();
      $table['cols'] = array(

        // Labels for your chart, these represent the column titles.
        /* 
            note that one column is in "string" format and another one is in "number" format 
            as pie chart only required "numbers" for calculating percentage 
            and string will be used for Slice title
        */

        array('label' => 'StartTime', 'type' => 'string'),
        array('label' => 'Download Speed', 'type' => 'number')

    );
        /* Extract the information from $result */
        foreach($result as $r) {

          $temp = array();

          // the following line will be used to slice the Pie chart

          $temp[] = array('v' => (string) $r['starttime']); 

          // Values of each slice

          $temp[] = array('v' => (DOUBLE) $r['download']); 
          $rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    // echo $jsonTable;
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
        google.setOnLoadCallback(drawChart);
     

		
		
        function drawChart() {

          // Create our data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(<?=$jsonTable?>);
          var options = {
               //title: 'Speedtest Data',
			   //titleposition: 'none',
              is3D: 'true',
              width: 1000,
              height: 400,
			  hAxis:{title: 'Time', 
					direction:1, 
					slantedText:true, 
					slantedTextAngle:90,
					textStyle : { fontSize: 8} // or the number you want
					},
			  vAxis:{title: 'Speed Mbit/s'},
			  legend: { position: 'bottom' },
			  chartArea: { top: 55, height: '40%' }
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        </script>
      </head>

     <body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
        <!--this is the div that will hold the pie chart-->
		<h3> Speed test data</h3>
        <center><div id="chart_div"></div></center>
		</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>	
      </body>
    </html>