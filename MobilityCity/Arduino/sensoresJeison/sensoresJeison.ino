// set pin numbers:
#include <stdlib.h>
#include <DHT.h>




// Constantes utilizados en el sensor de temperatura

#define DHTPIN1 24      // Pin DTH 22 # 1
#define DHTPIN2 25     // Pin DTH 22 # 2
#define DHTPIN3 26     // Pin DTH 22 # 3
#define DHTTYPE DHT22   // Será nuestro modelo de , se usará para el resto... DHT22 


DHT dht1(DHTPIN1, DHTTYPE); 
DHT dht2(DHTPIN2, DHTTYPE);
DHT dht3(DHTPIN3, DHTTYPE);

float temperatura, humedad;

float tem1, hum1;
float tem2, hum2;
float tem3, hum3;


//Constantes utilizados en el sensor de lluvia
const int lluviaA1 = A0;
const int lluviaD1 = 24;


const int lluviaA2 = A1;
const int lluviaD2 = 25;

const int lluviaA3 = A2;
const int lluviaD3 = 26;

//Contar Carros
#include <NewPing.h>    // SE importa la libreria NewPing
#define MAX_DISTANCE 200 // Maximum distance we want to ping for (in centimeters). Maximum sensor distance is rated at 400-500cm.

#define TRIGGER_PIN_1  11  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_1     10  // Arduino pin tied to echo pin on the ultrasonic sensor.

#define TRIGGER_PIN_2  9  // ULTRASONICO 2
#define ECHO_PIN_2     8  // 

#define TRIGGER_PIN_3  7  // ULTRASONICO 3
#define ECHO_PIN_3     6  // 

#define TRIGGER_PIN_4  5  // ULTRASONICO 4
#define ECHO_PIN_4     4  // 




/******************************** SETUP *********************************************/
void setup() {

  
  //obj Sensor de temperatura
  
  dht1.begin();
  dht2.begin();
  dht3.begin();
 
   pinMode(TRIGGER_PIN_1, OUTPUT); // Definimos el Sonar 1
   pinMode(ECHO_PIN_1, INPUT);

   pinMode(TRIGGER_PIN_2, OUTPUT); // Definimos el Sonar 2
   pinMode(ECHO_PIN_2, INPUT);

   pinMode(TRIGGER_PIN_3, OUTPUT); // Definimos el Sonar 3
   pinMode(ECHO_PIN_3, INPUT);

   pinMode(TRIGGER_PIN_4, OUTPUT); // Definimos el Sonar 4
   pinMode(ECHO_PIN_4, INPUT);



  pinMode(lluviaD1, INPUT);

  pinMode(lluviaD2, INPUT);

  pinMode(lluviaD3, INPUT);

  Serial.begin(115200);
  Serial2.begin(115200);
  Serial2.println("AT+RST");
  delay(2000);

} //End setup function

int ping(int TriggerPin, int EchoPin) { // Function for calculating distance in centimeters . 12 Max
   long duration, distanceCm;
   
   digitalWrite(TriggerPin, LOW);  //para generar un pulso limpio ponemos a LOW 4us
   delayMicroseconds(4);
   digitalWrite(TriggerPin, HIGH);  //generamos Trigger (disparo) de 10us
   delayMicroseconds(10);
   digitalWrite(TriggerPin, LOW);
   
   duration = pulseIn(EchoPin, HIGH);  //medimos el tiempo entre pulsos, en microsegundos
   
   distanceCm = duration * 10 / 292/ 2;   //convertimos a distancia, en cm
   if (distanceCm>12){
      distanceCm = 12;
    }else{
      distanceCm= distanceCm;
      }
   return distanceCm;
}

void loop() {
  

      Serial.println("***************************INICIO DE CICLO *************************************");
  
      

      Serial.println("Ahora tenemos la humedad y la temperatuda en la zona X");
      tem1 = dht1.readTemperature();
      hum1  = dht1.readHumidity();
      Serial.print("Temperatura 1 (DHT22): ");
      Serial.print(tem1);
      Serial.println("\n");
      Serial.print("Humedad 1 (DHT22):");
      Serial.print(hum1);
      Serial.print("\n");
      Serial.println("A continuación tenemos el número de autos en la zona X");
      int cm = ping(TRIGGER_PIN_1, ECHO_PIN_1);
      Serial.print("Ultrasínico COL-1: ");
      Serial.println(cm);
      Serial.println("\n");

      
      Serial.println("Ahora entramos en la zona X2");
      tem2 = dht2.readTemperature();
      hum2  = dht2.readHumidity();
      Serial.print("Temperatura 2 (DHT22): ");
      Serial.print(tem2);
      Serial.println("\n");
      Serial.print("Humedad 2 (DHT22):");
      Serial.print(hum2);
      Serial.print("\n");
      
         Serial.println("Contador de carros  zona X2");
      int cm2 = ping(TRIGGER_PIN_2, ECHO_PIN_2);
      Serial.print("Ultrasínico COL-2: ");
      Serial.println(cm2);
      Serial.print("\n");
      
        Serial.println("Contador de carros zona x2 (Segundo semáforo)");
      int cm3 = ping(TRIGGER_PIN_3, ECHO_PIN_3);
      Serial.print("Ultrasínico COL-3: ");
      Serial.println(cm3);
      Serial.print("\n");

      
      Serial.println("Siguiente zona...(romboy)");
      tem3 = dht3.readTemperature();
      hum3  = dht3.readHumidity();
      Serial.print("Temperatura 3 (DHT22): ");
      Serial.print(tem3);
      Serial.println("\n");
      Serial.print("Humedad 3 (DHT22):");
      Serial.print(hum3);
      Serial.print("\n");

      

   Serial.println("Ahora entramos en la zona X3, zona de 2 semáforos");

      int cm4 = ping(TRIGGER_PIN_4, ECHO_PIN_4);
      Serial.print("Ultrasínico COL-4: ");
      Serial.println(cm4);
      Serial.print("\n");

      int lluviaLector1 = digitalRead(lluviaD1);
      Serial.print(" - vAnalogico1: ");
      Serial.print(analogRead(lluviaA2));//lectura analógica
      Serial.println("\n");
      Serial.print(" -  vDigital3: ");
      Serial.print(lluviaLector1);//lectura digital
      Serial.println("\n");

       int lluviaLector2 = digitalRead(lluviaD2);
      Serial.print(" - vAnalogico2: ");
      Serial.print(analogRead(lluviaA2));//lectura analógica
      Serial.println("\n");
      Serial.print(" -  vDigital3: ");
      Serial.print(lluviaLector2);//lectura digital
      Serial.println("\n");

       int lluviaLector3 = digitalRead(lluviaD3);
      Serial.print(" - vAnalogico3: ");
      Serial.print(analogRead(lluviaA3));//lectura analógica
      Serial.println("\n");
      Serial.print(" -  vDigital3: ");
      Serial.print(lluviaLector3);//lectura digital
      Serial.println("\n");

      Serial.print("****************** FIN CICLO ************************");
      Serial.println("\n");

      delay(4000);
  
      
}



//.................................................
//Funciones Control de wifi
//.................................................
int conectar_wifi()
{
  char character;
  String content = "";

  Serial.println("[conectar_wifi] Conectando a la red WIFI...");
  Serial2.println("AT+CWMODE=1"); // Lo colocamos en modo Access Point
  delay(1000);
  // comando para conexion con la red WIFI
  // Tener en cuanta ajustar nombre red ssid y password
  String comandoCON = "AT+CWJAP=\"Estudiantes\",\"braroxjhoadr12\"";
  Serial2.println(comandoCON);
  //Serial.println(comandoCON);
  delay(10000);
  if (Serial2.find("FAIL"))
  {
    Serial.println("[conectar_wifi] Error al conectarse con la red WIFI");
    delay(2000);
    return 0;
  }
  else
  {
    Serial.println("[conectar_wifi] Conectado a la red WIFI");
    delay(4000);
    return 1;
  }
}


//.................................................
//Funciones Fijar la bandera ... para?
//.................................................
void fijar_band_comp()
{
  Serial.println("[fijar_band_comp] Se fijo bandera en 0");
//  band_comp = 1;
  delay(200);
}



//.................................................
//Funcion Tx de datos 
//.................................................
void enviar_datos(int valTemp, int humedad, int lluvia, String zona, int fluCarr9HNorte, int fluCarr9HSur, int fluCarr6HNorte, int fluCarr6HSur)/* La función complementar sirve para enviar el dato  a */
{

  String comandoI = "AT+CIPSTART=\"TCP\",\"";
  comandoI += "192.168.0.108"; // Dirección del servidor de datos, en este caso la IP de nuestra PC.
  comandoI += "\",80";  //puerto
  Serial2.println(comandoI);
  delay(2000);
  if (Serial2.find("INT. ERROR"))
  {
    Serial.println("[enviar_datos] Error al conectar con el servidor");
  }
  else
  {
    Serial.println("[enviar_datos] Se conecto al servidor");
  }
    
  String cadenaI = "POST /MobilityCity/MobilityCity/recibirDatos.php?cliTemperatura=";
  cadenaI += valTemp;
  cadenaI += "&cliHumedad=";
  cadenaI += humedad;
  cadenaI += "&cliLluvia=";
  cadenaI += lluvia;
  cadenaI += "&cliZona=";
  cadenaI += zona;
  cadenaI += "&traCarr9HNorte=";
  cadenaI += fluCarr9HNorte;  
  cadenaI += "&traCarr9HSur=";
  cadenaI += fluCarr9HNorte;  
  cadenaI += "&traCarr6HNorte=";
  cadenaI += fluCarr6HNorte;  
  cadenaI += "&traCarr6HSur=";
  cadenaI += fluCarr6HNorte;  
  cadenaI += "\r\n\r\n";

  comandoI = "AT+CIPSEND=";
  comandoI += String(cadenaI.length());
  Serial2.println(comandoI);

  if (Serial2.find(">"))
  {
    Serial2.print(cadenaI);
    Serial.println("[enviar_datos] Datos enviados correctamente");
  }
  else
  {
    Serial2.println("AT+CIPCLOSE");
    Serial.println("[enviar_datos] Error al enviar CONSULTA");
  }
}

//.................................................
//Funcion Activacion/Desactivacion de Tx de datos
//.................................................
//leer estado leds
String leer_estado_leds()
{
  int i;
  char dato = 0;
  String respuesta;
  String comando = "AT+CIPSTART=\"TCP\",\"";
  comando += "192.168.0.108"; 
  comando += "\",80";  //puerto
  
  Serial2.println(comando);
  delay(2000);
  
  if (Serial2.find("ERROR"))
  {
    Serial.println("[leer_estado_leds] Error al conectar con el servidor");
    respuesta = "ERROR";
    return respuesta;
  }
  else
  {
    Serial.println("[leer_estado_leds] Se conecto al servidor");
  }

  String cadena = "GET /MobilityCity/MobilityCity/consultarTx.php";
  cadena += "\r\n\r\n";


  comando = "AT+CIPSEND=";
  comando += String(cadena.length());
  Serial2.println(comando);

  if (Serial2.find(">"))
  {
    Serial2.print(cadena);
    if (Serial2.find("**-*")) {
      Serial.println("[leer_estado_leds] Respuesta recibida. Estado LEDS=");
      for (i = 0; i < 3; i++)
      {
        dato = Serial2.read();
        respuesta += dato;
      }
      Serial.print(respuesta);
      return respuesta;
    }
  }
  else
  {
    Serial2.println("AT+CIPCLOSE");
    Serial.println("[leer_estado_leds] Error al enviar CONSULTA");
    respuesta = "ERROR";
    return respuesta;
  }
}





