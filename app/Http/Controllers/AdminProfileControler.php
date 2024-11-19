<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileControler extends Controller
{
    //
    public function index()
    {
        return view('usuario.index');
    }
    public function update(Request $request){
        $user = Auth::user();

        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $path = "/images/".$imageName;
            $user->image = $path;
        }

        $user -> name = $request->name;
        $user -> email = $request->email;
        // $user -> save();

        return redirect()->back();
    }
}
