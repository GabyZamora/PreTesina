<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarClienteRequest;
use App\Http\Requests\ActualizarClienteRequest;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClienteResource::collection(Cliente::with(['User'])->get()) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarClienteRequest $request)
    {
        /*Cliente::create($request->all());
        return response()->json([
            'res'=> true,
            'msg'=>'Cliente guardado correctamente'
        ], 200);*/

        return (new ClienteResource(Cliente::create($request->all())))
        ->additional(['msg' => 'Cliente registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        /*return response()->json([
            'res' => true,
            'cliente' => $cliente
        ], 200);*/

        return new ClienteResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarClienteRequest $request, Cliente $cliente)
    {
        /*$cliente->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Cliente actualizado correctamente'
        ], 200);*/
        $cliente->update($request->all());
        return (new ClienteResource($cliente))
        ->additional(['msg' => 'Cliente actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        /*$cliente->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Cliente eliminado correctamente'
        ], 200);*/
        $cliente->delete();
        return (new ClienteResource($cliente))
        ->additional(['msg' => 'Cliente eliminado correctamente']);;
    }
}
