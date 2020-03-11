@extends('layouts.master')
@section('content')
<div class="container">

@if(Session::has('Mensaje')){{Session::get('Mensaje')}}

@endif

<a href="{{url('eventos/create')}}" class="btn btn-success">Agregar Evento</a>
<br>
<br>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)

                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset('storage').'/'.$evento->Foto}}" class="img-thumbnail img-fluid" alt="" width="100"></td>
                        <td>{{$evento->Nombre}}</td>
                        <td>{{$evento->Descripcion}}</td>
                        <td>{{$evento->Fecha}}</td>
                    <td>
                        <a class="btn btn-warning bg-gradient-warning" href="{{url('eventos/'.$evento->id.'/edit')}}">
                        Editar
                    </a>       

                        <form method="post" action="{{url('/eventos/'.$evento->id)}}" style="display:inline">
                            @csrf
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger bg-gradient-danger" type="submit" onclick="return confirm('Borrar?')">Borrar</button>
                        </form>

                        </td>
                    </tr>
                        
                    @endforeach

                </tbody>
            </table>
        </div>
        
    </div>
    {{ $eventos-> links()}}
</div>



@endsection