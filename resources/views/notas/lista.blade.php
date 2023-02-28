@extends('layouts.app')
@section('content')
<div class="container">
    <!DOCTYPE html>
<html>
<head>
    <title>Notas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
     var siteUrl = "{{url('/')}}";
  </script>
</head>
<body>


  <div class="card">
    <div class="card-header text-center font-weight-bold">
      <h2>GESTION DE NOTAS</h2>
    </div>
 
    <div class="card-body">
      <form name="autocomplete-textbox" id="autocomplete-textbox" method="" action="#">
       @csrf
 
        <div class="form-group">
          <label for="exampleInputEmail1">Search Note By Name</label>
          <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
              <option>Buscar por tipo</option>
              <option>nombre</option>
              <option>detalle</option>
              <option>id</option>
            </select>
        </div>
        <div class="container-top mt-4">
            <form class="form-inline">
                <input type="search" id="nombre" name="nombre" class="form-control">
          </form>
          <div class="container-top mt-4">
            <button class="btn mt-4 btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </div>
      </form>
    </div>
  </div>
   
</div>  
  <script src="{{ asset('auto.js') }}"></script>
</body>
 
<br><br>
</html>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Notas para {{auth()->user()->name}}</span>
                    <a href="/notas/create" class="btn btn-primary btn-sm">Nueva Nota</a>
                </div>

                <div class="card-body">      
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>Acción</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$notas->links()}}
                {{-- fin card body --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

{{-- <article class="postcard light yellow">
    <a class="postcard__img_link" href="#">
        <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
    </a>
    <div class="postcard__text t-dark">
        <h1 class="postcard__title yellow"><a href="#">Podcast Title</a></h1>
        <div class="postcard__subtitle small">
            <time datetime="2020-05-25 12:00:00">
                <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
            </time>
        </div>
        <div class="postcard__bar"></div>
        <div class="postcard__preview-txt">Lorem ipsum dolor ttttt sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
        <ul class="postcard__tagbox">
            <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
            <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
            <li class="tag__item play yellow">
                <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
            </li>
        </ul>
    </div>
</article>
@endsection --}}