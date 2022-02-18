
#include "DHT.h"
#include "SPI.h"
#include "MFRC522.h"
#include "WiFiNINA.h"

#define RST_PIN         7          // Configurable, see typical pin layout above
#define SS_PIN          11         // Configurable, see typical pin layout above

#define DHTPIN 6
#define DHTTYPE DHT11 

MFRC522 mfrc522(SS_PIN, RST_PIN);  // Create MFRC522 instance

DHT dht(DHTPIN, DHTTYPE);

char ssid[] = "080 Invitados"; 
char pass[] = "8020SCSS";

int status = WL_IDLE_STATUS;

char server[] = "192.168.1.123";

float tiempo = millis();
WiFiClient client;

void setup() {
  Serial.begin(9600);   // Initialize serial communications with the PC
  while (!Serial);    // Do nothing if no serial port is opened (added for Arduinos based on ATMEGA32U4)
  SPI.begin();      // Init SPI bus
  mfrc522.PCD_Init();   // Init MFRC522
  delay(4);       // Optional delay. Some board do need more time after init to be ready, see Readme
  mfrc522.PCD_DumpVersionToSerial();  // Show details of PCD - MFRC522 Card Reader details
  Serial.println(F("Scan PICC to see UID, SAK, type, and data blocks..."));
  Serial.println(F("DHTxx test!"));
  dht.begin();

  if (WiFi.status() == WL_NO_MODULE) {
    Serial.println("Communication with WiFi module failed!");
    while (true);
  }
  // Conexion en la red
  while (status != WL_CONNECTED) {
    Serial.print("Intentando conectar a la red: ");
    Serial.println(ssid);
    status = WiFi.begin(ssid, pass);
    delay(10000);
  }
  Serial.println("Conexion a la red completada");
}

void loop() { 
    
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float f = dht.readTemperature(true);

  Serial.println(h);
  Serial.println(t);
  
  float hit = dht.computeHeatIndex(f, h);
  float hic = dht.computeHeatIndex(t,h, false);

  //peticion al servidor
    Serial.println("\nIniciando conexión...");
    // if you get a connection, report back via serial:
    if (client.connect("192.168.1.123", 80)) {
      Serial.println("connected to server");
      // Make a HTTP request:
      client.print("GET /Clase/tareas/tareasdaw2/Proyecto%20ISLA%20MAGICA/app%20web/pages/index.php?hum=");
      client.print(h);
      client.print("&temp=");
      client.print(t);
      client.println("&rfid=1 HTTP/1.1");
      client.println("Host: 192.168.1.123");
      client.println("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
      client.println();

      if (isnan(h) || isnan(t)) {
      Serial.println("Error en los datos");
      return;
    }

    while (client.available()) {
      char c = client.read();
      Serial.write(c);
    }
    //Para la conexion cuando termina
    if (!client.connected()) {
      Serial.println();
      Serial.println("desconectado del server.");
      client.stop();
    }
    delay(1000);
  } 
   
  // Reset the loop if no new card present on the sensor/reader. This saves the entire process when idle.
  if ( ! mfrc522.PICC_IsNewCardPresent()) { 
  
  }

  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) {

  }

  // Dump debug info about the card; PICC_HaltA() is automatically called
  mfrc522.PICC_DumpToSerial(&(mfrc522.uid));
}
