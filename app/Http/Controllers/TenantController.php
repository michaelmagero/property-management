<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Tenant;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    public function index()
    {
        return View('admin.tenants.index')
            ->with('tenants', Tenant::orderBy('created_at', 'desc')->get())
            ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get())
            ->with('units', Unit::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('admin.tenants.create')
            ->with('units', Unit::get());
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'unit_no' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-unit/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $tenant = new Tenant();
                $tenant->name = $request->get('name');
                $tenant->middlename = $request->get('middlename');
                $tenant->lastname = $request->get('lastname');
                $tenant->unit_no = $request->get('unit_no');
                $tenant->email = $request->get('email');
                $tenant->phone = $request->get('phone');
                $tenant->save();

                DB::update("update units set tenant_id = '$tenant->id' where unit_no = ?", [$tenant->unit_no]);

                flash()->success('Tenant Registered Successfully');
                return back();
            } else {
                flash()->error('Add Tenant fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function show($id)
    {
        $tenant = Tenant::where('id', $id)->first();
        if ($tenant) {
            return view('admin.tenants.read')->with('users', Tenant::where('id', $tenant->id)->orderBy('created_at', 'desc'));
        } else {
            return view('admin.tenants.read');
        }
    }

    public function edit($id)
    {
        $tenant = Tenant::find($id);
        return view('admin.tenants.edit')->with('tenants', Tenant::where('id', $id)->get());
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('edit-tenant/' . $id)
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $user = Tenant::findOrFail($id);
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->phone = $request->get('phone');
                $user->company = $request->get('company');
                $user->role = 'seller';
                $password = $request->get('password');
                $confirm_password = $request->get('password_confirmation');
                if ($password != $confirm_password) {
                    flash()->error('Passwords Dont Match! Check passwords and try again');
                    return back();
                } else {
                    $user->password = bcrypt($request->get('password'));
                }
                $user->save();
                flash()->success('Update Successful');
                return back();
            }
        }
    }

    public function destroy($id)
    {
        $tenant = Tenant::where('id', $id)->first();
        $tenant->delete();
        flash()->success('Tenant Deleted Successfully');
        return back();
    }
}
