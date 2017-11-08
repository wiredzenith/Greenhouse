#include <Adafruit_Sensor.h>
#include <Adafruit_TSL2561_U.h>
#include <pgmspace.h>
#include <Wire.h>
#include <UnoWiFiDevEd.h>
#include <Adafruit_HTU21DF.h>

#define CONNECTOR     "rest"
#define SERVER_ADDR   "192.168.1.101"

Adafruit_HTU21DF htu = Adafruit_HTU21DF();
Adafruit_TSL2561_Unified tsl = Adafruit_TSL2561_Unified(TSL2561_ADDR_FLOAT, 12345);

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
