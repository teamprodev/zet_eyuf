<?php
require '../../../../../../../../configs/ALL/Boot.php';
$boot=new Boot();
?>

<!DOCTYPE html>
<!-- saved from url=(0058)https://codyhouse.co/demo/animated-intro-section/mask.html -->
<html lang="en"
      class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
      style="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/publish/Animos/ALL/CSSJS/Introsection/demo_files/css.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/publish/Animos/ALL/CSSJS/Introsection/demo_files/reset.css">
    <link rel="stylesheet" href="/publish/Animos/ALL/CSSJS/Introsection/demo_files/style.css">

    <script src="/publish/Animos/ALL/CSSJS/Introsection/demo_files/modernizr.js"></script>
    <title>Mask - Animated Intro Section | CodyHouse</title>
    <style type="text/css">.demo-avd {
            position: fixed;
            width: 200px;
            border-radius: 0.3em;
            overflow: hidden;
            -webkit-box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            z-index: 99;
            top: 20px;
            right: 20px;
        }

        .demo-avd--light {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .demo-avd--dark {
            background-color: rgba(255, 255, 255, 0.8)
        }

        #cf {
            padding: 16px;
        }

        .demo-avd--light .demo-avd__label, .demo-avd--light .cf-powered-by {
            color: rgba(255, 255, 255, 0.7)
        }

        .demo-avd--light .demo-avd__text a, .demo-avd--light .cf-text {
            color: white;
        }

        .demo-avd--dark .demo-avd__label, .demo-avd--dark .cf-powered-by {
            color: rgba(0, 0, 0, 0.5)
        }

        .demo-avd--dark .demo-avd__text a, .demo-avd--dark .cf-text, .demo-avd--dark .cf-img-wrapper {
            color: rgba(0, 0, 0, 0.8)
        }

        .demo-avd__img a, .demo-avd__img svg, .cf-img-wrapper {
            display: block;
            max-width: 130px;
        }

        .demo-avd__text-wrapper {
            padding: 16px;
            font-family: sans-serif !important;
        }

        .demo-avd__label {
            text-transform: uppercase;
            font-size: 9px;
            letter-spacing: 0.1em;
            margin: 0 0 0.6em
        }

        .demo-avd__text a, .cf-text {
            font-size: 14px;
            display: block;
            line-height: 1.4
        }

        .demo-avd__text a:hover, .cf-text:hover {
            text-decoration: underline;
        }

        .cf-img-wrapper img {
            display: block;
        }

        .cf-powered-by {
            display: block;
            font-size: 11px;
            text-decoration: none;
        }

        .cf-text {
            margin: 16px 0px 8px;
            text-decoration: none;
        }

        .demo-avd__close {
            display: block;
            width: 32px;
            height: 32px;
            position: absolute;
            z-index: 1;
            top: 0;
            right: 0;
            background: url(demo_files/icon-avd-close.svg) no-repeat 0 0;
            opacity: 0.8;
            cursor: pointer;
        }

        .demo-avd--dark .demo-avd__close {
            background-image: url(demo_files/icon-avd-close-dark.svg);
        }

        .demo-avd__close:hover {
            opacity: 1
        }

        @media (max-width: 800px) {
            .demo-avd-cf {
                position: fixed;
                bottom: 0 !important;
                top: auto !important;
                left: 0 !important;
                right: 0 !important;
                width: 100% !important;
                border-radius: 0;
            }

            .demo-avd-cf.demo-avd-cf--top-mb {
                top: 0 !important;
                bottom: auto !important;
            }

            .cf-img-wrapper {
                display: none;
            }

            .cf-text {
                margin-top: 2px;
            ]
            }
        }</style>
</head>
<body>
<section class="cd-intro">
    <div class="cd-intro-content mask">
        <h1 data-content="Animated Intro Section"><span>Animated Intro Section</span></h1>
        <div class="action-wrapper">
            <p>
                <a href="https://codyhouse.co/demo/animated-intro-section/mask.html#0" class="cd-btn main-action">Get
                    started</a>
                <a href="https://codyhouse.co/demo/animated-intro-section/mask.html#0" class="cd-btn">Learn More</a>
            </p>
        </div>
    </div>
</section>
<div class="cd-demo-settings">
    <a href="https://codyhouse.co/gem/animated-intro-section" class="cd-demo-btn">Download</a>
    <div class="cd-select">
        <label for="selectAnimation">Effect:</label>
        <select class="animation" name="selectAnimation" id="selectAnimation">
            <option value="bouncy">Bounce</option>
            <option value="cut">Cut</option>
            <option value="mask" selected="">Mask</option>
            <option value="mask-2">Mask 2</option>
            <option value="parallax">Parallax</option>
            <option value="reveal">Reveal</option>
            <option value="scale">Scale</option>
            <option value="video">Video</option>
        </select>
    </div>
</div>
<script src="/publish/Animos/ALL/CSSJS/Introsection/demo_files/jquery-2.1.4.js"></script>
<script src="/publish/Animos/ALL/CSSJS/Introsection/demo_files/main.js"></script>

<div class="demo-avd demo-avd-cf demo-avd-cf--top-mb demo-avd--dark js-demo-avd"
     style="bottom: 30px; right: 30px; top: auto;">
    <div id="codefund">
        <div id="cf"><span> <span class="cf-wrapper"> <a class="cf-sponsored-by" data-href="campaign_url"
                                                         target="_blank" rel="sponsored noopener"
                                                         href="https://codefund.io/impressions/2db8a1a4-343b-4a20-a319-b429259b02ea/click?campaign_id=582&amp;creative_id=102&amp;property_id=237&amp;template=default&amp;theme=unstyled"> <span
                            class="cf-img-wrapper"> <img border="0" height="100" width="130" class="cf-img"
                                                         alt="DigitalOcean (JavaScript)"
                                                         src="./demo_files/RKVzvVA8ewgaaZYraTSkfVw9"> </span> <span class="cf-text"> <strong>DigitalOcean</strong> <span>Test out the most developer-friendly cloud platform with a $50 credit.</span> </span> </a> <a
                        href="https://codefund.io/invite/S4gfpTywkKY" data-target="powered_by_url" class="cf-powered-by"
                        target="_blank" rel="sponsored noopener"> <em>ethical</em> ad by CodeFund <img data-src="impression_url"
                                                                                                       alt=""
                                                                                                       src="./demo_files/pixel.gif"> </a> </span> </span>
        </div>
    </div>
    <div class="demo-avd__close"></div>
    <script type="text/javascript" async="" src="./demo_files/funder.js"></script>
</div>
<script src="/publish/Animos/ALL/CSSJS/Introsection/demo_files/demo-avd.js"></script>
<script>


    jQuery(document).ready(function ($) {
        var domain = 'http://codyhouse.co/demo/animated-intro-section/';
        $('.cd-demo-settings').on('change', function () {
            var animation = $('#selectAnimation').find("option:selected").val(),
                newFile = animation + '.html';
            window.location.href = domain + newFile;
        });
    });
</script>

</body>
</html>


