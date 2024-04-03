<?php
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PanierController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/produits', function () {
    return view('produit');
});*/

//declarer une route qui communique ave un controller TestController
Route::get('/test',[TestController::class,'index'])->name("test");

Route::get("/accueil/{x}/page/{y?}",[SiteController::class,'accueil'])->name("accueil");
Route::get("/contact",[SiteController::class,'contact'])->name("contact");

Route::get('/{date}/{num}', [OrderController::class, 'show'])
->name('order.show')
->where(["date"=>"[0-9]{2}-[0-9]{2}-[0-9]{4}","num"=>"[0-9]{1,4}"]);

Route::get("/",[WebsiteController::class,'accueil'])->name('website.accueil');
Route::get("/presentation",[WebsiteController::class,'presentation'])->name('website.presentation');
Route::get("/produits",[WebsiteController::class,'produits'])->name('website.produits');

Route::get("/contact",[WebsiteController::class,'contact'])->name('website.contact');
Route::post("/contact/save",[WebsiteController::class,'save'])->name("website.save");

Route::resource('categories',CategoriesController::class);
Route::resource('products',ProductsController::class);

/*
Route::post("panier/addtocart",[PanierController::class,"addToCart"])->name("panier.addtocart");
Route::get("panier",[PanierController::class,"panier"])->panier("panier.panier");*/
