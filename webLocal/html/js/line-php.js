$(document).ready(function() {

  $.ajax({
    url: "../api/data.php",
    type: "GET",
    success: function(data) {

      var dataValues = JSON.parse(data);

      console.log(dataValues);

      var index = 0;
    //  alert(dataValues[index].value1);

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
let date = value.filter((_,i) => i % 2 == 0);
let temp = value.filter((_,i) => i % 2 == 1);


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
          lineTension: 0,
          pointRadius: 4
        }]
      };
      var options = {
        responsive: false,
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
