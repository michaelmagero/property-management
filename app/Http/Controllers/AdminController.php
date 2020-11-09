<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vehicle;
use App\Http\Controllers\Controller;
use App\Tenant;
use App\Unit;

class AdminController extends Controller
{

    public function login_form()
    {
        return view('auth.login');
    }

    public function index(Request $request)
    {
        $user = $request->user()->role;

        switch ($user) {
            case 'admin':
                return view('admin.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get())
                    ->with('tenants', Tenant::orderBy('created_at', 'desc')->get())
                    ->with('units', Unit::orderBy('created_at', 'desc')->get());
                break;
            default:
                flash()->error('User Does Not Exist!');
                return back();
                break;
        }
    }
}
