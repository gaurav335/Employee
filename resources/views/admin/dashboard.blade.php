@extends('layouts.master')

@section('page_title', 'Dashboard')

@section('page_head')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12 col-xl-4">
            <div class="progress-bar progress-c-theme" role="progressbar" style="width:100%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="card card-social">
                    <div class="card-block border-bottom">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto">
                                <i class="feather icon-briefcase text-primary f-36"></i>
                            </div>
                            <div class="col text-right">
                                <h3>{{ count($designation) }}</h3>
                                <span class="text-muted">Total Designation</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:100%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="col-md-12 col-xl-4">
            <div class="progress-bar progress-c-theme" role="progressbar" style="width:100%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="card card-social">
                    <div class="card-block border-bottom">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto">
                                <i class="feather icon-layers text-primary f-36"></i>
                            </div>
                            <div class="col text-right">
                                <h3>{{ count($department) }}</h3>
                                <span class="text-muted">Total Department</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:100%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="col-md-12 col-xl-4">
            <div class="progress-bar progress-c-theme" role="progressbar" style="width:100%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="card card-social">
                    <div class="card-block border-bottom">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto">
                                <i class="feather icon-users text-primary f-36"></i>
                            </div>
                            <div class="col text-right">
                                <h3>{{ count($employee) }}</h3>
                                <span class="text-muted">Total Employee</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:100%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page_scripts')

@endpush