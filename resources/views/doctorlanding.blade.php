@extends('layouts.doctorlayout.default')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm p-4 text-center">
                    <div class="icon">👨‍💼</div>
                    <h5 class="text-primary">Name: {{ session('name') }}</h5>
                    <p class="display-7 fw-bold text-dark">User Id:{{ session('userid') }} </p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4 text-center">
                    <div class="icon">📋</div>
                    <h5 class="text-danger">Appointments:</h5>
                    <p class="display-6 fw-bold text-dark">__</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4 text-center">
                    <div class="icon">📋</div>
                    <h5 class="text-danger">Prescription:</h5>
                    <p class="display-6 fw-bold text-dark">__</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4 text-center">
                    <div class="icon">🏥 </div>
                    <a href="/viewTicket" class="">View Tickets</a>
                    <p class="display-6 fw-bold text-dark">__</p>
                </div>
            </div>
        </div>

    </div>
@endsection