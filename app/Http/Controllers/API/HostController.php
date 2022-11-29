<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarHostRequest;
use App\Http\Requests\ActualizarHostRequest;
use App\Http\Resources\HostResource;
use App\Models\Host;
use Illuminate\Http\Request;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HostResource::collection(Host::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarHostRequest $request)
    {
        /*Host::create($request->all());
        return response()->json([
            'res'=> true,
            'msg'=>'Host guardado correctamente'
        ], 200);*/

        return (new HostResource(Host::create($request->all())))
        ->additional(['msg' => 'Host registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        /*return response()->json([
            'res' => true,
            'Host' => $host
        ], 200);*/

        return new HostResource($host);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarHostRequest $request, Host $host)
    {
        /*$host->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Host actualizado correctamente'
        ], 200);*/
        $host->update($request->all());
        return (new HostResource($host))
        ->additional(['msg' => 'Host actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $host)
    {
        /*$host->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Host eliminado correctamente'
        ], 200);*/
        $host->delete();
        return (new HostResource($host))
        ->additional(['msg' => 'Host eliminado correctamente']);;
    }
}
