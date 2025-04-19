    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                background-color: #f4f4f9;
            }

            .header {
                background: rgb(35, 177, 58);
                color: white;
                padding: 15px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-radius: 8px;
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
                position: absolute;
                bottom: 0;
                width: 100%;
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
        </style>
    </head>

    <body>

        <!-- Header -->
        <header class="header">
            <h2>Doctor Dashboard</h2>
            <div>

                <a href="/logout" class="btn">Logout</a>
                <a href="/doctorlanding" class="btn">Dashboard</a>
                <a href="" class="btn btn-danger">👨‍⚕️ Your Patients</a>
            </div>
        </header>