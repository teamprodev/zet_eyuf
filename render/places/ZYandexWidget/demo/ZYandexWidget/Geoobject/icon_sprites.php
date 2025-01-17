
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=5fb7da25-bc18-4612-b304-83ea2266c510" type="text/javascript"></script>
   
    <style>
        html, body, #map {
            width: 100%; height: 900px; padding: 0; margin: 0;
        }
    </style>
<div id="map"></div>
<script>ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map('map', {
            center: [55.95, 32.44],
            zoom: 2
        }),

        myPlacemark1 = new ymaps.Placemark([55.85, 60.64], {
            balloonContent: 'Маленькая иконка'
        }, {
            iconLayout: 'default#image',
            iconImageClipRect: [[0,0], [26, 47]],
            iconImageHref: 'https://img.icons8.com/material/48/000000/marker--v1.png',
            iconImageSize: [15, 27],
            iconImageOffset: [-15, -27],
        }),

        myPlacemark2 = new ymaps.Placemark([55.85, 32.64], {
            balloonContent: 'Средняя иконка'
        }, {
            iconLayout: 'default#image',
            iconImageClipRect: [[34,0], [62, 46]],
            iconImageHref: 'https://img.icons8.com/material-outlined/48/000000/marker.png',
            iconImageSize: [26, 46],
            iconImageOffset: [-26, -46]
        }),

        myPlacemark3 = new ymaps.Placemark([55.85, 1.0], {
            balloonContent: 'Большая иконка'
        }, {
            iconLayout: 'default#image',
            iconImageClipRect: [[69,0], [97, 46]],
            iconImageHref: 'https://img.icons8.com/material-two-tone/48/000000/marker.png',
            iconImageSize: [35, 63],
            iconImageOffset: [-35, -63]
        });

    myMap.geoObjects.add(myPlacemark1)
        .add(myPlacemark2)
        .add(myPlacemark3);
}
</script>
