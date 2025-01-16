document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('adminChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Monthly Visitors',
                data: [120, 150, 180, 220, 300],
                backgroundColor: [
                    'rgba(76, 175, 80, 0.8)', // Green
                    'rgba(255, 193, 7, 0.8)', // Yellow
                    'rgba(33, 150, 243, 0.8)', // Blue
                    'rgba(244, 67, 54, 0.8)', // Red
                    'rgba(156, 39, 176, 0.8)'  // Purple
                ],
                borderColor: [
                    'rgba(76, 175, 80, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(33, 150, 243, 1)',
                    'rgba(244, 67, 54, 1)',
                    'rgba(156, 39, 176, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#eaeaea', // Light text for dark background
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#eaeaea'
                    }
                },
                y: {
                    ticks: {
                        color: '#eaeaea'
                    }
                }
            }
        }
    });
});
