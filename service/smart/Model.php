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


use yii\db\Command;
use Yii;
use yii\db\Expression;
use yii\db\TableSchema;
use yii\helpers\Inflector;
use zetsoft\dbdata\data\DbData;
use zetsoft\dbdata\data\DbTypeData;
use zetsoft\dbdata\core\RuleData;
use zetsoft\dbdata\wdg\WidgetData;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\dbitem\data\Settings;

use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZConnection;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\module\Models;
use zetsoft\system\schema\PgSqlSchema;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZFileInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;


/**
 *
 */
class Model extends ZFrame
{
    #region Vars
    /**
     *
     * Constants
     */


    /* @var Models[] $fromTable */
    public $fromTable;


    public const Path = [
        'namespaceModel' => "zetsoft\models\\" . App . '\\',
        'namespaceModelAll' => "zetsoft\models\\ALL\\",

        'namespaceCore' => "zetsoft\dbcore\\" . App . '\\',
        'namespaceCoreAll' => "zetsoft\dbcore\\ALL\\",

        'pathModel' => '@zetsoft/models/' . App,
        'pathModelAll' => '@zetsoft/models/ALL',

        'pathCore' => '@zetsoft/dbcore/' . App,
        'pathCoreAll' => '@zetsoft/dbcore/ALL',

        'aliasPath' => '@zetsoft/models/' . App,
        'aliasAllPath' => '@zetsoft/models/ALL',
    ];

    /* @var ZConnection $db */
    public $db;

    /**
     * @var
     * Given DB Name
     */
    public $dbase;

    private $dbName;


    /* @var ALLApp $allApp */
    public $allApp;

    /* @var Settings $proper */
    public $setter;


    /**
     *
     * Private Vars
     */

    /** @var PgSqlSchema $schema */
    private $schema;
    private $dbNames;


    /** @var TableSchema[] $tables */
    private $tables;

    /** @var TableSchema $table */
    private $table;

    private $comment;

    private $path;
    private $pathAll;

    #endregion


    #region Init

    public function init()
    {


        parent::init();

        Az::start(__FUNCTION__);

        if (Az::$app->db->dbType !== ZConnection::Db_PgSQL)
            return Az::error($this->db->dbType, 'Primary DB Type Should Be PostgreSQL');

        $this->path = Yii::getAlias(self::Path['aliasPath']);
        $this->pathAll = Yii::getAlias(self::Path['aliasAllPath']);
        $this->dbNames = (new DbData())->lang();

        return false;
    }




    #endregion

    #region Core

    public function clean()
    {
        ZFileHelper::removeDirectory(Az::getAlias(self::Path['pathModel']));
        ZFileHelper::removeDirectory(Az::getAlias(self::Path['pathModelAll']));

        Az::info('Model Folders are deleted!');
    }

    public function run()
    {
        Az::start('Generate From ALL');
        $this->all();
    }


    public function table()
    {
        Az::start('Generate From Table');
        $this->fromTable = true;
        $this->all();
    }


    private function all()
    {
        $this->paramSet(paramModel, true);

        if ($this->paramGet('smartDbase')) {
            $dbase = $this->paramGet('smartDbase')[0];
            $this->dbase = $dbase;
            $this->db = Az::$app->$dbase;
            $this->schema = $this->db->schema;

            if (!$this->db) {
                echo Az::error($this->db, 'DB Connection Error');
                return;
            }

            Az::info($dbase, 'Generating Classes for');
            $this->dbName = $dbase;

            $this->dbase();
        } else
            foreach ($this->dbNames as $db) {
                $this->db = Az::$app->$db;
                $this->schema = $this->db->schema;

                if (!$this->db) {
                    echo Az::error($this->db, 'DB Connection Error');
                    continue;
                }

                Az::info($db, 'Generating Classes for');
                $this->dbName = $db;

                $this->dbase();
            }
    }




    #endregion

    #region Table

    private function dbase()
    {

        $this->tables = ZArrayHelper::index($this->schema->getTableSchemas(), 'name');

        if (empty($this->tables))
            return Az::error($this->tables, '$this->tables is Empty');

        foreach ($this->tables as $table) {

            if (strpos($table->name, 'core_') !== false) {
                Az::info($table->name, 'Skipping from Model Generate: ');
                continue;
            }

            if (!empty(Az::$app->params['smartTable']))
                if (!ZArrayHelper::isIn($table->name, Az::$app->params['smartTable'])) {
                    Az::info($table->name, 'Skipping from Model Generate: ');
                    continue;
                }


            if (!empty(Az::$app->params['smartClass'])) {

                $tables = $this->tableNames(Az::$app->params['smartClass']);

                if (!ZArrayHelper::isIn($table->name, $tables)) {
                    Az::info($table->name, 'Skipping from Model Generate: ');
                    continue;
                }
            }

            Az::info($table->name, 'Generate Model For: ');

            $this->table = $table;

            $this->item();

        }

        return true;
    }


    private function tableNames($classes)
    {

        $tables = [];

        foreach ($classes as $className) {

            $className = $this->bootFull($className);

            if (!(new $className() instanceof ZActiveRecord))
                continue;

            $tables[] = (new $className())->tableName();

        }

        return $tables;

    }


    private function item()
    {

        /**
         *
         * Initing
         */


        //$this->className

        $this->getClass();

        //$this->comments

        $this->comments();

        /**
         *
         * Settings
         */
        $setter = new Settings();
        $class = $this->bootFull($this->className);
        $setter->className = $this->className;

        if ($this->paramGet('smartDbase')){
            $setter->namespace = 'zetsoft\\models\\App\\' . App . '\\' . $this->dbase;
             $class = 'zetsoft\\models\\App\\' . App . '\\' . $this->dbase . '\\'.  $this->className;
//            $setter->namespace = 'zetsoft\\models\\' . App . '\\' . $this->dbase;
        }
        //$setter->namespace = 'zetsoft\\models\\' . App;
        // $setter->namespace = 'zetsoft\\models\\test2';
        $setter->class = ZFileHelper::normalizePath($class);
        $setter->type = Settings::type['model'];
        $setter->classBase = $this->baseClass();

        $setter->allApp = $this->allApp();
//        $setter->namespace = 'zetsoft\\models' . $this->nameSpace();
        Az::$app->smart->puters->run($setter);
    }

#endregion


    #region From


    private function fromTable()
    {
        $this->allApp = new ALLApp();

        $this->configs();
        $this->columns();
        $this->cards();

        return $this->allApp;
    }

    private function fromJson()
    {
        if (empty($this->comment))
            return $this->fromTable();

        $allApp = Az::$app->utility->mains->jsonObject(ALLApp::class, $this->comment);

        if ($allApp->columns === null)
            return $this->fromTable();

        /**
         *
         * Casting Types
         */

        $allApp->configs = Az::$app->utility->mains->array2object(ConfigDB::class, $allApp->configs);

        foreach ($allApp->columns as $key => $column) {

            $allApp->columns[$key] = Az::$app->utility->mains->array2object(FormDb::class, $column);
        }

        return $allApp;
    }


    #endregion

    #region Column


    public function getColumns($class, $array)
    {


        $vars = get_object_vars(new $class());

        foreach ($vars as $key => $var) {

            $excludes = [
                'readonly',
            ];

            $usesVars = [];
            $usesVars['options'] = [];
            $usesVars['widget'] = ZHInputWidget::class;
            $usesVars['type'] = dbTypeString;
            $usesVars['showForm'] = true;
            $usesVars['data'] = [];
            $usesVars['showDyna'] = true;
            $usesVars['validator'] = [];

            switch (true) {

                case (is_array($var)):
                    $usesVars['widget'] = ZKSelect2Widget::class;
                    break;

                case (is_bool($var)):
                    $usesVars['widget'] = ZKSwitchInputWidget::class;
                    $usesVars['type'] = dbTypeBoolean;
                    break;

                case (is_int($var)):
                    $usesVars['widget'] = ZKTouchSpinWidget::class;
                    $usesVars['type'] = dbTypeInteger;
                    break;
            }


            switch ($key) {

                case 'options':
                    $usesVars['showDyna'] = false;
                    $usesVars['showForm'] = false;
                    $usesVars['type'] = dbTypeJsonb;
                    break;

                case 'rules':
                    $usesVars['data'] = RuleData::class;
                    break;


                case 'name':
                    $usesVars['data'] = RuleData::class;
                    $usesVars['validator'] = [
                        ['zetsoft\\system\\validate\\ZRequiredValidator']
                    ];
                    break;

                case 'format':
                    $usesVars['data'] = Form::format;
                    $usesVars['widget'] = ZKSelect2Widget::class;
                    break;

                case 'dbType':
                    $usesVars['data'] = DbTypeData::class;
                    $usesVars['widget'] = ZKSelect2Widget::class;
                    break;

                case 'widget':
                case 'filterWidget':
                    $usesVars['data'] = WidgetData::class;
                    $usesVars['widget'] = ZKSelect2Widget::class;
                    break;

                default:
                    $usesVars['data'] = [];
                    break;

            }

            if (ZArrayHelper::isIn($key, $excludes))
                continue;

            $titles = FormDb::labels();

            if (empty($titles[$key]))
                $titles[$key] = $key;

            $array[$key] = function (FormDb $column) use ($usesVars, $titles, $key) {

                $column->title = $titles[$key];
                $column->dbType = $usesVars['type'];
                $column->widget = $usesVars['widget'];
                $column->rules = $usesVars['validator'];
                $column->showForm = $usesVars['showForm'];
                $column->showDyna = $usesVars['showDyna'];
                $column->data = $usesVars['data'];
                $column->options = $usesVars['options'];

                return $column;
            };

        }

        return $array;
    }


    #endregion


    #region Process


    private function allapp()
    {

        if ($this->fromTable)
            return $this->fromTable();

        return $this->fromJson();
    }


    private function configs()
    {

        $this->allApp->configs->title = ZInflector::titleize($this->table->name);

        switch (true) {
            case ZArrayHelper::isIn('title', $this->allApp->columns):
                $this->allApp->configs->name = 'title';
                break;

            default:
                $this->allApp->configs->name = 'name';
        }

        if ($this->dbName !== 'db')
            $this->allApp->configs->dbase = $this->dbName;

        if (!$this->isAddBy())
            $this->allApp->configs->addBy = true;

        if ($this->isDel())
            $this->allApp->configs->addDel = true;

        if (!$this->isAddID()) {
            $this->allApp->configs->order = [];
            $this->allApp->configs->addID = false;
            $this->allApp->configs->makeMenu = false;
        }


    }


    private function cards()
    {

        $blocks = [];

        foreach ($this->table->columns as $column) {

            if ($this->isExcluded($column->name))
                continue;

            $blocks[] = $column->name;

        }

        $this->allApp->cards = [
            ['title' => Az::l('Первый этап'),
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'items' => [
                            $blocks
                        ]
                    ]
                ]
            ]
        ];
    }


    private function columns()
    {
        $indexes = $this->schema->loadTableIndexes($this->table->name);
        $fKeys = $this->schema->getTableForeignKeys($this->table->name);
        $columns = [];

        foreach ($this->table->columns as $column) {

            if ($this->isExcluded($column->name))
                continue;

            $formDB = new FormDb();

            $formDB->isPKey = $column->isPrimaryKey;
            $formDB->dbType = dbTypeCast[$column->type];
            $formDB->defaultValue = $this->defaultValue($column);
            $formDB->defaultExpression = $this->defaultExpression($column);
            $formDB->notNull = !$column->allowNull;

            if ($column->size)
                if ($column->size > 0)
                    $formDB->length = $column->size;

            switch (true) {

                case ZStringHelper::endsWith($column->name, '_id'):
                case ZStringHelper::endsWith($column->name, '_ids'):
                    $formDB->widget = ZKSelect2Widget::class;
                    break;

                case $formDB->dbType === dbTypeTimestamp:
                case $formDB->dbType === dbTypeDateTime:
                case $formDB->dbType === dbTypeTime:
                    $formDB->widget = ZKDateTimePickerWidget::class;
                    break;

                case $formDB->dbType === dbTypeBoolean:
                    $formDB->widget = ZKSwitchInputWidget::class;
                    break;

                case $column->name === 'photo':
                case $column->name === 'image':
                    $formDB->widget = ZFileInputWidget::class;
                    break;

                default:
                    $formDB->widget = ZHInputWidget::class;
                    break;
            }


            $formDB->unsigned = $column->unsigned;
            $formDB->title = $column->name;
            $formDB->data = [];

            foreach ($indexes as $index) {
                if ($column->name === $index->columnNames[0]) {
                    $formDB->index = true;
                    $formDB->indexUnique = $index->isUnique;
                }
            }


            if (!empty($fKeys)) {
                foreach ($fKeys as $value) {
                    if ($column->name === $value->columnNames[0]) {
                        $formDB->fkTable = $value->foreignTableName;
                        $formDB->fkCreate = true;
                        $formDB->fkColumn = $value->foreignColumnNames[0];
                    }
                }
            }

            $columns[$column->name] = $formDB;
        }


        $this->allApp->columns = $columns;
    }


    #endregion


    #region Services

    private function defaultValue($column)
    {

        if (empty($column->defaultValue))
            return null;

        return $column->defaultValue;

    }

    private function defaultExpression($column)
    {
        if (empty($column->defaultValue))
            return null;

        if ($column->defaultValue instanceof Expression)
            return $column->defaultValue;

        return null;

    }


    public function isAddID()
    {
        if (ZArrayHelper::keyExists('id', $this->table->columns)) {
            $column = $this->table->getColumn('id');

            if ($column->type === dbTypeInteger)
                return true;
        } else
            Az::debug('Id Not Exists');

        return false;
    }

    public function isDel()
    {
        $columns = $this->table->columns;

        $b1 = ZArrayHelper::keyExists('deleted_at', $columns);
        $b2 = ZArrayHelper::keyExists('deleted_by', $columns);

        if ($b1 && $b2)
            return true;

        return false;
    }

    public function isAddBy()
    {

        $columns = $this->table->columns;

        $b1 = ZArrayHelper::keyExists('created_at', $columns);
        $b2 = ZArrayHelper::keyExists('modified_at', $columns);
        $b3 = ZArrayHelper::keyExists('created_by', $columns);
        $b4 = ZArrayHelper::keyExists('modified_by', $columns);

        if ($b1 && $b2 && $b3 && $b4)
            return true;

        return false;
    }


    public function isExcluded($index)
    {
        global $boot;

        if ($this->paramGet('Lang') && ZArrayHelper::isIn($index, $boot->env('activelang')))
            return true;
            
        return $this->isIndexAddBy($index)
            || $this->isIndexAddId($index)
            || $this->isIndexIsDel($index)
            || $this->isIndexCode($index)
            || $this->isIndexSort($index)
            || $this->isIndexSlug($index)
            || $this->isIndexHistory($index)
            || $this->isIndexName($index)
            || $this->isIndexLang($index);
    }


    /**
     *
     * Function  isIndexAddBy
     * For adding database index to Table
     * 
     * @param $index Index of table
     * @param null $allApp AllApp object for Model
     * @return  bool 
     *
     * @author AzimjonToirov
     * @license AsrorZakirov
     */
    public function isIndexAddBy($index, $allApp = null): bool
    {

        $app = $this->allApp;
        if (!$this->emptyVar($allApp))
            $app = $allApp;

 /*       if ($this->emptyVar($app) && $this->emptyVar($allApp))
            return true;*/

       // start:AsrorZakirov
       
       if ($this->emptyVar($app) && $this->emptyVar($allApp))
            return false;
            
       // end:AsrorZakirov

        if ($app->configs->addBy && ZArrayHelper::keyExists($index, excludedColumn))
            return true;



        return false;
    }

    public function isIndexCode($index, $allApp = null)
    {

        $app = $this->allApp;
        if ($allApp)
            $app = $allApp;

        if ($this->emptyVar($app) && $this->emptyVar($allApp))
            return false;

        if ($app->configs->addCode && $index === 'code')
            return true;

        return false;
    }

    public function isIndexSort($index, $allApp = null)
    {
        $app = $this->allApp;
        if ($allApp)
            $app = $allApp;

        if ($this->emptyVar($app) && $this->emptyVar($allApp))
            return false;

        if ($app->configs->addSort && $index === 'sort')
            return true;

        return false;
    }

    public function isIndexName($index, $allApp = null)
    {
        $app = $this->allApp;
        if ($allApp)
            $app = $allApp;

        if ($this->emptyVar($app) && $this->emptyVar($allApp))
            return false;

        if ($app->configs->addName && $index === 'name')
            return true;

        return false;
    }

    public function isIndexIsDel($index, $allApp = null)
    {
        $app = $this->allApp;
        if ($allApp)
            $app = $allApp;

        if ($this->emptyVar($app) && $this->emptyVar($allApp))
            return false;

        if ($app->configs->addDel && ZArrayHelper::keyExists($index, softColumn))
            return true;

        return false;
    }

    public function isIndexAddId($index, $allApp = null)
    {
        $app = $this->allApp;
        if ($allApp)
            $app = $allApp;
            
        if ($this->emptyVar($app) && $this->emptyVar($allApp))
            return false;
            
        if ($app->configs->addID && $index === 'id')
            return true;

        return false;
    }                                       

    public function isIndexLang($index, $allApp = null)
    {
        if (ZStringHelper::endsWith($index, '_lang'))
            return true;

        return false;
    }

    public function isIndexSlug($index, $allApp = null)
    {
        if (ZStringHelper::endsWith($index, '_slug'))
            return true;

        return false;
    }

    public function isIndexHistory($index, $allApp = null)
    {
        if (ZStringHelper::endsWith($index, '_history'))
            return true;

        return false;
    }


    public function getClass()
    {
        $this->className = ZInflector::camelize($this->table->name);

        Az::trace($this->className, "Classname for {$this->table->name}", 'ClassNameFor', 1);
    }

    private function baseClass($classname = null)
    {
        if ($classname !== null)
            $this->className = $classname;

        $clasfileName = "/{$this->className}Core.php";

        $classNameALL = self::Path['namespaceCoreAll'] . "{$this->className}Core";
        $className = self::Path['namespaceCore'] . "{$this->className}Core";

        $fNameALL = \Yii::getAlias(self::Path['pathCoreAll']) . $clasfileName;
        $fName = \Yii::getAlias(self::Path['pathCore']) . $clasfileName;
        $baseClassName = null;
        if (file_exists($fNameALL))
            $baseClassName = $classNameALL;

        if (file_exists($fName))
            $baseClassName = $className;

        if ($baseClassName === null)
            $baseClassName = ZActiveRecord::class;

        return $baseClassName;
    }


    private function nameSpace()
    {
        $namespaceModel = '\\' . $this->catModel(ZInflector::camelize($this->table->name));

        if ($this->dbName !== 'db')
            $namespaceModel .= '\\' . $this->dbName;

        return $namespaceModel;
    }

    private function comments()
    {
        /** @var ZConnection $connection */

        switch ($this->db->dbType) {

            case ZConnection::Db_PgSQL:
                $sql = "select obj_description('{$this->table->name}'::regclass)";
                $item = 'obj_description';
                break;

            case ZConnection::Db_MySQL:
                $sql = "SELECT table_comment 
                    FROM INFORMATION_SCHEMA.TABLES 
                    WHERE table_name='{$this->table->name}'";
                $item = 'TABLE_COMMENT';
                break;

            case ZConnection::Db_SQLite:
                $sql = '';
                $item = '';
        }

        $command = $this->db->createCommand($sql);

        /** @var Command $command */
        $results = $command->queryOne();

        $this->comment = ZArrayHelper::getValue($results, $item);
        return null;
    }


    #endregion


}
