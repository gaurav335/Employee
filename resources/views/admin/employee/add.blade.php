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
            <h5>Add Employee</h5>
        </div>
            
            <div class="card-body">

                <!-- ajax form response -->
                <div class="ajax-msg"></div>

                
                <form class="" action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data" id="add_employee_form">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id="f_name" name="f_name" class="form-control" placeholder="Enter Your First Name.." />
                            <span class="error-msg-input text-danger"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" id="l_name" name="l_name" class="form-control" placeholder="Enter Your First Name.." />    
                            <span class="error-msg-input text-danger"></span>
                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Birth of Date</label>
                                <input type="date" id="dob" name="dob" class="form-control" placeholder="Enter Your Birthdate.." />
                                <span class="error-msg-input text-danger"></span>
                            </div>             
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                                <label>Mobile No</label>
                                <input type="number" id="mobile_no" name="mobile_no" class="form-control" placeholder="Enter Your Mobile No.." />
                                <span class="error-msg-input text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email.." />
                                <span class="error-msg-input text-danger"></span>
                            </div>             
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                                <label>Gender</label><br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="gender" name="gender" value="male"> Male<br>
                                    <input type="radio" id="gender" name="gender" value="female"> Female
                                    <span class="error-msg-input text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="number" id="salary" name="salary" class="form-control" placeholder="Enter Your Salary.." />
                                <span class="error-msg-input text-danger"></span>
                            </div>             
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                                <label>Joining Date</label>
                                <input type="date" id="joining_date" name="joining_date" class="form-control" placeholder="Enter Your Joining Date.." />
                                <span class="error-msg-input text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Enter Your Profile Image.." />
                                <span class="error-msg-input text-danger"></span>
                            </div>             
                        </div>
                        <div class="col-4">
                           <div class="form-group">
                                <label>Passport Document</label>
                                <input type="file" id="image" name="passport_doc" class="form-control" placeholder="Enter Your passport Document.." />
                                <span class="error-msg-input text-danger"></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Passport Number</label>
                                <input type="number" id="passport_num" name="passport_num" class="form-control" placeholder="Enter Your Passport Number.." />
                                <span class="error-msg-input text-danger"></span>
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
                                        <option value="{{$departments->id}}">{{"$departments->name"}}</option>
                                        <span class="error-msg-input text-danger"></span>
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
                                        <option value="{{$designations->id}}">{{"$designations->name"}}</option>
                                        <span class="error-msg-input text-danger"></span>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your password.." />
                                <span class="error-msg-input text-danger"></span>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="check">
                                    <label class="form-check-label" for="check">Show Password</label>
                                </div>
                            </div>             
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Conform Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter Your conform password.." />
                                <span class="error-msg-input text-danger"></span>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="checks">
                                    <label class="form-check-label" for="checks">Show Password</label>
                                </div>
                            </div>             
                        </div>
                    </div>

            
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
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

    //add employee
    $('#employee_add_modal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var employee_id = button.data('id');
        $(this).find("input").val('');
        $('.error-msg-input').text('');
        $('.invalid-feedback').text('');

        $('#employee_id').val(employee_id);
    });

    function addEmployee(form) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '{{ route("admin.employee.store") }}',
            type: 'post',
            processData: false,
            contentType: false,
            data : new FormData(form),
            success: function(result){
                if(result) {
                    $html = '<div class="alert alert-block alert-'+result.status+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+result.message+'</strong></div>';

                    $('.ajax-msg').append($html);
                    if(result.status=="success"){
                        alert('Employee added successfully');

                        var str = window.location.href
                        window.location.href =str.substring(0, str.lastIndexOf("/") + 1)
                    }
                }

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
                        $('#add_employee_form').find('input[name='+key+']').parents('.form-group')
                        .find('.error-msg-input').html(value);
                    });
                }
            }
        });
    }

    $("#add_employee_form").validate({
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
            image: {
                required: true,
            },
            passport_doc: {
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
            password: {
                required: true,
            },
            confirm_password: {
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
            image: {
                required: 'Image is required',
            },
            passport_doc: {
                required: 'Passport Document is required',
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
            password: {
                required: 'password is required',
            },
            confirm_password: {
                required: 'confirm_password is required',
            },
        },
        submitHandler: function (form) {
            addEmployee(form);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });

    $('#check').click(function(){
	    if(document.getElementById('check').checked) {
            $('#password').get(0).type = 'text';
        } else {
            $('#password').get(0).type = 'password';
        }
    });

    $('#checks').click(function(){
	    if(document.getElementById('checks').checked) {
            $('#confirm_password').get(0).type = 'text';
        } else {
            $('#confirm_password').get(0).type = 'password';
        }
    });

    
$('INPUT[type="file"]').change(function () {
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'JPG':
        case 'JFIF':
        case 'JPEG':
        case 'PNG':
        case 'GIF':
        case 'jpg':
        case 'jfif':
        case 'jpeg':
        case 'png':
        case 'gif':
            $('#image').attr('disabled', false);
            break;
        default:
            alert('This is not an allowed file type.');
            this.value = '';
        }
    });

    </script>
    </script>

@endpush


