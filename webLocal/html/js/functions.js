 var arduinoIPWifi = "192.168.1.6/arduino";

function ledON()
{
  var xhttp = new XMLHttpRequest ();
  xhttp.open("GET","//" + arduinoIPWifi + "/digital" + "/10" + "/1" , true);
  xhttp.send();
}

function ledOFF()
{
  var xhttp = new XMLHttpRequest ();
  xhttp.open("GET","//" + arduinoIPWifi + "/digital" + "/10" + "/0" , true);
  xhttp.send();
}

function ledVAL()
{
  var xhttp = new XMLHttpRequest ();
  var output = document.getElementById("myRange").value;
  xhttp.open("GET","//" + arduinoIPWifi + "/analog" + "/10" + "/" + output , true);
  xhttp.send();
}
