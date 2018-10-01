
#include <NewPing.h>    // SE importa la libreria NewPing
#define TRIGGER_PIN  9  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN     8 // Arduino pin tied to echo pin on the ultrasonic sensor.
#define MAX_DISTANCE 14 // Maximum distance we want to ping for (in centimeters). Maximum sensor distance is rated at 400-500cm.

NewPing sonar(TRIGGER_PIN, ECHO_PIN, MAX_DISTANCE); // NewPing setup of pins and maximum distance.

/* Contadores */
int cuenta =0;
int cuenta_ejec = 0;

int distancia = 0;
int distancia1 = 0;
int bandera = 0;    //saber si hay carro o no

void setup(){
    Serial.begin(115200); // Open serial monitor at 115200 baud to see ping results.
}

void loop() {
      // en la variable distancia guardamos la distancia en centimetros que detecta el sonar respecto al objetivo
      cuenta_ejec = 0;
      cuenta = 0;
      bandera = 0;
      
      for (int i=0; i <= 50; i++){
        
        distancia1 = sonar.ping_cm();
        if (distancia1 == 0){
          distancia = 14;
        }else{
          distancia = distancia1;
        }
        
        
        if (distancia < 11 && bandera == 0){
          cuenta++;
          bandera = 1;   
        }else{
          cuenta = cuenta;
        }
        
        if (distancia < 11 && bandera ==1){
          bandera = 1;
        }else{
          bandera = 0;  
        }
          cuenta_ejec++;
        Serial.print("Dist: ");
          Serial.println(distancia);
        if(i == 50){          
          Serial.print("Num: ");
          Serial.println(cuenta);
          
        }

        delay(100);
   }//Fin For     
}//Fin Loop

