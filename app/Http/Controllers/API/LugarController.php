<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarLugarRequest;
use App\Http\Requests\ActualizarLugarRequest;
use App\Http\Resources\LugarResource;
use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LugarResource::collection(Lugar::with(['Categoria'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarLugarRequest $request)
    {
        /*Lugar::create($request->all());
        return response()->json([
            'res'=> true,
            'msg'=>'Lugar guardado correctamente'
        ], 200);*/

        return (new LugarResource(Lugar::create($request->all())))
        ->additional(['msg' => 'Lugar registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lugar $lugar)
    {
        /*return response()->json([
            'res' => true,
            'Lugar' => $lugar
        ], 200);*/

        return new LugarResource($lugar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarLugarRequest $request, Lugar $lugar)
    {
        /*$lugar->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Lugar actualizado correctamente'
        ], 200);*/
        $lugar->update($request->all());
        return (new LugarResource($lugar))
        ->additional(['msg' => 'Lugar actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lugar $lugar)
    {
        /*$lugar->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Lugar eliminado correctamente'
        ], 200);*/
        $lugar->delete();
        return (new LugarResource($lugar))
        ->additional(['msg' => 'Lugar eliminado correctamente']);
    }
}
