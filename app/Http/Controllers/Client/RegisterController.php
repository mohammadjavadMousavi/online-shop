<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\OtpMail;
use App\Http\Requests\VerifyOtpRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('client.register.create');
    }


    public function sendMail(Request $request)
    {
        // $this->validate($request,[
        //     'email' => ['required','email']
        // ]);
      
        // $user=User::query()->create([
        //     'email' => $request->get('email'),
        //     'name' => rand(),
        //     'password' => rand(),
        //     'role_id' => 2,
        // ]);

        $user=User::generateOtp($request);

        // auth()->login($user);


        return redirect(route('client.register.otp'));
        // return redirect('/');
    }

    public function otp(User $user) 
    {
        return view('client.register.otp',[
            'user' => $user
        ]);
    }


    public function verifyOtp(VerifyOtpRequest $request,User $user)
    {
        if (!Hash::check($request->get('code'), $user->password)) {
            return back()->withErrors(['otp' => 'کد وارد شده اشتباه است']);
        }

        auth()->login($user);

        return redirect(route('client.index'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->back();
    }
}
