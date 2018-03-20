#include "header.h"

Adafruit_HTU21DF htu = Adafruit_HTU21DF();
Adafruit_TSL2561_Unified tsl = Adafruit_TSL2561_Unified(TSL2561_ADDR_FLOAT, 666);

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

//Read in analoge values from soil moisture sensor and convert to
//ranges for sending to MySQL
//
//Tomasz Klebek
//2017/11/21

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
        // Serial.println("Soil Moisture");
        // Serial.print(soilMoisture);
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
        // tsl.setGain(TSL2561_GAIN_1X);      /* No gain ... use in bright light to avoid sensor saturation */
        // tsl.setGain(TSL2561_GAIN_16X);     /* 16x gain ... use in low light to boost sensitivity */
        tsl.enableAutoRange(true);      /* Auto-gain ... switches automatically between 1x and 16x */

        /* Changing the integration time gives you better sensor resolution (402ms = 16-bit data) */
        // tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_13MS);      /* fast but low resolution */
        tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_101MS); /* medium resolution and speed   */
        // tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_402MS);  /* 16-bit data but slowest conversions */

        /* Update these values depending on what you've set above! */
        Serial.println("-----------------TSL2561-----------");
        Serial.print  ("Gain:         "); Serial.println("Auto");
        Serial.print  ("Timing:       "); Serial.println("101 ms");
        Serial.println("------------------------------------");
}




// Data wire is plugged into pin 7 on the Arduino

// Setup a oneWire instance to communicate with any OneWire devices (not just Maxim/Dallas temperature ICs)
// OneWire oneWire(ONE_WIRE_BUS);
// // Pass our oneWire reference to Dallas Temperature.
// DallasTemperature sensors(&oneWire);
//
// float soilTemp()
// {
//         // Send the command to get temperatures
//         sensors.begin();
//         sensors.requestTemperatures();
//         // Serial.print("Soil Temperature: ");
//         // Serial.println(sensors.getTempCByIndex(0)); // Why "byIndex"? You can have more than one IC on the same bus. 0 refers to the first IC on the wire
//
//         return(sensors.getTempCByIndex(0));
// }

void sqlAdd()
{

        float v1=0,v2=0,v3=0,v4=0,v5=0;



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
        // Serial.print("LUX:");
        // Serial.println(v3);
        // delay(500);

        v4 = soilMoisture();
        Serial.print("Soil moisture:");
        Serial.println(v4);
        delay(500);

        // v5 = soilTemp();
        // Serial.print("Soil temp:");
        // Serial.println(v5);
        // delay(10000);

        String uri = "/api/add.php?value=";

        uri += String(v1); //value1
        uri += ",";
        uri += String(v2); //value2
        uri += ",";
        uri += String(v3);
        uri += ",";
        uri += String(v4); //value4
        uri += ",";
        uri += String(v5); //value5

        Serial.println(uri);

        CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
}
