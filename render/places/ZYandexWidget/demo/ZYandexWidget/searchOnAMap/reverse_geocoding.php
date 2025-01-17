    <script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=5fb7da25-bc18-4612-b304-83ea2266c510" type="text/javascript"></script>
    <script src="reverse_geocode.js" type="text/javascript"></script>
    <style type="text/css">
        html, body, #map {
            width: 100%;
            height: 900px;
            margin: 0;
            padding: 0;
        }
    </style>

<div id="map"></div>
<script>
    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map('map', {
            center: [55.753994, 37.622093],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        });

        // Search metro stations.
        ymaps.geocode(myMap.getCenter(), {
            /**
             * Request options
             * @see https://api.yandex.com/maps/doc/jsapi/2.1/ref/reference/geocode.xml
             */
            // Only looking for a metro station.
            kind: 'metro',
            // Requesting no more than 20 results.
            results: 20
        }).then(function (res) {
            // Setting the image for placemark icons.
            res.geoObjects.options.set('preset', 'islands#redCircleIcon');
            res.geoObjects.events
                // Displaying the hint with the name of the metro station when you hover over the placemark.
                .add('mouseenter', function (event) {
                    var geoObject = event.get('target');
                    myMap.hint.open(geoObject.geometry.getCoordinates(), geoObject.getPremise());
                })
                // Hiding the hint when the cursor goes off the placemark.
                .add('mouseleave', function (event) {
                    myMap.hint.close(true);
                });
            // Adding a collection of found geo objects to the map.
            myMap.geoObjects.add(res.geoObjects);
            // Zooming the map to the collection's viewport.
            myMap.setBounds(res.geoObjects.getBounds());
        });
    }

</script>
