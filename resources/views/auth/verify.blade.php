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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
