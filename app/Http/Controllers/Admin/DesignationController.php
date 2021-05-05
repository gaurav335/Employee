<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Datatables\DesignationDataTable;
use App\Models\Designation;
use App\Http\Requests\Designation\AddDesignationRequest;
use App\Http\Requests\Designation\UpdateDesignationRequest;


class DesignationController extends Controller
{
    
    public function index(DesignationDataTable $designationdataTable)
    {
        return $designationdataTable->render('admin.designation.index');
    }

    public function create()
    {
        return view('admin.designation.create');
    }

    public function store(AddDesignationRequest $request)
    {
        $designation = Designation::create($request->all());

        if($designation)
        {
            $response['status'] = 'success';
            $response['message'] = 'Designation added successfully';
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
            return Designation::find($request->id);
        }
    }

    public function update(UpdateDesignationRequest $request)
    {
        $record = Designation::find($request->id);
        $designation =  $record->update($request->all());

        if($designation)
        {
            $response['status'] = 'success';
            $response['message'] = 'Designation updated successfully';
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
        return Designation::where('id',$request->id)->delete();
    }

    public function changeStatus(Request $request)
    {
        $deg = Designation::find($request->designation_id);
        $deg->update(['status' =>$request->status]);

        if($deg) {
            if($deg['status'] == 0)
            {
                $data['msg'] = 'Designation Inactivated successfully.';
                $data['action'] = 'Inactivated!';
            } else {
                $data['msg'] = 'Designation Activated successfully.';
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
