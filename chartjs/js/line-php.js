$(document).ready(function(){

  $.ajax({
    url : "http://localhost/project/chartjs/api/data.php",
    type : "GET",
    success : function (data) {
      console.log(data);

      var temp = {
        value1 : [],
        value2 : []
      };

      var ctx = $("#line-canvas");

      var data = {
        labels : ["day1","day2","day3","day4"],
        datasets : [
          {
            label : "Temperature",
            data : id,
            backgroundColor : "blue",
            borderColor : "lightblue",
            fill : false,
            lineTension : 0,
            pointRadius : 5,
          }
        ]
      };
      var options = {
        title : {
          display : true,
          position : "top",
          text : "Graph",
          fontSize : 18,
          fontColor : "black"
        }
      };
      var chart = new Chart(ctx,{
        type : "line",
        data : {},
        options : options
      });


    },
    error : function (data){
      console.log(data);
    }
  });

});
