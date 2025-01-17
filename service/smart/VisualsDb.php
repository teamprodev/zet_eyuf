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


use zetsoft\models\drag\DragConfig;
use zetsoft\models\drag\DragConfigDb;
use zetsoft\models\drag\DragForm;
use zetsoft\models\ALL\test;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\module\Models;

class VisualsDb extends ZFrame
{

    #region Model


    public function migraModel()
    {
        $classes = Az::$app->smart->migra->scan();

        foreach ($classes as $class) {

            /** @var Models $model */
            $model = new $class();

            $allApp = $model->allApp();

            $coreConfigDb = new DragConfigDb();

            $coreConfigDb->title = $allApp->configs->title;
            $coreConfigDb->name = $allApp->configs->name;
            $coreConfigDb->dbase = $allApp->configs->dbase;
            $coreConfigDb->addID = $allApp->configs->addID;
            $coreConfigDb->genMake = $allApp->configs->makeInsert;
            $coreConfigDb->genName = $allApp->configs->genName;
            $coreConfigDb->genCrud = $allApp->configs->makeMenu;

            $coreConfigDb->save();

            foreach ($allApp->columns as $key => $column) {

                $coreFormDb = new test();
                $coreFormDb->name = $key;

                $this->formDb($column, $coreConfigDb, $coreFormDb);

            }

        }

    }

    #endregion


    #region Form

    public function normsForm()
    {
        $classes = Az::$app->smart->norms->formScan();

        foreach ($classes as $class) {

            /** @var Models $model */
            $model = new $class();

            $allApp = $model->allApp();

            $coreConfig = new DragConfig();

            $coreConfig->title = $allApp->configs->title;
            $coreConfig->nameOn = $allApp->configs->nameOn;
            $coreConfig->nameOff = $allApp->configs->nameOff;
            $coreConfig->nameHide = $allApp->configs->nameShowEx;
            $coreConfig->filters = $allApp->configs->filters;
            $coreConfig->filtersEx = $allApp->configs->filtersEx;

            $coreConfig->save();

            foreach ($allApp->columns as $key => $column) {

                $coreForm = new DragForm();
                $coreForm->name = $key;

                $this->formDb($column, $coreConfig, $coreForm);

            }

        }

    }


    #endregion


    private function formDb($column, $config, $core)
    {

        $core->title = $column->title;
        $core->dbType = $column->dbType;
        $core->data = $column->data;

        $core->valueOptions = $column->valueOptions;
        $core->value = $column->value;

        $core->valueWidget = $column->valueWidget;

        $core->filter = $column->filter;
        $core->edit = $column->edit;
        $core->showDyna = $column->summary;

        if (is_array($core->roleDeny))
            foreach ($core->roleDeny as $roleDeny) {
                $column->roleDeny[] = [$roleDeny];
            }

        if (is_array($core->roleDenyEdit))
            foreach ($core->roleDenyEdit as $roleDenyEdit) {
                $column->rules[] = [$roleDenyEdit];
            }

        if (is_array($core->rules))
            foreach ($core->rules as $rule) {
                $column->rules[] = [$rule];
            }

        if (!empty($core->options)) {
            $options = $core->options;
            ZArrayHelper::remove($options, 'class');
            ZArrayHelper::remove($options, 'modelClass');
            $column->options = [
                'config' => $options
            ];
        }


        $core->showForm = $column->showForm;
        $core->showDyna = $column->showDyna;
        $core->filterOptions = $column->filterOptions;
        $core->format = $column->format;
        $core->widget = $column->widget;
        $core->override = $column->override;


        if ($core->width !== null)
            $core->width = $column->width;

        $core->table = $config->id;

        $core->save();

    }


}
