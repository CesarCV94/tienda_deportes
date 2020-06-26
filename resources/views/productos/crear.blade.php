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
        <!-- div -->
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
        <!-- div form -->
        <div class="container border">
          <div class="left p-4">
            <h2>Crear un nuevo Producto</h2>
          </div>
            <form class="form-horizontal" method="post" action="{{route('productos.store')}}" enctype="application/x-www-form-urlencoded">
              <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre del producto">
              </div>
              <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control" placeholder="Escribe la descripción del producto"></textarea>
              </div>
              <div class="form-group">
                <label>Precio</label>
                <input type="number" class="form-control" name="precio">
              </div>
              <div class="form-group">
                <select class="form-control" name="categorias_id">
                  <option value="0">Selecciona a que categoría pertenece</option>
                  @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>   
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Guardar Producto</button>
               </div>
               {{ csrf_field() }}  
            </form>
          </div>
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection