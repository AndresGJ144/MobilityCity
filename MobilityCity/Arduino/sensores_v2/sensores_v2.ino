// set pin numbers:
#include <stdlib.h>
#include <DHT.h>


// Constantes utilizados en el sensor de temperatura
const int Sensor_Temp_zn = 24;
const int Sensor_Temp_zc = 25;
const int Sensor_Temp_zs = 26;

float temperatura_zn, humedad_zn;
float temperatura_zc, humedad_zc;
float temperatura_zs, humedad_zs;

DHT objDht_zn (Sensor_Temp_zn, DHT22);
DHT objDht_zc (Sensor_Temp_zc, DHT22);
DHT objDht_zs (Sensor_Temp_zs, DHT22);

//Constantes utilizados en el sensor de lluvia
const int Sensor_AnalogLLuvia_zn = A0;
const int Sensor_AnalogLLuvia_zc = A1;
const int Sensor_AnalogLLuvia_zs = A2;
const int Sensor_DigLLuvia_zn = 27;
const int Sensor_DigLLuvia_zc = 28;
const int Sensor_DigLLuvia_zs = 29;

int band_comp = 1;
int estado_conWifi = 0;   //Retorno de la funcion conectar_wifi()

//Contar Carros
#include <NewPing.h>    // SE importa la libreria NewPing
#define MAX_DISTANCE 14 // Maximum distance we want to ping for (in centimeters). Maximum sensor distance is rated at 400-500cm.

#define TRIGGER_PIN_1  11  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_1     10  // Arduino pin tied to echo pin on the ultrasonic sensor.

#define TRIGGER_PIN_2  9  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_2     8  // Arduino pin tied to echo pin on the ultrasonic sensor.

#define TRIGGER_PIN_3  7  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_3     6  // Arduio pin tied to echo pin on the ultrasonic sensor.

#define TRIGGER_PIN_4  5  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_4     4  // Arduino pin tied to echo pin on the ultrasonic sensor.


NewPing sonarCarr9HNorte   (TRIGGER_PIN_1, ECHO_PIN_1, MAX_DISTANCE);// sensor 1
NewPing sonarCarr9HSur     (TRIGGER_PIN_2, ECHO_PIN_2, MAX_DISTANCE);// sensor 2
NewPing sonarCarr6HNorte   (TRIGGER_PIN_3, ECHO_PIN_3, MAX_DISTANCE);// sensor 3
NewPing sonarCarr6HSur     (TRIGGER_PIN_4, ECHO_PIN_4, MAX_DISTANCE);// sensor 4

int cuenta =0;
int cuentaTemp =0;
int cuenta_ejec = 0;

int distancia = 0;
int distancia1 = 0;
int bandera = 0; 
//.............................................................
// setup - loop
//.............................................................

void setup() {

  
  //obj Sensor de temperatura
  objDht_zn.begin();
  objDht_zc.begin();
  objDht_zs.begin();

  //Variables para el sensor de lluvia
  pinMode(Sensor_DigLLuvia_zn, INPUT);
  pinMode(Sensor_DigLLuvia_zc, INPUT);
  pinMode(Sensor_DigLLuvia_zs, INPUT);

  Serial.begin(115200);
  Serial2.begin(115200);
  
  Serial2.println("AT+RST");
  delay(2000);
  estado_conWifi = conectar_wifi();  //1 -> se conecto
  attachInterrupt(0, fijar_band_comp, FALLING);
  
}

void loop() {
   
  if(estado_conWifi == 1){
    
    String estado_leds;
    estado_leds = leer_estado_leds();
  
    if (estado_leds == "0CL") {
      Serial.println("[loop] Transmision de datos desactivada!");
    }
    else
    {
    
      humedad_zn = objDht_zn.readHumidity();
      humedad_zc = objDht_zc.readHumidity();
      humedad_zs = objDht_zs.readHumidity();
      
      temperatura_zn =  objDht_zn.readTemperature();
      temperatura_zc =  objDht_zc.readTemperature();
      temperatura_zs =  objDht_zs.readTemperature();

      // Para sensar si esta lloviendo o no
      int lluviaLector_zn = digitalRead(Sensor_DigLLuvia_zn);
      int lluviaLector_zc = digitalRead(Sensor_DigLLuvia_zc);
      int lluviaLector_zs = digitalRead(Sensor_DigLLuvia_zs);
      
      int lluviaLector_Analigico_zn = analogRead(Sensor_AnalogLLuvia_zn);
      int lluviaLector_Analigico_zc = analogRead(Sensor_AnalogLLuvia_zc);
      int lluviaLector_Analigico_zs = analogRead(Sensor_AnalogLLuvia_zs);
            
      //conteo de carros
      //conteo de carros
      Serial.println("[loop -->    s1] ");
      int Num_Carr9HNorte = contarCarros(1);
      Serial.println("[loop -->    s2] ");
      int Num_Carr9HSur   = contarCarros(2);
      Serial.println("[loop -->    s3] ");
      int Num_Carr6HNorte = contarCarros(3);
      Serial.println("[loop -->    s4] ");
      int Num_Carr6HSur   = contarCarros(4);
    
      Serial.print("[loop --> Norte] Temp: ");
      Serial.print(temperatura_zn);
      Serial.print("C  - Humedad: ");
      Serial.print(humedad_zn);
      Serial.print("% ");
      Serial.print(" - vAnalogico: ");
      Serial.print(lluviaLector_Analigico_zn);//lectura analógica
      Serial.print(" -  vDigital: ");
      Serial.println(lluviaLector_zn);//lectura digital

      Serial.print("[loop --> Centr] Temp: ");
      Serial.print(temperatura_zc);
      Serial.print("C  - Humedad: ");
      Serial.print(humedad_zc);
      Serial.print("% ");
      Serial.print(" - vAnalogico: ");
      Serial.print(lluviaLector_Analigico_zc);//lectura analógica
      Serial.print(" -  vDigital: ");
      Serial.println(lluviaLector_zc);//lectura digital

      Serial.print("[loop -->   Sur] Temp: ");
      Serial.print(temperatura_zs);
      Serial.print("C  - Humedad: ");
      Serial.print(humedad_zs);
      Serial.print("% ");
      Serial.print(" - vAnalogico: ");
      Serial.print(lluviaLector_Analigico_zs);//lectura analógica
      Serial.print(" -  vDigital: ");
      Serial.println(lluviaLector_zs);//lectura digital

      Serial.print("[loop -->Carros] (Carr9HNor): ");
      Serial.print(Num_Carr9HNorte);   
      Serial.print("  - (Carr9HSur): ");
      Serial.print(Num_Carr9HSur);
      Serial.print(" - (Carr6HNor): ");
      Serial.print(Num_Carr6HNorte);//lectura analógica
      Serial.print(" -  (Carr6HSur): ");
      Serial.println(Num_Carr6HSur);//lectura digital
     
  
      //Wifi
      //void enviar_datos(int valTemp, int humedad, int lluvia, String zona, int fluCarr9HNorte, int fluCarr9HSur, int fluCarr6HNorte, int fluCarr6HSur)/* La función complementar sirve para enviar el dato  a */
      
      enviar_datos(temperatura_zn, humedad_zn, lluviaLector_zn, temperatura_zc, humedad_zc, lluviaLector_zc, temperatura_zs, humedad_zs, lluviaLector_zs, Num_Carr9HNorte, Num_Carr9HSur, Num_Carr6HNorte, Num_Carr6HSur);
    }
    delay(2000);
 
  }
  else{
    Serial.println("[loop] Reconectado a la red WIFI");
    estado_conWifi = conectar_wifi();    
  }

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
  String comandoCON = "AT+CWJAP=\"UNICAUCA\",\"\"";
  //String comandoCON = "AT+CWJAP=\"Mobility City\",\"trollface\"";
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
  band_comp = 1;
  delay(200);
}



//.................................................
//Funcion Tx de datos 
//.................................................
void enviar_datos(int valTemp_zn, int humedad_zn, int lluvia_zn, int valTemp_zc, int humedad_zc, int lluvia_zc, int valTemp_zs, int humedad_zs, int lluvia_zs,  int fluCarr9HNorte, int fluCarr9HSur, int fluCarr6HNorte, int fluCarr6HSur)/* La función complementar sirve para enviar el dato  a */
{

  String comandoI = "AT+CIPSTART=\"TCP\",\"";
  comandoI += "10.130.0.95";
  //comandoI += "192.168.43.227"; // Dirección del servidor de datos, en este caso la IP de nuestra PC.
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
    
  String cadenaI = "POST /MobilityCity/MobilityCity/recibirDatos.php?cliTemperatura_zn=";
  cadenaI += valTemp_zn;
  cadenaI += "&cliHumedad_zn=";
  cadenaI += humedad_zn;
  cadenaI += "&cliLluvia_zn=";
  cadenaI += lluvia_zn;

  cadenaI += "&cliTemperatura_zc=";
  cadenaI += valTemp_zc;
  cadenaI += "&cliHumedad_zc=";
  cadenaI += humedad_zc;
  cadenaI += "&cliLluvia_zc=";
  cadenaI += lluvia_zc;

  cadenaI += "&cliTemperatura_zs=";
  cadenaI += valTemp_zs;
  cadenaI += "&cliHumedad_zs=";
  cadenaI += humedad_zs;
  cadenaI += "&cliLluvia_zs=";
  cadenaI += lluvia_zs;

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
  comando += "10.130.0.95";
  //comando += "192.168.43.227"; 
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
//.................................................
//Contar carro con sensor de distancia
//.................................................
int contarCarros(int numSensor){
      cuenta_ejec = 0;
      cuenta = 0;
      cuentaTemp = 0;
      bandera = 0;
      
      
      for (int i=0; i <= 100; i++){
                
        if(numSensor == 1){
          distancia1 =sonarCarr9HNorte.ping_cm();
        }else if(numSensor == 2){
          distancia1 =sonarCarr9HSur.ping_cm();
        }else if(numSensor == 3){
          distancia1 =sonarCarr6HNorte.ping_cm();
        }else if(numSensor == 4){
          distancia1 =sonarCarr6HSur.ping_cm();
        }else{
          Serial.println("[contarCarros] Error seleccionar sensor!");
        }
        if (distancia1 == 0){
          distancia = 14;
        }else{
          distancia = distancia1;
        }
        
        
        if (distancia < 10 && bandera == 0){
          cuentaTemp++;
          bandera = 1;   
        }else{
          cuentaTemp = cuentaTemp;
        }
        
        if (distancia < 10 && bandera ==1){
          bandera = 1;
        }else{
          bandera = 0;  
        }
          cuenta_ejec++;
          
        if(i == 100){          
          
          cuenta = cuentaTemp;
          
        }

        delay(100);
   }//Fin For
return cuenta;
  
}//funcion contar carros

