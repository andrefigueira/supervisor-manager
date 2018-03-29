<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServersApiController extends Controller
{
    public function index()
    {
        $servers = Server::all();

        return new JsonResponse($servers);
    }
}
