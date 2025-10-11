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

    /* Checkbox Styling */
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
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-xl">
        @csrf

        <!-- Form Title -->
        <h2 class="form-title">Register</h2>

        <!-- Name -->
        <div class="mb-5">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-5">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Checkbox -->
        <div class="checkbox-container mb-5">
            <input id="remember_me" type="checkbox" class="checkbox" name="remember">
            <label for="remember_me" class="label">{{ __('Remember me') }}</label>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>


