<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Task List App</title>

    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind library -->
    {{-- blade-formatter-disable --}}
    <style>
        .btn{
            display: block;
            font-size: 15px;
            transition: all .3s;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 5px 15px;
            cursor: pointer;
            width: fit-content
        }
        .btn:hover{
            border-color: transparent;
            color: white;
        }
        label{
            display: block;
            color: #9ca3af;
            text-transform: uppercase;
        }
        input,.area{
            width: 100%;
            padding: 10px;
            color: #9ca3af;
            border: 1px solid #ddd;
            resize: none
        }
        :is(input,.area):focus{
            outline: none
        }
        .error{
            color: red;
            font-size: .8rem
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
</head>
<body class="container mt-10 mx-auto mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>
    @if(session()->has('success'))
        <div>{{session('success')}}</div>
    @endif
    <nav>
        @yield('content')
    </nav>
</body>
</html>
