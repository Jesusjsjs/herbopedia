let datos = [
    300, 500, 350, 700, 300, 500, 400, 700, 650, 
    350, 550, 800, 250, 720, 400, 300, 350, 900,
    250, 200, 300, 280, 375, 390, 567, 876, 769,
    400, 275, 650, 632, 345, 654, 420, 550, 600,
    740, 590, 630, 770, 800, 950, 450, 700, 900,
    670, 550, 670, 420, 550, 600, 720, 200, 670
]

let lim1 = [];
let lim2 = [];
let lim3 = [];
let lim4 = [];
let lim5 = [];
let lim6 = [];
let lim7 = [];

let frecuencias = [];

datos.forEach(element => {
    if( element >= 200 && element <= 307 ){
        lim1.push(element);
    } else if( element >= 308 && element <= 415 ){
        lim2.push(element);
    } else if( element >= 416 && element <= 523 ){
        lim3.push(element);
    } else if( element >= 524 && element <= 631 ){
        lim4.push(element);
    } else if( element >= 632 && element <= 739 ){
        lim5.push(element);
    } else if( element >= 740 && element <= 847 ){
        lim6.push(element);
    } else if( element >= 848 && element <= 955 ){
        lim7.push(element);
    }
});

console.log(lim1.length);
console.log(lim2.length);
console.log(lim3.length);
console.log(lim4.length);
console.log(lim5.length);
console.log(lim6.length);
console.log(lim7.length);


frecuencias.push(lim1.length);
frecuencias.push(lim2.length);
frecuencias.push(lim3.length);
frecuencias.push(lim4.length);
frecuencias.push(lim5.length);
frecuencias.push(lim6.length);
frecuencias.push(lim7.length);

console.log(frecuencias);

frecuencias[0]

let col1 = 200 + 307 / 2;
let col2 = 308 + 415 / 2;
let col3 = 416 + 523 / 2;
let col4 = 200 + 307 / 2;
let col5 = 200 + 307 / 2;
let col6 = 200 + 307 / 2;
let col7 = 200 + 307 / 2;

	

//Histograma y el poligono de frecuencia
//Tabla z 

console.log(col1);
console.log(col2);
console.log(col3);
console.log(col4);
console.log(col5);
console.log(col6);
console.log(col7);



