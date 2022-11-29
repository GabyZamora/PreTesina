<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Image;

class UserController extends Controller
{
    public function index(Request $request){

        $busqueda =  $request->busqueda;
        $users = User::where('name','LIKE','%'.$busqueda.'%')
        ->paginate(2);
        return view("admin.user.index", compact('users','busqueda'));

    }

    public function store(Request $request){
        $user = new user($request->all());

        if($request->hasFile('urlfoto')){

            $imagen = $request->file('urlfoto');
            $nuevonombre = 'user_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(500,300,function($constraint){ $constraint->upsize(); })->save( public_path('/img/user/'.$nuevonombre));

            $user->urlfoto = $nuevonombre;
        }
        $user->slug     =   Str::slug($request->nombre);
        $user->save();
        return redirect('/admin/user');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request,$id){
        
        $user = User::findOrFail($id);
        //$user->fill($request->all());

        $foto_anterior  =$user->urlfoto;

        if($request->hasFile('urlfoto')){

            $userAnterior = public_path('/img/user/'.$foto_anterior);
            if(file_exists($userAnterior)){ unlink(realpath($userAnterior)); }

            $imagen = $request->file('urlfoto');

            $nuevonombre = 'user_'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())->fit(900,400,function($constraint){ $constraint->upsize(); })->save( public_path('/img/user/'.$nuevonombre));

            $user->urlfoto = $nuevonombre;
        }
        if($request->activo){
            $user->activo = 1;
        }else{
            $user->activo = 0;
        }
        $user->save();
        return redirect('/admin/user');    
    }

}
