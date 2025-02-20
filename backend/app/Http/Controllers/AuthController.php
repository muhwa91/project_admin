<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Member;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login_id = $request->id;
        $login_password = $request->password;      
    }
}
