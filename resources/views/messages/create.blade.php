@extends('old.plantilla')

@section('contenido2')

@stop

    <h1>salu2</h1>
@section('contenido1')
    
    <title>Saludo</title>

    <form method="post" action="{{route('messages.store')}}">
        <label for="nombre">
            nombre
            <input name="nombre" class="from control" type="nombre" value="{{old('nombre')}}">
            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
        </label>
        <label for="email">
            email
            <input name="email" class="from control" type="email" value="{{old('email')}}">
            {{$errors->first('email')}}
        </label>
        <label for="mensaje">
            mensaje
            <input name="mensaje" class="from control" type="mensaje" value="{{old('mensaje')}}">
            {{$errors->first('mensaje')}}
        </label>

        <input value="Enviar"class="from-control" type="submit">
    </form>
@stop