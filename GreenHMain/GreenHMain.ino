//Data gathering grean house for gathering temperature, humidity,
//soil soilMoisture soil temperature and light levels and storing those
//readdings in a MySQL DB.
//
//Tomasz Klebek
//2017/12/08

#include "includes.h"
#include "defines.h"

#define SERVER_ADDR   "192.168.1.4"

unsigned long previousMillis = 0;

void setup()
{
  Ciao.begin();
  Serial.begin(9600);
  configureSensor();
}

void loop()
{
  sqlAdd();
  Serial.println(soilMoisture());
  delay(200);
}
