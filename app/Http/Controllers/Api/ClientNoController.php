<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientNoController extends Controller
{
    /**
     * Get projects with no clients.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProjectsWithNoClients()
    {
        $projects = DB::table('projects as p')
        ->leftJoin('client_projects as cp', 'p.id', '=', 'cp.project_id')
        ->select('p.name as project_name', DB::raw('COUNT(cp.client_id) as number_of_clients'))
        ->groupBy('p.id', 'p.name')
        ->havingRaw('COUNT(cp.client_id) > 0')
        ->get();

    return response()->json($projects);
    }
}
