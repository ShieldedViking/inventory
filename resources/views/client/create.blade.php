@extends('layouts.plantilla')

@section('contenido2')
<li><a href="{{url('/')}}">Home</a></li>
<li><a href="{{url('facturation')}}">Facturation</a></li>
<li><a href="{{url('reports')}}">Reports</a></li>
@if(auth()->user() != null)
    <li><a href="{{url('supply')}}">Supply</a></li>
@endif
<li><a href="{{url('about')}}">About</a></li>
<li class="active"><a href="{{url('client/create')}}"><span>Create client</span></a></li>
    {{--<li class="btn-cta"><a href="index"><span>Login</span></a></li>--}}
    <!-- <li class="btn-cta"><a href="#"><span>Sign Up</span></a></li> -->

    @if(auth()->user() != null)
        @if(auth()->user()->type == '1')
            <li><a href={{url('admin')}}>Admin</a></li>
        @endif
	@endif
@stop

@section('contenido3')

    @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
    @else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
    @endguest

@stop

@section('contenido1')

    <div style="text-align: center  ;">
    <p style="text-align: center; font-size: 30px;">Register</p>
    <form method="post" action="{{route('client.store')}}">
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
        <label for="direccion">
            direccion
            <input name="direccion" class="from control" type="direccion" value="{{old('direccion')}}">
            {{$errors->first('direccion')}}
        </label>
        <br>
        <label for="telefono">
            telefono
            <input name="telefono" class="from control" type="telefono" value="{{old('telefono')}}">
            {{$errors->first('telefono')}}
        </label>
        <br>
        <input value="Enviar"class="from-control" type="submit">
    </form>
    </div>
@stop