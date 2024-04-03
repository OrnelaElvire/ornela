<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function panier(){
        $products=session()->get("panier");
        return view("website.panier",compact("products"));
    }


    public function addToCart(Request $request){
        //recuperer les informations du produit
        $id=$request->id;
        $name=$request->name;
        $photo1=$request->photo1;
        $price=$request->price;
        $qty=$request->qty;
       // verifier si la variable existe dans la session ou pas
       //si no  on l'initialise
      if (session()->has("panier")){
          session()->put('panier',[]);
         }
          //ajouter un produit dans la session
         session()->push('panier',"id"=>$id,"name"=>$name,"price"=>$price,"qty"=>$qty,"photo1=>$photo1");
         return redirect()->back()-<with('sucess',"un nouveau produit es ajutée dans le parnier");
    }
}
