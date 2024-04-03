<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($d,$n){
        return view("show",compact("d","n"));
    }
}
