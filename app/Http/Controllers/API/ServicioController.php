<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarServicioRequest;
use App\Http\Requests\ActualizarServicioRequest;
use App\Http\Resources\ServicioResource;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServicioResource::collection(Servicio::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarServicioRequest $request)
    {
        /*Servicio::create($request->all());
        return response()->json([
            'res'=> true,
            'msg'=>'Servicio guardado correctamente'
        ], 200);*/

        return (new ServicioResource(Servicio::create($request->all())))
        ->additional(['msg' => 'Servicio registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        /*return response()->json([
            'res' => true,
            'Servicio' => $servicio
        ], 200);*/

        return new ServicioResource($servicio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarServicioRequest $request, Servicio $servicio)
    {
        /*$servicio->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Servicio actualizado correctamente'
        ], 200);*/
        $servicio->update($request->all());
        return (new ServicioResource($servicio))
        ->additional(['msg' => 'Servicio actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        /*$servicio->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Servicio eliminado correctamente'
        ], 200);*/
        $servicio->delete();
        return (new ServicioResource($servicio))
        ->additional(['msg' => 'Servicio eliminado correctamente']);;
    }
}
