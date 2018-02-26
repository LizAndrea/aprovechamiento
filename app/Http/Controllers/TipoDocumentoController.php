<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoDocumento;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoDocumentoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipoDocumento = TipoDocumento::orderBy('Num','asc')->paginate(15);

        return view('tipodocumento.index', compact('tipoDocumento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipodocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'TipoDocumento' => 'required|unique:TipoDocumento,TipoDocumento'
        );        
        
        $this->validate($request,$rules);

        $item = new TipoDocumento();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoDocumento');
        $item->TipoDocumento = $request->TipoDocumento;
        $item->Obligatorio = $request->Obligatorio == '1' ? true : false;
        $item->PublicadoWeb = $request->PublicadoWeb == '1' ? true : false;
        $item->Descripcion = $request->Descripcion;

         if(\Input::file('File')){
            $fileType = strtolower(\Input::file('File')->getClientOriginalExtension());
            $outPutFileName = \Input::file('File')->getClientOriginalName();
            $fileName = md5(trim(uniqid().$request->TipoDocumento));
            
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

        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('tipodocumento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipodocumento.show', compact('tipoDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipodocumento.edit', compact('tipoDocumento'));
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
            'TipoDocumento' => 'required|unique:TipoDocumento,TipoDocumento,' . $id
        );        
        
        $this->validate($request,$rules);

        $item = TipoDocumento::findOrFail($id);
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('TipoDocumento');
        $item->TipoDocumento = $request->TipoDocumento;
        $item->Obligatorio = $request->Obligatorio == '1' ? true : false;
        $item->PublicadoWeb = $request->PublicadoWeb == '1' ? true : false;
        $item->Descripcion = $request->Descripcion;

         if(\Input::file('File')){
           
           $basePath = storage_path('documents/');
           $fileName = $item->FileName != null ? $item->FileName.'.'.$item->FileType : 'z.pdf'; 
           if(\File::exists($basePath.$fileName))
                \Storage::disk('documents')->delete($fileName);

           $fileType = strtolower(\Input::file('File')->getClientOriginalExtension());
           $outPutFileName = \Input::file('File')->getClientOriginalName();
           $fileName = md5(trim(uniqid().$request->TipoDocumento));

           \Storage::disk('documents')->put($fileName.'.'.$fileType,file_get_contents($request->file('File')->getRealPath()));
           $item->FileName = $fileName;
           $item->OutPutFileName = $outPutFileName;
           $item->FileType = $fileType;
        }

        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('tipodocumento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        TipoDocumento::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect('tipodocumento');
    }

    

    public function indexWeb(){
        $tipoDocumento = TipoDocumento::publicadoWeb()->orderBy('Num','asc')->get();
        return view('tipodocumento.indexweb',compact('tipoDocumento'));
    }

    public function download($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);
        $basePath = storage_path('documents/');
        $fileName = $tipoDocumento->FileName;
        $extension = $tipoDocumento->FileType;
        $outPutFileName = $tipoDocumento->OutPutFileName;
        if(\File::exists($basePath.$fileName.'.'.$extension))
            return response()->download($basePath.$fileName.'.'.$extension,$outPutFileName);
        else{
            Session::flash('error_message', trans('messages.fileDeleted'));
            return back();
        }
    }
    public function descargarDocumento($id){
      $formulario = TipoDocumento::findOrFail($id);
      $fileExtension = $formulario->FileType; 
      $basePath = storage_path('documents/');
      $database = \Config::get('database.connections.mysql');

      $fileName = $formulario->Formulario;
      $outPutFileName = $formulario->OutPutFileName.'.'.$fileExtension;
      $aux=2;

      //dd(!\File::exists($basePath.$fileName));
     
    return response()->download($basePath.'DGBAP_documento_'.$id.'.'.$fileExtension,$outPutFileName);
    }
}