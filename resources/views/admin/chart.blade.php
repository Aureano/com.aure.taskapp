<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <canvas id="myPieChart" width="125" height="130" style="border: 1px solid red"></canvas>

    <script src="{{ asset('vendor/Chart/dist/chart.umd.js') }}"></script>

    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');

// Créez un nouveau graphique de type "pie"
var myPieChart = new Chart(ctx, {
    type: 'doughnut', // Type de graphique (camembert)
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'], // Étiquettes des données
        datasets: [{
            label: '# of Votes', // Label de la légende
            data: [12, 19, 3, 5, 2, 3], // Données du graphique
            backgroundColor: [ // Couleurs de fond des segments
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            hoverOffset: 4,
            borderColor: [ // Couleurs des bordures des segments
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1 // Largeur des bordures
        }]
    },
    options: {
        responsive: true, // Rendre le graphique réactif
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom', // Position de la légende
            },
            tooltip: {
                enabled: true // Activer les info-bulles
            },
            animation:{
                        animateRotate: true, // Anime la rotation des segments
                        animateScale: true,  // Anime la croissance des segments
                        duration: 1500, // Durée de l'animation en millisecondes
                        easing: 'easeOutBounce' // Type d'easing pour l'animation
                    }
        }
    }
});
    </script>


</body>
</html>
