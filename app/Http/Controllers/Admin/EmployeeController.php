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
use App\Http\Requests\Employee\UpdateEmployeeRequest;


class EmployeeController extends Controller
{
    // public function get()
    // {
    //     return Employee::paginate(5);
    // }

    public function serch($name)
    {
        return Employee::where("l_name","like","%".$name."%")->orwhere("email","like","%".$name."%")->paginate(5);
    }

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
    }

    public function edits($id)
    {
        $edit= Employee::where('id',$id)->first();
        $designation = Designation::all();
        $department = Department::all();
        $view = Employee::all()->find($id);

        return view('admin.employee.edits',compact('edit','designation','department','view'));
        
    }

    public function update(UpdateEmployeeRequest $request)
    {
        if(isset($request->image) && isset($request->passport_doc))
        {
            $employees= Employee::where('id',$request->id)->first();

            $image = $employees->getRawOriginal('image');
            if(file_exists(public_path('storage/EmployeeImage/'.$image))){
                @unlink(public_path('storage/EmployeeImage/'.$image));                      
            }

            $passport_doc = $employees->getRawOriginal('passport_doc');
            if(file_exists(public_path('storage/EmployeePassportdocument/'.$passport_doc))){
                @unlink(public_path('storage/EmployeePassportdocument/'.$passport_doc));                      
            }

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
            } elseif (isset($request->passport_doc)){
        
            $employees= Employee::where('id',$request->id)->first();

            $passport_doc = $employees->getRawOriginal('passport_doc');
            if(file_exists(public_path('storage/EmployeePassportdocument/'.$passport_doc))){
                @unlink(public_path('storage/EmployeePassportdocument/'.$passport_doc));                      
            }
        
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
            }elseif (isset($request->image)) {
            $employees= Employee::where('id',$request->id)->first();

            $image = $employees->getRawOriginal('image');
            if(file_exists(public_path('storage/EmployeeImage/'.$image))){
                @unlink(public_path('storage/EmployeeImage/'.$image));                      
            }
            
            $image = uploadFile($request->image,'employeeimage');
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
            } else {
            $employee = Employee::where('id',$request->id)->update([
                'f_name'=>$request->f_name,
                'l_name'=>$request->l_name,
                'dob'=>$request->dob,
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'gender'=>$request->gender,
                'salary'=>$request->salary,
                'joining_date'=>$request->joining_date,
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

    public function loginEmployee(Request $request)
    {
        $user = Employee::where('email',$request->email)->first();
         if(!$user || !Hash::check($request->password, $user->password)){
             return response([
                 'message' => ['These login credentials do not match our records.']
             ], 404);
         }
         $token = $user->createToken('Token')->accessToken;

         $response = [
             'user' => $user,
             'token' => $token
         ];
         return response($response, 201);
        
    }
}
