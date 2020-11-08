<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        // validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);
        if (empty($request->email) && empty($request->password)) {
            flash()->error('Empty Fields! Provide username and password to Login');
            return back();
        } elseif ($validator->fails()) {
            flash()->error('Make sure Email is valid and has correct format and Password has Minimum of 6 charcters');
            return back();
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                flash()->success('Login Successful');

                return redirect('/admin-dash');
            } elseif (!Auth::attempt()) {
                flash()->error('Wrong credentials! check username and password and try again');
                return redirect('/login');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('data');
        return redirect('login');
    }
}
