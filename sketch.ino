#include<SoftwareSerial.h>
SoftwareSerial mySerial(9,11);

int read_count=0;
int j=0; // Variable to iterate in for loops
char data_temp, RFID_data[12], data_store[12];
boolean disp_control;

void setup()
{
  pinMode(8,LOW); 
  mySerial.begin(9600);
  Serial.begin(9600);
}

void loop()
{
RecieveData();
StoreData();
PrintData();
}

void RecieveData()
{
  if(mySerial.available()>0)
  {
    data_temp=mySerial.read(); // read data from RFID
    RFID_data[read_count]=data_temp;
    read_count++;
  }
}

void StoreData()
{
  if(read_count==12)
  {
    disp_control=true;  
    for(j=0;j<12;j++)
    {
        data_store[j]=RFID_data[j];
    }
    read_count=0;
  }
}

void PrintData()
{
if(disp_control==true)
{
    for(j=0;j<12;j++)
  {
    Serial.write(data_store[j]); //Write RFID Serial
  }
Serial.print("\t Dev1"); // Display RFID Reader Device Number
disp_control=false; 
Serial.println();
}
}

