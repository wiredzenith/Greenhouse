void sqlAdd()
{
sensors_event_t event;
tsl.getEvent(&event);

Serial.println(htu.readTemperature());
Serial.println(soilMoisture());

String uri = "/project/write_data.php?value=";
       uri += String(htu.readTemperature());
       uri += ",";
       uri += String(htu.readHumidity());
       uri += ",";
       uri += String(htu.readTemperature());
      //  uri += "value4=";
      //  uri += String(htu.readTemperature());



CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
delay(10000);
}
