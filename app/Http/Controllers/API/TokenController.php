<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;

class TokenController extends Controller
{
    public function store()
    {
        $token = new Token();
        $token = $token->generate();

        return response()->json($token, 201); //created
    }
}
