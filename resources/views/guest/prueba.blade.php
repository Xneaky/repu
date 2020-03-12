
<ul>
    @forelse ($data as $evento)
            <h1>{{$evento->Nombre}}</h1>
        
    @empty
            <h1>No hay</h1>
    @endforelse

</ul>


