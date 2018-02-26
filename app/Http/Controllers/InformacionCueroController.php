<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empresa;
use App\AppTools;
use App\Red;
use App\TipoActividad;
use App\TipoEmpresa;
use App\Departamento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class InformacionCueroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('informacioncuero.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      $red = ['0' => 'Seleccionar...'] + Red::select('id','Red')->orderBy('Num','asc')->lists('Red','id')->toArray();
      $tipoActividad = ['0' => 'Seleccionar'] + TipoActividad::select('id',\DB::raw('concat(Codigo," - ",TipoActividad) as TipoActividad'))->orderBy('Num','asc')->lists('TipoActividad','id')->toArray();
      $tipoEmpresa = ['0' => 'Seleccionar...'] + TipoEmpresa::select('id','TipoEmpresa')->orderBy('Num','asc')->lists('TipoEmpresa','id')->toArray();
      $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();

        return view('empresa.create',compact('red','tipoActividad','tipoEmpresa','departamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
      $rules = array(
        'Empresa' => 'required|unique:Empresa,Empresa',
        'NIT' => 'required',
        'Red' => 'required|numeric|not_in:0',
        'TipoActividad' => 'required|numeric|not_in:0',
        'TipoEmpresa' => 'required|numeric|not_in:0',
        'FechaInscripcion' => 'required|date',
        'Departamento' => 'required|numeric|not_in:0',
        'Direccion' => 'required'
        );  
      $this->validate($request,$rules);

        $item = new Empresa();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Empresa');
        $item->Empresa = $request->Empresa;
        $item->NIT = $request->NIT;
        $item->Red = $request->Red;
        $item->TipoActividad = $request->TipoActividad;
        $item->NroSucursal = $request->NroSucursal;
        $item->RepresentanteLegal = $request->RepresentanteLegal;
        $item->TipoEmpresa = $request->TipoEmpresa;
        $item->FechaInscripcion = $request->FechaInscripcion;
        $item->Estado = $request->Estado =='1' ? true : false;
        $item->Departamento = $request->Departamento;
        $item->Direccion = $request->Direccion;
        $item->Telefono = $request->Telefono;
        $item->Email = $request->Email;
        $item->WebPage = $request->WebPage;
        $item->Notas = $request->Notas;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();
        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('empresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $red = ['0' => 'Seleccionar...'] + Red::select('id','Red')->orderBy('Num','asc')->lists('Red','id')->toArray();
        $tipoActividad = ['0' => 'Seleccionar'] + TipoActividad::select('id',\DB::raw('concat(Codigo," - ",TipoActividad) as TipoActividad'))->orderBy('Num','asc')->lists('TipoActividad','id')->toArray();
        $tipoEmpresa = ['0' => 'Seleccionar...'] + TipoEmpresa::select('id','TipoEmpresa')->orderBy('Num','asc')->lists('TipoEmpresa','id')->toArray();
        $departamento = ['0' => 'Seleccionar...'] + Departamento::select('id','Departamento')->orderBy('Num','asc')->lists('Departamento','id')->toArray();

        $empresa = Empresa::findOrFail($id);
        return view('empresa.edit', compact('empresa','red','tipoActividad','tipoEmpresa','departamento'));
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
        'Empresa' => 'required|unique:Empresa,Empresa,' . $id,
        'NIT' => 'required',
        'Red' => 'required|numeric|not_in:0',
        'TipoActividad' => 'required|numeric|not_in:0',
        'TipoEmpresa' => 'required|numeric|not_in:0',
        'FechaInscripcion' => 'required|date',
        'Departamento' => 'required|numeric|not_in:0',
        'Direccion' => 'required'
        );  
      $this->validate($request,$rules);

        $item = Empresa::findOrFail($id);
        $item->version = AppTools::setVersion('Empresa',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Empresa');
        $item->Empresa = $request->Empresa;
        $item->NIT = $request->NIT;
        $item->Red = $request->Red;
        $item->TipoActividad = $request->TipoActividad;
        $item->NroSucursal = $request->NroSucursal;
        $item->RepresentanteLegal = $request->RepresentanteLegal;
        $item->TipoEmpresa = $request->TipoEmpresa;
        $item->FechaInscripcion = $request->FechaInscripcion;
        $item->Estado = $request->Estado =='1' ? true : false;
        $item->Departamento = $request->Departamento;
        $item->Direccion = $request->Direccion;
        $item->Telefono = $request->Telefono;
        $item->Email = $request->Email;
        $item->WebPage = $request->WebPage;
        $item->Notas = $request->Notas;
        
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();
        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Empresa::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect('empresa');
    }

    public function imprimir($id){
        $empresa = Empresa::findOrFail($id);
        $jasperReportFile = storage_path('reports/').'CaratulaEmpresa.jasper';
        $fileExtension = 'pdf';
        $basePath = storage_path('documents/');
        $database = \Config::get('database.connections.mysql');
        $fileName = str_replace(' ','_',$empresa->Empresa);
        $outPutFileName =str_replace(' ','_',$empresa->Empresa) . '.pdf';

      $parameterMap = array('idEmpresa'=>$empresa->id,
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
          $this->imprimir($empresa->id);
          //dd("aca3");
        }
    return response()->download($basePath.$fileName.'.'.$fileExtension,$outPutFileName);
    }

}
