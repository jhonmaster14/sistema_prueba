<?php

namespace App\Http\Controllers;


use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
 
    public function index()
    {
 
        $categorias = Categoria::where('estado', 1)->get(); 
 
        return response()->json([
            'success' => true,
            'message' => 'prueba de listado categorías',
            "data"=>$categorias,
            'status'  => 200
        ],200);

    }

  
 
    public function store(Request $request)
    {
 
        $data = json_decode($request->getContent()); 
        $nombre = (isset($data->nombre) && !empty($data->nombre)) ? trim($data->nombre) : '';        
        $categoria= new Categoria();
        $categoria->name=$nombre;
        //$categoria->estado=1;
        $categoria->save();


        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso. Id de la categoría registrada es: '.$categoria->id,
            'status'  => 200
        ],200);

    }
 
 
    public function edit($id)
    {
        $categoria = Categoria::where('id', $id)->first();

        if($categoria){
            return response()->json([
                'success' => true,
                'message' => 'Categoría obtenida',
                "data"=>$categoria,
                'status'  => 200
            ],200);

        }else{
           
            
            return response()->json([
                'success' => true,
                'message' => 'No existen datos',
                "data"=>$categoria,
                'status'  => 200
            ],200);

        }



    }

 
    public function update(Request $request)
    {

        $data = json_decode($request->getContent()); 
        $nombre = (isset($data->nombre) && !empty($data->nombre)) ? trim($data->nombre) : '';    
        $id = (isset($data->id) && !empty($data->id)) ? trim($data->id) : '';    

        $categoria = Categoria::where('id', $id)->first();
        $categoria->name=$nombre;
        $categoria->save();


        return response()->json([
            'success' => true,
            'message' => 'Actualización exitosa. Id de la categoría actualizada es: '.$categoria->id,
            'status'  => 200
        ],200);


    }

 
    public function destroy($id)
    {
        //
        $categoria = Categoria::where('id', $id)->first();
        $categoria->delete();

        return response()->json([
            'success' => true,
            'message' => 'Eliminación exitosa. Id de la categoría eliminada es: '.$categoria->id,
            'status'  => 200
        ],200);
    }




}
