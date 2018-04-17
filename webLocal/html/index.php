<!DOCTYPE html>
<!-- phpconnect and call for data from DB -->
<?php
    require 'api/connect.php';

    $sql = "SELECT *
            FROM sensor
            ORDER BY id
            DESC LIMIT 1";
    $result = $mysqli->query($sql);


while ($row = $result->fetch_assoc()) {
    $time     =    $row["time"];
    $temp     =    $row["value1"] . "&deg;C";
    $hum         = $row["value2"] . " %RH";
    $light     = $row["value3"] . " (Lux)";
    $soilMValue     = $row["value4"];
    // $soilTemp 	= $row["value5"];
    $min = $row["MIN(value1)"];
}

    $sql = "SELECT  ROUND((MIN(value1)),2) as minTemp, ROUND((MAX(value1)),2) as maxTemp,
                    ROUND((MIN(value2)),2) as minHum, ROUND((MAX(value2)),2) as maxHum,CURDATE()
            FROM sensor
            WHERE DATE(time) = CURDATE()
            ORDER BY id
            DESC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

if (isset($row["minTemp"])) {
    $minT = $row["minTemp"] . "&deg;C";
    $maxT = $row["maxTemp"] . "&deg;C";
    $minH = $row["minHum"] . " %RH";
    $maxH = $row["maxHum"] . " %RH";
    $curDate = $row["CURDATE()"] ;
} else {
    $minT = "N/A";
    $maxT = "N/A";
    $minH = "N/A";
    $maxH = "N/A";
}

if ($soilMValue <= 100 && $soilMValue >= 0) {
    $soilMText = "Dry";
} elseif ($soilMValue <= 200 && $soilMValue >= 101) {
    $soilMText = "Wet";
} elseif ($soilMValue <= 300 && $soilMValue >= 201) {
    $soilMText = "Very wet";
} else {
    $soilMText = "N/A";
}
    ?>
  <!-- phpconnect and call for data from DB -->


  <html lang="en-US">

  <!--
start of head. contains mostly house keeping
--->

  <head>
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="refresh" content="600">
    <link rel="stylesheet" href="css/normalize.css">
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
          <a href="graph.php">
            <img src="img/rain.png" alt="rain cloud" title="Graph">
            <p>Graph</p>
          </a>
        </li>
        <li class="menu-icon">
          <a href="control.php">
            <img src="img/earth.png" alt="earth" title="Control">
            <p>Control</p>
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
        <div id="MINMAX-table-caption">Min & Max
          <br>
          <h6 style="margin: 0;"><?php echo($curDate) ?></h6>
        </div>
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
                <?php echo "$minT"; ?>
            </div>
            <div class="MINMAX-body-cell">
                <?php echo "$maxT"; ?>
            </div>
            <div class="MINMAX-body-cell">
                <?php echo "$minH"; ?>
            </div>
            <div class="MINMAX-body-cell">
                <?php echo "$maxH"; ?>
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
      <div id="pageIdImg">
        <img src="img/greenhouse.png" alt="greenhouse" style="width:100px;height:100px">
      </div>

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
        <a href="http://www.freepik.com/"> freepik</a> from<a href="http://www.flaticon.com"> www.flaticon.com</a>
      </footer>
    </div>
    <!--
Footer
-->


  </body>

  </html>
