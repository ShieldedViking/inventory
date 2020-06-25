@extends('plantilla')

<!--importa este contenido a la platilla-->
@section('contenido2')
            <title>Home</title>
@stop
<!--importa el contenido en el espacio designado en la plantilla-->
@section('contenido')
            <h1> ola k ace</h1>
            <!--incluye el contenido de parrafo.blade.php-->
            @include('parrafo')
@stop

