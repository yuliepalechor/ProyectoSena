<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos_model;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;

class Eventoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Eventos=Eventos_model::all();//traigame todo lo que tiene perfil
        return $Eventos;
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
        ["nombre_evento"=>"required"]
    );
    if(!$validar->fails()){
        $Eventos = new Eventos_model();
        $Eventos->nombre_evento=$request->nombre_evento;
        $Eventos->fecha_evento=$request->fecha_evento;
        $Eventos->tipo_evento=$request->tipo_evento;
        $Eventos->comentarios_evento=$request->comentarios_evento;
        $Eventos->save();
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

        $Eventos=Eventos_model::where('id',$id)->get();  //parte hecho los modelos
        return $Eventos;

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
        //
        $validacion= Validator::make($request->all(),[
            "fecha_evento"=>'required'
         ]);
         if(!$validacion->fails()) {
            $Eventos=Eventos_model::find($id);
            if(isset($Eventos)){
                $Eventos->nombre_evento=$request->nombre_evento;
                $Eventos->fecha_evento=$request->fecha_evento;
                $Eventos->tipo_evento=$request->tipo_evento;
                $Eventos->comentarios_evento=$request->comentarios_evento;
                $Eventos->save();
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
        $Eventos= Eventos_model::find($id);
        if(isset($Eventos)){
         $Eventos->delete();
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
         "Eventos"=>$Eventos
        ]);




    }
}
