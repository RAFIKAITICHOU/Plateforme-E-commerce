<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catagory;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Models\Contact;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $catagories = Catagory::all();
        return view('admin.catagory', compact('catagories'));
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory();
        $data->catagory_name = $request->catagory_name;
        $data->save();

        return redirect()->back()->with('message', 'Catégorie ajoutée avec succès.');
    }

    public function delete_catagory($id)
    {
        $cat = Catagory::findOrFail($id);
        $cat->delete();

        return redirect()->back()->with('message', 'Catégorie supprimée avec succès.');
    }

    public function orders()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalRevenue = Payment::sum('amount');

        return view('admin.home', compact('totalOrders', 'totalProducts', 'totalUsers', 'totalRevenue'));
    }

    public function payments()
    {
        return view('admin.payments');
    }

    public function showPayments()
    {
        $payments = Payment::with('user')->latest()->get();
        return view('admin.payments', compact('payments'));
    }

    public function products()
    {
        return view('admin.products');
    }

    public function productManagement()
    {
        return view('admin.productManagement');
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:en attente,validée,annulée',
        ]);

        $order->status = $validated['status'];
        $order->save();

        return redirect()->back()->with('success', 'Statut de la commande mis à jour.');
    }

    public function viewContacts()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }

    //  Revenus mensuels dynamiques
    public function getSalesData()
    {
        $orders = Order::select('products', 'created_at')->get();

        $moisLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
        $revenusParMois = array_fill(1, 12, 0); // Mois 1 à 12

        foreach ($orders as $order) {
            $month = (int) date('n', strtotime($order->created_at));
            $products = json_decode($order->products, true);

            foreach ($products as $product) {
                $revenusParMois[$month] += $product['price'] * $product['quantity'];
            }
        }

        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[] = [
                'month' => $moisLabels[$i - 1],
                'revenue' => $revenusParMois[$i]
            ];
        }

        return response()->json($result);
    }

    //  Répartition des ventes par produit
    public function getSalesPieData()
    {
        $orders = Order::select('products')->get();
        $produits = [];

        foreach ($orders as $order) {
            $items = json_decode($order->products, true);
            foreach ($items as $item) {
                $nom = $item['product_name'];
                $valeur = $item['price'] * $item['quantity'];
                if (!isset($produits[$nom])) {
                    $produits[$nom] = 0;
                }
                $produits[$nom] += $valeur;
            }
        }

        $result = [];
        foreach ($produits as $nom => $total) {
            $result[] = [
                'label' => $nom,
                'value' => $total
            ];
        }

        return response()->json($result);
    }
public function getGroupedSalesData()
{
    $orders = Order::select('products', 'created_at')->get();

    $labels = []; // noms des produits
    $mois = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
    $datasets = [];

    foreach ($orders as $order) {
        $monthIndex = (int) date('n', strtotime($order->created_at)); // 1–12
        $moisLabel = $mois[$monthIndex - 1];

        $items = json_decode($order->products, true);
        foreach ($items as $item) {
            $name = $item['product_name'];
            $value = $item['quantity']; // ou prix*quantité pour revenus

            if (!isset($datasets[$name])) {
                $datasets[$name] = array_fill_keys($mois, 0);
            }

            $datasets[$name][$moisLabel] += $value;
        }
    }

    // Format pour Chart.js
    $result = [
        'labels' => $mois,
        'datasets' => [],
    ];

    foreach ($datasets as $product => $data) {
        $result['datasets'][] = [
            'label' => $product,
            'data' => array_values($data),
        ];
    }

    return response()->json($result);
}

}
