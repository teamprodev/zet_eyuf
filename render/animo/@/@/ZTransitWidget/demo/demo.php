<!DOCTYPE html>
<!-- saved from url=(0038)http://ricostacruz.com/jquery.transit/ -->
<?php
require '../../../../../../../../configs/ALL/Boot.php';





?>
<html lang="en"
      class="-webkit- wf-opensans-i4-active wf-exo-n2-active wf-exo-n7-active wf-opensans-n4-active wf-active">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Transit - CSS transitions and transformations for jQuery</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="title"
          content="Create super-smooth CSS transitions and do interesting transformations using jQuery.">
    <meta property="og:title"
          content="Create super-smooth CSS transitions and do interesting transformations using jQuery.">
    <meta name="keywords" content="javascript, jquery, transit, css3, css, transition, transform">
    <meta property="og:image" content="http://ricostacruz.com/jquery.transit/preview.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://ricostacruz.com/jquery.transit/">
    <meta property="og:site_name" content="RicoStaCruz.com">
    <meta property="fb:admins" content="ricostacruz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


    <!-- [if lte IE8]
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6/html5shiv.min.js"></script><![endif] -->
    <script id="twitter-wjs" src="./demo_files/widgets.js.download"></script>
    <script src="./demo_files/hn.min.js.download"></script>
    <script async="" src="./demo_files/ga.js.download"></script>
    <script src="./demo_files/webfont.js.download" async=""></script>
    <script src="./demo_files/jquery.min.js.download"></script>
    <script src="./demo_files/prefixfree.min.js.download"></script>
    <style media=""
           data-href="assets/style.css?v=14845">html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, main-notes, summary, time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, main-notes {
            display: block
        }

        body {
            line-height: 1
        }

        ol, ul {
            list-style: none
        }

        blockquote, q {
            quotes: none
        }

        blockquote:before, blockquote:after, q:before, q:after {
            content: '';
            content: none
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        .clearfix, .example .in, .examples.tree, .section .info, .nav:after {
            content: '';
            display: table;
            clear: both;
            *zoom: 1
        }

        pre {
            white-space: pre-wrap
        }

        body, input, textarea, td {
            line-height: 1.5;
            font-family: Open Sans, sans-serif;
            color: #405060;
            font-size: 1em
        }

        body {
            font-size: 10pt
        }

        html {
            height: 100%;
            background: linear-gradient(315deg, rgba(0, 170, 255, 0.1), rgba(220, 110, 10, 0.2) 80%), url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/shattered.png);
            background-attachment: fixed, fixed;
            color: #444;
            box-shadow: inset 0 1px rgba(250, 250, 250, .4)
        }

        .card {
            background: #fff;
            box-shadow: 1px 1px 0 rgba(0, 0, 0, .1), -1px 1px 0 rgba(0, 0, 0, .1), 0 0 0 4px transparent, 0 2px 0 rgba(0, 0, 0, .1);
            border-radius: 2px;
            margin: 20px auto;
            padding-top: 40px;
            padding-bottom: 80px
        }

        @media (max-width: 600px) {
            .card {
                padding-top: 0;
                padding-bottom: 40px
            }
        }

        a {
            color: #39a;
            text-decoration: none
        }

        a:hover {
            color: #279
        }

        span.amp {
            opacity: .4;
            font-style: italic;
            font-family: palatino, serif
        }

        .l-page {
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
            max-width: 900px
        }

        .nav {
            border-bottom: solid 1px rgba(250, 250, 250, .3);
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
            padding-top: 20px;
            padding-bottom: 10px;
            margin-bottom: 30px
        }

        .nav ul {
            display: block
        }

        .nav .left {
            float: left
        }

        .nav .watch {
            height: 22px
        }

        .nav .watch > * {
            display: inline-block;
            vertical-align: middle
        }

        .nav .right {
            text-align: right;
            float: right
        }

        .nav li {
            display: inline
        }

        .nav a {
            display: inline-block;
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, .2);
            font-weight: 700;
            padding-right: 30px
        }

        .nav a:hover {
            text-decoration: underline
        }

        @media (max-width: 600px) {
            .nav {
                padding-left: 10px;
                padding-right: 10px;
                box-shadow: none;
                border-bottom: 0;
                margin-bottom: -20px
            }

            .nav .left, .nav .right {
                display: block;
                overflow: hidden;
                text-align: center;
                float: none
            }

            .nav .aux {
                display: none
            }
        }

        @media (max-width: 600px) {
            .nav {
                margin: 0 -10px -5px;
                padding: 10px;
                box-shadow: 0 0 7px rgba(0, 0, 0, .2);
                background: rgba(250, 250, 250, .8)
            }
        }

        .header {
            text-align: center;
            text-shadow: 1px 1px rgba(250, 250, 250, .6);
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            box-shadow: inset 0 -12px 18px -18px rgba(0, 0, 0, .1);
            border-bottom: solid 1px #ddd;
            line-height: 1.3;
            overflow: hidden;
            padding: 50px 40px 94px
        }

        .header h1 {
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            font-size: 42pt;
            font-family: exo, sans-serif;
            font-weight: 200;
            text-shadow: 2px 2px 0 rgba(30, 30, 30, .15);
            box-sizing: border-box
        }

        .header p {
            margin: 0 auto;
            max-width: 350px;
            font-weight: 200;
            color: #666;
            font-size: 15pt
        }

        .header .amp {
            opacity: 1
        }

        @media (min-width: 870px) {
            .header {
                padding-bottom: 94px;
                padding-top: 70px
            }

            .header p {
                margin: 23px 0 0;
                line-height: 1.3;
                padding-left: 20px;
                font-size: 14pt;
                text-align: left;
                float: left;
                font-style: normal
            }

            .header p:first-line {
                font-weight: 400
            }

            .header h1 {
                font-size: 52pt;
                width: 50%;
                float: left;
                text-align: right;
                padding-bottom: 20px;
                padding-right: 30px
            }
        }

        .subcontent {
            padding: 0
        }

        .subcontent .code, .subcontent .info {
            width: 100%;
            box-sizing: border-box;
            padding: 40px 80px
        }

        .subcontent .code {
            padding-top: 20px;
            padding-bottom: 20px;
            color: #555;
            text-shadow: 0 1px 0 rgba(250, 250, 250, .6);
            border-top: solid 1px #e7e7e7;
            border-bottom: solid 1px #e7e7e7;
            background: #eee
        }

        .subcontent .code pre {
            font-size: 1.1em;
            font-family: monaco, menlo, sans-serif;
            line-height: 1.6
        }

        .subcontent .code:first-child {
            border-top: 0;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px
        }

        .subcontent .code:last-child {
            box-shadow: inset 0 5px 3px -3px rgba(0, 0, 0, .07);
            border-top: solid 1px #ccc;
            border-bottom: 0;
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px
        }

        .subcontent h3 {
            font-family: exo, sans-serif;
            font-size: 1.7em;
            font-weight: 700
        }

        .subcontent code {
            background: #fafae0;
            font-size: .9em;
            padding: 1px 3px;
            box-shadow: 1px 1px rgba(0, 0, 0, .1);
            border-radius: 2px
        }

        @media (min-width: 600px) {
            .subcontent {
                line-height: 1.7
            }

            .subcontent p {
                padding-right: 20%
            }
        }

        @media (max-width: 600px) {
            .subcontent .code, .subcontent .info {
                padding-left: 20px;
                padding-right: 20px
            }
        }

        .main-notes {
            overflow: hidden;
            padding: 30px 120px 0
        }

        .main-notes p {
            float: left;
            width: 50%;
            box-sizing: border-box;
            padding: 0 20px;
            margin: 20px 0
        }

        .main-notes p strong {
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            font-size: 1.2em;
            font-family: exo, sans-serif;
            display: block;
            color: #444;
            font-weight: 700
        }

        @media (max-width: 600px) {
            .main-notes {
                padding: 0 20px
            }

            .main-notes p {
                width: auto;
                float: none
            }
        }

        .section {
            box-shadow: inset 0 1px rgba(0, 0, 0, .1), inset 0 5px 3px -3px rgba(0, 0, 0, .1);
            background-attachment: fixed, fixed;
            overflow: hidden;
            padding: 20px 20px 80px
        }

        .section.top {
            box-shadow: none;
            padding-top: 20px
        }

        @media (max-width: 600px) {
            .section {
                padding: 20px 10px
            }

            .section.top {
                padding-top: 0
            }
        }

        .section.after-top {
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, .1);
            background: rgba(200, 80, 200, .1)
        }

        .section.top {
            padding-bottom: 0
        }

        .section .o-line {
            position: relative;
            background: rgba(100, 0, 50, .2);
            width: 10px;
            height: 100px;
            margin: 0 auto;
            margin-top: -20px
        }

        .section.top .o-line {
            left: 4px;
            width: 10px;
            background: rgba(30, 140, 200, .2);
            box-shadow: -10px 0 0 rgba(30, 140, 200, .1);
            height: 180px
        }

        @media (max-width: 600px) {
            .section.top .o-line, .section .o-line {
                opacity: 0;
                height: 20px;
                background: 0 0;
                box-shadow: none
            }
        }

        .section.usage {
            background: linear-gradient(315deg, rgba(0, 0, 50, 0.5), rgba(0, 0, 50, 0.5) 80%), url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/noisy_grid.png);
            background-attachment: fixed, fixed;
            box-shadow: inset 0 5px 3px -3px rgba(0, 0, 0, .3);
            padding-top: 60px;
            padding-bottom: 0;
            border-top: solid 1px #aaa;
            border-bottom: solid 1px #aaa
        }

        .section.usage .heading {
            margin: 40px auto
        }

        .section.usage .heading:first-child {
            margin-top: 0
        }

        .section.usage .heading h2 {
            text-shadow: 0 1px 0 rgba(0, 0, 0, .2);
            margin: 0;
            color: #fff
        }

        .section.usage .info.slim h3 {
            font-size: 1.4em
        }

        .section.usage .info.slim {
            padding-bottom: 30px;
            padding-top: 30px
        }

        .section.usage .info.grey {
            box-shadow: inset 0 5px 3px -3px rgba(0, 0, 0, .07);
            background: #eee;
            border-bottom: solid 1px #ddd;
            border-top: solid 1px #ddd
        }

        .section.usage pre.figure {
            position: relative;
            background: #e0efef;
            border: solid 1px #c0d3d3;
            font-size: .8em;
            font-family: menlo, monospace;
            width: 320px;
            color: #305060;
            padding: 10px 20px
        }

        @media (max-width: 600px) {
            .section.usage pre.figure {
                overflow: auto;
                width: auto;
                margin-bottom: 20px
            }
        }

        @media (min-width: 600px) {
            .section.usage pre.figure {
                box-shadow: inset -8px 0 6px -6px rgba(0, 0, 0, .1), 0 1px 2px rgba(0, 0, 0, .1);
                border-top-right-radius: 4px;
                border-top-left-radius: 2px;
                border-bottom-left-radius: 2px;
                margin-right: -84px;
                margin-left: 30px;
                float: right
            }

            .section.usage pre.figure:after {
                content: '';
                display: block;
                position: absolute;
                bottom: -4px;
                right: -1px;
                border: solid 2px transparent;
                border-left-color: #a0c3c3;
                border-top-color: #a0c3c3;
                width: 0;
                height: 0;
                z-index: 0
            }
        }

        .supported-browsers {
            margin: 20px 0 0
        }

        .supported-browsers li {
            border: solid 1px #ccc;
            border-radius: 20px;
            margin-right: 10px;
            padding: 2px 12px;
            display: inline-block;
            font-size: .9em;
            font-weight: 700
        }

        .transformations-list li {
            padding: 5px 0;
            display: inline-block;
            width: 22%
        }

        .transformations-list strong {
            font-weight: 700
        }

        .transformations-list small {
            font-size: .9em
        }

        @media (max-width: 600px) {
            .section.usage .heading {
                margin-bottom: 20px
            }

            .section.usage {
                padding: 20px
            }

            .section.usage .card {
                margin-bottom: 0
            }

            .transformations-list li {
                width: 45%
            }
        }

        .section.more {
            box-shadow: none;
            margin-top: -1px;
            background: linear-gradient(315deg, rgba(255, 90, 200, 0.1), rgba(0, 170, 255, 0.07)), linear-gradient(90deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.1)), url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/shattered.png);
            background-attachment: fixed, fixed
        }

        .section.more .heading h2 {
            color: #70649a;
            text-shadow: 0 1px 0 rgba(250, 250, 250, .8)
        }

        .section.more.darker {
            box-shadow: inset 0 -2px 0 rgba(0, 0, 0, .1);
            margin-top: -1px;
            background: linear-gradient(90deg, rgba(200, 0, 0, 0.2), rgba(200, 0, 0, 0.2)), url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/shattered.png);
            background-attachment: fixed, fixed
        }

        .section.more.darker .heading p {
            opacity: 1;
            color: #544;
            text-shadow: 0 1px 0 rgba(250, 250, 250, .2), 0 0 3px rgba(250, 250, 250, .2)
        }

        .section.more.darker .heading h2 {
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, .2), 0 0 3px rgba(0, 0, 0, .2)
        }

        .section.easing {
            box-shadow: inset 0 1px rgba(0, 0, 0, .1);
            background: linear-gradient(315deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.6)), url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/shattered.png)
        }

        .section.easing .heading h2 {
            color: #5ad
        }

        .section.easing .examples {
            background-color: rgba(0, 0, 0, .05)
        }

        .supported-easing {
            text-align: center;
            padding: 20px 40px
        }

        .supported-easing h4 {
            margin: 40px 0 20px;
            font-family: exo, sans-serif;
            font-size: 1.3em;
            font-weight: 400
        }

        .supported-easing li:before {
            content: '\2219';
            display: inline-block;
            margin-right: 10px;
            color: #aaa
        }

        .supported-easing ul {
            line-height: 1.8;
            font-size: 0
        }

        .supported-easing li {
            display: inline-block;
            font-size: 8pt;
            color: #555;
            padding: 0 0 0 10px;
            border-radius: 20px
        }

        .download {
            position: relative;
            margin-top: -65px
        }

        .download a {
            margin: 0 auto;
            display: block;
            width: 120px;
            border: solid 5px #fff;
            border-radius: 70px;
            position: relative;
            z-index: 1;
            transition: all 100ms ease
        }

        .download a .in {
            display: table-cell;
            vertical-align: middle;
            line-height: 1.3;
            background: #fff;
            width: 120px;
            height: 120px;
            border-radius: 61px;
            text-shadow: 0 0 1px rgba(0, 0, 0, .4);
            line-height: 1.4;
            text-align: center
        }

        .download a strong, .download a small {
            display: block;
            padding: 0 10px
        }

        .download a strong {
            font-family: exo, sans-serif;
            font-weight: 700;
            font-size: 1.6em
        }

        .download a small {
            text-transform: uppercase;
            font-size: .9em
        }

        .download a .in {
            border: solid 2px #444;
            transition: all 150ms linear
        }

        .download a strong {
            color: #444
        }

        .download a small {
            color: #444
        }

        .download a:hover .in {
            border-color: #222;
            background: #222
        }

        .download a:hover strong {
            color: #fff
        }

        .download a:hover small {
            color: #bbb
        }

        .heading {
            margin: 50px auto;
            color: #456;
            text-shadow: 0 1px 0 rgba(250, 250, 250, .2);
            text-align: center
        }

        .heading h2 {
            line-height: 1.2;
            margin-bottom: 3px;
            font-size: 28pt;
            font-family: exo, sans-serif;
            font-weight: 200
        }

        @media (min-width: 600px) {
            .heading h2.bigger {
                font-size: 36pt
            }
        }

        .heading p {
            font-size: 1.1em;
            opacity: .8;
            line-height: 1.6;
            padding: 0 140px
        }

        .heading code {
            padding: 1px 3px;
            border-radius: 2px;
            font-size: .9em;
            background: rgba(250, 250, 250, .3)
        }

        @media (max-width: 600px) {
            .heading {
                padding: 0 20px;
                text-align: left;
                margin: 20px auto
            }

            .heading h2 {
                font-size: 22pt
            }

            .heading p {
                font-size: 1em;
                padding: 0
            }
        }

        .examples {
            margin-top: 10px;
            background: rgba(0, 0, 0, .1);
            border-radius: 4px;
            box-shadow: inset 1px 1px 0 rgba(0, 0, 0, .1);
            padding: 10px;
            font-size: 0
        }

        .example {
            box-sizing: border-box;
            display: inline-block;
            vertical-align: top;
            text-align: left;
            font-size: 10pt;
            box-sizing: border-box;
            padding: 0
        }

        .single .example {
            width: 100%
        }

        .trio .example {
            width: 33.33333%
        }

        @media (min-width: 600px) {
            .trio .example:last-child:nth-child(3n+1) {
                width: 100%
            }

            .trio .example:last-child:nth-child(3n+2) {
                width: 66.6666%
            }
        }

        @media (max-width: 600px) {
            .examples {
                padding-right: 10px
            }

            .trio .example:last-child:nth-child(2n+1) {
                width: 100%
            }

            .trio .example {
                width: 50%
            }
        }

        @media (max-width: 400px) {
            .trio .example, .duo .example, .example {
                padding-bottom: 10px;
                width: 100%
            }
        }

        .duo .example {
            width: 50%
        }

        @media (max-width: 600px) {
            .duo .example {
                width: 100%
            }
        }

        @media (max-width: 600px) {
            .examples.tree {
                background: 0 0;
                box-shadow: none;
                padding: 0
            }

            .tree .example {
                padding-bottom: 10px;
                width: 100%
            }

            .tree .example:last-child {
                padding-bottom: 0
            }
        }

        @media (min-width: 600px) {
            .examples.tree {
                width: 900px;
                position: relative;
                background: 0 0;
                box-shadow: none;
                padding: 0
            }

            .examples.tree:after {
                content: '';
                display: block;
                position: absolute;
                left: 50%;
                top: 50px;
                bottom: -80px;
                width: 6px;
                margin-left: -3px;
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .07);
                background-color: rgba(90, 184, 190, .3);
                background: linear-gradient(270deg, rgba(90, 184, 190, 0.3) 40%, rgba(190, 90, 90, 0.3) 60%)
            }

            .tree .example {
                position: relative;
                margin-bottom: 20px;
                width: 50%;
                display: block
            }

            .tree .example:nth-child(odd) {
                float: left;
                clear: both;
                padding-right: 40px
            }

            .tree .example:nth-child(even) {
                clear: right;
                float: right;
                margin-top: 30px;
                padding-left: 40px
            }

            .tree .example:after {
                content: '';
                display: block;
                width: 20px;
                height: 20px;
                border-radius: 10px;
                background: #555;
                box-shadow: 0 0 5px rgba(0, 0, 0, .1), 1px 1px 0 rgba(0, 0, 0, .2), inset 0 0 0 3px #fafafa;
                position: absolute;
                z-index: 1
            }

            .tree .example:nth-child(odd):after {
                top: 30px;
                right: -10px
            }

            .tree .example:nth-child(even):after {
                bottom: 40px;
                left: -10px
            }

            .tree .example .in:before, .tree .example .in:after {
                content: '';
                display: block;
                width: 0;
                height: 0;
                border: solid 12px transparent;
                position: absolute
            }

            .tree .example:nth-child(odd) .in:before, .tree .example:nth-child(odd) .in:after {
                top: 30px;
                right: -24px
            }

            .tree .example:nth-child(odd) .in:after {
                border-left-color: #fff
            }

            .tree .example:nth-child(odd) .in:before {
                margin-top: 1px;
                border-left-color: rgba(0, 0, 0, .3)
            }

            .tree .example:nth-child(even) .in:before, .tree .example:nth-child(even) .in:after {
                bottom: 35px;
                left: -24px
            }

            .tree .example:nth-child(even) .in:after {
                border-right-color: #fff
            }

            .tree .example:nth-child(even) .in:before {
                margin-top: 1px;
                border-right-color: rgba(0, 0, 0, .9)
            }

            .tree .example:nth-child(even).playing .in:after {
                border-right-color: #edfafa
            }

            .tree .example:nth-child(odd).playing .in:after {
                border-left-color: #edfafa
            }
        }

        @media (min-width: 600px) and (max-width: 940px) {
            .examples.tree {
                width: auto
            }

            .tree .example {
                margin-bottom: 5px
            }

            .tree .example:nth-child(odd) {
                padding-right: 30px
            }

            .tree .example:nth-child(even) {
                padding-left: 30px
            }
        }

        .examples.single .example {
            padding-bottom: 1px
        }

        .example .in {
            position: relative;
            width: 100%;
            box-shadow: 1px 1px rgba(0, 0, 0, .1), 1px 1px rgba(0, 0, 0, .1), 0 0 1px 1px rgba(0, 0, 0, .1);
            border-radius: 2px;
            background-color: #fff;
            transition: all 100ms linear
        }

        .example.playing .in {
            background-color: #edfafa
        }

        .example h3 {
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            color: #507080;
            font-weight: 700
        }

        .example .area {
            min-width: 32px;
            min-height: 32px;
            position: relative
        }

        @media (max-width: 600px) {
            .example .area {
                height: 100px
            }
        }

        .example.slim .area {
            height: 80px
        }

        .example .box, .example .ghost {
            opacity: .8;
            position: absolute;
            left: 50%;
            top: 50%;
            background: #505060;
            border-radius: 1px;
            box-shadow: inset 0 0 0 2px rgba(0, 0, 0, .2);
            margin: -16px 0 0 -16px;
            width: 32px;
            height: 32px;
            z-index: 2
        }

        .example .ghost {
            z-index: 1;
            background: #e5eeee;
            box-shadow: inset 2px 2px 3px rgba(0, 0, 0, .2), inset 0 0 0 1px rgba(0, 0, 0, .05)
        }

        .example pre {
            text-shadow: 1px 1px 0 rgba(250, 250, 250, .9);
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            font-style: italic;
            white-space: pre-wrap
        }

        .example pre b {
            border-radius: 2px;
            box-shadow: 1px 1px rgba(0, 0, 0, .1);
            padding: 1px 2px;
            background: #fafad0
        }

        .example.start-from-left .box, .example.start-from-left .ghost {
            left: 40px
        }

        .example.normal .area {
            height: 150px
        }

        .example.normal h3 {
            padding: 20px 20px 0;
            margin-bottom: -20px;
            text-align: right
        }

        .example.normal .code {
            box-shadow: inset 0 5px 3px -3px rgba(0, 0, 0, .07);
            background: #eee;
            padding: 20px;
            border-top: solid 1px #ccc;
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px
        }

        .example.normal .code h4 {
            font-weight: 700
        }

        .example.slim .in {
            position: relative;
            box-sizing: border-box;
            padding: 20px 20px 20px 80px
        }

        .example.slim .area {
            position: absolute;
            left: 40px;
            top: 40px
        }

        .example.slim .box, .example.slim .ghost {
            left: 0;
            top: 0
        }

        .example.easing .area {
            top: 50px
        }

        .example.easing .box, .example.easing .ghost {
            border-radius: 16px
        }

        .example.easing.playing h3, .example.easing.playing p, .example.easing.playing .code {
            opacity: 0
        }

        .example.easing.playing .ghost {
            width: 242px
        }

        .section.extras {
            background: rgba(230, 250, 250, .5)
        }

        @media (min-width: 600px) {
            .section.extras .heading h2 {
                font-size: 36pt
            }
        }

        .section.extras .example h3 {
            font-family: exo, sans-serif;
            font-size: 1.4em;
            line-height: 1.3;
            margin-bottom: 5px;
            color: #6ab
        }

        .extras .example .code {
            border-top: dotted 1px #ccc;
            box-shadow: inset 0 5px 3px -3px rgba(0, 0, 0, .07);
            padding: 20px;
            margin: 20px -80px -20px -20px
        }

        .section.extras .example .area {
            left: auto;
            right: 10px
        }

        .section.extras .example .in {
            padding-right: 80px;
            padding-left: 20px
        }

        .section.credits {
            margin-top: -1px;
            padding-top: 80px;
            background-color: #111;
            background: linear-gradient(315deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)), url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/noisy_grid.png);
            background-attachment: fixed, fixed;
            font-size: .8em;
            color: #777
        }

        .section.credits .iconish {
            color: #555;
            font-size: 30pt
        }

        .section.credits a {
            color: #ccc
        }

        .section.credits .subcontent {
            overflow: hidden
        }

        .section.credits ul, .section.credits p {
            width: 25%;
            float: left;
            padding-right: 20px;
            box-sizing: border-box;
            padding-bottom: 20px
        }

        @media (max-width: 600px) {
            .section.credits {
                line-height: 1.6;
                padding: 40px 20px 30px
            }

            .section.credits ul, .section.credits p {
                padding-bottom: 15px;
                width: auto;
                float: none
            }
        }

        .gap {
            margin-top: -1px;
            margin-bottom: -1px
        }

        .gap.hard {
            border-top: solid 5px #f0f0f0
        }

        .gap.dark {
            border-top: solid 3px #222
        }

        .gap.dark .thing {
            border-color: #222
        }

        .gap .thing {
            margin: -30px auto;
            display: block;
            box-sizing: border-box;
            width: 60px;
            height: 60px;
            border-radius: 30px;
            text-align: center;
            line-height: 50px;
            position: relative;
            z-index: 2;
            transition: all 100ms linear;
            font-size: 5pt
        }

        .gap .thing:before {
            content: '\25b2'
        }

        .gap .thing {
            background: #f0f0f0;
            border: solid 5px #f0f0f0;
            color: #888;
            box-shadow: 0 2px 2px rgba(0, 0, 0, .1)
        }

        .gap .thing:hover {
            color: #fff;
            background: #5ad
        }

        @media (max-width: 600px) {
            .gap, .gap thing {
                display: none
            }
        }

        .gap.blue .thing {
            color: #fff;
            background-color: #5ad
        }

        .gap.blue .thing:hover {
            background-color: #222
        }</style>
    <script src="./demo_files/jquery.transit.js.download"></script>
    <script src="./demo_files/equalize.js.download"></script>
    <script src="./demo_files/script.js.download"></script>
    <script>WebFontConfig = {google: {families: ["Exo:200,700", "Open Sans:400,400italic"]}}, function (a, b) {
            var c = a.createElement(b);
            c.src = "http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js", c.async = 1;
            var d = a.getElementsByTagName(b)[0];
            d.parentNode.insertBefore(c, d)
        }(document, "script")</script>
    <script>location.hostname.match(/ricostacruz\.com/) && (_gaq = [["_setAccount", "UA-20473929-1"], ["_trackPageview"]], function (a, b) {
            var c = a.createElement(b), d = a.getElementsByTagName(b)[0];
            c.async = 1, c.src = ("https:" == location.protocol ? "//ssl" : "//www") + ".google-analytics.com/ga.js", d.parentNode.insertBefore(c, d)
        }(document, "script"))</script>
    <link rel="stylesheet" href="./demo_files/css" media="all">
    <script charset="utf-8" src="./demo_files/button.d941c9a422e2e3faf474b82a1f39e936.js.download"></script>
</head>
<body>
<div class="section top">
    <div class="nav l-page">
        <div class="watch right">

            <iframe id="twitter-widget-1" scrolling="no" frameborder="0" allowtransparency="true"
                    class="twitter-share-button twitter-share-button-rendered twitter-tweet-button"
                    style="position: static; visibility: visible; width: 61px; height: 20px;"
                    title="Twitter Tweet Button"
                    src="./demo_files/tweet_button.2d991e3dfc9abb2549972ce8b64c5d85.en.html"
                    data-url="http://ricostacruz.com/jquery.transit/"></iframe>
            &nbsp;
            <iframe src="./demo_files/github-btn.html" allowtransparency="true" frameborder="0" scrolling="0"
                    width="110" height="20"></iframe>
            <iframe src="./demo_files/github-btn(1).html" allowtransparency="true" frameborder="0" scrolling="0"
                    width="153" height="20"></iframe>
        </div>
        <ul class="left aux">


            <li>
                <a href="/publish/yarner/jquery.transit.min.js">Download</a>
            </li>
            <li>
                <a href="https://github.com/rstacruz/jquery.transit">View on Github</a>
            </li>
        </ul>
    </div>
    <div class="card title l-page">
        <div class="header">
            <h1>Transit</h1>
            <p>Super-smooth CSS transitions <span class="amp">&amp;</span> transformations for jQuery</p>
        </div>
        <div class="download">
            <a href="/publish/yarner/jquery.transit.min.js">
<span class="in">
<span class="inin">
<strong id="version_id">v0.9.12</strong>
<script>$("#version_id").html('v' + jQuery.transit.version);</script>
<small>Download</small>
</span>
</span>
            </a>
        </div>
        <div class="main-notes">
            <p>
                <strong>Upgrading notes</strong>
                Upgrading from an older version? Transit should be mostly backward-compatible.
                See the <a href="https://github.com/rstacruz/jquery.transit/blob/master/HISTORY.md">change log</a> for
                notes.
            </p>
            <p>
                <strong>Development version</strong>
                You may also download the <a href="/publish/yarner/jquery.transit.js">development
                    version</a> which has spaces and comments preserved.
                Curious to see how it's made? See the <a href="http://ricostacruz.com/jquery.transit/source/">annotated
                    source code</a>!
            </p>
        </div>
    </div>
    <div class="o-line"></div>
</div>

<div class="gap hard blue">
    <a href="http://ricostacruz.com/jquery.transit/#top" class="thing"></a>
</div>
<div class="section after-top">
    <div class="heading l-page">
        <h2>Transitions <span class="amp">&amp;</span> transformations</h2>
        <p>Here are some basic transformations. <span id="instruction-message">Hover to see them work.</span></p>
        <script>$("#instruction-message").html(App.isMobile ? "Tap to see them work." : "Hover to see them work.");</script>
    </div>
    <div class="examples trio l-page translations">
        <div class="example normal" id="example-1">
            <div class="in">
                <h3 style="height: 19px;">Translate X</h3>
                <div class="area">

                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>x: '40px'</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal" id="example-2">
            <div class="in">
                <h3 style="height: 19px;">Translate Y</h3>
                <div class="area">

                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>y: '40px'</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal" id="example-3">
            <div class="in">
                <h3 style="height: 19px;">Translate X/Y</h3>
                <div class="area">

                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>x: '40px', y: '40px'</b> });</pre>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section usage">
    <div class="heading l-page">
        <h2 class="bigger">How to use Transit</h2>
    </div>
    <div class="subcontent card l-page">
        <div class="info">
            <h3>Usage is simple!</h3>
            <p>
                Just include this script after jQuery. Requires jQuery 1.4+. Use
                <code>$('...').transition</code> instead of jQuery's
                <code>$('...').animate.</code> It has the same syntax as animate.
            </p>
        </div>
        <div class="code">
            <pre>$("div").transition({ x: 200 });</pre>
        </div>
        <div class="info">
            <h3>Transformations</h3>
            <p>
                Transit provides the following transformations for use with
                <code>$('...').transition</code> and <code>$('...').css</code>. See
                the <a href="https://github.com/rstacruz/jquery.transit#readme">README</a>
                file for more information.
            </p>
        </div>
        <div class="code transformations-list">
            <ul>
                <li><strong>x</strong> <small>(px)</small></li>
                <li><strong>y</strong> <small>(px)</small></li>
                <li><strong>translate</strong> <small>(x, y)</small></li>
                <li><strong>rotate</strong> <small>(deg)</small></li>
                <li><strong>rotateX</strong> <small>(deg)</small></li>
                <li><strong>rotateY</strong> <small>(deg)</small></li>
                <li><strong>rotate3d</strong> <small>(x, y, z, deg)</small></li>
                <li><strong>scale</strong> <small>(x, [y])</small></li>
                <li><strong>perspective</strong> <small>(px)</small></li>
                <li><strong>skewX</strong> <small>(deg)</small></li>
                <li><strong>skewY</strong> <small>(deg)</small></li>
            </ul>
        </div>
    </div>
    <div class="o-line"></div>
</div>

<div class="gap">
    <a href="http://ricostacruz.com/jquery.transit/#top" class="thing"></a>
</div>
<div class="more section darker">
    <div class="heading l-page">
        <h2 class="bigger">Animate anything</h2>
        <p>Transition any CSS property. They will happen much smoother than if you were to use jQuery's default <em>.animate()</em>.
        </p>
    </div>
    <div class="examples l-page duo any-property">
        <div class="example normal">
            <div class="in">
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>opacity: 0</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>marginTop: '10px'</b>, <b>height: '22px'</b> });</pre>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gap">
    <a href="http://ricostacruz.com/jquery.transit/#top" class="thing"></a>
</div>
<div class="more section">
    <div class="heading l-page">
        <h2>2D transformations</h2>
        <p>Here are some CSS3 transformations supported by Transit.</p>
    </div>
    <div class="two-d examples trio l-page">
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Translate</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>x: 40</b>, <b>y: 40</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Rotate</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>rotate: '45deg'</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Scale</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>scale: 2.2</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Scale (not in proportion)</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>scale: [2.0, 1.5]</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Skew X</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>skewX: '30deg'</b> });</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Skew Y</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 19px;">
                    <pre>$('.box').transition({ <b>skewY: '30deg'</b> });</pre>
                </div>
            </div>
        </div>
    </div>
    <div class="heading l-page">
        <h2>3D transformations</h2>
        <p>You may rotate using <code>rotateX</code> and <code>rotateY</code>.
            Using <code>perspective</code> is optional, but it should always come
            before rotateX/Y. Try it in Firefox 10+ or Webkit browsers!</p>
    </div>
    <div class="three-d examples trio l-page">
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Rotate X</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 76px;">
                    <pre>$('.box').transition({<br>  <b>perspective: '100px',</b><br>  <b>rotateX: '180deg'</b><br>});</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Rotate Y</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 76px;">
                    <pre>$('.box').transition({<br>  <b>perspective: '100px',</b><br>  <b>rotateY: '180deg'</b><br>});</pre>
                </div>
            </div>
        </div>
        <div class="example normal">
            <div class="in">
                <h3 style="height: 19px;">Rotate 3D</h3>
                <div class="area">
                    <div class="box"></div>
                </div>
                <div class="code" style="height: 76px;">
                    <pre>$('.box').transition({<br>  <b>perspective: '100px',</b><br>  <b>rotate3d: '1,1,0,180deg'</b><br>});</pre>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gap">
    <a href="http://ricostacruz.com/jquery.transit/#top" class="thing"></a>
</div>
<div class="easing section">
    <div class="heading l-page">
        <h2 class="bigger">Easing</h2>
        <p>Simply provide a 3rd parameter to <code>$.transition</code>.</p>
    </div>
    <div class="examples duo l-page">
        <div class="example slim easing">
            <div class="in" style="height: 57px;">
                <div class="area">
                    <div class="box"></div>
                </div>
                <h3>Linear</h3>
                <div class="code">
                    <pre>$('.box').transition(<br>  { x: 210 }, 500, <b>'linear'</b>);</pre>
                </div>
            </div>
        </div>
        <div class="example slim easing">
            <div class="in" style="height: 57px;">
                <div class="area">
                    <div class="box"></div>
                </div>
                <h3>Ease</h3>
                <div class="code">
                    <pre>$('.box').transition(<br>  { x: 210 }, 500, <b>'ease'</b>);</pre>
                </div>
            </div>
        </div>
        <div class="example slim easing">
            <div class="in" style="height: 57px;">
                <div class="area">
                    <div class="box"></div>
                </div>
                <h3>Snap</h3>
                <div class="code">
                    <pre>$('.box').transition(<br>  { x: 210 }, 500, <b>'snap'</b>);</pre>
                </div>
            </div>
        </div>
        <div class="example slim easing">
            <div class="in" style="height: 57px;">
                <div class="area">
                    <div class="box"></div>
                </div>
                <h3>Custom</h3>
                <div class="code">
                    <pre>$('.box').transition(<br>  { x: 210 }, 500, <b>'cubic-bezier(0,0.9,0.3,1)'</b>);</pre>
                </div>
            </div>
        </div>
    </div>
    <div class="l-page supported-easing">
        <h4>Supported easing types:</h4>
        <ul>
            <li>linear
            </li>
            <li>ease
            </li>
            <li>in</li>
            <li>out</li>
            <li>in-out</li>
            <li>snap</li>
            <li>easeOutCubic</li>
            <li>easeInOutCubic</li>
            <li>easeInCirc</li>
            <li>easeOutCirc</li>
            <li>easeInOutCirc</li>
            <li>easeInExpo</li>
            <li>easeOutExpo</li>
            <li>easeInOutExpo</li>
            <li>easeInQuad</li>
            <li>easeOutQuad</li>
            <li>easeInOutQuad</li>
            <li>easeInQuart</li>
            <li>easeOutQuart</li>
            <li>easeInOutQuart</li>
            <li>easeInQuint</li>
            <li>easeOutQuint</li>
            <li>easeInOutQuint</li>
            <li>easeInSine</li>
            <li>easeOutSine</li>
            <li>easeInOutSine</li>
            <li>easeInBack</li>
            <li>easeOutBack</li>
            <li>easeInOutBack</li>
        </ul>
    </div>
</div>

<div class="gap">
    <a href="http://ricostacruz.com/jquery.transit/#top" class="thing"></a>
</div>
<div class="section extras" id="more-features">
    <div class="heading l-page">
        <h2><span class="in"><span class="inin"><b>More</b> <i>features<i></i></i></span></span></h2><i><i>

            </i></i></div>
    <i><i>
            <div class="examples tree l-page">
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Delay</h3>
                        <p>You can specify a delay.</p>
                        <div class="code">
                            <pre>$('.box').transition({ scale: 0, <b>delay: 500</b> });</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Optional units</h3>
                        <p>All units (eg, <code>px</code>, <code>deg</code>, <code>ms</code>) are optional.</p>
                        <div class="code">
                            <pre>$('.box').transition({ <b>y: 30</b> });</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>$.fn.css</h3>
                        <p>Transform properties work with <code>.css()</code> as well. They're not just for animation!
                        </p>
                        <div class="code">
                            <pre>$('.box')<b>.css</b>({ rotate: '30deg' });</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Vendor prefixes</h3>
                        <p>Vendor prefixes are auto-added for <code>transform</code>, <code>transition</code>, and
                            others.</p>
                        <div class="code">
                            <pre>$('.box').css({ <b>transform: 'scale(0.2)'</b> });</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Chaining <span class="amp">&amp;</span> queuing</h3>
                        <p>Transit uses <a href="https://api.jquery.com/queue/">jQuery's
                                effect queue</a>, exactly like <code>.animate</code>. This means transitions
                            will never run in parallel. (You can disable the queue with <code>queue: false</code>.)</p>
                        <div class="code">
                            <pre>$('.box')<br>  <b>.transition({ x: -40 })</b><br>  <b>.transition({ y: 40 })</b><br>  <b>.transition({ x: 0 })</b><br>  <b>.transition({ y: 0 })</b>;</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Alternate easing/duration syntax</h3>
                        <p>You can provide <code>easing</code> and <code>duration</code> in the options. Great with
                            CoffeeScript.</p>
                        <div class="code">
                            <pre>$('.box').transition({<br>  y: 55,<br>  <b>easing: 'snap'</b>,<br>  <b>duration: 200</b> });</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Relative values</h3>
                        <p>Start your values with either <code>+=</code> or <code>-=</code> to add/subtract to current
                            values.</p>
                        <div class="code">
                            <pre>$('.box').transition({<br>  <b>rotate: '+=30deg'</b>,<br>  <b>x: '+=10'</b><br>});</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Transformation origins</h3>
                        <p>You can use <code>transformOrigin</code> to get/set where rotations and scales start from.
                        </p>
                        <div class="code">
                            <pre>$('.box')<br>  .css({ <b>transformOrigin: '10px 10px'</b> })<br>  .transition({ rotate: '45deg' });</pre>
                        </div>
                    </div>
                </div>
                <div class="example slim">
                    <div class="in">
                        <div class="area">
                            <div class="box"></div>
                        </div>
                        <h3>Getting values</h3>
                        <p>Use <code>.css()</code> to get values from any of the transformations defined by Transit.</p>
                        <div class="code">
                            <pre>$('.box').css({ rotate: '30deg' });<br>console.log($('.box')<b>.css('rotate')</b>);<br>console.log($('.box')<b>.css('transform')</b>);</pre>
                        </div>
                    </div>
                </div>
            </div>
        </i></i></div>
<i><i>

        <div class="gap hard">
            <a href="http://ricostacruz.com/jquery.transit/#top" class="thing"></a>
        </div>
        <div class="section usage">
            <div class="heading l-page">
                <h2 class="bigger">Browser support</h2>
            </div>
            <div class="subcontent card l-page">
                <div class="info">
                    <h3>Supported browsers</h3>
                    <p>
                        See <a href="https://caniuse.com/#search=transition">caniuse.com's report on CSS
                            transitions.</a>
                        To support iOS4 and below, Transit uses <code>translate3d</code> and <code>scale3d</code>.
                    </p>
                    <ul class="supported-browsers">
                        <li>IE 10+</li>
                        <li>Firefox 4+</li>
                        <li>Safari 5+</li>
                        <li>Chrome 10+</li>
                        <li>Opera 11+</li>
                        <li>Mobile Safari</li>
                    </ul>
                </div>
                <div class="info grey">
                    <h3>What about older browsers?</h3>
                    <p>
                        Transit degrades older browsers by simply not doing the
                        transformations (rotate, scale, etc) while still doing standard CSS
                        (opacity, marginLeft, etc) without any animation. Delays and
                        durations will be ignored.
                    </p>
                </div>
                <div class="info">
                    <pre class="figure">// Delegate .transition() calls to .animate()<br>// if the browser can't do CSS transitions.<br>if (!$.support.transition)<br>  $.fn.transition = $.fn.animate;</pre>
                    <h3>Fallback to frame-based animation</h3>
                    <p>
                        If you would like to fallback to classic animation when transitions aren't supported,
                        just manually redefine <code>.transitition</code> to <code>.animate</code>.
                    </p>
                    <p>
                        (Note: if you're using custom easing, you may need to also use <a
                                href="http://gsgd.co.uk/sandbox/jquery/easing/">jQuery Easing</a>, and restrict
                        your use of easing options to the ones defined there.)
                    </p>
                </div>
            </div>
            <div class="heading l-page">
                <h2>Recipes</h2>
            </div>
            <div class="subcontent card l-page">
                <div class="info slim">
                    <pre class="figure">$.fx.speeds._default = 300;</pre>
                    <h3>Default duration</h3>
                    <p>
                        Transit honors jQuery's default speed, <code>$.fx.speeds._default</code>.
                    </p>
                </div>
                <div class="info grey slim">
                    <pre class="figure">$.cssEase['bounce'] =<br>  'cubic-bezier(0,1,0.5,1.3)';<br>$('.box').transition({ x: 0 }, 500,<br>  'bounce');</pre>
                    <h3>Custom easing</h3>
                    <p>
                        Define custom easing aliases in <code>$.cssEase</code>.
                    </p>
                </div>
                <div class="info slim">
                    <pre class="figure">.box {<br>  -webkit-backface-visibility: hidden;<br>}</pre>
                    <h3>Webkit: prevent flickers</h3>
                    <p>
                        Having flickering problems in Webkit? Use
                        <code>-webkit-backface-visibility</code>. See <a
                                href="https://stackoverflow.com/questions/3461441/prevent-flicker-on-webkit-transition-of-webkit-transform">this
                            question</a> for some discussions on this.
                    </p>
                </div>
                <div class="info grey slim">
                    <pre class="figure">.box {<br>  -webkit-transition: translate3d(0,0,0);<br>}</pre>
                    <h3>Antialias problems in Webkit?</h3>
                    <p>
                        Force hardware-acceleration in Webkits to prevent text flickering. See
                        <a href="https://davidwalsh.name/translate3d">this article</a> and
                        <a href="http://cubiq.org/you-shall-not-flicker">this article</a> for more
                        information.
                    </p>
                </div>
            </div>
            <div class="o-line"></div>
        </div>

        <div class="gap dark">
            <a href="/publish/yarner/jquery.transit/#top" class="thing"></a>
        </div>
        <div class="section credits">
            <div class="subcontent l-page">
                <p>
                    <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true"
                            class="twitter-follow-button twitter-follow-button-rendered"
                            style="position: static; visibility: visible; width: 118px; height: 20px;"
                            title="Twitter Follow Button"
                            src="./demo_files/follow_button.2d991e3dfc9abb2549972ce8b64c5d85.en.html"
                            data-screen-name="rstacruz"></iframe>
                    <br>
                    <iframe src="./demo_files/github-btn(2).html" allowtransparency="true" frameborder="0" scrolling="0"
                            width="153" height="20"></iframe>
                </p>
                <p>
                    Transit is authored and maintained by <a href="http://ricostacruz.com/">Rico Sta. Cruz</a> with help
                    from its <a href="https://github.com/rstacruz/jquery.transit/contributors">contributors</a>.
                </p>
                <ul>
                    <li><a href="http://ricostacruz.com/">My website</a> (ricostacruz.com)</li>
                    <li><a href="https://github.com/rstacruz">Github</a> (@rstacruz)</li>
                    <li><a href="https://twitter.com/rstacruz">Twitter</a> (@rstacruz)</li>
                </ul>
                <p>
                    ©
                    Copyright 2011-2014, Rico Sta. Cruz. Released under the <a
                            href="http://www.opensource.org/licenses/mit-license.php">MIT
                        License</a>.
                </p>
            </div>
        </div>
        <script>(function (a, b) {
                var c = a.createElement(b), d = a.getElementsByTagName(b)[0];
                c.src = "//hnbutton.appspot.com/static/hn.min.js", d.parentNode.insertBefore(c, d)
            })(document, "script")</script>
        <script>!function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");</script>


    </i></i>
<iframe scrolling="no" frameborder="0" allowtransparency="true"
        src="./demo_files/widget_iframe.2d991e3dfc9abb2549972ce8b64c5d85.html" title="Twitter settings iframe"
        style="display: none;"></iframe>
<iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"
        style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;"
        title="Twitter analytics iframe" src="./demo_files/saved_resource.html"></iframe>
</body>
</html>
