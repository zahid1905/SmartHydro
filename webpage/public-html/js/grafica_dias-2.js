// Obtén una referencia al elemento canvas en tu HTML
   var ctx = document.getElementById('myChart').getContext('2d');

   // Configura los datos del gráfico
   var data = {
       labels: [
           'Dias Transcurridos',
           'Dias Faltantes',
       ],
       datasets: [{
           label: 'Dias de cultivos',
           data: [30, 500],
           backgroundColor: [
           'rgb(0, 128, 0)',
           'rgb(255, 0, 0)',
           ],
           hoverOffset: 4
       }]
   };

   // Configura las opciones del gráfico
   var options = {
       responsive: true,
       maintainAspectRatio: false
   };

   // Crea la instancia del gráfico de líneas
   var myChart = new Chart(ctx, {
       type: 'doughnut',
       data: data,
       options: options
   });
