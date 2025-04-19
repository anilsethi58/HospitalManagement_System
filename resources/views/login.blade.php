@php use Illuminate\Support\Facades\Session; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }
        .login-container {
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
        .message{
            color: orangered;
        }
        input {
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
        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 16px;
            color: #666;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: linear-gradient(40deg,rgb(251, 255, 0), #0056b3);
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
            margin-top: 10px;
        }
        button:hover {
            transform: scale(1.05);
            background: linear-gradient(40deg, #0056b3, rgb(251, 255, 0));
        }
        .register-link {
            display: block;
            margin-top: 15px;
            color:rgb(9, 97, 21);
            text-decoration: none;
            font-weight: bold;
        }
        .register-link:hover {
            text-decoration: underline;
            color: black;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="/login" method="post">
        @csrf
        <div class="input-group">
            <input type="email" name="email" id="email" placeholder="Enter Your Email.." value="{{ old('email') }}" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" id="password" placeholder="Enter Your Password.." required>
            <span class="password-toggle" onclick="togglePassword()">👁️</span>
        </div>
        <button type="submit" name="btn" id="btn">Login</button>
    </form>
    <span class="message">{{ Session::get('msg') }}</span>

    <a href="/register" class="register-link">Don't have an account? Register</a>
</div>

<script>
    function togglePassword() {
        let passwordField = document.getElementById("password");
        passwordField.type = passwordField.type === "password" ? "text" : "password";
    }
</script>

</body>
</html>
