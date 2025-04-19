@php use Illuminate\Support\Facades\Session; @endphp

@extends('layouts.doctorlayout.default')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded">
        <div class="card-header bg-primary text-white text-center py-2">
            <h5 class="mb-0">Write Prescription</h5>
        </div>
        <div class="text-center my-2">
            <span style="color: green;">{{ Session::get('msg') }}</span>
        </div>
        <div class="card-body p-3">
            <form action="{{ route('prescription.store', $ticket->ticket_id)}}" method="POST">
                @csrf

                <!-- Patient Details -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="patient_id" class="form-label"><strong>Patient ID:</strong></label>
                        <input type="text" name="patient_id" class="form-control form-control-sm" value="{{ $ticket->patient->id }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="patient_name" class="form-label"><strong>Patient Name:</strong></label>
                        <input type="text" name="patient_name" class="form-control form-control-sm" value="{{ $ticket->patient->name }}" readonly>
                    </div>
                </div>

                <!-- Disease -->
                <div class="mb-3">
                    <label for="disease" class="form-label"><strong>Disease:</strong></label>
                    <input type="text" name="disease" class="form-control form-control-sm" value="{{ $ticket->disease }}" readonly>
                </div>

                <!-- Advice -->
                <div class="mb-3">
                    <label for="advice" class="form-label"><strong>Advice:</strong></label>
                    <textarea name="advice" class="form-control form-control-sm" rows="2" placeholder="Enter your advice here..." required>{{ $ticket->advice }}</textarea>
                </div>

                <!-- Medicines -->
                <div class="mb-3">
                    <label for="medicines" class="form-label"><strong>Medicines:</strong></label>
                    <textarea name="medicines" class="form-control form-control-sm" rows="3" placeholder="Enter prescribed medicines here..." required>{{ $ticket->medicines }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm">Submit Prescription</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop