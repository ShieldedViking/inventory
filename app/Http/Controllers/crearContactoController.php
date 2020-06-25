<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoRegistro;

class crearContactoController extends Controller
{
    /*protected $request;

    public function _construct(Request $request)
    {
        $this->request = $request;
    }*/

    public function mensajes(NuevoRegistro $request)
    {
        return $request->all();

      /*  if($request->has('null'))
        {
            return $request->all();
        }
        return 'La descripcion esta en blanco';
        */
    }

    public function route()
    {
        return view('login');
    }
}
