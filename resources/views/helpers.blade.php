{{-- llamada de la funcion del helper.php --}}
{{current_user()}}

@foreach ($productos as $producto)
    <p>{{$producto->descripcion }}</p>
    <p>{{$producto->precio }}</p><br> 
@endforeach