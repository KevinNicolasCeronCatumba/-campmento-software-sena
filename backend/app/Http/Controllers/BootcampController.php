<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
//use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcampRequest;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //metodo json: tramiste response en formato json
        //  parametros: datos a trasmitir
        //              codigo http del response
        return response()->json(["success" => true , "data" => Bootcamp::all()],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        /*1.reglas de validacion 
            $reglas = [
                "name" => "required"
            ];
            //2.crear el obeto validador
            $v = Validator::make($request->all(),$reglas);
            //3.validar
            if($v->fails()){
                //4.si la validacion falla
                return response()->json(
                    [
                        "success" => false,
                        "error" => $v->errors()
                    ],404
                );
            }
        //crear el nuevo Bootcamp
            /*manera 1
            $newBootcamp = new Bootcamp;
            $newBootcamp->name = $request->name;
            $newBootcamp->description = $request->description;
            $newBootcamp->website = $request->website;
            $newBootcamp->phone = $request->phone;
            $newBootcamp->user_id = $request->user_id;
            $newBootcamp->average_rating = $request->average_rating;
            $newBootcamp->average_cost = $request->average_cost;
            $newBootcamp->save();
            return $newBootcamp;*/
            /*manera 2
            return Bootcamp::create($request->all());
            *///MANERA 3
        return response()->json(["success" => true , "data" =>  Bootcamp::create($request->all()) ],201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(["success" => true , "data" => Bootcamp::find($id)],200);
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
        $b = Bootcamp::find($id);
        $b->update($request->all());
        return response()->json(["success" => true , "data" => $b],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = Bootcamp::find($id);
        $b->delete();
        return response()->json(["success" => true , "data" => $b],200);
    }
}
