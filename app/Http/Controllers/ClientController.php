<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function count()
    {
        $countCl = Client::count();
        return view('welcome', compact('countCl'));
    }

    public function listerClient(Request $request)
    {
        $query = Client::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nomClient', 'like', "%{$search}%")
                  ->orWhere('prenomClient', 'like', "%{$search}%")
                  ->orWhere('emailClient', 'like', "%{$search}%")
                  ->orWhere('tel1', 'like', "%{$search}%")
                  ->orWhere('tel2', 'like', "%{$search}%");
            });
        }

        $dbClient = $query->orderByDesc('idClient')->paginate(10)->withQueryString();

        return view('clients.clients', compact('dbClient'));
    }

    public function create()
    {
        return view('clients.addClient');
    }

    public function ajouterClient(StoreClientRequest $req)
    {
        Client::create([
            'prenomClient' => $req->input('prenom'),
            'nomClient' => $req->input('nom'),
            'tel1' => $req->input('t1'),
            'tel2' => $req->input('t2'),
            'adressClient' => $req->input('adrs'),
            'emailClient' => $req->input('mail'),
            'imageClient' => $req->file('photo')?->store('clients', 'public'),
            'type_client' => $req->input('type_client'),
            'identifiant' => $req->input('identifiant'),
            'notes' => $req->input('notes'),
            'statut' => $req->input('statut'),
        ]);

        return redirect()->route('clients')->with('success', 'Client ajouté avec succès.');
    }

    public function showClient(string $id)
    {
        $client = Client::with('dossiers')->findOrFail($id);
        return view('clients.infoCl', compact('client'));
    }

    public function updateClient(string $id)
    {
        return view('clients.updateCl', ['upCl' => Client::findOrFail($id)]);
    }

    public function update(UpdateClientRequest $req, string $id)
    {
        $cl = Client::findOrFail($id);
        $cl->prenomClient = $req->input('prenom');
        $cl->nomClient = $req->input('nom');
        $cl->tel1 = $req->input('t1');
        $cl->tel2 = $req->input('t2');
        $cl->adressClient = $req->input('adrs');
        $cl->emailClient = $req->input('mail');
        $cl->type_client = $req->input('type_client');
        $cl->identifiant = $req->input('identifiant');
        $cl->notes = $req->input('notes');
        $cl->statut = $req->input('statut');
        if ($req->hasFile('photo')) {
            $cl->imageClient = $req->file('photo')->store('clients', 'public');
        }
        $cl->save();

        return redirect()->route('clients')->with('success', 'Client modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $cl = Client::findOrFail($id);

        if ($cl->dossiers()->exists()) {
            return redirect()->route('infoCl', $cl->idClient)
                ->with('error', 'Ce client possède des dossiers et ne peut pas être supprimé.');
        }

        $cl->delete();

        return redirect()->route('clients')->with('success', 'Client supprimé avec succès.');
    }
}
