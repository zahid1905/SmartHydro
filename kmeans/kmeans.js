function randn(n) {
    var arreglo = [];
    for (var i = 0; i < n; i++) {
        arreglo.push(Math.random() * 2 - 1);
    }
    return arreglo;
}

function promedio(lista) {
    var s = 0;
    for (var i = 0; i < lista.length; i++) {
        s += lista[i]; // Sumamos los elementos que pertenecen
    }
    // Promedio
    var c = s / lista.length;
    return c;
}

function desvEst(lista, prom) {
    var s = 0;
    for (var i = 0; i < lista.length; i++) {
        s += Math.pow(lista[i] - prom, 2); // Sumamos los elementos que pertenecen
    }
    var des = Math.sqrt(s / lista.length);
    return des;
}


var x = []
x = x.concat(randn(10).map(num => 120 + 2 * num));
x = x.concat(randn(2).map(num => 2 + 1 * num));
x = x.concat(randn(10).map(num => 120 + 2 * num));


//Versión para 1 sola clase de datos
//Vamos a hacer la clasificacion
var p = Math.floor(x.length * Math.random());
console.log(p);
var c = x[p]; //Seleccionar algo al azar.
console.log(c);
var r = 1; // Radio predefinido de acuerdo al conocimiento del problema

for (var veces = 1; veces <= 1000000; veces++) {
    var pertenece = Array(x.length).fill(0);
    // Identificar a los elementos que pertenecen al circulo
    for (var i = 0; i < pertenece.length; i++) {
        if (Math.abs(x[i] - c) <= r) {
            pertenece[i] = 1; // Si estas dentro del radio
        }
    }
    // Calcular el nuevo promedio
    var elementosPertenecientes = x.filter((_, i) => pertenece[i]);
    var c = promedio(elementosPertenecientes);
    // Calcular la desviacion estandar
    var r = 2 * desvEst(elementosPertenecientes, c);

    console.log(`Iteraciones ${veces} : Clase ${c.toFixed(4)} con un radio ${r.toFixed(4)}`);
    convergencia.push([c, r]);

    // Condicion para salir por error
    if (Math.abs(convergencia[convergencia.length - 1][0] - convergencia[convergencia.length - 2][0]) < 0.0001) {
        // El promedio se actualiza menos que el error 0.0001
        break;
      }
      
}