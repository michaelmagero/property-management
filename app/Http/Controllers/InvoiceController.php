<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Invoice;
use App\WaterReading;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index()
    {
        return View('admin.invoices.index')
            ->with('invoices', Invoice::orderBy('created_at', 'desc')->get())
            ->with('units', Unit::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('admin.invoices.create')
            ->with('units', Unit::get());
    }

    public function store(Request $request)
    {
        $rent = Unit::where('id', $request->unit_id)->value('rent');
        $balance = Unit::where('id', $request->unit_id)->value('balance');
        $water_bill = WaterReading::where('unit_id', $request->unit_id)->get();

        $validator = Validator::make($request->all(), [
            'unit_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('new-invoice/')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $invoice = new Invoice();
                $invoice->unit_id = $request->get('unit_id');

                $invoice->invoice_no = mt_rand(100000, 999999);
                $invoice->unit_id = $request->unit_id;

                foreach ($water_bill as $bill) {
                }
                $invoice_details[] = [
                    'current_readings' => $bill->current_readings,
                    'previous_readings' => $bill->previous_readings,
                    'consumed_units' => $bill->current_readings - $bill->previous_readings,
                    'rate' => $bill->rate,
                    'total_water_bill' => $bill->amount,
                    'rent' => $rent,
                    'month' => $request->get('month'),
                    'garbage' => 200,
                    'total' => $rent + $bill->amount + 200,
                    'balance' => $balance,
                    'amount_due' => $rent + $bill->amount + 200 + $balance,
                ];

                $invoice->invoice_details = $invoice_details;
                $invoice->save();

                flash()->success('Invoice Registered Successfully');
                return back();
            } else {
                flash()->error('Add Tenant fail!, Duplicate email or Invalid credentials');
                return back();
            }
        }
    }

    public function show($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        if ($invoice) {
            return view('admin.invoices.read')->with('invoices', Invoice::where('id', $invoice->id)->orderBy('created_at', 'desc'));
        } else {
            return view('admin.invoices.read');
        }
    }

    public function edit($id)
    {
        $invoices = Invoice::find($id);
        return view('admin.invoices.edit')->with('invoices', Invoice::where('id', $id)->get());
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
            $user = Invoice::findOrFail($id);
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
        $invoice = Invoice::where('id', $id)->first();
        $invoice->delete();
        flash()->success('Invoice Deleted Successfully');
        return back();
    }
}
