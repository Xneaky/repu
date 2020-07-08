<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view('usuarios.crear', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre' => 'required|String|max:100',
            'Email' => 'required|max:10000|Email',
            'Contraseña' => 'required|password',
            'ContraseñaConf' => 'required|password',
            'Rol' => 'required|max:10000|'
        ];

        $Mensaje=["required" => 'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);

        $usuario = new User;

        $usuario->name = $request->Nombre;
        $usuario->email = $request->Email;
        $usuario->password = Hash::make($request->Contraseña);

        if ($usuario->save()) {

            $usuario->assignRole($request->Rol);

            return redirect('/usuarios')->with('Mensaje','Usuario agregado con exito');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario= User::findOrFail($id);
        $roles = Role::all()->pluck('name','id');

        return view('usuarios.editar',compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre' => 'required|String|max:100',
            'Email' => 'required|max:10000|Email',
            'Contraseña' => 'required|password',
            'ContraseñaConf' => 'required|password',
            'Rol' => 'required|max:10000|'
        ];


        $Mensaje=['required'=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        User::where('id','=',$id)->update($request);

        //$evento= Eventos::findOrFail($id);
        //return view('eventos.editar',compact('evento'));

        return redirect('usuarios')->with('Mensaje','Usuario modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
