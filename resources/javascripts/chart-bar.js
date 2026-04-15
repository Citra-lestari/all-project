document.addEventListener("DOMContentLoaded", function() {
    var chartEl = document.querySelector("#bar-chart");
    if (!chartEl) return;

    var days = JSON.parse(chartEl.dataset.days);
    var seriesData = JSON.parse(chartEl.dataset.series);

    var series = [
        { name: "X RPL", data: seriesData["X RPL"] },
        { name: "XI RPL", data: seriesData["XI RPL"] },
        { name: "XII RPL", data: seriesData["XII RPL"] }
    ];

    var allValues = [].concat(
        seriesData["X RPL"],
        seriesData["XI RPL"],
        seriesData["XII RPL"]
    );
    var maxValue = Math.max(...allValues);

    var yMax;
    if (maxValue <= 5) {
        yMax = 5;
    } else if (maxValue <= 15) {
        yMax = 15;
    } else if (maxValue <= 25) {
        yMax = 30;
    } else if (maxValue <= 35) {
        yMax = 40;
    } else if (maxValue <= 45) {
        yMax = 50;
    } else {
        yMax = Math.ceil(maxValue / 10) * 10;
    }

    var options = {
        chart: {
            type: 'bar',
            height: 350,
            toolbar: { show: false }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '50%',
                borderRadius: 4
            }
        },
        dataLabels: { enabled: false },
        stroke: { show: true, width: 2, colors: ['transparent'] },
        xaxis: { categories: days },
        yaxis: { 
            title: { text: 'Jumlah Siswa' },
            max: yMax
        },
        fill: { opacity: 1, colors: ['#3BA8D1', '#6359E9', '#136C8E'] },
        legend: { show: false }, // <-- legend disembunyikan
        tooltip: { y: { formatter: function(val) { return val; } } },
        series: series
    };

    var chart = new ApexCharts(chartEl, options);
    chart.render();
});
