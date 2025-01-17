<style>
    body {
        margin: 0;
        padding: 0;
    }

    .infinity {
        width: 100%;
        height: 100%;
    }

    .infinity div {
        background: #000;
        width: 100%;
        height: 100px;
        animation: animate 1s linear forwards;
        transform-origin: left;
    }

    .infinity div:nth-child(7n+1) {
        background: #cd84f1;
    }

    .infinity div:nth-child(7n+2) {
        background: #ffcccc;
    }

    .infinity div:nth-child(7n+3) {
        background: #fffa65;
    }

    .infinity div:nth-child(7n+4) {
        background: #7efff5;
    }

    .infinity div:nth-child(7n+5) {
        background: #32ff7e;
    }

    .infinity div:nth-child(7n+6) {
        background: #ff3838;
    }

    .infinity div:nth-child(7n+7) {
        background: #4b4b4b;
    }

    @keyframes animate {
        0% {
            transform: scale(0);
        }
        0% {
            transform: scaleX(0);
        }
        100% {
            transform: scaleX(1);
        }
    }

</style>
<div class="infinity">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.js"></script>
<script type="text/javascript">
    $(window).scroll(function () {
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 500) {
            $('.infinity').append('<div></div>');
        }
    })
</script>
