<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoReporte;
use App\Empresa;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoReporteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipoReporte = TipoReporte::orderBy('Num','asc')->get();
        return view('tiporeporte.index', compact('tipoReporte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tiporeporte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
                
        $rules = array(
            'TipoReporte' => 'required|unique:TipoReporte,TipoReporte',
            'XLSXFileName'=>'required',
            'DefinicionReporte'=>'required'
            );
        $this->validate($request,$rules);

        $item = new TipoReporte();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoReporte');
        $item->TipoReporte = $request->TipoReporte;
        $item->Activo = $request->Activo == '1' ? true : false;
        $item->XLSXFileName = $request->XLSXFileName;
        $item->Requerimientos = $request->Requerimientos;
        $item->Parametros = $request->Parametros;
        $item->DefinicionReporte = $request->DefinicionReporte;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();
        Session::flash('info_message', trans('messages.rowAdded'));

        return redirect('tiporeporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tipoReporte = TipoReporte::findOrFail($id);

        return view('tiporeporte.show', compact('tipoReporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoReporte = TipoReporte::findOrFail($id);

        return view('tiporeporte.edit', compact('tipoReporte'));
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
            'TipoReporte' => 'required|unique:TipoReporte,TipoReporte,'.$id,
            'XLSXFileName'=>'required',
            'DefinicionReporte'=>'required'
            );
        $this->validate($request,$rules);

        $item = TipoReporte::findOrFail($id);
        $item->version = AppTools::setVersion('TipoReporte',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoReporte');
        $item->TipoReporte = $request->TipoReporte;
        $item->Activo = $request->Activo == '1' ? true : false;
        $item->XLSXFileName = $request->XLSXFileName;
        $item->Parametros = $request->Parametros;
        $item->Requerimientos = $request->Requerimientos;
        $item->DefinicionReporte = $request->DefinicionReporte;

        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();
        Session::flash('info_message', trans('messages.rowUpdated'));

        return redirect('tiporeporte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        TipoReporte::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect('tiporeporte');
    }

    public function reporte(){
        $empresa = ['0' => 'Seleccionar...'] + Empresa::select('id','Empresa')->orderBy('Empresa','asc')->lists('Empresa','id')->toArray();
        $tipoReporte = ['0' => 'Seleccionar...'] + TipoReporte::select('id','TipoReporte')->activo()->orderBy('Num','asc')->lists('TipoReporte','id')->toArray();
        return view ('tiporeporte.generate',compact('empresa','tipoReporte'));
    }

    public function genera(Request $request){
        $rules = array(
            'TipoReporte'=>'required|numeric|not_in:0'
            );
        $this->validate($request,$rules);

        $tipoReporte = TipoReporte::findOrFail($request->TipoReporte);
        //Configura parametros
        if(\Auth::user()->esRol->SoloEmpresa)
            $empresa = \Auth::user()->Empresa;
        else if($request->Empresa==0)
            $empresa = '%';
        else
            $empresa = $request->Empresa;
        $desde = $request->Desde != null ? $request->Desde : '1901-01-01';
        $hasta = $request->Hasta != null ? $request->Hasta : '2500-12-31';

        $sql = $tipoReporte->DefinicionReporte;

        $vars = explode(',',$tipoReporte->Parametros);
        if(sizeof($vars>0))
            foreach($vars as $var){
                if($var=='Empresa')
                    $sql = str_replace(':Empresa',"'".$empresa."'",$sql);
                if($var=='Desde')
                    $sql = str_replace(':Desde',"'".$desde."'",$sql);
                if($var=='Hasta')
                    $sql = str_replace(':Hasta',"'".$hasta."'",$sql);
            }
        $sql = str_replace("\r\n",' ', $sql);
        $result = \DB::select($sql);
        $result = json_decode(json_encode((array) $result), true);
        \Excel::create($tipoReporte->XLSXFileName, function($excel) use ($result) {
            $excel->setTitle('Reportes DGBAP')
              ->setCreator('Sistema Approvechamiento')
              ->setCompany('DGBAP')
              ->setDescription('Reportes generador por el Sistema Approvechamiento');

            //dd(array_collapse($result));
            $excel->sheet('Data', function($sheet) use ($result) {
                 $sheet->fromArray($result);
                 $sheet->freezeFirstRow();
                 $sheet->setAutoFilter();
                 $sheet->row(1,function($row){
                    $row->setBackground('#c9c9c9');
                    $row->setFontColor('#000000');
                 });
                
            });
        })->export('xls');
          
    }

    public function generaEmpresa(){
        $jasperReportFile = storage_path('reports/').'EmpresaLista.jasper';
        $fileExtension = 'pdf';
        $basePath = storage_path('documents/');
        $database = \Config::get('database.connections.mysql');
        $fileName = str_replace(' ','_','Empresas');
        $outPutFileName =str_replace(' ','_','Empresas') . '.pdf';

        $parameterMap = array(
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
          $this->generaEmpresa();
          //dd("aca3");
        }
    return response()->download($basePath.$fileName.'.'.$fileExtension,$outPutFileName);
    }
}
