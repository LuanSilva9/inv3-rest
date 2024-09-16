<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Session::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            "name" => "required"
        ]);

        if(Session::insert(["id" => $request->id, "name" => $request->name])) {
            return response()->json([ "Server" => "Sessão Criada ".$request->name]);
        };

        return response()->json([ "Server" => "Erro ao criar Objeto"], 400);
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
        return Session::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id_session = $request->id_session;
        $new_name = $request->new_name;

        $session = Session::find($id_session);

        if(!$session) {
            return response()->json(["Server" => "Sessão Não encontrada"], 404);
        }

        if ($request->has('new_id')) {
            $new_id = $request->new_id;
            
            if (Session::find($new_id)) {
                return response()->json(["Server" => "ID já em uso"], 400);
            }
    
            $session->update(["id" => $new_id]);
            
            return response()->json(["Server" => "ID da sessao Alterado!"]);
        }

        
        if ($request->has('new_name')) {
            $new_name = $request->new_name;

            $session->update(["name" => $new_name]);

            return response()->json(["Server" => "Nome da sessao Alterado!"]);
        }

        return response()->json(["Server" => "Credenciais Invalidas"], 400);
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
    public function destroy(Request $request)
    {
        $id_session = $request->id_session;

        if(Session::destroy($id_session)) {
            return response()->json(["Server" => "Modulo de Sessão destruida com sucesso!"]);
        }

        return response()->json(["Server" => "Credenciais Invalidas"], 500);
    }
}
