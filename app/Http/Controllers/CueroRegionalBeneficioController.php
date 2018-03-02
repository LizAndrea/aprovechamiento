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

class CueroRegionalBeneficioController extends Controller
{
        
    public function store(Request $request)
    {
        $rules = array(
            'TotalBeneficio' => 'required'
        );
        $this->validate($request,$rules);

        $item = new CueroRegionalBeneficio();
        $item->version = AppTools::setInitialVersion();
        $item->Num = 1;
        $item->CueroRegional = $request->cueroRegional;
        $item->TotalBeneficio = $request->TotalBeneficio;
        $item->TotalGasto = $request->TotalGasto;
        $item->TotalAporte = $request->TotalAporte;
        $item->TotalBeneficioDistribuido = $request->TotalBeneficioDistribuido;
        $item->UsuarioRegistro = \Auth()->user()->id;
        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;  
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->save();

        Session::flash('info_message', trans('messages.formCreated'));   

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

        return view('cueroregional.formulario2',compact('cueroRegional', 'departamento', 'cueroRegionalComunidad', 'cueroRegionalAprovechamiento', 'cueroRegionalBeneficio', 'empresa'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $cueroRegionalBeneficio = CueroRegionalBeneficio::findOrFail($id);
        return view('cueroRegionalBeneficio.edit', compact('cueroRegionalBeneficio'));
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
            'TotalBeneficio' => 'required'
        );
        $this->validate($request,$rules);

        $item = CueroRegionalBeneficio::findOrFail($id);
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('CueroRegionalBeneficio');
        $item->CueroRegional = $request->cueroRegional;
        $item->TotalBeneficio = $request->TotalBeneficio;
        $item->TotalGasto = $request->TotalGasto;
        $item->TotalAporte = $request->TotalAporte;
        $item->TotalBeneficioDistribuido = $request->TotalBeneficioDistribuido;
        $item->UsuarioRegistro = \Auth()->user()->id;
        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;  
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

          Session::flash('flash_message', 'Reporte successfully updated!');
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

        $item = CueroRegionalBeneficio::findOrFail($id); 
        CueroRegionalBeneficio::destroy($id);
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
