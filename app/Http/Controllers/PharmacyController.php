<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoRegistro;
/* usar esto*/
use DB;
use Carbon\Carbon;
use App\Http\Requests\ValidarFarmacia;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('pharmacy')->get();

        return view('pharmacy.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $texto="Seccion de contactos";
        return view('pharmacy.create', compact('texto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarFarmacia $request)
    {
        /*las comillas dobles son los nombres de las columnas*/
        $request->rules();
        
        DB::Table('pharmacy')->insert([
            "name" => $request->input('nombre'),
            "address" => $request->input('direccion'),
            "users" => 0,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('pharmacy.index');
    }

    public function login(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        $user = DB::Table('pharmacy')->where('identification',$request->identificacion)->first();
        
        if($user->password == $request->contrasenia)
        {
             $this->middleware('guest')->except('logout');
        }

        return redirect()->route('pharmacy.index');
    }

    public function routeLogin(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        return view('pharmacy.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = DB::table('pharmacy')->where('id',$id)->first();
        return view('pharmacy.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = DB::table('pharmacy')->where('id', $id)->first();
        return view('pharmacy.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarFarmacia $request, $id)
    {

        $request->rules();
        
        DB::table('pharmacy')->where('id',$id)->update([
            "name" => $request->input('nombre'),
            "address" => $request->input('direccion'),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('pharmacy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('pharmacy')->where('id',$id)->delete();

        return redirect()->route('pharmacy.index');
    }

    public function mensaje(NuevoRegistro $request)
    {
        $request->all();


      /*  if($request->has('null'))
        {
            return $request->all();
        }
        return 'La descripcion esta en blanco';
        */
    }
}
