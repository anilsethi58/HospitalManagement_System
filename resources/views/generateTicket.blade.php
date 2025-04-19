@php use Illuminate\Support\Facades\Session; @endphp

@extends('layouts.adminlayout.default')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 border-0 rounded-3">
        <h2 class="text-center mb-4 text-primary fw-bold">Generate Ticket</h2>
        
        @if(Session::has('msg'))
            <div class="alert alert-success text-center">
                {{ Session::get('msg') }}
            </div>
        @endif
        
        <form action="/storeTicket" method="post">
            @csrf  
            <div class="mb-3">
                <label for="patient_id" class="form-label fw-bold">Select Patient:</label>
                <select name="patient_id" id="patient_id" class="form-select">
                    <option hidden>Select Patient</option>
                    @foreach($patients as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="doctor_id" class="form-label fw-bold">Select Doctor:</label>
                <select name="doctor_id" id="doctor_id" class="form-select">
                    <option hidden>Select Doctor</option>
                    @foreach($doctors as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label fw-bold">Phone Number:</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
            </div>
            
            <div class="mb-3">
                <label for="disease" class="form-label fw-bold">Disease:</label>
                <input type="text" name="disease" id="disease" class="form-control" placeholder="Enter Disease">
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Generate Ticket</button>
            </div>
        </form>
    </div>
</div>
@endsection
