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

console.log("Valor de x",x);
//Versión para 1 sola clase de datos
//Vamos a hacer la clasificacion
var p = Math.floor(x.length * Math.random());
console.log(p);
var c = x[p]; //Seleccionar algo al azar.
console.log(c);
var r = 1; // Radio predefinido de acuerdo al conocimiento del problema
var convergencia =[[c,r]];
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
  console.log("valores de las convergencias");
  console.log(convergencia);
  //console.log(convergencia[convergencia.length - 1][1]));
  // Condicion para salir por error
  if (Math.abs(convergencia[convergencia.length-1][0] - convergencia[convergencia.length - 2][0]) < 0.0001) {
      // El promedio se actualiza menos que el error 0.0001
      break;
    }
    
}
//datos de los diferentes dataset para la grafica
var linea_principalX=[];
var linea_convergencia=[];
var linea_mas_radio=[];
var linea_menos_radio=[];
var radios=[];

console.log("Valores de lectura");
linea_principalX = x.slice(-10);
console.log(linea_principalX);

console.log("Valores del radio");
radios = convergencia.map(valor => valor[1]);
console.log(radios);

console.log("Valores de convergecia");
linea_convergencia = convergencia.map(valor => valor[0]);
console.log(linea_convergencia);

// Insertar el primer valor de linea_convergencia a linea_principalX para que se vea continuo
linea_principalX.push(linea_convergencia[0]);

console.log("lineas de convergencia");
linea_mas_radio = linea_convergencia.map((valor, indice) => valor + radios[indice]);
linea_menos_radio = linea_convergencia.map((valor, indice) => valor - radios[indice]);
console.log(linea_mas_radio);
console.log(linea_menos_radio);

var valoresNaN = Array(linea_principalX.length-1).fill(NaN);
linea_convergencia.splice(0, 0, ...valoresNaN);
linea_mas_radio.splice(0, 0, ...valoresNaN);
linea_menos_radio.splice(0, 0, ...valoresNaN);

// Obtener el contexto del lienzo
var ctx = document.getElementById('myChart').getContext('2d');
var labels=[];
for(var i=0;i<linea_convergencia.length;i++)
  labels[i]=i;
// Datos de la gráfica de barras
var data = {
  labels: labels,
  datasets: [
    {
      label: 'Lecturas Actuales',
      data:linea_principalX,
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    },
    {
      label: 'Lecturas esperadas +',
      data:linea_mas_radio,
      fill: false,
      borderColor: 'rgb(100, 150, 192)',
      tension: 0.1
    },
    {
      label: 'Lecturas esperadas',
      data:linea_convergencia,
      fill: false,
      borderColor: 'rgb(100, 150, 192)',
      tension: 0.1
    },
    {
      label: 'Lecturas esperadas -',
      data:linea_menos_radio,
      fill: false,
      borderColor: 'rgb(100, 150, 192)',
      tension: 0.1
    }
  ]
};

var options = {
  responsive: true,
  maintainAspectRatio: false
};

// Crear la gráfica de barras
var myChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});

