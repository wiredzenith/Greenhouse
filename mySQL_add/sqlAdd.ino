//Function for readingin values from sensors and sending them to
//MySQL DB.
//
//Tomasz Klebek
//2017/11/21

void sqlAdd()
{
sensors_event_t event;
tsl.getEvent(&event);

Serial.println(htu.readTemperature());
Serial.println(soilMoisture());

String uri = "/php/add.php?value=";
       uri += String(htu.readTemperature());
       uri += ",";
       uri += String(htu.readHumidity());
       uri += ",";
       uri += String(event.light);
      //  uri += "value4=";
      //  uri += String(htu.readTemperature());



CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
delay(900000);
}
