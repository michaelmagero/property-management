<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function users()
    {
        return View('admin.payments.index')
            ->with('payments', Payment::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('admin.payments.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'company' => 'required',
            'phone' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('new-tenant/')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user = new Payment();
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->company = $request->get('company');
                $user->phone = $request->get('phone');
                $user->role = 'seller';
                $user->password = bcrypt(str::random(10));
                $user->save();
                flash()->success('Payment Registered Successfully');
                return back();
            } else {
                flash()->error('Add Payment fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function show($id)
    {
        $payment = Payment::where('id', $id)->first();
        if ($payment) {
            return view('admin.payments.read')->with('payments', Payment::where('id', $payment->id)->orderBy('created_at', 'desc'));
        } else {
            return view('admin.payments.read');
        }
    }

    public function edit($id)
    {
        $payments = Payment::find($id);
        return view('admin.payments.edit')->with('payments', Payment::where('id', $id)->get());
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
            $user = Payment::findOrFail($id);
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
        $payment = Payment::where('id', $id)->first();
        $payment->delete();
        flash()->success('Payment Deleted Successfully');
        return back();
    }
}
