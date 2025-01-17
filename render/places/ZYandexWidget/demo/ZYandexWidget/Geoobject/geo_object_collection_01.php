
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    <script src="geo_object_collection.js" type="text/javascript"></script>
    <style>
        html, body, #map {
            width: 100%; height: 900px; padding: 0; margin: 0;
        }
    </style>


<div id="map"></div>
<script>ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
            center: [55.73, 37.75],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        yellowCollection = new ymaps.GeoObjectCollection(null, {
            preset: 'islands#yellowIcon'
        }),
        blueCollection = new ymaps.GeoObjectCollection(null, {
            preset: 'islands#blueIcon'
        }),
        yellowCoords = [[55.73, 37.75], [55.81, 37.75]],
        blueCoords = [[55.73, 37.65], [55.81, 37.65]];

    for (var i = 0, l = yellowCoords.length; i < l; i++) {
        yellowCollection.add(new ymaps.Placemark(yellowCoords[i]));
    }
    for (var i = 0, l = blueCoords.length; i < l; i++) {
        blueCollection.add(new ymaps.Placemark(blueCoords[i]));
    }

    myMap.geoObjects.add(yellowCollection).add(blueCollection);

    // Через коллекции можно подписываться на события дочерних элементов.
    yellowCollection.events.add('click', function () { alert('Кликнули по желтой метке') });
    blueCollection.events.add('click', function () { alert('Кликнули по синей метке') });

    // Через коллекции можно задавать опции дочерним элементам.
    blueCollection.options.set('preset', 'islands#blueDotIcon');
}
</script>
