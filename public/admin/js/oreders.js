// Initialize some sample orders if not already in local storage
if (!localStorage.getItem('orders')) {
    const sampleOrders = [
        {
            id: 1,
            user: 'John Doe',
            products: ['Product 1', 'Product 2'],
            status: 'Processing',
        },
        {
            id: 2,
            user: 'Jane Smith',
            products: ['Product 3'],
            status: 'Shipped',
        },
        {
            id: 3,
            user: 'Alice Johnson',
            products: ['Product 4', 'Product 5', 'Product 6'],
            status: 'Delivered',
        },
    ];
    localStorage.setItem('orders', JSON.stringify(sampleOrders));
}

// Function to fetch orders from local storage
function getOrders() {
    return JSON.parse(localStorage.getItem('orders')) || [];
}

// Function to save orders to local storage
function saveOrders(orders) {
    localStorage.setItem('orders', JSON.stringify(orders));
}

// Function to display orders in the table
function displayOrders() {
    const orders = getOrders();
    const tbody = document.getElementById('ordersTableBody');
    tbody.innerHTML = '';

    orders.forEach((order, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${order.id}</td>
            <td>${order.user}</td>
            <td>${order.products.join(', ')}</td>
            <td>${order.status}</td>
            <td>
                <button class="btn btn-info btn-sm" onclick="viewOrderDetails(${order.id})">Details</button>
                <button class="btn btn-warning btn-sm" onclick="changeOrderStatus(${order.id})">Change Status</button>
                <button class="btn btn-danger btn-sm" onclick="cancelOrder(${order.id})">Cancel</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Function to view order details
function viewOrderDetails(orderId) {
    const orders = getOrders();
    const order = orders.find((o) => o.id === orderId);
    if (order) {
        const details = `
            <strong>Order ID:</strong> ${order.id}<br>
            <strong>User:</strong> ${order.user}<br>
            <strong>Products:</strong> ${order.products.join(', ')}<br>
            <strong>Status:</strong> ${order.status}
        `;
        document.getElementById('orderDetails').innerHTML = details;
        const orderDetailsModal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
        orderDetailsModal.show();
    }
}

// Function to change the status of an order
function changeOrderStatus(orderId) {
    const orders = getOrders();
    const order = orders.find((o) => o.id === orderId);
    if (order) {
        const newStatus = prompt('Enter new status (Processing, Shipped, Delivered, Cancelled):', order.status);
        if (newStatus) {
            order.status = newStatus;
            saveOrders(orders);
            displayOrders();
            alert(`Order status updated to ${newStatus}`);
        }
    }
}

// Function to cancel an order
function cancelOrder(orderId) {
    const orders = getOrders();
    const orderIndex = orders.findIndex((o) => o.id === orderId);
    if (orderIndex !== -1) {
        if (confirm('Are you sure you want to cancel this order?')) {
            orders.splice(orderIndex, 1);
            saveOrders(orders);
            displayOrders();
            alert('Order cancelled successfully.');
        }
    }
}

// Display orders on page load
displayOrders();
