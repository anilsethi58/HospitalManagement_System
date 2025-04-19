<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Check if email already exists
        $exists = User::where('email', $request->email)->exists();

        if ($exists) {
            return redirect('/register')->with('msg', 'User Already Exists');
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Hash password
                'role' => $request->role,
            ]);

            return redirect('/register')->with('msg', 'User Created Successfully...');
        } catch (\Exception $e) {
            return redirect('/register')->with('msg', 'Something went wrong..! ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'active') {
                $role = Auth::user()->role;
                Session::put('userid', Auth::user()->id);
                Session::put('name', Auth::user()->name);
                Session::put('role', $role);

                if ($role == 'admin') {
                    // Count total admins
                    $user = User::where('role', '=', 'admin')->get();
                    $totalAdmin = count($user);

                    // Count total doctors
                    $doctor = User::where('role', '=', 'doctor')->get();
                    $totalDoctor = count($doctor);

                    // Count active and inactive doctors
                    $activeDoctors = User::where('role', '=', 'doctor')->where('status', '=', 'active')->count();
                    $inactiveDoctors = User::where('role', '=', 'doctor')->where('status', '=', 'inactive')->count();

                    // Count total patients
                    $patient = User::where('role', '=', 'patient')->get();
                    $totalPatient = count($patient);

                    // Count active and inactive patients
                    $activePatients = User::where('role', '=', 'patient')->where('status', '=', 'active')->count();
                    $inactivePatients = User::where('role', '=', 'patient')->where('status', '=', 'inactive')->count();

                    return redirect('/adminlanding')
                        ->with('totalAdmin', $totalAdmin)
                        ->with('totalDoctor', $totalDoctor)
                        ->with('totalPatient', $totalPatient)
                        ->with('activeDoctors', $activeDoctors)
                        ->with('inactiveDoctors', $inactiveDoctors)
                        ->with('activePatients', $activePatients)
                        ->with('inactivePatients', $inactivePatients);
                } elseif ($role == 'doctor') {
                    return redirect('/doctorlanding');
                } else {
                    return redirect('/patientlanding');
                }
            } else {
                return redirect('/')->with('msg', 'You are not an Active user..!');
            }

        } else {
            return redirect('/')->with('msg', 'Invalid Credentials..!');
        }
    }
    public function UserStatus()
    {
        $user = User::where('role', '!=', 'admin')->get();
        return view('UserStatus')->with('users', $user);
    }
    public function ChangeStatus($id)
    {
        $user = User::find($id);
        if ($user->status == 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }
        $user->save();
        return redirect('/UserStatus');
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');

    }
    public function generateTicket()
    {
        $patient = user::where('role', 'patient')->get();
        $doctor = user::where('role', 'doctor')->get();
        return view('generateTicket')->with('patients', $patient)->with('doctors', $doctor);
    }
    public function storeTicket(Request $request)
    {
        $ticket = Ticket::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'phone' => $request->phone,
            'disease' => $request->disease,
        ]);
        if ($ticket) {
            return redirect('/generateTicket')->with('msg', 'Ticket Generatid...');
        } else {
            return redirect('/generateTicket')->with('msg', 'Something went wrong..!');
        }
    }
    public function viewTickets()
    {
        $tickets = Ticket::with(['patient', 'doctor'])->get(); // Fetch tickets with relationships
        return view('viewTicket', compact('tickets'));
    }
    public function storePrescription(Request $request, $ticketId)
    {
        $request->validate([
            'advice' => 'required|string',
            'medicines' => 'required|string',
        ]);
        $ticket = Ticket::where('ticket_id', $ticketId)->first();
        if (!$ticket) {
            return redirect()->back()->with('msg', 'Ticket not found!');
        }
        $ticket->advice = $request->advice;
        $ticket->medicines = $request->medicines;
        $ticket->save();

        return redirect()->back()->with('msg', 'Prescription submitted successfully!');
    }
    public function showPrescription($ticketId)
    {
        $ticket = Ticket::where('ticket_id', $ticketId)->first();
        // dd($ticket);
        return view('prescription', compact('ticket'));
    }
    public function downloadPDF($ticket_id)
    {
        // Fetch the ticket data
        $ticket = Ticket::with(['doctor', 'patient'])->where('ticket_id', $ticket_id)->first();

        if (!$ticket) {
            return redirect()->back()->with('msg', 'Ticket not found!');
        }


        $pdf = PDF::loadView('downloadprescription', compact('ticket'));
        return $pdf->download('prescription_' . $ticket->ticket_id . '.pdf');
    }

}
