#include <DHT.h>

#define DHTPIN 2
#define DHTTYPE DHT11
#include <EEPROM.h>
#include "GravityTDS.h"
#define TdsSensorPin A1

#define RELAY1 52
#define RELAY2 50
#define RELAY3 48
#define RELAY4 46
#define RELAY5 40
#define RELAY6 13

String inString;

GravityTDS gravityTds;
DHT dht(DHTPIN, DHTTYPE);
float humidity, temperature,tds,ph;
unsigned long int avgval; 
int buffer_arr[10],temp;
String kirim = "";
void setup(){
  Serial.begin(9600);
  Serial3.begin(115200);
  dht.begin();

  pinMode(RELAY1, OUTPUT);
  pinMode(RELAY2, OUTPUT);
  pinMode(RELAY3, OUTPUT);
  pinMode(RELAY4, OUTPUT);
  pinMode(RELAY5, OUTPUT);
  pinMode(RELAY6, OUTPUT);

  gravityTds.setPin(TdsSensorPin);
  gravityTds.setAref(5.0);  //reference voltage on ADC, default 5.0V on Arduino UNO
  gravityTds.setAdcRange(1024);  //1024 for 10bit ADC;4096 for 12bit ADC
  gravityTds.begin();  //initialization
}
void controlRelays() {
  if (inString.indexOf("[1ON]") > 0)
    digitalWrite(RELAY1, LOW);
  else if (inString.indexOf("[1OFF]") > 0)
    digitalWrite(RELAY1, HIGH);

  if (inString.indexOf("[2ON]") > 0)
    digitalWrite(RELAY2, LOW);
  else if (inString.indexOf("[2OFF]") > 0)
    digitalWrite(RELAY2, HIGH);

  if (inString.indexOf("[3ON]") > 0)
    digitalWrite(RELAY3, LOW);
  else if (inString.indexOf("[3OFF]") > 0)
    digitalWrite(RELAY3, HIGH);

  if (inString.indexOf("[4ON]") > 0)
    digitalWrite(RELAY4, LOW);
  else if (inString.indexOf("[4OFF]") > 0)
    digitalWrite(RELAY4, HIGH);
  
  if (inString.indexOf("[5ON]") > 0)
    digitalWrite(RELAY5, LOW);
  else if (inString.indexOf("[5OFF]") > 0)
    digitalWrite(RELAY5, HIGH);
  
  if (inString.indexOf("[6ON]") > 0)
    digitalWrite(RELAY6, LOW);
  else if (inString.indexOf("[6OFF]") > 0)
    digitalWrite(RELAY6, HIGH);

  inString = "";
}
void loop(){
  humidity = dht.readHumidity();
  temperature = dht.readTemperature();
//  Serial.print("humidity : ");
//  Serial.print(humidity);
//  Serial.print(", temperature : ");
//  Serial.println(temperature);
//tds
  //temperature = readTemperature();  //add your temperature sensor and read it
  //ph
  for(int i=0; i<10; i++) 
  { 
    buffer_arr[i]=analogRead(A0);
    delay(10);
  }
  for(int i=0; i<9; i++)
  {
    for(int j=i+1; j<10; j++)
    {
      if(buffer_arr[i]>buffer_arr[j])
      {
        temp=buffer_arr[i];
        buffer_arr[i]=buffer_arr[j];
        buffer_arr[j]=temp;
      }
    }
  }
  avgval=0;
  for(int i=2; i<8; i++)
    avgval+=buffer_arr[i];

  float volt=(float)avgval*5.0/1024/6; 
  ph = -6.18 * volt + 26.10;
  //----------------------------------------
  gravityTds.setTemperature(20);  // set the temperature and execute temperature compensation
  gravityTds.update();  //sample and calculate
  tds = gravityTds.getTdsValue();  // then get the value

  kirim = "";
  kirim += humidity;
  kirim += ";";
  kirim += temperature;
  kirim += ";";
  kirim += tds;
  kirim += ";";
  kirim += ph;

  Serial3.println(kirim);

  if (Serial3.available()) {
  String msg = "";
  while (Serial3.available()) {
    char inChar = Serial3.read();
    Serial.write(inChar);
    msg += inChar;
    delay(50);
  }

  Serial.println(msg);

  // Process commands in the received message
  for (int i = 0; i < msg.length(); i++) {
    char inChar = msg.charAt(i);
    inString += inChar;

    if (inChar == ']') {
      if (inString.indexOf("[1ON]") != -1) {
        digitalWrite(RELAY1, LOW);
        Serial.println("[1ON] command received");
      } else if (inString.indexOf("[1OFF]") != -1) {
        digitalWrite(RELAY1, HIGH);
        Serial.println("[1OFF] command received");
      }

      if (inString.indexOf("[2ON]") != -1) {
        digitalWrite(RELAY2, LOW);
        Serial.println("[2ON] command received");
      } else if (inString.indexOf("[2OFF]") != -1) {
        digitalWrite(RELAY2, HIGH);
        Serial.println("[2OFF] command received");
      }

      if (inString.indexOf("[3ON]") != -1) {
        digitalWrite(RELAY3, LOW);
        Serial.println("[3ON] command received");
      } else if (inString.indexOf("[3OFF]") != -1) {
        digitalWrite(RELAY3, HIGH);
        Serial.println("[3OFF] command received");
      }

      if (inString.indexOf("[4ON]") != -1) {
        digitalWrite(RELAY4, LOW);
        Serial.println("[4ON] command received");
      } else if (inString.indexOf("[4OFF]") != -1) {
        digitalWrite(RELAY4, HIGH);
        Serial.println("[4OFF] command received");
      } 

      if (inString.indexOf("[5ON]") != -1) {
        digitalWrite(RELAY5, LOW);
        Serial.println("[5ON] command received");
      } else if (inString.indexOf("[5OFF]") != -1) {
        digitalWrite(RELAY5, HIGH);
        Serial.println("[5OFF] command received");
      } 

      if (inString.indexOf("[6ON]") != -1) {
        digitalWrite(RELAY6, LOW);
        Serial.println("[6ON] command received");
      } else if (inString.indexOf("[6OFF]") != -1) {
        digitalWrite(RELAY6, HIGH);
        Serial.println("[6OFF] command received");
      } 
      inString = "";
    }
  }
}

  delay(5000);
}
