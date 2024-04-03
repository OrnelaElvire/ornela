<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function accueil($numero,$page='test'){
        //utiliser la fonction compact()
        //qui fait passer un ou pusieurs parametres vers la vue
        return view("accueil",compact("numero","page"));
        //return view("accueil")->with(["numero"=>$numero,"page"=>$page]);
    }

    public function contact(){
        return view("contact");
    }

    
}
