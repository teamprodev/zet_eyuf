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
 * Class ZLunarlogicAuroralWidget
 * http://demos.krajee.com/widget-details/select2
 *
 * Created By: Asror Zakirov
 * Refactored: Asror Zakirov
 */

class ZLunarlogicAuroralWidget extends ZWidget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [
        
    ];


    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [
    
    ];

    public  $layout=[];
    public  $_layout=[
       'main'=> <<<HTML
        <div class="auroral-info">

<svg width="80" height="80" viewBox="0 0 250 250" style="fill:rgba(255,255,255,.3); color:#fff; position: absolute; top: 0; border: 0; right: 0;">
    <path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path>
    <path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path>
    <path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,14

</div>

<h1> Auroral-animated gradient backgrounds</h1>

<div class="container">
<div class="auroral-northern">
    <div id="northern" class="auroral auroral-northern"></div>
    <div id="northern-intense" class="auroral auroral-northern-intense"></div>
    <div id="northern-dimmed" class="auroral auroral-northern-dimmed"></div>
    <div id="northern-dusk" class="auroral auroral-northern-dusk"></div>
    <div id="northern-warm" class="auroral auroral-northern-warm"></div>
    <div id="agrabah" class="auroral auroral-agrabah"></div>
    <div class="auroral-stars"></div>
</div>
<div class="auroral-stars"></div>
</div>
HTML,
        'js'=> <<<JS
           console.log("Test");
JS,
        'css'=><<<CSS
    .myClass  {
        background:#e3334d;
    }
CSS

    ];
    public function asset()
    {
        $this->fileCss('/render/animo/ZLunarlogicAuroralWidget/assets/css/auroral.css');
        /*$this->fileCss('https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css');*/
        $this->fileCss('/render/animo/ZLunarlogicAuroralWidget/assets/min/auroral.min.css');
       $this->fileJs
       ('https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js');
      


        $this->fileJs('https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js');
    }


   


    public function codes()
    {
        //  $this->htm = \kartik\select2\Select2::widget($this->options);

        $this->htm= strtr($this->_layout["main"],[]);
        $this->css= strtr($this->_layout["css"],[]);
        $this->js= strtr($this->_layout["js"],[]);


    }

}
