<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests\ValidarSupply;
use Auth;

class supplyController extends Controller
{
    public function index()
    {   
        return view('supply');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = DB::table('medicament')->get();
        $message1 = DB::table('pharmacy')->get();
        return view('supply.create', compact('message1','message'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarSupply $request)
    {
        /*las comillas dobles son los nombres de las columnas*/

        $request->rules();
        $user=Auth::user()->id;
        DB::Table('recibed')->insert([
            "medicament" => $request->input('medicamento'),
            "pharmacy" => $request->input('farmacia'),
            "date" => Carbon::now(),
            "expire" => $request->input('expiracion'),
            "user" => $request->input('usuario'),
            "priceSell" => $request->input('venta'),
            "priceBought" => $request->input('compra'),
            "quantity" => $request->input('cantidad'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $s = DB::table('stock')->where('medicament',$request->input('medicamento'))->get();
        $a = '';
        foreach($s as $q)
        {
            $a = $q->quantity;
            $int = (int)$a;
            $w = $int+$request->input('cantidad');

            DB::table('stock')->where('medicament',$request->input('medicamento'))->update([
                "pharmacy" => $request->input('farmacia'),
                "quantity" => $w,
                "updated_at" => Carbon::now()
            ]);
        }

        return redirect()->route('supply.index');
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
