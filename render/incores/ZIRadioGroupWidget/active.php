<?php


use kartik\builder\Form;
use rmrevin\yii\fontawesome\FA;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\incores\ZIRadioGroupWidget ;

$model = $this->modelGet(\zetsoft\models\core\CoreInput::class, 7);
/** @var ZView $this */

$items = \zetsoft\system\Az::$app->forms->modelz->data();
$form = $this->activeBegin();
$this->modelSave($model);

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [
                'jsonb_1' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => \zetsoft\widgets\incores\ZIRadioGroupWidget::class,
                     'options' => [
                         'config' => [
                             'hasIcon' => true,
                             'icon' =>'fas fa-'. FA::_USERS
                         ]
                     ]
                ],
            ]
        ],
    ],


]);

$this->activeEnd();

