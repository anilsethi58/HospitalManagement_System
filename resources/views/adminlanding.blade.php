@php use Illuminate\Support\Facades\Session; @endphp

@extends('layouts.adminlayout.default')
@section('content')
<style>
    .card-hover:hover {
        transform: scale(1.05);
        transition: 0.3s ease-in-out;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="container mt-4">
    <div class="card shadow p-4">
        <h4 class="text-center mb-3">👨‍💼 Welcome,{{Session::get('name')}} </h4>
        <p class="text-muted text-center"><strong>User ID:{{Session::get('userid')}}</strong> </p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center border-0 card-hover">
                    <h5 class="text-primary">👨‍💼 Total Admin Users</h5>
                    <p class="display-6 fw-bold text-dark">{{$totalAdmin}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center border-0 card-hover">
                    <h5 class="text-success">🩺 Total Doctors</h5>
                    <p class="display-6 fw-bold text-dark">{{$totalDoctor}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center border-0 card-hover">
                    <h5 class="text-danger">🏥 Total Patients</h5>
                    <p class="display-6 fw-bold text-dark">{{$totalPatient}}</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center border-0 card-hover">
                    <h5 class="text-info">✅ Active Patients</h5>
                    <p class="display-6 fw-bold text-dark">{{$activePatients}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center border-0 card-hover">
                    <h5 class="text-warning">🩺 Active Doctors</h5>
                    <p class="display-6 fw-bold text-dark">{{$activeDoctors}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center border-0 card-hover">
                    <h5 class="text-secondary">❌ Inactive Patients</h5>
                    <p class="display-6 fw-bold text-dark">{{$inactivePatients}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center border-0 card-hover">
                    <h5 class="text-secondary">❌ Inactive Doctors</h5>
                    <p class="display-6 fw-bold text-dark">{{$inactiveDoctors}}</p>
                </div>
            </div>
        </div>
    </div>
</div>



@stop