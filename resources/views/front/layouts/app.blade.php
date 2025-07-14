<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-50">
    @include('front.layouts.partials.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('front.layouts.partials.footer')
</body>

</html>