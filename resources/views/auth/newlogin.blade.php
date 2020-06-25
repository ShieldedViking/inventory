@extends('layouts.plantilla')

@section('contenido2')
	<li><a href="/">Home</a></li>
	<li><a href="facturation">Facturation</a></li>
	<li><a href="reports">Reports</a></li>
	<li><a href="supply">Supply</a></li>
	<li><a href="about.html">About</a></li>
	<li class="active"><a href="index"><span>Login</span></a></li>
	<!-- <li class="btn-cta"><a href="#"><span>Sign Up</span></a></li> -->
@stop

@section('contenido1')

    <title>Login</title>
    <div style="text-align: center;">

    <p style="text-align: center; font-size: 30px;">Login</p>
    
    <form method="post" action="login">
        <label for="nombre">
            nombre
            <input name="nombre" class="from control" type="nombre" value="{{old('nombre')}}">
            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
        </label>
        <br>
        <label for="email">
            contraseña
            <input name="email" class="from control" type="email" value="{{old('email')}}">
            {{$errors->first('email')}}
        </label>
        <br>
        <label for="mensaje">
            farmacia
            <input name="mensaje" class="from control" type="mensaje" value="{{old('mensaje')}}">
            {{$errors->first('mensaje')}}
        </label>
        <br>
        <input value="Send"class="from-control" type="submit">
    </form>
    
    <div class="btn-cta" type="button"><a href="register">Register</a></div>
    </div>
@endsection