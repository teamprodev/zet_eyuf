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

namespace zetsoft\widgets\incores;


use zetsoft\system\kernels\ZWidget;


/**
 *  https://bantikyan.github.io/icheck-material/ asset
 *  https://github.com/bantikyan/icheck-material
 */
class ZGrapesCheckboxWidget_02 extends ZWidget
{
    /**
     * Configuration
     */
    public $config = [];
    public $_config = [
        'color' => ZGrapesCheckboxWidget_02::colors['red'],
        'class' => '',
        'label' => '',
        'url' => '',
        'ic-target' => '',
        'ic-push-url' => '',
    ];


    public $event = [];
    public $_event = [
        'click' => 'function (){console.log("clicked")}',
        'change' => 'function (){console.log("changed")}',
    ];

    public const colors = [
        'red' => 'red',
        'pink' => 'pink',
        'purple' => 'purple',
        'deeppurple' => 'deeppurple',
        'indigo' => 'indigo',
        'blue' => 'blue',
        'lightblue' => 'lightblue',
        'cyan' => 'cyan',
        'teal' => 'teal',
        'green' => 'green',
        'lightgreen' => 'lightgreen',
        'lime' => 'lime',
        'yellow' => 'yellow',
        'amber' => 'amber',
        'orange' => 'orange',
        'deeporange' => 'deeporange',
        'brown' => 'brown',
        'grey' => 'grey',
        'bluegrey' => 'bluegrey',
    ];

    public $layout = [];
    public $_layout = [
        'main' => <<<HTML
         <div class="icheck-material-{color}">
            <input
                id="{inputId}" 
                type="checkbox" 
                class="{class}" 
                name="{name}"
                value="{value}"
                {cooler}
            >  
         <label for="{inputId}">{placeholder}</label>
          
         </div> 
HTML,

        'cooler' => <<<HTML
         ic-target="{ic-target}"
         ic-push-url="{ic-push-url}"
         ic-delete-from="{url}"
HTML,


        'js' => <<<JS
$(function() {
    $("#{inputId}").click(function(){
        if ($(this).is(":checked")) {
            $(this).addClass('checked');
            $(this).val('1');
        } 
        else {
            $(this).removeClass('checked');
            $(this).val('0')
        }
    });
});
JS,
        'event' => <<<JS
    $('#{inputId}')
    .on('click', {click})
    .on('change', {change});
JS,

    ];

    public function asset()
    {
        $this->fileCss('https://cdn.jsdelivr.net/npm/icheck-material@1.0.1/icheck-material.css');
    }

    public function codes()
    {
        $cooler = '';
        if ($this->_config['cooler'])
            $cooler .= strtr($this->_layout['cooler'], [
                '{url}' => $this->_config['url'],
                '{ic-target}' => $this->_config['ic-target'],
                '{ic-push-url}' => $this->_config['ic-push-url'],
            ]);


        $this->htm = strtr($this->_layout['main'], [
            '{inputId}' => 'check' . uniqid('', true),
            '{name}' => $this->name,
            '{value}' => $this->value,
            '{placeholder}' => $this->_config['hasPlace'] ? $this->_config['placeholder'] : '',
            '{label}' => $this->_config['label'],
            '{class}' => $this->_config['class'],
            '{color}' => $this->_config['color'],
            '{cooler}' => $cooler,
        ]);

        $this->js .= strtr($this->_layout['js'], [
            '{inputId}' => 'check' . $this->id,
        ]);

        $this->js .= strtr($this->_layout['event'], [
            '{inputId}' => 'check' . $this->id,
            '{click}' => $this->eventCode('click'),
            '{change}' => $this->eventCode('change')
        ]);
    }
}

