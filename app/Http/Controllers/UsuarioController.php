<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use App\AppTools;
use App\Empresa;
use App\Rol;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $usuario = Usuario::orderBy('Usuario','asc')->get();
        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $empresa = ['0'=>'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->lists('Empresa','id')->toArray();
        $rol = ['0'=>'Seleccionar...'] + Rol::select('id','Rol')->orderBy('Num','asc')->lists('Rol','id')->toArray();
        return view('usuario.create',compact('empresa','rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Respons'e
     */
    public function store(Request $request)
    {
        
      $rules = array(
        'Nombres' => 'required',
        'Apellidos' => 'required',
        'Rol'=>'required|numeric|not_in:0',
        'email' => 'required|email|unique:Usuario,email',
        'password' => 'required|confirmed'
        ); 

      $this->validate($request,$rules);

        $item = new Usuario();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Usuario');
        $item->Nombres = trim($request->Nombres);
        $item->Apellidos = trim($request->Apellidos);
        $item->Usuario = $item->Apellidos . ' ' . $item->Nombres;
        $item->Empresa = $request->Empresa == '0' ? null : $request->Empresa;
        $item->Rol = $request->Rol;
        $item->email = $request->email;
        $item->password = bcrypt($request->password);
        $item->Activo = $request->Activo == '1' ? true : false;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();

        $item->save();
        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $empresa = ['0'=>'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->lists('Empresa','id')->toArray();
        $rol = ['0'=>'Seleccionar...'] + Rol::select('id','Rol')->orderBy('Num','asc')->lists('Rol','id')->toArray();
        
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario','empresa','rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
      $rules = array(
        'Nombres' => 'required',
        'Apellidos' => 'required',
        'Rol'=>'required|numeric|not_in:0',
        'email' => 'required|email|unique:Usuario,email,' . $id,
        'password' => 'confirmed'
        ); 

      $this->validate($request,$rules);

        $item = Usuario::findOrFail($id);
        $item->version = AppTools::setVersion('Usuario',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Usuario');
        $item->Nombres = trim($request->Nombres);
        $item->Apellidos = trim($request->Apellidos);
        $item->Usuario = $item->Apellidos . ' ' . $item->Nombres;
        $item->Empresa = $request->Empresa == '0' ? null : $request->Empresa;
        $item->Rol = $request->Rol;
        $item->email = $request->email;

        if($request->password != "")
            $item->password = bcrypt($request->password);
        
        $item->Activo = $request->Activo == '1' ? true : false;
        
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();

        $item->save();
        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect('usuario');
    }

        public function showProfile($id)
    {
      $usuario = Usuario::findOrFail($id);
      return view('usuario.myprofile',compact('usuario'));
    }

    public function changePassword($usuario,$oldpassword,$newpassword)
    {
      $usuario = Usuario::findOrFail($usuario);
      if(!\Hash::check($oldpassword, $usuario->password))
        return "NACK";
      $usuario->password = bcrypt($newpassword);
      $usuario->save();
      return "ACK";
    }

}
