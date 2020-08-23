@include('layouts.head')
<body>
    <v-app id="app">
        @include('alert.flash_message')
        @include('header.header')
        <main class="my-5 display-min-height">
            @yield('content')
        </main>
        @include('footer.footer')
    </v-app>
</body>


