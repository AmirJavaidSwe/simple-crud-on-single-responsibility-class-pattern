<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body class="bg-light">
    <div class="container mt-5">
        <x-success class="mt-3" />
        <x-error class="mt-3" />
        <h2 class="title text-center mt-4">
            @yield('title')
            @yield('create_customer')

        </h2>
        @yield('content')
    </div>
    @include('partials.footer')
</body>

</html>
