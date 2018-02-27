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
var date=[];
var temp=[];
  for(i in dataValues)
  {
    console.log(i);
    date.push(dataValues[i].Date);
    temp.push(dataValues[i].value1);
    console.log("Date: " + dataValues[i].Date);
    console.log("Value: " + dataValues[i].value1);
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
