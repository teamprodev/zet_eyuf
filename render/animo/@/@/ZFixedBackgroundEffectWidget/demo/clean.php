<!DOCTYPE html>

<html lang="en">
      
<head>
  
   
    <style>
        *, *::after, *::before {
    box-sizing: border-box
}

html, body {
    height: 100%
}

html {
    font-size: 62.5%
}

body {
    font-size: 1.6rem;
    font-family: open sans, sans-serif;
    color: #0f594d;
    background-color: #f2e6cd
}
 html, body, div,  ul, li{
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline
}

    ol, ul {
    list-style: none}
    
.cd-fixed-background {
    position: relative;
    padding: 3em 5% 0;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center
}

.cd-fixed-background h2, .cd-fixed-background p {
    color: #f2e6cd;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale
}

.cd-fixed-background h2 {
    font-size: 2.4rem;
    margin-bottom: 1em
}

.cd-fixed-background p {
    line-height: 1.6;
    font-family: merriweather, serif
}

.cd-fixed-background .light-background h2, .cd-fixed-background .light-background p {
    color: #0f594d
}

.cd-fixed-background .cd-content::after {
    content: '';
    display: block;
    width: 100%;
    padding: 60% 0;
    margin: 2em auto 0
}

.cd-fixed-background.img-1 {
    background-color: #bf5138
}

.cd-fixed-background.img-1 .cd-content::after {
    background: url(./Html_files/img-mobile-1.jpg) no-repeat;
    background-size: 100% auto
}

.cd-fixed-background.img-2 {
    background-color: #f2e6cd
}

.cd-fixed-background.img-2 .cd-content::after {
    background: url(./Html_files/img-mobile-2.jpg) no-repeat;
    background-size: 100% auto
}

.cd-fixed-background.img-3 {
    background-color: #0f594d
}

.cd-fixed-background.img-3 .cd-content::after {
    background: url(./Html_files/img-mobile-3.jpg) no-repeat;
    background-size: 100% auto
}

.cd-fixed-background.img-4 {
    background-color: #db9537
}

.cd-fixed-background.img-4 .cd-content::after {
    background: url(./Html_files/img-mobile-4.jpg) no-repeat;
    background-size: 100% auto
}
@media only screen and (min-width: 768px) {
    .cd-fixed-background {
        height: 100%;
        padding: 0
    }

    .cd-fixed-background h2 {
        font-size: 3.6rem;
        font-weight: 300
    }

    .cd-fixed-background p {
        font-size: 1.8rem;
        line-height: 1.8
    }

    .cd-fixed-background .cd-content {
        width: 50%;
        position: absolute;
        left: 5%;
        top: 50%;
        bottom: auto;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    .cd-fixed-background .cd-content::after {
        display: none !important
    }

   .cd-fixed-background.img-1 {
        background-image: url(./Html_files/img-1.jpg)
    }

    .cd-fixed-background.img-2 {
        background-image: url(./Html_files/img-2.jpg)
    }

    .cd-fixed-background.img-3 {
        background-image: url(./Html_files/img-3.jpg)
    }

    .cd-fixed-background.img-4 {
        background-image: url(./Html_files/img-4.jpg)
    }
}

@media only screen and (min-width: 1048px) {
    .cd-fixed-background {
        background-attachment: fixed
    }

    .cd-fixed-background .cd-content {
        width: 40%;
        left: 10%
    }
}

.cd-vertical-nav {
    position: fixed;
    z-index: 2;
    right: 3%;
    top: 50%;
    bottom: auto;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    display: none
}

.cd-vertical-nav a {
    display: block;
    height: 40px;
    width: 40px;
    overflow: hidden;
    text-indent: 100%;
    white-space: nowrap;
    background: transparent url(./Html_files/cd-icon-arrow.svg) no-repeat center center;
    -webkit-transition: opacity .2s 0s, visibility .2s 0s;
    -moz-transition: opacity .2s 0s, visibility .2s 0s;
    transition: opacity .2s 0s, visibility .2s 0s
}

.cd-vertical-nav a.cd-prev {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    transform: rotate(180deg);
    margin-bottom: 10px
}

.cd-vertical-nav a.inactive {
    visibility: hidden;
    opacity: 0;
    -webkit-transition: opacity .2s 0s, visibility 0s .2s;
    -moz-transition: opacity .2s 0s, visibility 0s .2s;
    transition: opacity .2s 0s, visibility 0s .2s
}

@media only screen and (min-width: 1200px) {
    .cd-vertical-nav {
        display: block
    }
}

.no-js .cd-vertical-nav {
    display: none
}

@media only screen and (min-width: 768px) {
    .cd-header h1 {
        font-size: 3.6rem;
        font-weight: 300
    }
}
   
    
.cd-header {
    position: relative;
    height: 100%;
    background-color: #93a748;
    box-shadow: 0 4px 20px rgba(0, 0, 0, .3);
    z-index: 1
}

.cd-header h1 {
    width: 90%;
    color: #f2e6cd;
    text-align: center;
    font-size: 2.2rem;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    position: absolute;
    left: 50%;
    top: 50%;
    bottom: auto;
    right: auto;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    -o-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%)
}


    </style>
    
</head>

<body>
<header class="cd-header" data-type="slider-item">
    
    
  
</header>
<section class="cd-fixed-background img-1" data-type="slider-item">
   
</section>
<section class="cd-fixed-background img-2" data-type="slider-item">
    
</section>
<section class="cd-fixed-background img-3" data-type="slider-item">
    
</section>
<section class="cd-fixed-background img-4" data-type="slider-item">
    
</section>
<nav>
    <ul class="cd-vertical-nav">
        <li><a  class="cd-prev inactive">Next</a>
        </li>
        <li><a  class="cd-next">Prev</a></li>
    </ul>
</nav>

<script>
jQuery(document).ready(function($){var animating=false;setSlider();$(window).on('scroll resize',function(){(!window.requestAnimationFrame)?setSlider():window.requestAnimationFrame(setSlider);});$('.cd-vertical-nav .cd-prev').on('click',function(){prevSection();});$('.cd-vertical-nav .cd-next').on('click',function(){nextSection();});$(document).keydown(function(event){if(event.which=='38'){prevSection();event.preventDefault();}else if(event.which=='40'){nextSection();event.preventDefault();}});function nextSection(){if(!animating){if($('.is-visible[data-type="slider-item"]').next().length>0)smoothScroll($('.is-visible[data-type="slider-item"]').next());}}
function prevSection(){if(!animating){var prevSection=$('.is-visible[data-type="slider-item"]');if(prevSection.length>0&&$(window).scrollTop()!=prevSection.offset().top){smoothScroll(prevSection);}else if(prevSection.prev().length>0&&$(window).scrollTop()==prevSection.offset().top){smoothScroll(prevSection.prev('[data-type="slider-item"]'));}}}
function setSlider(){checkNavigation();checkVisibleSection();}
function checkNavigation(){($(window).scrollTop()<$(window).height()/2)?$('.cd-vertical-nav .cd-prev').addClass('inactive'):$('.cd-vertical-nav .cd-prev').removeClass('inactive');($(window).scrollTop()>$(document).height()-3*$(window).height()/2)?$('.cd-vertical-nav .cd-next').addClass('inactive'):$('.cd-vertical-nav .cd-next').removeClass('inactive');}
function checkVisibleSection(){var scrollTop=$(window).scrollTop(),windowHeight=$(window).height();$('[data-type="slider-item"]').each(function(){var actualBlock=$(this),offset=scrollTop-actualBlock.offset().top;(offset>=0&&offset<windowHeight)?actualBlock.addClass('is-visible'):actualBlock.removeClass('is-visible');});}
function smoothScroll(target){animating=true;$('body,html').animate({'scrollTop':target.offset().top},500,function(){animating=false;});}});
</script>


</body>
</html>
