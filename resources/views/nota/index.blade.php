@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{route('nota.index')}}" method="get">
<div class="card mb-4">
<div class="card-body">
        <div class="input-group">
        
        <input type="text" class="form-control" name="texto" id="texto" placeholder="Buscar" value="{{$texto}}">
        <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Buscar</button>
        </span>
        </div>
</div>
</div>
</form>
@if(count($notas)<=0)
<div class="card mb-4">
        <div class="card-body">
                <h5 class="card-title">No hay registros que mostrar</h5>
                <p class="card-text">No hay registros que mostrar</p>
        </div>
    
    </div>
@endif
@foreach($notas as $nota)
    <div class="card mb-4">
        <div class="card-body">
                <h5 class="card-title"> {{$nota->titulo}}</h5>
                <p class="card-text">{{$nota->contenido}}...</p>
                <a href="{{route('nota.show',['nota'=>$nota->id])}}" class="btn btn-success">Leer mas</a>
                <a href="{{route('nota.edit',['nota'=>$nota->id])}}" class="btn btn-primary ml-2">Editar</a>
                <a href="" data-target="#modal-delete-{{$nota->id}}" data-toggle="modal" class="btn btn-danger ml-2">Eliminar</a>
        </div>
    </div>
    @include('nota.destroy')
    @endforeach
    {{$notas->links()}}
</div>

@endsection