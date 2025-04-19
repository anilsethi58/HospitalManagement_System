@php use Illuminate\Support\Facades\Session; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            flex-direction: column;
        }
        .register-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .input-group {
            position: relative;
            width: 100%;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background: #fff;
            color: #333;
            outline: none;
        }
        input:focus, select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: linear-gradient(45deg,rgb(255, 217, 0), #0056b3);
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }
        button:hover {
            transform: scale(1.05);
            background: linear-gradient(45deg,rgb(3, 78, 159), #007bff);
        }
        .message {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
        .login-link {
            margin-top: 15px;
        }
        .login-link a {
            color:rgb(0, 107, 13);
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Register</h2>
    <br>
    <span class="message">{{ Session::get('msg') }}</span>
    <form action="/register" method="post">
        @csrf
        <div class="input-group">
            <input type="text" name="name" id="name" placeholder="Enter Your Name.." required>
        </div>
        <div class="input-group">
            <input type="email" name="email" id="email" placeholder="Enter Your Email.." required>
        </div>
        <div class="input-group">
            <input type="password" name="password" id="password" placeholder="Enter Your Password.." required>
        </div>
        <div class="input-group">
            <select name="role" id="role" required>
                <option value="" hidden>Select Your Role</option>
                <option value="doctor">Doctor</option>
                <option value="patient">Patient</option>
            </select>
        </div>
        <button type="submit" name="btn" id="btn">Register</button>
    </form>

    <div class="login-link">
        <p>Already have an account? <a href="/login">Login</a></p>
    </div>
</div>

</body>
</html>
