<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Response;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Merci pour votre abonnement !');
    }
    public function index()
    {
        $subscribers = Subscription::latest()->get();
        return view('admin.subscribers', compact('subscribers'));
    }
    public function destroy($id)
    {
        $subscriber = Subscription::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('admin.subscribers')->with('success', 'Abonné supprimé avec succès.');
    }


    public function export()
    {
        $subscribers = Subscription::all();

        $csv = "ID,Email,Date d'inscription\n";

        foreach ($subscribers as $s) {
            $csv .= "{$s->id},{$s->email},{$s->created_at->format('d/m/Y H:i')}\n";
        }

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="subscribers.csv"',
        ]);
    }
}
