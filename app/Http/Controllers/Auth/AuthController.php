<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthUserResource;

class AuthController extends Controller
{
    /**
     * @return JsonResource
     */
    public function getMeInformation(Request $request)
    {
        return new AuthUserResource($request->user());
    }
}
