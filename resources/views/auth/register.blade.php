<div>
    <style>
        .login-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .login-form {
            margin-top: 2rem;
            border: 1px solid #ccc;
            padding: 2rem;
            border-radius: 0.5rem;
        }

        .login-form h2 {
            margin-bottom: 1rem;
            text-align: center;
            font-size: 2rem;
        }

        .login-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        .login-form input[type="text"],
        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
        }

        .login-form button {
            display: block;
            margin: 0 auto;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
        }

        .login-form button:hover {
            background-color: #218838;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top:100px;
        }

        .navbar-brand img {
            height: 100px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            background-color: #fff;
        }
        
    </style>
    <div class="login-container">
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
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input id="name" class="form-control" type="text" name="name"
                            value="{{ old('name') }}" required autofocus autocomplete="name" />
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" type="email" name="email"
                            value="{{ old('email') }}" required autocomplete="username" />
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="new-password" />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button type="submit" class="btn btn-primary ml-4">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
