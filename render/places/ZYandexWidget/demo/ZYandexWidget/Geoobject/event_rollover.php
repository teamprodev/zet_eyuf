
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>

    <style>
        html, body, #map {
            width: 100%; height: 900px; padding: 0; margin: 0;
        }
    </style>


<body>
<div id="map"></div>
</body>
    <script>ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map('map', {
                center: [55.755773, 37.617761],
                zoom: 9
            }, {
                searchControlProvider: 'yandex#search'
            }),
            myPlacemark = new ymaps.Placemark(myMap.getCenter());

        myMap.geoObjects.add(myPlacemark);

        myPlacemark.events
            .add('mouseenter', function (e) {
                // Ссылку на объект, вызвавший событие,
                // можно получить из поля 'target'.
                e.get('target').options.set('preset', 'islands#greenIcon');
            })
            .add('mouseleave', function (e) {
                e.get('target').options.unset('preset');
            });
    }
    </script>
