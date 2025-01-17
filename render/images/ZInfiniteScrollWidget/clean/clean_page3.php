<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: white;
        font-family: sans-serif;
    }

    /* ---- parallax ---- */

    .sprite {
        background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/yoshis-island-parallax-sprite.png');
        background-repeat: no-repeat;
    }

    .parallax {
        width: 512px;
        position: relative;
        overflow-x: hidden;
        padding-bottom: 40px;
        background-position: 0 -1344px;
        margin: 40px auto 20px;
    }

    .parallax__carousel {

    }

    .parallax__carousel__cell {
        width: 512px;
        height: 448px;
    }

    .parallax__carousel__cell:nth-child(1) {
        background-position: -0px -448px;
    }

    .parallax__carousel__cell:nth-child(2) {
        background-position: -512px -448px;
    }

    .parallax__carousel__cell:nth-child(3) {
        background-position: -1024px -448px;
    }

    .parallax__carousel__cell:nth-child(4) {
        background-position: -1536px -448px;
    }

    .parallax__carousel__cell:nth-child(5) {
        background-position: -2048px -448px;
    }

    .parallax__layer {
        position: absolute;
        height: 448px;
        left: 0;
        top: 0;
    }

    .parallax__layer--bg {
        width: 2224px;
    }

    .parallax__layer--fg {
        pointer-events: none;
        width: 5200px;
        background-position: 0 -896px;
    }

    .flickity-page-dots .dot {
        background: black;
    }
</style>
<div class="parallax sprite">

    <div class="parallax__layer parallax__layer--bg sprite"></div>

    <div class="parallax__carousel">
        <div class="parallax__carousel__cell sprite"></div>
        <div class="parallax__carousel__cell sprite"></div>
        <div class="parallax__carousel__cell sprite"></div>
        <div class="parallax__carousel__cell sprite"></div>
        <div class="parallax__carousel__cell sprite"></div>
    </div>
    <div class="parallax__layer parallax__layer--fg sprite"></div>
</div>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
    var flkty = new Flickity('.parallax__carousel');

    var paraBG = document.querySelector('.parallax__layer--bg');
    var paraFG = document.querySelector('.parallax__layer--fg');
    var cellRatio = 1;
    var bgRatio = 0.75;
    var fgRatio = 2;

    flkty.on('scroll', function (progress) {
        paraBG.style.left = (0.5 - (0.5 + progress * 4) * cellRatio * bgRatio) * 100 + '%';
        paraFG.style.left = (0.5 - (0.5 + progress * 4) * cellRatio * fgRatio) * 100 + '%';
    });

    flkty.reposition();
</script>
