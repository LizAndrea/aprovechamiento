<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CueroRegional;
use App\CueroRegionalComunidad;
use App\CueroRegionalBeneficio;
use App\CueroRegionalAprovechamiento;
use App\Departamento;
use App\Empresa;
use App\AppTools; 
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CueroRegionalAprovechamientoController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'Comunidad' => 'required',
            'Cupo' =>'required'
        );

        $this->validate($request,$rules);
        $item = new CueroRegionalAprovechamiento();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('CueroRegionalAprovechamiento');
        $item->CueroRegional = $request->cueroRegional;
        $item->Comunidad = $request->Comunidad;
        $item->Cupo = $request->Cupo;
        $item->CupoAprovechado = $request->CupoAprovechado;
        $item->CueroRechazado = $request->CueroRechazado;
        $item->CueroVendido = $request->CueroVendido;
        $item->Empresa = $request->Empresa;
        $item->UsuarioRegistro = \Auth()->user()->id;
        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;  
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->save();


        Session::flash('info_message', trans('messages.formCreated'));      
        $cueroRegionalComunidad = CueroRegionalComunidad::orderBy('created_at','desc');
        $cueroRegionalComunidad->where('CueroRegional',$request->cueroRegional);
        $cueroRegionalComunidad = $cueroRegionalComunidad->get();

        $cueroRegionalAprovechamiento = CueroRegionalAprovechamiento::orderBy('created_at','desc');
        $cueroRegionalAprovechamiento->where('CueroRegional',$request->cueroRegional);
        $cueroRegionalAprovechamiento = $cueroRegionalAprovechamiento->get();

        $cueroRegionalBeneficio = CueroRegionalBeneficio::orderBy('created_at','desc');
        $cueroRegionalBeneficio->where('CueroRegional',$request->cueroRegional);
        $cueroRegionalBeneficio = $cueroRegionalBeneficio->get();

        $empresa = ['0' => 'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->where('Estado',1)->lists('Empresa','id')->toArray();
        $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();

        $cueroRegional = CueroRegional::findOrFail($request->cueroRegional);
        return view('cueroregional.formulario2',compact('cueroRegional', 'departamento', 'cueroRegionalComunidad', 'cueroRegionalAprovechamiento', 'cueroRegionalBeneficio', 'empresa'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $empresa = ['0' => 'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->where('Estado',1)->lists('Empresa','id')->toArray();
        $cueroRegionalAprovechamiento = CueroRegionalAprovechamiento::findOrFail($id);
        return view('cueroRegionalAprovechamiento.edit', compact('cueroRegionalAprovechamiento', 'empresa'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
      $rules = array(
            'Comunidad' => 'required',
            'Cupo' =>'required'
        );

        $this->validate($request,$rules);

      $item = CueroRegionalAprovechamiento::findOrFail($id);
        $item->Comunidad = $request->Comunidad;
        $item->Cupo = $request->Cupo;
        $item->CupoAprovechado = $request->CupoAprovechado;
        $item->CueroRechazado = $request->CueroRechazado;
        $item->CueroVendido = $request->CueroVendido;
        $item->Empresa = $request->Empresa;
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->save();

      Session::flash('flash_message', 'Reporte successfully updated!');
        $cueroRegionalComunidad = CueroRegionalComunidad::orderBy('created_at','desc');
        $cueroRegionalComunidad->where('CueroRegional',$request->cueroRegional);
        $cueroRegionalComunidad = $cueroRegionalComunidad->get();

        $cueroRegionalAprovechamiento = CueroRegionalAprovechamiento::orderBy('created_at','desc');
        $cueroRegionalAprovechamiento->where('CueroRegional',$request->cueroRegional);
        $cueroRegionalAprovechamiento = $cueroRegionalAprovechamiento->get();

        $cueroRegionalBeneficio = CueroRegionalBeneficio::orderBy('created_at','desc');
        $cueroRegionalBeneficio->where('CueroRegional',$request->cueroRegional);
        $cueroRegionalBeneficio = $cueroRegionalBeneficio->get();

        $empresa = ['0' => 'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->where('Estado',1)->lists('Empresa','id')->toArray();
        $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();
        
        $cueroRegional = CueroRegional::findOrFail($request->cueroRegional);
        return view('cueroregional.formulario2',compact('cueroRegional', 'departamento', 'cueroRegionalComunidad', 'cueroRegionalAprovechamiento', 'cueroRegionalBeneficio', 'empresa'));


    }

    /**
     * Elimina el registro
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      
        $item = CueroRegionalAprovechamiento::findOrFail($id); 
        CueroRegionalAprovechamiento::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        
        $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();
        $cueroRegionalComunidad = CueroRegionalComunidad::orderBy('created_at','desc');
        $cueroRegionalComunidad->where('CueroRegional',$item->CueroRegional);
        $cueroRegionalComunidad = $cueroRegionalComunidad->get();

        $cueroRegionalAprovechamiento = CueroRegionalAprovechamiento::orderBy('created_at','desc');
        $cueroRegionalAprovechamiento->where('CueroRegional',$item->CueroRegional);
        $cueroRegionalAprovechamiento = $cueroRegionalAprovechamiento->get();

        $cueroRegionalBeneficio = CueroRegionalBeneficio::orderBy('created_at','desc');
        $cueroRegionalBeneficio->where('CueroRegional',$item->CueroRegional);
        $cueroRegionalBeneficio = $cueroRegionalBeneficio->get();

        $empresa = ['0' => 'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->where('Estado',1)->lists('Empresa','id')->toArray();

        $cueroRegional = CueroRegional::findOrFail($item->CueroRegional);
        Session::flash('flash_message', 'Reporte Regional successfully deleted!');
        return view('cueroregional.formulario2',compact('cueroRegional', 'departamento', 'cueroRegionalComunidad', 'cueroRegionalAprovechamiento', 'cueroRegionalBeneficio', 'empresa'));

    }

}
