<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_model;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;

//use Hash;



class Usercontroller extends Controller
{
    
    public function register(Request $request)
    {
       $validacion= Validator::make($request->all(),
       [ "name"=>"required",
         "email"=>"required|email|unique|min:20",
         "password"=>"required|confirmation"]
        );

         
    /* $request->validate([
       "name"=>"required",
       "email"=>"required|email|unique:users",
       "password"=>"required|confirmed"
     ]);*/
   if(!$validacion->fails()){
    $user= new User_model();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);//encriptacion
    $user->save();
    return response()->json([
        
        "mensaje"=>"usuario registardo correctamente",

    ]);
   }else{
    return response()->json([
        "mensaje"=> "eeror registro no guardado"
    ]);
   }
      
    }

       
    
            

















   
}
