var arduinoIP = "192.168.1.42";

function ledON()
{
  var xhttp = new XMLHttpRequest ();
  xhttp.open("GET","//" + arduinoIP + "" , true);
  xhttp.send();
}

// http://localhost/api/add.php?value=1,2,3,4,5
// GET//localhost/api/add.php?value=1,2,3,4,5
