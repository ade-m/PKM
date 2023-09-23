#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

const char *ssid = "WIFI_IT";
const char *password = "ascend1234";

float humidity, temperature, tds, ph;

int relayPins[] = {52, 50, 48, 46};

IPAddress staticIP(192, 168, 1, 50);
IPAddress gateway(192, 168, 1, 1);
IPAddress subnet(255, 255, 255, 0);

void setup() {
  Serial.begin(115200);
  connectToWifi();
}

void connectToWifi() {
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);
  WiFi.config(staticIP, gateway, subnet);
  WiFi.begin(ssid, password);
  Serial.println();

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println();
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

String splitString(String data, char separator, int index) {
  int found = 0;
  int strIndex[] = {0, -1};
  int maxIndex = data.length() - 1;

  for (int i = 0; i <= maxIndex && found <= index; i++) {
    if (data.charAt(i) == separator || i == maxIndex) {
      found++;
      strIndex[0] = strIndex[1] + 1;
      strIndex[1] = (i == maxIndex) ? i + 1 : i;
    }
  }
  return found > index ? data.substring(strIndex[0], strIndex[1]) : "";
}

void loop() {
  if (Serial.available()) {
    String msg = "";
    while (Serial.available()) {
      msg += char(Serial.read());
      delay(50);
    }

    humidity = splitString(msg, ';', 0).toFloat();
    temperature = splitString(msg, ';', 1).toFloat();
    tds = splitString(msg, ';', 2).toFloat();
    ph = splitString(msg, ';', 3).toFloat();
    kirimDanBacaDataKeServer();
  }
}

void kirimDanBacaDataKeServer() {
  HTTPClient http;
  String postData;
  WiFiClient client;

  postData = "humidity=" + String(humidity) +
             "&temperature=" + String(temperature) +
             "&tds=" + String(tds) +
             "&ph=" + String(ph);

  http.begin(client, "http://192.168.1.63/PKM/PKM/api/server.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpCode1 = http.POST(postData);
  String payload = http.getString();

  Serial.println(httpCode1);

  // Baca data dari server
  http.begin(client, "http://192.168.1.63/PKM/website/esp32_update.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpCode2 = http.POST("toggle_Relay=1");
  String response = http.getString();

  Serial.println(httpCode2);
  //Serial.println(response);

  for (int i = 0; i < 4; i++) {
    String relayState = response.substring(10 + i * 12, 12 + i * 12);
    
    if (relayState == "of") {
      digitalWrite(relayPins[i], LOW);
      Serial.println("[" + String(i + 1) + "OFF]");
    } else if (relayState == "on") {
      digitalWrite(relayPins[i], HIGH);
      Serial.println("[" + String(i + 1) + "ON]");
    }
  }

  http.end();
  delay(200);
}
 