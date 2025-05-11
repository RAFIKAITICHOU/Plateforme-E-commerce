<!DOCTYPE html>
<html lang="fr">
<head>
    @include('admin.css')
    <title>Admin Dashboard</title>
</head>
<body class="sub_page">
<div class="hero_area">

    <!-- Header Section -->
    @include('admin.header')

    <!-- Main Dashboard Content -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full text-center">
                        <h3>Admin Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Summary Statistics -->
    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <p class="card-text h4 text-success">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text h4">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text h4">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title">Revenue</h5>
                        <p class="card-text h4 text-primary">${{ number_format($totalRevenue, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Trend Chart -->
        <div class="mt-5">
            <h4>Tendances des ventes</h4>
            <canvas id="lineChart" height="100"></canvas>
        </div>

        <!-- Pie & Bar Grouped Charts -->
       <div class="row mt-5">
    <div class="col-lg-5 mb-4">
        <h4>Répartition des ventes</h4>
        <canvas id="pieChart" height="300"></canvas>
    </div>
    <div class="col-lg-7 mb-4">
        <h4>Ventes par produit par mois</h4>
        <div style="height: 380px;">
            <canvas id="groupedBarChart" style="height: 100%;"></canvas>
        </div>
    </div>
</div>
</div>
 <!-- Footer Section -->
    @include('admin.footer')
<!-- Scripts -->
@include('admin.script')

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Graphique en ligne -->
<script>
fetch('/sales-data')
    .then(res => res.json())
    .then(data => {
        const labels = data.map(item => item.month);
        const revenues = data.map(item => item.revenue);

        new Chart(document.getElementById("lineChart"), {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: "Revenus des ventes",
                    data: revenues,
                    borderColor: "#007bff",
                    backgroundColor: "rgba(0, 123, 255, 0.2)",
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<!-- Diagramme circulaire -->
<script>
fetch('/sales-pie-data')
    .then(res => res.json())
    .then(data => {
        const labels = data.map(item => item.label);
        const values = data.map(item => item.value);

        new Chart(document.getElementById("pieChart"), {
            type: "pie",
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ["#f87171", "#60a5fa", "#34d399", "#facc15", "#c084fc", "#fb7185"]
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>

<!-- Diagramme à barres groupées -->
<script>
fetch('/grouped-sales-data')
    .then(res => res.json())
    .then(data => {
        const colors = [
            '#f87171', '#60a5fa', '#34d399', '#fbbf24', '#a78bfa', '#fb7185', '#6366f1'
        ];

        const datasets = data.datasets.map((dataset, index) => ({
            ...dataset,
            backgroundColor: colors[index % colors.length]
        }));

        new Chart(document.getElementById("groupedBarChart"), {
            type: "bar",
            data: {
                labels: data.labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    x: { stacked: false },
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>

</body>
</html>
