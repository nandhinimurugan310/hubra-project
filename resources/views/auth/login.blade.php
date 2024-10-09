<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #00c6ff, #0072ff);
        }

        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 420px;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative; /* For error message positioning */
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .input-group input:focus {
            outline: none;
            border-color: #0072ff;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            text-align: left;
        }

        .login-box button {
            background-color: #0072ff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-box button:hover {
            background-color: #005ecb;
        }

        .login-box a {
            display: block;
            margin-top: 20px;
            color: #0072ff;
            text-decoration: none;
        }

        .login-box a:hover {
            text-decoration: underline;
        }

        /* Alert styles */
        .alert {
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: left;
            position: relative; /* Position for close button */
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 16px;
            color: inherit; /* Match the alert text color */
        }

        .btn-close:hover {
            color: #0056b3; /* Darker shade on hover */
        }
    </style>
    <script>
        // Simple validation to ensure both fields are filled
        function validateLoginForm() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');

            // Clear previous error messages
            emailError.textContent = '';
            passwordError.textContent = '';

            let isValid = true;

            // Check if email is empty
            if (!email) {
                emailError.textContent = 'Email is required.';
                isValid = false;
            }

            // Check if password is empty
            if (!password) {
                passwordError.textContent = 'Password is required.';
                isValid = false;
            }

            return isValid;
        }

        // Attach validation on form submission
        window.onload = function() {
            const form = document.querySelector('form');
            form.onsubmit = function(event) {
                if (!validateLoginForm()) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            };
        };
    </script>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <!-- Success and Error Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    
                </div>
            @endif

            <div class="error" id="email-error"></div> <!-- JavaScript error message -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="error" id="password-error"></div> <!-- JavaScript error message -->
                </div>
                <button type="submit">Login</button>
                <a href="{{ route('register') }}">Don't have an account? Register</a>
            </form>
        </div>
    </div>
</body>
</html>
