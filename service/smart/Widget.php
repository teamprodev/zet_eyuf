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


use zetsoft\dbitem\core\WebItem;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\FormDb;
use zetsoft\dbitem\shop\PropertyItem;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\models\page\PageAction;
use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\drag\DragForm;
use zetsoft\models\drag\DragFormDb;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\Menu;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopOptionBranch;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\models\shop\ShopProduct;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\kernels\ZView;
use zetsoft\system\module\Models;
use zetsoft\widgets\actions\ZEasySelectableWidget;
use zetsoft\widgets\images\ZImageWidget;
use zetsoft\widgets\incores\ZMCheckboxGroupWidget;
use zetsoft\widgets\incores\ZMCheckboxWidget;
use zetsoft\widgets\inputes\ZBootstrapImgCheckboxGroupWidgetM;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZHCheckboxButtonGroupWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\widgets\navigat\ZGAccordionWidget;
use zetsoft\widgets\navigat\ZMarketDropdownWidget;


class Widget extends ZFrame
{

    public function getUrl($params)
    {

        $url = ZUrl::to(ZArrayHelper::merge([
            '/' . $this->moduleId . '/' . $this->controlId . '/' . $this->actionId,
        ], $params));

        return $url;

    }

    #region SELECT2




    public function fixArray($array)
    {

        $return = [];

        $first = [];
        foreach ($array as $key => $value) {
            $first['id'] = $key;
            $first['text'] = $value;
            $return[] = $first;
        }

        return $return;

    }

    #endregion

    #region GET OPTIONS

    /*
     * @author: DavlatovRavshan MurodovMirbosit
     */
    public function settings($widget, $options)
    {

        $defaultConfigs = Az::$app->smart->widget->defaultConfig($widget);

        $array = [
            'grapesWrap' => 'grapesWrap',
            'models' => 'model',
            'attribute' => 'attribute',
            'datas' => 'data',
            'ids' => 'id',
        ];

        $config = [];
        foreach ($options as $key => $value) {

            if (empty($value))
                continue;

            if (!ZArrayHelper::keyExists($key, $array))
                $config[$key] = ZVarDumper::ajaxValue($value);
            else
                $defaultConfigs[$array[$key]] = ZVarDumper::ajaxValue($value);

        }

        $config = $this->filterOptions($widget, $config);

        $defaultConfigs = $this->getModel($defaultConfigs);
        $defaultConfigs['config'] = $config;

        return $defaultConfigs;

    }

    public function filterOptions($widget, $options)
    {

        $configs = (new $widget())->_config;

        $return = [];
        foreach ($options as $key => $option) {

            if (!ZArrayHelper::keyExists($key, $configs) && !$configs[$key])
                continue;

            if ($option !== $configs[$key])
                $return[$key] = $option;

        }

        return $return;

    }

    /*
     * Barcha optionlarni widgetlarda chiqarib beradi
     * */
    public function optionsFix($items, $class, $app)
    {

        /** @var ZInputWidget $zwidget */
        $zwidget = new $class();

        foreach ($items as $key => $value) {

            $widget = ZInputWidget::class;
            $options = [
                'event' => [
                    'change' => <<<JS
        function() {
            $('#sendOptions').click()
        }
JS,
                ]
            ];
            $data = [];

            switch (true) {

                case is_bool($value):
                    $widget = ZKSwitchInputWidget::class;
                    $options = [
                        'config' => [
                            'hasPlace' => false,
                            'class' => 'p-0'
                        ],
                        'event' => [
                            'switchChange.bootstrapSwitch' => <<<JS
                        function() {
                            $('#sendOptions').click()
                        }
JS,
                        ],
                    ];

                    break;

                case is_array($value):

                    $widget = ZKSelect2Widget::class;

                    $options = [
                        'config' => [
                            'multiple' => true,
                            'theme' => ZKSelect2Widget::theme['bootstrap'],
                        ],
                        'event' => [
                            'select' => <<<JS
                        function() {
                            $('#sendOptions').click()
                        }
JS,
                        ],
                    ];
                    break;

                case !empty(Az::$app->utility->pregs->refConstant($class, $key)):

                    $widget = ZKSelect2Widget::class;
                    $data = Az::$app->utility->pregs->refConstant($class, $key);
                    $options = [
                        'data' => $data,
                        'config' => [
                            'theme' => ZKSelect2Widget::theme['bootstrap'],
                        ],
                        'event' => [
                            'select' => <<<JS
                        function() {
                            $('#sendOptions').click()
                        }
JS,
                        ],
                    ];

                    break;


                case is_int($value):

                    $widget = ZKTouchSpinWidget::class;

                    break;

            }


            switch ($key) {


                case 'models':
                    $widget = ZKSelect2Widget::class;
                    $options = [
                        'data' => Az::$app->smart->migra->baseModels(),
                    ];

                    break;


                case 'attribute':
                    $widget = ZDepdropWidget::class;
                    $options = ZArrayHelper::merge([
                        'id' => 'grapes-attribute',
                        'config' => [
                            'depend' => 'models',
                            'namespace' => 'inputs',
                            'service' => 'depend',
                            'method' => 'getAttrs',
                        ],
                    ], $options);

                    break;

                case 'namespace':
                    $widget = ZKSelect2Widget::class;
                    $options = [
                        'data' => Az::$app->App->eyuf->grape->getServiceFolders(),
                    ];

                    break;

                case 'service':
                    $widget = ZDepdropWidget::class;
                    $options = [
                        'config' => [
                            'depend' => 'namespace',
                            'App' => true,
                            'namespace' => 'eyuf',
                            'service' => 'grape',
                            'method' => 'getServices'
                        ]
                    ];

                    break;


                case 'method':
                    $widget = ZDepdropWidget::class;
                    $options = [
                        'config' => [
                            'depend' => [
                                'namespace',
                                'service'
                            ],
                            'App' => true,
                            'namespace' => 'eyuf',
                            'service' => 'grape',
                            'method' => 'getServicesMethod'
                        ],
                        'event' => [
                            'change' => <<<JS
                        function() {
                            $('#sendOptions').click()
                        }
JS,
                        ],
                    ];
                    break;
            }

            $title = ucfirst($key);
            if (ZArrayHelper::keyExists($key, $zwidget->_label))
                $title = $zwidget->_label[$key];

            $title = Az::l($title);
            $column = new Form();
            $column->title = $title;
            $column->value = $value;
            $column->widget = $widget;
            $column->options = $options;
            $column->data = $data;
            $app->columns[$key] = $column;
        }
    }

    public function allOptions($widget, $configs)
    {
        $branches = (new $widget())->_branch;
        $labels = (new $widget())->_branchLabel;

        $must = $this->varsFix($configs, $widget);
        $configs = ZArrayHelper::merge($configs, $must);

        $models = [];
        foreach ($branches as $key => $value) {

            $app = new ALLApp();
            $app->configs = new ConfigDB();

            $items = [];
            foreach ($configs as $k => $val) {
                if (ZArrayHelper::isIn($k, $value))
                    $items[$k] = $val;
            }

            $this->optionsFix($items, $widget, $app);
            $model = Az::$app->forms->former->model($app);

            if (ZArrayHelper::keyExists($key, $labels))
                $key = $labels[$key];

            $models[$key] = $model;

        }

        return $models;

    }

    #endregion

    #region FIXES

    public function modelFix($widget)
    {

        $model = CoreInput::class;

        if (false !== strpos($widget, 'former'))
            $model = Menu::class;

        return $model;
    }

    public function attributeFix($widget, $model)
    {

        $attribute = (new $widget())->dbType . '_2';

        if (!preg_match('/inputes/', $widget))
            $attribute = null;

        return $attribute;
    }

    public function defaultConfig($widget)
    {

        $obj = new $widget;
        $model = $this->modelFix($widget);

        return [
            'model' => $model,
            'data' => $obj->data ?? [],
            'id' => bname($widget) . '_' . random_int(1, 1000000),
            'attribute' => $obj->dbType . '_2',
            'config' => Az::$app->smart->visuals->optionsFix($widget, $obj->_config),
        ];
    }

    public function varsFix($options, $widget)
    {

        $obj = new $widget();
        $model = $this->modelFix($widget);

        $must = [
            
            'models' => $model,
            'ids' => bname($widget) . '_' . random_int(1, 1000000),
            'attribute' => $obj->dbType . '_2',
        ];

        foreach ($must as $key => $value)
            if (ZArrayHelper::keyExists($key, $options))
                $must[$key] = $options[$key];

        return $must;
    }

    public function getModel($defaultConfigs)
    {

        $model = ZArrayHelper::getValue($defaultConfigs, 'model');
        if ($model) {

            $object = new $model();
            $defaultConfigs['model'] = $object;

            /** @var Models $object */
            $attribute = ZArrayHelper::getValue($defaultConfigs, 'attribute');

            if (!ZArrayHelper::isIn($attribute, $object->columnsList()))
                $defaultConfigs['attribute'] = ZArrayHelper::getValue($object->columnsList(), 0);

        }


        return $defaultConfigs;

    }

    public function formDbFix($options, $widget)
    {

        $array = [
            'grapesWrap' => 'grapesWrap',
            'model' => 'models',
            'attribute' => 'attribute',
            'data' => 'datas',
            'id' => 'ids',
        ];

        $vars = [];

        foreach ($options as $key => $value)
            if (ZArrayHelper::keyExists($key, $array))
                $vars[$array[$key]] = $value;

        $config = ZArrayHelper::getValue($options, 'config');

        if (preg_match('/former/', $widget))
            if ($vars['models'] === CoreInput::class)
                $vars['models'] = $this->modelFix($widget);

        return ZArrayHelper::merge($vars, $config);

    }

    #endregion

    #region MODEL ATTRIBUTES

    public function dataFix($data)
    {
        $items = [];

        if (!empty($data) && is_array($data)) {
            foreach ($data as $item) {
                if (!empty($item['value'])) {
                    if (!empty($item['key']))
                        $items[$item['key']] = $item['value'];
                    else
                        $items[$item['value']] = $item['value'];
                }
            }
        }

        return $items;
    }


    public function getDependColumns($selected = null, $dependModel, $dependAttr)
    {

        if (empty($selected))
            return null;

        $models = $dependModel::find()
            ->where([
                $dependAttr => $selected
            ])
            ->all();

        if (is_array($selected))
            foreach ($selected as $value) {
                $models = $dependModel::find()
                    ->where([
                        $dependAttr => $value
                    ])
                    ->all();
            }

        $return = [];
        foreach ($models as $model) {
            $return[$model->id] = $model->name;
        }

        return $return;

    }


    public function getModelArray($class)
    {

        $models = $class::find()->all();

        return ZArrayHelper::map($models, 'id', 'name');

    }


    public function getModelAttributes($bool = false)
    {

        $attributes = [];
        $classes = Az::$app->smart->migra->scanFromTable($bool);

        foreach ($classes as $class)
            $attributes[$class] = $this->getAttributesName($class);

        return $attributes;

    }


    public function getModelAttributesByFiles($bool = false)
    {

        $attributes = [];
        $classes = Az::$app->smart->migra->scan($bool);

        foreach ($classes as $class)
            $attributes[$class] = $this->getAttributesName($class);

        return $attributes;

    }

    public function getAttributesName($class)
    {

        $excludes = [
            'id',
            'created_at',
            'created_by',
            'modified_at',
            'modified_by',
        ];

        $items = [];
        $attributes = (new $class())->columnsList();
        foreach ($attributes as $attribute) {
            if (ZArrayHelper::isIn($attribute, $excludes))
                continue;

            $items[$attribute] = $attribute;
        }

        return $items;
    }


    public function getModelAttributesFromTable($type = 'model')
    {

        $attributes = [];
        $classes = Az::$app->smart->migra->scanFromTable($type);

        foreach ($classes as $modelId => $class)
            $attributes[$class] = $this->getAttributesFromTable($modelId, $type);

        return $attributes;

    }

    public function getAttributesFromTable($modelId, $type)
    {


        $return = [];

        $class = DragFormDb::class;
        $column = 'drag_config_db_id';
        if ($type === 'form') {
            $class = DragForm::class;
            $column = 'drag_config_id';
        }

        $columns = $class::find()
            ->where([
                $column => $modelId
            ])
            ->all();


        foreach ($columns as $column) {
            $return[$column->name] = $column->name;
        }

        return $return;
    }

    #endregion

    public function getTimeColumns($model)
    {

        $return = [];

        /** @var Models $model */
        foreach ($model->columns as $key => $column) {

            if ($column->widget === ZKDatepickerWidget::class) {
                $return[] = $key;
            }

        }

        return $return;

    }

    public function test()
    {

        return [
            'item 1',
            'item 1',
            'item 1',
            'item 1',
            'item 1',
            'item 1',
            'item 1',
        ];

    }


}
