<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{url('/images/logos/logo.ico')}}">
    @vite(['resources/css/app.css'])
    @vite(['resources/css/nav.css', 'resources/css/footer.css'])
    @yield('styles')
    <script src="https://kit.fontawesome.com/99be30e45a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
</head>
<body class="overflow-x-hidden">
    <header>
        @include('mycomponents.nav')
        @yield('header')
    </header>
    <main>
        @yield('body')
    </main>
    <!--hide in screens less than 320px-->
    <div class="fixed top-0 left-0 bg-black w-full h-full xs:flex xs:items-center xs:justify-center sm:hidden z-[1000]">
        <h1 class="text-white font-varelarounded px-2">Sorry, but your screen is too short to be supported !</h1>
    </div>
    <footer>
        @include('mycomponents.footer', ['data' => $footerData])
    </footer>
</body>
</html>