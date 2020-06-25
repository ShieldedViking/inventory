<!DOCTYPE html>
    <html>
        <head>
            <title>Contacto</title>
        </head>
        <body>
            <h1><?php echo $id?></h1>
            <h1>saludos para {{$id}}</h1>
            {{$html}} </p>
            {!!$script!!}
            <nav>
               
            </nav>
            <ul>
                @forelse ($marcas as $marca)
                    <li>{{$marca}}</li>
                @empty
                    <p>No hay marcas</p>
                @endforelse

                @foreach ($marcas as $marca)
                    <li>{{$marca}}</li>
                @endforeach

                @if(count($marcas)===1)
                    <p>solo hay una marca</p>
                @elseif(count($marcas)>1)
                    <p>tienes varias marcas</p>
                @endif
            </ul>
        </body>
    </html>