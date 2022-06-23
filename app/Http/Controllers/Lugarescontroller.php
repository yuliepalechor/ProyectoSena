<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lugares_model;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;

class Lugarescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lugares=Lugares_model::all();//traigame todo lo que tiene LUgares
        return $Lugares;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar=Validator::make($request->all(),
        ["telefono"=>"required"]
    );
    if(!$validar->fails()){
        $Lugares = new Lugares_model();
        $Lugares->nombre=$request->nombre;
        $Lugares->direccion=$request->direccion;
        $Lugares->telefono=$request->telefono;
        $Lugares->correo=$request->correo;
        $Lugares->save();
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
        $Lugares=Lugares_model::where('id',$id)->get();  //parte hecho los modelos
        return $Lugares;
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
            "nombre"=>'required'
         ]);
         if(!$validacion->fails()) {
            $Lugares=Lugares_model::find($id);
            if(isset($Lugares)){
                $Lugares->nombre=$request->nombre;
                $Lugares->direccion=$request->direccion;
                $Lugares->telefono=$request->telefono;
                $Lugares->correo=$request->correo;
                $Lugares->save();
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
        //
        $Lugares= Lugares_model::find($id);
        if(isset($Lugares)){
         $Lugares->delete();
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
         "Lugares"=>$Lugares
        ]);
 



    }
}
