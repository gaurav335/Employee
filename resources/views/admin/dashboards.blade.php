@extends('layouts.master')

@section('page_title', 'Dashboard')

@section('page_head')
<div class="float-right page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div>
@endsection

@section('content')
    
    <div class="row">       
        <div class="col-xl-3 col-md-6">
        <a href="#">
            <div class="card mini-stat m-b-30">
                <div class="p-3 text-white" style="background-color: #323634">
                    <div class="mini-stat-icon">
                        <i class="fa fa-usd float-right mb-0"></i>
                    </div>
                    <h5 class="text-uppercase mb-0">All Subscriber</h5>
                </div>
                
                <div class="card-body">
                    <div class="mt-4 text-muted" style="text-align: center">    
                        <h3 class="m-0"><i class="fa fa-usd text-success ml-2"></i></h3>    
                    </div>
                    <div class="border-bottom progress m-t-30" style="height: 7px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%; background-color: #323634;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        
    </div>

@endsection

@push('page_scripts')

@endpush