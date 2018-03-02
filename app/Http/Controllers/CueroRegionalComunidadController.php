<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CueroRegional;
use App\CueroRegionalComunidad;
use App\Departamento;
use App\Empresa;
use App\CueroRegionalAprovechamiento;
use App\CueroRegionalBeneficio;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CueroRegionalComunidadController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
          'Provincia' => 'required',
          'Comunidad' => 'required',
          'NumeroCazadores' =>'required'
          );

        $this->validate($request,$rules);
        $item = new CueroRegionalComunidad();
        $item->version = AppTools::setInitialVersion();
        $item->Num = 1;
        $item->CueroRegional = $request->cueroRegional;
        $item->Provincia = $request->Provincia;
        $item->Municipio = $request->Municipio;
        $item->Comunidad = $request->Comunidad;
        $item->NumeroCazadores = $request->NumeroCazadores;
        $item->Representante = $request->Representante;
        $item->Telefono = $request->Telefono;     
        $item->UsuarioRegistro = \Auth()->user()->id;
        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;  
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->save();
        $cueroRegional = CueroRegional::findOrFail($request->cueroRegional);

          $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();
        
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

          Session::flash('info_message', trans('messages.rowAdded'));
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
        $cueroRegionalComunidad = CueroRegionalComunidad::findOrFail($id);
        return view('cueroRegionalComunidad.edit', compact('cueroRegionalComunidad'));
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
          'Provincia' => 'required',
          'Comunidad' => 'required',
          'NumeroCazadores' =>'required'
          );
        $this->validate($request,$rules);
        
        $item = CueroRegionalComunidad::findOrFail($id);
        $item->version = AppTools::setInitialVersion();
        $item->Num = 1;
        $item->Provincia = $request->Provincia;
        $item->Municipio = $request->Municipio;
        $item->Comunidad = $request->Comunidad;
        $item->NumeroCazadores = $request->NumeroCazadores;
        $item->Representante = $request->Representante;
        $item->Telefono = $request->Telefono;     
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->save();


        $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();
        
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

          $cueroRegional = CueroRegional::findOrFail($request->cueroRegional);
          Session::flash('info_message', trans('messages.rowUpdated'));
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
        $item = CueroRegionalComunidad::findOrFail($id); 
        CueroRegionalComunidad::destroy($id);
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
        Session::flash('info_message', trans('messages.rowUpdated'));
        return view('cueroregional.formulario2',compact('cueroRegional', 'departamento', 'cueroRegionalComunidad', 'cueroRegionalAprovechamiento', 'cueroRegionalBeneficio', 'empresa'));
    }
}
