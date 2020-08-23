@include('layouts.head')

<body>
    @include('header.header')
    <div class="container">
        <h2 style="margin-top:50px;"class="text-center">地図で検索</h2>
        <div class="d-flex justify-content-center my-5">
            <button class="btn btn-danger mr-1" onclick="toTokyo()">東京で探す</button>
            <button class="btn btn-primary" onclick="toOsaka()">大阪で探す</button>
        </div>
    </div>

    <div id="app"></div>
    <div id="map"></div>

    @include('footer.footer')

    <script type="text/javascript" src="/js/google-map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('services.google-map.api') }}&callback=initMap"　async defer></script>
</body>

</html>
