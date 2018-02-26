<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Red;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RedController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $red = Red::orderBy('Num','asc')->paginate(15);
        return view('red.index', compact('red'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('red.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $rules = array(
            'Red' => 'required|unique:Red,Red'
            );
        
        $this->validate($request,$rules);

        $item = new Red();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Red');
        $item->Red = $request->Red;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowAdded'));
        return redirect('red');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $red = Red::findOrFail($id);

        return view('red.show', compact('red'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $red = Red::findOrFail($id);

        return view('red.edit', compact('red'));
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
            'Red' => 'required|unique:Red,Red,' . $id
            );
        
        $this->validate($request,$rules);

        $item = Red::findOrFail($id);
        $item->version = AppTools::setVersion('Red',$id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('Red');
        $item->Red = $request->Red;
        
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();
        $item->save();

        Session::flash('info_message', trans('messages.rowUpdated'));
        return redirect('red');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Red::destroy($id);
        Session::flash('info_message', trans('messages.rowDeleted'));
        return redirect('red');
    }

}
