
    <style>
        /* Page Background */
        body {
            background: linear-gradient(135deg, #6EE7B7, #3B82F6, #9333EA); /* 3-color gradient */
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
        }

        /* Centering the Form */
        form {
            margin: 30px auto;
            padding: 40px;
            max-width: 480px;
            background: rgba(255, 255, 255, 0.9); /* Transparent white */
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            color: #333;
        }

        /* Form Title */
        .form-title {
            font-size: 2rem; /* Larger title */
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            color: #3B82F6;
        }

        /* Form Elements */
        .mb-5 {
            margin-bottom: 2rem; /* Increased spacing */
        }

        input, button {
            font-size: 1.1rem; /* Slightly larger text */
        }

        /* Error Messages */
        .alert {
            margin-top: 20px;
        }

        /* Inputs */
        input {
            width: 100%;
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }

        input:focus {
            border-color: #9333EA;
            outline: none;
            box-shadow: 0 0 8px rgba(147, 51, 234, 0.5);
        }

        /* Label */
        label {
            font-size: 1.1rem; /* Larger label */
            font-weight: bold;
            color: #3B82F6;
        }

        /* Checkbox and Label */
        .flex.items-center label {
            gap: 10px;
        }

        /* Buttons */
        form button[type="submit"], form .x-primary-button {
            margin-top: 20px;
            padding: 16px;
            font-size: 1.1rem;
            background-color: #9333EA;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        form button[type="submit"]:hover {
            background-color: #6D28D9;
        }

        .register-button {
            margin-top: 20px;
            background: linear-gradient(90deg, #10B981, #3B82F6);
            padding: 16px;
            border-radius: 10px;
            font-size: 1.1rem;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: opacity 0.3s ease;
            font-weight: bold;
        }

        .register-button:hover {
            opacity: 0.9;
        }

        /* Link Styling */
        form a {
            color: #9333EA;
            font-weight: bold;
            text-decoration: none;
        }

        form a:hover {
            text-decoration: underline;
        }
        .checkbox-container {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 8px;
        align-items: center;
    }

    .checkbox {
        border-radius: 0.25rem;
        border: 1px solid #D1D5DB; /* Border color */
        background-color: #FFFFFF;
        padding: 0.375rem;
        outline: none;
        transition: all 0.3s;
    }

    .checkbox:focus {
        border-color: #9333EA;
        box-shadow: 0 0 0 2px rgba(147, 51, 234, 0.5);
    }

    .label {
        font-size: 0.875rem; /* Smaller text */
        color: #4B5563; /* Dark gray text */
        margin-left: 8px;
    }
    </style>

    <form method="POST" action="{{ route('login') }}">
        <h2 class="form-title">{{ __('Login') }}</h2>
        @csrf

        <!-- Email Address -->
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            @if ($errors->has('email'))
                <div class="alert alert-warning mt-2 text-sm text-yellow-700 bg-yellow-100 border-l-4 border-yellow-500 p-2 rounded">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="mb-5">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-2" type="password" name="password" required autocomplete="current-password" />
            @if ($errors->has('password'))
                <div class="alert alert-warning mt-2 text-sm text-yellow-700 bg-yellow-100 border-l-4 border-yellow-500 p-2 rounded">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="checkbox-container mb-5">
    <input id="remember_me" type="checkbox" class="checkbox">
    <label for="remember_me" class="label">{{ __('Remember me') }}</label>
</div>




        <!-- Login and Register Buttons -->
        <x-primary-button class="x-primary-button">
            {{ __('Log in') }}
        </x-primary-button>

        <button type="button" onclick="window.location.href='{{ route('register') }}'" class="register-button">
            {{ __('Register') }}
        </button>
    </form>
 
