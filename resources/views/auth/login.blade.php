<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda</title>
    <!-- Link ke Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100 flex items-center justify-center min-h-screen">

    <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-blue-700 mb-6">Log In</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-black-600 mb-1">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                    class="w-full px-4 py-2 border rounded-lg text-black-700 focus:outline-none focus:ring focus:ring-blue-300">
                @error('email')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-black-600 mb-1">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required 
                    class="w-full px-4 py-2 border rounded-lg text-black-700 focus:outline-none focus:ring focus:ring-blue-300">
                @error('password')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right mb-4">
                <a href="#" class="text-sm text-black-600 hover:underline">Lupa password?</a>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        @if (Route::has('register'))
        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('register') }}" class="text-sm text-black-600 hover:underline">Belum punya akun?</a>
            <a href="{{ url('/') }}" class="text-sm text-black-600 hover:underline">Back</a>
        </div>
        @endif
    </div>

</body>

</html>
