@extends('layouts.master')

@section('page_title', 'Department List')

@section('breadcrumb')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Department</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Department</a></li>
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
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Department</h5>
                <button type="button" class="btn btn-outline-primary float-right" title="Add Department" data-toggle="modal" data-target="#department_add_modal" data-id="'.$data->id.'">Add Department</button>
            </div>
            <div class="card-block table-border-style">

                <!-- ajax form response -->
                <div class="ajax-msg"></div>
                <div class="table-responsive active">
                {!! $dataTable->table(['class' =>  'table table-bordered dt-responsive nowrap']) !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

    @include('admin.department.create')

@endsection

<!-- @push('page_scripts') -->

    {!! $dataTable->scripts() !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>

    // change status
    $(document).on('click', '.changeStatus', function() {
        var this_var = this;
        $(this).attr('disabled', true);
        var department_id = $(this).attr('department_id');
        var status = $(this).attr('status');
        var msg = "";

        if(status == 0) {
            msg = "Inactive";
        } else {
            msg = "Active";
        }

        swal({
            title: 'Are you sure want to '+msg+'?',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, '+msg+' it!',
            reverseButtons: true
            }).then((result) => {
                if (result) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "{{ route('admin.department.change_status') }}",
                        type : 'PATCH',
                        data : {'status' : status, 'department_id' : department_id},
                        success : function (res) {

                            swal(
                                res.action,
                                res.msg,
                                res.status
                            )

                            window.LaravelDataTables["department-table"].draw();
                        }
                    });
                } else {
                    swal("Cancelled", "Status not changed :)", "error");
                    $(this).attr('disabled', false);
                }
        }).catch((error) => {
            $('.changeStatus').attr('disabled', false);
        });

    });


    // add department
    $('#department_add_modal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var department_id = button.data('id');
        $(this).find("input").val('');
        $('.error-msg-input').text('');
        $('.invalid-feedback').text('');

        $('#department_id').val(department_id);
    });

    function addDepartment(form) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '{{ route("admin.department.store") }}',
            type: 'post',
            processData: false,
            contentType: false,
            data : new FormData(form),
            success: function(result){
                if(result) {
                    $html = '<div class="alert alert-block alert-'+result.status+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+result.message+'</strong></div>';

                    $('.ajax-msg').append($html);
                }
                $('#department_add_modal').modal('hide');

                window.LaravelDataTables["department-table"].draw();
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
                        $('#add_department_form').find('input[name='+key+']').parents('.form-group')
                        .find('.error-msg-input').html(value);
                    });
                }
            }
        });
    }

    $("#add_department_form").validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "The name field is required.",
            }
        },
        submitHandler: function (form) {
            addDepartment(form);
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


    // edit department
    $('#department_edit_modal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var department_id = button.data('id');
        $(this).find("input").val('');
        $('.error-msg-input').text('');
        $('.invalid-feedback').text('');

        $('#department_id').val(department_id);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '{{ route("admin.department.edit") }}',
            type: 'GET',
            data : {id : department_id},
            success: function(result){

                if(result) {
                    $('#department_id').val(result.id);
                    $('#dep_name').val(result.name);
                    if(result.image) {
                        $('#edit_dep_image').prop('required', false);
                        $('#dep_img_tag').attr('src', result.image);
                    } else {
                        $('#edit_dep_image').prop('required', true);
                    }
                }
            },
        });
    });

    function editDepartment(form) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url : '{{ route("admin.department.update") }}',
            type: 'post',
            processData: false,
            contentType: false,
            data : new FormData(form),
            success: function(result){
                if(result) {
                    $html = '<div class="alert alert-block alert-'+result.status+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+result.message+'</strong></div>';

                    $('.ajax-msg').append($html);
                }
                $('#department_edit_modal').modal('hide');

                window.LaravelDataTables["department-table"].draw();
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
                        $('#edit_department_form').find('input[name='+key+']').parents('.form-group')
                        .find('.error-msg-input').html(value);
                    });
                }
            }
        });
    }

    $("#edit_department_form").validate({
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "The name field is required.",
            },
        },
        submitHandler: function (form) {
            editDepartment(form);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });

    //delete department

    $(document).on('click', '#department_delete', function() {
        var id = $(this).attr('department_id');

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type:'POST',
                        url: '{{ route("admin.department.delete") }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data : {'id' : id},
                        success:function(data) {
                            if (data) {
                                swal(
                                'Deleted!',
                                'Department has been deleted.',
                                'success'
                                )

                                window.LaravelDataTables["department-table"].draw();
                            }

                        }
                    });
                } else {
                    swal("Cancelled", "Your record is safe :)", "error");
                }
            })
    });
    </script>
    </script>

<!-- @endpush -->