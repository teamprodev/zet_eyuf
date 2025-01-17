    <script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=5fb7da25-bc18-4612-b304-83ea2266c510" type="text/javascript"></script>
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
        });

        // Finding coordinates of the center of Nizhny Novgorod.
        ymaps.geocode('Nizhny Novgorod', {
            /**
             * Request options
             * @see https://api.yandex.com/maps/doc/jsapi/2.1/ref/reference/geocode.xml
             */
            /**
             * Sorting the results from the center of the map window
             *  boundedBy: myMap.getBounds(),
             *  strictBounds: true,
             *  Together with the boundedBy option, the search will be strictly inside the area specified in boundedBy.
             *  If you need only one result, this will minimize the user's traffic.
             */
            results: 1
        }).then(function (res) {
            // Selecting the first result of geocoding.
            var firstGeoObject = res.geoObjects.get(0),
                // The coordinates of the geo object.
                coords = firstGeoObject.geometry.getCoordinates(),
                // The viewport of the geo object.
                bounds = firstGeoObject.properties.get('boundedBy');

            firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
            // Getting the address string and displaying it in the geo object icon.
            firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

            // Adding first found geo object to the map.
            myMap.geoObjects.add(firstGeoObject);
            // Scaling the map to the geo object viewport.
            myMap.setBounds(bounds, {
                // Checking the availability of tiles at the given zoom level.
                checkZoomRange: true
            });

            /**
             * All data in the form of a javascript object.
             */
            console.log('All the geo object data: ', firstGeoObject.properties.getAll());
            /**
             * The metadata of the request and geocoder response.
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/GeocoderResponseMetaData.xml
             */
            console.log('The metadata of the geocoder response: ', res.metaData);
            /**
             * Metadata of the geocoder returned for the found object.
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/GeocoderMetaData.xml
             */
            console.log('Geocoder metadata: ', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData'));
            /**
             * The accuracy of the response (precision) is only returned for houses.
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/precision.xml
             */
            console.log('precision', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.precision'));
            /**
             * The type of found object (kind).
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/kind.xml
             */
            console.log('Type of geo object: %s', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.kind'));
            console.log('Object name: %s', firstGeoObject.properties.get('name'));
            console.log('Object description: %s', firstGeoObject.properties.get('description'));
            console.log('Full object description: %s', firstGeoObject.properties.get('text'));
            /**
             * Direct methods for working with the geocoding results.
             * @see https://tech.yandex.com/maps/doc/jsapi/2.1/ref/reference/GeocodeResult-docpage/#getAddressLine
             */
            console.log('\nState: %s', firstGeoObject.getCountry());
            console.log('Municipality: %s', firstGeoObject.getLocalities().join(', '));
            console.log('Address of the object: %s', firstGeoObject.getAddressLine());
            console.log('Name of the building: %s', firstGeoObject.getPremise() || '-');
            console.log('Building number: %s', firstGeoObject.getPremiseNumber() || '-');

            /**
             * To add a placemark with its own styles and balloon content at the coordinates found by the geocoder, create a new placemark at the coordinates of the found placemark and add it to the map in place of the found one.
             */
            /**
             var myPlacemark = new ymaps.Placemark(coords, {
             iconContent: 'my placemark',
             balloonContent: 'Content of the <strong>my placemark</strong> balloon'
             }, {
             preset: 'islands#violetStretchyIcon'
             });

             myMap.geoObjects.add(myPlacemark);
             */
        });
    }

</script>
