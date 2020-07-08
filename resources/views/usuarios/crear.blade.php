@extends('layouts.master')
@section('content')
<div class="container">

@if(count($errors)>0)
<div class="container">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
</div>
@endif

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Seccion para crear usuarios</h3>
        </div>

<form action="{{url('/usuarios')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
    @csrf
    @include('usuarios.form',['Modo'=>'crear'])

</form>
</div>
</div>
@endsection