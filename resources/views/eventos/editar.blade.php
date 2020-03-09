@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Seccion para editar eventos</h3>
        </div>

<form action="{{url('/eventos/'.$evento->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('eventos.form',['Modo'=>'editar'])

</form>
</div>
</div>
@endsection
