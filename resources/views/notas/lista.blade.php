@extends('layouts.app')
@section('content')
<div class="container">
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

<article class="postcard light yellow">
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
@endsection