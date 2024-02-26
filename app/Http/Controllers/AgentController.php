<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        // $user = $req->user();

        // if ($user->role_id == 1){
        // }

            $models = Agent::all();
            return view('agent', [
                "title" => "Data Keagenan",
                "agents" => $models
            ]);
            
            // return view('agent', [
            //     "title" => "Data Keagenan",
            //     "agent" => Agent::all()
            // ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Agent $agent)
    {
        // return view('agent', [
        //     "title" => "Single Agent",
        //     "agent" => $agent
        // ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
