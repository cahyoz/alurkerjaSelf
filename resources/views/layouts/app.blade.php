<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlurKerja</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3425WT64XJ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag("config", "G-3425WT64XJ");
    </script>
</head>

<body>
    <div class="min-h-screen">
        <div class="dark-mode:bg-gray-900 antialiased">
            <!-- NAVBAR -->

            @include('partials.navbar')
            <!-- END NAVBAR -->

            <!-- Main Content -->
            @yield('content')
            <!-- End Main Content -->
            @yield('content2')

            <!-- FOOTER -->
            @include('partials.footer')
            <!-- END FOOTER -->
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>