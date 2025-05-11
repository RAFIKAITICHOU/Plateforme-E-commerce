// Sample data for demonstration
const data = {
    orders: [
        { id: 1, user: 'John Doe', total: 120, date: '2023-12-01' },
        { id: 2, user: 'Jane Smith', total: 85, date: '2023-12-02' },
        { id: 3, user: 'Alice Johnson', total: 150, date: '2023-12-03' },
        { id: 4, user: 'Bob Brown', total: 95, date: '2023-12-04' },
        { id: 5, user: 'Charlie Davis', total: 110, date: '2023-12-05' },
    ],
    products: [
        { id: 1, name: 'Product A' },
        { id: 2, name: 'Product B' },
        { id: 3, name: 'Product C' },
    ],
    users: [
        { id: 1, name: 'John Doe' },
        { id: 2, name: 'Jane Smith' },
        { id: 3, name: 'Alice Johnson' },
    ],
};

// Utility to calculate total sales
function calculateTotalSales() {
    return data.orders.reduce((sum, order) => sum + order.total, 0);
}

// Utility to calculate revenue
function calculateRevenue() {
    return calculateTotalSales(); // Assuming revenue = total sales
}

// Function to display summary statistics
function displaySummary() {
    document.getElementById('totalSales').innerText = `$${calculateTotalSales()}`;
    document.getElementById('totalProducts').innerText = data.products.length;
    document.getElementById('totalUsers').innerText = data.users.length;
    document.getElementById('revenue').innerText = `$${calculateRevenue()}`;
}

// Function to generate sales trends data for Chart.js
function generateSalesTrends() {
    const dates = data.orders.map(order => order.date);
    const totals = data.orders.map(order => order.total);

    return { dates, totals };
}

// Function to render the sales trends chart
function renderSalesChart() {
    const { dates, totals } = generateSalesTrends();

    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Sales ($)',
                data: totals,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date',
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: 'Sales ($)',
                    },
                },
            },
        },
    });
}

// Initialize Dashboard
function initDashboard() {
    displaySummary();
    renderSalesChart();
}

initDashboard();
