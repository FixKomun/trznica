<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use Illuminate\Support\Facades\Mail;

class ForgotController extends Controller
{
    public function forgot(ForgotRequest $request)
    {
        $email = $request->input('email');

        if (User::where('email', $email)->doesntExist()) {
            return response([
                'message' => 'Email nepostojećeg korisnika.'
            ], 404);
        };

        $token = Str::random(10);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token
        ]);

        //Slanje maila s tokenom za promjenu lozinke
        Mail::send('Mails.forgot', ['token' => $token], function (Message $message) use ($email) {
            $message->to($email);
            $message->subject('Promjena lozinke WEB TRZNICE');
        });
    }

    public function reset(ResetRequest $request)
    {
        $token = $request->input('token');

        if (!$passwordResets = DB::table('password_resets')->where('token', $token)->first()) {
            return response([
                'message' => 'Neispravan token!'
            ], 400);
        }

        /** @var User $user */

        if (!$user = User::where('email', $passwordResets->email)->first()) {
            return response([
                'message' => 'Email nepostojućeg korisnika'
            ], 404);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return response([
            'message' => 'Uspješno promijenjena lozinka, vraćam vas na početnu stranicu'
        ], 200);
    }
}
