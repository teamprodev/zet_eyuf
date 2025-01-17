<?php

/**
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\service\smart;


use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\kernels\ZFrame;

class Name extends ZFrame
{

#region Model

    public function run()
    {

        //$classes = Az::$app->smart->migra->scan();
        $classes = [];
        if (!empty($this->paramGet('smartClass'))) {
           // Az::debug('SmartClass: ', $this->paramGet('smartClass'));
            $classes[] = bname($this->paramGet('smartClass'));
        }

        /** @var ZActiveRecord $class */
        foreach ($classes as $class) {
            if (!(new $class())->configs->nameAuto) continue;
            $this->model($class);
        }
    }

    public function model($class = null)
    {

        Az::debug('Checking model is: ', $class);
        if (!(new $class())->configs->nameAuto) return null;
        /** @var ZModel[] $records */
        $records = $class::findAll();

        foreach ($records as $record) {
            $record->name = $this->name($record);
            $record->configs->nameAuto = false;
            $record->modelSave($record);
        }
    }

    /**
     *
     * Function name
     * @param ZModel $model
     */
    private function name($model)
    {
        $name = '';
        $auto = $model->configs->nameAuto;
        switch (true) {
            case ($auto === null) :
                foreach ($model->columns as $key => $column) {
                    if ($column->dbType === dbTypeString)
                        $name .= $model->$key . ', ';
                }
                break;
            case is_callable($auto):
                $name = $auto($model);
                break;
            default:
                $replace = [];
                foreach ($model->columnsList() as $attribute) {
                    $replace['{' . $attribute . '}'] = $model->$attribute;
                }
                $name = strtr($auto, $replace);
        }

        return $name;
    }

#endregion


}
