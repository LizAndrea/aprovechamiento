<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoProducto;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipoProducto = TipoProducto::paginate(15);
        return view('tipoproducto.index', compact('tipoProducto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipoproducto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'TipoProducto'=>'required|unique:TipoProducto,TipoProducto');

        $this->validate($request,$rules);

        $item = new TipoProducto();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoProducto');
        $item->TipoProducto = $request->TipoProducto;
        $item->Descripcion = $request->Descripcion;
        $item->Activo = true;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('tipoproducto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tipoProducto = TipoProducto::findOrFail($id);
        return view('tipoproducto.show', compact('tipoProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoProducto = TipoProducto::findOrFail($id);

        return view('tipoproducto.edit', compact('tipoProducto'));
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
            'TipoProducto'=>'required|unique:TipoProducto,TipoProducto,' . $id);

        $this->validate($request,$rules);

        $item = TipoProducto::findOrFail($id);
        $item->version = AppTools::setVersion('TipoProducto',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoProducto');
        $item->TipoProducto = $request->TipoProducto;
        $item->Descripcion = $request->Descripcion;
        $item->Activo = true;

        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('tipoproducto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        TipoProducto::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect('tipoproducto');
    }

}
