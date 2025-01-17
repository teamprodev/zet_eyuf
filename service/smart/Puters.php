<?php

/**
 *
 *
 * Author:  Asror Zakirov
 *
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\service\smart;

use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\dbitem\data\Settings;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\models\user\UserCompany;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\module\Models;
use zetsoft\widgets\inputes\ZFileInputWidget;


/**
 * Class    Puters
 * @package zetsoft\service\smart
 *
 */
class Puters extends ZFrame
{
    #region Vars


    /* @var ALLApp $allApp */
    public $allApp;

    /* @var Settings $proper */
    public $setter;

    public $uses = [];
    public $defaultUses = [];

    private $columns;
    private $event;
    private $faker;
    private $value;

    private ?string $configs = null;
    private $cards;
    private $events;
    private $consts;

    private $langs;
    private $names;

    private $relateOne;
    private $relateMulti;
    private $relateMany;


    private $attrByType;
    private $variables;
    
    private $attrs;
    private $modelVars;
    private $modelProps;
    private $fields;

    #endregion

    #region Main

    public function layout()
    {

        $this->layout = [

            'model' => file_get_contents(Az::getAlias('@zetsoft/binary/giiapp/model.php')),

            'form' => file_get_contents(Az::getAlias('@zetsoft/binary/giiapp/forms.php')),


            'config-db' => '
    public function config()
    {
        return function (ConfigDB $config) {
// Config

            return $config;
        };
    }',


            'config' => '
    public function config()
    {
        return function (Config $config) {
// Config
            return $config;
        };
    }',

            'value' => '
    public function value(ModelName &$model = null)
    {
        if ($model === null)
            $model = $this;

        // Todo: MyCode

        $model->save();
    }',

            'event' => '
    public function event()
    {

        $event = new Event();
    /*
        $event->beforeDelete = function (ModelName $model) {
            return null;
        };

        $event->afterDelete = function (ModelName $model) {
            return null;
        };

        $event->beforeSave = function (ModelName $model) {
            return null;
        };

        $event->afterSave = function (ModelName $model) {
            return null;
        };

        $event->beforeValidate = function (ModelName $model) {
            return null;
        };

        $event->afterValidate = function (ModelName $model) {
            return null;
        };

        $event->afterRefresh = function (ModelName $model) {
            return null;
        };

        $event->afterFind = function (ModelName $model) {
            return null;
        };
*/
        return $event;

    }',

            'faker' => '
    public function faker()
    {
        return null;
    }',


            'column' => '
    public function column()
    {
        if (!empty($this->configs->column))
            return $this->configs->column;

        $return = ZArrayHelper::merge(parent::column(), [
// Column
        ], $this->configs->replace);
        
        
        return $return;
    }',


            'card' => '
    public function card()
    {
        return [Blocks];
    }',

            'attrByType' => '
 * @property {attrType} ${attrName}',

            'properties' => '
    /* @var {attrType} ${attrName} */
    public ${attrName};
',

            'attrs' => "
        '{attrName}',",

            'modelVars' => '
    public ${attrName};',

            'modelProps' => '
        \'{attrName}\',',


            'relHasOne' => '
    /**
     *
     * Function  get{modelClassName}
     * @return bool|\yii\db\ActiveRecord|{name}|null
     */            
    public function get{modelClassName}One()
    {
        return $this->getOne({name}::class, {value});    
    }
    
     /**
     *
     * Function  get{modelClassName}
     * @return \yii\db\ActiveQuery | ZActiveQuery
     */            
    public function get{modelClassName}()
    {
        return $this->hasOne({name}::class, {value});    
    }
    
    
',

            'relHasMulti' => '
    /**
     *
     * Function  get{modelClassName}Multi
     * @return  null|\yii\db\ActiveRecord[]|{name}
     */            
    public function get{modelClassName}Multi()
    {
        return $this->getMulti({name}::class, {value});    
    }
',
            'relHasMany' => '
    /**
     *
     * Function  get{modelClassName}Many
     * @return  null|\yii\db\ActiveRecord[]|{name}
     */            
    public function get{modelClassName}Many()
    {
       return $this->getMany({name}::class, {value});     
    }
    
    /**
     *
     * Function  get{modelClassName}
     * @return  null|\yii\db\ActiveQuery
     */            
    public function get{modelClassName}()
    {
       return $this->hasMany({name}::class, {value});     
    }
',

            'consts' => '
    /* @var array $_{name}*/
    public $_{name};  
    public const {name} = {value};
',


            'init' => '
        $this->_{name} = [{value}
        ];
        ',
            /**
             *
             * Configs
             */

            'config->title' => '
            $config->title = Az::l({value});',


            'config-lang->title' => '
            $config->title = {value};',


            'config->name' => '
            $config->{name} = {value};',


            'config->closure' => '
            {value}',


            'config->func' => '
            $config->{name} = {value}',


            /**
             *
             * Columns
             */


            'column-model' => "           
            '{index}' => function (FormDb \$column) {
{value}

                return \$column;
            },
            
",
            'column-form' => "           
            '{index}' => static function (Form \$column) {
{value}


                return \$column;
            },
            
",

            'column->title' => '
                $column->title = Az::l({value});',

            'column->tooltip' => '
                $column->tooltip = Az::l({value});',

            'column-lang->title' => '
                $column->title = {value};',

            'column-lang->tooltip' => '
                $column->tooltip = {value};',

            'column->data' => '
                $column->data = [{value}
                ];',


            'column->data-item' => "
                    '{name}' => Az::l('{value}'),",

            'column->name' => '
                $column->{name} = {value};',

            'column->func' => '
                $column->{name} = {value}',

            'fields' => '
   public function fields()
   {
       return [
{attributes}
       ];
   }
',

        ];


    }

    public function tests()
    {

        $model = new UserCompany();

        $setter = new Settings();

        $setter->className = 'Computer';
        $setter->type = Settings::type['model'];
        $setter->classBase = ZActiveRecord::class;
        $setter->namespace = 'zetsoft\models\libra';
        $setter->allApp = $model->allApp();
        $this->run($setter);


        $model = new TestLaptopForm();
        $setter = new Settings();
        $setter->className = 'LaptopForm';
        $setter->type = Settings::type['form'];
        $setter->classBase = ZModel::class;
        $setter->namespace = 'zetsoft\former\libra';
        $setter->allApp = $model->allApp();

        $this->run($setter);
    }






    #endregion


    #region Core

    /**
     *
     * Function  run
     * @param Settings $setter
     * @return  bool|void
     */
    public function run($setter)
    {

        Az::start(__FUNCTION__);
        $this->null();
        $this->defaultUses = [
            Az::class,
            ZArrayHelper::class,
            Config::class,
            ConfigDB::class,
            ZModel::class,
        ];

        $this->setter = $setter;
        $this->allApp = $setter->allApp;

        Az::debug("Starting: Class: {$this->setter->className} | Type: {$this->setter->type} | Space: {$this->setter->namespace} ");

        $this->uses();
        $this->configs();
        $this->event();
//        $this->faker();
        $this->value();

        if ($this->allApp->configs === null)
            return Az::warning($this->setter->class, 'Puters Config is Empty');

        $this->columns();

        $this->variables();
        $this->fields();

        $this->relations();

        $this->cards();
        $this->writeFile();
        return Az::info('OK');
    }

    public function null()
    {
        $this->uses = [];
        $this->configs = null;
        $this->event = null;
        $this->events = null;
        $this->columns = null;
        $this->cards = null;
        $this->consts = null;
        $this->langs = null;
        $this->names = null;
        $this->relateOne = null;
        $this->relateMulti = null;
        $this->relateMany = null;

        $this->modelVars = null;
        $this->attrs = null;
        $this->modelProps = null;
        $this->variables = null;
        $this->attrByType = null;

        $this->allApp = null;
        $this->setter = null;


    }


    #endregion

    #region Uses

    private function uses()
    {

        $uses = Az::$app->utility->pregs->refUses($this->setter->class);


        if (!empty($uses))
            foreach ($uses as $use)
                $this->usesAdd($use);

    }

    public function usesAdd($class)
    {
        $class = trim($class);

        if (class_exists($class)) {
            if (!ZArrayHelper::isIn($class, $this->uses)) {
                $this->uses[] = $class;
            }
        }

    }

    private function configs()
    {


        /**
         *
         * Choose Type
         */

        if ($this->setter->type === Settings::type['form']) {
            $config = new Config();
            $layout = $this->layout['config'];
        } else {
            $layout = $this->layout['config-db'];
            $config = new ConfigDB();
        }
        $configDBVars = get_object_vars($config);

        $configs = '';
        foreach ($configDBVars as $key => $value) {

            $configDbAppValue = $this->allApp->configs->$key;

            if ($configDbAppValue === $value)
                continue;


            switch (true) {

                case $key === 'title':
                    if ($this->coreLang())
                        $configs .= strtr($this->layout['config-lang->title'], [
                            '{value}' => ZVarDumper::value($configDbAppValue)
                        ]);
                    else
                        $configs .= strtr($this->layout['config->title'], [
                            '{value}' => ZVarDumper::value($configDbAppValue)
                        ]);

                    break;

                case is_object($configDbAppValue):
                    $return = Az::$app->utility->pregs->refClosure($configDbAppValue);
                    $configs .= strtr($this->layout['config->closure'], [
                        '{value}' => $return,
                        '{name}' => $key
                    ]);
                    break;
                //start: Daho
                case is_bool($configDbAppValue):
                    $configs .= strtr($this->layout['config->name'], [
                        '{value}' => ZVarDumper::normalizeBool($configDbAppValue),
                        '{name}' => $key
                    ]);
                    break;
                //end
                default:
                    $separator = "\r\n";
                    $var = ZVarDumper::value($configDbAppValue);

                    $line = strtok($var, $separator);

                    $return = "";

                    while ($line !== false) {
                        if ($line !== '                ') {
                            if ($line === '                ]')
                                $return .= $line;
                            else {
                                $line = str_replace('                                            ', '                            ', $line);


                                $return .= $line . "\n";


                            }
                        }

                        $line = strtok($separator);


                    }
                    $return = str_replace("\n;", ";\n", $return);
                    $configs .= strtr($this->layout['config->name'], [
                        '{value}' => $return,
                        '{name}' => $key
                    ]);
                    break;
            }
        }


        if ($this->allApp->configs->extraConfig) {
            $this->configs = Az::$app->utility->pregs->refMethod($this->setter->class, 'config');

            return true;
        }

        $this->configs = strtr($layout, [
            '// Config' => $configs,
        ]);

        return true;
    }

    private function coreLang()
    {
        return $this->setter->className === 'lang';
    }


    #endregion


    #region Process

    private function event()
    {
        $this->usesAdd(Event::class);
        $this->event = Az::$app->utility->pregs->refMethod($this->setter->class, 'event');

        if (strlen($this->event) === 65) {
            $this->event = strtr($this->layout['event'], [
                'ModelName' => bname($this->setter->class)
            ]);
        }
    }

    private function faker()
    {
        $this->faker = strtr($this->layout['faker'], [
            'ModelName' => bname($this->setter->class)
        ]);

        $b1 = (new $this->setter->class())->hasMethod('faker');
        $b2 = $this->allApp->configs->fakerClean;

        if ($b1 && !$b2) {
            $this->faker = Az::$app->utility->pregs->refMethod($this->setter->class, 'faker');
        } else {
            $this->faker = $this->layout['faker'];
        }
    }

    private function value()
    {
        $this->value = strtr($this->layout['value'], [
            'ModelName' => bname($this->setter->class)
        ]);

        $b1 = (new $this->setter->class())->hasMethod('value');

        if ($b1) {
            $this->value = Az::$app->utility->pregs->refMethod($this->setter->class, 'value');
        }
    }

    private function columns()
    {
        $columns = '';

        foreach ($this->allApp->columns as $index => $formDB) {

            Az::$app->smart->model->allApp = $this->allApp;

            /** @var Models $baseObject */
            $baseObject = new $this->setter->classBase;

            if (ZArrayHelper::keyExists($index, $baseObject->columns))
                if ($formDB->dbType === $baseObject->columns[$index]->dbType)
                    if (!$formDB->override)
                        continue;
            if ($this->setter->className === 'Lang')
                $this->paramSet('Lang', true);

            if ($this->setter->type === Settings::type['model'])
                if (Az::$app->smart->model->isExcluded($index))
                    continue;

            $formDbApp = $this->allApp->columns[$index];

            /**
             *
             * Depends
             */

            if ($this->setter->type === Settings::type['model'])
                if (!empty($formDB->fkTable) && $formDB->fkCreate === true)
                    $this->addDepend($formDB->fkTable);


            if ($this->setter->type === Settings::type['form']) {
                $formDB = new Form();
                $this->usesAdd(Form::class);
            } else {
                $formDB = new FormDb();
                $this->usesAdd(FormDb::class);
            }

            $formDbVars = get_object_vars($formDB);

            $column = null;

            foreach ($formDbVars as $key => $value) {

                $columnValue = $formDbApp->$key;

                if ($columnValue !== $value) {
                    if ($columnValue instanceof \Closure) {
                        $column .= EOL . Az::$app->utility->pregs->refClosure($columnValue);
                        continue;
                    }
                    switch ($key) {

                        case 'autoValue':

                            switch (true) {
                                case is_callable($columnValue):

                                    $column .= EOL . Az::$app->utility->pregs->refClosure($columnValue);
                                    break;

                                case is_string($columnValue):
                                    $column .= strtr($this->layout['column->name'], [
                                        '{name}' => $key,
                                        '{value}' => "'$columnValue'",
                                    ]);
                                    break;
                            }


                            break;
                        case 'data':

                            switch (true) {
                                case is_callable($columnValue):

                                    $column .= "\n" . Az::$app->utility->pregs->refClosure($columnValue);


                                    break;

                                case is_array($columnValue):

                                    $keys = array_keys($columnValue);
                                    $constValue = array_combine($keys, $keys);

                                    $this->consts .= strtr(
                                        $this->layout['consts'],
                                        [
                                            '{name}' => $index,
                                            '{value}' => ZVarDumper::value($constValue, 4),
                                        ]
                                    );

                                    /**
                                     *
                                     * lang Items
                                     */

                                    $langItems = '';
                                    foreach ($columnValue as $name => $item) {
                                        $langItems .= strtr(
                                            $this->layout['column->data-item'],
                                            [
                                                '{name}' => $name,
                                                '{value}' => $item,
                                            ]
                                        );
                                    }

                                    $column .= strtr($this->layout['column->data'], [
                                        '{name}' => $key,
                                        '{value}' => $langItems,
                                    ]);

                                    $langItems = str_replace('                    ', '            ', $langItems);

                                    $this->langs .= strtr($this->layout['init'], [
                                        '{name}' => $index,
                                        '{value}' => $langItems,
                                    ]);
                                    break;

                                default:

                                    if (is_string($columnValue)) {
                                        $this->usesAdd($columnValue);
                                        $columnValue = bname($columnValue) . '::class';
                                    }

                                    $column .= strtr($this->layout['column->name'], [
                                        '{name}' => $key,
                                        '{value}' => ZVarDumper::jscode($columnValue),
                                    ]);


                            }


                            break;

                        case 'tooltip':
                            if ($columnValue === $formDbApp->title)
                                break;

                            $value = $columnValue;
                            $value = ZVarDumper::value($value);
                            $text = str_replace('I D', 'ID', $value);
                            if ($formDbApp->title !== $value) {
                                if ($this->coreLang())
                                    $column .= strtr($this->layout['column-lang->tooltip'], [
                                        '{value}' => $value
                                    ]);
                                else
                                    $column .= strtr($this->layout['column->tooltip'], [
                                        '{value}' => $value
                                    ]);
                            }
                            break;
                        case 'title':


                            $value = $columnValue;
                            $value = ZVarDumper::value($value);
                            $text = str_replace('I D', 'ID', $value);

                            if ($this->coreLang())
                                $column .= strtr($this->layout['column-lang->title'], [
                                    '{value}' => $value
                                ]);
                            else
                                $column .= strtr($this->layout['column->title'], [
                                    '{value}' => $value
                                ]);
                            break;

                        case 'widget':
                        case 'valueWidget':
                        case 'filterWidget':
                        case 'dynaWidget':

                            if (is_string($columnValue))
                                $this->usesAdd($columnValue);


                            switch (true) {

                                case $columnValue === ZFileInputWidget::class:

                                    if (ZStringHelper::find($this->variables, "{$index}_XName")
                                        || ZStringHelper::find($this->variables, "{$index}_XFile")) {
                                        break;
                                    }
                                    $this->variables .= strtr(
                                            $this->layout['properties'],
                                            [
                                                '{attrType}' => 'string',
                                                '{attrName}' => "{$index}_XName",
                                            ]
                                        ) . strtr(
                                            $this->layout['properties'],
                                            [
                                                '{attrType}' => 'string',
                                                '{attrName}' => "{$index}_XFile",
                                            ]
                                        );


                                    $column .= strtr($this->layout['column->name'], [
                                        '{value}' => bname($columnValue) . '::class',
                                        '{name}' => $key
                                    ]);

                                    break;


                                case is_callable($columnValue) :

                                    $column .= strtr($this->layout['column->func'], [
                                        '{name}' => $key,
                                        '{value}' => Az::$app->utility->pregs->refClosure($columnValue),
                                    ]);

                                    break;


                                default:
                                    $column .= strtr($this->layout['column->name'], [
                                        '{value}' => bname($columnValue) . '::class',
                                        '{name}' => $key
                                    ]);

                                    break;
                            }


                            break;

                        case 'rules':

                            $value = ZVarDumper::value($columnValue);

                            foreach (validator as $keyVD => $valueVD) {
                                $value = strtr($value, [
                                    "'$keyVD'" => $valueVD
                                ]);
                            }

                            $value = strtr($value, [
                                '0 => ' => ''
                            ]);

                            $column .= strtr($this->layout['column->name'], [
                                '{value}' => $value,
                                '{name}' => $key
                            ]);

                            break;

                        case 'dbType':
                            $column .= strtr($this->layout['column->name'], [
                                '{value}' => dbType[$columnValue],
                                '{name}' => $key
                            ]);

                            break;

                        case 'options':
                        case 'valueOptions':
                        case 'filterOptions':
                        case 'dynaOptions':

                            $column .= strtr($this->layout['column->name'], [
                                '{name}' => $key,
                                '{value}' => $this->normalizeOptionValue($columnValue),
                                // '{value}' => ZVarDumper::export($columnValue)
                                // '{value}' => $columnValue,
                            ]);
                            break;


                        default:
                            // $value = ZVarDumper::value($columnValue);
                            $column .= strtr($this->layout['column->name'], [
                                '{name}' => $key,
                                '{value}' => ZVarDumper::exportSafe($columnValue)
                            ]);
                            break;

                    }
                }


            }

            $columns .= strtr($this->layout["column-{$this->setter->type}"], [
                '{index}' => $index,
                '{value}' => $column
            ]);

        }


        if ($this->allApp->configs->extraColumn) {
            $this->columns = Az::$app->utility->pregs->refMethod($this->setter->class, 'column');
            return true;
        }

        $this->columns = strtr($this->layout['column'], [
            '// Column' => $columns,
        ]);


    }

    private function normalizeOptionValue($value, $key = null, $tabs = 5)
    {
        switch (true) {
            case is_bool($value):
                return str_repeat("\t", $tabs) . ($value ? "'$key' => true," : "'$key' => false,");
                break;
            case is_string($value):
                $new = strtr($value, [
                    '\'' => "\'"
                ]);
                return str_repeat("\t", $tabs) . "'$key' => '$new',";
                break;
            case is_callable($value):
                return Az::$app->utility->pregs->refClosure($value);
                break;
            case is_array($value):
                $data = null;
                if ($key)
                    $data = str_repeat("\t", $tabs) . "'$key' =>";
                $data .= "[" . EOL;
                foreach ($value as $k => $item) {
                    $val = $this->normalizeOptionValue($item, $k, $tabs + 1);
                    $data .= "$val\n";
                }
                $data .= str_repeat("\t", $tabs) . "]";
                $data .= $tabs !== 5 ? ',' : '';
                return $data;
                break;
            default:
                if (is_string($value))
                    return str_repeat("\t", $tabs) . "'$key' => '$value',";
        }
    }

    private function addDepend($table)
    {
        $class = ZInflector::camelize($table);

        if (!ZArrayHelper::isIn($class, $this->allApp->configs->depend))
            $this->allApp->configs->depend[] = $class;

    }

    private function variables()
    {
        global $boot;

        foreach ($this->allApp->columns as $key => $column) {

            if ($this->setter->type === Settings::type['model']) {
                $type = $column->dbType;
                switch ($column->dbType) {
                    case 'date':
                    case 'timestamp':
                    case 'timestamptz':
                    case 'timetz':
                    case 'time':
                    case 'text':
                    case 'binary':
                    case 'varchar':
                    case 'dateTime':
                        $type = 'string';
                        break;

                    case 'decimal':
                    case 'smallint':
                    case 'integer':
                    case 'smallInteger':
                    case 'bigInteger':
                        $type = 'int';
                        break;

                    case 'json':
                    case 'jsonb':
                        $type = 'array';
                        break;
                }
            } else
                $type = 'string';


            $this->attrs .= strtr(
                $this->layout['attrs'],
                [
                    '{attrName}' => $key,
                ]
            );

            if ($this->setter->type === Settings::type['form'])
                $this->variables .= strtr(
                    $this->layout['properties'],
                    [
                        '{attrType}' => $type,
                        '{attrName}' => $key,
                    ]
                );
            else {
            
                $this->modelVars .= strtr(
                    $this->layout['modelVars'],
                    [
                        '{attrName}' => $key,
                    ]
                );
                
                $this->modelProps .= strtr(
                    $this->layout['modelProps'],
                    [
                        '{attrName}' => $key,
                    ]
                );

                $this->attrByType .= strtr(
                    $this->layout['attrByType'],
                    [
                        '{attrType}' => $type,
                        '{attrName}' => $key,
                    ]
                );
            }
        }

        $this->variables .= (!empty($this->variables)) ? EOL . EOL : '';

    }

    private function fields()
    {
        $this->fields = null;
        foreach ($this->allApp->columns as $key => $column) {
            $last = null;
//            switch (true) {
//                case ZStringHelper::endsWith($key, '_id'):
//                    //$method = 'get' . ZInflector::id2camel(strtr($key, ['_id' => ''])) . 'One()';
//
//                    $last = ' => $this->get' . ZInflector::camelize(strtr($key, ['_id' => ''])) . 'One()';
//                    break;
//                case $column->fkTable !== '':
//                    $last = ' => $this->get' . ZInflector::camelize($key) . 'One()';
//                    break;
//                case ZStringHelper::endsWith($key, '_ids'):
//                    $model = ZInflector::camelize(strtr($key, ['_ids' => '']));
//                    $last = ' => $this->get' . ZInflector::pluralize($model) . 'From' . ZInflector::camelize($key) . 'Multi()';
//                    break;
//            }
            $last .= ',' . EOL;
            $this->fields .= "\t\t\t'$key'" . $last;
        }

        $this->fields = strtr($this->layout['fields'], [
            '{attributes}' => $this->fields
        ]);
    }

    private function relations()
    {

        if ($this->setter->type === Settings::type['form'])
            return false;
        foreach ($this->allApp->configs->hasOne as $kHasOne => $hasOne) {

            $use = 'zetsoft\\models\\' . $this->catModel($kHasOne) . '\\' . $kHasOne;

            if ($this->setter->class !== $use)
                $this->usesAdd($use);

            $this->usesAdd(ZActiveQuery::class);

            foreach ($hasOne as $property => $key) {

                $getName = ZStringHelper::endsWith($property, '_id') ? substr($property, 0, -3) : $property;

                $this->relateOne .= strtr($this->layout['relHasOne'], [
                    '{modelClassName}' => ZInflector::camelize($getName), //$kHasOne,
                    '{name}' => $kHasOne,
                    '{value}' => ZVarDumper::value([$key => $property], 6),
                ]);
            }

        }
        foreach ($this->allApp->configs->hasMulti as $kHasMulti => $hasMulti) {


            foreach ($hasMulti as $FkCol => $PkCol) {

                $column = ZArrayHelper::getValue($this->allApp->columns, $FkCol);

                if ($column === null)
                    continue;
                if (!class_exists($this->bootFull($kHasMulti)))
                    $kHasMulti = ZInflector::camelize($column->fkTable);

                $use = 'zetsoft\\models\\' . $this->catModel($kHasMulti) . '\\' . $kHasMulti;
                if ($this->setter->class !== $use)
                    $this->usesAdd($use);
                if (class_exists($use))
                    $this->relateMulti .= strtr($this->layout['relHasMulti'], [
                        '{modelClassName}' => ZInflector::pluralize($kHasMulti) . 'From' . ZInflector::camelize($FkCol),
                        '{name}' => $kHasMulti,
                        '{value}' => ZVarDumper::value([$PkCol => $FkCol], 6)
                    ]);

            }

        }
        foreach ($this->allApp->configs->hasMany as $kHasMany => $hasMany) {
            $use = 'zetsoft\\models\\' . $this->catModel($kHasMany) . '\\' . $kHasMany;

            if ($this->setter->class !== $use)
                $this->usesAdd($use);

            foreach ($hasMany as $modelFk => $linkedModelPk)
                $this->relateMany .= strtr($this->layout['relHasMany'], [
                    '{modelClassName}' => ZInflector::pluralize($kHasMany) . 'With' . ZInflector::camelize($modelFk),
                    '{name}' => $kHasMany,
                    '{value}' => ZVarDumper::value([$modelFk => $linkedModelPk], 8)
                ]);
        }
        return false;

    }




    #endregion


    #region Services

    private function cards()
    {
        $value = ZVarDumper::value($this->allApp->cards, 8);

        if ($this->coreLang())
            $value = preg_replace("/'(.*)' =>/", "Az::l('$1') =>", $value);
        else
            $value = preg_replace("/=> '(.*)\',/", "=> Az::l('$1'),", $value);

        $this->cards = strtr($this->layout['card'], [
            '[Blocks]' => $value,
        ]);

    }

    private function writeFile()
    {

        global $boot;

        if (!ZArrayHelper::isIn($this->setter->classBase, $this->uses))
            $this->usesAdd($this->setter->classBase);

        foreach ($this->defaultUses as $use) {
            if (!ZArrayHelper::isIn($use, $this->uses))
                $this->usesAdd($use);
        }

        $replace = [
            'zetsoftspace' => $this->setter->namespace,

            'ZClassName' => $this->setter->className,
            'ZBaseClass' => bname($this->setter->classBase),

            '// ALLConfig' => $this->configs,
            '// ALLColumn' => $this->columns,
            '// ALLBlock' => $this->cards,
            '// ALLEvent' => $this->events,
            '// Fields' => $this->fields,
            '// Uses' => $this->usesGet(),
            '// Event' => $this->event,
            '// Faker' => $this->faker,
            '// Value' => $this->value,
            '// Names' => $this->names,
            '// Consts' => $this->consts,
            '// Attrs' => $this->attrs,
            '// Langs' => $this->langs,
            '// AttrByType' => $this->attrByType,
            '// ModelVars' => $this->modelVars,
            '// ModelProps' => $this->modelProps,
            '// Variables' => $this->variables,
            '// RelateOne' => $this->relateOne,
            '// RelateMulti' => $this->relateMulti,
            '// RelateMany' => $this->relateMany,
        ];


        if ($this->setter->type === Settings::type['model'])
            $replace['_dbase_'] = $this->allApp->configs->dbase;

        $replace['_title_'] = $this->allApp->configs->title;
        $replace['_icon_'] = $this->allApp->configs->icon;
        $replace['_menu_'] = ZVarDumper::normalizeBool($this->allApp->configs->menu);

        $return = strtr(
            $this->layout[$this->setter->type],
            $replace
        );

        $return = str_replace("\n;", ";\n", $return);

        /**
         *
         * Model Path
         */
//                                             if ($this->setter->namespace === null)
//                                                vd(123);
        $nspace = str_replace('\\', '/', $this->setter->namespace);
        $folder = Az::getAlias("@{$nspace}");
        $filePath = "{$folder}/{$this->setter->className}.php";

        ZFileHelper::createDirectory($folder);

        /**
         *
         * Builders
         */
        if ($boot->env('overwriteModel'))
            file_put_contents($filePath, $return);

    }

    public function usesGet()
    {
        $return = null;
        $this->uses = array_unique($this->uses);
        foreach ($this->uses as $key => $use) {
            $return .= 'use ' . $use . ';' . EOL;
        }

        return $return;
    }

    public function clean()
    {
        unlink(Az::getAlias($this->setter->path));
        Az::info($this->setter->path . ' are deleted!');
    }

    public function str_lreplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);

        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }

        return $subject;
    }


    #endregion

    #region Utility
    /**
     *
     * Function  normalizeBool
     * @param $var
     * @return  string
     *
     * @author Daho
     */

    ##endregion

}
