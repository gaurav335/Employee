@extends('layouts.master')

@section('page_title', 'Employee List')

@section('breadcrumb')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Employee</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item active"><a href="#!">Employee</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="main-body">
<div class="page-wrapper">
<div class="row">
    <div class="col-sm-12">
        <div class="card">
        <div class="card-header">
            <h5>Employee Details</h5>
        </div>
            
            <div class="card-body">

                <!-- ajax form response -->
                <div class="ajax-msg"></div>
                <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="{{$f_name}}" readonly/> 
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="form-group">
                                        <label>Last Name</label>    
                                        <input type="text" class="form-control" value="{{$l_name}}" readonly/> 
                                </div>
                        </div>
                </div>

                <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                        <label>Date Of Birth</label>
                                        <input type="text" class="form-control" value="{{$dob}}" readonly/> 
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="form-group">
                                        <label>Gender</label>
                                        <input type="text" class="form-control" value="{{$gender}}" readonly/> 
                                </div>
                        </div>
                </div>

                <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                        <label>Mobile No</label>    
                                        <input type="text" class="form-control" value="{{$mobile_no}}" readonly/> 
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="form-group">
                                        <label>Email Address</label>    
                                        <input type="text" class="form-control" value="{{$email}}" readonly/> 
                                </div>
                        </div>
                </div>

                <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                        <label>Salary</label>    
                                        <input type="text" class="form-control" value="{{$salary}}" readonly/> 
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="form-group">
                                        <label>Joining Date</label>    
                                        <input type="text" class="form-control" value="{{$joining_date}}" readonly/> 
                                </div>
                        </div>
                </div>
               

                <div class="row">
                        <div class="col-4">
                                <div class="form-group">
                                        <label>Passport Number</label>    
                                        <input type="text" class="form-control" value="{{$passport_num}}" readonly/> 
                                </div>
                        </div>
                        <div class="col-4">
                                <div class="form-group">
                                        <label>Designation</label>    
                                        <input type="text" class="form-control" value="{{$designation_data['name']}}" readonly/> 
                                </div>
                        </div>
                        <div class="col-4">
                                <div class="form-group">
                                        <label>Department</label>    
                                        <input type="text" class="form-control" value="{{$department_data['name']}}" readonly/> 
                                </div>
                        </div>
                </div>   

                <div class="col-12">
                        <div class="form-group">
                        <center>
                                <label><h2><i><u><b>Employee Image</i></u></b></h2></label><br>
                                <img src="{{$image}}" width="300px" >
                        </center>
                        </div>
                </div>
                <div class="col-12">
                        <div class="form-group">
                        <center>
                                <label><h2><i><u><b>Passport Document</i></u></b></h2></label><br>
                                <img src="{{$passport_doc}}" width="500px" >
                        </center>
                        </div>
                </div>            
               
               
                <div class="form-group">
                     <a style="color:white;" href="javascript:history.back()"><button  class="btn btn-primary" >Back</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection




