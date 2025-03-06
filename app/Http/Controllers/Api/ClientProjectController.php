<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientProjectController extends Controller
{
    public function getClientsWithProjects()
    {
        $results = DB::table('clients as c')
            ->join('client_projects as cp', 'c.id', '=', 'cp.client_id')
            ->join('projects as p', 'cp.project_id', '=', 'p.id')
            ->select('c.name as client_name', 'p.name as project_name')
            ->orderBy('c.name')
            ->get();

        return response()->json($results);
    }
}
