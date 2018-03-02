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

class CueroRegionalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    /*
    public function index()
    {
        $formulario = Formulario::orderBy('Fecha','desc');
            if(\Auth::user()->esRol->SoloEmpresa)
                $formulario->where('Empresa',\Auth::user()->Empresa);
        $formulario = $formulario->get();
        return view('formulario.index', compact('formulario'));
    }*/

    public function index()
    {  
      $cueroRegional = CueroRegional::orderBy('FechaRegistro','desc');
      $cueroRegional->where('Empresa',\Auth::user()->Empresa);
      $cueroRegional = $cueroRegional->get();
      return view('cueroregional.index', compact('cueroRegional'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();
      $cueroRegionalComunidad = CueroRegionalComunidad::orderBy('FechaRegistro','desc');
      $cueroRegionalComunidad = $cueroRegionalComunidad->get();
      return view('cueroregional.formulario',compact('departamento'));
    }

    public function createComunidad($id)
    {

      return view('cueroregional.create',compact('id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'Regional' => 'required',
            'Cupo' => 'required',
            'Fecha' =>'required|date'
        );
        $this->validate($request,$rules);

        $item = new CueroRegional();
        $item->version = AppTools::setInitialVersion();
        $item->Empresa = \Auth::user()->Empresa;
        $item->Fecha = $request->Fecha;
        $item->Regional = $request->Regional;
        $item->Cupo = $request->Cupo;
        $item->RepresentanteLegal = $request->RepresentanteLegal;
        $item->Telefono = $request->Telefono;
        $item->CorreoElectronico = $request->CorreoElectronico;
        $item->Departamento = $request->Departamento;
        $item->MotivoRechazo = $request->MotivoRechazo;
        $item->InformacionRechazo = $request->InformacionRechazo;
        $item->Observaciones = $request->Observaciones;
        $item->EstadoFormulario = 1; //se crea con estado pendiente

        /*if($request->Empresa=='0' || $request->Empresa==null)
            $item->Empresa =  \Auth::user()->Empresa;
        else 
            $item->Empresa=$request->Empresa;
        */
        $item->UsuarioRegistro = \Auth()->user()->id;
        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;

        $item->save();

        Session::flash('info_message', trans('messages.formCreated'));
        $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();
        $cueroRegionalComunidad = CueroRegionalComunidad::orderBy('created_at','desc');
        $cueroRegionalComunidad->where('CueroRegional',$item->id);
        $cueroRegionalComunidad = $cueroRegionalComunidad->get();
        $cueroRegionalAprovechamiento = CueroRegionalAprovechamiento::orderBy('created_at','desc');
        $cueroRegionalAprovechamiento->where('CueroRegional',$item->id);
        $cueroRegionalAprovechamiento = $cueroRegionalAprovechamiento->get();
        $cueroRegionalBeneficio = CueroRegionalBeneficio::orderBy('created_at','desc');
        $cueroRegionalBeneficio->where('CueroRegional',$item->id);
        $cueroRegionalBeneficio = $cueroRegionalBeneficio->get();
        $empresa = ['0' => 'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->where('Estado',1)->lists('Empresa','id')->toArray();

        
        $cueroRegional = CueroRegional::findOrFail($item->id);
        return view('cueroregional.formulario2',compact('cueroRegional', 'departamento', 'cueroRegionalComunidad', 'cueroRegionalAprovechamiento', 'cueroRegionalBeneficio', 'empresa'));
    }

     
    

    
    /**
    *adicionar ultimos campos, a registro ya existente
    *
    **/
        public function storeCamposExtras(Request $request)
        {

          if($request->cueroRegional != "" || $request->cueroRegional != null)
          {        

          $cueroRegional = CueroRegional::findOrFail($request->cueroRegional);
          $cueroRegional->MotivoRechazo = $request->MotivoRechazo;
          $cueroRegional->InformacionRechazo = $request->InformacionRechazo;
          $cueroRegional->Observaciones = $request->Observaciones;
          $cueroRegional->save();

          Session::flash('flash_message', 'Formulario successfully created!');
          }
          return redirect('cueroregional');
          //return redirect('formulario');
        }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();
        $cueroRegionalComunidad = CueroRegionalComunidad::orderBy('created_at','desc');
        $cueroRegionalComunidad->where('CueroRegional',$id);
        $cueroRegionalComunidad = $cueroRegionalComunidad->get();

        $cueroRegionalAprovechamiento = CueroRegionalAprovechamiento::orderBy('created_at','desc');
        $cueroRegionalAprovechamiento->where('CueroRegional',$id);
        $cueroRegionalAprovechamiento = $cueroRegionalAprovechamiento->get();

        $cueroRegionalBeneficio = CueroRegionalBeneficio::orderBy('created_at','desc');
        $cueroRegionalBeneficio->where('CueroRegional',$id);
        $cueroRegionalBeneficio = $cueroRegionalBeneficio->get();

        $cueroRegional = CueroRegional::findOrFail($id);
        $empresa = ['0' => 'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->where('Estado',1)->lists('Empresa','id')->toArray();
        
        return view('cueroregional.formulario2',compact('cueroRegional', 'departamento', 'cueroRegionalComunidad', 'cueroRegionalAprovechamiento', 'cueroRegionalBeneficio', 'empresa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
      $cueroRegional = CueroRegional::findOrFail($id);
      $cueroRegional->update($request->all());

      Session::flash('flash_message', 'Reporte successfully updated!');
      $cueroRegional = CueroRegional::orderBy('FechaRegistro','desc');

      $cueroRegional->where('Empresa',\Auth::user()->Empresa);
      $cueroRegional = $cueroRegional->get();

      return view('cueroregional.index', compact('cueroRegional'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        dd('danguerus',$id);
        CueroRegional::destroy($id);
        Session::flash('flash_message', 'Reporte Regional successfully deleted!');
        return redirect('cueroregional');
    }

   public function imprimir($id){
        $cueroRegional = CueroRegional::findOrFail($id);
        $jasperReportFile = storage_path('reports/').'Cueroregional.jasper';
        $fileExtension = 'pdf';
        $basePath = storage_path('documents/');
        $database = \Config::get('database.connections.mysql');
        $fileName = str_replace(' ','_',$cueroRegional->Regional);
        $outPutFileName =str_replace(' ','_',$cueroRegional->Regional) . '.pdf';

        $parameterMap = array('idReporte'=>$cueroRegional->id,
                              'Logo'=>asset('/images/logo.png'),
                              'LogoBolivia'=>asset('/images/logoBolivia.png'));
     if(!\File::exists($basePath.$fileName.'.'.$fileExtension)){
          $jasper = \JasperPHP::process(
            $jasperReportFile,
            $basePath.$fileName,
            array($fileExtension),
            $parameterMap,
            $database,
            false,
            false);
          //dd($jasper->output());
          $jasper->execute();
        }
    else{
          \Storage::disk('documents')->delete($fileName.'.'.$fileExtension);
          $this->imprimir($cueroRegional->id);
          //dd("aca3");
        }
    return response()->download($basePath.$fileName.'.'.$fileExtension,$outPutFileName);
    }

    public function cambiaEstado(Request $request){
        if($request->EstadoFormulario>0){
            $formulario = Formulario::findOrFail($request->Formulario);
            $formulario->EstadoFormulario = $request->EstadoFormulario;
            $formulario->save();
            return response()->json(['message'=>'Estado Actualizado, refresque la página','status'=>'ACK']);
        }
        else {
            return response()->json(['message'=>'Debe Seleccionar un Estado','status'=>'NACK']);
            # code...
        }
    }
}
