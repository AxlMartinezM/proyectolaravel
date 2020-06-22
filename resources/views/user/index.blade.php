@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{route('user.index')}}" method="GET">
    <div class="card mb-4">
        <div class="card-body">
            <div class="input-group">
                <input type="text" class="form-control" name="texto" id="texto" placeholder="Buscar.." value="{{$texto}}">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </span>
            </div>
        </div>
    </div>
</form>
@if(count($users)<=0)
<div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Sin registros</h5>
            <p class="card-text">Sin registros</p>
        </div>
    </div>
    @endif
@foreach ($users as $user)
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p class="card-text">{{$user->email}}</p>
            <a href="{{route('user.edit',['user'=>$user->id])}}" class="btn btn-primary ml-2">Editar</a>
            <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal" class="btn btn-danger ml-2">Eliminar</a>
        </div>
    </div>
    @include('user.destroy')
    @endforeach
    {{$users->links()}}
</div> 
@endsection