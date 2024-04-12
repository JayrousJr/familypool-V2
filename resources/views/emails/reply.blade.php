<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ config('company.name', 'Family Pool Service') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="p-3 bg-white dark:bg-slate-800 ">
    <div class="p-2 m-4 ">


        <section class="max-w-2xl px-2 py-2 mx-auto bg-white dark:bg-gray-900 rounded-lg">
            <header>
                <img class="w-auto h-20 sm:h-22" src="https://familypoolserviceonline.com/images/logo/logoblck.svg" width="80x" height="auto" alt="Compnay logo">
            </header>

            <main class="mt-2">
                <h3 class="text-gray-700 dark:text-gray-200">From {{config('company.name')}},</h3>

                <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                    <span class="text-gray-700">Subject: {{$subject}}</span><br>
                    <span class="text-gray-700">Message: {{$body}}</span>
                </p>

            </main>

            <hr class="my-6 border-gray-200 dark:border-gray-700">
            <footer class="mt-2">
                <p class="text-gray-500 dark:text-gray-400">
                    This email was sent from <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">{{config('company.email')}}</a>.

                </p>

                <p class="mt-6 text-gray-500 dark:text-gray-400">&copy; {{date('Y')}} {{config('company.name')}}.
                    All Rights Reserved.</p>
            </footer>
        </section>


    </div>
</body>

</html>