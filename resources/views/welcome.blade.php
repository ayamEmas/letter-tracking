<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LetDesk</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex items-center justify-center h-screen flex-col">
        <h1 class="text-5xl font-bold mb-4">LetDesk</h1>
        <p class="text-lg text-gray-600 mb-8">Track your internal letters easily and securely.</p>

        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Register</a>
        </div>
    </div>
</body>
</html>
