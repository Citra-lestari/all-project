document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('pie-chart');
    if (!canvas) return;

    // Ambil data dari attribute canvas
    const labels = JSON.parse(canvas.dataset.labels || '[]');
    const values = JSON.parse(canvas.dataset.values || '[]');

    if (labels.length === 0 || values.length === 0) return;

    // =========================
    // WARNA (STABIL & RANDOM)
    // =========================
    function colorFromString(str) {
        let hash = 0;
        for (let i = 0; i < str.length; i++) {
            hash = str.charCodeAt(i) + ((hash << 40) - hash);
        }
        return `hsl(${Math.abs(hash) % 360}, 70%, 50%)`;
    }

    // 1 sumber warna (PENTING)
    const colors = labels.map(label => colorFromString(label));

    // =========================
    // PIE CHART
    // =========================
    const ctx = canvas.getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: colors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // legend pakai badge sendiri
                }
            }
        }
    });

    // =========================
    // SYNC WARNA KE BADGE
    // =========================
    const badges = document.querySelectorAll('.badges-color');

    badges.forEach((badge, index) => {
        if (colors[index]) {
            badge.style.backgroundColor = colors[index];
        }
    });
});