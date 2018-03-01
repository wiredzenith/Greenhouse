$(document).ready(function() {

  $.ajax({
    url: "../api/data.php",
    type: "GET",
    success: function(data) {

      var dataValues = JSON.parse(data);

      //console.log(dataValues);

      var index = 0;
      //  alert(dataValues[index].value1);

      //var value = dataValues[index];
      //------------------------------
      var date = [];
      var temp = [];
      var hum = [];
      for (i in dataValues) {
        console.log(i);
        date.push(dataValues[i].Date);
        temp.push(dataValues[i].value1);
        hum.push(dataValues[i].value2);
        console.log("Date: " + dataValues[i].Date);
        console.log("Value: " + dataValues[i].value1);
        console.log("Value2: " + dataValues[i].value2);
      }

      //let date = value.filter((_,i) => i % 2 == 0);
      //let temp = value.filter((_,i) => i % 2 == 1);
      // console.log("Test"+ dataValues[0].value1);
      // console.log(dataValues[0].Date);



      // console.log(key);
      // console.log(value);
      // console.log(temp);
      // console.log(date);
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
            pointRadius: 2
          },
          {
            label: "Humidity",
            data: hum,
            backgroundColor: "blue",
            borderColor: "lightblue",
            fill: false,
            hitRadius: 5,
            lineTension: 1,
            pointRadius: 2
          }
        ]
      };
      var options = {
        responsive: true,
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
