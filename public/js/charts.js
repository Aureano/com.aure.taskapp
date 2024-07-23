var ctx = document.getElementById('myPieChart').getContext('2d');
       
    


    var myPieChart = new Chart(ctx, {
    type: 'doughnut', // Type de graphique (camembert)
    data: {
        labels: ['Terminée', 'En cours', 'En attente', 'New'], // Étiquettes des données
        datasets: [{
            label: '# of Votes', // Label de la légende
            data: [terminée, enCours, enAttente, newVar], // Données du graphique
            backgroundColor: [ // Couleurs de fond des segments
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            hoverOffset: 4,

            borderWidth: 1 // Largeur des bordures
        }]
    },
    options: {
        responsive: true, // Rendre le graphique réactif
        maintainAspectRatio: false,
        plugins: {
            title:{
             display:true,
             text:''
            },
            legend: {
                position: 'right', // Position de la légende
            },
            tooltip: {
                enabled: true // Activer les info-bulles
            },
            animation:{
                        animateRotate: true, // Anime la rotation des segments
                        animateScale: true,  // Anime la croissance des segments
                        duration: 5000, // Durée de l'animation en millisecondes
                        easing: 'easeOutBounce', // Type d'easing pour l'animation

                        onProgress: function(animation) {
                            var chart = animation.chart;
                            var dataset = chart.data.datasets[0];
                            var easingFunction = Chart.helpers.easing.easeOutBounce;
                            var easingValue = easingFunction(animation.currentStep / animation.numSteps);

                            dataset.data.forEach(function(value, index) {
                                var meta = chart.getDatasetMeta(0);
                                meta.data[index].outerRadius = easingValue * meta.data[index].outerRadius;
                            });

                            chart.update();

                    }
                }
        }
    }
});

