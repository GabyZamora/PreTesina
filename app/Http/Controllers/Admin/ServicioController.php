<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Str;
use Image;

class servicioController extends Controller
{
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $servicios = Servicio::where('nombre','LIKE','%'.$busqueda.'%')
        ->paginate(5);
        return view("admin.servicio.index", compact('servicios','busqueda'));

    }

    public function create(){
        return view('admin.servicio.create');
    }

    public function store(Request $request){
        $servicio = new servicio($request->all());

        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'servicio_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(200,200,function($constraint){ $constraint->upsize(); })->save( public_path('/img/servicio/'.$nuevonombre));

            $servicio->urlfoto = $nuevonombre;
        }
        $servicio->slug     =   Str::slug($request->nombre);
        $servicio->save();
        return redirect('/admin/servicio');
    }

    public function edit($id){
        $servicio = Servicio::findOrFail($id);
        return view('admin.servicio.edit',compact('servicio'));
    }

    public function update(Request $request,$id){
        
        $servicio = Servicio::findOrFail($id);
        $servicio->fill($request->all());

        $foto_anterior  =$servicio->urlfoto;

        if($request->hasFile('urlfoto')){

            $servicioAnterior = public_path('/img/servicio/'.$foto_anterior);
            if(file_exists($servicioAnterior)){ unlink(realpath($servicioAnterior)); }

            $imagen = $request->file('urlfoto');

            $nuevonombre = 'servicio_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(900,400,function($constraint){ $constraint->upsize(); })->save( public_path('/img/servicio/'.$nuevonombre));

            $servicio->urlfoto = $nuevonombre;
        }
        $servicio->slug     =   Str::slug($request->nombre);
        $servicio->save();
        return redirect('/admin/servicio');    
    }

    public function destroy($id){
        $servicio = Servicio::findOrFail($id);
        $borrar = public_path('/img/servicio'.$servicio->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $servicio->delete();
        return redirect('/admin/servicio');
    }
}
