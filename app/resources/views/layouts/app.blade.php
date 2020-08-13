@include('layouts.head')
<body>
    <div id="app">
        @include('header.header')
        <main class="py-5 my-5">
            @yield('content')
        </main>
    </div>
</body>

</html>
