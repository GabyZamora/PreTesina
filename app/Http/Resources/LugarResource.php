<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class LugarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Nombre' => Str::of($this->nombre),
            'Descripción' => $this->descripcion,
            'URL de foto' => $this->urlfoto,
            'Categoria' => new CategoriaResource($this->Categoria),
            'Precio' => $this->precio,
            'Estado' => $this->estado,
            'Número de Huéspedes' => $this->numHuesped,

            /*'ingreso' => $this->created_at->format('d-m-Y'),
            'modificacion' => $this->updated_at->format('d-m-Y')*/
        ];
    }

    public function with($request)
    {
        return[
            'res' => true
        ];
    }
}
