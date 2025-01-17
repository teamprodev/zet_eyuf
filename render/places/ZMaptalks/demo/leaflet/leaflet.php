<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Leaflet rotated marker example</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }

        #map {
            width: 100%;
            height: 75vh;
        }

        .block_ac {
            height: 20%;
            width: 100%;
        }
    </style>

</head>

<body>
    <div id="map"></div>
    <div id="lat"></div>
    <div id="alpha"></div>
    <div id="beta"></div>
    <div id="gamma"></div>

    <script>

        var latLng = [0, 0];

        var map = L.map('map', {
            center: [41, 70],
            zoom: 25,
            layers: [
                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                })
            ]
        });

        var greenIcon = L.icon({
            iconUrl: 'https://cdn.pixabay.com/photo/2013/07/12/11/58/car-145008_960_720.png',
            iconSize:     [15, 30], // size of the icon
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var m = L.marker(map.getCenter(), {
            //center: latLng,
            //icon:  circle,
            rotationAngle: 0,
            draggable: false
        }).addTo(map);

        var routeA = []
        var routeB = []

       /* L.Routing.Formatter({
            language: 'en',
            roundingSensitivity: 5
        });*/
        r = L.Routing.control({
            waypoints: [
                routeA,
                routeB
            ],
            language: 'ru',
            show: true,
            routeDragInterval: 100,
            roundingSensitivity: -1,
            createMarker: function(i, routeB, n) {

                if (i == 0){
                return null;
                }
                return L.marker(routeB.latLng, {
                    draggable: true,
                    bounceOnAdd: true,
                    bounceOnAddOptions: {duration: 1000, height: 800, function(){(popup.openOn(map))}},

                })
            }

        }).addTo(map)



      //  if (navigator.geolocation) {
         //   navigator.geolocation.watchPosition(function (data) {

                /*
                map.addLayer(m.setRotationAngle(heading));

               document.getElementById('lat').innerHTML = "<p>" +
                    'Cordinate ' + heading + "</br>" +
                    "</p>";*/
               /*
                var lt = [data.coords.latitude, data.coords.longitude]

                m.setLatLng(lt);
                map.setView(m.getLatLng());
                routeB = [41.36330513730621, 69.29800944503123]
                r.setWaypoints([
                    L.latLng(lt),
                    routeB
                ])
            });    */
       // }

       /* navigator.geolocation.getCurrentPosition(function (data) {

        });*/



      
        // let heading = geolocationCoordinatesInstance.heading

        /* if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(showPosition)

         } else {
             // Browser doesn't support Geolocation
             handleLocationError(false, infoWindow, map.getCenter());
         }

         function showPosition(position) {
             console.log(position.coords)
         }   */
             var options = {
                 enableHighAccuracy: true,
                // timeout: 5000,
                 maximumAge: 0
             };


             function success(data) {

                 var lt = [data.coords.latitude, data.coords.longitude]

                 m.setLatLng(lt);
                 map.setView(m.getLatLng());
                 routeB = [41.36330513730621, 69.29800944503123]
                 r.setWaypoints([
                     L.latLng(lt),
                     routeB
                 ])

                /* var crd = pos.coords;

                 console.log('Your current position is:');
                 console.log(`Latitude : ${crd.latitude}`);
                 console.log(`Longitude: ${crd.longitude}`);
                 console.log(`More or less ${crd.accuracy} meters.`);
                 console.log(pos);
                 latLng = new L.LatLng(crd.latitude, crd.longitude);
                 m.setLatLng(latLng);
                 map.setView(m.getLatLng(), map.getZoom());
                 /!*latLng = new L.LatLng(crd.latitude, crd.longitude, map.getCenter());
                 m.setLatLng(latLng);
                 map.setView([crd.latitude, crd.longitude], 20)*!/

                 //m.center = [crd.latitude, crd.longitude];
                 //, m.getCenter())
               //  m.setLatLng(latLng).update();*/


             }

             function error(err) {
                 console.warn(`ERROR(${err.code}): ${err.message}`);
             }

             navigator.geolocation.watchPosition(success, error, options);
             //navigator.geolocation.watchPosition(success, error, options);
       /* let magSensor = new Magnetometer({frequency: 60});

        magSensor.addEventListener('reading', e => {
            alert("Magnetic field along the X-axis " + magSensor.x +
           "Magnetic field along the Y-axis " + magSensor.y
            + "Magnetic field along the Z-axis " + magSensor.z);
        })
        magSensor.addEventListener('error', event => {
            console.log(event.error.name, event.error.message);
        })
        magSensor.start();*/

        const sensor = new AbsoluteOrientationSensor();
        Promise.all([navigator.permissions.query({ name: "accelerometer" }),
            navigator.permissions.query({ name: "magnetometer" }),
            navigator.permissions.query({ name: "gyroscope" })])
            .then(results => {
                if (results.every(result => result.state === "granted")) {
                    sensor.start();
                   // sensor.getAbsoluteRectPosition()
                    console.log(sensor)
                    
                    //console.log(alpha)
                } else {
                    console.log("No permissions to use AbsoluteOrientationSensor.");
                }
            });

    </script>

</body>

</html>
