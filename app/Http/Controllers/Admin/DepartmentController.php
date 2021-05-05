<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Datatables\DepartmentDataTable;
use App\Models\Department;
use App\Http\Requests\Department\AddDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    public function index(DepartmentDataTable $departmentdataTable)
    {
        return $departmentdataTable->render('admin.department.index');
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(AddDepartmentRequest $request)
    {
        $department = Department::create($request->all());

        if($department)
        {
            $response['status'] = 'success';
            $response['message'] = 'State added successfully';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = 'Something went wrong! Try again later...';
        }

        return $response;
    }

    public function edit(Request $request)
    {
        if($request->id) {
            return Department::find($request->id);
        }
    }

    public function update(UpdateDepartmentRequest $request)
    {
        $record = Department::find($request->id);
        $department =  $record->update($request->all());

        if($department)
        {
            $response['status'] = 'success';
            $response['message'] = 'Department updated successfully';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = 'Something went wrong! Try again later...';
        }

        return $response;
    }

    public function delete(Request $request)
    {
        return Department::where('id',$request->id)->delete();
    }

    public function changeStatus(Request $request)
    {
        $dep = Department::find($request->department_id);
        $dep->update(['status' =>$request->status]);

        if($dep) {
            if($dep['status'] == 0)
            {
                $data['msg'] = 'Department Inactivated successfully.';
                $data['action'] = 'Inactivated!';
            } else {
                $data['msg'] = 'Department Activated successfully.';
                $data['action'] = 'Activated!';
            }
            $data['status'] = 'success';
        } else {

            $data['msg'] = 'Something went wrong';
            $data['action'] = 'Cancelled!';
            $data['status'] = 'error';
        }

        return $data;
    }
}
