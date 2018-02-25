void wifiFunction(WifiData client)
{
  String wifiString = client.readStringUntil('/');
  if (wifiString == "analog") {
    analogString(client);
  }
}

void analogString(WifiData client)
{
  int pin,value;

  pin = client.parseInt();

  if (client.read() == '/')
  {
    value = client.parseInt();

    analogWrite(pin, value);

    client.println("HTTP/1.1 200 OK\n");
    client.println("Testing Hu?");
    client.print(EOL);
  }
}
