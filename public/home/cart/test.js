// Cart Array to hold items
let cart = [];

// Select all 'Add to Cart' buttons
const addToCartButtons = document.querySelectorAll('.add-to-cart');

// Event Listeners for Add-to-Cart Buttons
addToCartButtons.forEach(button => {
    button.addEventListener('click', () => {
        const product = button.parentElement;
        const productId = product.getAttribute('data-id');
        const productName = product.getAttribute('data-name');
        const productPrice = parseFloat(product.getAttribute('data-price'));

        addToCart(productId, productName, productPrice);
    });
});

// Function to Add Product to Cart
function addToCart(id, name, price) {
    // Check if product already exists in the cart
    const existingItem = cart.find(item => item.id === id);

    if (existingItem) {
        existingItem.quantity += 1; // Increase quantity
    } else {
        cart.push({ id, name, price, quantity: 1 });
    }

    updateCartDisplay();
}

// Function to Update Cart Display
function updateCartDisplay() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalContainer = document.getElementById('cart-total');

    // Clear Cart Display
    cartItemsContainer.innerHTML = '';

    let total = 0;

    // Display Cart Items
    cart.forEach(item => {
        const listItem = document.createElement('li');
        listItem.textContent = `${item.name} (x${item.quantity}) - $${(item.price * item.quantity).toFixed(2)}`;

        // Add a Remove Button
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.style.marginLeft = '10px';
        removeButton.addEventListener('click', () => removeFromCart(item.id));

        listItem.appendChild(removeButton);
        cartItemsContainer.appendChild(listItem);

        // Update Total
        total += item.price * item.quantity;
    });

    // Display Total
    cartTotalContainer.textContent = total.toFixed(2);
}

// Function to Remove Item from Cart
function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    updateCartDisplay();
}
