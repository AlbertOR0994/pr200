
#include <SPI.h>
#include <WiFiNINA.h>
#include <MFRC522.h>
#include <DHT.h>
#define RST_PIN         7         // Pin rst
#define SS_PIN          11         // Pin sda
#define DHTPIN 2

#define DHTTYPE DHT11 // Tipo de sensor

MFRC522 mfrc522(SS_PIN, RST_PIN);  // Crea una instacia MFRC522  
DHT dht(DHTPIN, DHTTYPE); // inicio

//Conexion a la red
char ssid[] = "lowiF568"; //ssid
char pass[] = "YGEJPVC3JPSE2V"; // contraseña de wifi

int status = WL_IDLE_STATUS;
// Ip del servidor
char server[] = "127.0.0.1"; 

WiFiClient client;

void setup() {
  Serial.begin(9600);
  SPI.begin();      
  mfrc522.PCD_Init();
  
  mfrc522.PCD_DumpVersionToSerial();
  Serial.println(F("a"));
  // Inicio del DHT
  dht.begin();

  int h = dht.readHumidity();
  int t = dht.readTemperature();

  Serial.println(h);
  Serial.println(t);
  
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

  if (  mfrc522.PICC_IsNewCardPresent()) {
    Serial.println("detectado");
    //lectura del DHT
    int h = dht.readHumidity();
    int t = dht.readTemperature();
 
    if (isnan(h) || isnan(t)) {
      Serial.println("Error en los datos");
      return;
    }
    //peticion al servidor
    Serial.println("\nStarting connection to server...");
    // if you get a connection, report back via serial:
    if (client.connect(server, 80)) {
      Serial.println("connected to server");
      // Make a HTTP request:
      client.print("GET /classConexion.php?humedad=");
      client.print(h);
      client.print("&temperatura=");
      client.print(t);
      client.println("&rfid=1 HTTP/1.1");
      client.println("Host: 3.231.115.127");
      client.println("Connection: close");
      client.println();
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
}
