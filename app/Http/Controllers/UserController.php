<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return View('admin.users.index')
            ->with('users', User::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-user/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user = new User();
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->role = $request->get('role');
                $user->password = bcrypt($request->get('password'));
                $user->save();
                flash()->success('User Registered Successfully');
                return back();
            } else {
                flash()->error('Add user fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            return view('admin.users.read')->with('users', User::where('id', $user->id)->orderBy('created_at', 'desc'));
        } else {
            return view('admin.users.read');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('users', User::where('id', $id)->get());
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-user-dev/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user = User::findOrFail($id);
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->role = $request->get('role');
                $user->password = bcrypt($request->get('password'));
                $user->save();
                flash()->success('User Registered Successfully');
                return back();
            } else {
                flash()->error('Add user fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        flash()->success('User Deleted Successfully');
        return back();
    }
}
