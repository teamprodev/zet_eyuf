
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    <style>
        #map {
            width: 100%; height: 900px; padding: 0; margin: 0;
        }
    </style>

<div id="map"></div>
<script>ymaps.ready(init);

function init() {
    // Создаем карту.
    var myMap = new ymaps.Map("map", {
        center: [55.72, 37.44],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    });

    // Создаем ломаную, используя класс GeoObject.
    var myGeoObject = new ymaps.GeoObject({
        // Описываем геометрию геообъекта.
        geometry: {
            // Тип геометрии - "Ломаная линия".
            type: "LineString",
            // Указываем координаты вершин ломаной.
            coordinates: [
                [55.80, 37.50],
                [55.70, 37.40]
            ]
        },
        // Описываем свойства геообъекта.
        properties:{
            // Содержимое хинта.
            hintContent: "Я геообъект",
            // Содержимое балуна.
            balloonContent: "Меня можно перетащить"
        }
    }, {
        // Задаем опции геообъекта.
        // Включаем возможность перетаскивания ломаной.
        draggable: true,
        // Цвет линии - два значения
        strokeColor: ['#000',"#FFFF00"],
        // Ширина линии - два значения
        strokeWidth: [8,5]
    });

    // Создаем ломаную с помощью вспомогательного класса Polyline.
    var myPolyline = new ymaps.Polyline([
        // Указываем координаты вершин ломаной.
        [55.80, 37.50],
        [55.80, 37.40],
        [55.70, 37.50],
        [55.70, 37.40]
    ], {
        // Описываем свойства геообъекта.
        // Содержимое балуна.
        balloonContent: "Ломаная линия"
    }, {
        // Задаем опции геообъекта.
        // Отключаем кнопку закрытия балуна.
        balloonCloseButton: false,
        // Цвет линии - черная, белая и красная
        strokeColor: ["#000000","#FFF","#F00"],
        // Ширина линии.
        strokeWidth: [9,8,1],
        // Для третьей обводки задаем стиль
        strokeStyle: [0,0,'dash']
    });

    // Добавляем линии на карту.
    myMap.geoObjects
        .add(myGeoObject)
        .add(myPolyline);
}
</script>
