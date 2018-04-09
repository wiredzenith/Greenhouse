//Data gathering grean house for gathering temperature, humidity,
//soil soilMoisture soil temperature and light levels and storing those
//readdings in a MySQL DB.
//
//Tomasz Klebek
//2018/04/06

#include "header.h"
unsigned long previousMillis = 0;

void setup()
{
        Ciao.begin();
        Serial.begin(9600);
        configureSensor();
}

void loop()
{
  unsigned long currentMillis =  millis();
 Serial.println(millis());
        if (currentMillis - previousMillis >= 3600000)
        {
                previousMillis = currentMillis;
                sqlAdd();
        }
}
