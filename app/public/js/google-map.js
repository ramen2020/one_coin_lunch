var map;
var marker = [];
var infoWindow = [];
var currentInfoWindow = null;
var tokyo = {
    lat: 35.694362,
    lng: 139.698347
};

function initMap() {
    $.ajax({
        url: '/map/search',
        type: 'get',
    })
    .then(
        function (data) {
            return moldingMapData(data)
        },
        function () {
            console.error("can't get response");
        });
};

function moldingMapData(data) {
    var markerData = data.marker;
    var mapLatLng = new google.maps.LatLng(tokyo);
    map = new google.maps.Map(document.getElementById('map'), {
        center: mapLatLng,
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    });

    for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({
            lat: markerData[i]['latitude'],
            lng: markerData[i]['longitude']
        });
        marker[i] = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: markerLatLng,
        });

        infoWindow[i] = new google.maps.InfoWindow({
            content: '<div class="hukidashi">' +
                        '<img class="mb-4 hukidashi-img" ' +
                        'src="' + markerData[i]['image_name'] + '" alt="店舗の画像">' +
                        '<h4 class="panel-title"><a href="/restaurant/show/' + markerData[i]['id'] +
                        '" target="_blank">' +
                        markerData[i]['store_name'] + '</a></h4>' +
                        '<p>' + markerData[i]['address'] + '<br>' +
                        markerData[i]['low_budget'] + '円〜' + markerData[i]['high_budget'] + '円' +
                        '</p>' +
                    '</div>',
        });

        markerClickEvent(i);
    }
}

function markerClickEvent(i) {
    marker[i].addListener('click', function () {

        if (currentInfoWindow) {
            currentInfoWindow.close();
        }
        infoWindow[i].open(map, marker[i]);
        currentInfoWindow = infoWindow[i];
    });
}

function toTokyo() {
    map.panTo(new google.maps.LatLng(35.694362, 139.698347));
}

function toOsaka() {
    map.panTo(new google.maps.LatLng(34.68639, 135.52));
}
