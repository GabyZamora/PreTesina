<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Lugar;
use App\Models\Estado;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Auth;

class ReservaController extends Controller
{
    public function index(Request $request){

        $reservas = Reserva::all();
        return view("host.reserva.index", compact('reservas'));

    }

    public function create(Request $request){

        $lugar = Lugar::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('host.reserva.create',compact("lugar"));       
    }

    public function store(Request $request){
        $reserva = new Reserva($request->all());

        if($request->estado_id){
            $reserva->estado_id = 1; 
        }else{
            $reserva->estado_id = 2;
        }

        $reserva->user_id   = Auth::user()->id;
        $reserva->save();
        return redirect('/host/reserva');
    }

    public function edit($id){
        $reserva = Reserva::findOrFail($id);
        $lugar = Lugar::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('host.reserva.edit',compact('reserva', "lugar"));
    }

    public function update(Request $request,$id){
        
        $reserva = Reserva::findOrFail($id);
        $reserva->fill($request->all());

        if($request->estado_id){
            $reserva->estado_id = 2; 
        }else{
            $reserva->estado_id = 1;
        }

        $reserva->save();
        return redirect('/host/reserva');    
    }

    public function destroy($id){
        $reserva = Reserva::findOrFail($id);

        $reserva->delete();
        return redirect('/host/reserva');
    }
}
