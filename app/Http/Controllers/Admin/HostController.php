<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hosts;
use App\Models\Ruta;
use Illuminate\Support\Str;
use Image;
use Auth;

class HostController extends Controller
{
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $hosts = Hosts::where('nombre','LIKE','%'.$busqueda.'%')
        ->paginate(5);
        return view("admin.host.index", compact('hosts','busqueda'));

    }

    public function create(){
        $rutas= Ruta::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('admin.host.create',compact("rutas"));
    }

    public function store(Request $request){
        $host = new Hosts($request->all());

        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'host_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize(); })
            ->save( public_path('/img/host/'.$nuevonombre));

            $host->urlfoto = $nuevonombre;
        }

        if($request->hasFile('urllogo')){

            $imagen = $request->file('urllogo');
            $nuevonombre = 'logo_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(200,200,function($constraint){ $constraint->upsize(); })
            ->save( public_path('/img/host/'.$nuevonombre));

            $host->urllogo = $nuevonombre;
        }

        if($request->estado){
            $host->estado = 1; 
        }else{
            $host->estado = 0;
        }

        $host->ruta_id  =   $request->ruta_id;
        $host->user_id  =   Auth::user()->id;
        $host->slug     =   Str::slug($request->nombre);
        $host->save();
        return redirect('/admin/host');
    }

    public function edit($id){
        $host = Hosts::findOrFail($id);
        $rutas= Ruta::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('admin.host.edit',compact('host',"rutas"));
    }

    public function update(Request $request,$id){
        
        $host = Hosts::findOrFail($id);
        $host->fill($request->all());

        $foto_anterior  =$host->urlfoto;
        $foto_anterior  =$host->urllogo;

        if($request->hasFile('urlfoto')){

            $hostAnterior = public_path('/img/host/'.$foto_anterior);
            if(file_exists($hostAnterior)){ unlink(realpath($hostAnterior)); }

            $imagen = $request->file('urlfoto');

            $nuevonombre = 'host_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(900,400,function($constraint){ $constraint->upsize(); })->save( public_path('/img/host/'.$nuevonombre));

            $host->urlfoto = $nuevonombre;
        }

        if($request->hasFile('urllogo')){

            $hostAnterior = public_path('/img/host/'.$foto_anterior);
            if(file_exists($hostAnterior)){ unlink(realpath($hostAnterior)); }

            $imagen = $request->file('urllogo');

            $nuevonombre = 'logo_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(200,200,function($constraint){ $constraint->upsize(); })
            ->save( public_path('/img/host/'.$nuevonombre));

            $host->urllogo = $nuevonombre;
        }

        if($request->estado){
            $host->estado = 1; 
        }else{
            $host->estado = 0;
        }
        $host->ruta_id  =   $request->ruta_id;
        $host->slug     =   Str::slug($request->nombre);
        $host->save();
        return redirect('/admin/host');    
    }

    public function destroy($id){
        $host = Hosts::findOrFail($id);
        //foto
        $borrar = public_path('/img/host'.$host->urlfoto);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        //logo
        $borrar = public_path('/img/host'.$host->urllogo);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $host->delete();
        return redirect('/admin/host');
    }
}
