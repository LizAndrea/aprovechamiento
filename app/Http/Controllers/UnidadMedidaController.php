<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UnidadMedida;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UnidadMedidaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $unidadMedida = UnidadMedida::paginate(15);
        return view('unidadmedida.index', compact('unidadMedida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('unidadmedida.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'UnidadMedida' => 'required|unique:UnidadMedida,UnidadMedida'
            );
        $this->validate($request,$rules);

        $item = new UnidadMedida();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('UnidadMedida');
        $item->UnidadMedida = $request->UnidadMedida;
        $item->Equivalencia1 = $request->Equivalencia1;
        $item->Equivalencia2 = $request->Equivalencia2;
        $item->Equivalencia3 = $request->Equivalencia3;
        $item->Equivalencia4 = $request->Equivalencia4;
        $item->Equivalencia5 = $request->Equivalencia5;
        $item->Equivalencia6 = $request->Equivalencia6;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('unidadmedida');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $unidadMedida = UnidadMedida::findOrFail($id);
        return view('unidadmedida.show', compact('unidadMedida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $unidadmedida = UnidadMedida::findOrFail($id);

        return view('unidadmedida.edit', compact('unidadmedida'));
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
            'UnidadMedida' => 'required|unique:UnidadMedida,UnidadMedida,'.$id
            );
        $this->validate($request,$rules);
        
        $item = UnidadMedida::findOrFail($id);

        $item->version = AppTools::setVersion('UnidadMedida',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('UnidadMedida');
        $item->UnidadMedida = $request->UnidadMedida;
        $item->Equivalencia1 = $request->Equivalencia1;
        $item->Equivalencia2 = $request->Equivalencia2;
        $item->Equivalencia3 = $request->Equivalencia3;
        $item->Equivalencia4 = $request->Equivalencia4;
        $item->Equivalencia5 = $request->Equivalencia5;
        $item->Equivalencia6 = $request->Equivalencia6;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('unidadmedida');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        UnidadMedida::destroy($id);

        Session::flash('flash_message', 'UnidadMedida successfully deleted!');

        return redirect('unidadmedida');
    }

}
