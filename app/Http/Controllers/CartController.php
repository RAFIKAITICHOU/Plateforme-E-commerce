<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Ajouter un produit au panier
     */
    public function addToCart($id)
    {
        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)
                    ->where('product_id', $id)
                    ->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    /**
     * Afficher les produits du panier
     */
    public function viewCart()
    {
        $cartItems = Cart::with('product')
                         ->where('user_id', Auth::id())
                         ->get();

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('user.cart', compact('cartItems', 'total'));
    }

    /**
     * Supprimer un produit du panier
     */
    public function removeFromCart($id)
    {
        Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->delete();

        return redirect()->back()->with('success', 'Produit retiré du panier.');
    }

    /**
     * Page de sélection de méthode de paiement
     */
    public function showPaymentPage()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('user.payment', compact('cartItems', 'total'));
    }

    /**
     * Rediriger vers la vue de formulaire selon le choix
     */
   public function redirectToPaymentForm(Request $request)
{
    $request->validate([
        'payment_method' => 'required|in:paypal,carte_bancaire,virement',
    ]);

    $method = $request->payment_method;

    session(['selected_payment_method' => $method]);

    if ($method === 'paypal') {
        return view('user.paypal');
    } elseif ($method === 'carte_bancaire') {
        return view('user.card');
    } else {
        return view('user.virement');
    }
}


    /**
     * Traiter la commande et enregistrer le paiement
     */
    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:paypal,carte_bancaire,virement',
        ]);

        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('user.cart')->with('error', 'Votre panier est vide.');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id'        => $user->id,
            'products'       => json_encode($cartItems->map(fn($item) => [
                'product_name' => $item->product->name,
                'quantity'     => $item->quantity,
                'price'        => $item->product->price,
                'total'        => $item->quantity * $item->product->price,
            ])),
            'status'         => 'en attente',
            'payment_method' => $request->payment_method,
        ]);

        Payment::create([
            'user_id'        => $user->id,
            'order_id'       => $order->id,
            'payment_method' => $request->payment_method,
            'amount'         => $total,
            'status'         => 'en attente',
        ]);

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('user.cart')->with('success', 'Commande confirmée avec succès via ' . ucfirst(str_replace('_', ' ', $request->payment_method)));
    }

    /**
     * Historique des commandes utilisateur
     */
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('user.orders', compact('orders'));
    }
public function add_cart(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $user = auth()->user();

    $quantity = $request->input('quantity', 1);

    $cart = new \App\Models\Cart();
    $cart->user_id = $user->id;
    $cart->product_id = $product->id;
    $cart->quantity = $quantity;
    // ❌ NE PAS insérer "price" car la colonne n'existe pas
    $cart->save();

    return redirect()->back()->with('message', 'Produit ajouté au panier avec succès');
}

}
