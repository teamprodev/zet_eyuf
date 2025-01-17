<?php

/**
 *
 *
 * Author:  Kudratillo Makhammadzhanov
 *
 */

namespace zetsoft\service\smart;


use kartik\helpers\Enum;
use Underscore\Types\Arrays;
use zetsoft\models\core\CoreSession;
use zetsoft\service\cores\Boot;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\Az;
use zetsoft\system\except\ZException;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZJsonHelper;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\module\Inserts;
use zetsoft\system\module\Models;
use function False\true;

class Insert extends ZFrame
{
    #region Vars

    private const suffix = 'Insert';
    private const maxData = 5000;
    private const maxSize = 2 * 1024 * 1024;
    private const addEmpty = true;
    private const skipEmpty = true;

    public const pathInsert = Root . '/inserts/' . App;

    /* @var Models[] $classes */
    public $classes;

    /** @var Models $model */
    public $model;


    public $isDepend = false;

    public $source = [];
    public $sorted = [];
    public $release = [];

    public $class;

    #endregion


    #region Cores


    public function layout()
    {
        parent::layout();
        $this->layout = [

            'main' => file_get_contents(Az::getAlias('@zetsoft/binary/giiapp/inserts.php')),

            'value' => '
        $this->model->{key} = {value};',

            'start' => '
        $this->model = new {value}();
',

            'end' => '
        $this->save();

',

        ];

    }


    public function clean()
    {
        ZFileHelper::removeDirectory(self::pathInsert);
        Az::debug(self::pathInsert, 'Folder Removed');
    }

    public function init()
    {
        parent::init();
        $this->paramSet(paramInsertCreate, true);
        $this->paramSet(paramFull, true);

        $this->classes = Az::$app->smart->migra->scan();
    }




    #endregion


    #region Create


    public function create()
    {
        global $classIgnore;
        $this->paramSet(paramInsertCreate, true);

        foreach ($this->classes as $class) {


            $this->class = $class;
            $this->className = bname($class);

            if (!empty(Az::$app->params['smartClass']))
                if (!ZArrayHelper::isIn($this->className, Az::$app->params['smartClass'])) {
                    Az::info($class, 'Skipping from Insert Create Generate: ');
                    continue;
                }

            if (!ZArrayHelper::isIn($this->className, $classIgnore))
                $this->table();
        }

        return true;

    }

    private function table()
    {

        global $boot;
        $this->model = new $this->class();

        /**
         *
         * Config
         */


        if (!$this->model instanceof ZActiveRecord)
            return true;

        $config = $this->model->allApp()->configs;
        if ($config === null)
            return false;

        if (!$config->makeInsert) {
            Az::debug($this->className, 'Insert is false');
            return false;
        }


        /**
         *
         * Process Data
         */

        $tables = Az::$app->db->schema->getTableNames();
        $tableName = $this->model::tableName();


        if (!ZArrayHelper::isIn($tableName, $tables))
            return Az::debug("Table $tableName is not exist!");


        $data = $this->model::find()
            ->asArray()
            ->all();

        $count = \count($data);

        if (!self::addEmpty)
            if ($count === 0)
                return false;

        $filename = self::pathInsert . '/' . $this->className . self::suffix . '.php';;

        if (self::skipEmpty)
            if ($count === 0) {
                if (!file_exists($filename))
                    return false;
                if ($this->lines($filename) > 19)
                    return false;
            }


        // todo: ravshan

        $data = array_slice($data, 0, self::maxData);
        $export = $this->export($data);
        $length = strlen($export);
        $size = Enum::formatBytes($length);


        if ($length > self::maxSize)
            return Az::warning("$tableName: $size", 'Big Size');

        $return = strtr($this->layout['main'], [
            'App' => App,
            'ZClassFullName' => $this->class,
            'ZClassName' => $this->className,
            '// Data' => $export,
        ]);

        /**
         *
         * Write File
         */


        ZFileHelper::createDirectory(self::pathInsert);


        if (file_exists($filename)) {
            if ($boot->env('overwriteInsert')) {
                Az::debug("Overwriting Table: {$this->className} ");
                file_put_contents($filename, $return);
                return true;
            } else
                return Az::debug("File Exists for: {$this->className} ");
        } else {
            Az::debug("Processing Table: {$this->className} ");
            file_put_contents($filename, $return);
            return true;
        }


    }

    public function lines($file)
    {


        $file = ZFileHelper::normLinux($file);
        $file_arr = file($file);

        return count($file_arr);
    }

    private function export($datas)
    {

        $models = '';

        foreach ($datas as $data) {
            $values = '';

            foreach ($this->model->columnsList() as $key) {

                if (!ZArrayHelper::keyExists($key, $data)) {
                    Az::warning($this->model::className(), "$key not found in ");
                    continue;
                }

                //exclude resource data type because getVal() in case dbTypeBinary addslashess

                if (is_resource($data[$key])) {
                    Az::warning($data[$key], "invalid data type in $key ");
                    continue;
                }

                $value = ZArrayHelper::getValue($data, $key);

                switch ($key) {

                    case 'created_at':
                    case 'modified_at':
                        $type = dbTypeString;
                        break;

                    case 'id':
                    case 'created_by':
                    case 'modified_by':
                        $type = dbTypeInteger;
                        break;

                    default:
                        $type = $this->model->columns[$key]->dbType;
                }


                $value = $this->getVal($value, $type);

                $values .= strtr(
                    $this->layout['value'],
                    [
                        '{key}' => $key,
                        '{value}' => $value,
                    ]
                );
            }


            $model = strtr($this->layout['start'], [
                    '{value}' => $this->className,
                ]) .
                $values .
                strtr($this->layout['end'], [
                    '{value}' => $this->className,
                ]);

            $models .= $model;


        }


        return $models;

    }


    private function getVal($value, $type)
    {
        switch ($type) {
            case dbTypeInteger:
            case dbTypeSmallInteger:
            case dbTypeBigInteger:
                if ($value === null)
                    $value = 'null';
                else
                    $value = (int)$value;
                break;

            case dbTypeFloat:
            case dbTypeDecimal:
                if ($value === null)
                    $value = 'null';
                else
                    $value = (float)$value;
                break;

            case dbTypeDouble:
                if ($value === null)
                    $value = 'null';
                else
                    $value = (double)$value;
                break;

            case dbTypeBoolean:
                if (empty($value))
                    $value = 'null';
                else
                    $value = (boolean)$value;
                break;

            case dbTypeBinary:
                if (empty($value))
                    $value = 'null';
                else {

                    $value = stream_get_contents($value);
                    $value = addslashes($value);
                    $value = "'" . $value . "'";
                }
                break;


            case dbTypeJsonb:
            case dbTypeJson:
                if (empty($value))
                    $value = '""';
                else if (!is_array($value)) {
                    $values = json_decode($value, true);
                    $value = ZVarDumper::exportTab($values, 8);
                } else {
                    $value = ZVarDumper::exportTab($value, 8);
                }
                break;


            case dbTypeString:
            case dbTypeText:
            case dbTypeChar:
                if (empty($value))
                    $value = "'" . $value . "'";
                else {

                    $value = addslashes($value);
                    $value = str_replace('$', '\$', $value);
                    $value = "'" . $value . "'";
                }
                break;


            case dbTypeDateTime:
            case dbTypeTimestamp:
            case dbTypeTime:
            case dbTypeDate:
                if (empty($value))
                    $value = 'null';
                else
                    $value = "'" . $value . "'";
                break;
        }


        return $value;
    }


    #endregion

    #region Apply

    public function apply()
    {

        $this->paramSet(paramInsertApply, true);
        global $classIgnore;
        $this->paramSet(paramNoEvent, true);
        $this->paramSet(paramFull, true);
        $classes = [];

        foreach ($this->classes as $class) {
            $className = bname($class);

            if (!empty($this->paramGet('smartClass')))
                if (!ZArrayHelper::isIn($className, $this->paramGet('smartClass'))) {
                    Az::info($className, 'Skipping from Insert Apply Generate: ');
                    continue;
                }

            if (!ZArrayHelper::isIn($className, $classIgnore))
                $classes[] = $class;

        }

        /**
         *
         * Make required classes array
         */

        foreach ($classes as $class) {

            $data['class'] = $class;

            /** @var Models $model */
            $model = new $class();

            if ($this->isDepend) {
                $data['depend'] = $model->configs->depend;
            } else {

                $depend = [];
                if (isset($model->configs->hasOne)) {
                    foreach ($model->configs->hasOne as $key => $value) {
                        $depend[] = $key;
                    }
                }
                $data['depend'] = $depend;
            }
            $this->source[bname($class)] = $data;
        }

        /**
         *
         * Sort Arrays
         */

        foreach ($this->source as $key => $value) {
            $this->sort($key, $value);
        }

        $this->sorted = array_unique($this->sorted);

        foreach ($this->sorted as $value) {
            $this->release[$value] = $this->source[$value];
        }

        Az::debug(array_keys($this->release), 'Release Array');

        $this->execute();

    }


    private function sort($key, $value = null)
    {
        if (ZArrayHelper::keyExists($key, $this->source))
            $this->sorted = Arrays::prepend($this->sorted, $key);

        if (!empty($value['depend'])) {
            foreach ($value['depend'] as $depend) {
                $this->sort($depend);
            }
        }

        return true;
    }


    private function execute()
    {
        foreach ($this->release as $key => $value) {

            $table = ZInflector::underscore($key);

            if (!$this->tableExists($table)) {
                Az::warning($table, 'Table not exists');
                continue;
            }

            Az::debug("Starting: Insert Class: {$key}");
            Az::$app->db->createCommand('TRUNCATE TABLE "' . $table . '" RESTART IDENTITY')->execute();

            $className = 'zetsoft\\inserts\\' . App . '\\' . $key . self::suffix;

            if (class_exists($className)) {
                Az::debug($className, 'Run Class:');

                try {
                    /** @var Inserts $instance */
                    $instance = new $className();
                    $instance->run();
                } catch (\Exception $e) {
                    vd('Exeption | ' . $e->getMessage());
                }
            } else
                Az::debug("Class not exists: {$key}");
        }

    }


    #endregion

}
