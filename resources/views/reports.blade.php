@extends('layouts.plantilla')

@section('contenido2')
<li><a href="{{url('/')}}">Home</a></li>
<li><a href="{{url('facturation')}}">Facturation</a></li>
<li class="active"><a href="{{url('reports')}}">Reports</a></li>
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
<h1>Recibed</h1>

<table width="100%" border="1">
    <thead>
        <tr>
            <th>Medicament</th>
            <th>Date</th>
            <th>Expiration date</th>
            <th>User</th>
			<th>Price for sell</th>
			<th>Price bought</th>
			<th>Quantity</th>
			<th>Pharmacy</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            @foreach($wea1 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            <td>{{$message->date}}</td>
            <td>{{$message->expire}}</td>
            @foreach($wea2 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            <td>{{$message->priceSell}}</td>
			<td>{{$message->priceBought}}</td>
            <td>{{$message->quantity}}</td>
            @foreach($wea3 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            </form>
            
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

<h1>Sold</h1>

<table width="100%" border="1">
    <thead>
        <tr>
            <th>Medicament</th>
            <th>Date</th>
            <th>User</th>
			<th>Client</th>
			<th>Pharmacy</th>
        </tr>
    </thead>
    <tbody>
        @foreach($message1 as $message)

        <tr>
            @foreach($wea4 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            <td>{{$message->date}}</td>
			@foreach($wea5 as $id)
                <td>{{$id->name}}</td>
            @endforeach
			@foreach($wea6 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            @foreach($wea7 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            </form>
            
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

<h1>In stock</h1>

<table width="100%" border="1">
    <thead>
        <tr>
            <th>Medicament</th>
            <th>Quantity</th>
			<th>Pharmacy</th>
        </tr>
    </thead>
    <tbody>
        @foreach($message2 as $message)

        <tr>
            @foreach($wea8 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            <td>{{$message->quantity}}</td>
            @foreach($wea9 as $id)
                <td>{{$id->name}}</td>
            @endforeach
            </form>
            
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@stop