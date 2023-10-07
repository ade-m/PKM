#include <OneWire.h>
#include <DHT.h>
#include <EEPROM.h>
#include <GravityTDS.h>
#include <DallasTemperature.h>
#include <UTFTGLUE.h>              //use GLUE class and constructor

UTFTGLUE myGLCD(0,A2,A1,A3,A4,A0); //all dummy args
unsigned long lastUpdate = 0;
const unsigned long updateInterval = 2000; // Update every 10 seconds
// Pin Definitions
#define DHTPIN 22
#define DHTTYPE DHT11
#define TdsSensorPin A8
#define PhSensorPin A7
#define SuhuSensorPin 26

#define RELAY1 52
#define RELAY2 50
#define RELAY3 48
#define RELAY4 46
#define RELAY5 44
#define RELAY6 42

// Sensor setup
OneWire oneWire(SuhuSensorPin);
DallasTemperature sensorSuhu(&oneWire);
float suhu;


#define TdsSensorPin A8
#define VREF 5.0      // analog reference voltage(Volt) of the ADC
#define SCOUNT  30           // sum of sample point
int analogBuffer[SCOUNT];    // store the analog value in the array, read from ADC
int analogBufferTemp[SCOUNT];
int analogBufferIndex = 0,copyIndex = 0;
float averageVoltage = 0,tdsValue = 0,temperature = 24.2;


// String for receiving commands
String inString;


// Sensor objects
GravityTDS gravityTds;
DHT dht(DHTPIN, DHTTYPE);
float humidity,  tds, ph;//,temperature;
unsigned long int avgval;
int buffer_arr[10], temp;
String kirim = "";

void setup() {
  // Serial initialization
  Serial.begin(115200);
  Serial3.begin(115200);

  // Sensor initialization
  dht.begin();
  sensorSuhu.begin();
  randomSeed(analogRead(0));
  myGLCD.InitLCD();
  myGLCD.setFont(BigFont);

  // Relay pins setup
  pinMode(RELAY1, OUTPUT);
  pinMode(RELAY2, OUTPUT);
  pinMode(RELAY3, OUTPUT);
  pinMode(RELAY4, OUTPUT);
  pinMode(RELAY5, OUTPUT);
  pinMode(RELAY6, OUTPUT);

  // TDS sensor setup
 gravityTds.setPin(TdsSensorPin);
 gravityTds.setAref(5.0); // Reference voltage on ADC, default 5.0V on Arduino UNO
 gravityTds.setAdcRange(1024); // 1024 for 10-bit ADC; 4096 for 12-bit ADC
 gravityTds.begin(); // Initialization

}

void drawDataScreen(float phValue, float tdsValue, float temperatureValue, float humidityValue , float suhuValue) {
  myGLCD.clrScr();
  int buf[478];
  int x, x2;
  int y, y2;
  int r;

  myGLCD.setColor(0, 0, 0); // Background color
  myGLCD.fillRect(0, 0, 240, 320); // Fill the entire screen with the background color

  myGLCD.setColor(255, 255, 255); // Text color
  myGLCD.setFont(BigFont); // Set font size

  // Display Ph
  myGLCD.print("Ph: " + String(phValue), 15, 80);

  // Display Tds
  myGLCD.print("Tds: " + String(tdsValue) + " PPM", 15, 130);

  // Display Suhu
  myGLCD.print("Suhu: " + String(temperatureValue) + " C", 15, 180);

  // Display Humidity
  myGLCD.print("Humidity: " + String(humidityValue) + " %", 15, 230);

  // Display Air
  myGLCD.print("Suhu Air: " + String(suhuValue) + " C", 15, 280);


  // Display the text "Hydroguard" below the image
  myGLCD.setColor(0, 255, 0); // Text color for "Hydroguard"
  myGLCD.print("Hydroguard", 300, 20);

  delay(500);
  // Tambahkan delay untuk menampilkan data
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




void loop() {

  unsigned long currentMillis = millis();

  if (currentMillis - lastUpdate >= updateInterval) {
    lastUpdate = currentMillis;

    // Read sensor data
    humidity = dht.readHumidity();
    delay(100);
    temperature = dht.readTemperature();
    delay(100);
    sensorSuhu.requestTemperatures();
    delay(100);
    suhu = sensorSuhu.getTempCByIndex(0);
    delay(100);

    // Read pH sensor data
    for (int i = 0; i < 10; i++) {
      buffer_arr[i] = analogRead(PhSensorPin);
      delay(10);
    }
    for (int i = 0; i < 9; i++) {
      for (int j = i + 1; j < 10; j++) {
        if (buffer_arr[i] > buffer_arr[j]) {
          temp = buffer_arr[i];
          buffer_arr[i] = buffer_arr[j];
          buffer_arr[j] = temp;
        }
      }
    }
    avgval = 0;
    for (int i = 2; i < 8; i++)
      avgval += buffer_arr[i];

    float volt = (float)avgval * 5.0 / 1024 / 6;
    ph = -6.18 * volt + 27.60;

    //end PH

    // Read TDS sensor data
    //loopTDS();  
    delay(100);
   gravityTds.setTemperature(suhu);
   gravityTds.update();
   tds = gravityTds.getTdsValue();
   tds -= (0.35*tds); // error rate 30%
  
}
  // Prepare data for transmission
  kirim = "";
  kirim += humidity;
  kirim += ";";
  kirim += temperature;
  kirim += ";";
  //tds =tdsValue; //okde terbaru sesuai dokumentasi
  kirim += tds;
  kirim += ";";
  kirim += ph;

  Serial3.println(kirim);

  // Process commands in the received message
  if (Serial3.available()) {
    String msg = "";
    while (Serial3.available()) {
      char inChar = Serial3.read();
      Serial.write(inChar);
      msg += inChar;
      delay(50);
    }

    Serial.println(msg);

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
  // Draw the updated data on the screen
  drawDataScreen(ph, tds, temperature, humidity, suhu);
  
  delay(200);


}
