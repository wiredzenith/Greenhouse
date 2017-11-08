

#include <Adafruit_Sensor.h>
#include <Adafruit_TSL2561_U.h>
#include <pgmspace.h>
#include <Wire.h>
#include <UnoWiFiDevEd.h>
#include <Adafruit_HTU21DF.h>

//thingspeak get request and api key
//GET https://api.thingspeak.com/update?api_key=KHYRCV4OZ5IC1CWO&field1=0

#define CONNECTOR     "rest"
#define SERVER_ADDR   "api.thingspeak.com"
#define APIKEY_THINGSPEAK  "KHYRCV4OZ5IC1CWO" //Insert API Key for thingspeak


/******************************************************************
  get readding from i2c temp, humidity and light sensors

  Tomasz Klebek
  01/11/17
 *****************************************************************/

Adafruit_HTU21DF htu = Adafruit_HTU21DF();
//Adafruit_TSL2561_Unified tsl = Adafruit_TSL2561_Unified(TSL2561_ADDR_FLOAT, 12345);

void setup()
{
  //Serial.begin(9600);      //int serial (baud rate)
  Ciao.begin();           //Begin ciao communication
  //configureSensor();

  // if(!tsl.begin())
  // {
  //   /* There was a problem detecting the TSL2561 ... check your connections */
  //   Serial.print("no TSL2561 detected");
  //   while(1);
  // }
  //
  // if (!htu.begin())
  // {
  //   Serial.println("Couldn't find htu sensor!");
  //   while (1);
  // }
}

void loop()
{
  // sensors_event_t event;
  // tsl.getEvent(&event);
  // Serial.print("Temp: "); Serial.print(htu.readTemperature());
  // Serial.print("\tHumi: "); Serial.print(htu.readHumidity());
  // delay(100);
  //
  // sensors_event_t event;
  // tsl.getEvent(&event);
  // if (event.light)
  // {
  //   Serial.print("\t"); Serial.print(event.light); Serial.println(" lux");
  // }
  // else
  // {
  //   Serial.println("\tNo reading");
  // }
float temp = htu.readTemperature();
float hum = htu.readHumidity();
//float lux = event.light;

  // String uri = "/update?api_key=";
  // uri += APIKEY_THINGSPEAK;
  // uri += "&field1=";
  // uri += String(hum);
  // uri += "&field2=";
  // uri += String(temp);
  // CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
  // delay(2000);

  String uri2 = "/update?api_key=";
  uri2 += APIKEY_THINGSPEAK;
  uri2 += "&field3=";
  uri2 += String(200);
  uri2 += "&field4=";
  uri2 += String(100);
  CiaoData data2 = Ciao.write(CONNECTOR, SERVER_ADDR, uri2);
  delay(2000);    // wait a few sevond to give the server a chance to return helthy responce


  // if (!data.isEmpty())  //if there is a response from the server, retreve it
  // {
  //   Ciao.println( "State: " + String (data.get(1)) );
  //   Ciao.println( "Response: " + String (data.get(2)) );
  //   Serial.println( "State: " + String (data.get(1)) );
  //   Serial.println( "Response: " + String (data.get(2)) );
  // }
  // else
  // {    //if ther is no response from the server print "write error"
  //   Ciao.println("Write Error");
  //   Serial.println("Write Error");
  // }
  delay(20000);

}

// Function for sending data to thing speak
// void thingSpeakData()
// {
//   sensors_event_t event;
//   tsl.getEvent(&event);
//
//   String uri = "/update?api_key=";        //tells thing speak to update my channel
//   uri += APIKEY_THINGSPEAK;               // Adds API to URL
//   uri += "&field1=";                      // sorts info into correct field in thing speak
//   uri += String(htu.readHumidity());      //gets air humidity readings
//   uri += "&field2=";
//   uri += String(htu.readTemperature());   //gets air temperature
//   uri += "&field3=";
//   uri += String(event.light);             //light intensity
//   // uri += "&field4=";
//   // uri += String(SOIL TEMP);            //Soil temperature
//   // uri += "&field5=";
//   // uri += String(SOIL MOISTURE);        //Soil moisture
//   // uri += "&field6=";
//   // uri += String(analogRead(A1));       //(unused)
//
//
//     // ciao library functions for sending ReST command to thingspeak server
//   Ciao.println("Sending data to ThingSpeak Channel");
//   Serial.println("Sending data to ThingSpeak Channel");
//   CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
//   delay(2000);    // wait a few sevond to give the server a chance to return helthy responce
//
//
//   if (!data.isEmpty())  //if there is a response from the server, retreve it
//   {
//     Ciao.println( "State: " + String (data.get(1)) );
//     Ciao.println( "Response: " + String (data.get(2)) );
//     Serial.println( "State: " + String (data.get(1)) );
//     Serial.println( "Response: " + String (data.get(2)) );
//   }
//   else
//   {    //if ther is no response from the server print "write error"
//     Ciao.println("Write Error");
//     Serial.println("Write Error");
//   }
//   delay(20000);
// }
//
// void sensorDetails(void)
// {
//   sensor_t sensor;
//   tsl.getSensor(&sensor);
//   Serial.println("------------------------------------");
//   Serial.print  ("Sensor:       "); Serial.println(sensor.name);
//   Serial.print  ("Driver Ver:   "); Serial.println(sensor.version);
//   Serial.print  ("Unique ID:    "); Serial.println(sensor.sensor_id);
//   Serial.print  ("Max Value:    "); Serial.print(sensor.max_value); Serial.println(" lux");
//   Serial.print  ("Min Value:    "); Serial.print(sensor.min_value); Serial.println(" lux");
//   Serial.print  ("Resolution:   "); Serial.print(sensor.resolution); Serial.println(" lux");
//   Serial.println("------------------------------------");
//   Serial.println("");
//   delay(500);
//
// }
//
// void configureSensor(void)
// {
//     /* You can also manually set the gain or enable auto-gain support */
//     // tsl.setGain(TSL2561_GAIN_1X);      /* No gain ... use in bright light to avoid sensor saturation */
//     // tsl.setGain(TSL2561_GAIN_16X);     /* 16x gain ... use in low light to boost sensitivity */
//   tsl.enableAutoRange(true);            /* Auto-gain ... switches automatically between 1x and 16x */
//
//     /* Changing the integration time gives you better sensor resolution (402ms = 16-bit data) */
//     // tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_13MS);      /* fast but low resolution */
//     tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_101MS);  /* medium resolution and speed   */
//     // tsl.setIntegrationTime(TSL2561_INTEGRATIONTIME_402MS);  /* 16-bit data but slowest conversions */
//
//     /* Update these values depending on what you've set above! */
//   Serial.println("-----------------TSL2561-----------");
//   Serial.print  ("Gain:         "); Serial.println("Auto");
//   Serial.print  ("Timing:       "); Serial.println("101 ms");
//   Serial.println("------------------------------------");
// }
