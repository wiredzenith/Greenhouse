//Function for readingin values from sensors and sending them to
//MySQL DB.
//
//Tomasz Klebek
//2017/11/21

void sqlAdd()
{
// sensors_event_t event;
// tsl.getEvent(&event);

// Serial.println(htu.readTemperature());
// Serial.println(soilMoisture());

String uri = "/api/add.php?value="; //for pi
//String uri = "/project/html/php/add.php?value="; //for local

       uri += String(htu.readTemperature());  //value1
       uri += ",";
       uri += String(htu.readHumidity());     //value2
       uri += ",";
       uri += String(NULL);            //value3
       uri += ",";
       uri += String(htu.readTemperature());  //value4
       uri += ",";
       uri += String(NULL);  //value5

       CiaoData data = Ciao.write(CONNECTOR, SERVER_ADDR, uri);
}
