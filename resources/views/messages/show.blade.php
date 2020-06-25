@extends('old.plantilla')

@section('contenido2')

<h1>MENSAJE</h1>

<table width="100%" border="1">
    <thead>
        <tr>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{$message->nombre}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->mensaje}}</td>
        </tr>

    </tbody>
</table>

@stop