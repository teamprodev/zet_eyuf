<?php


use kartik\builder\Form;
use zetsoft\models\core\CoreInput;
use zetsoft\system\kernels\ZView;
use zetsoft\system\Az;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\inputes\ZHFileInputWidget;
use zetsoft\widgets\inputes\ZHInputGroupWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZTelInputWidget;

$model = $this->modelGet(\zetsoft\models\core\CoreInput::class, 7);
/** @var ZView $this */

$items = Az::$app->forms->modelz->data();
$form = $this->activeBegin();
$this->modelSave($model);

// start|MuminovUmid|2020-10-09
$model->configs->rules = [
    ['zetsoft\\system\\validate\\ZRequiredValidator'],
];
// end|MuminovUmid|2020-10-09

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [
                'string_1' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => ZTelInputWidget::class,
                    'options'=>[
                        'config' => [
                            'placeholder'=>'',
                            'hasIcon' => false,
                            'icon'=>'fas fa-user'

                        ]
                    ],
                ],
            ]
        ],
    ],
]);

$this->activeEnd();

