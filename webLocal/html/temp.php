<!DOCTYPE html>
<?php
  include 'api/connect.php';

  $sql = "SELECT  MIN(DATE_FORMAT(time, '%Y,%m -1,%d')) AS dateMin,
                  MAX(DATE_FORMAT(time, '%Y,%m -1,%d')) AS dateMax
          FROM sensor
          ORDER BY id
          DESC LIMIT 1";

  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();

  $minDate = $row["dateMin"];
  $maxDate = $row["dateMax"];
?>

<html lang="en-US">

  <head>
    <script src="js/moment.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/chartjs-plugin-zoom.js"></script>
    <script type="text/javascript" src="js/line-php.js"></script>
    <script src="js/hammer.js"></script>
    <script src="js/line-php.js"></script>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Gahering Greenhouse <?php echo $minDate ?></title>
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
      <div class="chart-container">
        <canvas id="line-canvas"></canvas>
      <form method="GET">
        <div class="form-group"> <!-- Date input -->
          <label class="control-label" for="date">Date: </label>
          <input class="form-control" id="datepicker" name="date" placeholder="DD/MM/YYY" type="text"/>
        </div>
        <div class="form-group"> <!-- Submit button -->
          <button class="btn-primary" type="submit">Submit</button>
        </div>
       </form>
       <script> //jquery-ui script for date picker
       $( function(){
       $( "#datepicker" ).datepicker({
         dateFormat : 'dd/mm/yy',
         maxDate: new Date (<?php echo $maxDate ?>),
         minDate:  new Date (<?php echo $minDate ?>),
         showButtonPanel: true,
         showAnim: "explode"
          });
     });

</script>
      <p class="basic">
        <img src="img/rain.png" alt="rain" style="width:100px;hight:100px">
      </p>
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
