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
 *
 * Created By: Asror Zakirov
 * Refactored: Asror Zakirov
 */
class ZMechaniciousDomenuWidget extends ZWidget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [
        /*'type' => ZMechaniciousDomenuWidget::type['main'],*/
        'grapes' => true,
    ];


    public const type = [
        'main' => 'main'

    ];

    public $layout = [];
    public $_layout = [

        'main' => <<<HTML
        <div class="dd" id="domenu-0"  {readonly}>
    <button class="dd-new-item">+</button>
    <li class="dd-item-blueprint">
        <button class="collapse" data-action="collapse" type="button" style="display: none;">–</button>
        <button class="expand" data-action="expand" type="button" style="display: none;">+</button>
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content">
            <span class="item-name">[item_name]</span>
            <div class="dd-button-container">
                <button class="item-add">+</button>
                <button class="item-remove" data-confirm-class="item-remove-confirm">&times;</button>
            </div>
            <div class="dd-edit-box" style="display: none;">
                <input type="text" name="title" autocomplete="off" placeholder="Item"
                       data-placeholder="Any nice idea for the title?"
                       data-default-value="doMenu List Item. {?numeric.increment}">
                <i class="end-edit">save</i>
            </div>
        </div>
    </li>
    <ol class="dd-list"></ol>
</div>

<select name="custom-select">
    <option>select something...</option>
    <optgroup label="Pages">
      <option value="1">http://example.com/page/1</option>
      ...
    </optgroup>
    <optgroup label="Categories">
      <option value="3">News</option>
      ...
    </optgroup>
  </select>
HTML,
        'js' => <<<JS
        $(document).ready(function() {
        $('#domenu-0').domenu({
        listNodeName:           'ol',
      itemNodeName:           'li',
      rootClass:              'dd',
      listClass:              'dd-list',
      itemClass:              'dd-item',
      itemBlueprintClass:     'dd-item-blueprint',
      dragClass:              'dd-dragel',
      handleClass:            'dd-handle',
      collapsedClass:         'dd-collapsed',
      placeClass:             'dd-placeholder',
      noDragClass:            'dd-nodrag', // Items with this class will be undraggable
      emptyClass:             'dd-empty',
      contentClass:           'dd3-content',
      itemAddBtnClass:        'item-add',
      removeBtnClass:         'item-remove',
      itemRemoveBtnConfirmClass: 'confirm-class',
      addBtnSelector:         'button', // Provide a global selector for an add button
      addBtnClass:            'dd-new-item',
      editBoxClass:           'dd-edit-box',
      inputSelector:          'input, select, textarea', // Selects input fields to serialize to JSON
      collapseBtnClass:       'collapse',
      expandBtnClass:         'expand',
      endEditBtnClass:        'end-edit',
      itemBtnContainerClass:  'dd-button-container',
      itemNameClass:          'item-name',

      data:                   '[{"title":"Account","customSelect":"select something...","select2ScrollPosition":{"x":0,"y":0},"id":1,"__domenu_params":{}},{"title":"Settings","customSelect":"select something...","select2ScrollPosition":{"x":0,"y":0},"id":2,"__domenu_params":{}},{"title":"Call","customSelect":"select something...","id":3,"__domenu_params":{}},{"title":"Support","customSelect":"select something...","id":4,"__domenu_params":{}},{"title":"Email","customSelect":"select something...","id":5,"__domenu_params":{}},{"title":"Orders","customSelect":"select something...","id":6,"__domenu_params":{"collapsed":false},"children":[{"title":"Manage","customSelect":"3","id":7,"__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]},{"title":"Settings","customSelect":"select something...","id":8,"__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]', // JSON data to build an instance from (don't forget to call parseJson)
      allowListMerging:       false,  // Accept incoming items from foreign lists e.g:
                                      // true – accept all
                                      // false – roleShow all
                                      // ['domenu-2'] – accept from instances matching #domenu-2
      select2: {

        support:     false, // Enable Select2 support
        selectWidth: '45%', // Any CSS-supported value is valid
        params:      {}     // Provide Select2 params
      },
      slideAnimationDuration: 0,
      maxDepth:               5,    // Item nesting limit
      threshold:              20,   // Dragging sensitivity
      refuseConfirmDelay:     2000, // Time (in ms) to wait on confirmation of an item removal
      newItemFadeIn:          350,  // Set 0 for no fadeIn effect
      event:                  {
        onToJson:           [],
        onParseJson:        [],
        onSaveEditBoxInput: [],
        onItemDrag:         [],
        onItemAddChildItem: [],
        onItemDrop:         [],
        onItemAdded:        [],
        onItemExpanded:     [],
        onItemCollapsed:    [],
        onItemRemoved:      [],
        onItemStartEdit:    [],
        onItemEndEdit:      [],
        onCreateItem:       [],
        onItemMaxDepth:     [],
        onItemSetParent:    [],
        onItemUnsetParent:  []
      },
      paramsDataKey:          '__domenu_params' // The property under which internal settings will be serialized

}).parseJson();

    });
JS,
    ];

    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [

    ];


    public function asset()
    {
        $this->fileCss('https://cdn.jsdelivr.net/npm/domenu@0.99.77/jquery.domenu-0.99.77.css');
        /* $this->fileJs('https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.js');*/
        /* $this->fileJs('/publish/yarner/domenu/jquery.domenu-0.99.77.js');*/
        $this->fileJs('https://cdn.jsdelivr.net/npm/domenu@0.99.77/jquery.domenu-0.99.77.js');
    }


    public function codes()
    {
        //  $this->htm = \kartik\select2\Select2::widget($this->options);


        if ($this->_config['visible'])

           $this->htm =  strtr($this->_layout['main'], [


            ]);

        $this->js = strtr($this->_layout['js'], []);
    }

}
