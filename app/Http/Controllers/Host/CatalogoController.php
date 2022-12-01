<?php
namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Lugar;
use App\Models\Categoria;
use App\Models\Ruta;
use App\Models\Servicio;
use Illumitate\Support\Str;
use Image;
use Auth;


class CatalogoController extends Controller
{
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $lugars = Lugar::where('nombre','LIKE','%'.$busqueda.'%')
        ->paginate(20);
        return view("host.catalogo.index", compact('lugars','busqueda'));

    }

    public function create(){
        $rutas= Ruta::orderBy('nombre','ASC')->pluck('nombre','id'); 
        $categorias= Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        $servicios = Servicio::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('host.catalogo.create',compact("rutas", "categorias", "servicios"));       
    }

    
    public function store(Request $request){

        $lugar = new Lugar($request->all());

        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'lugar_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(900,400,function($constraint){ $constraint->upsize(); })
            ->save( public_path('/img/lugar/'.$nuevonombre));

            $lugar->urlfoto = $nuevonombre;
        }


        if($request->estado){
            $lugar->estado = 1; 
        }else{
            $lugar->estado = 0;
        }

        $lugar->ruta_id  =   $request->ruta_id;
        $lugar->categoria_id = $request->categoria_id;
        $lugar->user_id   = Auth::user()->id;
        $lugar->save();
        $lugar->Servicio()->attach($request->input('servicios'));
        return redirect('/catalogo');
    }


    public function show($id)
    {
        $lugares = Lugar::find($id);

        return view('host.catalogo.show', compact("lugares"));
    }
}
