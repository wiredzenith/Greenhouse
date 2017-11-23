$(document).ready(function() {

  $.ajax({
    url: "http://localhost/project/chartjs/api/data.php",
    type: "GET",
    success: function(data) {

      var dataValues = JSON.parse(data);

      console.log(dataValues);

      var index = 0;
      alert(dataValues[index].value1);

      //var value = dataValues[index];
//------------------------------
var key=[];
var value=[];
dataValues.forEach(function(item){

  for(i in item)
  {
    key.push(i);
    value.push(item[i]);
  }

});

console.log(key);
console.log(value);
//-----------------------------
      var ctx = $("#line-canvas");

      var chartData = {
        labels: key,
        datasets: [{
          label: "Temperature",
          data: value,
          backgroundColor: "blue",
          borderColor: "lightblue",
          fill: false,
          lineTension: 0,
          pointRadius: 5
        }]
      };
      var options = {
        title: {
          display: true,
          position: "top",
          text: "Graph",
          fontSize: 18,
          fontColor: "black"
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
