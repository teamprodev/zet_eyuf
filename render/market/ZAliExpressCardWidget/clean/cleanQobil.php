

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        img{
            width: 250px;
            height: 250px;
            border-radius: 10%;
        }
        img:hover{
            opacity: 0.7;
        }
        a {
            text-decoration: none;
            font-size: 20px;
            color: #999;
            font-weight: 400;
        }
        a:hover {
            color: red;
            text-decoration: none;
        }
        .text {
            text-decoration: line-through;
            color: #999;
        }


    </style>
</head>
<body onload="realtimeClock()">

<div class="row m-5">
    <div class="col-md-3">
        <h4>Быстрые сделки</h4>
    </div>
    <div class="col-md-3">
        <h4 id="clock"></h4>
    </div>
    <div class="col-md-3 offset-3 ">
        <a href="">СМОТРЕТЬ ЕЩЁ ></a>
    </div>
</div>
<div class="row m-5">
    <div class="col">
        <img src="../asset/SDETER.jpg" alt="">
        <h4 class="mt-2">1 782,81 руб.</h4>
        <h5 class="text">2 566,10 руб.</h5>
    </div>
    <div class="col">
        <img src="../asset/SANLEPUS.jpg" alt="">
        <h4 class="mt-2">1 782,81 руб.</h4>
        <h5 class="text">2 566,10 руб.</h5>
    </div>
    <div class="col">
        <img src="../asset/Remy.jpg" alt="">
        <h4 class="mt-2">1 782,81 руб.</h4>
        <h5 class="text">2 566,10 руб.</h5>
    </div>
    <div class="col">
        <img src="../asset/download.jpg" alt="">
        <h4 class="mt-2">1 782,81 руб.</h4>
        <h5 class="text">2 566,10 руб.</h5>
    </div>
</div>

<script>
    function realtimeClock() {
        var rtClock = new Date();

        var hours = rtClock.getHours();
        var minutes = rtClock.getMinutes();
        var seconds = rtClock.getSeconds();

        var amPm = ( hours < 12 ) ? "AM" : "PM";

        hours = (hours > 12) ? - 12 : hours;

        hours = ("0" + hours).slice(-2);
        minutes = ("0" + minutes).slice(-2);
        seconds = ("0" + seconds).slice(-2);

        document.getElementById('clock').innerText = hours + " : " + minutes + " : " + seconds;
        var t = setTimeout(realtimeClock, 500);
    }
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
