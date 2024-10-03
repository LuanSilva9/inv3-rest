<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Object
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

        try {
            Session::insert(["name" => $request->name]);

            return response()->json([ "Server" => "Sessão Criada ".$request->name]);

        } catch(\Exception $e) {
            return response()->json([ "Server" => "Erro ao criar Sessão", "error" => $e.getMessage()], 500);
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
        return Session::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_name(Request $request, $id_session)
    {
        $request->validate(['new' => 'required|string|max:255']);
    
        $session = Session::find($id_session);
        if ($session) {
            $session->name = $request->new;
            $session->save();
            return response()->json(["Server" => "Nome atualizado para " . $request->new]);
        }
    
        return response()->json(["Server" => "Sessão não encontrada"], 404);
    }
    
    public function edit_id(Request $request, $id_session)
    {
        $request->validate(['new' => 'required|integer']);
    
        $session = Session::find($id_session);
        if ($session) {
            $newSession = $session->replicate(); 
            $newSession->id = $request->new; 
            $newSession->save(); 
    
            $session->delete();
    
            return response()->json(["Server" => "ID atualizado para " . $request->new]);
        }
    
        return response()->json(["Server" => "Sessão não encontrada"], 404);
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
