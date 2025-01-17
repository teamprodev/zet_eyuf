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

namespace zetsoft\service\smart;


use kartik\base\InputWidget;
use zetsoft\dbdata\wdg\WidgetData;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\models\ALL\test;
use zetsoft\system\actives\ZDynamicModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\widgets\inputes\ZHHiddenInputWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;

class WidgetA extends ZFrame
{

    

    public function form($class, $id, $modelClass)
    {

        $app = new ALLApp();

        $config = new Config();

        $config->title = Az::l(bname($class));
        $app->configs = $config;

        $widget = new $class();
        $configs = $widget->_config;

        /**
         *
         * Core Items
         */

        $column = new Form();
        $column->widget = ZKSelect2Widget::class;
        $column->data = WidgetData::class;
        $column->options = [
            'event' => [
                'select' => ' $("#class-submitButton").click(); ',
            ],
        ];
        $app->columns['class'] = $column;

        $column = new Form();
        $column->widget = ZHHiddenInputWidget::class;
        $column->value = $id;
        $app->columns['id'] = $column;


        $column = new Form();
        $column->widget = ZHHiddenInputWidget::class;
        $column->value = $modelClass;
        $app->columns['modelClass'] = $column;

        foreach ($configs as $key => $value) {
            if (is_bool($value)) {
                $column = new Form();
                $column->title = ucfirst($key);
                $column->widget = ZKSwitchInputWidget::class;
                $column->options = [

                    'config' => [
                        'width' => 40
                    ],

                    'event' => [
                        'switchChange.bootstrapSwitch' => '  $("#option-submitButton").click() ',
                    ]
                ];

            }

            if (is_string($value) || $value === null) {

                $column = new Form();
                $column->title = ucfirst($key);

            }

            try {

                $const = constant($widget::className() . '::' . $key);

                $column = new Form();
                $column->title = ucfirst($key);
                $column->widget = ZKSelect2Widget::class;
                $column->options = [
                    'event' => [
                        'select' => ' $("#option-submitButton").click(); ',
                    ],
                ];
                $column->data = $const;

                if ($key === 'theme')
                    $column->value = ZKSelect2Widget::theme['default'];


            } catch (\Exception $e) {

            }
            $app->columns[$key] = $column;

        }


        $app->cards = [];

        return Az::$app->forms->former->model($app);
    }

    public function formDb($class, $id)
    {


        $formDb = CoreFormDb::findOne($id);
        $class = $formDb->widget;

        $app = new ALLApp();

        $config = new Config();
        $config->title = Az::l(bname($class));

        $app->configs = $config;


        /** @var ZKSelect2Widget $widget */
        $widget = new $class();
        $configs = $widget->_config;

        $column = new Form();
        $column->title = ucfirst('class');
        $column->widget = ZKSelect2Widget::class;
        $column->data = WidgetData::class;
        $column->options = [
            'event' => [
                'select' => ' $("#submitButton").click(); ',
            ],
        ];
        $app->columns['class'] = $column;

        foreach ($configs as $key => $value) {
            if (is_bool($value)) {
                $column = new Form();
                $column->title = ucfirst($key);
                $column->widget = ZKSwitchInputWidget::class;
                $column->options = [
                    'event' => [
                        'switchChange.bootstrapSwitch' => '  $("#submitButton").click() ',
                    ]
                ];

            }

            if (is_string($value) || $value === null) {
                $column = new Form();
                $column->title = ucfirst($key);
                $column->widget = ZHInputWidget::class;

            }

            try {

                $const = constant($widget::className() . '::' . $key);


                $column = new Form();
                $column->title = ucfirst($key);
                $column->widget = ZKSelect2Widget::class;
                $column->options = [
                    'event' => [
                        'select' => ' $("#submitButton").click(); ',
                    ],
                ];
                $column->data = $const;

                if ($key === 'theme')
                    $column->value = ZKSelect2Widget::theme['default'];


            } catch (\Exception $e) {

            }
            $app->columns[$key] = $column;

        }


        $app->cards = [];

        return Az::$app->forms->former->model($app);
    }

}
