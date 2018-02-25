//Data gathering grean house for gathering temperature, humidity,
//soil soilMoisture soil temperature and light levels and storing those
//readdings in a MySQL DB.
//
//Tomasz Klebek
//2017/12/08

#include "includes.h"
#include "defines.h"

#define SERVER_ADDR   "192.168.1.8"

unsigned long previousMillis = 0;
unsigned long previousMillisWifi = 0;

void setup()
{
  Ciao.begin();
  Serial.begin(9600);
  configureSensor();
  Wifi.begin();
}

void loop()
{
  unsigned long currentMillisWifi = millis();
  unsigned long currentMillis = millis();

  if (currentMillisWifi - previousMillisWifi >= 100)
  {
    previousMillisWifi = currentMillisWifi;
    wifiFunction(Wifi);
    analogWrite(10, 255);
  }

  if (currentMillis - previousMillis >= 10000)
  {
    //soilTemp();
    previousMillis = currentMillis;
    sqlAdd();
    analogWrite(9, 255);

  }

}
