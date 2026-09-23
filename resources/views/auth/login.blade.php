<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Luvora Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow">

        <h1 class="text-2xl font-bold mb-6">
            Login to Luvora
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('login') }}"
            class="space-y-4"
        >
            @csrf

            <div>
                <label class="block mb-1">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full border rounded-lg p-2"
                >
            </div>

            <div>
                <label class="block mb-1">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border rounded-lg p-2"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-black text-white py-2 rounded-lg"
            >
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>