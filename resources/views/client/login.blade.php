@extends('layouts.plantilla')

@section('contenido2')
    <li><a href="{{url('/')}}">Home</a></li>
	<li><a href="{{url('facturation')}}">Facturation</a></li>
	<li><a href="{{url('reports')}}">Reports</a></li>
    @if(auth()->user() != null)
        <li><a href="{{url('supply')}}">Supply</a></li>
    @endif
	<li><a href="{{url('about')}}">About</a></li>
	<li class="active"><a href="{{url('index')}}"><span>Login</span></a></li>
	<!-- <li class="btn-cta"><a href="#"><span>Sign Up</span></a></li> -->
@stop

@section('contenido1')

    <title>Login</title>
    <div style="text-align: center  ;">
    <p style="text-align: center; font-size: 30px;">Register user</p>
    <form method="get" action="{{route('user.login1')}}">
        <label for="nombre">
            nombre
            <input name="nombre" class="from control" type="nombre" value="{{old('nombre')}}">
            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
        </label>
        <br>
        <label for="identificacion">
            identificacion
            <input name="identificacion" class="from control" type="identificacion" value="{{old('identificacion')}}">
            {{$errors->first('identificacion')}}
        </label>
        <br>
        <label for="contrasenia">
            contraseña
            <input name="contrasenia" class="from control" type="contrasenia" value="{{old('contrasenia')}}">
            {{$errors->first('contrasenia')}}
        </label>
        <br>
        <input value="Enviar"class="from-control" type="submit">
    </form>
    </div>
@stop