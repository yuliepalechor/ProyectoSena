<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//me llama al modelo creado Perfil
use App\Models\Perfil;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;

class Perfilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Perfil=Perfil::all();//traigame todo lo que tiene perfil
        return $Perfil;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validar=Validator::make($request->all(),
        ["telefono"=>"required"]
    );
    if(!$validar->fails()){
        $perfil = new Perfil();
        $perfil->nombre=$request->nombre;
        $perfil->descripcion=$request->descripcion;
        $perfil->telefono=$request->telefono;
        $perfil->intereses=$request->intereses;
        $perfil->save();
        return response()->json([
            'mensaje'=> "corectamente guardado"
        ]);
  

    }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $perfil=Perfil::where('id',$id)->get();  //parte hecho los modelos
        return $perfil;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion= Validator::make($request->all(),[
            "descripcion"=>'required'
         ]);
         if(!$validacion->fails()) {
            $perfil=Perfil::find($id);
            if(isset($perfil)){
                $perfil->nombre=$request->nombre;
                $perfil->descripcion=$request->descripcion;
                $perfil->telefono=$request->telefono;
                $perfil->intereses=$request->intereses;
                $perfil->save();
                return response()->json([
                    "mensaje"=>"el producto fue actualizado"
                 ]); 
            }else{
                return response()->json([
                    "mensaje"=>"error no fue actualizado"
                ]);  
            }
            
         }else{
            return response()->json([
                "error validacion incorrecta"
                //cuando esta vacia//
            ]);
         }  








    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfil= Perfil::find($id);
       if(isset($perfil)){
        $perfil->delete();
        return response()->json([
            "mensaje"=>"registro borrado exitosamente",
        ]);  
        
       }
       else{
        return response()->json([
            "mensaje"=>"registro no enontrado",
        ]);  
       }
       return response()->json([
        "mensaje"=>"estoy en el destroy",
        "id"=>$id,
        "perfil"=>$perfil
       ]);






    }
}
