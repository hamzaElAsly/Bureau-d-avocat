<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function count(){
        $countCl= Client::count();
        return(view('welcome',compact('countCl')));
    }
    public function listerClient()
    {
        $dbClient = Client::all();
        return(view('clients.clients',compact('dbClient')));
    }

    public function create()
    {
        return(view('clients.addClient'));
    }

    public function ajouterClient(Request $req)
    {
        $cl= new Client();
        $cl->prenomClient = $req->input('prenom');
        $cl->nomClient = $req->input('nom');
        $cl->tel1 = $req->input('t1');
        $cl->tel2 = $req->input('t2');
        $cl->adressClient = $req->input('adrs');
        $cl->emailClient = $req->input('mail');
        $cl->imageClient = $req->input('photo');
        $cl->save();
        return redirect()->route('clients.clients');
    }

    public function showClient(string $id){
        $client=Client::find($id);
        return view('clients.infoCl',compact('client'));
    }
    
    
    public function updateClient(string $id){
        return view('clients.updateCl',['upCl'=>Client::findOrFail($id)])
    ;}
    public function update(Request $req, string $id){
        $cl= Client::find($id);
        $cl->prenomClient = $req->input('prenom');
        $cl->nomClient = $req->input('nom');
        $cl->tel1 = $req->input('t1');
        $cl->tel2 = $req->input('t2');
        $cl->adressClient = $req->input('adrs');
        $cl->emailClient = $req->input('mail');
        $cl->save();
        return redirect()->route('clients.clients');
    }

    public function destroy(string $id)
    {
        //
    }
}
