<!DOCTYPE html>
<?php

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
<title>Test Google Charting</title>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Download', 'Date'],
 <?php 
 $con = mysqli_connect('192.168.1.210','website','website','speedtest');
 if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
 $query = "SELECT starttime, download FROM `speedtest` GROUP BY starttime ORDER BY starttime";

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['download']."',".$row['date']."],";
 }
 ?>
 
 ]);

 var options = {
 title: 'Speedtest'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>

</head>

<body class="site">

<?php include("includes/header.php")?>
	
	<main class="site-content">
	
	
	    <h3>Line Chart</h3>
 <div id="columnchart" style="width: 900px; height: 500px;"></div>
	
	
	</main>
<?php $pagemodified = filemtime(__FILE__);
	include("includes/footer.php");?>
</body> 
</html>