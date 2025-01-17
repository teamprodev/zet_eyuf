
    <script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=5fb7da25-bc18-4612-b304-83ea2266c510" type="text/javascript"></script>

    <style>
        html, body, #map {
            width: 100%; height: 900px; padding: 0; margin: 0;
        }
    </style>

<div id="map"></div>

<script>
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [59.22, 39.89],
                zoom: 12,
                controls: []
            }),
            // Creating an instance of the ymaps.control.SearchControl class.
            mySearchControl = new ymaps.control.SearchControl({
                options: {
                    noPlacemark: true
                }
            }),
            // The search results will be placed in the collection.
            mySearchResults = new ymaps.GeoObjectCollection(null, {
                hintContentLayout: ymaps.templateLayoutFactory.createClass('$[properties.name]')
            });
        myMap.controls.add(mySearchControl);
        myMap.geoObjects.add(mySearchResults);
        // When the found object is clicked, the placemark turns red.
        mySearchResults.events.add('click', function (e) {
            e.get('target').options.set('preset', 'islands#redIcon');
        });
        // Putting the selected result in the collection.
        mySearchControl.events.add('resultselect', function (e) {
            var index = e.get('index');
            mySearchControl.getResult(index).then(function (res) {
                mySearchResults.add(res);
            });
        }).add('submit', function () {
            mySearchResults.removeAll();
        })
    });

</script>
