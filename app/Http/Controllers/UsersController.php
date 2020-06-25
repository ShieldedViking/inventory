<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\NuevoRegistro;
//use app\Http\Requests\NuevoRegistro;
use App\Http\Requests\ValidarUsuario;/* usar esto*/


use DB;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('users')->get();

        return view('user.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $texto="Seccion de contactos";
        return view('user.create', compact('texto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarLogin $request)
    {
        /*las comillas dobles son los nombres de las columnas*/
        $request->rules();

        wea();
        
            DB::Table('user')->insert([
            "name" => $request->input('nombre'),
            "identification" => $request->input('identificacion'),
            "password" => $request->input('contrasenia'),
            "pharmacy" => $request->input('farmacia'),
            "type" => $request->input('tipo'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('user.index');
    }

    public function wea()
    {
        $num = '';
        $users = DB::table('pharmacy')->where('id',$request->input('farmacia'))->get(); 
        foreach ($users as $wea1) {
            $num = $wea1->users;
            $num = $num+1;
        }
        DB::Table('pharmacy')->where('id',$request->input('farmacia'))-update([
            "users" => $num
        ]);
    }

    public function login(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        $user = DB::Table('users')->where('identification',$request->identificacion)->first();
        
        if($user->password == $request->contrasenia)
        {
             $this->middleware('guest')->except('logout');
        }

        return redirect()->route('user.index');
    }

    public function routeLogin(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        return view('user.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = DB::table('users')->where('id',$id)->first();
        return view('user.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = DB::table('users')->where('id', $id)->first();
        return view('user.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarUsuario $request, $id)
    {
        $request->rules();

        DB::table('users')->where('id',$id)->update([
            "name" => $request->input('nombre'),
            "identification" => $request->input('identificacion'),
            "password" => $request->input('contrasenia'),
            "pharmacy" => $request->input('farmacia'),
            "type" => $request->input('tipo'),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wea = DB::Table('users')->where('id',$id)->get();
        foreach ($wea as $wea1) {
            $f = $wea1->pharmacy;
        
        
        $users = DB::table('pharmacy')->where('id',$f)->get(); 
        foreach ($users as $wea1) {
            $num = $wea1->users;
            $num = $num-1;
        

        DB::table('pharmacy')->where('id',$f)->update([
            "users" => $num
        ]);
        }
        }

        DB::table('users')->where('id',$id)->delete();

        return redirect()->route('user.index');
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
