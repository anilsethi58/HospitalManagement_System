@php use Illuminate\Support\Facades\Session; @endphp

@extends(Session::get('role') == 'patient' ? 'layouts.patientlayout.default' : 'layouts.doctorlayout.default')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">View Tickets</h2>
        <div class="row">
            @if($tickets->isEmpty())
                <!-- Show this message if no tickets are found -->
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <strong>No Tickets Found</strong>
                    </div>
                </div>
            @else
                @foreach($tickets as $ticket)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-header bg-gradient-primary text-white text-center">
                                <h5 class="mb-0" style="color: green; font-weight: bold;">Ticket ID: {{ $ticket->ticket_id }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Patient Id:</strong> {{ $ticket->patient->id }}</li>
                                    <li class="list-group-item"><strong>Patient Name:</strong> {{ $ticket->patient->name ?? 'N/A' }}</li>
                                    <li class="list-group-item"><strong>Doctor Name:</strong> {{ $ticket->doctor->name ?? 'N/A' }}</li>
                                    <li class="list-group-item"><strong>Phone:</strong> {{ $ticket->phone }}</li>
                                    <li class="list-group-item"><strong>Disease:</strong> {{ $ticket->disease }}</li>
                                    <li class="list-group-item"><strong>Date:</strong> {{ $ticket->created_at->format('d-m-Y H:i') }}</li>
                                </ul>

                                <!-- Show button only if the logged-in user is a doctor -->
                                @if(Session::get('role') == 'doctor')
                                    <div class="mt-3 text-center">
                                        <a href="{{ url('/prescription/' . $ticket->ticket_id) }}" class="btn btn-primary">
                                            Prescription
                                        </a>
                                    </div>
                                @endif

                                <!-- Show button only if the logged-in user is a patient -->
                                @if(Session::get('role') == 'patient')
                                    <div class="mt-3 text-center">
                                        <a href="{{ url('/viewprescription/' . $ticket->ticket_id) }}" class="btn btn-primary">
                                            View Prescription
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection