<?php

require_once 'dbconfig.php';
$dbname = 'comments';
//define variables

try {
	//connect to batabase
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	//echo "Connected to database $dbname at $host successfully. <br>";
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = ("SELECT comment_no, name, comment, entered ,publish
				FROM comment 
				
				ORDER BY comment_no DESC");
				
		$result = $pdo->query($sql);
	}
	//connection error
	catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
?>


        <div id="container">
            <h3>Comments left by others (un-moderated)</h3>
            <table id = 'comments'>
			<tbody>
			<?php foreach ($result as $row) {
			echo
				"<tr>	<td>".$row['comment'] . " <br/>					
						<span class='comments_small'>". $row[comment_no] . "-- Submitted by: ".$row['name']." 
						 on ".$row['entered'] . "</span> <br> </td>
				</tr>\n";
			}
			$pdo->close;
			?>
			</tbody>
			</table>	
			</div>		
				

				
	
				

