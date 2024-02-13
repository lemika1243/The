document.addEventListener("DOMContentLoaded", () => {
    var nbrJour = document.getElementById("nombre_jour");
    var nbrAchat = document.getElementById("nombre_achat");
    var min_achat = document.getElementById("min_achat");
    var max_achat = document.getElementById("max_achat");
    new Chart(document.querySelector('#lineChart'), {
        type: 'line',
        data: {
            labels: getIdProduits(),

            datasets: [{
                label: 'Pourcentage Homme',
                //    data: historique(nbrJour.value, 43000, nbrAchat.value, min_achat.value, max_achat.value),
                data: [650, 590, 800, 810, 560, 100],

                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.4
            },
            {
                label: 'Pourcentage Femme',
                // data: historique(nbrJour.value, 39000, nbrAchat.value, min_achat.value, max_achat.value),
                data: [200, 100, 500, 700, 480, 350],
                fill: false,
                borderColor: 'rgb(13, 383, 29)',
                tension: 0.4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});