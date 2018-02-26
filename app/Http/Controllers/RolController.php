<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rol;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RolController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rol = Rol::get();

        return view('rol.index', compact('rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('rol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'Rol'=>'required|unique:Rol,Rol'
            );
        $this->validate($request,$rules);

        $item = new Rol();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Rol');
        $item->Rol = $request->Rol;
        $item->Descripcion = $request->Descripcion;
        $item->Parametros = $request->Parametros =='1' ? true : false;
        $item->Empresas = $request->Empresas =='1' ? true : false;
        $item->Usuarios = $request->Usuarios =='1' ? true : false;
        $item->Formularios = $request->Formularios =='1' ? true : false;
        $item->Reportes = $request->Reportes =='1' ? true : false;
        $item->SoloEmpresa = $request->SoloEmpresa =='1' ? true : false;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();
        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('rol');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $rol = Rol::findOrFail($id);

        return view('rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rol = Rol::findOrFail($id);

        return view('rol.edit', compact('rol'));
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
            'Rol'=>'required|unique:Rol,Rol,'.$id
            );
        $this->validate($request,$rules);

        $item = Rol::findOrFail($id);
        $item->version = AppTools::setVersion('Rol',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Rol');
        $item->Rol = $request->Rol;
        $item->Descripcion = $request->Descripcion;
        $item->Parametros = $request->Parametros =='1' ? true : false;
        $item->Empresas = $request->Empresas =='1' ? true : false;
        $item->Usuarios = $request->Usuarios =='1' ? true : false;
        $item->Formularios = $request->Formularios =='1' ? true : false;
        $item->Reportes = $request->Reportes =='1' ? true : false;
        $item->SoloEmpresa = $request->SoloEmpresa =='1' ? true : false;

        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();
        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('rol');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Rol::destroy($id);
        Session::flash('flash_message', trans('labels.rowDeleted'));
        return redirect('rol');
    }

}
