<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }



        .dashboard-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
            margin: 50px auto;
        }

        h2 {
            color: #198754;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }

        .info-box {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: linear-gradient(45deg, rgb(17, 98, 3), rgb(101, 179, 0));
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            text-decoration: none;
        }

        .btn:hover {
            transform: scale(1.05);
            background: linear-gradient(45deg, rgb(101, 179, 0), rgb(17, 98, 3));
        }

        .footer {
            background: rgb(9, 9, 9);
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }

        .card {
            border-radius: 10px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        main {
            flex: 1;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .ticket-header h1 {
            text-transform: uppercase;
            font-size: 30px;
            font-weight: bold;
            color: #0d6efd;
        }

        .ticket-id {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .section-title {
            font-size: 20px;
            color: #0d6efd;
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 20px;
        }

        .signature {
            text-align: right;
            margin-top: 80px;
            margin-right: 30px;
        }

        .signature p {
            font-family: 'Dancing Script', cursive;
            font-size: 28px;
            margin-bottom: 0;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 250px;
            text-align: center;
            padding-top: 5px;
            font-size: 14px;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="ticket-header">
                <h1>Prescription</h1>
                <div class="ticket-id">Ticket ID: {{$ticket->ticket_id}}</div>
            </div>

            <div class="section mb-4">
                <h5 class="section-title">Doctor Information</h5>
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Doctor ID:</strong> {{ $ticket->doctor_id }}</div>
                    <div class="col-md-6"><strong>Name:</strong> {{ $ticket->doctor->name ?? 'N/A' }}</div>
                </div>
            </div>

            <div class="section mb-4">
                <h5 class="section-title">Patient Information</h5>
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Patient ID:</strong> {{ $ticket->patient_id }}</div>
                    <div class="col-md-6"><strong>Name:</strong> {{ $ticket->patient->name ?? $ticket->name }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><strong>Phone:</strong> {{ $ticket->phone }}</div>
                </div>
            </div>

            <div class="section mb-4">
                <h5 class="section-title">Medical Details</h5>
                <div class="row mb-2">
                    <div class="col-md-12"><strong>Disease:</strong> {{ $ticket->disease }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12"><strong>Advice:</strong> {{ $ticket->advice }}</div>
                </div>
                <div class="row">
                    <div class="col-md-12"><strong>Medicines:</strong> {{ $ticket->medicines }}</div>
                </div>
            </div>

            <div class="signature">
                <p>{{ $ticket->doctor->name ?? 'N/A' }}</p>
                <div class="signature-line">Doctor's Signature</div>
            </div>
        </div>
        
    </main>

</body>

</html>