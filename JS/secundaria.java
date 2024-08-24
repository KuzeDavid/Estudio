package com.mycompany.estudio;

import java.util.Scanner;

import javax.swing.JOptionPane;

public class secundaria {
    Scanner sc = new Scanner(System.in);

    
    public void EntradadeDatos() {
        Integer numero; //No primitivo
        int numeros; // Primitio
        final int numeroc= 10; //declaracion constante (no cambia)
        char letra;
        //Entrada y salida de datos
        System.out.println("Ingresa una letra");
        letra = sc.next().charAt(4); //para una letra
        System.out.println(letra);
    }
    public String entradaString(){
        System.out.println("Ingresa texto");
        return sc.nextLine();
    }
    public String optionPane(){
        /*JFrame frame = new JFrame(); JPanel panel = new JPanel(); JDialog dialog = new JDialog();*/
        String cadena;
        cadena = JOptionPane.showInputDialog("Digita una cadena");
        JOptionPane.showMessageDialog(null, "Gracias");
        return cadena;
    }
    public void convertir(){
        //Convertir cadena
        //entero = Integer.parseInt();
        //double = Double.parseDouble(); etc etc
    }
    public void programaHoras(){
        System.out.println("Ingresa las horas");
        int horas = sc.nextInt();
        int semanas = horas / 168;
        int dias = horas%168 /24;
        int horasf = horas%24;
        System.out.println("Semanas:"+semanas+"Dias:"+dias+ "Horas:"+horasf);
    }
    public void mul10(){ //Saber si un numero es multiplo de 10
        System.out.println("Ingresa un numero entero:");
        int entero = sc.nextInt();
        if(entero%10==0){
            System.out.println("Es multiplo");
        }
        else{
            System.out.println("No es multiplo");
        }
    }
    public void mayuscula(){ //Determinar si una letra es mayuscula
        System.out.println("Ingresa una letra");
        char letra = sc.next().charAt(0);
        if(Character.isUpperCase(letra)){
            System.out.println("Es mayuscula");
        }
        else{
            System.out.println("No es mayuscula");
        }
    }
    public void obrero(){ //Conocer el salario de un obrero segun horas trabajadas
        System.out.println("Ingresa las horas laboradas");
        int horas = sc.nextInt();
        int precioH=16, pago;
        if(horas<=40){
            pago = horas*precioH;
        }
        else{
            pago = (40*precioH) + ((horas-40)*20);
        }
        System.out.println("Remuneración: " + pago);
    }

    public void orden3(){ //ordenar 3 numeros
        System.out.println("Ingresa 3 numeros \n");
        int num1 = sc.nextInt();
        int num2 = sc.nextInt();
        int num3 = sc.nextInt();

        if(num1>num2){
            int aux = num2;
            num2 = num1;
            num1 = aux;
        }
        if(num2>num3){
            int aux = num3;
            num3 = num2;
            num2 = aux;
        }
        System.out.println("Orden: " + num1 + num2 + num3);
    }

    public void ciclo(){ //Realizar el cuadrado de un numero indefinidamente hasta insertar un negativo
        float n= 1;
        while(n>=0){
            System.out.println("Ingresa un numero");
            n = sc.nextFloat();
            float r = n * n;
            System.out.println(r);
        }
    }

    public void parOno(){
        double n=-1;
        while(n!=0){
            System.out.println("Ingresa un numero");
            n = sc.nextDouble();
            if(n%2==0){
                System.out.println("Par \n");
            }
            else{
                System.out.println("Impar \n");
            }
        }
    }

    public void cienmenossiete(){
        for (int i=100; i>=0 ; i-=7) {
            System.out.println(i);
        }
    }

    public void Arreglo(){
        System.out.println("Ingresa 10 numeros");
        int [] Edad = {1,4,2,6,6,3,8,9};
        for(int i:Edad){
            System.out.println(i);
        }
          
    }

    public void Ejercicio1(){
        int [] arreglo = new int[5];
        for (int i=0; i<5; i++) {
            System.out.println("Ingrese el numero: " +i);
            arreglo[i] = sc.nextInt();
        }
        for (int i : arreglo) {
            System.out.println("Impresion: "+ i);
        }
    }

    public void Arr3(){
        float [] arreglo = new float[5];
        float sumPos=0, sumNeg=0;
        int contadorceros=0, contPos=0, contNeg=0;
        System.out.println("Introduzca 5 numeros: \n");
        for(int i=0; i<5; i++){
            arreglo[i] = sc.nextFloat();
            if(arreglo[i]>0){
                sumPos += arreglo[i];
                contPos++;
            }
            if(arreglo[i]<0){
                sumNeg += arreglo[i];
                contNeg++;
            }if(arreglo[i]==0){
                contadorceros++;
            }
        }
        if(arreglo.length==0){
            System.out.println("No hay numeros");
        }else{
            float mediaPos=sumPos/contPos;
            float mediaNeg=sumNeg/contNeg;
            System.out.println("Media positivos: "+mediaPos+"\n Media negativos "+mediaNeg+"\n Ceros: "+contadorceros);
        }
    }

    public void Mezcla(){//Mezcla de dos arreglos en uno de forma intercalada
        int [] ArregloA = new int[10], ArregloB = new int[10];
        int [] ArregloC = new int[20];
        for(int i=0; i<10;i++){
            System.out.println("Ingresa el valor "+i+"A");
            ArregloA[i] = sc.nextInt();
        }
        for(int i=0; i<10;i++){
            System.out.println("Ingresa el valor "+i+"B");
            ArregloB[i] = sc.nextInt();
        }
        int j=0;
        for(int i=0; i<20;i+=2){
            ArregloC[i] = ArregloA[j];
            ArregloC[i+1] = ArregloB[j];
            j++;
        }
        for (int i : ArregloC) {
            System.out.println(i);
        }
    }

    public void ADoDes(){ //Indicar si en la lista es ascendente, descendente o desordenado
        int [] arr = new int[10];
        Boolean creciente=false, decreciente=false;
        System.out.println("Ingresa 10 numeros: \n");
        for (int i = 0; i < 10; i++) {
            arr[i] = sc.nextInt();
        }
        for (int i = 0; i < 9; i++) {
            if (arr[i] < arr[i+1]) {
                creciente = true;
            }
            if (arr[i] > arr[i+1]) {
                decreciente = true;
            }
        }
        if (creciente == true && decreciente == false) {
            System.out.println("El arreglo es creciente");
        }
        if (creciente == false && decreciente == true) {
            System.out.println("El arreglo es decreciente");
        }
        if (creciente == true && decreciente == true) {
            System.out.println("El arreglo es desordenado ");
        }
    }

    public void reorden(){ //Re ordenar el penultimo numero en la posicion del ultimo numero
        int [] arr = new int[10];
        System.out.println("Ingresa 10 enteros");
        for (int i = 0; i < 10; i++) {
            arr[i] = sc.nextInt();
        }

        int posicion = arr[9];
        int numero = arr[8];

        for (int i = 9  ; i > posicion ; i--) {
            arr[i] = arr[i-1];
        }
        arr[posicion] = numero;
        
        for (int i : arr) {
            System.out.println("Reordenada: "+i);
        }
    }

    public void desplaza1(){
        int [] arr = new int[10];
        System.out.println("Ingresa 10 enteros");
        for (int i = 0; i < arr.length; i++) {
            arr[i] = sc.nextInt();
        }
        int aux = arr[9];
        for (int i = 8; i >= 0; i--) {
            arr[i+1] = arr[i];
            if (i==0) {
                arr[i] = aux;
            }
        }
        for (int i : arr) {
            System.out.println("Impresion desplazada: "+i);
        }
    }

}
