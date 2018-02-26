<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoActividad;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoActividadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipoActividad = TipoActividad::orderBy('Num','asc')->paginate(15);
        return view('tipoactividad.index', compact('tipoActividad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipoactividad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $rules = array(
            'Codigo' => 'required|unique:TipoActividad,Codigo',
            'TipoActividad' => 'required');
        
        $this->validate($request,$rules);

        $item = new TipoActividad();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoActividad');
        $item->Codigo = $request->Codigo;
        $item->TipoActividad = $request->TipoActividad;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('tipoactividad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tipoActividad = TipoActividad::findOrFail($id);
        return view('tipoactividad.show', compact('tipoActividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoactividad = TipoActividad::findOrFail($id);

        return view('tipoactividad.edit', compact('tipoactividad'));
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
            'Codigo' => 'required|unique:TipoActividad,Codigo,' . $id,
            'TipoActividad' => 'required');
        
       $this->validate($request,$rules);

        $item = TipoActividad::findOrFail($id);
        $item->version = AppTools::setVersion('TipoActividad',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoActividad');
        $item->Codigo = $request->Codigo;
        $item->TipoActividad = $request->TipoActividad;
        
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('tipoactividad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        TipoActividad::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect('tipoactividad');
    }

}
