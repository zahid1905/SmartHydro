// Obtener el contexto del lienzo
var ctx = document.getElementById('myChart').getContext('2d');

// Datos de la gráfica de barras
var data = {
  labels: ['Planta 1','Planta 2'],
  datasets: [{
    label: 'Litros',
    data: [120, 18],
    backgroundColor: 'rgba(0, 200, 0, 0.5)', // Color de las barras
    borderColor: 'rgba(0, 255, 0, 1)', // Color del borde de las barras
    borderWidth: 1 // Ancho del borde de las barras
  }]
};

// Opciones de la gráfica
var options = {
  scales: {
    y: {
      beginAtZero: true
    }
  }
};

// Crear la gráfica de barras
var myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});

