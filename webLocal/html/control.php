<!DOCTYPE html>
<html lang="en-US">

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
  <link rel="stylesheet" href="css/master.css">
  <script type="text/javascript" src="js/functions.js"></script>
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
  <div class="page">

      <div class="controls">
        <div id="controlLight">
          <p>
            <h3>Lights</h3>
            <button id="btn" type="button" onclick="ledON();">ON</button>
            <button id="btn" type="button" onclick="ledOFF();">OFF</button>
          </p>
          <h3 style="margin: 40px 0">Lights Status: </h3> <h2 style="color:red"> OFF</h2>
        </div>
        <div id="controlFan">
          <p>
            <h3>Fan Speed</h3>
            <div class="slidecontainer">
              <input onchange="ledVAL()" type="range" min="0" max="255" value="125" class="slider" id="myRange">
              <p>Value: <span id="demo"></span></p>
              <h3 style="margin: 30px 0">Current Fan Speed: </h3><h2> xxx RPM</h2>
              <script>
                var slider = document.getElementById("myRange");
                var output = document.getElementById("demo");
                output.innerHTML = slider.value;
                slider.oninput = function() {output.innerHTML = this.value;}
              </script>
            </div>
          </p>
        </div>
        <div id="controlHeat">
          <p>
            <h3>Heater</h3>
          </p>
        </div>
    </div>
    <p class="basic">
      some text abotu thinns
    </p>
    <div id="pageIdImg">
      <img src="img/earth.png" alt="earth" style="width:100px;height:100px">
    </div>
  </div>
  <div class="footer">
    <footer>Created by: Tomasz Klebek
      <br>Icons made by
      <a href="http://www.freepik.com/"> freepik</a> from<a href="http://www.flaticon.com"> www.flaticon.com</a>
    </footer>

  </div>
</body>

</html>
