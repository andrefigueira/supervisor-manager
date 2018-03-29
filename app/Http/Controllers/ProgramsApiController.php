<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProgramsApiController extends Controller
{
    public function index()
    {
        $programs = Program::all();

        return new JsonResponse($programs);
    }
}
