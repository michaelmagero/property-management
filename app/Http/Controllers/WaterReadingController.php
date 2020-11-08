<?php

namespace App\Http\Controllers;

use App\Unit;
use App\WaterReading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WaterReadingController extends Controller
{
    public function index()
    {
        return View('admin.readings.index')
            ->with('readings', WaterReading::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('admin.readings.create')
            ->with('units', Unit::get());
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'unit_id' => 'required',
            'current_readings' => 'required',
            'previous_readings' => 'required',
            'rate' => 'required',
            'month' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-reading/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $reading = new WaterReading();
                $reading->unit_id = $request->get('unit_id');
                $reading->current_readings = $request->get('current_readings');
                $reading->previous_readings = $request->get('previous_readings');
                $reading->rate = $request->get('rate');
                $reading->month = $request->get('month');

                $consumed_units = $reading->current_readings - $reading->previous_readings;
                $total_bill = $consumed_units * $reading->rate;
                $reading->amount = $total_bill;
                $reading->save();
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
        $readings = WaterReading::where('id', $id)->first();
        if ($readings) {
            return view('admin.readings.read')->with('readings', WaterReading::where('id', $readings->id)->orderBy('created_at', 'desc'));
        } else {
            return view('admin.readings.read');
        }
    }

    public function edit($id)
    {
        $readings = WaterReading::find($id);
        return view('admin.readings.edit')->with('readings', WaterReading::where('id', $id)->get());
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'unit_id' => 'required',
            'current_readings' => 'required',
            'previous_readings' => 'required',
            'rate' => 'required',
            'month' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-reading/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $reading = WaterReading::findOrFail($id);
                $reading->unit_id = $request->get('unit_id');
                $reading->current_readings = $request->get('current_readings');
                $reading->previous_readings = $request->get('previous_readings');
                $reading->rate = $request->get('rate');
                $reading->month = $request->get('month');

                $consumed_units = $reading->current_readings - $reading->previous_readings;
                $total_bill = $consumed_units * $reading->rate;
                $reading->amount = $total_bill;
                $reading->save();
                flash()->success('Vehicle Registered Successfully');
                return back();
            } else {
                flash()->error('Add Vehicle fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function destroy($id)
    {
        $readings = WaterReading::where('id', $id)->first();
        $readings->delete();
        flash()->success('Readings Deleted Successfully');
        return back();
    }
}
