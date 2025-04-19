<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Status / Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            background-color: green;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }   
        nav {
            display: flex;
            gap: 15px;
        }
        nav a {
            text-decoration: none;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        nav a.btn-active-inactive {
            background-color: #6c4f3d; /* Brown color */
            color: white;
        }
        nav a.btn-active-inactive:hover {
            background-color: #5a3e2d; /* Darker brown on hover */
            color: white;
        }
        nav a.btn-generate-ticket {
            background-color: #007bff; /* Blue color */
            color: white;
        }
        nav a.btn-generate-ticket:hover {
            background-color: #0056b3; /* Darker blue on hover */
            color: white;
        }
        nav a.btn-danger {
            background-color: #dc3545; /* Red for logout button */
            color: white;
        }
        nav a.btn-danger:hover {
            background-color: #a71d2a; /* Darker red on hover */
        }
        .container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            background-color: white;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="bg-success text-white p-3 text-center d-flex justify-content-between align-items-center">
        <h2 class="m-0 text-white">Manage UserStatus</h2>
        <div>
            <nav>
                <a href="/adminlanding" class="btn btn-active-inactive">Home</a>
                <a href="/UserStatus" class="btn btn-active-inactive">Active / InActive</a>
                <a href="/generateTicket" class="btn btn-generate-ticket">Generate Ticket</a>
                <a href="/logout" class="btn btn-danger">Logout</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Id</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->id }}</td>
                    <td>
                        <span class="badge {{ $user->status == 'Active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $user->status }}
                        </span>
                    </td>
                    <td>
                        <a href="ChangeStatus/{{ $user->id }}" class="btn btn-sm btn-warning">Change Status</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Hospital Management System. All rights reserved.</p>
    </footer>
</body>
</html>