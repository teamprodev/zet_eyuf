function setLanguage(data, azimuth) {
    
    console.log("data");
    console.log(data);
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
            "arrive": {
                "default": {
                    "default": "Вы прибыли в {nth} пункт назначения",
                    "upcoming": "Вы прибываете в {nth} пункт назначения",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}"
                },
                "left": {
                    "default": "Вы прибыли в {nth} пункт назначения, он находится слева",
                    "upcoming": "Вы прибываете в {nth} пункт назначения, он будет слева",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится слева"
                },
                "right": {
                    "default": "Вы прибыли в {nth} пункт назначения, он находится справа",
                    "upcoming": "Вы прибываете в {nth} пункт назначения, он будет справа",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится справа"
                },
                "sharp left": {
                    "default": "Вы прибыли в {nth} пункт назначения, он находится слева сзади",
                    "upcoming": "Вы прибываете в {nth} пункт назначения, он будет слева сзади",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится слева сзади"
                },
                "sharp right": {
                    "default": "Вы прибыли в {nth} пункт назначения, он находится справа сзади",
                    "upcoming": "Вы прибываете в {nth} пункт назначения, он будет справа сзади",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится справа сзади"
                },
                "slight right": {
                    "default": "Вы прибыли в {nth} пункт назначения, он находится справа впереди",
                    "upcoming": "Вы прибываете в {nth} пункт назначения, он будет справа впереди",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится справа впереди"
                },
                "slight left": {
                    "default": "Вы прибыли в {nth} пункт назначения, он находится слева впереди",
                    "upcoming": "Вы прибываете в {nth} пункт назначения, он будет слева впереди",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится слева впереди"
                },
                "straight": {
                    "default": "Вы прибыли в {nth} пункт назначения, он находится перед вами",
                    "upcoming": "Вы прибываете в {nth} пункт назначения, он будет перед вами",
                    "short": "Вы прибыли",
                    "short-upcoming": "Вы скоро прибудете",
                    "named": "Вы прибыли в пункт назначения, {waypoint_name}, он находится перед Вами"
                }
            },
            "continue": {
                "default": {
                    "default": "Двигайтесь {modifier}",
                    "name": "Двигайтесь {modifier} по {way_name:dative}",
                    "destination": "Двигайтесь {modifier} в направлении {destination}",
                    "exit": "Двигайтесь {modifier} на {way_name:accusative}"
                },
                "straight": {
                    "default": "Двигайтесь прямо",
                    "name": "Продолжите движение по {way_name:dative}",
                    "destination": "Продолжите движение в направлении {destination}",
                    "distance": "Двигайтесь прямо {distance}",
                    "namedistance": "Двигайтесь прямо {distance} по {way_name:dative}"
                },
                "sharp left": {
                    "default": "Резко поверните налево",
                    "name": "Резко поверните налево на {way_name:accusative}",
                    "destination": "Резко поверните налево в направлении {destination}",
                    "junction_name": "Резко поверните налево на {junction_name}"
                },
                "sharp right": {
                    "default": "Резко поверните направо",
                    "name": "Резко поверните направо на {way_name:accusative}",
                    "destination": "Резко поверните направо в направлении {destination}",
                    "junction_name": "Резко поверните направо на {junction_name}"
                },
                "slight left": {
                    "default": "Плавно поверните налево",
                    "name": "Плавно поверните налево на {way_name:accusative}",
                    "destination": "Плавно поверните налево в направлении {destination}",
                    "junction_name": "Плавно поверните налево на {junction_name}"
                },
                "slight right": {
                    "default": "Плавно поверните направо",
                    "name": "Плавно поверните направо на {way_name:accusative}",
                    "destination": "Плавно поверните направо в направлении {destination}",
                    "junction_name": "Плавно поверните направо на {junction_name}"
                },
                "uturn": {
                    "default": "Развернитесь",
                    "name": "Развернитесь и продолжите движение по {way_name:dative}",
                    "destination": "Развернитесь в направлении {destination}",
                    "junction_name": "Развернитесь и продолжите движение по {junction_name}"
                }
            },
            "depart": {
                "default": {
                    "default": "Двигайтесь в {direction} направлении",
                    "name": "Двигайтесь в {direction} направлении по {way_name:dative}",
                    "namedistance": "Двигайтесь {distance} в {direction} направлении по {way_name:dative}"
                }
            },
            "end of road": {
                "default": {
                    "default": "Поверните {modifier}",
                    "name": "Поверните {modifier} на {way_name:accusative}",
                    "destination": "Поверните {modifier} в направлении {destination}",
                    "junction_name": "Поверните {modifier} на {junction_name}"
                },
                "straight": {
                    "default": "Двигайтесь прямо",
                    "name": "Двигайтесь прямо по {way_name:dative}",
                    "destination": "Двигайтесь прямо в направлении {destination}",
                    "junction_name": "Двигайтесь прямо по {junction_name}"
                },
                "uturn": {
                    "default": "В конце дороги развернитесь",
                    "name": "Развернитесь в конце {way_name:genitive}",
                    "destination": "В конце дороги развернитесь в направлении {destination}",
                    "junction_name": "Развернитесь в конце {junction_name}"
                }
            },
            "fork": {
                "default": {
                    "default": "На развилке двигайтесь {modifier}",
                    "name": "На развилке двигайтесь {modifier} на {way_name:accusative}",
                    "destination": "На развилке двигайтесь {modifier} в направлении {destination}"
                },
                "slight left": {
                    "default": "На развилке держитесь левее",
                    "name": "На развилке держитесь левее на {way_name:accusative}",
                    "destination": "На развилке держитесь левее и продолжите движение в направлении {destination}"
                },
                "slight right": {
                    "default": "На развилке держитесь правее",
                    "name": "На развилке держитесь правее на {way_name:accusative}",
                    "destination": "На развилке держитесь правее и продолжите движение в направлении {destination}"
                },
                "sharp left": {
                    "default": "На развилке резко поверните налево",
                    "name": "Резко поверните налево на {way_name:accusative}",
                    "destination": "Резко поверните налево и продолжите движение в направлении {destination}"
                },
                "sharp right": {
                    "default": "На развилке резко поверните направо",
                    "name": "Резко поверните направо на {way_name:accusative}",
                    "destination": "Резко поверните направо и продолжите движение в направлении {destination}"
                },
                "uturn": {
                    "default": "На развилке развернитесь",
                    "name": "На развилке развернитесь на {way_name:prepositional}",
                    "destination": "На развилке развернитесь и продолжите движение в направлении {destination}"
                }
            },
            "merge": {
                "default": {
                    "default": "Перестройтесь {modifier}",
                    "name": "Перестройтесь {modifier} на {way_name:accusative}",
                    "destination": "Перестройтесь {modifier} в направлении {destination}"
                },
                "straight": {
                    "default": "Двигайтесь прямо",
                    "name": "Продолжите движение по {way_name:dative}",
                    "destination": "Продолжите движение в направлении {destination}"
                },
                "slight left": {
                    "default": "Перестройтесь левее",
                    "name": "Перестройтесь левее на {way_name:accusative}",
                    "destination": "Перестройтесь левее в направлении {destination}"
                },
                "slight right": {
                    "default": "Перестройтесь правее",
                    "name": "Перестройтесь правее на {way_name:accusative}",
                    "destination": "Перестройтесь правее в направлении {destination}"
                },
                "sharp left": {
                    "default": "Перестраивайтесь левее",
                    "name": "Перестраивайтесь левее на {way_name:accusative}",
                    "destination": "Перестраивайтесь левее в направлении {destination}"
                },
                "sharp right": {
                    "default": "Перестраивайтесь правее",
                    "name": "Перестраивайтесь правее на {way_name:accusative}",
                    "destination": "Перестраивайтесь правее в направлении {destination}"
                },
                "uturn": {
                    "default": "Развернитесь",
                    "name": "Развернитесь на {way_name:prepositional}",
                    "destination": "Развернитесь в направлении {destination}"
                }
            },
            "new name": {
                "default": {
                    "default": "Двигайтесь {modifier}",
                    "name": "Двигайтесь {modifier} на {way_name:accusative}",
                    "destination": "Двигайтесь {modifier} в направлении {destination}"
                },
                "straight": {
                    "default": "Двигайтесь прямо",
                    "name": "Продолжите движение по {way_name:dative}",
                    "destination": "Продолжите движение в направлении {destination}"
                },
                "sharp left": {
                    "default": "Резко поверните налево",
                    "name": "Резко поверните налево на {way_name:accusative}",
                    "destination": "Резко поверните налево и продолжите движение в направлении {destination}"
                },
                "sharp right": {
                    "default": "Резко поверните направо",
                    "name": "Резко поверните направо на {way_name:accusative}",
                    "destination": "Резко поверните направо и продолжите движение в направлении {destination}"
                },
                "slight left": {
                    "default": "Плавно поверните налево",
                    "name": "Плавно поверните налево на {way_name:accusative}",
                    "destination": "Плавно поверните налево в направлении {destination}"
                },
                "slight right": {
                    "default": "Плавно поверните направо",
                    "name": "Плавно поверните направо на {way_name:accusative}",
                    "destination": "Плавно поверните направо в направлении {destination}"
                },
                "uturn": {
                    "default": "Развернитесь",
                    "name": "Развернитесь на {way_name:prepositional}",
                    "destination": "Развернитесь и продолжите движение в направлении {destination}"
                }
            },
            "notification": {
                "default": {
                    "default": "Двигайтесь {modifier}",
                    "name": "Двигайтесь {modifier} по {way_name:dative}",
                    "destination": "Двигайтесь {modifier} в направлении {destination}"
                },
                "uturn": {
                    "default": "Развернитесь",
                    "name": "Развернитесь на {way_name:prepositional}",
                    "destination": "Развернитесь и продолжите движение в направлении {destination}"
                }
            },
            "off ramp": {
                "default": {
                    "default": "Сверните на съезд",
                    "name": "Сверните на съезд на {way_name:accusative}",
                    "destination": "Сверните на съезд в направлении {destination}",
                    "exit": "Сверните на съезд {exit}",
                    "exit_destination": "Сверните на съезд {exit} в направлении {destination}"
                },
                "left": {
                    "default": "Сверните на левый съезд",
                    "name": "Сверните на левый съезд на {way_name:accusative}",
                    "destination": "Сверните на левый съезд в направлении {destination}",
                    "exit": "Сверните на съезд {exit} слева",
                    "exit_destination": "Сверните на съезд {exit} слева в направлении {destination}"
                },
                "right": {
                    "default": "Сверните на правый съезд",
                    "name": "Сверните на правый съезд на {way_name:accusative}",
                    "destination": "Сверните на правый съезд в направлении {destination}",
                    "exit": "Сверните на съезд {exit} справа",
                    "exit_destination": "Сверните на съезд {exit} справа в направлении {destination}"
                },
                "sharp left": {
                    "default": "Поверните налево на съезд",
                    "name": "Поверните налево на съезд на {way_name:accusative}",
                    "destination": "Поверните налево на съезд в направлении {destination}",
                    "exit": "Поверните налево на съезд {exit}",
                    "exit_destination": "Поверните налево на съезд {exit} в направлении {destination}"
                },
                "sharp right": {
                    "default": "Поверните направо на съезд",
                    "name": "Поверните направо на съезд на {way_name:accusative}",
                    "destination": "Поверните направо на съезд в направлении {destination}",
                    "exit": "Поверните направо на съезд {exit}",
                    "exit_destination": "Поверните направо на съезд {exit} в направлении {destination}"
                },
                "slight left": {
                    "default": "Перестройтесь левее на съезд",
                    "name": "Перестройтесь левее на съезд на {way_name:accusative}",
                    "destination": "Перестройтесь левее на съезд в направлении {destination}",
                    "exit": "Перестройтесь левее на {exit}",
                    "exit_destination": "Перестройтесь левее на съезд {exit} в направлении {destination}"
                },
                "slight right": {
                    "default": "Перестройтесь правее на съезд",
                    "name": "Перестройтесь правее на съезд на {way_name:accusative}",
                    "destination": "Перестройтесь правее на съезд в направлении {destination}",
                    "exit": "Перестройтесь правее на съезд {exit}",
                    "exit_destination": "Перестройтесь правее на съезд {exit} в направлении {destination}"
                }
            },
            "on ramp": {
                "default": {
                    "default": "Сверните на автомагистраль",
                    "name": "Сверните на въезд на {way_name:accusative}",
                    "destination": "Сверните на въезд на автомагистраль в направлении {destination}"
                },
                "left": {
                    "default": "Сверните на левый въезд на автомагистраль",
                    "name": "Сверните на левый въезд на {way_name:accusative}",
                    "destination": "Сверните на левый въезд на автомагистраль в направлении {destination}"
                },
                "right": {
                    "default": "Сверните на правый въезд на автомагистраль",
                    "name": "Сверните на правый въезд на {way_name:accusative}",
                    "destination": "Сверните на правый въезд на автомагистраль в направлении {destination}"
                },
                "sharp left": {
                    "default": "Поверните на левый въезд на автомагистраль",
                    "name": "Поверните на левый въезд на {way_name:accusative}",
                    "destination": "Поверните на левый въезд на автомагистраль в направлении {destination}"
                },
                "sharp right": {
                    "default": "Поверните на правый въезд на автомагистраль",
                    "name": "Поверните на правый въезд на {way_name:accusative}",
                    "destination": "Поверните на правый въезд на автомагистраль в направлении {destination}"
                },
                "slight left": {
                    "default": "Перестройтесь левее на въезд на автомагистраль",
                    "name": "Перестройтесь левее на {way_name:accusative}",
                    "destination": "Перестройтесь левее на автомагистраль в направлении {destination}"
                },
                "slight right": {
                    "default": "Перестройтесь правее на въезд на автомагистраль",
                    "name": "Перестройтесь правее на {way_name:accusative}",
                    "destination": "Перестройтесь правее на автомагистраль в направлении {destination}"
                }
            },
            "rotary": {
                "default": {
                    "default": {
                        "default": "Продолжите движение по круговой развязке",
                        "name": "На круговой развязке сверните на {way_name:accusative}",
                        "destination": "На круговой развязке сверните в направлении {destination}"
                    },
                    "name": {
                        "default": "Продолжите движение по {rotary_name:dative}",
                        "name": "На {rotary_name:prepositional} сверните на {way_name:accusative}",
                        "destination": "На {rotary_name:prepositional} сверните в направлении {destination}"
                    },
                    "exit": {
                        "default": "На круговой развязке сверните на {exit_number} съезд",
                        "name": "На круговой развязке сверните на {exit_number} съезд на {way_name:accusative}",
                        "destination": "На круговой развязке сверните на {exit_number} съезд в направлении {destination}"
                    },
                    "name_exit": {
                        "default": "На {rotary_name:prepositional} сверните на {exit_number} съезд",
                        "name": "На {rotary_name:prepositional} сверните на {exit_number} съезд на {way_name:accusative}",
                        "destination": "На {rotary_name:prepositional} сверните на {exit_number} съезд в направлении {destination}"
                    }
                }
            },
            "roundabout": {
                "default": {
                    "exit": {
                        "default": "На круговой развязке сверните на {exit_number} съезд",
                        "name": "На круговой развязке сверните на {exit_number} съезд на {way_name:accusative}",
                        "destination": "На круговой развязке сверните на {exit_number} съезд в направлении {destination}"
                    },
                    "default": {
                        "default": "Продолжите движение по круговой развязке",
                        "name": "На круговой развязке сверните на {way_name:accusative}",
                        "destination": "На круговой развязке сверните в направлении {destination}"
                    }
                }
            },
            "roundabout turn": {
                "default": {
                    "default": "Двигайтесь {modifier}",
                    "name": "Двигайтесь {modifier} на {way_name:accusative}",
                    "destination": "Двигайтесь {modifier} в направлении {destination}"
                },
                "left": {
                    "default": "Сверните налево",
                    "name": "Сверните налево на {way_name:accusative}",
                    "destination": "Сверните налево в направлении {destination}"
                },
                "right": {
                    "default": "Сверните направо",
                    "name": "Сверните направо на {way_name:accusative}",
                    "destination": "Сверните направо в направлении {destination}"
                },
                "straight": {
                    "default": "Двигайтесь прямо",
                    "name": "Двигайтесь прямо по {way_name:dative}",
                    "destination": "Двигайтесь прямо в направлении {destination}"
                }
            },
            "exit roundabout": {
                "default": {
                    "default": "Сверните с круговой развязки",
                    "name": "Сверните с круговой развязки на {way_name:accusative}",
                    "destination": "Сверните с круговой развязки в направлении {destination}"
                }
            },
            "exit rotary": {
                "default": {
                    "default": "Сверните с круговой развязки",
                    "name": "Сверните с круговой развязки на {way_name:accusative}",
                    "destination": "Сверните с круговой развязки в направлении {destination}"
                }
            },
            "turn": {
                "default": {
                    "default": "Двигайтесь {modifier}",
                    "name": "Двигайтесь {modifier} на {way_name:accusative}",
                    "destination": "Двигайтесь {modifier} в направлении {destination}",
                    "junction_name": "Двигайтесь {modifier} на {junction_name}"
                },
                "left": {
                    "default": "Поверните налево",
                    "name": "Поверните налево на {way_name:accusative}",
                    "destination": "Поверните налево в направлении {destination}",
                    "junction_name": "Поверните налево на {junction_name}"
                },
                "right": {
                    "default": "Поверните направо",
                    "name": "Поверните направо на {way_name:accusative}",
                    "destination": "Поверните направо в направлении {destination}",
                    "junction_name": "Поверните направо на {junction_name}"
                },
                "straight": {
                    "default": "Двигайтесь прямо",
                    "name": "Двигайтесь по {way_name:dative}",
                    "destination": "Двигайтесь в направлении {destination}",
                    "junction_name": "Двигайтесь по {junction_name}"
                }
            },
            "use lane": {
                "no_lanes": {
                    "default": "Продолжайте движение прямо"
                },
                "default": {
                    "default": "{lane_instruction}"
                }
            }
        }
    }

    var type;

    if (data != null || data != undefined){
        var result, modifier = data.modifier;

        switch (data.type) {
            case "arrive":
                result = myLang.v5[data.type]["default"]["default"];
                break;
            case "continue":
                result = myLang.v5[data.type]["default"];
                break;
            case "merge":
                result = myLang.v5[data.type][modifier]["default"]["default"];
                break;
            case "depart":
                result = myLang.v5[data.type]["default"].default;
                result = result.replace(/{direction}/g, myLang.v5.constants.direction[azimuth]);
                break;
            case "end of road":
                result = myLang.v5[data.type]["default"]["default"];
                console.log(result);
                break;
            case "turn":
                result = myLang.v5.constants["modifier"][modifier];
                break;
            case "fork":
                result = myLang.v5[data.type][modifier]["default"];
                break;
            case "new name":
                result = myLang.v5[data.type]["default"]["default"];
                break;
            case "off ramp":
                result = myLang.v5[data.type][modifier]["default"];
                break;
            case "on ramp":
                result = myLang.v5[data.type][modifier]["default"];
                break;
            case "rotary":
                result = myLang.v5[data.type][modifier]["default"];
                break;
            case "roundabout":
                result = myLang.v5[data.type]["default"]["default"]["default"];
                break;
            case "roundabout turn":
                result = myLang.v5[data.type][modifier]["default"];
                break;
            case "exit roundabout":
                result = myLang.v5[data.type]["default"]["default"];
                break;
        }
           /*console.log(modifier);
           console.log("modifier");
           /*console.log(data.type);
           console.log("data.type");*/


/*        modifier = myLang.v5.constants.modifier[data.modifier];
        type = myLang.v5.constants.modifier[data.type];
        //modifier = data;

        myData = {
            modifier: modifier,
            type: type
        }
  */
        return result;

    }

    //console.log(modifier);

}


