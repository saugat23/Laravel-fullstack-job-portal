<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Job Portal</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-yellow-100 via-green-100 to-green-200 text-slate-800">
        <nav class="mb-8 flex justify-between text-lg font-medium">
            <ul class="flex space-x-2">
                <li>
                    <a href="{{route('jobs.index')}}">Home</a>
                </li>
            </ul>
            <ul class="flex space-x-2">
                @auth
                    <li>
                        <a href="{{route('my-job-applications.index')}}">{{ auth()->user()->name ?? "Guest"}}: Applications</a>
                    </li>
                    <li>
                        <a href="{{route('my-jobs.index')}}">My Jobs</a>
                    </li>
                    <li>
                        <form action="{{route('auth.destroy')}}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Logout</button>
                        </form>
                    </li>
                @else     
                    <li>
                        <a href="{{route('auth.create')}}">Sign in</a>
                    </li>
                @endauth
            </ul>
        </nav>

        @if(session('success'))
            <div class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75" role="alert">
                <p class="font-bold">Success!</p>
                <p>{{session('success')}}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75" role="alert">
                <p class="font-bold">Error!</p>
                <p>{{session('error')}}</p>
            </div>
        @endif
        {{ $slot }}
    </body>
</html>
