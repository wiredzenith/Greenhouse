<!DOCTYPE html>
<!-- phpconnect and call for data from DB -->
<?php
	include 'api/connect.php';

	$sql = "SELECT * FROM sensor ORDER BY id DESC LIMIT 1";
 	$result = $mysqli->query($sql);

	while($row = $result->fetch_assoc()){
		$time 	=	$row["time"];
		$temp 	=	$row["value1"] . "&deg;C";
		$hum 		= $row["value2"] . " %RH";
		$light 	= $row["value3"] . " (Lux)";
		$soilMValue 	= $row["value4"];
		// $soilTemp 	= $row["value5"];
		}

if ($soilMValue <= 100 && $soilMValue >= 0) {
	$soilMText = "Dry";
}
elseif ($soilMValue <= 200 && $soilMValue >= 101) {
	$soilMText = "Wet";
}
elseif ($soilMValue <= 300 && $soilMValue >= 201) {
	$soilMText = "Very wet";
}
else {
	$soilMText = "N/A";
}

 ?>
<!-- phpconnect and call for data from DB -->


<html lang="en-US">

	<!--
start of head. contains mostly house keeping
--->

	<head>
		<meta http-equiv="refresh" content="600">
		<link rel="stylesheet" href="css/master.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Gahering Greenhouse</title>
	</head>
	<!--
End of head
--->

	<!--
start of Body. contains menubar with icons and titles
--->

	<body>
		<div class="menubar">
			<ul class="menu">
				<li class="menu-icon">
					<a href="index.php">
						<img src="img/greenhouse.png" alt="greenhouse" title="Home">
						<p>Home</p>
					</a>
				</li>
				<li class="menu-icon">
					<a href="temp.php">
						<img src="img/rain.png" alt="rain cloud" title="Temp">
						<p>Temp</p>
					</a>
				</li>
				<li class="menu-icon">
					<a href="history.php">
						<img src="img/earth.png" alt="earht" title="history">
						<p>History</p>
					</a>
				</li>
				<li class="menu-icon" style="float:right">
					<a class="active" href="about.php">
						<img src="img/atomic-energy.png" alt="energy" title="About">
						<p>About</p>
					</a>
				</li>
			</ul>
		</div>

		<!--
END of Body. contains menubar with icons and titles
--->

		<!-- start of class page -->
		<div class="page">

			<!-- title of landing page -->
			<h1 id="title">Data Gathering Greenhouse</h1>
			<h4 id="subtitle">A dyanamic system for gathering and displaying enviromental data</h4>
			<!-- title of landing page -->

			<!--
start of first table (readings)
 -->
			<div id="readings-table">
				<div id="readings-table-caption">Current readings</div>
				<div id="readings-table-header">
					<div class="readings-header-cell">
						Time
					</div>
					<div class="readings-header-cell">
						Temperature
					</div>
					<div class="readings-header-cell">
						Humidity
					</div>
					<div class="readings-header-cell">
						Light
					</div>
					<div class="readings-header-cell">
						Soil Moisture
					</div>
				</div>
				<div id="readings-table-body">
					<div class="readings-table-row">
						<div class="readings-body-cell">
							<?php echo "$time"; ?>
						</div>
						<div class="readings-body-cell">
							<?php echo "$temp"; ?>
						</div>
						<div class="readings-body-cell">
							<?php echo "$hum"; ?>
						</div>
						<div class="readings-body-cell">
							<?php echo "$light"; ?>
						</div>
						<div class="readings-body-cell">
							<?php echo "$soilMText"; ?>
						</div>
					</div>
				</div>
			</div>
			<!--
End of first table (readings)
-->

			<!--
End of first table
-->

			<!--
start of second table (MinMax)
-->
			<div id="MINMAX-table">
				<div id="MINMAX-table-caption">Min & Max</div>
				<div id="MINMAX-table-header">
					<div class="MINMAX-header-cell">
						Temp(&deg;C) MIN
					</div>
					<div class="MINMAX-header-cell">
						Temp(&deg;C) MAX
					</div>
					<div class="MINMAX-header-cell">
						Humidity (%RH) MIN
					</div>
					<div class="MINMAX-header-cell">
						Humidity (%RH) MAX
					</div>
				</div>
				<div id="MINMAX-table-body">
					<div class="MINMAX-table-row">
						<div class="MINMAX-body-cell">
							temp
						</div>
						<div class="MINMAX-body-cell">
							Cell 1–2
						</div>
						<div class="MINMAX-body-cell">
							Cell 1–3
						</div>
						<div class="MINMAX-body-cell">
							Cell 1–4
						</div>
					</div>
				</div>
			</div>
			<!--
End of second table
-->

			<!--
page indentifier image
-->

			<img id="pageIdImg" src="img/greenhouse.png" alt="greenhouse" style="width:100px;hight:100px">

			<!--
page indentifier image
-->

		</div>
		<!-- end of class page -->

		<!--
Footer
-->
		<div class="footer">
			<footer>Created by: Tomasz Klebek
				<br>Icons made by
				<a href="http://www.freepik.com/">freepik</a>from<a href="http://www.flaticon.com">www.flaticon.com</a>
			</footer>
		</div>
		<!--
Footer
-->


	</body>

</html>
