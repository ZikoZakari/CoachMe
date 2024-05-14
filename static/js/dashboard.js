new DataTable("#dashboards");
new DataTable("#messageAlert");
new DataTable("#users");
new DataTable("#contacts");
new DataTable("#newslatters");

// Fonction pour récupérer les données de l'API
function fetchData(chartType) {
  return fetch(`apiChart.php?chart=${chartType}`).then((response) =>
    response.json()
  );
}

// Création du graphique Bar
function createBarChart() {
  fetchData("bar").then((data) => {
    var barData = {
      labels: ["Hommes", "Femmes","Autres"],
      datasets: [
        {
          label: "Nombre de personnes",
          data: [data.nb_homme, data.nb_femme, data.nb_autre],
          backgroundColor: ["#007bff", "#dc3545","#e565f7"],
        },
      ],
    };

    var ctx = document.getElementById("barChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "bar",
      data: barData,
    });
  });
}

// Création du graphique Pie
function createPieChart() {
  fetchData("pie").then((data) => {
    var pieData = {
      labels: ["Clients Actifs", "Coachs Actifs", "Inscriptions en cours"],
      datasets: [
        {
          data: [data.nb_client, data.nb_coach_act, data.nb_coach_inAct],
          backgroundColor: ["#007bff", "#28a745", "#dc3545"],
        },
      ],
    };

    var ctx = document.getElementById("pieChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: "pie",
      data: pieData,
    });
  });
}

// Appel des fonctions pour créer les graphiques
createBarChart();
createPieChart();
