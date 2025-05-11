<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Routes publiques (visiteurs et utilisateurs non connectés)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/testimonial', [HomeController::class, 'testimonial'])->name('testimonial');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

// Produits publics (observateur)
Route::get('/products', [ProductController::class, 'showProducts'])->name('products.view');
Route::get('/product/{id}/details', [ProductController::class, 'showDetails'])->name('products.details');

// Formulaire de contact et abonnement
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

// Redirection après connexion
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/dashboard', fn () => redirect()->route('user.cart'))->name('dashboard');

/*
|--------------------------------------------------------------------------
| Routes utilisateurs connectés
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Panier
    Route::get('/user/cart', [CartController::class, 'viewCart'])->name('user.cart');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.cart');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove.cart');

    // Paiement
    Route::get('/user/payment', [CartController::class, 'showPaymentPage'])->name('user.payment');
    Route::post('/user/payment/method', [CartController::class, 'redirectToPaymentForm'])->name('user.payment.method');
    Route::post('/user/payment/confirm', [CartController::class, 'processPayment'])->name('user.payment.confirm');
    Route::post('/user/payment/process', [CartController::class, 'processPayment'])->name('user.payment.process');

    // Commandes
    Route::get('/user/orders', [CartController::class, 'myOrders'])->name('user.orders');

    // Produits connectés
    Route::get('/user/products', [ProductController::class, 'userProducts'])->name('user.products');
    Route::get('/user/products/{id}/details', [ProductController::class, 'userProductDetails'])->name('user.products.details');
});

/*
|--------------------------------------------------------------------------
| Routes admin (authentifié uniquement)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
     Route::get('/redirect', [HomeController::class, 'redirect']);


    Route::get('/adminDashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/payments', [AdminController::class, 'showPayments'])->name('admin.payments');

  Route::get('/user/profile', [HomeController::class, 'editProfile'])->name('user.profile');
Route::post('/user/profile/update', [HomeController::class, 'updateProfile'])->name('user.updateProfile');
Route::get('/admin/profile', [HomeController::class, 'adminProfile'])->name('admin.profile');

Route::get('/sales-data', [AdminController::class, 'getSalesData']);
Route::get('/sales-pie-data', [AdminController::class, 'getSalesPieData']);
Route::get('/grouped-sales-data', [AdminController::class, 'getGroupedSalesData']);


    // Gestion produits (interface)
    Route::get('/productManagement', [ProductController::class, 'index'])->name('admin.productManagement');

    // CRUD Produits
    Route::resource('products', ProductController::class)->except(['index', 'show']);

    // Mise à jour commande
    Route::put('/admin/orders/{id}/update', [AdminController::class, 'updateOrder'])->name('admin.orders.update');

    // Contactsa
    Route::get('/admin/contacts', [AdminController::class, 'viewContacts'])->name('admin.contacts');

    // Abonnés newsletter
    Route::get('/admin/subscribers', [SubscriptionController::class, 'index'])->name('admin.subscribers');
    Route::delete('/admin/subscribers/{id}', [SubscriptionController::class, 'destroy'])->name('admin.subscribers.destroy');
    Route::get('/admin/subscribers/export', [SubscriptionController::class, 'export'])->name('admin.subscribers.export');
Route::post('/add_cart/{id}', [CartController::class, 'add_cart'])->name('add.cart.post');

});

