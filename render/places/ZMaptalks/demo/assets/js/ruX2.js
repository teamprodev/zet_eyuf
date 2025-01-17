
function setLanguage(data, azimuth) {

    var myLang = {
        "meta": {
            "capitalizeFirstLetter": true
        },
        "v5": {
            "constants": {
                "ordinalize": {
                    "1": "первый",
                    "2": "второй",
                    "3": "третий",
                    "4": "четвёртый",
                    "5": "пятый",
                    "6": "шестой",
                    "7": "седьмой",
                    "8": "восьмой",
                    "9": "девятый",
                    "10": "десятый"
                },
                "direction": {
                    "north": "северном",
                    "northeast": "северо-восточном",
                    "east": "восточном",
                    "southeast": "юго-восточном",
                    "south": "южном",
                    "southwest": "юго-западном",
                    "west": "западном",
                    "northwest": "северо-западном"
                },
                "modifier": {
                    "left": "налево",
                    "right": "направо",
                    "sharp left": "налево",
                    "sharp right": "направо",
                    "slight left": "левее",
                    "slight right": "правее",
                    "straight": "прямо",
                    "uturn": "на разворот"
                },
                "lanes": {
                    "xo": "Держитесь правее",
                    "ox": "Держитесь левее",
                    "xox": "Держитесь посередине",
                    "oxo": "Держитесь слева или справа"
                }
            },
            "modes": {
                "ferry": {
                    "default": "Погрузитесь на паром",
                    "name": "Погрузитесь на паром {way_name}",
                    "destination": "Погрузитесь на паром в направлении {destination}"
                }
            },
            "phrase": {
                "two linked by distance": "{instruction_one}, затем через {distance} {instruction_two}",
                "two linked": "{instruction_one}, затем {instruction_two}",
                "one in distance": "Через {distance} {instruction_one}",
                "name and ref": "{name} ({ref})",
                "exit with number": "съезд {exit}"
            },

            /*
            *
            * start|XakimjonErgashov|2020-10-04
            05.10.2020
            44 lines js = 88
            * */

            "arrive": {
                "default": {
                    "default": "Вы прибыли в  пункт назначения",
                    "upcoming": "Вы прибываете в  пункт назначения",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}"
                },
                "left": {
                    "default": "Вы прибыли в  пункт назначения, он находится слева",
                    "upcoming": "Вы прибываете в  пункт назначения, он будет слева",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится слева"
                },
                "right": {
                    "default": "Вы прибыли в  пункт назначения, он находится справа",
                    "upcoming": "Вы прибываете в  пункт назначения, он будет справа",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится справа"
                },
                "sharp left": {
                    "default": "Вы прибыли в  пункт назначения, он находится слева сзади",
                    "upcoming": "Вы прибываете в  пункт назначения, он будет слева сзади",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится слева сзади"
                },
                "sharp right": {
                    "default": "Вы прибыли в  пункт назначения, он находится справа сзади",
                    "upcoming": "Вы прибываете в  пункт назначения, он будет справа сзади",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится справа сзади"
                },
                "slight right": {
                    "default": "Вы прибыли в  пункт назначения, он находится справа впереди",
                    "upcoming": "Вы прибываете в  пункт назначения, он будет справа впереди",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится справа впереди"
                },
                "slight left": {
                    "default": "Вы прибыли в  пункт назначения, он находится слева впереди",
                    "upcoming": "Вы прибываете в  пункт назначения, он будет слева впереди",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится слева впереди"
                },
                "straight": {
                    "default": "Вы прибыли в  пункт назначения, он находится перед вами",
                    "upcoming": "Вы прибываете в  пункт назначения, он будет перед вами",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится перед Вами"
                }
            },

            /*END*/

        }
    }
}


