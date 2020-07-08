@extends('layouts.master')
@section('content')

<div class="container">

    @if(Session::has('Mensaje')){{Session::get('Mensaje')}}
    
    @endif
    
    <a href="{{url('usuarios/create')}}" class="btn btn-success">Agregar Usuario</a>
    <br>
    <br>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $usuario)
    
                        <tr>
    
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                        <td>
                            <a class="btn btn-warning bg-gradient-warning" href="{{url('usuarios/'.$usuario->id.'/edit')}}">
                            Editar
                        </a>       
    
                            <form method="post" action="{{url('/usuarios/'.$usuario->id)}}" style="display:inline">
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
    </div>




@endsection

