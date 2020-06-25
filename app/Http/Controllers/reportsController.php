<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests\ValidarFacturation;
use Auth;

class reportsController extends Controller
{
    public function index()
    {   
        $messages = DB::table('recibed')->get();
        $message1 = DB::table('sold')->get();
        $message2 = DB::table('stock')->get();
        foreach($messages as $message)
        $wea1 = DB::table('medicament')->where('id',$message->medicament)->get();

        foreach($messages as $message)
        $wea2 = DB::table('users')->where('id',$message->user)->get();

        foreach($messages as $message)
        $wea3 = DB::table('pharmacy')->where('id',$message->pharmacy)->get();

        foreach($message1 as $message)
        $wea4 = DB::table('medicament')->where('id',$message->medicament)->get();

        foreach($message1 as $message)
        $wea5 = DB::table('users')->where('id',$message->user)->get();

        foreach($message1 as $message)
        $wea6 = DB::table('client')->where('id',$message->client)->get();

        foreach($message1 as $message)
        $wea7 = DB::table('pharmacy')->where('id',$message->pharmacy)->get();

        foreach($message2 as $message)
        $wea8 = DB::table('medicament')->where('id',$message->medicament)->get();

        foreach($message2 as $message)
        $wea9 = DB::table('pharmacy')->where('id',$message->pharmacy)->get();

        return view('reports',compact('message1','messages','message2','wea1','wea2','wea3','wea4','wea5','wea6','wea7','wea8','wea9'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages = DB::table('recibed')->get();
        $message1 = DB::table('sold')->get();
        $message2 = DB::table('stock')->get();
        return view('facturation.create', compact('message1','messages','message2'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarFacturation $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        $request->rules();
        $user=Auth::user()->id;
        DB::Table('sold')->insert([
            "medicament" => $request->input('medicamento'),
            "pharmacy" => $request->input('farmacia'),
            "date" => Carbon::now(),
            "user" => $request->input('usuario'),
            "client" => $request->input('cliente'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('facturation.index');
    }

    public function login(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        $user = DB::Table('supply')->where('identification',$request->identificacion)->first();
        
        if($user->password == $request->contrasenia)
        {
             $this->middleware('guest')->except('logout');
        }

        return redirect()->route('supply.index');
    }

    public function routeLogin(Request $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        return view('supply.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = DB::table('supply')->where('id',$id)->first();
        return view('supply.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = DB::table('supply')->where('id', $id)->first();
        return view('supply.edit', compact('message'));
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

        DB::table('supply')->where('id',$id)->update([
            "name" => $request->input('nombre'),
            "identification" => $request->input('identificacion'),
            "address" => $request->input('direccion'),
            "phone" => $request->input('telefono'),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('supply.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('supply')->where('id',$id)->delete();

        return redirect()->route('supply.index');
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
