<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Muuri</title>
    <script src="https://cdn.jsdelivr.net/npm/muuri@0.9.3/dist/muuri.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>
    <style>
        .grid {
            position: relative;
        }
        .item {
            display: block;
            position: absolute;
            width: 300px;
            height: 300px;
            margin: 5px;
            z-index: 1;
            background: #000;
            color: #fff;
        }
        .item.muuri-item-dragging {
            z-index: 3;
        }
        .item.muuri-item-releasing {
            z-index: 2;
        }
        .item.muuri-item-hidden {
            z-index: 0;
        }
        .item-content {
            position: relative;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="grid">

    <div class="item">
        <div class="item-content">
            <!-- Safe zone, enter your custom markup -->
            This can be anything.
            <!-- Safe zone ends -->
        </div>
    </div>

    <div class="item">
        <div class="item-content">
            <!-- Safe zone, enter your custom markup -->
            <div class="my-custom-content">
                Yippee!
            </div>
            <!-- Safe zone ends -->
        </div>
    </div>

</div>

<script>
    var grid = new Muuri('.grid', {
        dragEnabled: true,
        dragContainer: document.body,
        showDuration: 1000,
        dragSort: true,
        // dragAxis: 'x'
        // dragAxis: 'y'
        // dragStartPredicate: {
        //     distance: 100,
        //     delay: 100,
        // }

    });
</script>
</body>
</html>