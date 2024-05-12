new DataTable('#dashboards');
new DataTable('#messageAlert');
new DataTable('#users');
new DataTable('#contacts');
new DataTable('#newslatters');

(() => {
    'use strict'
  
    // Graphs
    const ctx = document.getElementById('myPie')
    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: [
          'Client',
          'Coach',
          'Inscription'
        ],
        datasets: [{
          data: [
            3,
            3,
            10
          ]
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            boxPadding: 3
          }
        }
      }
    })
  })()