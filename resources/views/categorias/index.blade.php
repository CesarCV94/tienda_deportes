@extends('layout.main')
@section('title','Home')
@section('content')
@include('sweetalert::alert')    

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
              <img class="d-block img-fluid" src="http://lorempixel.com/900/350/sports/" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://lorempixel.com/900/350/sports/" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://lorempixel.com/900/350/sports/" alt="Third slide">
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
            @if(count($categorias) > 0)
            <table class="table">
              <thead>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
              </thead>
              <tbody>
                 @foreach ($categorias as $categoria)
                     <tr>
                         <td width="20%">{{$categoria->id}}</td>
                         <td width="50%">{{$categoria->nombre}}</td>
                         <td width="15%">
                            <a href="{{route('categorias.edit',$categoria->id)}}">
                                <button type="button" rel="tooltip" class="btn btn-success btn-fab btn-round">Editar</button>
                            </a>
                         </td>
                         <td width="15%">
                            <form action="{{route('categorias.destroy',$categoria->id)}}" method="POST" onsubmit=" return confirm('Esta seguro de eliminar la categoria {{$categoria->nombre}}');">
                                <input name="_method" type="hidden" value="DELETE">
                                 {{ csrf_field() }}
                                 <button type="submit" class="btn btn-danger btn-fab btn-round">Eliminar</button>
                            </form>
                         </td>
                     </tr>
                 @endforeach
              </tbody>
            </table>
            @else
            <div class="container" style="height:150px">
                <h2>No hay Categorías creadas</h2>
            </div>
            @endif
            <div class="card-footer">
                <a href="{{route('categorias.create')}}">Agregar Nueva Categoría</a>
            </div>
        </div> 
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection