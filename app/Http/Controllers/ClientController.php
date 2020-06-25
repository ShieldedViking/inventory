<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoRegistro;
/* usar esto*/
use DB;
use Carbon\Carbon;
use App\Http\Requests\ValidarCliente;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('client')->get();
        return view('client.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $texto="Seccion de contactos";
        return view('client.create', compact('texto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarCliente $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        $request->rules();
        
        DB::Table('client')->insert([
            "name" => $request->input('nombre'),
            "identification" => $request->input('identificacion'),
            "address" => $request->input('direccion'),
            "phone" => $request->input('telefono'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('client.index');
    }

    public function login(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        $user = DB::Table('client')->where('identification',$request->identificacion)->first();
        
        if($user->password == $request->contrasenia)
        {
             $this->middleware('guest')->except('logout');
        }

        return redirect()->route('client.index');
    }

    public function routeLogin(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        return view('client.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = DB::table('client')->where('id',$id)->first();
        return view('client.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = DB::table('client')->where('id', $id)->first();
        return view('client.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarCliente $request, $id)
    {
        $request->rules();

        DB::table('client')->where('id',$id)->update([
            "name" => $request->input('nombre'),
            "identification" => $request->input('identificacion'),
            "address" => $request->input('direccion'),
            "phone" => $request->input('telefono'),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('client')->where('id',$id)->delete();

        return redirect()->route('client.index');
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
