<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function index()
    {
        return View('admin.vehicles.index')
            ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get())
            ->with('units', Unit::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('admin.vehicles.create')
            ->with('units', Unit::get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit_id' => 'required',
            'registration' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-unit/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $vehicle = new Vehicle();
                $vehicle->unit_id = $request->get('unit_id');
                $vehicle->registration = $request->get('registration');
                $vehicle->save();
                flash()->success('Vehicle Registered Successfully');
                return back();
            } else {
                flash()->error('Add Vehicle fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function show($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        if ($vehicle) {
            return view('admin.vehicles.read')->with('vehicles', Vehicle::where('id', $vehicle->id)->orderBy('created_at', 'desc'));
        } else {
            return view('admin.vehicles.read');
        }
    }

    public function edit($id)
    {
        $vehicles = Vehicle::find($id);
        return view('admin.vehicles.edit')->with('vehicles', Vehicle::where('id', $id)->get());
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'unit_id' => 'required',
            'registration' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-vehicle/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $vehicle = Vehicle::findOrFail($id);
                $vehicle->unit_id = $request->get('unit_id');
                $vehicle->registration = $request->get('registration');
                $vehicle->save();
                flash()->success('Vehicle Updated Successfully');
                return back();
            } else {
                flash()->error('Add Vehicle fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        $vehicle->delete();
        flash()->success('Vehicle Deleted Successfully');
        return back();
    }
}
