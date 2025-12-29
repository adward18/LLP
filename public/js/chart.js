document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("reportChart").getContext("2d");
    const noDataMsg = document.getElementById("noDataMessage");

    // Data dari backend (format JSON)
    const chartData = window.chartData;

    // Cek apakah ada data
    const hasData =
        chartData.pending.some((val) => val > 0) ||
        chartData.approved.some((val) => val > 0) ||
        chartData.rejected.some((val) => val > 0);

    if (!hasData) {
        // Tampilkan pesan "belum ada data"
        noDataMsg.style.display = "flex";
        return;
    }

    // Sembunyikan pesan & tampilkan chart
    noDataMsg.style.display = "none";

    new Chart(ctx, {
        type: "line",
        data: {
            labels: chartData.labels,
            datasets: [
                {
                    label: "Pending",
                    data: chartData.pending,
                    borderColor: "#f59e0b",
                    backgroundColor: "rgba(245, 158, 11, 0.1)",
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    pointBackgroundColor: "#f59e0b",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                },
                {
                    label: "Approved",
                    data: chartData.approved,
                    borderColor: "#10b981",
                    backgroundColor: "rgba(16, 185, 129, 0.1)",
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    pointBackgroundColor: "#10b981",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                },
                {
                    label: "Rejected",
                    data: chartData.rejected,
                    borderColor: "#ef4444",
                    backgroundColor: "rgba(239, 68, 68, 0.1)",
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    pointBackgroundColor: "#ef4444",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 12,
                            weight: "600",
                        },
                    },
                },
                tooltip: {
                    backgroundColor: "rgba(0, 0, 0, 0.8)",
                    padding: 12,
                    titleFont: {
                        size: 13,
                        weight: "bold",
                    },
                    bodyFont: {
                        size: 12,
                    },
                    borderColor: "rgba(255, 255, 255, 0.1)",
                    borderWidth: 1,
                    displayColors: true,
                    callbacks: {
                        label: function (context) {
                            return (
                                context.dataset.label +
                                ": " +
                                context.parsed.y +
                                " laporan"
                            );
                        },
                    },
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 11,
                        },
                    },
                    grid: {
                        color: "rgba(0, 0, 0, 0.05)",
                        drawBorder: false,
                    },
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        font: {
                            size: 11,
                        },
                    },
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
        },
    });
});
