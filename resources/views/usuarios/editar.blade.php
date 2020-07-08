@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Seccion para editar usuarios</h3>
        </div>

<form action="{{url('/usuarios/'.$usuario->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('usuarios.form2',['Modo'=>'editar'])

</form>
</div>
</div>
@endsection
