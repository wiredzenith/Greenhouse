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
    <script> $("#submit").submit(function( event ) {
    alert( "Handler for .submit() called." );
    event.preventDefault();
    });
    </script>
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
      <div class="form-group"> <!-- Date input -->
        <form method="GET">
        <label class="control-label" for="date">Date: </label>
        <input style="width:70px" class="form-control" id="sDate" name="start_date" placeholder="Start Date" type="text" autocomplete="off"/>
        -   <input style="width:70px" class="form-control" id="eDate" name="end_date" placeholder="End Date" type="text" autocomplete="off"/>
        <button id="btn" type="submit">Submit</button>
     </form>
     <form method="GET" action="">
       <button id="btn" type="submit">Reset</button>
     </form>
     </div>
      <div class="chart-container">
        <canvas id="line-canvas"></canvas>
      </div>
       <script> //jquery-ui script for date $()
       $( function(){
       $( "#sDate" ).datepicker(
       {
         dateFormat : 'yy/mm/dd',
         maxDate: new Date (<?php echo $maxDate ?>),
         minDate:  new Date (<?php echo $minDate ?>),
         showButtonPanel: false,
         showAnim: "explode"
          });
          $( "#eDate" ).datepicker(
          {
            dateFormat : 'yy/mm/dd',
            maxDate: new Date (<?php echo $maxDate ?>),
            minDate:  new Date (<?php echo $minDate ?>),
            showButtonPanel: false,
            showAnim: "explode"
             });
     });

</script>
        <div id="pageIdImg">
        <img src="img/rain.png" alt="rain" style="width:100px;height:100px">
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
