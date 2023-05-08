<div class="login-container">
    <style>
        .login-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            padding: 32px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 16px;
            margin-bottom: 16px;
            border-radius: 4px;
            border: 1px solid #d3d3d3;
            font-size: 16px;
            color: #555555;
            background-color: #f6f6f6;
        }

        button[type="submit"] {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 4px;
            background-color: #2196f3;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color: #0d8bf4;
        }

        a {
            color: #2196f3;
            text-decoration: none;
            margin-top: 16px;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom:20px;
        }

        .navbar-brand img {
            height: 150px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            background-color: #fff;
        }
    </style>
    <nav class="navbar">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">
                <img src="vendor/adminlte/dist/img/AdminLTELogo.png" alt="Nombre de la marca" />
            </a>
        </div>
    </nav>

    <div class="login-form">
        <!-- Session Status -->
        <div class="mb-4" :status="session('status')">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username" />
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" />
                    @error('password')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div>
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <button type="submit">Log in</button>
            </form>
        </div>
    </div>
</div>
