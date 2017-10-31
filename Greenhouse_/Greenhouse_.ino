#include <DHT.h>
#include <Wire.h>
#include <UnoWiFiDevEd.h>

//thingspeak get request nd api key
//GET https://api.thingspeak.com/update?api_key=KHYRCV4OZ5IC1CWO&field1=0

#define CONNECTOR     "rest"
#define SERVER_ADDR   "api.thingspeak.com"
#define APIKEY_THINGSPEAK  "KHYRCV4OZ5IC1CWO" //Insert API Key
#define DHTPIN 7
#define DHTTYPE DHT22

/*
 * Arduino scetch to send data from a DHT22 temperature and humidity sensor to
 * thingspeak.com, where the values can be stored and graphed. Useing code gathered from
 * various sites and exaples.
 *
 * Tomasz Klebek
 * 20/10/17
 */

DHT dht(DHTPIN, DHTTYPE); //set the DHT sensor (pin its connectd to, Sensor type)

void setup() {
  Ciao.begin();           //Begin ciao communication
  Serial.begin(9600);     //int serial (baud rate)
  dht.begin();

}

void loop() {


  String uri = "/update?api_key="; //tells thing speak to update my channel
  uri += APIKEY_THINGSPEAK;        // Adds API to URL
  uri += "&field1=";               // sorts info into correct field in thing speak
  uri += String(dht.readHumidity());  //gets humidity reading from DHT sensor
  uri += "&field2=";
  uri += String(dht.readTemperature());
//  uri += "&field3=";
//  uri += String(analogRead(A0));
//  uri += "&field4=;
//  uri += String(analogRead(A1));

// prints out results from DHT sensor to make sure everthing is working fine
  Serial.print("temp:");
  Serial.print(dht.readTemperature());
  Serial.print("*c");
  Serial.println("RH:");
  Serial.print(dht.readHumidity());
  Serial.print("%");

// ciao library functions fro sending ReST command to thingspeak server
  Ciao.println("Sending data on ThingSpeak Channel");
  CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
  delay(2000);    // wait a few sevond to give the server a chance to return helthy responce

  if (!data.isEmpty())  //if there is a response from the server, retreve it
  {
    Ciao.println( "State: " + String (data.get(1)) );
    Ciao.println( "Response: " + String (data.get(2)) );
    Serial.println( "State: " + String (data.get(1)) );
    Serial.println( "Response: " + String (data.get(2)) );
  }
  else{    //if ther is no response from the server print "write error"
    Ciao.println("Write Error");
    Serial.println("Write Error");
  }
  delay(600000);
}
