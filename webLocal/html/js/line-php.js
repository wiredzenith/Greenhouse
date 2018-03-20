$(document).ready(function() {

  $.ajax({
    url: "../api/data.php",
    type: "GET",
    success: function(data) {

      var dataValues = JSON.parse(data);

      //------------------------------

      var date = [];
      var temp = [];
      var hum = [];
      for (i in dataValues) {
        //console.log(i);
        date.push(dataValues[i].Date);
        temp.push(dataValues[i].value1);
        hum.push(dataValues[i].value2);
        //console.log("Date: " + dataValues[i].Date);
        //console.log("Value: " + dataValues[i].value1);
        //console.log("Value2: " + dataValues[i].value2);
        var dt = $("#datepicker").datepicker('getDate');
        console.log("date time: " + dt);
      }

      //-----------------------------
      var ctx = $("#line-canvas");

      var chartData = {
        labels: date,
        datasets: [{
            label: "Temperature",
            data: temp,
            backgroundColor: "darkgreen",
            borderColor: "lightgreen",
            fill: false,
            hitRadius: 5,
            lineTension: 1,
            pointRadius: 1
          },
          {
            label: "Humidity",
            data: hum,
            backgroundColor: "blue",
            borderColor: "lightblue",
            fill: false,
            hitRadius: 5,
            lineTension: 1,
            pointRadius: 1
          }
        ]
      };
      var options = {
        responsive: false,
        title: {
          display: false,
          position: "top",
          text: "Graph",
          fontSize: 18,
          fontColor: "black"
        },
        tooltips: {
          mode: 'index',
          intersect: true
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 20,
            bottom: 20
          }
        },
        zoom: {
          enabled: true,
          mode: 'x',
        }
      };
      var chart = new Chart(ctx, {
        type: "line",
        data: chartData,
        options: options
      });
    },
    error: function(data) {
      console.log(data);
    }
  });

});
