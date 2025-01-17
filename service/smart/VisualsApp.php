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


use Ratchet\App;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\dbitem\data\Settings;
use zetsoft\models\drag\DragConfig;
use zetsoft\models\drag\DragConfigDb;
use zetsoft\models\drag\DragForm;
use zetsoft\models\drag\DragFormDb;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\kernels\ZView;

class VisualsApp extends ZFrame
{


    #region INSERT TO DB

    private function modelAttr($attributes, $configs)
    {

        $items = [];
        foreach ($configs as $key => $value)
            if (ZArrayHelper::keyExists($key, $attributes))
                $items[$key] = $value;

        return $items;
    }


    private function columnsAttr($formDbs, $columns, $class)
    {

        $forms = get_object_vars($class);

        ZArrayHelper::remove($formDbs, 'id');

        foreach ($forms as $key => $value)
            if (ZArrayHelper::keyExists($key, $formDbs))
                $formDbs[$key] = $columns->$key;

        return $formDbs;

    }


    public function columnsModel()
    {

        $models = Az::$app->smart->migra->scan(true);

        /** @var ZActiveRecord $model */
        foreach ($models as $className) {

            $model = new $className();

            foreach ($model->columns as $name => $formDb) {

                if (ZArrayHelper::isIn($name, Visuals::excludeCols))
                    continue;

                $coreConfigDb = DragConfigDb::findOne([
                    'class_name' => $model->className
                ]);

                $coreFormDb = DragFormDb::findOne([
                    'name' => $name,
                    'drag_config_db_id' => $coreConfigDb->id
                ]);

                if (!$coreFormDb)
                    $coreFormDb = new DragFormDb();

                $coreFormDb->configs->rules = [
                    [validatorSafe]
                ];

                $coreFormDb->attributes = $this->columnsAttr($coreFormDb->attributes, $formDb, new FormDb());
                $coreFormDb->name = $name;
                $coreFormDb->drag_config_db_id = $coreConfigDb->id;
                $coreFormDb->save();

            }

        }

    }


    public function columnsForm()
    {

        $forms = Az::$app->smart->norms->formScan();

        /** @var ZActiveRecord $form */
        foreach ($forms as $className) {

            $form = new $className();
            foreach ($form->columns as $name => $formDb) {

                if (ZArrayHelper::isIn($name, Visuals::excludeCols))
                    continue;

                $coreConfig = DragConfig::findOne([
                    'class_name' => $form->className
                ]);

                $coreForm = DragForm::findOne([
                    'name' => $name,
                    'drag_config_id' => $coreConfig->id
                ]);

                if (!$coreForm)
                    $coreForm = new DragForm();

                $coreForm->configs->rules = [
                    [validatorSafe]
                ];

                $coreForm->attributes = $this->columnsAttr($coreForm->attributes, $formDb, new Form());
                $coreForm->name = $name;
                $coreForm->drag_config_id = $coreConfig->id;
                $coreForm->save();

            }

        }

    }


    public function model()
    {

        $models = Az::$app->smart->migra->scan(true);

        /** @var ZActiveRecord $model */
        foreach ($models as $className) {

            $model = new $className();
            $coreConfigDb = DragConfigDb::findOne([
                'class_name' => $model->className
            ]);

            if (!$coreConfigDb)
                $coreConfigDb = new DragConfigDb();

            $coreConfigDb->configs->rules = [
                [validatorSafe]
            ];
            $coreConfigDb->attributes = $this->modelAttr($coreConfigDb->attributes, $model->configs);
            $coreConfigDb->class_name = $model->className;
            $coreConfigDb->save();

        }

    }
    

    public function form()
    {

        $forms = Az::$app->smart->norms->formScan();

        /** @var ZModel $form */
        foreach ($forms as $form) {

            $form = new $form();
            $coreConfig = DragConfig::findOne([
                'class_name' => $form->className
            ]);

            if (!$coreConfig)
                $coreConfig = new DragConfig();

            $coreConfig->configs->rules = [
                [validatorSafe]
            ];
            $coreConfig->attributes = $this->modelAttr($coreConfig->attributes, $form->configs);
            $coreConfig->class_name = $form->className;
            $coreConfig->save();

        }

    }

    #endregion


}
