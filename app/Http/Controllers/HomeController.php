<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.userpage');
    }

    public function redirect()
    {
        $user = Auth::user();

        if ($user->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.cart');
    }

    public function about()
    {
        return view('observateur.about');
    }

    public function contact()
    {
        return view('observateur.contact');
    }

    public function testimonial()
    {
        $clients_fideles = User::withCount('orders')
            ->orderByDesc('orders_count')
            ->take(3)
            ->get();

        return view('observateur.testimonial', compact('clients_fideles'));
    }

    public function blog()
    {
        return view('observateur.blog_list');
    }

    public function products()
    {
        $products = Product::all();
        return view('observateur.products', compact('products'));
    }

    public function add_cart($id)
    {
        if (Auth::check()) {
            return redirect('/user/cart');
        } else {
            return redirect('/login');
        }
    }

    public function userProfile()
    {
        return view('user.profile');
    }

    public function adminProfile()
    {
        return view('admin.profile');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

   public function updateProfile(Request $request)
{
/** @var \App\Models\User $user */
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed',
        'photo' => 'nullable|image|max:2048',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    if ($request->hasFile('photo')) {
        // Supprimer l'ancienne
        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }

        $photoPath = $request->file('photo')->store('profile_photos', 'public');
        $user->photo = $photoPath;
    }

    $user->save();

    return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
}

}
