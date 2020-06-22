@extends('layouts.app')
@section('content')
@if(Session::has('mensaje'))
<div class="row justify-content-center">
<div class="col-sm-7">
<div class="alert alert-success">
{{Session::get('mensaje')}}
</div>
</div>
</div>
@endif
<form method="POST" action="{{route('nota.update',['nota'=>$nota])}}">
@method('PUT')
@csrf
<div class="row justify-content-center">
<div class="col-sm-7">
    <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="titulo" value="{{$nota->titulo}}" placeholder="Titulo">
    </div>
    <div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="10">{{$nota->contenido}}</textarea>
    </div>
</div>
<div class="col-sm-7 text-center">
<button class="btn btn-primary btn-block" type="submit">Enviar</button>
<a href="{{route('nota.index')}}" class="btn btn-secondary btn-block">Volver atrás</a>
</div>
</div>
</form>
@endsection