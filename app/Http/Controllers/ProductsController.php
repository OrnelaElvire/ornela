<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories=Product::all();
        return view("admin.Products.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view("admin.^product.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      $request->validate([
        "name"=>"required|max:100|unique:product",
        "description"=>"required",
        "price"=>"numeric"|"required",
        "photo1"=>"image|required|mimes:jpeg,png,jpg,gif|max:2048",
        "photo2"=>"image|required|mimes:jpeg,png,jpg,gif|max:2048",
        "category_id=<required|numeric"
      ]);

      $imputs=$resquest->all();
      //traiter les photo
      if($photo1=request->file("photo1")){
        $nexfile1=time()."."$photo1->getClientOriginalExtension();
        $photo1->move('images/products/',$newfile1);
        $imputs['photo1']=$newfile1;
      }



      if($photo2=request->file("photo2")){
        $nexfile2=time().time()"."$photo2->getClientOriginalExtension();
        $photo2->move('images/products/',$newfile2);
        $imputs['photo2']=$newfile2;
      }



      product::create($imputs);
       return redirect()->route("products.index")->with("message","un nouveau produit est ajouter avec succés!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view("admin.products.edit",compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name"=>"required|max:100",
            "description"=>"required",
            "price"=>"numeric",
            "photo1"=>"image|required|mimes:jpeg,png,jpg,gif| max:2048",
            "photo2"=>"image|required|mimes:jpeg,png,jpg,gif|max:2048",
            "category_id=<required"
          ]);

          $imputs=$resquest->all();
      //traiter les photo
      if($photo1=request->file("photo1")){
        $nexfile1=time()."."$photo1->getClientOriginalExtension();

        //ecraser l'ancienne photo
        if(field_exists("images/products/".$product->photo1)){
        unlink("images/products/".$product->photo1);
      }
        $photo1->move('images/products/',$newfile1);
        $imputs['photo1']=$newfile1;
      }



      if($photo2=request->file("photo2")){
        $nexfile2=time().time()"."$photo2->getClientOriginalExtension();
        //ecraser l'ancienne photo
        if(field_exists("images/products/".$product->photo2)){
        unlink("images/products/".$product->photo2);
        }
        $photo2->move('images/products/',$newfile2);
        $imputs['photo2']=$newfile2;
      }



          product->update(imputs);
           return redirect()->route('products.index')->with("message","le produit est modifier avec succés!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(field_exists("images/products/".$product->photo1)){
            unlink("images/products/".$product->photo1);
            }
        if(field_exists("images/products/".$product->photo2)){
                unlink("images/products/".$product->photo2);
                }
        $category->delete();
        return redicrect()->route("products.index")->with("message","un produit est supprimé")
}
}
