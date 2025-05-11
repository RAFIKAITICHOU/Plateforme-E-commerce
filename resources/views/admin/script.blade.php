<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    window.onload = function() {
        updateDashboard();
    };

    function updateDashboard() {
        const products = JSON.parse(localStorage.getItem('products')) || [];
        const sales = JSON.parse(localStorage.getItem('sales')) || [];
        const users = JSON.parse(localStorage.getItem('users')) || [];

        const totalProducts = products.length;
        const totalSales = sales.length;
        const totalUsers = users.length;
        const revenue = sales.reduce((total, sale) => total + sale.amount, 0);

        document.getElementById('totalSales').innerText = `$${totalSales}`;
        document.getElementById('totalProducts').innerText = totalProducts;
        document.getElementById('totalUsers').innerText = totalUsers;
        document.getElementById('revenue').innerText = `$${revenue}`;

        const ctx = document.getElementById('salesChart')?.getContext('2d');
        if (ctx) {
            const salesData = sales.map(sale => sale.amount);
            const labels = sales.map(sale => new Date(sale.date).toLocaleDateString());

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Sales Revenue',
                        data: salesData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false
                    }]
                }
            });
        }
    }
</script>

<!-- contacts -->

 <!-- CSS Bootstrap depuis CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style général (optionnel si tu veux un peu plus d'intégration) -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #dc3545;
        }
        .btn-retour {
            float: right;
        }
    </style>