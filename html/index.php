<!DOCTYPE html>

<?php
	include 'php/connect.php';

	$sql = "SELECT * FROM sensor ORDER BY id DESC LIMIT 1";
 	$result = $conn->query($sql);
 ?>

	<html lang="en-US">

	<head>
		<meta http-equiv="refresh" content="600">
		<link rel="stylesheet" href="css/master.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Gahering Greenhouse</title>
	</head>

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
		<div class="page">
			<div class="table">
				<table class="readings" style="width:90%">
					<caption class="table">Current readings</caption>
					<tr>
						<th>Time</th>
						<th>Temperature(&deg;C)</th>
						<th>Humidity(%RH)</th>
						<th>Light (lux)</th>
					</tr>
					<tr>
						<?php
						while($row = $result->fetch_assoc())
						{
							echo "<td>" . $row['time'] . "</td>";
							echo "<td>" . $row['value1'] . "</td>";
							echo "<td>" . $row['value2'] . "</td>";
							echo "<td>" . $row['value3'] . "</td>";
						}
						 ?>
					</tr>
				</table>
			</div>
			<p class="basic">

				<img src="img/greenhouse.png" alt="greenhouse" style="width:100px;hight:100px">
			</p>
		</div>
		</div>
		<div class="footer">
			<footer>Created by: Tomasz Klebek
				<br>Icons made by
				<a href="http://www.freepik.com/">freepik</a>from<a href="http://www.flaticon.com">www.flaticon.com</a>
			</footer>

		</div>
	</body>

	</html>
