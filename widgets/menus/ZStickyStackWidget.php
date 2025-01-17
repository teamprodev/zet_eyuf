<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\widgets\menus;


use PharIo\Manifest\Url;
use PhpOffice\PhpWord\Reader\HTML;
use zetsoft\dbitem\wdg\MenuItem;
use zetsoft\service\menu\ALL;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZHTML;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\kernels\ZWidget;



class ZStickyStackWidget extends ZWidget
{
    public $config = [];
    public $_config = [
    ];
 
    public $layout=[];
    public $_layout=[

        'main'=><<<HTML
 <div class="main-content-wrapper">
        <!-- section 1 -->
        <section id="one">
            <h1>StickyStack</h1>
            <br />
            <div class="button-wrapper">
                <a href="#" class="btn">Download</a>
            </div><!--/.button-wrapper-->
        </section>

        <!-- section 2-->
        <section id="two">
            <div class="shadow">
                <h1>Long pages feel like a stack of cards</h1>
            </div><!--/.shadow-->
        </section>

        <!-- section 3 -->
        <section>
            <div class="shadow">
                <h1>U sage</h1>
               
            </div>
        </section>

        <!-- section 4 -->
        <section>
            <div class="shadow">
                <h1>Options</h1>
                
            </div><!--/.shadow-->

        </section>

        <section>
            <div class="button-wrapper">
                <a href="#" class="btn">Download</a>
            </div>
        </section>
    </div>
HTML,
        'css'=><<<CSS
section {
            background-color: #303030;
            color: #fff;
            padding: 1em 2em;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            background-size: cover;
            background-position: 50% 50%;
            display: block;
        }
        section.stuck + section:not(.stuck) {
            box-shadow: 0 -3px 20px rgba(0, 0, 0, 0.5);
        }
        section:before {
            content: '';
            display: block;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.65);
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        section:nth-child(1) {
            pading-top: 200px;
            text-align: center;
            background-image: url('https://picsum.photos/1600/900?image=1029');
            background-size: cover;
            background-position: 50% 50%;
            position: relative;
        }
        section:nth-child(1) h1 {
            margin-top: 160px;
            margin-bottom: 0;
            line-height: 1em;
            font: 300 48px/1.2em 'Open Sans', sans-serif;
        }
        section:nth-child(1) .helper {
            font-size: 14px;
            width: 50%;
            margin: 1em auto;
            line-height: 1.5em;
        }
        section:nth-child(2) {
            background-image: url('https://picsum.photos/1600/900?image=991');
            position: relative;
        }
        section:nth-child(2):before {
            display: none;
        }
        section:nth-child(2) h1 {
            font: 300 42px/1.3em 'Open Sans', sans-serif;
        }
        section:nth-child(3) {
            background-image: url('https://picsum.photos/1600/900?image=988');
        }
        section:nth-child(3) h1 {
            font-weight: 300;
            margin-bottom: 1em;
            line-height: 1.2em;
        }
        section:nth-child(3):before {
            display: none;
        }
        section:nth-child(4) {
            background-image: url('https://picsum.photos/1600/900?image=884');
        }
        section:nth-child(4):before {
            display: none;
        }
        section:nth-child(4) .shadow {
            position: absolute;
            bottom: 40px;
            left: 20px;
        }
        section:nth-child(4) h1 {
            font-weight: 300;
            line-height: 1.2em;
        }
        section:nth-child(5) {
            background-image: url('http://unsplash.it/1600/900?image=896');
            background-position: 50% 100%;
            padding-top: 30%;
            text-align: center;
        }
        /* Modular Styles */
        h1 {
            font-size: 3em;
        }
        .button-wrapper {
            margin: 0 auto;
            padding: 0px;
            width: 320px;
            position: relative;
            clear: both;
        }
        .button-wrapper .btn + .btn {
            margin-left: -4px;
        }
        .btn {
            padding: 10px;
            font: bold 16px/1.2em sans-serif;
            border: 2px solid #fff;
            -webkit-border-radius: 3px;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 3px;
            -moz-background-clip: padding;
            border-radius: 3px;
            background-clip: padding-box;
            background-color: transparent;
            text-decoration: none;
            margin: 0.5em auto;
            color: #fff;
            -webkit-transition: 300ms all;
            -moz-transition: 300ms all;
            -o-transition: 300ms all;
            transition: 300ms all;
            display: inline-block;
            box-sizing: border-box;
            width: 49%;
        }
        .btn:hover {
            background-color: rgba(255, 255, 255, 0.33);
            color: #fff;
            text-shadow: 0 1px 0 #111;
        }
        .btn:first-of-type {
            margin-right: 2%;
        }
        .shadow {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 1em;
            border-radius: 5px;
        }
        .shadow:after {
            display: none;
        }
        .shadow h1:first-of-type,
        .shadow h2:first-of-type,
        .shadow h3:first-of-type {
            margin-top: 0;
            margin-bottom: 10px;
        }
CSS,
        'js'=><<<JS
 $('section').css('height', $(window).height());

    $('.main-content-wrapper').stickyStack();
JS,


    ];
    public function asset()
    {
        $this->fileJs('/render/navigat/ZStickyStackWidget/asset/jquery.stickystack.js');
        $this->fileJs('/render/navigat/ZStickyStackWidget/asset/jquery.min.js');
        $this->fileCss('/render/navigat/ZStickyStackWidget/asset/normalize.css');
       
    }

    public function codes()
    {

        $this->htm = strtr($this->_layout["main"],[
        ]);
        $this->js = strtr($this->_layout["js"],[]);
        $this->css = strtr($this->_layout["css"],[]);
    }

}

