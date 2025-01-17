<?php
/*WavWan*/

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


use kartik\grid\ActionColumn;
use kartik\grid\SerialColumn;
use zetsoft\dbdata\data\DbTypeData;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\wdg\MenuItem;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\former\deps\DepsDataForm;
use zetsoft\models\page\PageAction;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\Menu;
use zetsoft\system\actives\ZActiveData;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\Az;
use zetsoft\system\column\ZCheckColumn;
use zetsoft\system\column\ZExpandRowColumn;
use zetsoft\system\column\ZFormulaColumn;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\kernels\ZView;
use zetsoft\system\kernels\ZWidget;
use zetsoft\system\module\Models;
use zetsoft\widgets\former\ZDetailWidget;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\former\ZMultiWidget_2;
use zetsoft\widgets\incores\ZGrapesCheckboxWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKDepDropWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use function Dash\Curry\get;
use function zetsoft\apisys\edit\returnn;


class Dyna extends ZFrame
{
    public $excludes = [
        'id',
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
    ];

    public $dynaColumns = [
        'zetsoft/zetsoft/column/ZCheckColumn',
        'kartik/grid/SerialColumn',
        'kartik/grid/ActionColumn',
        'zetsoft/zetsoft/column/ZFormulaColumn',
    ];


    #region Dynagrid Settings

    public function mmenuItems($attributes)
    {

        $items = [];
        foreach ($attributes as $key => $value) {

            if (ZArrayHelper::keyExists($key, $this->excludes))
                continue;

            $item = new MenuItem();
            $item->title = $value;
            $item->url = '#';
            $item->icon = 'fas fa-list';
            $item->data = $key;
            $item->class = 'get-columns';
            $items[] = $item;

        }

        return $items;

    }

    private function colTitle($attribute, $model)
    {
        /** @var ZActiveRecord $model */

        $title = $attribute;

        if (empty($model)) return $title;

        if (ZArrayHelper::keyExists($attribute, $model->columns)) {
            $value = ZArrayHelper::getValue($model->columns, $attribute);
            $title = $value->title;
        }

        return $title;

    }

    public function getSortColumns($sortColumns, $model)
    {

        $return = [];

        $modelColumns = $model->columns;

        foreach ($sortColumns as $column) {
            if (ZArrayHelper::keyExists($column, $modelColumns))
                $return[$column] = $modelColumns[$column]->title;
        }

        return $return;

    }

    public function hiddenFix($visible, $model)
    {

        /** @var ZActiveRecord $model */
        /** @var FormDb $value */
        $hidden = [];
        foreach ($model->column() as $key => $value)
            if (!ZArrayHelper::keyExists($key, $visible))
                $hidden[$key] = $this->colTitle($key, $model);

        return $hidden;
    }

    public function getFormDb($array, $columns, $name)
    {
        $formDb = $columns;

        $item = [];
        foreach ($array as $key => $value)
            $item[$key] = ZVarDumper::ajaxValue($value);

        $formDb[$name] = $item;

        return $formDb;
    }

    private function slashReplace($class, $slash = false)
    {
        if ($slash)
            return str_replace('\\', '/', $class);

        return $class;
    }

    public function columnsFix($columns, $model, $hidden = false)
    {

        $visible = [];
        $hiddenCol = [];
        foreach ($columns as $value) {

            if (empty($value))
                continue;

            $class = ZArrayHelper::getValue($value, 'class');
            $attribute = ZArrayHelper::getValue($value, 'attribute');

            $value = $this->colTitle($attribute, $model) ?? bname($class);
            $key = $attribute ?? $this->slashReplace($class, true);

            $visible[$key] = $value;

        }

        $hiddenCol = $this->hiddenFix($visible, $model, $hiddenCol);

        if ($hidden)
            return $hiddenCol;

        return $visible;

    }


    public function columnsFix2($columns, $model, $hidden = false)
    {

        $visible = [];
        $hiddenCol = [];
        foreach ($columns as $value) {

            if (empty($value))
                continue;

            $class = ZArrayHelper::getValue($value, 'class');
            $attribute = ZArrayHelper::getValue($value, 'attribute');

            $value = $this->colTitle($attribute, $model) ?? bname($class);
            $key = $attribute ?? $this->slashReplace($class, true);

            if (ZArrayHelper::keyExists($key, $model->columns))
                $visible[$key] = $value;

        }

        //$hiddenCol = $this->hiddenFix($visible, $model, $hiddenCol);

        if ($hidden)
            return $hiddenCol;

        return $visible;

    }

    public function getModelColumns($columns)
    {

        $return = [];
        foreach ($columns as $key => $value) {

            if (ZArrayHelper::isIn($key, $this->excludes))
                continue;

            $return[$key] = $value->title;
        }

        return $return;

    }

    public function fixSortMenu($columns, $model)
    {

        /** @var ZActiveRecord $model */
        /** @var FormDb $formDb */

        $return = [];
        foreach ($columns as $value) {

            if (ZArrayHelper::isIn($value, $this->excludes))
                continue;

            if (ZArrayHelper::keyExists($value, $model->columns)) {
                $formDb = ZArrayHelper::getValue($model->columns, $value);
                $return[$value] = $formDb->title;
            }
        }

        return $return;

    }

    public function dataValue($columns, $name, $model)
    {
        $columns = get_object_vars($columns[$name]);

        $items = [];

        foreach ($columns as $key => $value) {

            if (is_object($value)) {
                $func = $value;
                $value = $func($model);
            }

            $items[$key] = $value;
        }

        return $items;
    }

    public function columnMerge($array, $columns)
    {
        foreach ($array as $key => $value) {
            foreach ($value as $k => $v) {
                if (ZArrayHelper::keyExists($key, $columns))
                    $columns[$key]->$k = $v;
            }
        }

        return $columns;
    }

    public function fixSort($sort, $model)
    {
        /** @var ZActiveRecord $model */
        $items = [];
        foreach ($sort as $value)
            if (ZArrayHelper::keyExists($value, $model->columns))
                $items[] = $value;

        return $items;
    }


    public function getVisibleColumns($model, $names = null, $nameOff = null)
    {

        $return = [];

        /** @var Models $model */
        /** @var Form $column */
        $columns = $model->columns;

        foreach ($columns as $key => $column) {

            if (!empty($names)) {
                if (ZArrayHelper::isIn($key, $names))
                    $return[$key] = $column->title;
            } else {
                $return[$key] = $column->title;
            }

            if (ZArrayHelper::isIn($key, $nameOff))
                ZArrayHelper::remove($return, $key);


        }

        return $return;
    }

    public function getVisibleColumnsFromTable($sorting, $model)
    {

        $return = [];

        $columns = $model->columns;

        foreach ($sorting as $value) {
            if (ZArrayHelper::keyExists($value, $columns))
                $return[$value] = $columns[$value]->title;
        }

        return $return;
    }


    public function getHiddenColumns($visible, $model)
    {

        $return = [];

        $columns = $model->columns;

        foreach ($columns as $key => $column) {
            if (!ZArrayHelper::keyExists($key, $visible))
                $return[$key] = $column->title;
        }

        return $return;
    }

    #endregion

    public function getConfigDbItem($configs)
    {

        $item = new ConfigDB();
        if (!$configs)
            return $item;

        foreach ($configs as $key => $config) {
            $item->$key = ZVarDumper::ajaxValue($config);
        }

        return $item;
    }


    public function getColumnsDbItem($columns)
    {

        $return = [];

        if (!$columns)
            return [];

        foreach ($columns as $key => $column) {
            $return[$key] = $this->getFormDbItem($column);
        }

        return $return;
    }

    public function getFormDbItem($columns)
    {

        $item = new FormDb();
        foreach ($columns as $key => $column) {
            $item->$key = ZVarDumper::ajaxValue($column);
        }

        return $item;
    }

    //start|DavlatovRavshan|2020.10.11
    public function getProviderFromArray(array $provider)
    {

        $provider = Az::$app->utility->mains->array2object(ZActiveData::class, $provider);

        /** @var ZActiveData $provider */
        $query = Az::$app->utility->mains->array2object(ZActiveQuery::class, $provider->query);
        $provider->query = $query;

        return $provider;

    }


    public function getChooseQuery($provider, $modelClass)
    {

        $Q = $modelClass::find();

        $ids = ZArrayHelper::getColumn($provider->getModels(), 'id');

        $where = $provider->where;
        $andWhere = $provider->andWhere;
        $orWhere = $provider->orWhere;

        if (!empty($where))
            $Q->where($where);

        if (!empty($andWhere))
            $Q->andWhere($andWhere);

        if (!empty($orWhere))
            $Q->orWhere($orWhere);

        $Q->andWhereNotIn('id', $ids);

        return $Q;

    }
    //end|DavlatovRavshan|2020.10.11

}
