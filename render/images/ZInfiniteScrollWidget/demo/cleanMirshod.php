<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
         <style>
             <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
             * { box-sizing: border-box; }

             body {
                 font-family: sans-serif;
             }

             /* ---- grid ---- */

           /*  .grid
             max-width: 1200px;
             }*/

             /* clear fix */
             .grid:after {
                 content: '';
                 display: block;
                 clear: both;
             }

             /* ---- .grid-item ---- */

             .grid-item,
             .grid-sizer {
                 width: 23.5%;
             }

             .gutter-sizer {
                 width: 2%;
             }

             .grid-item {
                 float: left;
                 height: 80px;
                 background: #09F;
                 counter-increment: item;
                 margin-bottom: 10px;
                 border-radius: 10px;
             }

             .grid-item:before {
                 font-size: 30px;
                 color: white;
                 text-align: center;
                 display: block;
                 padding: 0.4em;
                 content: counter(item);
             }

             .grid-item--height2 {
                 height: 120px;
                 background: #C25;
             }

             .grid-item--height3 {
                 height: 160px;
                 background: #EA0;
             }
             .big-text { font-size: 20px;
             }
         </style>
</head>
<body>
<p class="big-text">
    <button class="hor-order-button big-text">Toggle</button>
    <span class="status">horizontalOrder enabled</span>
</p>

<div class="grid">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>
    <div class="grid-item grid-item--height3"></div>
    <div class="grid-item grid-item--height2"></div>
    <div class="grid-item"></div>
    <div class="grid-item grid-item--height2"></div>
    <div class="grid-item"></div>
    <div class="grid-item grid-item--height3"></div>
    <div class="grid-item grid-item--height2"></div>
    <div class="grid-item"></div>
    <div class="grid-item grid-item--height2"></div>
    <div class="grid-item grid-item--height2"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item"></div>
    <div class="grid-item grid-item--height3"></div>
    <div class="grid-item"></div>
    <div class="grid-item grid-item--height2"></div>
    <div class="grid-item"></div>
    <div class="grid-item grid-item--height3"></div>
    <div class="grid-item grid-item--height2"></div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<script>
   
    // external js: masonry.pkgd.js

    var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        gutter: '.gutter-sizer',
        horizontalOrder: true, // new!
        percentPosition: true,
    });

    var isHorOrder = true;
    var $status = $('.status');

    // toggle horizontalOrder on click
    $('.hor-order-button').on( 'click', function() {
        isHorOrder = !isHorOrder;
        $grid.masonry({
            horizontalOrder: isHorOrder
        });
        var message = 'horizontalOrder ' +
            ( isHorOrder ? 'enabled' : 'disabled' );
        $status.text( message );
    });
</script>
</body>
</html>
