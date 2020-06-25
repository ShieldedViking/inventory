@extends('layouts.plantilla')

@section('contenido2')
<li><a href="{{url('/')}}">Home</a></li>
<li class="active"><a href="{{url('facturation')}}">Facturation</a></li>
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

    <p style="text-align: center; font-size: 30px;">Facturation</p>
    <form method="post" action="{{route('facturation.store')}}">
            @csrf <!-- {{ csrf_field() }} -->
        

        <div class="form-group row">
            <label for="medicamento" class="col-md-4 col-form-label text-md-right" style="text-align: center;">{{ __('Medicamento') }}</label>

            <div class="col-md-6">
            
                <select class="form-control" name="medicamento" id="medicamento">
                @foreach($message as $wea)
                    <option value="{{$wea->id}}">{{$wea->name}}</option>
                @endforeach
                </select>
            </div>
                        
                @if ($errors->has('medicamento'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('medicamento') }}</strong>
                </span>
                @endif
                    
        </div>

        <div class="form-group row">
                <label for="farmacia" class="col-md-4 col-form-label text-md-right" style="text-align: center;">{{ __('Farmacia') }}</label>
    
                <div class="col-md-6">
                
                    <select class="form-control" name="farmacia" id="farmacia">
                    @foreach($message1 as $wea)
                        <option value="{{$wea->id}}">{{$wea->name}}</option>
                    @endforeach
                    </select>
                </div>
                            
                @if ($errors->has('farmacia'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('farmacia') }}</strong>
                </span>
                @endif
                        
        </div>

        <div class="form-group row">
                <label for="cliente" class="col-md-4 col-form-label text-md-right" style="text-align: center;">{{ __('Cliente') }}</label>
    
                <div class="col-md-6">
                
                    <select class="form-control" name="cliente" id="cliente">
                    @foreach($message2 as $wea)
                        <option value="{{$wea->id}}">{{$wea->name}}</option>
                    @endforeach
                    </select>
                </div>
                            
                @if ($errors->has('cliente'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cliente') }}</strong>
                </span>
                @endif
                        
        </div>

            <div style="text-align: center;">
                <input  name="usuario" type="usuario" value="{{$user=Auth::user()->id}}" readonly style="text-align: center;">  {{$user=Auth::user()->name}}
            </div>
            
            <br>
        <div style="text-align: center;">
            <input value="Enviar"class="from-control" type="submit" >
        </div>
    </form>
@stop