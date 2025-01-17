<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Current Location to Address</title>

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=5fb7da25-bc18-4612-b304-83ea2266c510"
            type="text/javascript"></script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
    <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
            center: [55.753994, 37.622093],
            zoom: 9,
            // Добавим кнопку для построения маршрутов на карту.
            controls: ['routeButtonControl']
        });

        var control = myMap.controls.get('routeButtonControl');

        // Зададим координаты пункта отправления с помощью геолокации.
        control.routePanel.geolocate('from');

        // Откроем панель для построения маршрутов.
        control.state.set('expanded', true);
        /////////////////////////////////////////// MAP1 //////////////////////////////////////////////

        /**
         *
         * https://tech.yandex.com/maps/jsapi/doc/2.1/ref/reference/Balloon-docpage/
         *
         */
            ////////////////////////////////////////BALLON /////////////////////////////////////////
            // Creating an independent balloon instance and displaying it in the center of the map.
        var balloon = new ymaps.Balloon(myMap);
// Here map options are set to parent options,
// where they contain default values for mandatory options.
        balloon.options.setParent(myMap.options);

// Opening a balloon at the center of the map:
        balloon.open(myMap.getCenter());



        myMap.balloon.open([41.3,69.25 ], "HERE I",
            {
                // Option: do not show the close button.
                closeButton: false,
                autoPan: true,
                autoPanCheckZoomRange:true,
                autoPanDuration:200,
                autoPanMargin: 34,
                autoPanUseMapMargin:true,
                closeTimeout:700,
                /*contentLayout: balloon,
                interactivityModel:'interactivityModel',*/
                layout:'islands#balloon',
                maxHeight:1400 ,
                maxWidht:1000 ,
                minHeight:100,
                minWidht:100,
                ofset: '',
                _openTimeout:1500,
                pane:'ballon',
                panelContentLayout:null,
                panelMaxHeightRatio:0,  //need 0
                panelMaxMapArea:1,
                shadow:true,
                /*shadowLayout:,*/
                shadowOffset:[0,0],
                zIndex:'2',
            });



        ////////////////////////////////////////BEHAVIOR /////////////////////////////////////////


// Here map options are set to parent options,
// where they contain default values for mandatory options.
        myMap.behaviors
            /**
             * Disabling some of the behaviors enabled by default:
             * - drag - moving the map while holding down the left mouse button;
             * - magnifier.rightButton - zooming in on the area selected with the right mouse button.
             */
            .disable(['drag', 'rightMouseButtonMagnifier'])
            // Enabling the ruler.
            .enable('unruler');          // need <--RULER

        /**
         * Using options to change the property of a behavior:
         * zooming with the scroll wheel will be slow,
         * 1/2 zoom level per second.
         */
        myMap.options.set('scrollZoomSpeed', 0,{
            DblClickZoom:{ centering: true,
                duration: 200,
                UseMapMargin: true,},


            Drag:{ actionCursor:'grabbing',
                cursor:'grab',
                inertia:true,
                inertiaDuration:true,
                tremor:2},

            LeftMouseButtonMagnifier:{
                actionCursor:'crosshari',
                cursor:'zoom',
                duration:300
            },
        });









    });



</script>
</body>
</html>
