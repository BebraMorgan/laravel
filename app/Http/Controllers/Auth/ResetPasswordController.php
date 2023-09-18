<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Password;
use Psy\Util\Str;
use function Symfony\Component\String\b;

class ResetPasswordController extends Controller
{
    public function update() {
        $token = Auth::user()->getRememberToken();
        return view('auth.passwords.reset', compact('token'));
    }

    public function reset(Request $request) {
        $request->validate([
            'token' => 'required',
            'phone' => 'required|string|min:11|max:11',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('phone', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' =>  Hash::make($password),
                ])->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));
            }
        );
        if($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($status));
        }
        return back()->withInput($request->only('phone'))->withErrors(
            ['email' => trans($status)]
        );
    }
}
