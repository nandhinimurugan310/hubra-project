<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
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

        .register-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #ff758c, #ff7eb3);
        }

        .register-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .register-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
            position: relative;
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
            border-color: #ff758c;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            text-align: left;
        }

        .register-box button {
            background-color: #ff758c;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 15px;
        }

        .register-box button:hover {
            background-color: #ff5873;
        }

        .register-box a {
            display: block;
            margin-top: 20px;
            color: #ff758c;
            text-decoration: none;
        }

        .register-box a:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        // Function to validate if passwords match
        function validatePasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const errorElement = document.getElementById('password-error');

            // Clear previous error message
            errorElement.textContent = '';

            if (password !== confirmPassword) {
                errorElement.textContent = 'Passwords do not match';
                return false;
            }
            return true;
        }

        // Function to validate phone number
        function validatePhoneNumber() {
            const phone = document.getElementById('phone').value;
            const errorElement = document.getElementById('phone-error');

            // Clear previous error message
            errorElement.textContent = '';

            // Ensure phone number is 10 digits
            if (!/^\d{10}$/.test(phone)) {
                errorElement.textContent = 'Phone number must be 10 digits';
                return false;
            }
            return true;
        }

        // Attach the validation function to form submission
        window.onload = function () {
            const form = document.querySelector('form');
            form.onsubmit = function (event) {
                // Validate both phone and password fields
                if (!validatePasswordMatch() || !validatePhoneNumber()) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            }
        }
    </script>

</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Admin Register</h2><!--
            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif-->
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="Enter your username" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                    <div class="error" id="phone-error"></div> <!-- JavaScript phone validation error -->
                    @error('phone')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="file" id="profile_photo" name="profile_photo" accept="image/*" required>
                    @error('profile_photo')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm your password" required>
                    <div class="error" id="password-error"></div> <!-- JavaScript password validation error -->
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Register</button>
                <a href="{{ route('login') }}">Already have an account? Login</a>
            </form>
        </div>
    </div>
</body>
</html>
