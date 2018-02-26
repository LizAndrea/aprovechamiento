<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Formulario;
use App\Empresa;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class FormularioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $formulario = Formulario::orderBy('Fecha','desc');
            if(\Auth::user()->esRol->SoloEmpresa)
                $formulario->where('Empresa',\Auth::user()->Empresa);
        $formulario = $formulario->get();
        return view('formulario.index', compact('formulario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($tipo)
    {
        $empresa =  ['0'=>'Seleccionar...'] + Empresa::select('id','Empresa')->activo()->orderBy('Empresa','asc')->lists('Empresa','id')->toArray();

        switch ($tipo) {
            case 'C': //Carne
                return view('formulario.carne',compact('empresa'));
                break;
            case 'P': //Producto
                return view('formulario.producto',compact('empresa'));
            default:
                dd("opción no válida");
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'CompraVenta' => 'required',
            'Fecha' =>'required|date'
        );
        $this->validate($request,$rules);

        $item = new Formulario();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Formulario');
        $item->Fecha = $request->Fecha;
        $item->NumeroFormulario = $request->NumeroFormulario;
        $item->generaCodigo();
        $item->TipoFormulario = $request->TipoFormulario;
        $item->CompraVenta = $request->CompraVenta;
        $item->EstadoFormulario = 1; //se crea con estado pendiente
        if($request->Empresa=='0' || $request->Empresa==null)
            $item->Empresa =  \Auth::user()->Empresa;
        else 
            $item->Empresa=$request->Empresa;
        $item->UsuarioRegistro = \Auth()->user()->id;
        $item->UsuarioVerifica = null;
        $item->UsuarioAprueba = null;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();      

        $item->save();

        Session::flash('info_message', trans('messages.formCreated'));
        return redirect()->route('listFormularioDetalle',$item->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $formulario = Formulario::findOrFail($id);
        return view('formulario.show', compact('formulario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $formulario = Formulario::findOrFail($id);

        return view('formulario.edit', compact('formulario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $formulario = Formulario::findOrFail($id);
        $formulario->update($request->all());

        Session::flash('flash_message', 'Formulario successfully updated!');

        return redirect('formulario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Formulario::destroy($id);
        Session::flash('flash_message', 'Formulario successfully deleted!');

        return redirect('formulario');
    }

    public function imprimir($id){
      $formulario = Formulario::findOrFail($id);
      if($formulario->TipoFormulario=='C') //Carne
            if($formulario->CompraVenta=='C')//Compra
                $jasperReportFile = storage_path('reports/').'CarneCompra.jasper';
            else
                $jasperReportFile = storage_path('reports/').'CarneVenta.jasper';
        else //Producto
            //if($formulario->CompraVenta=='C')//Compra
                $jasperReportFile = storage_path('reports/').'ProductoVenta.jasper';
            //else
             //   $jasperReportFile = storage_path('reports/').'PeriodoCursoEstudianteBoletin.jasper';

      $fileExtension = 'pdf';
      $basePath = storage_path('documents/');
      $database = \Config::get('database.connections.mysql');

      $fileName = $formulario->Formulario;
      $outPutFileName = $formulario->NumeroFormulario . ' - ' . $formulario->esEmpresa->Empresa.'.pdf';

      $parameterMap = array('idFormulario'=>$formulario->id,
                            'Logo'=>asset('/images/logo.png'),
                            'LogoBolivia'=>asset('/images/logoBolivia.png'));
      //dd(!\File::exists($basePath.$fileName));
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
          $this->imprimir($formulario->id);
          //dd("aca3");
        }
    return response()->download($basePath.$fileName.'.'.$fileExtension,$outPutFileName);
    }

    public function descargar($id){
      $formulario = Formulario::findOrFail($id);
      
      $fileExtension = 'pdf'; 
      $basePath = storage_path('documents/');
      $database = \Config::get('database.connections.mysql');

      $fileName = $formulario->Formulario;
      $outPutFileName = 'formulario.pdf';
      $aux=2;

      //dd(!\File::exists($basePath.$fileName));
     
    return response()->download($basePath.'Formulario'.$id.'.'.$fileExtension,$outPutFileName);
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
