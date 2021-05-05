<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Employee;


class DashboardController extends Controller
{
    public function index()
    {
        $designation = Designation::all();
        $department = Department::all();
        $employee = Employee::all();

        return view('admin.dashboard',compact('designation','department','employee'));
    }
}
