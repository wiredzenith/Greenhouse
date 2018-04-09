//wifi controll from web
//Tomasz Klebek
//2018/04/06

#include "wifiHeader.h"
unsigned long previousMillis = 0;
unsigned long previousMillisWifi = 0;


void setup()
{
  Serial.begin(9600);
  Wifi.begin();


}

void loop()
{
  wifiFunction(WifiData client);
}
