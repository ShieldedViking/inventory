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

/*
Route::get('/', ['as' => 'home', function () {

    return view('home');
}]);

Route::get('saludo/', ['as' => 'saludo', function () {

    return view('/old/saludo');
}]);

Route::get('about/', ['as' => 'about', function () {

    return view('about');
}]);

Route::get('facturation/', ['as' => 'facturation', function () {

    return view('facturation');
}]);

Route::get('index/', ['as' => 'index', function () {

    return view('index');
}]);

Route::get('reports/', ['as' => 'reports', function () {

    return view('reports');
}]);

Route::get('supply/', ['as' => 'supply', function () {

    return view('supply');
}]);
*/

Route::get('/contacto/{id?}', ['as' => 'contacto', function($id = "wea") {
    
    $marcas = ["Honda", "Kwasaky", "Aprilla", "Suzuki"];
    $html = "<h2>contenido HTML</h2>";
    $script = "<script>alert('Problema de seguridad')</script>";

    return view('contacto', compact('id','html','script','marcas'));
}])->where('id', "[0-9]+");

Route::post('/old/saludo', 'crearContactoController@mensajes');

Route::get('/old/start', 'indexController@index')->name('start');

Route::get('/old/home', 'indexController@index')->name('home');

Auth::routes();

Route::get('/', 'homeController@index')->name('home');
Route::get('about/', 'aboutController@route')->name('about');
Route::get('index/', 'indexcontroller@index')->name('index');
/*Route::get('login/', 'crearContactoController@route')->name('login');*/
Route::post('login/', 'LoginController@index');
Route::get('login/user', ['as'=>'login', 'uses'=>'loginController@index'])->name('login');
Route::get('admin/', ['as'=>'admin', 'uses'=>'adminController@route'])->name('admin');
Route::get('feedback/', ['as'=>'feedback', 'uses'=>'feedbackController@route'])->name('feedback');
/*Route::get('register/', 'crearContactoController@route')->name('register');*/
//Route::post('register/', 'crearContactoController@mensajes');
/*Otra forma de usar controladores*/
/*mensajes*/
Route::get('messages/create', ['as'=>'messages.create', 'uses'=>'MessagesController@create']);
Route::post('messages',['as'=>'messages.store','uses'=>'MessagesController@store']);
Route::get('messages',['as' => 'messages.index','uses'=>'MessagesController@index']);
Route::get('messages/{id}',['as'=>'messages.show','uses'=>'MessagesController@show']);
Route::get('messages/{id}/edit',['as'=>'messages.edit','uses'=>'MessagesController@edit']);
Route::put('messages/{id}', ['as' => 'messages.update', 'uses'=>'MessagesController@update']);
Route::delete('messages/{id}', ['as' => 'messages.destroy', 'uses'=>'MessagesController@destroy']);

/*usuarios*/
Route::get('user/create', ['as'=>'user.create', 'uses'=>'UsersController@create']);
Route::post('user',['as' => 'user.store','uses'=>'UsersController@store']);
Route::get('user',['as' => 'user.index','uses'=>'UsersController@index']);
Route::get('user/{id}',['as'=>'user.show','uses'=>'UsersController@show']);
Route::get('user/{id}/edit',['as'=>'user.edit','uses'=>'UsersController@edit']);
Route::put('user/{id}', ['as' => 'user.update', 'uses'=>'UsersController@update']);
Route::delete('user/{id}', ['as' => 'user.destroy', 'uses'=>'UsersController@destroy']);
//Route::post('user/', ['as' => 'user.mensaje', 'uses' => 'UsersController@mensaje']);
Route::post('users/login/wea',['as'=>'user.login1','uses'=>'UsersController@login']);
Route::get('users/login/',['as'=>'user.login','uses'=>'UsersController@routeLogin']);

/*farmacias*/
Route::get('pharmacy/create', ['as'=>'pharmacy.create', 'uses'=>'PharmacyController@create']);
Route::post('pharmacies',['as' => 'pharmacy.store','uses'=>'PharmacyController@store']);
Route::get('pharmacy',['as' => 'pharmacy.index','uses'=>'PharmacyController@index']);
Route::get('pharmacy/{id}',['as'=>'pharmacy.show','uses'=>'PharmacyController@show']);
Route::get('pharmacy/{id}/edit',['as'=>'pharmacy.edit','uses'=>'PharmacyController@edit']);
Route::put('pharmacy/{id}', ['as' => 'pharmacy.update', 'uses'=>'PharmacyController@update']);
Route::delete('pharmacy/{id}', ['as' => 'pharmacy.destroy', 'uses'=>'PharmacyController@destroy']);
Route::post('pharmacy/', ['as' => 'pharmacy.mensaje', 'uses' => 'PharmacyController@mensaje']);
Route::post('pharmacy/login/wea',['as'=>'pharmacy.login1','uses'=>'PharmacyController@login']);
Route::get('pharmacy/login/',['as'=>'pharmacy.login','uses'=>'PharmacyController@routeLogin']);

/*clientes*/
Route::get('client/create', ['as'=>'client.create', 'uses'=>'ClientController@create']);
Route::post('clients',['as' => 'client.store','uses'=>'ClientController@store']);
Route::get('client',['as' => 'client.index','uses'=>'ClientController@index']);
Route::get('client/{id}',['as'=>'client.show','uses'=>'ClientController@show']);
Route::get('client/{id}/edit',['as'=>'client.edit','uses'=>'ClientController@edit']);
Route::put('client/{id}', ['as' => 'client.update', 'uses'=>'ClientController@update']);
Route::delete('client/{id}', ['as' => 'client.destroy', 'uses'=>'ClientController@destroy']);
Route::post('client/', ['as' => 'client.mensaje', 'uses' => 'ClientController@mensaje']);
Route::post('client/login/wea',['as'=>'client.login1','uses'=>'ClientController@login']);
Route::get('client/login/',['as'=>'client.login','uses'=>'ClientController@routeLogin']);

/*facturacion*/
Route::get('facturation/', ['as'=>'facturation.index', 'uses'=>'facturationController@index']);
Route::get('facturation/create', ['as'=>'facturation.create', 'uses'=>'facturationController@create']);
Route::post('facturation',['as' => 'facturation.store','uses'=>'facturationController@store']);
Route::get('facturation/{id}',['as'=>'facturation.show','uses'=>'facturationController@show']);
Route::get('facturation/{id}/edit',['as'=>'facturation.edit','uses'=>'facturationController@edit']);
Route::put('facturation/{id}', ['as' => 'facturation.update', 'uses'=>'facturationController@update']);
Route::delete('facturation/{id}', ['as' => 'facturation.destroy', 'uses'=>'facturationController@destroy']);
/*Route::post('facturation/', ['as' => 'facturation.mensaje', 'uses' => 'facturationController@mensaje']);*/
Route::post('facturation/login/wea',['as'=>'facturation.login1','uses'=>'facturationController@login']);
Route::get('facturation/login/',['as'=>'facturation.login','uses'=>'facturationController@routeLogin']);

/*suplir*/
Route::get('supply',['as' => 'supply.index','uses'=>'supplyController@index']);
Route::get('supply/create', ['as'=>'supply.create', 'uses'=>'supplyController@create']);
Route::post('sypply',['as' => 'supply.store','uses'=>'supplyController@store']);
Route::get('supply/{id}',['as'=>'supply.show','uses'=>'supplyController@show']);
Route::get('supply/{id}/edit',['as'=>'supply.edit','uses'=>'supplyController@edit']);
Route::put('supply/{id}', ['as' => 'supply.update', 'uses'=>'supplyController@update']);
Route::delete('supply/{id}', ['as' => 'supply.destroy', 'uses'=>'supplyController@destroy']);
Route::post('supply/', ['as' => 'supply.mensaje', 'uses' => 'supplyController@mensaje']);
Route::post('supply/login/wea',['as'=>'supply.login1','uses'=>'supplyController@login']);
Route::get('supply/login/',['as'=>'supply.login','uses'=>'supplyController@routeLogin']);

/*facturacion*/
Route::get('reports/', ['as'=>'reports.index', 'uses'=>'reportsController@index']);
Route::get('reports/create', ['as'=>'reports.create', 'uses'=>'reportsController@create']);
Route::post('reports',['as' => 'reports.store','uses'=>'reportsController@store']);
Route::get('reports/{id}',['as'=>'reports.show','uses'=>'reportsController@show']);
Route::get('reports/{id}/edit',['as'=>'reports.edit','uses'=>'reportsController@edit']);
Route::put('reports/{id}', ['as' => 'reports.update', 'uses'=>'reportsController@update']);
Route::delete('reports/{id}', ['as' => 'reports.destroy', 'uses'=>'reportsController@destroy']);
/*Route::post('facturation/', ['as' => 'facturation.mensaje', 'uses' => 'facturationController@mensaje']);*/
Route::post('reports/login/wea',['as'=>'reports.login1','uses'=>'reportsController@login']);
Route::get('reports/login/',['as'=>'reports.login','uses'=>'reportsController@routeLogin']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
