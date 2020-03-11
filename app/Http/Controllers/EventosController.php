<?php

namespace App\Http\Controllers;

use App\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['eventos']=Eventos::paginate(5);

        return view('eventos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('eventos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre' => 'required|String|max:100',
            'Descripcion' => 'required|max:10000',
            'Fecha' => 'required|date|after:yesterday',
            'Foto' => 'required|max:10000|image'
        ];

        $Mensaje=["required" => 'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);

        $datosEvento=request()->except('_token');

        if($request->hasFile('Foto')){

            $datosEvento['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Eventos::insert($datosEvento);
        return redirect('eventos')->with('Mensaje','Evento agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evento= Eventos::findOrFail($id);

        return view('eventos.editar',compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre' => 'required|String|max:100',
            'Descripcion' => 'required|max:10000',
            'Fecha' => 'required|date|after:yesterday'
            
        ];

        if($request->hasFile('Foto')){
            $campos+=['Foto' => 'required|max:10000|image'];
        }

        $Mensaje=['required'=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEvento=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){

            $evento= Eventos::findOrFail($id);
            Storage::delete('public/'.$evento->Foto);

            $datosEvento['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Eventos::where('id','=',$id)->update($datosEvento);

        //$evento= Eventos::findOrFail($id);
        //return view('eventos.editar',compact('evento'));

        return redirect('eventos')->with('Mensaje','Evento modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $evento= Eventos::findOrFail($id);
        if(Storage::delete('public/'.$evento->Foto)){
            Eventos::destroy($id);
        }

        return redirect('eventos')->with('Mensaje','Evento eliminado con exito');
    }
}