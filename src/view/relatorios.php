<main class="flex-grow max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Relatório de Evolução</h1>

    <div class="mb-4 overflow-x-auto">
        <canvas id="evolutionChart" class="max-w-full" width="400" height="200"></canvas>
    </div>
</main>

<script>
    // Converte os dados PHP para JavaScript
    const labels = <?= json_encode($dias); ?>;
    const pesoData = <?= json_encode($pesos); ?>;
    const imcData = <?= json_encode($imcs); ?>;
    const visceralData = <?= json_encode($viscerais); ?>;
    const gorduraData = <?= json_encode($gorduras); ?>;
    const musculoData = <?= json_encode($musculos); ?>;

    // Configuração do gráfico
    const ctx = document.getElementById('evolutionChart').getContext('2d');
    const evolutionChart = new Chart(ctx, {
        type: 'line', // Tipo de gráfico: linha
        data: {
            labels: labels, // Dias (datas)
            datasets: [
                {
                    label: 'Peso (kg)',
                    data: pesoData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false,
                    tension: 0.1
                },
                {
                    label: 'IMC',
                    data: imcData,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: false,
                    tension: 0.1
                },
                {
                    label: 'Gordura Visceral',
                    data: visceralData,
                    borderColor: 'rgba(255, 206, 86, 1)',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    fill: false,
                    tension: 0.1
                },
                {
                    label: 'Gordura Total (%)',
                    data: gorduraData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: false,
                    tension: 0.1
                },
                {
                    label: 'Músculo (%)',
                    data: musculoData,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: false,
                    tension: 0.1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Evolução do Peso e Indicadores de Saúde'
                }
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Datas'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Valores'
                    }
                }
            }
        }
    });
</script>
