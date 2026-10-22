<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel Blog') }}
    </title>

    {{-- Bootstrap 5 + Bootstrap Icons --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-light">

    <div class="min-vh-100 d-flex flex-column">

        {{-- Logo --}}
        <div class="text-center py-4">

            <a href="{{ url('/') }}"
               class="text-decoration-none">

                <x-application-logo
                    class="d-block mx-auto"
                    style="width: 80px; height: 80px;"
                />

            </a>

        </div>


        {{-- Authentication Card --}}
        <div class="container flex-grow-1 d-flex justify-content-center">

            <div class="row w-100 justify-content-center">

                <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body p-4 p-md-5">

                            {{ $slot }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <footer class="text-center py-4">

            <small class="text-muted">

                &copy; {{ date('Y') }}
                {{ config('app.name', 'Laravel Blog') }}

            </small>

        </footer>

    </div>

</body>

</html>