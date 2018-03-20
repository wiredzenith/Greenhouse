<!DOCTYPE html>

<html lang="en-US">

  <head>
    <link rel="stylesheet" href="css/master.css">
    <script type="text/javascript" src="js/line-php.js"></script>
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
      <div class="chart-container">
        <canvas id="line-canvas"></canvas>
        <!-- <form action="api/data.php"> -->
        <!-- <form name="Date" method="GET">
          <label for="start_date">Start Date: </label>
          <input type="date" id="start_date" name="start_date">
          <label for="end_date"> End Date: </label>
          <input type="date" id="end_date" label="End Date: " name="end_date">
      <div>
        <input type="submit">
      </div>
      </form> -->
      <form method="post">
        <div class="form-group"> <!-- Date input -->
          <label class="control-label" for="date">Date</label>
          <input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text"/>
        </div>
        <div class="form-group"> <!-- Submit button -->
          <button class="btn btn-primary " name="submit" type="submit">Submit</button>
        </div>
       </form>
       <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
      <script src="js/moment.min.js"></script>
      <script src="js/Chart.min.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/chartjs-plugin-zoom.js"></script>
      <script src="js/hammer.js"></script>
      <script src="js/line-php.js"></script>
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
