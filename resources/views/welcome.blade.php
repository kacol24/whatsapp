<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <form action="" method="POST" novalidate="off">
        @csrf
        <div>
            <h1>Premium T-shirt</h1>
        </div>
        <div>
            <label>
                Color:
                <select name="option_1" required>
                    <option disabled selected>Select color</option>
                    <option @selected(request('option_1') == 'red') value="red">Red</option>
                    <option @selected(request('option_1') == 'green') value="green">Green</option>
                    <option @selected(request('option_1') == 'blue') value="blue">Blue</option>
                </select>
            </label>
        </div>
        <div>
            <label>
                Size:
                <select name="option_2" required>
                    <option disabled selected>Select size</option>
                    <option @selected(request('option_2') == 's') value="s">S</option>
                    <option @selected(request('option_2') == 'm') value="m">M</option>
                    <option @selected(request('option_2') == 'l') value="l">L</option>
                </select>
            </label>
        </div>
        <div>
            <label>
                Quantity
                <input type="number" name="qty" value="{{ request('qty', old('qty', 1)) }}" min="1" class="text-right"
                       required>
            </label>
        </div>
        <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors">
            Ask on WhatsApp
        </button>
    </form>
</div>
</body>
</html>
