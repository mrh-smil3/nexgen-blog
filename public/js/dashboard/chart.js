document.addEventListener("DOMContentLoaded", function () {
    let chart;

    // Grafik untuk kunjungan per hari di bulan berjalan
    const dailyCtx = document.getElementById("dailyChart").getContext("2d");
    // Grafik untuk kunjungan per bulan
    const monthlyCtx = document.getElementById("monthlyChart").getContext("2d");

    function updateChart() {
        //harian
        fetch("/api/visits-data")
            .then((response) => response.json())
            .then((data) => {
                if (chart) {
                    chart.data.labels = data.labels;
                    chart.data.datasets[0].data = data.values;
                    chart.update(); // Memperbarui grafik dengan data baru
                } else {
                    chart = new Chart(dailyCtx, {
                        // Menggunakan dailyCtx, bukan ctx
                        type: "line",
                        data: {
                            labels: data.labels,
                            datasets: [
                                {
                                    label: "Jumlah Kunjungan Harian",
                                    data: data.values,
                                    borderColor: "rgba(75, 192, 192, 1)",
                                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                                    borderWidth: 1,
                                },
                            ],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    });
                }
            })
            .catch((error) =>
                console.error("Error fetching visits data:", error),
            );
    }

    updateChart(); // Memperbarui grafik pertama kali
    setInterval(updateChart, 5000); // Memperbarui setiap 5 detik

    //bulanan
    fetch("/api/monthly-visits")
        .then((response) => response.json())
        .then((data) => {
            const monthlyChart = new Chart(monthlyCtx, {
                type: "bar", // Grafik tipe bar
                data: {
                    labels: data.labels, // Bulan-bulan
                    datasets: [
                        {
                            label: "Kunjungan Bulanan",
                            data: data.values, // Jumlah kunjungan per bulan
                            backgroundColor: "rgba(54, 162, 235, 0.2)",
                            borderColor: "rgba(54, 162, 235, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        });
});
