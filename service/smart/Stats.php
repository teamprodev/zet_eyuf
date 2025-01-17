<?php

/**
 *
 *
 * @author Daho
 * @todo To generate universal statistics
 * @copyright 01.02.2020
 *
 */

namespace zetsoft\service\smart;

use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\models\dyna\DynaStats;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\inputes\ZHHiddenInputWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\widgets\values\ZLinkCallableWidget;
use zetsoft\widgets\values\ZLinkWidget;


class Stats extends ZFrame
{
    public $id;
    /** @var DynaStats $stat */
    public ?ZActiveRecord $stat = null;
    public ?array $dependModels = [];
    public ?string $class = null;
    public ?array $dependValues = [];
    public bool $chart = false;

    /**
     *
     * Function  clear
     * @todo Clear variables
     * @author Daho
     * @copyright 01.08.2020
     */
    public function clear()
    {
        $this->id = null;
        $this->stat = null;
        $this->dependModels = null;
        $this->class = null;
        $this->dependValues = null;
    }

    /**
     *
     * Function  run
     * @todo To set values to variables
     * @author Daho
     * @copyright 01.08.2020
     */
    public function run()
    {
        $this->stat = DynaStats::findOne($this->id);
        if ($this->stat === null)
            vdd(Az::l('Статистика не найдена. Пожалуйста, обновите страницу и попробуйте снова.'));
        if ($this->stat->rows === null || $this->stat->cols === null)
            vdd(Az::l('Пожалуйста, заполните необходимые данные'));

        if ($this->stat->start_time === null)
            $this->stat->start_time = Az::$app->cores->date->date('-24hours');
        if ($this->stat->end_time === null)
            $this->stat->end_time = Az::$app->cores->date->date();
            $this->stat->save();
        $this->class = $this->bootFull($this->stat->models);
        /** @var ZModel $dependModel */
        $stat = $this->stat;

        $startTime = $stat->start_time;
        $endTime = $stat->end_time;


        $modelClass = $this->bootFull($stat->models);
        /** @var ZModel $dependModels */
        $Q = $modelClass::find();
        if ($this->stat->time_col !== null)
        $Q = $modelClass::find()
            ->where([
                'between', $stat->time_col, $startTime, $endTime
            ]);

        if (!empty($this->dependValues))
            $Q = $Q->andWhere($this->dependValues);

        $this->dependModels = $Q->all();
    }

    public function generateDataTest()
    {
        $this->generateData(15);
    }

    /**
     *
     * Function  generateData
     * @todo Generate data to use Dyna on form mode and ChartForm
     * @return array
     * @author Daho
     * @copyright 01.08.2020
     */
    public function generateData()
    {
        $stat = $this->stat;

        $dependModels = $this->dependModels;

        $data = [];
        foreach ($dependModels as $dependModel) {
            $r = $stat->rows;
            $c = $stat->cols;
            $r = strtr($r, [
                '-' => '_'
            ]);
            $val = $dependModel->$r;

            if ($dependModel->columns[$stat->rows]->dbType === dbTypeJsonb) {
                if (is_array($val))
                    foreach ($val as $value) {
                        /*if (empty($dependModel->$c)) {
                            vdd($dependModel->id);
                        }*/

                        $value = strtr($value, [
                            '-' => '_'
                        ]);
                        
                        $data = $this->checkData($data, $this->getName($value, $stat->rows, $dependModel->columns[$stat->rows]), $value, $dependModel->$c);

                    }
            } else {
                $val = strtr($dependModel->$r, [
                    '-' => '_'
                ]);
                $data = $this->checkData($data, $this->getName($val, $stat->rows, $dependModel->columns[$stat->rows]), $dependModel->$r, $dependModel->$c);
            }

        }

        return $data;
    }

    /**
     *
     * Function  checkData
     * @param $data array current ready data
     * @param $name string searching value
     * @param $attr string current attribute
     * @return  array new ready data
     * @author Daho
     * @copyright 01.01.2020
     *
     */
    private function checkData($data, $name, $value, $attr)
    {
        $value = strtr($value, [
            '-' => '_'
        ]);
        foreach ($data as $key => $object) {
            if ($object->value === $value) {
                if (!empty($attr))
                    $object->$attr += 1;
                if (!$this->chart)
                    $object->all += 1;
                $data[$key] = $object;

                return $data;
            }
        }
        $model = $this->createModel($this->id);
       // $model->columns();
        $model->name = $name;
        $model->value = $value;

        /*if (!property_exists($model, $attr))
            vdd($model->attributes);*/
        
        if (!empty($attr) /*&& isset($model->$attr)*/)
            $model->$attr = 1;                                                            
        if (!$this->chart)
            $model->all = 1;

        $data[] = $model;

        return $data;

    }

    /**
     *
     * Function  createModel generate
     * DynamicModel from current stat record to use Dyna
     *
     * @return  \zetsoft\system\actives\ZDynamicModel
     * @author Daho
     * @copyright 31.07.2020
     */
    public function createModel()
    {

        $stat = $this->stat;
        $depend = $this->dependValues;
        $modelClass = $this->class;
        /** @var ZModel $dependModel */
        $dependModel = new $modelClass();
        $dependModel->columns();
        //vdd($dependModel->columns);
        $colAttr = ZArrayHelper::getValue($dependModel->columns, $this->stat->cols);
        $rowAttr = ZArrayHelper::getValue($dependModel->columns, $this->stat->rows);
        
        if ($colAttr === null || $rowAttr === null) {
            throw new \Exception(Az::l('Пожалуйста, попробуйте изменить настройки еще раз.'));
            return null;
        }
        $app = new ALLApp();

        $column = new Form();
        $column->title = $rowAttr->title;
        $column->widget = ZHInputWidget::class;
       // $column->showDyna = false;
        $app->columns['value'] = $column;

        $column = new Form();
        $column->title = $rowAttr->title;
        $column->widget = ZHInputWidget::class;
        $column->showDyna = true;
        $app->columns['name'] = $column;

        foreach ($colAttr->data as $attr => $title) {
            $column = new Form();
            $column->title = $title;
            $column->valueWidget = ZLinkCallableWidget::class;
            $column->valueOptions = [
                'config' => [
                    'link' => function($model) use ($stat, $attr, $depend){
                         $th = new ZView();
                         $url = $th->httpGet('url');
                         $arr = [
                             '/' . $url,
                             $stat->models . "[" . $stat->rows . "]" => $model->value,
                             $stat->models . "[" . $stat->cols . "]" => $attr
                         ];
                         foreach ($depend as $prop => $v){
                              $arr[$stat->models . "[" . $prop . "]"] = $v;
                         }
                        if ($stat->time_col !== null) {
                            $arr[$stat->models . '[' . $stat->time_col . '][start]'] = $stat->start_time;
                            $arr[$stat->models . '[' . $stat->time_col . '][end]'] = $stat->end_time;
                        }
                         return ZUrl::to($arr);
                    },
                    'nullValue' => 0
                ]
            ];
            $column->showDyna = true;
            $app->columns[$attr] = $column;
        }
        if (!$this->chart) {
            $column = new Form();
            $column->title = Az::l('Общее');
            $column->widget = ZHInputWidget::class;
            $column->valueWidget = ZLinkCallableWidget::class;
            $column->valueOptions = [
                'config' => [
                    'link' => function($model) use ($stat, $depend){
                        $th = new ZView();
                        $url = $th->httpGet('url');
                        $arr = [
                            '/' . $url,
                            $stat->models . "[" . $stat->rows . "]" => $model->value,
                        ];
                        foreach ($depend as $prop => $v){
                            $arr[$stat->models . "[" . $prop . "]"] = $v;
                        }
                        if ($stat->time_col !== null) {
                            $arr[$stat->model . '[' . $stat->time_col . '][start]'] = $stat->start_time;
                            $arr[$stat->model . '[' . $stat->time_col . '][end]'] = $stat->end_time;
                        }

                        return ZUrl::to($arr);
                    },
                    'nullValue' => 0
                ]
            ];
            $column->showDyna = true;
            $app->columns['all'] = $column;
        }

        return Az::$app->forms->former->model($app);

    }

    /**
     *
     * Function  getName
     * get value which need showed
     * @param $value mixed current value
     * @param $attr string current attribute
     * @param $column FormDb current column
     * @return  mixed|null fixed value to show user
     * @author Daho
     * @copyright 01.08.2020
     */
    private function getName($value, $attr, $column)
    {

        switch (true) {
            case ZStringHelper::endsWith($attr, '_id'):
            {
                $fkTable = strtr($attr, ['_id' => '']);
                return $this->getDb($value, $fkTable);
            }
            case ZStringHelper::endsWith($attr, '_ids'):
            {
                $fkTable = strtr($attr, ['_ids' => '']);
                return $this->getDb($value, $fkTable);
            }
            case !empty($column->fkTable):
                return $this->getDb($value, $column->fkTable);

            case !empty($column->data):
                return $column->data[$value]??$value;

        }

        return $value;
    }

    /**
     *
     * Function  getDb
     * Get value from relation table
     * @param $value int searching id
     * @param $fkTable string relation table
     * @return  mixed|null finded value
     * @author Daho
     * @copyright 01.08.2020
     */
    private function getDb($value, $fkTable)
    {
        if ($this->emptyOrNullable($value))
            return null;
        $modelClassName = ZInflector::camelize($fkTable);
        $modelClass = $this->bootFull($modelClassName);
        /**  @var ZModel $model */
        $model = $modelClass::findOne($value);
        if ($model === null)
            return null;
        $attr = $model->configs->name;

        return $model->$attr;
    }

    /**
     *
     * Function  generateFilter
     * Generate filter form from current stat record to change statistic params
     * @param $chart_type string|null chart type if it used for chart form. Default null.
     * @param $chart_theme string|null chart theme if it used for chart form. Default null.
     * @return  \zetsoft\system\actives\ZDynamicModel
     * @author Daho
     * @copyright 02.08.2020
     */
    public function generateFilter($chart_type = null, $chart_theme = null)
    {

        $modelClass = $this->class;
        /** @var ZModel $depend */
        $depend = new $modelClass();
        $depend->columns();

        $app = new ALLApp();
        $column = new Form();
        $column->widget = ZHHiddenInputWidget::class;
        //$app->columns['hidden_column'] = $column;
        if ($this->stat->time_col !== null) {
            $column = new Form();
            $column->title = Az::l('Начальное время');
            $column->dbType = dbTypeDateTime;
            $column->widget = ZKDateTimePickerWidget::class;
            $column->options = [
                'value' => $this->stat->start_time
            ];
            $app->columns['start_time'] = $column;

            $column = new Form();
            $column->title = Az::l('Время окончания');
            $column->dbType = dbTypeDateTime;
            $column->widget = ZKDateTimePickerWidget::class;
            $column->options = [
                'value' => $this->stat->end_time
            ];
            $app->columns['end_time'] = $column;
        }
        if (!empty($this->stat->depend_cols))
        foreach ($this->stat->depend_cols as $col) {
            $column = new Form();

            $column->title = $depend->columns[$col]->title;
            $column->widget = ZSelect2Widget::class;
            // $column->data = $this->getFilterData($col);
            // $column->value = ZArrayHelper::getValue($this->dependValues, $col);
            $column->options = [
                'data' => $this->getFilterData($col),
                'value' => ZArrayHelper::getValue($this->dependValues, $col),

            ];
            $app->columns[$col] = $column;
        }

        if ($this->chart) {
            $column = new Form();
            $column->title = Az::l('Тип графика');
            $column->widget = ZSelect2Widget::class;
            $column->options = [
                'data' => [
                    'line' => Az::l('Линейный график'),
                    'lineStack' => Az::l('Линейный стек'),
                    'bar' => Az::l('Гистограмма'),
                    'pie' => Az::l('Круговая диаграмма'),
                ],
                'value' => $chart_type
            ];
            $app->columns['type_chart'] = $column;

            $column = new Form();
            $column->title = Az::l('Тема графика');
            $column->widget = ZSelect2Widget::class;
            $column->options = [
                'data' => [
                    'macarons' => Az::l('Тема макаронс'),
                    'infographic' => Az::l('Инфографическая тема'),
                    'roma' => Az::l('Ромская тема'),
                    'shine' => Az::l('Блеск тема'),
                    'dark' => Az::l('Темная тема'),
                    'vintage' => Az::l('Винтажная тема'),
                ],
                'value' => $chart_theme
            ];
            $app->columns['theme_chart'] = $column;
        }
        
        if (empty($app->columns))
            return null;
        return Az::$app->forms->former->model($app);

    }

    /**
     *
     * Function  getFilterData
     * To get a column of filter data
     * @param $attr string current attribute
     * @return  array ready data
     * @author Daho
     * @copyright 02.08.2020
     */
    private function getFilterData($attr)
    {
        $modelClass = $this->class;
        /** @var ZModel $depend */
        $depend = new $modelClass();
        if (!empty($depend->columns[$attr]->data))  
            return $depend->columns[$attr]->data;

        $arr = [];

        foreach ($this->dependModels as $model) {

            if (is_array($model->$attr))
                foreach ($model->$attr as $value)
                    $arr[$value] = $this->getName($value, $attr, $model->columns[$attr]);

            else {
                $arr[$model->$attr] = $this->getName($model->$attr, $attr, $model->columns[$attr]);
            }

        }
        return $arr;
    }


}
