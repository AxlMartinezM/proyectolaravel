@extends('layouts.app')
@section('content')
<div class="container">
<a href="{{ route('descargarPDFUsers') }}" class="btn btn-sm btn-primary" target="_blank">Descargar PDF</a>
<h2>Usuarios registrados</h2>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ID de Usuario</th>
      <th scope="col">Nombre de Usuario</th>
      <th scope="col">Email de Usuario</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    {{$users->links()}}
@endsection
</div>

   