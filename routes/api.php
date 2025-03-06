<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientProjectController;
use App\Http\Controllers\Api\ClientNoController;

Route::get('/clients-with-projects', [ClientProjectController::class, 'getClientsWithProjects']);
Route::get('/projects-with-no-clients', [ClientNoController::class, 'getProjectsWithNoClients']);
