//Data gathering grean house for gathering temperature, humidity,
//soil soilMoisture soil temperature and light levels and storing those 
//readdings in a MySQL DB.
//
//Tomasz Klebek
//2017/11/21

#include <includes.h>
#include <defines.h>

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
