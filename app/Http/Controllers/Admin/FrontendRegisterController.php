<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendRegisterController extends Controller
{
    public function FrontendRegister(Request $request){
        $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'email',
            'password' => 'pass',
        ]);
        DB::table('users')->insert([
            'role_id' =>$request->role_id,
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->pass),
            'created_at' => Carbon::now(),
        ]);
        
        return app(RegisterResponse::class);
    }
}
