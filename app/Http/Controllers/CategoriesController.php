<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories=Category::all();
        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //Securité: conrole sur les champs
      $request->validate([
        "name"=>"required|max:100|unique:categories"
      ]);
      //insertion dans la base de donnees
      category::create($request->all());
      //whith envoi des variables sous formes de session flash
      // redirection vers la page avce l'envi d'une message de success
       return redirect()->route('categories.index')->with("message","une nouvelle categories est ajouter avec succés!");

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }


     /** Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //validation
        $request->validate([
            'name'=> 'required',
        ]);
        //mise à jour
        $categorycategories->update(¤request->all());
        //redirection
        return redirect()->route('categories.index')->with("message","une nouvelle categories est ajouter avec succés!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redicrect()->route("categories.index")->with("message","uen categorie modifier avec succés!");
    }
}
}
