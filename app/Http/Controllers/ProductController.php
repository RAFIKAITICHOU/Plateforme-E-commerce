<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Affichage admin : liste complète + formulaire
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.productManagement', compact('products'));
    }

    /**
     * Stocker un nouveau produit
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'required|image|max:2048',
        ]);

        // ✅ Déplacement manuel dans public/images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $imageName, // ✅ uniquement le nom
        ]);

        return redirect()->back()->with('success', 'Produit ajouté avec succès !');
    }

    /**
     * Supprimer un produit
     */
    public function destroy(Product $product)
    {
        // ✅ Supprimer l'image dans public/images
        if ($product->image) {
            $imagePath = public_path('images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();
        return redirect()->back()->with('success', 'Produit supprimé !');
    }

    /**
     * Formulaire de modification
     */
    public function edit(Product $product)
    {
        return view('admin.edit_product', compact('product'));
    }

    /**
     * Mise à jour d’un produit
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);

        // ✅ Si nouvelle image : supprimer l’ancienne + enregistrer la nouvelle
        if ($request->hasFile('image')) {
            if ($product->image) {
                $oldImagePath = public_path('images/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $data['image'] = $newImageName;
        }

        $product->update($data);

        return redirect()->route('admin.productManagement')->with('success', 'Produit modifié avec succès !');
    }

    /**
     * Affichage public des produits (observateur)
     */
    public function showProducts()
    {
        $products = Product::all();
        return view('observateur.products', compact('products'));
    }
public function showDetails($id)
{
    $product = Product::findOrFail($id);
    return view('observateur.product_details', compact('product'));
}
public function userProductDetails($id)
{
    $product = Product::findOrFail($id);
    return view('user.product_details', compact('product'));
}
public function userProducts()
{
    $products = Product::all();
    return view('user.products', compact('products'));
}

}

