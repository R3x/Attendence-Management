#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <time.h>
#include <Ticker.h>

Ticker blinker;

#define RANDOM_MAX 0x7FFFFFFF

#define LED 2
unsigned test_in=1000,test;
const char* password = "'_':|^^|{}D";
char ssid[100];
unsigned long randomo(unsigned int *ctx)
{
         /*
>        * Compute x = (7^5 * x) mod (2^31 - 1)
>        * wihout overflowing 31 bits:
>        *      (2^31 - 1) = 127773 * (7^5) + 2836
>        * From "Random number generators: good ones are hard to find",
>        * Park and Miller, Communications of the ACM, vol. 31, no. 10,
>        * October 1988, p. 1195.
>        */
       unsigned long hi, lo, x;

      x = *ctx;
       /* Can't be initialized with 0, so use another value. */
       if (x == 0)
              x = 123459876L;
      hi = x / 127773L;
      lo = x % 127773L;
      x = 16807L * lo - 2836L * hi;
       if (x < 0)
              x += 0x7fffffffL;
       return ((*ctx = x) % ((unsigned long)RANDOM_MAX + 1));
}


void changeWifi()
{
  test = randomo(&test_in);
  test_in=test;
  Serial.print(test);
  sprintf(ssid, "bi0s_%d", test);
  WiFi.softAP(ssid, password);
  IPAddress myIP = WiFi.softAPIP();
  digitalWrite(LED,!(digitalRead(LED)));
  delay(1000);
  digitalWrite(LED,!(digitalRead(LED)));
}
void setup() {
  delay(1000);
  Serial.begin(115200);
  Serial.println();
  Serial.print(test);
  Serial.print("Initial Setup");
  pinMode(LED, OUTPUT);
  digitalWrite(LED, HIGH);
  test = randomo(&test_in);
  test_in=test;
  Serial.print(test);
  sprintf(ssid, "bi0s_%d", test);
  WiFi.softAP(ssid, password);
  delay(180000);
  blinker.attach(1800, changeWifi);
}

void loop() {
}
