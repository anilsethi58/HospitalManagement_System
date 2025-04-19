<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\Revalidate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Ticket;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);
Route::get('/doctorlanding', function () {
    return view('doctorlanding');
});
Route::get('/patientlanding', function () {

    // $patientId = Session::get('userid'); // Get the logged-in patient's ID
    // $prescriptions = Ticket::where('patient_id', $patientId)->get(); // Fetch prescriptions for the patient
    // return view('patientlanding', compact('prescriptions'));

    return view('patientlanding');
});

Route::middleware([CheckAuth::class, Revalidate::class])->group(function () {
    Route::get('/ChangeStatus/{id}', [AuthController::class, 'ChangeStatus']);
    Route::get('/generateTicket', [AuthController::class, 'generateTicket']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/UserStatus', [AuthController::class, 'UserStatus']);
    Route::get('/adminlanding', function () {
        // Count total admins
        $user = User::where('role', '=', 'admin')->get();
        $totalAdmin = count($user);
        $doctor = User::where('role', '=', 'doctor')->get();
        $totalDoctor = count($doctor);
        $activeDoctors = User::where('role', '=', 'doctor')->where('status', '=', 'active')->count();
        $inactiveDoctors = User::where('role', '=', 'doctor')->where('status', '=', 'inactive')->count();
        $patient = User::where('role', '=', 'patient')->get();
        $totalPatient = count($patient);
        $activePatients = User::where('role', '=', 'patient')->where('status', '=', 'active')->count();
        $inactivePatients = User::where('role', '=', 'patient')->where('status', '=', 'inactive')->count();

        return view('adminlanding')
            ->with('totalAdmin', $totalAdmin)
            ->with('totalDoctor', $totalDoctor)
            ->with('totalPatient', $totalPatient)
            ->with('activeDoctors', $activeDoctors)
            ->with('inactiveDoctors', $inactiveDoctors)
            ->with('activePatients', $activePatients)
            ->with('inactivePatients', $inactivePatients);


    });
    Route::get('/viewTicket', function () {
        $id = Session::get('userid');
        $role = Session::get('role');



        if ($role == 'patient') {
            $ticket = Ticket::join('users', 'tickets.patient_id', '=', 'users.id')
                ->where('tickets.patient_id', $id)
                ->get();
        } else {
            $ticket = Ticket::join('users', 'tickets.patient_id', '=', 'users.id')
                ->where('tickets.doctor_id', $id)
                ->where(function ($query) {
                    $query->whereNull('tickets.advice')->orWhere('tickets.advice', '')
                        ->whereNull('tickets.medicines')->orWhere('tickets.medicines', '');
                })
                ->get();
        }
        return view('viewTicket')->with('tickets', $ticket);
    })->name('viewTicket');
    Route::post('/storeTicket', [AuthController::class, 'storeTicket']);


    Route::get('/prescription/{ticketId}', [AuthController::class, 'showPrescription'])->name('prescription.show');
    Route::post('/prescription/{ticketId}', [AuthController::class, 'storePrescription'])->name('prescription.store');


    Route::get('viewprescription/{ticket_id}', function ($ticket_id) {
        // $userId = Session::get('userid');
        // $role = Session::get('role');

        $ticket = Ticket::findOrFail($ticket_id);
        // dd($ticket); 

        return view('viewprescription', compact('ticket'));
    })->name('viewprescription');

    // Route::get('/pdf',function(Request $request,string $ticket_id){
    //     return $request->user()->downloadPdf($ticket_id,[

    //     ]);

    // });


Route::get('/download-prescription/{ticket_id}', [AuthController::class, 'downloadPDF'])->name('prescription.download');
});

