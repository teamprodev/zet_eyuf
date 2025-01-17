<!DOCTYPE html>
<!-- saved from url=(0062)https://codyhouse.co/demo/fixed-background-effect/index.html#0 -->
<html lang="en"
      class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
      style="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="https://codyhouse.co/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://codyhouse.co/assets/favicon/favicon-16x16.png">

    <link href="./Html_files/css.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./Html_files/reset.css">
    <link rel="stylesheet" href="./Html_files/style.css">
    <script async="" src="./Html_files/analytics.js"></script>
    <script src="./Html_files/modernizr.js"></script>
    <script src="./Html_files/modernizr.js"></script>
    <title>Fixed Background Effect | CodyHouse</title>
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
        background: url(../../assets/img/icon-avd-close.svg) no-repeat 0 0;
        opacity: 0.8;
        cursor: pointer;
    }

    .demo-avd--dark .demo-avd__close {
        background-image: url(../../assets/img/icon-avd-close-dark.svg);
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
<header class="cd-header is-visible" data-type="slider-item">
    <h1>Fixed Background Effect</h1>
    <div class="cd-nugget-info">
        <a href="https://codyhouse.co/gem/fixed-background-effect">
<span>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="16px" height="16px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
<style type="text/css">
							.cd-nugget-info-arrow {
                                fill: #383838;
                            }
						</style>
<polygon class="cd-nugget-info-arrow"
         points="15,7 4.4,7 8.4,3 7,1.6 0.6,8 0.6,8 0.6,8 7,14.4 8.4,13 4.4,9 15,9 "></polygon>
</svg>
</span>
            Article &amp; Download
        </a>
    </div>
</header>
<section class="cd-fixed-background img-1" data-type="slider-item">
    <div class="cd-content">
        <h2>Title here</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolor beatae, laudantium eos fugiat, deserunt
            delectus quibusdam quae placeat, tempora ea? Nulla ducimus, magnam sunt repellendus modi, ad ipsam est.</p>
    </div>
</section>
<section class="cd-fixed-background img-2" data-type="slider-item">
    <div class="cd-content light-background">
        <h2>Title here</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolor beatae, laudantium eos fugiat, deserunt
            delectus quibusdam quae placeat, tempora ea? Nulla ducimus, magnam sunt repellendus modi, ad ipsam est.</p>
    </div>
</section>
<section class="cd-fixed-background img-3" data-type="slider-item">
    <div class="cd-content">
        <h2>Title here</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolor beatae, laudantium eos fugiat, deserunt
            delectus quibusdam quae placeat, tempora ea? Nulla ducimus, magnam sunt repellendus modi, ad ipsam est.</p>
    </div>
</section>
<section class="cd-fixed-background img-4" data-type="slider-item">
    <div class="cd-content">
        <h2>Title here</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolor beatae, laudantium eos fugiat, deserunt
            delectus quibusdam quae placeat, tempora ea? Nulla ducimus, magnam sunt repellendus modi, ad ipsam est.</p>
    </div>
</section>
<nav>
    <ul class="cd-vertical-nav">
        <li><a href="https://codyhouse.co/demo/fixed-background-effect/index.html" class="cd-prev inactive">Next</a>
        </li>
        <li><a href="https://codyhouse.co/demo/fixed-background-effect/index.html" class="cd-next">Prev</a></li>
    </ul>
</nav>
<script src="./Html_files/jquery-2.1.1.js"></script>
<script src="./Html_files/main.js"></script>

<div class="demo-avd demo-avd-cf demo-avd--dark js-demo-avd" style="bottom: 30px; left: 30px; top: auto;">
    <div id="codefund">
        <div id="cf"><span> <span class="cf-wrapper"> <a class="cf-sponsored-by" data-href="campaign_url"
                                                         target="_blank" rel="sponsored noopener"
                                                         href="https://codefund.io/impressions/c5d99731-bdca-4e13-a422-0e584bab18ad/click?campaign_id=465&amp;creative_id=443&amp;property_id=237&amp;template=default&amp;theme=unstyled"> <span
                class="cf-img-wrapper"> <img border="0" height="100" width="130" class="cf-img" alt="Open Source 2"
                                             src="./Html_files/SBRG6DZ1oz25QjVkUuYdbuB3"> </span> <span class="cf-text"> <strong> Frontend Masters + Open Source = ❤️</strong> <span> $80,000+ 💰 donated to Webpack, Vue &amp; more!</span> </span> </a> <a
                href="https://codefund.io/invite/S4gfpTywkKY" data-target="powered_by_url" class="cf-powered-by"
                target="_blank" rel="sponsored noopener"> <em>ethical</em> ad by CodeFund <img data-src="impression_url"
                                                                                               alt=""
                                                                                               src="./Html_files/pixel.gif"> </a> </span> </span>
        </div>
    </div>
    <div class="demo-avd__close"></div>
    <script type="text/javascript" async="" src="./Html_files/funder.js"></script>
</div>
<script src="./Html_files/demo-avd.js"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-48014931-1', 'codyhouse.co');
    ga('set', 'anonymizeIp', true);
    ga('send', 'pageview');
</script>

<iframe class="searchbar024346698663504585" src="./Html_files/saved_resource.html" scrolling="no"
        style="border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; display: none; position: fixed; z-index: 2147483646; top: 0px; bottom: auto; left: auto; right: 0px; height: 40px; width: 100%;"></iframe>
<bdi class="searchbar024346698663504585"
     style="border: 1px solid rgb(176, 176, 176); margin: 0px; padding: 2px; outline: 0px; vertical-align: baseline; display: none; position: fixed; height: auto; width: auto; z-index: 2147483647; background: none rgb(255, 255, 255); max-height: none; max-width: none; min-height: 0px;">
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 0); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
    <bdi style="display: block; border: 0px; margin: 0px; padding: 0px; outline: 0px; vertical-align: baseline; position: static; height: auto; width: auto; z-index: 2147483647; font: 20px sans-serif; text-align: left; color: rgb(0, 0, 255); background: none rgb(255, 255, 255); cursor: default; max-height: none; max-width: none; min-height: 0px; min-width: 0px; letter-spacing: normal; text-decoration: none; text-indent: 0px; text-transform: none; word-spacing: normal; overflow-wrap: normal; white-space: pre;"></bdi>
</bdi>
<iframe class="searchbar024346698663504585" src="./Html_files/saved_resource(1).html" scrolling="no"
        style="border: 0px; margin: -186px 0px 0px -202px; padding: 0px; outline: 0px; vertical-align: baseline; display: none; position: fixed; top: 50%; left: 50%; z-index: 2147483645; border-radius: 5px;"></iframe>
</body>
<style>@media print {
    .searchbar024346698663504585 {
        display: none !important;
    }
}</style>
</html>
