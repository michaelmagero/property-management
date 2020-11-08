<?php

namespace App\Http\Controllers;

use App\User;
use App\Mpesa;
use App\Expense;
use App\Service;
use App\Vehicle;
use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Users\UserMethods;
use App\Libraries\Services\ServiceMethods;
use App\Libraries\Documents\DocumentMethods;
use App\Libraries\Vehicles\VehicleMethods;
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
            case 'dev':
                return view('admin.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get());
                break;
            case 'admin':
                // return redirect()->route('notifications');
                return view('admin.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get())
                    ->with('tenants', Tenant::orderBy('created_at', 'desc')->get())
                    ->with('units', Unit::orderBy('created_at', 'desc')->get());
                break;
            case 'owner':
                return view('admin.vehicles.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get());
                break;
            case 'driver':
                return view('admin.payments.driver.pay')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get());
                break;
            case 'administrator':
                //return redirect()->route('notifications');
                return view('admin.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get())
                    ->with('active_drivers', $this->users->getAllActiveDrivers())
                    ->with('active_vehicles', $this->vehicles->getAllActiveVehicles())
                    ->with('due_documents', $this->documents->getAllDueDocuments())
                    ->with('due_services', $this->services->getAllDueSerives())
                    ->with('drivers', $this->users->getAllDrivers());

                break;
            case 'accountant':
                return view('admin.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('expenses', Expense::orderBy('created_at', 'desc')->get())
                    ->with('vehicles', Vehicle::orderBy('created_at', 'desc')->get())
                    ->with('active_drivers', $this->users->getAllActiveDrivers())
                    ->with('active_vehicles', $this->vehicles->getAllActiveVehicles())
                    ->with('due_documents', $this->documents->getAllDueDocuments())
                    ->with('due_services', $this->services->getAllDueSerives())
                    ->with('drivers', $this->users->getAllDrivers());

                break;
            default:
                flash()->error('User Does Not Exist!');
                return back();
                break;
        }
    }
}
