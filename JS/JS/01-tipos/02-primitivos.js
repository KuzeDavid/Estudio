let numero = 1;
let texto = "Hola mundo";
let verdadero = true;
let falso = false;
let noDefinido ;
let undef = undefined;
let nulo = null;

//constantes

const nombrec = "chanchito";

// tipado dinamico
let nombre = "hola mundo";
nombre = 43;
// type of sirve para determinar el tipo de dato
console.log(typeof numero);
console.log(typeof nombre);
console.log(typeof verdadero);
console.log(typeof nulo);

// objetos OBJETOS

let nombret = "Tanjiro";
let anime = "Demon slayer";
let edad = 16;

let personaje = {
    nombre: "Tanjiro",
    anime: "Demon Slayer",
    edad: 16,
};
console.log(personaje.nombre); //Dos formas de acceder a las propiedades de los objetos
console.log(personaje['nombre']);

personaje.edad = 13;
personaje['anime'] = 'Demon kakagarui';

console.log(personaje.anime);

//ARREGLOS
let animales = ['chanchito', 'caballo'];
console.log(animales);
console.log(animales[0]);
console.log(typeof animales);
console.log(animales.length);

// funciones
function saludar(){
    console.log('Hola mundo');
}
saludar();

function suma(){
    return 2+2;
}
console.log(suma());

// funciones con argumentos
function suma(a,b){
    console.log(arguments);
    return a+b;
}

console.log(suma(2,3,5,6));

// expressions, declaration and statement
// declaration: crear algo para referenciar en un futuro let y const, function, async function con y sin *, export e import
// cualquier cosa que no entre alli arriba es statement: it, for, else, switch
// expression cualquier linea de codigo que evalue en un valor: 4+6 = 10 o asignacion x=4, o llamado a funcion miFuncion(), basicamente obtencion de un valor

// OPERADORES
let a=1;
console.log(++a); //primero suma y luego imprime
console.log(a++); //primero imprime y luego suma. Existen - * \ ** etc.
console.log(a);

//de comparacion >=, <=, !=, ==, etc. cuando es === es con tipo de dato y si es el mismo dato

// SHORT-CIRCUIT condicionar con operadores and o or hacia otras funciones o valores
//Falso: false, 0, ''', null, undefined, NaN

// for of se utiliza para iterar en los valores de un arreglo principalmente, conjunto, mapa
let animaless = ['Chanchito', 'Dragon', 'Perrito']
for (let animal of animaless){
    console.log(animal);
}

// for in para iterar en propiedades de un objeto
for(let prop in personaje){
    console.log(prop, personaje[prop]);
}
