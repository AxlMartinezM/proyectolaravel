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
<form method="POST" action="{{route('user.update',['user'=>$user])}}">
@method('PUT')
@csrf
<div class="row justify-content-center">
<div class="col-sm-7">
    <div class="form-group">
    <label for="titulo">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" placeholder="Titulo">
    </div>
    <div class="form-group">
    <label for="contenido">Email</label>
    <textarea class="form-control" name="email" id="email" cols="30" rows="10">{{$user->email}}</textarea>
    </div>
</div>
<div class="col-sm-7 text-center">
<button class="btn btn-primary btn-block" type="submit">Enviar</button>
<a href="{{route('user.index')}}" class="btn btn-secondary btn-block">Volver atrás</a>
</div>
</div>
</form>
@endsection