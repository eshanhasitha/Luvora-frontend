<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Luvora Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-4xl mx-auto p-8">

    <h1 class="text-3xl font-bold">
        Welcome to Luvora
    </h1>

    <p class="mt-2 text-gray-600">
        You are logged in.
    </p>

    <form
        method="POST"
        action="/logout"
        class="mt-6"
    >
        @csrf

        <button
            class="bg-red-600 text-white px-4 py-2 rounded"
        >
            Logout
        </button>
    </form>

</div>

</body>
</html>