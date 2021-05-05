<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Datatables\EmployeeDataTable;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Employee\AddEmployeeRequest;



class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $employeedataTable)
    {
        $designation = Designation::all();
        $department = Department::all();
        return $employeedataTable->render('admin.employee.index',compact('designation','department'));
    }

    public function create()
    {
        $designation = Designation::all();
        $department = Department::all();
        return view('admin.employee.add',compact('designation','department'));
    }

    public function store(AddEmployeeRequest $request)
    {

        $image = uploadFile($request->image,'employeeimage');
        $passport_doc = uploadFile($request->passport_doc,'EmployeePassportdocument');
        $employee = Employee::create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'dob'=>$request->dob,
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'salary'=>$request->salary,
            'joining_date'=>$request->joining_date,
            'image'=>$image,
            'passport_doc'=>$passport_doc,
            'passport_num'=>$request->passport_num,
            'department'=>$request->department,
            'designation'=>$request->designation,
            'password' => Hash::make($request->password),
        ]);

        if($employee)
        {
            $response['status'] = 'success';
            $response['message'] = 'Employee added successfully';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = 'Something went wrong! Try again later...';
        }

        return $response;
        // return redirect()->route('admin.employee.index')->with('success', 'Employee Created Successfully');

    }

    public function edits($id)
    {
        $edit= Employee::where('id',$id)->first();
        $designation = Designation::all();
        $department = Department::all();
        $view = Employee::all()->find($id);

        return view('admin.employee.edits',compact('edit','designation','department','view'));
        
    }

    public function update(Request $request)
    {

        $image = uploadFile($request->image,'employeeimage');
        $passport_doc = uploadFile($request->passport_doc,'EmployeePassportdocument');

        $employee = Employee::where('id',$request->id)->update([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'dob'=>$request->dob,
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'salary'=>$request->salary,
            'joining_date'=>$request->joining_date,
            'image'=>$image,
            'passport_doc'=>$passport_doc,
            'passport_num'=>$request->passport_num,
            'department'=>$request->department,
            'designation'=>$request->designation,
        ]);
        if($employee)
        {
            $response['status'] = 'success';
            $response['message'] = 'Employee updated successfully';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = 'Something went wrong! Try again later...';
        }

        return $response;
    }

    public function view($id)
    {
        $view = Employee::with(['designation_data','department_data'])->find($id);
        return view('admin.employee.view',$view);   
    }

    public function delete(Request $request)
    {
        $employee= Employee::where('id',$request->id)->first();

        $image = $employee->getRawOriginal('image');
        if(file_exists(public_path('storage/EmployeeImage/'.$image))){
            @unlink(public_path('storage/EmployeeImage/'.$image));                      
        }
        $passport_doc = $employee->getRawOriginal('passport_doc');
        if(file_exists(public_path('storage/EmployeePassportdocument/'.$passport_doc))){
            @unlink(public_path('storage/EmployeePassportdocument/'.$passport_doc));                      
        }
        return Employee::where('id',$request->id)->delete();
    }
}