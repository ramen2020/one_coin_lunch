@include('layouts.head')
<body>
    <v-app id="app">
        @include('header.header')
        <main class="my-5 display-min-height">
            <div class="container">
                <div class="mx-auto">
                    <h1 class="mb-10">@yield('title')</h1>
                    <p>@yield('message')</p>
                    <p>@yield('content')</p>
                </div>
                @yield('link')
            </div>
        </main>
        @include('footer.footer')
    </v-app>
</body>


