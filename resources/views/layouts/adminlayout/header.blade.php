<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .btn-custom {
            background-color: #007bff; 
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3; 
            color: white;
        }

        .btn-custom-secondary {
            background-color:hsl(29, 92.50%, 21.00%);
            color: white;
            border: none;
        }
        .btn-custom-secondary:hover {
            background-color:hsl(23, 89.90%, 42.50%); 
            color: white;
        }
        .footer {
                background: rgb(9, 9, 9);
                color: white;
                text-align: center;
                padding: 10px;
                position: absolute;
                bottom: 0;
                width: 100%;
            }
    </style>
</head>
<body>
    <!-- Header -->
<header class="bg-success text-white p-3 text-center d-flex justify-content-between align-items-center">
    <h2 class="m-0">Admin Dashboard</h2>
    <div>
        <a href="/UserStatus" class="btn btn-custom-secondary me-2">Active / InActive</a>
        <a href="/generateTicket" class="btn btn-custom me-2">Generate Ticket</a>
        <a href="logout" class="btn btn-danger">Logout</a>
    </div>
</header>