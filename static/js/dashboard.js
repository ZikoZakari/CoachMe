new DataTable('#dashboards');
new DataTable('#messageAlert');
new DataTable('#users');
new DataTable('#contacts');
new DataTable('#newslatters');

(() => {
    'use strict'
  
    // Graphs
    const ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
      type: 'line',
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
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 2,
          pointBackgroundColor: '#007bff'
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