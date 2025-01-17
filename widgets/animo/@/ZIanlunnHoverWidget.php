<?php

namespace zetsoft\widgets\animo;

use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use function GuzzleHttp\Psr7\str;
use zetsoft\system\kernels\ZWidget;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/**
 *
 * Class ZKSelect2Widget
 * http://demos.krajee.com/widget-details/select2
 *
 * Created By: Asror Zakirov
 * Refactored: Asror Zakirov
 */

class ZIanlunnHoverWidget extends ZWidget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [];


    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [
        'change' => ' console.log("ZKSelect2Widget | $eventChange") ',

    ];


    /**
     *
     * Constants
     */
    public const theme = [
        'default' => 'default',
        'classic' => 'classic',
        'bootstrap' => 'bootstrap',
        'krajee' => 'krajee',
        'krajee-bs4' => 'krajee-bs4',
    ];

    public const size = [
        'lg' => 'lg',
        'md' => 'md',
        'sm' => 'sm'
    ];


    public function asset()
    {/*
           <link href="/publish/yarner/hover.css/css/hover-min.css" rel="stylesheet">
    <link href="/vendor/fortawesome/font-awesome/css/fontawesome.min.css" rel="stylesheet" media="all">
    <link href="/exweb/libra/publish/yarner/hover.css/css/asset-page.css" rel="stylesheet" media="all">
       <script src="/vendor/fortawesome/font-awesome/js/ALL.js"></script>
        */
        $this->fileCss('https://cdn.jsdelivr.net/npm/hover.css@2.3.2/css/hover.min.css');
        $this->fileCss('https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css');
        $this->fileCss('https://cdn.jsdelivr.net/npm/hover.css@2.3.2/css/asset-page.css');
        $this->fileJs('/vendor/fortawesome/font-awesome/js/ALL.js');
    }


   


    public function codes()
    {
        //  $this->htm = \kartik\select2\Select2::widget($this->options);

        $this->htm = <<<HTML
        <div class="flex-container">
    <h2>2D Transitions   <i class="fa fa-chevron-circle-right"></i></h2>

    <a href="#" class="hvr-grow">Grow</a>
    <a href="#" class="hvr-shrink">Shrink</a>
    <a href="#" class="hvr-pulse">Pulse</a>
    <a href="#" class="hvr-pulse-grow">Pulse Grow</a>
    <a href="#" class="hvr-pulse-shrink">Pulse Shrink</a>
    <a href="#" class="hvr-push">Push</a>
    <a href="#" class="hvr-pop">Pop</a>
    <a href="#" class="hvr-bounce-in">Bounce In</a>
    <a href="#" class="hvr-bounce-out">Bounce Out</a>
    <a href="#" class="hvr-rotate">Rotate</a>
    <a href="#" class="hvr-grow-rotate">Grow Rotate</a>
    <a href="#" class="hvr-float">Float</a>
    <a href="#" class="hvr-sink">Sink</a>
    <a href="#" class="hvr-bob">Bob</a>
    <a href="#" class="hvr-hang">Hang</a>
    <a href="#" class="hvr-skew">Skew</a>
    <a href="#" class="hvr-skew-forward">Skew Forward</a>
    <a href="#" class="hvr-skew-backward">Skew Backward</a>
    <a href="#" class="hvr-wobble-horizontal">Wobble Horizontal</a>
    <a href="#" class="hvr-wobble-vertical">Wobble Vertical</a>
    <a href="#" class="hvr-wobble-to-bottom-right">Wobble To Bottom Right</a>
    <a href="#" class="hvr-wobble-to-top-right">Wobble To Top Right</a>
    <a href="#" class="hvr-wobble-top">Wobble Top</a>
    <a href="#" class="hvr-wobble-bottom">Wobble Bottom</a>
    <a href="#" class="hvr-wobble-skew">Wobble Skew</a>
    <a href="#" class="hvr-buzz">Buzz</a>
    <a href="#" class="hvr-buzz-out">Buzz Out</a>
    <a href="#" class="hvr-forward">Forward</a>
    <a href="#" class="hvr-backward">Backward</a>
</div>

    <div class="flex-container">
        <h2>Background Transitions  <i class="fa fa-chevron-circle-right"></i></h2>

        <a href="#" class="hvr-fade">Fade</a>
        <a href="#" class="hvr-back-pulse">Back Pulse</a>
        <a href="#" class="hvr-sweep-to-right">Sweep To Right</a>
        <a href="#" class="hvr-sweep-to-left">Sweep To Left</a>
        <a href="#" class="hvr-sweep-to-bottom">Sweep To Bottom</a>
        <a href="#" class="hvr-sweep-to-top">Sweep To Top</a>
        <a href="#" class="hvr-bounce-to-right">Bounce To Right</a>
        <a href="#" class="hvr-bounce-to-left">Bounce To Left</a>
        <a href="#" class="hvr-bounce-to-bottom">Bounce To Bottom</a>
        <a href="#" class="hvr-bounce-to-top">Bounce To Top</a>
        <a href="#" class="hvr-radial-out">Radial Out</a>
        <a href="#" class="hvr-radial-in">Radial In</a>
        <a href="#" class="hvr-rectangle-in">Rectangle In</a>
        <a href="#" class="hvr-rectangle-out">Rectangle Out</a>
        <a href="#" class="hvr-shutter-in-horizontal">Shutter In Horizontal</a>
        <a href="#" class="hvr-shutter-out-horizontal">Shutter Out Horizontal</a>
        <a href="#" class="hvr-shutter-in-vertical">Shutter In Vertical</a>
        <a href="#" class="hvr-shutter-out-vertical">Shutter Out Vertical</a>

    </div>

    <div class="flex-container" id="icons">
        <h2>Icons  <i class="fa fa-chevron-circle-right"></i></h2>


        <a href="#" class="hvr-icon-back">
            <i class="fa fa-chevron-circle-left hvr-icon"></i> Icon Back
        </a>
        <a href="#" class="hvr-icon-forward">
            Icon Forward
            <i class="fa fa-chevron-circle-right hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-down">
            Icon Down <i class="fas fa-arrow-circle-down hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-up">
            Icon Up <i class="fas fa-arrow-circle-up hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-spin">
            Icon Spin <i class="fas fa-sync-alt hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-drop">
            Icon Drop <i class="fa fa-tint hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-fade">
            Icon Fade <i class="fa fa-check hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-float-away">
            Icon Float Away <i class="fa fa-plus-circle hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-sink-away">
            Icon Sink Away <i class="fa fa-minus-circle hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-grow">
            Icon Grow <i class="fas fa-smile hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-shrink">
            Icon Shrink <i class="far fa-frown hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-pulse">
            Icon Pulse <i class="fa fa-home hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-pulse-grow">
            Icon Pulse Grow <i class="fa fa-home hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-pulse-shrink">
            Icon Pulse Shrink <i class="fa fa-home hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-push">
            Icon Push <i class="far fa-star hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-pop">
            Icon Pop <i class="fas fa-star hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-bounce">
            Icon Bounce <i class="far fa-thumbs-up hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-rotate">
            Icon Rotate <i class="fa fa-paperclip hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-grow-rotate">
            Icon Grow Rotate <i class="fa fa-phone hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-float">
            Icon Float <i class="fas fa-arrow-circle-up hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-sink">
            Icon Sink <i class="fas fa-arrow-circle-down hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-bob">
            Icon Bob <i class="fa fa-chevron-up hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-hang">
            Icon Hang <i class="fa fa-chevron-down hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-wobble-horizontal">
            Icon Wobble Horizontal <i class="fa fa-arrow-right hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-wobble-vertical">
            Icon Wobble Vertical <i class="fa fa-arrow-up hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-buzz">
            Icon Buzz <i class="far fa-clock hvr-icon"></i>
        </a>
        <a href="#" class="hvr-icon-buzz-out">
            Icon Buzz Out <i class="fa fa-lock hvr-icon"></i>
        </a>
    </div>

    <div class="flex-container">
        <h2>Border Transitions  <i class="fa fa-chevron-circle-right"></i></h2>
        <a href="#" class="hvr-border-fade">Border Fade</a>
        <a href="#" class="hvr-hollow">Hollow</a>
        <a href="#" class="hvr-trim">Trim</a>
        <a href="#" class="hvr-ripple-out">Ripple Out</a>
        <a href="#" class="hvr-ripple-in">Ripple In</a>
        <a href="#" class="hvr-outline-out">Outline Out</a>
        <a href="#" class="hvr-outline-in">Outline In</a>
        <a href="#" class="hvr-round-corners">Round Corners</a>
        <a href="#" class="hvr-underline-from-left">Underline From Left</a>
        <a href="#" class="hvr-underline-from-center">Underline From Center</a>
        <a href="#" class="hvr-underline-from-right">Underline From Right</a>
        <a href="#" class="hvr-reveal">Reveal</a>
        <a href="#" class="hvr-underline-reveal">Underline Reveal</a>
        <a href="#" class="hvr-overline-reveal">Overline Reveal</a>
        <a href="#" class="hvr-overline-from-left">Overline From Left</a>
        <a href="#" class="hvr-overline-from-center">Overline From Center</a>
        <a href="#" class="hvr-overline-from-right">Overline From Right</a>
    </div>
    <div class="flex-container">
        <h2>Shadow and Glow Transitions  <i class="fa fa-chevron-circle-right"></i></h2>

        <a href="http://ianlunn.github.io/Hover/#" class="hvr-shadow">Shadow</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-grow-shadow">Grow Shadow</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-float-shadow">Float Shadow</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-glow">Glow</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-shadow-radial">Shadow Radial</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-box-shadow-outset">Box Shadow Outset</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-box-shadow-inset">Box Shadow Inset</a>

    </div>
    <div class="flex-container">
        <h2>Speech Bubbles  <i class="fa fa-chevron-circle-right"></i></h2>

        <a href="http://ianlunn.github.io/Hover/#" class="hvr-bubble-top">Bubble Top</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-bubble-right">Bubble Right</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-bubble-bottom">Bubble Bottom</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-bubble-left">Bubble Left</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-bubble-float-top">Bubble Float Top</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-bubble-float-right">Bubble Float Right</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-bubble-float-bottom">Bubble Float Bottom</a>

    </div>
    <div class="flex-container">
        <h2>Curls  <i class="fa fa-chevron-circle-right"></i></h2>

        <a href="http://ianlunn.github.io/Hover/#" class="hvr-curl-top-left">Curl Top Left</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-curl-top-right">Curl Top Right</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-curl-bottom-right">Curl Bottom Right</a>
        <a href="http://ianlunn.github.io/Hover/#" class="hvr-curl-bottom-left">Curl Bottom Left</a>
    </div>

HTML;

        $this->js = <<<JS
           console.log("Test");
JS;


        $this->css = <<<CSS
     /* Grow */
     .hvr-grow {
            display: inline-block;
            vertical-align: middle;
            transform: translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            backface-visibility: hidden;
            -moz-osx-font-smoothing: grayscale;
            transition-duration: 0.3s;
            transition-property: transform;
        }

        .hvr-grow:hover,
        .hvr-grow:focus,
        .hvr-grow:active {
            transform: scale(1.1);
        }

        .flex-container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 100px;

        }

        .flex-container > a {
            background-color: #8dcaf1;
            width: 110px;
            margin: 10px;
            text-align: center;
            line-height: 25px;
            font-size: 18px;
            padding: 20px;
            text-decoration: none;
            border-radius: 10px;
        }
    }
CSS;


    }

}
