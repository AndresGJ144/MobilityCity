// set pin numbers:
#include <stdlib.h>
#include <DHT.h>


// Constantes utilizados en el sensor de temperatura
const int Sensor_Temp = 49;
float temperatura, humedad;
DHT objDht (Sensor_Temp, DHT11);

//Constantes utilizados en el sensor de lluvia
const int Sensor_AnalogLLuvia = A0;
const int Sensor_DigLLuvia = 48;

/*//Variables para control de wifi
const int led1pin = 10;
const int led2pin = 9;
const int led3pin = 8;
const int boton1 = 2;
*/
int band_comp = 1;
int estado_conWifi = 0;   //Retorno de la funcion conectar_wifi()

//Contar Carros
#include <NewPing.h>    // SE importa la libreria NewPing
#define MAX_DISTANCE 200 // Maximum distance we want to ping for (in centimeters). Maximum sensor distance is rated at 400-500cm.

#define TRIGGER_PIN_1  11  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_1     10  // Arduino pin tied to echo pin on the ultrasonic sensor.

#define TRIGGER_PIN_2  9  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_2     8  // Arduino pin tied to echo pin on the ultrasonic sensor.

#define TRIGGER_PIN_3  7  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_3     6  // Arduio pin tied to echo pin on the ultrasonic sensor.

#define TRIGGER_PIN_4  5  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN_4     4  // Arduino pin tied to echo pin on the ultrasonic sensor.


NewPing sonar_Carr9HNorte(TRIGGER_PIN_1, ECHO_PIN_1, MAX_DISTANCE); // NewPing setup of pins and maximum distance.
NewPing sonar_Carr9HSur(TRIGGER_PIN_2, ECHO_PIN_2, MAX_DISTANCE);
NewPing sonar_Carr6HNorte(TRIGGER_PIN_3, ECHO_PIN_3, MAX_DISTANCE);
NewPing sonar_Carr6HSur(TRIGGER_PIN_4, ECHO_PIN_4, MAX_DISTANCE);
/*
NewPing sonar_Carr9HNorte   (11, 10, MAX_DISTANCE); // NewPing setup of pins and maximum distance.
NewPing sonar_Carr9HSur     (9, 8, MAX_DISTANCE);
NewPing sonar_Carr6HNorte   (7, 6, MAX_DISTANCE);
NewPing sonar_Carr6HSur     (5, 4, MAX_DISTANCE);
*/
int cuenta_ejec = 0;

int cuenta_Carr9HNorte =0;
int Num_Carr9HNorte =0;
int distancia_Carr9HNorte = 0;
int distancia1_Carr9HNorte = 0;
int bandera_Carr9HNorte = 0; 

int cuenta_Carr9HSur =0;
int Num_Carr9HSur =0;
int distancia_Carr9HSur = 0;
int distancia1_Carr9HSur = 0;
int bandera_Carr9HSur = 0; 

int cuenta_Carr6HNorte =0;
int Num_Carr6HNorte =0;
int distancia_Carr6HNorte = 0;
int distancia1_Carr6HNorte = 0;
int bandera_Carr6HNorte = 0; 

int cuenta_Carr6HSur =0;
int Num_Carr6HSur =0;
int distancia_Carr6HSur = 0;
int distancia1_Carr6HSur = 0;
int bandera_Carr6HSur = 0; 

//.............................................................
// setup - loop
//.............................................................

void setup() {

  
  //obj Sensor de temperatura
  objDht.begin();

  //Variables para el sensor de lluvia
  pinMode(Sensor_DigLLuvia, INPUT);

  Serial.begin(115200);
  Serial2.begin(115200);
  Serial2.println("AT+RST");
  delay(2000);
  estado_conWifi = conectar_wifi();  //1 -> se conecto
  attachInterrupt(0, fijar_band_comp, FALLING);
}

void loop() {
  
  cuenta_ejec = 0;
    
  Num_Carr9HNorte = 0;
  cuenta_Carr9HNorte = 0;
  bandera_Carr9HNorte = 0;
  
  Num_Carr9HSur = 0;
  cuenta_Carr9HSur = 0;
  bandera_Carr9HSur = 0;
  
  Num_Carr6HNorte = 0;
  cuenta_Carr6HNorte = 0;
  bandera_Carr6HNorte = 0;

  Num_Carr6HSur = 0;
  cuenta_Carr6HSur = 0;
  bandera_Carr6HSur = 0;
  
  if(estado_conWifi == 1){
    
    String estado_leds;
    estado_leds = leer_estado_leds();
  
    if (estado_leds == "0CL") {
      Serial.println("[loop] Transmision de datos desactivada!");
    }
    else
    {
      humedad = objDht.readHumidity();
      temperatura =  objDht.readTemperature();
      Serial.print("[loop] Temp: ");
      Serial.print(temperatura);
      Serial.print("C  - Humedad: ");
      Serial.print(humedad);
      Serial.print("% ");
  
      // Para sensar si esta lloviendo o no
      int lluviaLector = digitalRead(Sensor_DigLLuvia);
       Serial.print(" - vAnalogico: ");
      Serial.print(analogRead(Sensor_AnalogLLuvia));//lectura analógica
      Serial.print(" -  vDigital: ");
      Serial.print(lluviaLector);//lectura digital
  
      
  
      //conteo de carros
      //conteo de carros
      //Tener cuidado con el delay y los ciclos del for
      for (int i=0; i <= 50; i++){        
            distancia1_Carr9HNorte =  sonar_Carr9HNorte.ping_cm();
            distancia1_Carr9HSur =    sonar_Carr9HSur.ping_cm();
            distancia1_Carr6HNorte =  sonar_Carr6HNorte.ping_cm();
            distancia1_Carr6HSur =    sonar_Carr6HSur.ping_cm();
            //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
            if (distancia1_Carr9HNorte == 0){
              distancia_Carr9HNorte = 200;
            }else{
              distancia_Carr9HNorte = distancia1_Carr9HNorte;
            }
            //aaaaaaa
            if (distancia1_Carr9HSur == 0){
              distancia_Carr9HSur = 200;
            }else{
              distancia_Carr9HSur = distancia1_Carr9HSur;
            }
            //aaaaaaa
            if (distancia1_Carr6HNorte == 0){
              distancia_Carr6HNorte = 200;
            }else{
              distancia_Carr6HNorte = distancia1_Carr6HNorte;
            }
            //aaaaaaa
            if (distancia1_Carr6HSur == 0){
              distancia_Carr6HSur = 200;
            }else{
              distancia_Carr6HSur = distancia1_Carr6HSur;
            }
            //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq            
            if (distancia_Carr9HNorte < 20 && bandera_Carr9HNorte == 0){
              cuenta_Carr9HNorte++;
              bandera_Carr9HNorte = 1;   
            }else{
              cuenta_Carr9HNorte = cuenta_Carr9HNorte;
            }
            //aaaaaaa
            if (cuenta_Carr9HSur < 20 && bandera_Carr9HSur == 0){
              cuenta_Carr9HSur  ++;
              bandera_Carr9HSur = 1;   
            }else{
              cuenta_Carr9HSur = cuenta_Carr9HSur;
            }
            //aaaaaaa
            if (distancia_Carr6HNorte < 20 && bandera_Carr6HNorte == 0){
              cuenta_Carr6HNorte++;
              bandera_Carr6HNorte = 1;   
            }else{
              cuenta_Carr6HNorte = cuenta_Carr6HNorte;
            }
            //aaaaaaa
            if (distancia_Carr6HSur < 20 && bandera_Carr6HSur == 0){
              cuenta_Carr6HSur++;
              bandera_Carr6HSur = 1;   
            }else{
              cuenta_Carr6HSur = cuenta_Carr6HSur;
            }
            //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 
            if (distancia_Carr9HNorte < 20 && bandera_Carr9HNorte ==1){
              bandera_Carr9HNorte = 1;
            }else{
              bandera_Carr9HNorte = 0;  
            }
            //aaaaaaa
            if (distancia_Carr9HSur < 20 && bandera_Carr9HSur ==1){
              bandera_Carr9HSur = 1;
            }else{
              bandera_Carr9HSur = 0;  
            }
            //aaaaaaa
            if (distancia_Carr6HNorte < 20 && bandera_Carr6HNorte ==1){
              bandera_Carr6HNorte = 1;
            }else{
              bandera_Carr6HNorte = 0;  
            }
            //aaaaaaa
            if (distancia_Carr6HSur < 20 && bandera_Carr6HSur ==1){
              bandera_Carr6HSur = 1;
            }else{
              bandera_Carr6HSur = 0;  
            }
            //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 
            ;
                     
            if(i == 50){
              Num_Carr9HNorte =   cuenta_Carr9HNorte;
              Num_Carr9HSur =     cuenta_Carr9HSur;
              Num_Carr6HNorte =   cuenta_Carr6HNorte;
              Num_Carr6HSur =     cuenta_Carr6HSur;          
              Serial.print(" -- Num: ");
              Serial.print(cuenta_Carr9HNorte);
              Serial.print(" -- ");
              Serial.print(cuenta_Carr9HSur);
              Serial.print(" -- ");
              Serial.print(cuenta_Carr6HNorte);
              Serial.print(" -- ");
              Serial.println(cuenta_Carr6HSur);
              
            }
            //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 
            delay(100);
            cuenta_ejec++;
       }//Fin For     
  
      //Wifi
      //void enviar_datos(int valTemp, int humedad, int lluvia, String zona, int fluCarr9HNorte, int fluCarr9HSur, int fluCarr6HNorte, int fluCarr6HSur)/* La función complementar sirve para enviar el dato  a */
      String climaZona = "centro";
      enviar_datos(temperatura, humedad, lluviaLector, climaZona, Num_Carr9HNorte, Num_Carr9HSur, Num_Carr6HNorte, Num_Carr6HSur);
    }
    delay(5000);
  
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
  String comandoCON = "AT+CWJAP=\"ingenieria\",\"9876543210\"";
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
void enviar_datos(int valTemp, int humedad, int lluvia, String zona, int fluCarr9HNorte, int fluCarr9HSur, int fluCarr6HNorte, int fluCarr6HSur)/* La función complementar sirve para enviar el dato  a */
{

  String comandoI = "AT+CIPSTART=\"TCP\",\"";
  comandoI += "192.168.128.55"; // Dirección del servidor de datos, en este caso la IP de nuestra PC.
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
  comando += "192.168.128.55"; 
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



