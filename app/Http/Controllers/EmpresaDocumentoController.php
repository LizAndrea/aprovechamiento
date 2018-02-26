<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EmpresaDocumento;
use App\TipoDocumento;
use App\Empresa;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EmpresaDocumentoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($empresa)
    {
        $empresa = Empresa::findOrFail($empresa);
        $empresaDocumento = $empresa->susEmpresaDocumento;
        return view('empresadocumento.index', compact('empresaDocumento','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($empresa)
    {
        $tipoDocumento = ['0' => 'Seleccionar...'] + TipoDocumento::select('id','TipoDocumento')->orderBy('Num','asc')->lists('TipoDocumento','id')->toArray();
        $empresa = Empresa::findOrFail($empresa);
        return view('empresadocumento.create',compact('empresa','tipoDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $rules = array(
            'EmpresaDocumento' => 'required',
            'Fecha' => 'required|date',
            'TipoDocumento' => 'required|numeric|not_in:0' 
            );

        $this->validate($request,$rules);

        $item = new EmpresaDocumento();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('EmpresaDocumento');
        $item->Empresa = $request->Empresa;
        $item->EmpresaDocumento = $request->EmpresaDocumento;
        $item->TipoDocumento = $request->TipoDocumento;
        $item->Fecha = $request->Fecha;
        $item->FechaVencimiento = $request->FechaVencimiento;
        $item->Notas = $request->Notas;
        if(\Input::file('File')){
            $fileType = strtolower(\Input::file('File')->getClientOriginalExtension());
            $outPutFileName = \Input::file('File')->getClientOriginalName();
            $fileName = md5(trim(uniqid().$request->EmpresaDocumento));
            
            \Storage::disk('documents')->put($fileName.'.'.$fileType,file_get_contents($request->file('File')->getRealPath()));
            $item->FileName = $fileName;
            $item->OutPutFileName = $outPutFileName;
            $item->FileType = $fileType;
        }
        else{
            $item->FileName = null;
            $item->OutPutFileName = null;
            $item->FileType = null;
          }

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        $empresa = $item->esEmpresa;

        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect()->route('listEmpresaDocumento',$empresa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $empresaDocumento = EmpresaDocumento::findOrFail($id);

        return view('empresadocumento.show', compact('empresaDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoDocumento = ['0' => 'Seleccionar...'] + TipoDocumento::select('id','TipoDocumento')->orderBy('Num','asc')->lists('TipoDocumento','id')->toArray();
        $empresaDocumento = EmpresaDocumento::findOrFail($id);
        return view('empresadocumento.edit', compact('empresaDocumento','tipoDocumento'));
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
            'EmpresaDocumento' => 'required',
            'Fecha' => 'required|date',
            //'FechaVencimiento'=>'required|date|after:Fecha',
            'TipoDocumento' => 'required|numeric|not_in:0' 
            );

        $this->validate($request,$rules);
        
        $item = EmpresaDocumento::findOrFail($id);
        $item->version = AppTools::setVersion('EmpresaDocumento',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('EmpresaDocumento');
        $item->EmpresaDocumento = $request->EmpresaDocumento;
        $item->Fecha = $request->Fecha;
        $item->FechaVencimiento = $request->FechaVencimiento;
        $item->TipoDocumento = $request->TipoDocumento;
        $item->Notas = $request->Notas;
        if(\Input::file('File')){
           
           $basePath = storage_path('documents/');
           $fileName = $item->FileName != null ? $item->FileName.'.'.$item->FileType : 'z.pdf'; 
           if(\File::exists($basePath.$fileName))
                \Storage::disk('documents')->delete($fileName);

           $fileType = strtolower(\Input::file('File')->getClientOriginalExtension());
           $outPutFileName = \Input::file('File')->getClientOriginalName();
           $fileName = md5(trim(uniqid().$request->EmpresaDocumento));

           \Storage::disk('documents')->put($fileName.'.'.$fileType,file_get_contents($request->file('File')->getRealPath()));
           $item->FileName = $fileName;
           $item->OutPutFileName = $outPutFileName;
           $item->FileType = $fileType;
        }
        
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        $empresa = $item->esEmpresa;

        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect()->route('listEmpresaDocumento',$empresa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $empresaDocumento = EmpresaDocumento::findOrFail($id);
        $empresa = $empresaDocumento->esEmpresa;

        $basePath = storage_path('documents/');
        $fileName = $empresaDocumento->FileName != null ? $empresaDocumento->FileName.'.'.$empresaDocumento->FileType : 'z.pdf'; 

        if(\File::exists($basePath.$fileName))
            \Storage::disk('documents')->delete($fileName);
        
        EmpresaDocumento::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect()->route('listEmpresaDocumento',$empresa->id);
    }

    public function download($id)
    {
        $empresaDocumento = EmpresaDocumento::findOrFail($id);
        $basePath = storage_path('documents/');
        $fileName = $empresaDocumento->FileName;
        $extension = $empresaDocumento->FileType;
        $outPutFileName = $empresaDocumento->OutPutFileName;
        return response()->download($basePath.$fileName.'.'.$extension,$outPutFileName);

    }
}
