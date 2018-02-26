<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Departamento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class DepartamentoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $departamentos = Departamento::paginate(15);

        return view('departamento.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Departamento::create($request->all());

        Session::flash('flash_message', 'Departamento successfully added!');

        return redirect('departamento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $departamento = Departamento::findOrFail($id);

        return view('departamento.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);

        return view('departamento.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $departamento = Departamento::findOrFail($id);
        $departamento->update($request->all());

        Session::flash('flash_message', 'Departamento successfully updated!');

        return redirect('departamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Departamento::destroy($id);

        Session::flash('flash_message', 'Departamento successfully deleted!');

        return redirect('departamento');
    }

}
