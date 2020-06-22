@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><{{$nota->titulo}}/h5>
                        <p class="card-text">{{$nota->contenido}}</p>
                        <a href="{{route('nota.index')}}" class="">Volver atras</a>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('mensaje'))
        <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="alert alert-success">
            {{Session::get('mensaje')}}
            </div>
        </div>
        </div>
        @endif
        @if($errors->any())
        <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            </ul>
            </div>
        </div>
        </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <form action="{{route('comentario.guardar')}}" method="post">
        @csrf
        <div class="form-group">
        <input type="hidden" name="nota_id" id="nota_id" value="{{$nota->id}}">
        <label for="contenido">Contenido</label>
        <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="4"></textarea>
        </div>
            <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Enviar</button>
            </div>
        </form>
            </div>
        </div>
        
        </div>
    </div>

        @if(count($comentarios)<=0)
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No hay comentarios que mostrar</h5>
                        <p class="card-text">No hay comentarios que mostrar</p>
                        
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach($comentarios as $comentario)
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$comentario->name}} - {{$comentario->email}}</h5>
                        <p class="card-text">{{$comentario->contenido}}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
</div>
@endsection