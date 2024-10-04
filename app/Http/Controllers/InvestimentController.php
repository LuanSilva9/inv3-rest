<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investiment;

class InvestimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Object
    {
        return Investiment::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            "name_investiment" => "required",
            "current_investiment" => "required",
            "session_id" => "required",
        ]);
    
        try {
        
            Investiment::insert([
                "name_investiment" => $request->name_investiment,
                "current_investiment" => $request->current_investiment,
                "session_id" => $request->session_id,
                "default_color" => $request->default_color
            ]);
    
            return response()->json(["server" => "Dados inseridos com sucesso!"], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                "server" => "Erro ao inserir os dados",
                "error" => $e.getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Investiment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $request->validate([
            "name_investiment" => "required",
            "current_investiment" => "required",
            "session_id" => "required",
            "default_color" => "required",
            "default_icon" => "required"
        ]);

        $finderInvestiment = Investiment::find($request->id);

        if(!$finderInvestiment) return response()->json(["Server" => "Registro não encontrado"], 404);

        if($request->current_value < 0 || $request->current_value > 99999) return response()->json(["Server" => "O valor de investimento não é conhecido"], 400);


        try {
            $finderInvestiment->name_investiment = $request->name_investiment;
            $finderInvestiment->current_investiment = $request->current_investiment;
            $finderInvestiment->default_color = $request->default_color;
            $finderInvestiment->default_icon = $request->default_icon;

            $finderInvestiment->save();

            return response()->json(["Server" => "Registro alterado com sucesso!"]);
        } catch(\Exception $e) {

            return response()->json(["Server" => "Error", "Error" => $e.getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Investiment::find($id)) {
            Investiment::destroy($id);

            return response()->json(["Server" => "O Investimento foi apagado com sucesso!"]);
        }


        return response()->json(["Server" => "Erro ao tentar deletar o investimento"], 500);
    }
}
