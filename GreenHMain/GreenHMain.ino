//Data gathering grean house for gathering temperature, humidity,
//soil soilMoisture soil temperature and light levels and storing those
//readdings in a MySQL DB.
//
//Tomasz Klebek
//2017/12/08

#include "header.h"
unsigned long previousMillisWifi = 0;
unsigned long previousMillis = 0;


void setup()
{
        Ciao.begin();
        // Wifi.begin();
        Serial.begin(9600);
        configureSensor();

}

void loop()
{
        unsigned long currentMillisWifi = millis();
        unsigned long currentMillis = millis();

        if (currentMillisWifi - previousMillisWifi >= 100)
        {
                previousMillisWifi = currentMillisWifi;
                // wifiFunction(Wifi);
                sqlAdd();
        }

        // if (currentMillis - previousMillis >= 10000)
        // {
        //         previousMillis = currentMillis;
        //         analogWrite(11, 255);
        //         sqlAdd();
        // }



}
