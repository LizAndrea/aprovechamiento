<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EmpresaPermiso;
use App\Empresa;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EmpresaPermisoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($empresa)
    {
        $empresa = Empresa::findOrFail($empresa);
        $empresaPermiso = $empresa->susEmpresaPermiso;
        return view('empresapermiso.index', compact('empresaPermiso','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($empresa)
    {
        $empresa = Empresa::findOrFail($empresa);
        return view('empresapermiso.create',compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'EmpresaPermiso' => 'required',
            'FechaEmision' => 'required|date',
            'FechaVencimiento' => 'required|date|after:FechaEmision' 
            );

        $this->validate($request,$rules);

        $item = new EmpresaPermiso();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('EmpresaPermiso');
        $item->Empresa = $request->Empresa;
        $item->EmpresaPermiso = $request->EmpresaPermiso;
        $item->FechaEmision = $request->FechaEmision;
        $item->FechaVencimiento = $request->FechaVencimiento;
        $item->Vigente = $request->Vigente == '1' ? true : false;
        $item->Observaciones = $request->Observaciones;
        if(\Input::file('File')){
            $fileType = strtolower(\Input::file('File')->getClientOriginalExtension());
            $outPutFileName = \Input::file('File')->getClientOriginalName();
            $fileName = md5(trim(uniqid().$request->EmpresaPermiso));
            
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
        return redirect()->route('listEmpresaPermiso',$empresa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $empresaPermiso = EmpresaPermiso::findOrFail($id);
        return view('empresapermiso.show', compact('empresaPermiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $empresaPermiso = EmpresaPermiso::findOrFail($id);

        return view('empresapermiso.edit', compact('empresaPermiso'));
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
            'EmpresaPermiso' => 'required',
            'FechaEmision' => 'required|date',
            'FechaVencimiento' => 'required|date|after:FechaEmision' 
            );

        $this->validate($request,$rules);

        $item = EmpresaPermiso::findOrFail($id);
        $item->version = AppTools::setVersion('EmpresaPermiso',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('EmpresaPermiso');
        $item->EmpresaPermiso = $request->EmpresaPermiso;
        $item->FechaEmision = $request->FechaEmision;
        $item->FechaVencimiento = $request->FechaVencimiento;
        $item->Vigente = $request->Vigente == '1' ? true : false;
        $item->Observaciones = $request->Observaciones;
        if(\Input::file('File')){
           
           $basePath = storage_path('documents/');
           $fileName = $item->FileName != null ? $item->FileName.'.'.$item->FileType : 'z.pdf'; 
           if(\File::exists($basePath.$fileName))
                \Storage::disk('documents')->delete($fileName);

           $fileType = strtolower(\Input::file('File')->getClientOriginalExtension());
           $outPutFileName = \Input::file('File')->getClientOriginalName();
           $fileName = md5(trim(uniqid().$request->EmpresaPermiso));

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
        return redirect()->route('listEmpresaPermiso',$empresa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $empresaPermiso = EmpresaPermiso::findOrFail($id);
        $empresa = $empresaPermiso->esEmpresa;

        $basePath = storage_path('documents/');
        $fileName = $empresaPermiso->FileName != null ? $empresaPermiso->FileName.'.'.$empresaPermiso->FileType : 'z.pdf'; 

        if(\File::exists($basePath.$fileName))
            \Storage::disk('documents')->delete($fileName);
        
        EmpresaPermiso::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect()->route('listEmpresaPermiso',$empresa->id);
    }

    public function download($id)
    {
        $empresaPermiso = EmpresaPermiso::findOrFail($id);
        $basePath = storage_path('documents/');
        $fileName = $empresaPermiso->FileName;
        $extension = $empresaPermiso->FileType;
        $outPutFileName = $empresaPermiso->OutPutFileName;
        return response()->download($basePath.$fileName.'.'.$extension,$outPutFileName);

    }
}
