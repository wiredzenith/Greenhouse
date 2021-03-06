#include "header.h"

Adafruit_HTU21DF htu = Adafruit_HTU21DF();
Adafruit_TSL2561_Unified tsl = Adafruit_TSL2561_Unified(TSL2561_ADDR_LOW, 666);

//Read in analoge values from soil moisture sensor and convert to
//ranges for sending to MySQL
void soilMoistureCal() //Only for calabration
{
        //range for values for the soil moisture sensor.
        //min(sensor in air) = 260
        //max(sensor in water) = 530

        int soilMoistureCal = analogRead(0);
        // Serial.println(soilMoistureCal);
        delay(200);
}

int soilMoisture()
{
        int soilMoisture = analogRead(0);
        soilMoisture = map (soilMoisture,530,260,0,300);
        soilMoisture = constrain(soilMoisture,0,300);
        return soilMoisture;
}



void configureSensor(void)
{
/*--------------------------------------------------
   setup for TSL2561 light sensor

   adafruit industries, edited by:Tomasz Klebek
   2017/11/21
   -----------------------------------------------------*/

        /* You can also manually set the gain or enable auto-gain support */
        tsl.setGain(TSL2561_GAIN_1X);      /* No gain ... use in bright light to avoid sensor saturation */
        // tsl.setGain(TSL2561_GAIN_16X);     /* 16x gain ... use in low light to boost sensitivity */
        //tsl.enableAutoRange(true);      /* Auto-gain ... switches automatically between 1x and 16x */

        /* Changing the integration time gives you better sensor resolution (402ms = 16-bit data) */
        // tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_13MS);      /* fast but low resolution */
        tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_101MS); /* medium resolution and speed   */
        // tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_402MS);  /* 16-bit data but slowest conversions */

        /* Update these values depending on what you've set above! */
        Serial.println("-----------------TSL2561-----------");
        Serial.print  ("Gain:         "); Serial.println("1X");
        Serial.print  ("Timing:       "); Serial.println("101 ms");
        Serial.println("------------------------------------");
}

void sqlAdd()
{
        float v1=0,v2=0,v3=0,v4=0,v5=0;
        uint16_t broadband = 0;
        uint16_t infrared = 0;
        /* Populate broadband and infrared with the latest values */
        tsl.getLuminosity (&broadband, &infrared);

        v1 = htu.readTemperature();
        Serial.print("Temp:");
        Serial.println(v1);
        delay(500);

        v2 = htu.readHumidity();
        Serial.print("Hum:");
        Serial.println(v2);
        delay(500);

        // sensors_event_t event;
        // tsl.getEvent(&event);
        // v3 = event.light;
        v3 = broadband;
        Serial.print("LUX:");
        Serial.println(v3);
        Serial.println(infrared);
        delay(500);

        v4 = soilMoisture();
        Serial.print("Soil moisture:");
        Serial.println(v4);
        delay(500);

        String uri = "/api/add.php?value=";

        uri += String(v1); //Temperature
        uri += ",";
        uri += String(v2); //Humidity
        uri += ",";
        uri += String(v3);  //Light Level
        uri += ",";
        uri += String(v4); //Soil moisture
        uri += ",";
        uri += String(v5); //value5

        Serial.println(uri);

        CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
}
