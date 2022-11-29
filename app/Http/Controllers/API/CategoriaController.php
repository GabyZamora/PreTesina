<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarCategoriaRequest;
use App\Http\Requests\ActualizarCategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoriaResource::collection(Categoria::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarCategoriaRequest $request)
    {
        /*Categoria::create($request->all());
        return response()->json([
            'res'=> true,
            'msg'=>'Categoria guardado correctamente'
        ], 200);*/

        return (new CategoriaResource(Categoria::create($request->all())))
        ->additional(['msg' => 'Categoria registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        /*return response()->json([
            'res' => true,
            'Categoria' => $categoria
        ], 200);*/

        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarCategoriaRequest $request, Categoria $categoria)
    {
        /*$categoria->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Categoria actualizado correctamente'
        ], 200);*/
        $categoria->update($request->all());
        return (new CategoriaResource($categoria))
        ->additional(['msg' => 'Categoria actualizado correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        /*$categoria->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Categoria eliminado correctamente'
        ], 200);*/
        $categoria->delete();
        return (new CategoriaResource($categoria))
        ->additional(['msg' => 'Categoria eliminado correctamente']);;
    }
}
