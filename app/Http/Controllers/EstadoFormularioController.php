<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EstadoFormulario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EstadoFormularioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $estadoformularios = EstadoFormulario::paginate(15);

        return view('estadoformulario.index', compact('estadoformularios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('estadoformulario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        EstadoFormulario::create($request->all());

        Session::flash('flash_message', 'EstadoFormulario successfully added!');

        return redirect('estadoformulario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $estadoformulario = EstadoFormulario::findOrFail($id);

        return view('estadoformulario.show', compact('estadoformulario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $estadoformulario = EstadoFormulario::findOrFail($id);

        return view('estadoformulario.edit', compact('estadoformulario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $estadoformulario = EstadoFormulario::findOrFail($id);
        $estadoformulario->update($request->all());

        Session::flash('flash_message', 'EstadoFormulario successfully updated!');

        return redirect('estadoformulario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        EstadoFormulario::destroy($id);

        Session::flash('flash_message', 'EstadoFormulario successfully deleted!');

        return redirect('estadoformulario');
    }

}
