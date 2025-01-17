<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/raty-js@2.9.0/lib/jquery.raty.css">
    <script src="https://cdn.jsdelivr.net/npm/raty-js@2.9.0/lib/jquery.raty.min.js"></script>
</head>
<body>
    <div id="1234"></div>
    <script>
            jQuery(function ($) {
                $('#1234').raty({
                    starType: "img",  // 'i'
                    cancel: true,
                    cancelClass: 'raty-cancel',
                    cancelHint: 'Cancel this rating!',
                    cancelOff: '/render/market/ZRatyWidget/demo/images/cancel-off.png',
                    cancelOn: '/render/market/ZRatyWidget/demo/images/cancel-on.png',
                    cancelPlace: 'right', // left
                    click: undefined,
                    half: false,
                    halfShow: true,
                    hints: ['bad', 'poor', 'regular', 'good', 'gorgeous'],  // any words
                    iconRange: undefined,
                    mouseout: undefined,
                    mouseover: undefined,
                    noRatedMsg: 'Not rated yet!',
                    number: 5,  // 1-numberMax
                    numberMax: 20, // any number
                    path: undefined,
                    precision: false,
                    readOnly: false,
                    score: undefined,
                    scoreName: 'score',     // any word
                    single: false,
                    space: true,
                    starHalf: '/render/market/ZRatyWidget/demo/images/star-half.png',
                    starOff: '/render/market/ZRatyWidget/demo/images/star-off.png',
                    starOn: '/render/market/ZRatyWidget/demo/images/star-on.png',
                    target: undefined,
                    targetForma: '{score}',
                    targetKeep: false,
                    targetScore: undefined,
                    targetText: '',
                    targetType: 'hint',

                })
            })
            ;
        
        // functions
        /*$('#1234').raty('score');                  // Get the current score.

        $('#1234').raty('click', 5);          // Click on some star.

        $('#1234').raty('destroy');                // Destroy the bind and give you the raw element.*/
        
    </script>
</body>
</html>
