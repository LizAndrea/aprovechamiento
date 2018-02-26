<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoEmpresa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoEmpresaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipoempresas = TipoEmpresa::paginate(15);

        return view('tipoempresa.index', compact('tipoempresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipoempresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        TipoEmpresa::create($request->all());

        Session::flash('flash_message', 'TipoEmpresa successfully added!');

        return redirect('tipoempresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tipoempresa = TipoEmpresa::findOrFail($id);

        return view('tipoempresa.show', compact('tipoempresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoempresa = TipoEmpresa::findOrFail($id);

        return view('tipoempresa.edit', compact('tipoempresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $tipoempresa = TipoEmpresa::findOrFail($id);
        $tipoempresa->update($request->all());

        Session::flash('flash_message', 'TipoEmpresa successfully updated!');

        return redirect('tipoempresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        TipoEmpresa::destroy($id);

        Session::flash('flash_message', 'TipoEmpresa successfully deleted!');

        return redirect('tipoempresa');
    }

}
