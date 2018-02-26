<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FormularioDetalle;
use App\Formulario;
use App\UnidadMedida;
use App\TipoProducto;
use App\AppTools;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class FormularioDetalleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($formulario)
    {
        $formulario = Formulario::findOrFail($formulario);
        $formularioDetalle = $formulario->susFormularioDetalle;
        //$formularioDetalle = FormularioDetalle::where('Formulario',$formulario->id)->with('esUnidadMedida')->get();//->susFormularioDetalle;
        //($formularioDetalle);
        $unidadMedida = ['Seleccionar...'] + UnidadMedida::select('id','UnidadMedida')->orderBy('Num','asc')->lists('UnidadMedida','id')->toArray();
        $tipoProducto = ['Seleccionar...'] + TipoProducto::select('id','TipoProducto')->orderBy('Num','asc')->lists('TipoProducto','id')->toArray();

        if($formulario->TipoFormulario == 'C')
            if($formulario->CompraVenta == 'C')
                return view('formulariodetalle.carnecompra',compact('formulario','formularioDetalle')); //Carne Compra
            else
                return view('formulariodetalle.carneventa',compact('formulario','formularioDetalle')); //Carne Venta
        else
            //if($item->CompraVenta == 'C')
                return view('formulariodetalle.productoventa',compact('formulario','formularioDetalle','unidadMedida','tipoProducto')); //Producto Compra
            //else
            //    return view('formulariodetalle.productoventa',compact('formulario','formularioDetalle')); //Producto Venta
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('formulariodetalle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $item = new FormularioDetalle();
        $item->version = AppTools::setInitialVersion();
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('FormularioDetalle');
        $item->Formulario = $request->Formulario;
        $item->Fecha = $request->Fecha;
        $item->NombreProveedor = $request->NombreProveedor;
        $item->Charque = $request->Charque;
        $item->CarnePrimera = $request->CarnePrimera;
        $item->CarneSegunda = $request->CarneSegunda;
        $item->Precio = $request->Precio;
        $item->totalizaCarne();
        $item->Documento = $request->Documento;
        $item->Observaciones = $request->Observaciones;

        $item->TipoPlato = $request->TipoPlato;
        $item->CantidadPlatos = $request->CantidadPlatos;

        $item->Producto = $request->Producto;
        $item->TipoProducto = $request->TipoProducto;
        $item->CantidadProducto = $request->CantidadProducto;
        $item->UnidadMedida = $request->UnidadMedida;

        $item->CreatorUser = \Auth::user()->email != null ? \Auth::user()->email : null;
        $item->CreatorFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->CreationIP = $request->ip();
        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();      

        $item->save();
        //return "ACK";
        return response()->json(['message'=>'Registro añadido satisfactoriamente' , 'data'=>$item]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $formularioDetalle = FormularioDetalle::findOrFail($id);
        //return view('formulariodetalle.show', compact('formulariodetalle'));
        return response()->json(['message' => 'NACK', 'data'=>$formularioDetalle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $formularioDetalle = FormularioDetalle::findOrFail($id);
        //return view('formulariodetalle.edit', compact('formulariodetalle'));
        return response()->json(['message' => 'NACK', 'data'=>$formularioDetalle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $item = FormularioDetalle::findOrFail($id);
        $item->version = AppTools::setVersion('FormularioDetalle',$item->id);
        $item->Num = $request->has('Num') ? $request->Num : AppTools::setNum('FormularioDetalle');
        $item->Fecha = $request->Fecha;
        $item->NombreProveedor = $request->NombreProveedor;
        $item->Charque = $request->Charque;
        $item->CarnePrimera = $request->CarnePrimera;
        $item->CarneSegunda = $request->CarneSegunda;
        $item->Precio = $request->Precio;
        $item->totalizaCarne();
        $item->Documento = $request->Documento;
        $item->Observaciones = $request->Observaciones;

        $item->TipoPlato = $request->TipoPlato;
        $item->CantidadPlatos = $request->CantidadPlatos;

        $item->Producto = $request->Producto;
        $item->TipoProducto = $request->TipoProducto;
        $item->CantidadProducto = $request->CantidadProducto;
        $item->UnidadMedida = $request->UnidadMedida;

        $item->UpdaterUser = \Auth::user()->email ? \Auth::user()->email : null;
        $item->UpdaterFullName = \Auth::user()->Usuario ? \Auth::user()->Usuario : null;
        $item->UpdaterIP = $request->ip();      

        $item->save();
        //return "ACK";
        $item->with('esUnidadMedida')->get();
        $item = FormularioDetalle::where('id',$item->id)->with('esUnidadMedida','esTipoProducto')->get();
        return response()->json(['message'=>'Registro actualizado satisfactoriamente, actualice la pagina.' , 'data'=>$item]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request,$id)
    {
            FormularioDetalle::destroy($id);
            return response()->json(['message'=>'Registro eliminado correctamente ','data'=>'NoData']);

    }

}
