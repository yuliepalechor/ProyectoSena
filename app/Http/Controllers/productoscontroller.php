<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos_model;  // llamamos el modelo de nuestra tabal
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;
class productoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos=productos_model::all();
        return $productos;
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
        ["nombre"=>"required"]
    );
    if(!$validar->fails()){
        $producto = new productos_model();
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->descripcion=$request->descripcion;
        $producto->save();
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
     /*  $productos=DB::table('productos')->where('productos.id','=',$id)->select('productos.id','productos.nombre','productos.precio')->get();
                                     //maneja por setencias
       return $productos;*/
       $producto=productos_model::where('id',$id)->get();  //parte hecho los modelos
          return $producto;

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
        $productos=Productos_model::find($id);
        if(isset($productos)){
            $productos->nombre=$request->nombre;
            $productos->precio=$request->precio;
            $productos->descripcion=$request->descripcion;
            $productos->save();
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
     //find compara los id de los registros//
     
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $productos= Productos_model::find($id);
       if(isset($productos)){
        $productos->delete();
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
        "articulo"=>$productos
       ]);




    }
}
