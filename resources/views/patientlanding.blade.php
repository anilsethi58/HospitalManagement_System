@php use Illuminate\Support\Facades\Session; @endphp

@extends('layouts.patientlayout.default') 
@section('content')      
<!-- Dashboard Cards -->     
<div class="container mt-4">         
    <div class="row">             
        <div class="col-md-4">                 
            <div class="card shadow-sm p-4 text-center">                     
                <div class="icon">👨‍💼</div>                     
                <h5 class="text-primary">Name: {{ Session::get('name') }}</h5>                     
                <p class="display-7 fw-bold text-dark">User Id: {{ Session::get('userid') }} </p>                 
            </div>             
        </div>             
        <div class="col-md-4">                 
            <div class="card shadow-sm p-4 text-center">                     
                <div class="icon">💊</div>                        
                <h5 class="text-danger"><a href="/viewprescription">Download Prescription</a></h5>                     
            </div>             
        </div>             
        <div class="col-md-4">                 
            <div class="card shadow-sm p-4 text-center">                     
                <div class="icon">📋</div>                     
                <h5 class="text-danger"><a href="/viewTicket">View Ticket</a></h5> <!-- Fixed this line -->
            </div>             
        </div>         
    </div>     
</div>     
@stop
