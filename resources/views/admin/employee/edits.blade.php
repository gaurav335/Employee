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
            <h5>Edit Employee</h5>
        </div>
            
            <div class="card-body">

                <!-- ajax form response -->
                <div class="ajax-msg"></div>

                <form class="" action="{{ route('admin.employee.update') }}" method="POST" enctype="multipart/form-data" id="edit_employee_form">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <input type="hidden" name="id" id="id" value="{{$edit->id}}">
                            <label>First Name</label>
                            <input type="text" id="f_name" name="f_name" value="{{$edit->f_name}}" class="form-control" placeholder="Enter Your First Name.." />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" id="l_name" name="l_name" value="{{$edit->l_name}}" class="form-control" placeholder="Enter Your First Name.." />    
                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Birth of Date</label>
                                <input type="date" id="dob" name="dob" value="{{$edit->dob}}" class="form-control" placeholder="Enter Your Birthdate.." />
                            </div>             
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                                <label>Mobile No</label>
                                <input type="number" id="mobile_no" name="mobile_no" value="{{$edit->mobile_no}}" class="form-control" placeholder="Enter Your Mobile No.." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" value="{{$edit->email}}" class="form-control" placeholder="Enter Your Email.." />
                            </div>             
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                           <label>Gender</label>
                               <div class="custom-control custom-radio">
                                    <input type="radio" name="gender" id="male" value="male"  {!! ((old('gender') == 'male') ? ' checked="checked"' : ((empty(old('gender')) && $edit->gender == 'male') ? ' checked="checked"' : '')) !!}>  Male<br>
                                    <input type="radio" name="gender" id="female" value="female"  {!! ((old('gender') == 'female') ? ' checked="checked"' : ((empty(old('gender')) && $edit->gender == 'female') ? ' checked="checked"' : '')) !!}>  Female
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="number" id="salary" name="salary" value="{{$edit->salary}}" class="form-control" placeholder="Enter Your Salary.." />
                            </div>             
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                                <label>Joining Date</label>
                                <input type="date" id="joining_date" value="{{$edit->joining_date}}" name="joining_date" class="form-control" placeholder="Enter Your Joining Date.." />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-4">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <input type="file" id="image" name="image" value="{{$edit->image}}" class="form-control" placeholder="Enter Your Profile Image.." />
                            </div>             
                        </div>
                        <div class="col-4">
                           <div class="form-group">
                                <label>Passport Document</label>
                                <input type="file" id="passport_doc" value="{{$edit->passport_doc}}" name="passport_doc" class="form-control" placeholder="Enter Your passport Document.." />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Passport Number</label>
                                <input type="number" id="passport_num" name="passport_num" value="{{$edit->passport_num}}" class="form-control" placeholder="Enter Your Passport Number.." />
                            </div>             
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> Select Department </label>
                                <select name="department" class="form-control" id="department">
                                    <option value="">Choose Department</option>
                                    @foreach($department as $departments)
                                        <option value="{{$departments->id}}" {{$departments->id == $edit->department ?'selected':''}}>{{"$departments->name"}}</option>
                                    @endforeach
                                </select>
                            </div>             
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Select Designation</label>
                                <select name="designation" class="form-control" id="designation">
                                    <option value="">Choose Designation</option>
                                    @foreach($designation as $designations)
                                        <option value="{{$designations->id}}" {{$designations->id == $edit->designation ?'selected':''}}>{{"$designations->name"}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                        <center>
                                <label><h2><i><u><b>Employee Image</i></u></b></h2></label><br>
                                <img src="{{$view->image}}" width="300px" >
                        </center>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <center>
                                <label><h2><i><u><b>Passport Document</i></u></b></h2></label><br>
                                <img src="{{$view->passport_doc}}" width="500px" >
                        </center>
                        </div>
                    </div>


                    <input type="hidden" id="employee_id" name="employee_id" value="">
            
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Update
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@push('page_scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>

    
    // edit employee
    $('#employee_edit_modal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var employee_id = button.data('id');
        $(this).find("input").val('');
        $('.error-msg-input').text('');
        $('.invalid-feedback').text('');

        $('#employee_id').val(employee_id);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '{{ route("admin.employee.edit") }}',
            type: 'GET',
            data : {id : employee_id},
            success: function(result){

                if(result) {
                    $('#employee_id').val(result.id);
                    $('#employee_edit_modal').find("#f_name").val(result.f_name)
                    $('#employee_edit_modal').find("#l_name").val(result.l_name)
                    $('#employee_edit_modal').find("#dob").val(result.dob)
                    $('#employee_edit_modal').find("#mobile_no").val(result.mobile_no)
                    $('#employee_edit_modal').find("#email").val(result.email)
                    $('#employee_edit_modal').find("#gender").val(result.gender)
                    $('#employee_edit_modal').find("#salary").val(result.salary)
                    $('#employee_edit_modal').find("#joining_date").val(result.joining_date)
                    $('#employee_edit_modal').find("#image").val(result.image)
                    $('#employee_edit_modal').find("#passport_num").val(result.passport_num)
                    $('#employee_edit_modal').find("#department").val(result.department)
                    $('#employee_edit_modal').find("#designation").val(result.designation)

                    // if(result.image) {
                    //     $('#edit_emp_image').prop('required', false);
                    //     $('#emp_img_tag').attr('src', result.image);
                    // } else {
                    //     $('#edit_emp_image').prop('required', true);
                    // }
                }
            },
        });
    });

    function editEmployee(form) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url : '{{ route("admin.employee.update") }}',
            type: 'post',
            processData: false,
            contentType: false,
            data : new FormData(form),
            success: function(result){
                if(result) {
                    $html = '<div class="alert alert-block alert-'+result.status+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+result.message+'</strong></div>';
                    $('.ajax-msg').append($html);
                    setTimeout(() => {
                        
                    if(result.status=="success"){
                        window.location.reload();
                    }
                    }, 1000);
                }
                // $('#employee_edit_modal').modal('hide');

                // window.LaravelDataTables["seller-property-table"].draw();
            },
            complete:function(){
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 3000);
            },
            error: function (data) {
                if(data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function (key, value) {
                        $('#edit_employee_form').find('input[name='+key+']').parents('.form-group')
                        .find('.error-msg-input').html(value);
                    });
                }
            }
        });
    }

    $("#edit_employee_form").validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {
            f_name: {
                required: true,
            },
            l_name: {
                required: true,
            },
            dob: {
                required: true,
            },
            mobile_no: {
                required: true,
            },
            email: {
                required: true,
            },            
            gender: {
                required: true,
            },            
            salary: {
                required: true,
            },            
            joining_date: {
                required: true,
            },                        
            passport_num: {
                required: true,
            },
            department: {
                required: true,
            },
            designation: {
                required: true,
            },            
        },
        messages: {
            f_name: {
                required: 'First Name is required',
            },
            l_name: {
                required: 'Last Name is required',
            },
            dob: {
                required: 'Birth Date is required',
            },
            mobile_no: {
                required: 'Mobile No is required',
            },
            email: {
                required: 'Email is required',
            },            
            gender: {
                required: 'Gender is required',
            },            
            salary: {
                required: 'Salary is required',
            },            
            joining_date: {
                required: 'Joining date is required',
            },                        
            passport_num: {
                required: 'Passport Number is required',
            },
            department: {
                required: 'Department is required',
            },
            designation: {
                required: 'designation is required',
            },
        },
        submitHandler: function (form) {
            // e.preventDefault();
            editEmployee(form);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });



    </script>
    </script>

@endpush