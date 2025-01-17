<?php


use zetsoft\system\Az;
use zetsoft\widgets\notifier\ZJspanelWidget; ?>

<link rel="stylesheet" href="/render/menus/ZSidebarWidget/assets/style.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.6.0/hint.min.css">-->


<div class="position-relative float-right align-middle h-100">
    <div>
        <div id="sidenavslider">
            <span id="side-menu-slider-right" class="h-100 position-absolute "><i
                        class="rounded-circle pl-1 d-flex align-items-center justify-content-center white-text fas fa-chevron-right fa-lg"></i></span>
            <span id="side-menu-slider-left" class=" h-100 position-absolute d-none"><i
                        class="rounded-circle d-flex align-items-center justify-content-center white-text fas fa-chevron-left fa-lg"></i></span>
        </div>
    </div>
    <ul class="menu-left misopen" id="side-icon-bar">

        <li>
            <a class="font-weight-bold hint--left hint--rounded hint--bounce" aria-label="Купоны" href="#">
                <span class="fas fa-archive"></span>
            </a>
        </li>
        <li>
            <a class="font-weight-bold hint--left hint--bounce" aria-label="Cписок пожеланий" href="#">
                <span class="far fa-heart"></span>
            </a></li>
        <li>
            <a class="font-weight-bold hint--left hint--rounded hint--bounce" aria-label="Панель" href="#">
                <span class="far fa-list-alt"></span>
            </a></li>
        <li>
            <a class="font-weight-bold hint--left hint--rounded" aria-label="Time out" href="#"><span
                        class="fa fa-clock-o" aria-hidden="true"></span>
            </a></li>
        <li>
            <a class="font-weight-bold hint--left hint--rounded" aria-label="История" href="#"><span
                        class="fas fa-history"></span>
            </a></li>

        <li class="mtop">
            <a class="font-weight-bold hint--left hint--rounded hint--bounce" aria-label="Поделиться" href="#">
                <span class="fas fa-share-alt"></span>
            </a>
        </li>
        <li>
            <a class="font-weight-bold hint--left" aria-label="Обратная связь" href="#">
                <span class="fas fa-pen"></span>
            </a>
        </li>
        <li class="scroll_top">
            <a id="" onclick="topFunction()" class="font-weight-bold hint--left hint--rounded hint--bounce"
               aria-label="Вверх" href="#">
                <span class="fas fa-chevron-up"></span>
            </a>
        </li>
    </ul>
</div>

<script>

    var sidenavslider = $('#sidenavslider');

    var sideiconbar = $('#side-icon-bar');
    var state = window.localStorage.getItem('sideBarStatus');
    if (state === 'open'){
        sideiconbar.show(100);
        sideiconbar.addClass('misopen');
        $('#side-menu-slider-right').removeClass('d-none');
        $('#side-menu-slider-left').addClass('d-none');
        sidenavslider.css('right', '90px');
        $('.navbar ').css({'width': '100%', 'transition': '0.5s'});
        $('body').css({'width': '97.3%', 'transition': '0.5s'});
        $('.content-footer').css({'width': '98%', 'transition': '0.5s'});
        $('.sticky-menu').css({'width': '98%', 'transition': '0.5s'});

    } else {
        sideiconbar.hide(100);
        sideiconbar.removeClass('misopen');
        $('#side-menu-slider-left').removeClass('d-none');
        $('#side-menu-slider-right').addClass('d-none');
        sidenavslider.css('right','60px');
        $('.navbar ').css({'width': '100%', 'transition': '0.5s'});
        $('body').css({'width': '100%', 'transition': '0.5s'});
        $('.content-footer').css({'width': '100%', 'transition': '0.5s'});
        $('.sticky-menu').css({'width': '100%', 'transition': '0.5s'});
    }
    // }
    // else {
    //      if (!sideiconbar.hasClass('misopen')){}else{
    //            sideiconbar.removeClass('misopen');
    //      }
    // }
    sidenavslider.find('i').css({'height': '35px', 'width': '35px', 'background-color': 'lightgray'});
    sidenavslider.find('i').mouseover(function(){
        $(this).addClass('z-depth-2');
        sidenavslider.find('i').removeClass('white-text');
        sidenavslider.find('i').addClass('green-text');
        sidenavslider.find('i').css({'background-color': 'white'});
    })
    sidenavslider.find('i').mouseleave(function(){
        $(this).removeClass('z-depth-2');
        sidenavslider.find('i').addClass('white-text');
        sidenavslider.find('i').removeClass('green-text');
        sidenavslider.find('i').css('background-color', 'lightgray');
    })
    sidenavslider.css({
        'background': 'none !important',
        'box-shadow': 'none !important',
        'position': 'fixed',
        'top': '50vh',
        'right': '50px',
        'transition': 'top 100',
        'z-index': '1'
    });
    (state === 'open') ? sidenavslider.css('right', '90px') : sidenavslider.css('right', '50px');
    sidenavslider.click(function (event) {
        if (sideiconbar.hasClass('misopen')) {
            window.localStorage.setItem('sideBarStatus','closed');
            sideiconbar.toggle(100);
            sideiconbar.toggleClass('misopen');
            $('#side-menu-slider-right').toggleClass('d-none', 1000);
            $('#side-menu-slider-left').toggleClass('d-none', 1000);
            sidenavslider.css({'right': '40px', 'transition': '0.5s'});
            $('.navbar ').css({'width': '100%', 'transition': '0.5s'});
            $('body').css({'width': '100%', 'transition': '0.5s'});
            $('.content-footer').css({'width': '100%', 'transition': '0.5s'});
        } else {
            window.localStorage.setItem('sideBarStatus','open');
            sidenavslider.css({'right': '80px', 'transition': '0.5s'});
            $('.menu-left').css('transition', '1s')
            sideiconbar.toggle(100);
            sideiconbar.toggleClass('misopen');
            $('.navbar ').css({'width': '100%', 'transition': '0.5s'});
            $('body').css({'width': '97.3%', 'transition': '0.5s'});
            $('.content-footer').css({'width': '98%', 'transition': '0.5s'});
            $('#side-menu-slider-right').toggleClass('d-none', 1000);
            $('#side-menu-slider-left').toggleClass('d-none', 1000);
        }
    });


    $(window).scroll(function (event) {
        var height = $(window).scrollTop();
        var lineHeight = $(window).height() / 2;
        sidenavslider.fadeIn().css('top', 'calc(40vh + ' + height + 'px)');
    })

    $('.scroll_top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1000);
    });

    $('.fa-list-alt').click(function () {
        $('#loggerPanel').toggle();
    });

    $('.fa-clock-o').click(function () {
        $('#timeoutPanel').toggle();
    });


</script>

<?php
echo ZJspanelWidget::widget([
    'config' => [
        'id' => 'loggerPanel',
        /*'iconbar' => [
            [
                'icon' => 'fa-eraser',
                'func' => 'panel.content.innerHTML = \'\';'
            ],
            [
                'icon' => 'fa-stop-circle',
                'func' =>  ""
            ],
        ],*/
        'headt' => Az::l('Процесс')
    ]
]);

echo ZJspanelWidget::widget([
    'config' => [
        'id' => 'timeoutPanel',
        'headt' => Az::l('Время вышло')
    ]
]);
?>
