@extends('layouts.plantilla')

@section('contenido2')
<li><a href="{{url('/')}}">Home</a></li>
<li><a href="{{url('facturation')}}">Facturation</a></li>
<li><a href="{{url('reports')}}">Reports</a></li>
@if(auth()->user() != null)
    <li><a href="{{url('supply')}}">Supply</a></li>
@endif
<li class="active"><a href="{{url('about')}}">About</a></li>
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
		   	<li class="holder" style="background-image: url(images/code.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner desc">
		   					<h2 class="heading-section" style="font-size: 200px;">About Us</h2>
		   					<p class="fh5co-lead">Designed with <i class="icon-heart3"></i> by the fine folks at <a href="http://shieldedcode.com" target="_blank">Shielded Code</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-about">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Our Co-Leagues</h2>
                    <p>Shielded code development team memebers</p>
                </div>
            </div>
            <div class="row">
                <div class="member">
                    <div class="col-md-6 nopadding animate-box">
                        <div class="author" style="background-image: url(images/carlos.jpg);"></div>
                    </div>
                    <div class="col-md-6 nopadding animate-box">
                        <div class="desc">
                            <h3>Carlos Andres Arellano</h3>
                            <span>CEO, Founder</span>
                            <p>Being one of the primary forces of the company, creating realtions
                                with other corporate entities and pushing development proceses
                                forward, also brings coffee.
                            </p>
                            <p>
                                <ul class="fh5co-social-icons">
                                    <li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
                                    <li><a href="https://www.facebook.com/carlos.arellano.5439"><i class="icon-facebook-with-circle"></i></a></li>
                                    <li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
                                    <li><a href="#"><i class="icon-dribbble-with-circle"></i></a></li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="member">
                    <div class="col-md-6 nopadding col-md-push-6 animate-box">
                        <div class="author" style="background-image: url(images/fernando.jpg);"></div>
                    </div>
                    <div class="col-md-6 nopadding col-md-pull-6 animate-box">
                        <div class="desc">
                            <h3>Fernando Mauricio Florez</h3>
                            <span>Security and web manager</span>
                            <p>The most experiences member of the team, provides caluable
                                insight information in many processes.
                            </p>
                            <p>
                                <ul class="fh5co-social-icons">
                                    <li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
                                    <li><a href="https://www.facebook.com/fmflorezp"><i class="icon-facebook-with-circle"></i></a></li>
                                    <li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
                                    <li><a href="#"><i class="icon-dribbble-with-circle"></i></a></li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="member">
                    <div class="col-md-6 nopadding animate-box">
                        <div class="author" style="background-image: url(images/camilo.jpg);"></div>
                    </div>
                    <div class="col-md-6 nopadding animate-box">
                        <div class="desc">
                            <h3>Mario Camilo Caicedo</h3>
                            <span>Development manager</span>
                            <p>As a dedicated computer programmer and software developer his value
                                to the company is to provide with the modules and programs
                                that are sold or used for profit.
                            </p>
                            <p>
                                <ul class="fh5co-social-icons">
                                    <li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
                                    <li><a href="https://www.facebook.com/mariio.caicedo.1"><i class="icon-facebook-with-circle"></i></a></li>
                                    <li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
                                    <li><a href="#"><i class="icon-dribbble-with-circle"></i></a></li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@stop