<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function accueil(){
        return view("website.accueil");
    }

    public function presentation(){
        return view("website.presentation");
    }

    public function produits(){
        dd(session->get("panier"));
        $products=Product::all();
        return view("website.produits", compact("products"));
    }

    public function contact(){
        return view("website.contact");
    }

    //si votre methode reçoit des parametres à partir d'un formulaire
    //Vous devez passer un parametre de la fonction un objet de type Request
    public function save(Request $request){

        //dd($request); //dd() pour afficher le contenu des variables

//passer tous les parametres reçu à partir du formulaire vers la vue

//comment faire passer un ou plusieurs parametres vers la vue ?
//avec la methode conpact("nomvar1","nomvar2")
        return view("website.save",compact("request"));
    }
}
