<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index()
    {
        return View('admin.receipts.index')
            ->with('receipts', Receipt::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('admin.receipts.create');
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
                $user = new Receipt();
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->company = $request->get('company');
                $user->phone = $request->get('phone');
                $user->role = 'seller';
                $user->password = bcrypt(str::random(10));
                $user->save();
                flash()->success('Receipt Added Successfully');
                return back();
            } else {
                flash()->error('Add Receipt fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function show($id)
    {
        $receipt = Receipt::where('id', $id)->first();
        if ($receipt) {
            return view('admin.receipts.read')->with('receipts', Receipt::where('id', $receipt->id)->orderBy('created_at', 'desc'));
        } else {
            return view('admin.receipts.read');
        }
    }

    public function edit($id)
    {
        $receipts = Receipt::find($id);
        return view('admin.receipts.edit')->with('receipts', Receipt::where('id', $id)->get());
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
            $user = Receipt::findOrFail($id);
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
        $receipt = Receipt::where('id', $id)->first();
        $receipt->delete();
        flash()->success('Receipt Deleted Successfully');
        return back();
    }
}
