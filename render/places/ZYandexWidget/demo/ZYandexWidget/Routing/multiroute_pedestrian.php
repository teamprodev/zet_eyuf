    <script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=5fb7da25-bc18-4612-b304-83ea2266c510" type="text/javascript"></script>
   <style>
        html, body, #map {
            width: 100%; height: 600px; padding: 0; margin: 0;
        }
    </style>

<div id="map"></div>

  <script>
      function init() {
          // Setting points of the multi-stop route.
          var pointA = [55.749, 37.524],
              pointB = "Moscow, Red square",
              /**
               * Creating a multiroute.
               * @see https://api.yandex.com/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml
               */
              multiRoute = new ymaps.multiRouter.MultiRoute({
                  referencePoints: [
                      pointA,
                      pointB
                  ],
                  params: {
                      //The routing type - pedestrian.
                      routingMode: 'pedestrian'
                  }
              }, {
                  // Automatically set the map boundaries so the entire route is visible.
                  boundsAutoApply: true
              });

          // Creating a button.
          var changePointsButton = new ymaps.control.Button({
              data: {content: "Swap points A and B"},
              options: {selectOnClick: true}
          });

          // Declaring handlers for the button.
          changePointsButton.events.add('select', function () {
              multiRoute.model.setReferencePoints([pointB, pointA]);
          });

          changePointsButton.events.add('deselect', function () {
              multiRoute.model.setReferencePoints([pointA, pointB]);
          });

          // Creating the map with the button added to it.
          var myMap = new ymaps.Map('map', {
              center: [55.739625, 37.54120],
              zoom: 12,
              controls: [changePointsButton]
          }, {
              buttonMaxWidth: 300
          });

          // Adding a multiroute to the map.
          myMap.geoObjects.add(multiRoute);
      }

      ymaps.ready(init);

  </script>
