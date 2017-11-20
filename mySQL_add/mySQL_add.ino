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
