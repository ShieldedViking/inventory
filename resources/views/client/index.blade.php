@extends('layouts.plantilla')

@section('contenido2')
<li><a href="{{url('/')}}">Home</a></li>
<li><a href="{{url('facturation')}}">Facturation</a></li>
<li><a href="{{url('reports')}}">Reports</a></li>
@if(auth()->user() != null)
    <li><a href="{{url('supply')}}">Supply</a></li>
@endif
<li><a href="{{url('about')}}">About</a></li>
<li><a href="{{url('client/create')}}"><span>Create client</span></a></li>
    {{--<li class="btn-cta"><a href="index"><span>Login</span></a></li>--}}
    <!-- <li class="btn-cta"><a href="#"><span>Sign Up</span></a></li> -->

    @if(auth()->user() != null)
        @if(auth()->user()->type == '1')
            <li class="active"><a href={{url('admin')}}>Admin</a></li>
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

<h1>ALL THE USERS</h1>

<table width="100%" border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Identificacion</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)

        <tr>
            <td><a href="{{route('client.show',$message->id)}}">{{$message->name}}</a></td>
            <td>{{$message->identification}}</td>
            <td>{{$message->phone}}</td>
            <td>{{$message->address}}</td>
            <td><a href="{{route('client.edit',$message->id)}}">EDITAR</a>
            <form style="display:inline" method="post" action="{{route('client.destroy',$message->id)}}">
            {!!csrf_field()!!}
            {!!method_field('DELETE')!!}
            <button type="submit">ELIMINAR</button>
            </form>
            
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

<div style="font-size:50px; text-align:center;">
    <a href="{{url('client/create')}}">CREAR</a>
</div>

@stop