<!DOCTYPE html>
    <html>
        <head>
            <style>
                .active{
                    text-decoration:none;
                    color:red;
                }
                .error{
                    color:red;
                    font-size:11px;
                }
            </style>
            <link rel="stylesheet" href="{{asset('css/app.css')}}">
        </head>
        @yield('contenido1')
        <body>
            <nav>

                <a class = "{{request()->is('/')? 'active' : ''}}"
                href="{{route('start') }}">Inicio</a>

                <a class = "{{request()->is('')? 'active' : ''}}"
                href="  ">Saludos</a>

                <a class = "{{request()->is('messages')? 'active' : ''}}"
                href="{{route('messages.create') }}">Crear mensaje</a>

                <a class = "{{request()->is('messages')? 'active' : ''}}"
                href="{{route('messages.index') }}">Mensajes</a>
            </nav>
        @yield('contenido2')
        </body>

        
    </html>