@extends('layout.main')
@section('title','Home')
@section('content')
    

<!-- Page Content -->
<div class="container pt-5">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          @foreach ($categorias as $categoria)
            <a href="{{route('productos.categoria',$categoria->id)}}" class="list-group-item">{{$categoria->nombre}}</a> 
          @endforeach
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- /.row -->
        <!-- div -->
        <div class="container pb-5">
          <!-- table -->
          <table class="table">
              <thead>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Categoria</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
              </thead>
              <tbody>
                  @foreach ($productos as $producto)
                      <tr>
                          <td>{{$producto->id}}</td>
                          <td>{{$producto->nombre}}</td>
                          <td>{{$producto->descripcion}}</td>
                      <td>{{$producto->precio}}</td>
                      <td>{{$producto->categoria->nombre}}</td>
                      <td>
                        <a href="{{route('productos.edit', $producto->id)}}"><button class="btn btn-success btn-fab btn-round">Editar</button>
                      </td>
                      <td>
                      <form action="{{route('productos.destroy', $producto->id)}}" 
                      method="POST" onsubmit=" return confirm('¿Esta seguro de Eliminar el producto {{$producto->nombre}}')">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class=" btn btn-danger" btn-fabb btn-round>Eliminar</button>
                    </form>
                      </td>
                      </tr>   
                  @endforeach
              </tbody>
          </table>
          <div class="card-footer">
            <a href="{{route('productos.create')}}">Agregar un Producto</a>
          </div>
        </div> 
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection