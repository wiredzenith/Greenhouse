// var arduinoIP = "192.168.1.42/arduino/dig";

function ledON()
{
  var xhttp = new XMLHttpRequest ();
  xhttp.open("GET","//" + arduinoIP + "/13" + "/1" , true);
  xhttp.send();
}
