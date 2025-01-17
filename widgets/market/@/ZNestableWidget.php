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




namespace zetsoft\widgets\market;

use zetsoft\models\App\eyuf\Category;
use zetsoft\system\Az;
use zetsoft\system\kernels\ZWidget;

class ZNestableWidget extends ZWidget
{
    /**
     * Configuration
     */
    public $config = [];
    public $_config = [

        'color' => '',
        'class' => '',

    ];

    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [

    ];

    public $layout = [];
    public $_layout = [

        'main' => <<<HTML

<div class="dd" id="nestable">
    <ol class="dd-list">

        <li class="dd-item" data-id="0" data-type="root">
            <div class="dd-handle">Root 0</div>
            <ol class="dd-list">
                <li class="dd-item" data-id="1" data-type="child">
                    <div class="dd-handle">Child 1</div>
                </li>
                <li class="dd-item" data-id="2" data-type="child">
                    <div class="dd-handle">Child 2</div>
                </li>
                <li class="dd-item" data-id="3" data-type="child">
                    <div class="dd-handle">Child 2</div>
                </li>
            </ol>
        </li>

        <li class="dd-item" data-id="4" data-type="root">
            <div class="dd-handle">Root 4</div>
            <ol class="dd-list">
                <li class="dd-item" data-id="5" data-type="child">
                    <div class="dd-handle">Child 5</div>
                </li>
                <li class="dd-item" data-id="6" data-type="child">
                    <div class="dd-handle">Child 6</div>
                </li>
            </ol>
        </li>

    </ol>
</div>

          
HTML,
        'categoryList' => <<<HTML
        <li><a href=""><i class="{class}"></i>{categoryListNames}</a></li>
HTML,
        'js' => <<<JS
                $('#nestable').nestable({
            group: 'categories', // you can change this name as you like
            maxDepth: 2,   // this is important if you have the same case of the question
            reject: [{
                rule: function () {
                    // The this object refers to dragRootEl i.e. the dragged element.
                    // The drag action is cancelled if this function returns true
                    var ils = $(this).find('>ol.dd-list > li.dd-item');
                    for (var i = 0; i < ils.length; i++) {
                        var datatype = $(ils[i]).data('type');
                        if (datatype === 'child')
                            return true;
                    }
                    return false;
                },
                action: function (nestable) {
                    // This optional function defines what to do when such a rule applies. The this object still refers to the dragged element,
                    // and nestable is, well, the nestable root element
                    alert('Can not move this item to the root');
                }
            }]
        });
JS,

        'css'=> <<<CSS
 .cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
        * html .cf { zoom: 1; }
        *:first-child+html .cf { zoom: 1; }

        html { margin: 0; padding: 0; }
        body { font-size: 100%; margin: 0; padding: 1.75em; font-family: 'Helvetica Neue', Arial, sans-serif; }

        h1 { font-size: 1.75em; margin: 0 0 0.6em 0; }

        a { color: #2996cc; }
        a:hover { text-decoration: none; }

        p { line-height: 1.5em; }
        .small { color: #666; font-size: 0.875em; }
        .large { font-size: 1.25em; }

        /**
         * Nestable
         */

        .dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

        .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
        .dd-list .dd-list { padding-left: 30px; }
        .dd-collapsed .dd-list { display: none; }

        .dd-item,
        .dd-empty,
        .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

        .dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:         linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd-handle:hover { color: #2ea8e5; background: #fff; }

        .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
        .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
        .dd-item > button[data-action="collapse"]:before { content: '-'; }

        .dd-placeholder,
        .dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
        .dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
            background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }

        .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
        .dd-dragel > .dd-item .dd-handle { margin-top: 0; }
        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        }

        /**
         * Nestable Extras
         */

        .nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

        #nestable-menu { padding: 0; margin: 20px 0; }

        #nestable-output,
        #nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

        #nestable2 .dd-handle {
            color: #fff;
            border: 1px solid #999;
            background: #bbb;
            background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
            background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
            background:         linear-gradient(top, #bbb 0%, #999 100%);
        }
        #nestable2 .dd-handle:hover { background: #bbb; }
        #nestable2 .dd-item > button:before { color: #fff; }

        @media only screen and (min-width: 700px) {

            .dd { float: left; width: 48%; }
            .dd + .dd { margin-left: 2%; }

        }

        .dd-hover > .dd-handle { background: #2ea8e5 !important; }

        /**
         * Nestable Draggable Handles
         */

        .dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:         linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd3-content:hover { color: #2ea8e5; background: #fff; }

        .dd-dragel > .dd3-item > .dd3-content { margin: 0; }

        .dd3-item > button { margin-left: 30px; }

        .dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:         linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
        .dd3-handle:hover { background: #ddd; }

        /**
         * Socialite
         */

        .socialite { display: block; float: left; height: 35px; }

CSS,

    ];


    public function asset()
    {

        $this->fileJs('https://cdn.jsdelivr.net/npm/composer.js@0.2.3/Composer.min.js');
    }

    public function codes()
    {
        $categories = Category::find()->all();

        $categoryListCode = '';
        /** @var Category[] $categories */
       foreach ($categories as $category) {
            $categoryListCode .= strtr($this->_layout['categoryList'], [
                '{categoryListNames}' => $category->name
            ]);
        }                                          

        $this->htm = strtr($this->_layout['main'], [
            '{color}' => $this->_config['color'],
            '{class}' => $this->_config['class'],
            '{Categories}' => Az::l('ZNestableWidget'),
            '{categoryList}' => $categoryListCode,  
        ]);

        $this->js .= strtr($this->_layout['js'], [
            '{id}' => $this->id,
            '{icon}' => $this->modelCheck() ? $this->value : '',
        ]);

        $this->css= strtr($this->_layout['css'], [
            '{color}' => $this->_config['color'],
        ]);

    }

}

