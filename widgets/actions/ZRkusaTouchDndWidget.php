<?php

namespace zetsoft\widgets\actions;

use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use function GuzzleHttp\Psr7\str;
use zetsoft\system\kernels\ZWidget;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/**
 *
 * Class ZKSelect2Widget
 *
 *
 * Created By: Dilmurod Axmadov
 * Refactored: Asror Zakirov
 */
class ZRkusaTouchDndWidget extends ZWidget
{

  /**
   * Configuration
   */
  public $config = [];
  public $_config = [
      'type' => ZRkusaTouchDndWidget::type['main'],
      'grapes' => true,
  ];

  public const type = [
      'main' => 'main'

  ];

  public $layout = [];
  public $_layout = [

      'main' => <<<HTML
        <div class="container"  '>
    <!--A-B row start-->
    <div class="A-Brow">
        <div class="DivA">
            <h2>Sortable add A </h2>
            <ul class="grid wide" id="list-accept-selector">
                <li><span class="title">Item 1</span></li>
                <li><span class="title">Item 2</span></li>
                <li><span class="title">Item 3</span></li>
                <li><span class="title">Item 4</span></li>
                <li><span class="title">Item 5</span></li>
                <li><span class="title">Item 6</span></li>
            </ul>

            <ul class="grid wide" id="example-accept-selector">
                <li class="draggable a">.A</li>
                <li class="draggable a">.A</li>
                <li class="draggable b">.B</li>
            </ul>
        </div>

        

        
    </div><br><br><br>

    <!--    connectWith-sortable-apped-row start   -->
    <div class="connectWith-sortable-apped-row">
        <div class="DivConnectWith">
            <h2>Connect With</h2>
            <div style="float:left;margin-right:20px">
                <h4>List A</h4>
                <ul class="list" id="lhs">
                    <li>A 1</li>
                    <li>A 2</li>
                    <li>A 3</li>
                    <li>A 4</li>
                </ul>
            </div>
        </div>
    </div>    <!--    connectWith-sortable-apped-row end  -->

    <!--    droppable-row start   -->
    <div class="droppable-row">
        <div class="draggableClone">
            <h2>Droppable</h2>
            <div class="draggable draggable-clone"></div>
            <div class="draggable draggable-clone"></div>
            <div class="droppable" id="droppable-clone"></div>
        </div>
    </div>
</div> 
        
HTML,
      'js' => <<<JS
        
/* Sortable add A*/
$('#list-accept-selector').sortable({ accept: '.a', activeClass: 'active'}).on('sortable:receive');
$('#example-accept-selector .draggable').draggable({ connectWith: '#list-accept-selector' });

/* Sortable add B*/
$('#list-accept-function').sortable({ accept: function (event) { return el.hasClass('b') } }).on('sortable:receive');
$('#example-accept-function .draggable').draggable({ connectWith: '#list-accept-function' });



// connect with B
$('#lhs').sortable({ connectWith: '#rhs'});
$('#rhs').sortable();



// append ✓
$('#example-update').sortable().on('sortable:update', function() {
    $('#example-update-result').append('✓')
});
$('#example-update .draggable').draggable({ connectWith: '#example-update' });


// sortableRecieveBoxes
$('#example-receive-a').sortable().on('sortable:receive', function() {
    $('#example-receive-result').append('✓')
});
$('#example-receive-b').sortable({ connectWith: '#example-receive-a' });
$('.draggable.example-receive').draggable({ connectWith: '#example-receive-a' });



//draggable and clone
$('.draggable-clone').draggable();
$('#droppable-clone').droppable({hoverClass : 'drop-here', activeClass: 'active'});

$('.draggable-clone-2').draggable({ clone: true});
$('#droppable-clone-2').droppable({hoverClass : 'drop-here', activeClass: 'active'})
          
JS,
      'css' => <<<CSS
    
.container{
    margin: 0 auto;
    width: 1200px;

}
    .A-Brow{
        display: flex;
        justify-content: space-around;
    }
    .connectWith-sortable-apped-row{
        display: flex;
        justify-content: space-around;
    }
    .droppable-row{
        display: flex;
        justify-content: space-around;
    }

    .draggable, .droppable {
        border: 1px dashed #000;
        width: 50px;
        height: 50px;
        background-color: #fff;
        display: inline-block;
        box-sizing: border-box;
        vertical-align: top;
    }

    .droppable {
        border-color: #31b03d;
        padding: 5px 2px;
    }

    .draggable.clone {
        background-color: #abe2a5;
    }

    .droppable.big {
        height: 60px;
        width: 100px;
    }

    .droppable.big .droppable {
        float: right;
    }

    .droppable.active {
        background-color: #abe2a5;
    }

    .droppable.drop-here {
        background-color: #3498db;
    }

    .droppable .draggable {
        width: 16px;
        height: 16px;
        margin: 0 3px;
        font-size: 10px;
        padding: 2px;
    }


    #droppable .droppable {
        float: right;
    }

    ul.list, ul.grid {
        list-style-type: none;
        padding: 0;
        width: 162px;
    }

    ul.grid.wide {
        width: 100%;
        height: 50px;
    }

    ul.grid.active {
        background-color: #abe2a5;
    }

    ul.list li, ul.grid li {
        border: 1px solid #DCDBDD;
        margin: 2px;
        padding: 2px 5px;
        background-color: #F6F5F7;
        box-sizing: border-box;
        vertical-align: top;
    }

    ul.list li {
        height: 28px;
    }

    ul.grid li {
        float: left;
        height: 50px;
        width: 50px;
    }

    ul.list li.placeholder, ul.grid li.placeholder {
        border-style: dashed;
        background-color: transparent;
    }

   
CSS,
  ];

  /**
   *
   * Plugin Events
   * https://select2.org/programmatic-control/events
   */
  public $event = [];
  public $_event = [

  ];


  /**
   *
   * Constants
   */


  public function asset()
  {
    $this->fileJs('https://cdn.jsdelivr.net/npm/touch-dnd@1.2.1/touch-dnd.js');


    // $this->fileJs('/publish/yarner/touch-dnd/touch-dnd.js');
  }


  public function codes()
  {
    //  $this->htm = \kartik\select2\Select2::widget($this->options);


    if ($this->_config['visible'])
      $this->htm = $this->_layout[$this->_config['type']];

    $this->js = strtr($this->_layout['js'], []);


    $this->css = strtr($this->_layout['css'], []);

      $this->htm = strtr($this->_layout['main'], [
          
          '{readonly}' => $this->_config['readonly'] ? 'readonly' : ''
      ]);
  }

}
