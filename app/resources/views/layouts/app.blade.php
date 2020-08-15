@include('layouts.head')
<body>
    <div id="app">
        @include('header.header')
        <main class="my-5">
            @yield('content')
        </main>
        @include('footer.footer')
    </div>
</body>

</html>
