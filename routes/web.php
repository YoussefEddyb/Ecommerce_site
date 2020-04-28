<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/1', function () {
    return view('welcome');
});

/////////////////////////////////// Routes pour Site :

Route::get('/', 'SiteController@index')->name('site.index');

//login
Route::prefix('client')->group(function() {

    Route::get('/inscription', 'SiteController@inscription')->name('site.inscription');
    Route::get('/panier', 'ClientController@panier')->name('site.panier');
    Route::post('/search', 'SiteController@search')->name('site.search');
    Route::get('/filtre/{id}', 'SiteController@filtre')->name('site.filtre');
    Route::post('/addClient', 'ClientController@store')->name('client.store');
    Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('site.connexion');
    Route::post('/login', 'Auth\ClientLoginController@login')->name('client.auth');
    Route::get('/compte', 'ClientController@profile')->name('client.profile');
    Route::get('/deconnexion', 'Auth\ClientLoginController@deconnexion')->name('client.deconnexion');
    Route::post('/update_client', 'ClientController@update')->name('client.update');
    Route::post('/AddCart', 'ClientController@addToCart')->name('addToCart');
  });


//////////////////////////////////

///////////////////////////////// Routes pour back:
Route::middleware('auth')->group(function () {


      Route::get('/admin', 'AdminController@index')->name('backend.index');

      //config
      Route::get('/slider','AdminController@slider')->name('admin.slider');
      Route::get('/config','AdminController@config')->name('admin.contact');
      Route::post('/addslider', 'AdminController@store')->name('admin.store');
      Route::delete('/sliders/{id}', 'AdminController@destroy')->name('admin.destroy');
      Route::post('/update_param', 'AdminController@update')->name('admin.update');

      //charts
      Route::get('/chart', 'ChartController@index')->name('chart.index');

      ////imports
      Route::get('/importP', 'ImportController@index')->name('import.index');
      Route::get('/importC', 'ImportController@indexC')->name('import.indexC');
      Route::post('import-excel-C', 'ImportController@import')->name('importC');
      Route::post('import-excel-P', 'ImportController@importP')->name('importP');
      Route::get('export-excel-C', 'ImportController@export')->name('exportC');
      Route::get('export-excel-P', 'ImportController@exportP')->name('exportP');

      ////catégories
      Route::get('/categories', 'CategorieController@index')->name('categorie.index');
      Route::post('/addCategorie', 'CategorieController@store')->name('categorie.store');
      Route::delete('/categorie/{id}', 'CategorieController@destroy')->name('categorie.destroy')->middleware('admin');
      Route::post('/updateCategorie', 'CategorieController@update')->name('categorie.update');

            ////fournisseurs
      Route::get('/fournisseurs', 'FournisseurController@index')->name('fournisseur.index');
      Route::post('/addFourn', 'FournisseurController@store')->name('fournisseur.store');
      Route::delete('/fournisseur/{id}', 'FournisseurController@destroy')->name('fournisseur.destroy')->middleware('admin');

            ////messagers
      Route::get('/messagers', 'MessagerController@index')->name('messager.index');
      Route::post('/addMessager', 'MessagerController@store')->name('messager.store');
      Route::delete('/messager/{id}', 'MessagerController@destroy')->name('messager.destroy')->middleware('admin');
      Route::post('/updateMessager', 'MessagerController@update')->name('messager.update');

            ////produits
      Route::get('/produits', 'ProduitController@index')->name('produit.index');
      Route::post('/addProduit', 'ProduitController@store')->name('produit.store');
      Route::delete('/produit/{id}', 'ProduitController@destroy')->name('produit.destroy')->middleware('admin');

            ////employes
      Route::get('/employes', 'UserController@index')->name('user.index');
      Route::post('/addEmploye', 'UserController@store')->name('user.store')->middleware('admin');
      Route::delete('/employe/{id}', 'UserController@destroy')->name('user.destroy')->middleware('admin');
      Route::get('/employe/{id}', 'UserController@edit')->name('employe.edit');

            ////commandes
      Route::get('/commandes', 'CommandeController@index')->name('commande.index');
      Route::post('/addCommande', 'CommandeController@store')->name('commande.store');
      Route::delete('/commande/{id}', 'CommandeController@destroy')->name('commande.destroy')->middleware('admin');
    //   Route::get('/detailcommande/{idcom}', 'CommandeController@showDetail')->name('commande.detailcommande');
    //   Route::post('/detailcommande/{idcom}', 'CommandeController@showDetail')->name('commande.detailcommande');
      Route::get('/detailcommande/{idcom}', 'CommandeController@showDetail_d')->name('commande.detail');
      Route::post('/detailcommande/{idcom}', 'CommandeController@showDetail')->name('commande.detailcommande');


            ////detail commande:
      Route::get('details', 'DetailCommandeController@index');
      //Route::post('addDetail', 'DetailCommandeController@store');
      Route::post('addDetail', 'DetailCommandeController@store')->name('detail.store');
      Route::post('/deleteD/{id}', 'DetailCommandeController@destroy');


      Route::post('/change_client', 'ClientController@changeClient');
      Route::post('/change_produit', 'ProduitController@changeProduit');

});
////////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
