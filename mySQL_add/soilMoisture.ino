void soilMoistureCal()
{
  //range for values for the soil moisture sensor.
  //min(sensor in air) = 260
  //max(sensor in water) = 530

  int soilMoistureCal = analogRead(0);
  Serial.println(soilMoistureCal);
  delay(200);
}

int soilMoisture()
{
  int soilMoisture = analogRead(0);
  soilMoisture = map (soilMoisture,530,260,0,300);
  soilMoisture = constrain(soilMoisture,0,300);
  Serial.println(soilMoisture);
  return soilMoisture;
}
