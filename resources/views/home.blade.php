
@extends('layouts.plantilla')

@section('contenido2')
<li class="active"><a href="{{url('/')}}">Home</a></li>
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
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
               <li style="background-image: url(images/1.jpg);">
                   <div class="overlay-gradient"></div>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text slider-text-bg">
                               <div class="slider-text-inner">
                                   <h1>Inventory Manager</h1>
                                    <h2>Welcome to your inventory managment tool, shall we get started?</h2>
                                    <p class="ct"><a href="#">Login <i class="icon-arrow-right"></i></a></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </li>
               <li style="background-image: url(images/2.jpg);">
                   <div class="overlay-gradient"></div>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text slider-text-bg">
                               <div class="slider-text-inner">
                                   <h1>Easy to join and easy to use</h1>
                                    <h2>Totally free and constant support</h2>
                                    <p class="ct"><a href="#">Learn More <i class="icon-arrow-right"></i></a></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </li>
                     
              </ul>
          </div>
    </aside>

    <div id="fh5co-content">
        <div class="video fh5co-video" style="background-image: url(images/3.png);">
           
        </div>
        <div class="choose animate-box">
            <div class="fh5co-heading">
                <h2>Why Choose Us?</h2>
                <p>Although we have some fearace competitors, we take pride on being the number one platform for online inventory managment</p>
            </div>
            <ul class="list-nav">
                <li><i class="icon-check2"></i>Security. All the information flowing through our webpage is incrypted in both ends, asuring data confidentiality.</li>
                <li><i class="icon-check2"></i>Accesibility. The only requirements for the usage of this platform after the registration is an internet connection.</li>
                <li><i class="icon-check2"></i>Recognition. Shielded code is a world class development company highly regarded by it's quality.</li>
            </ul>
        </div>
    </div>

    <div id="fh5co-mission">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center animate-box">
                    <h2>Mission</h2>
                    <blockquote>
                        <p>Provide with an easy to use inventory manager to pharmacies.</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    
    </div>
@stop