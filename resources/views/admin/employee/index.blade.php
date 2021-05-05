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
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Employee</h5>
                <a href="{{route('admin.employee.add')}}" class="btn btn-outline-primary float-right" title="Add Employee">Add Employee</a>
            </div>
            <div class="card-block table-border-style">

                <!-- ajax form response -->
                <div class="ajax-msg"></div>
                <div class="table-responsive">
                {!! $dataTable->table(['class' =>  'table table-bordered dt-responsive nowrap']) !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection

@push('page_scripts')

    {!! $dataTable->scripts() !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
    
    //delete employee

    $(document).on('click', '#employee_delete', function() {
        var id = $(this).attr('employee_id');

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
                        url: '{{ route("admin.employee.delete") }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data : {'id' : id},
                        success:function(data) {
                            if (data) {
                                swal(
                                'Deleted!',
                                'Employee has been deleted.',
                                'success'
                                )

                                window.LaravelDataTables["employee-table"].draw();
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

@endpush


