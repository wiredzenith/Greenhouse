<!DOCTYPE html>
<html lang="en-US">

<head>
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
    <button id="btn" type="button" onclick="ledON();">ON</button>
    <button id="btn" type="button" onclick="ledOFF();">OFF</button>
    <div class="slidecontainer">
      <input onchange="ledVAL()" type="range" min="0" max="255" value="125" class="slider" id="myRange">
      <p>Value: <span id="demo"></span></p>
      <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
          output.innerHTML = this.value;
        }
      </script>
      <div id="controlLight">
        <p>

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
  </div>
  <div class="footer">
    <footer>Created by: Tomasz Klebek
      <br>Icons made by
      <a href="http://www.freepik.com/"> freepik</a> from<a href="http://www.flaticon.com"> www.flaticon.com</a>
    </footer>

  </div>
</body>

</html>
