<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->validated();
        if (!Auth::attempt($request->only('phone', 'password'), $request->boolean('remember'))) {
            return back()->withInput()->withErrors(
                [
                    'phone' => 'Неверный логин или пароль'
                ]
            );
        }
        return redirect()->intended();
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect()->route('image.index');
    }

}
