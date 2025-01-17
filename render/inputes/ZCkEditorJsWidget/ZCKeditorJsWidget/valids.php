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


use kartik\builder\Form;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\inptest\ZCKeditorJsWidget;
use zetsoft\system\Az;


$model = $this->modelGet(\zetsoft\models\core\CoreInput::class, 7);
/** @var ZView $this */

$items = Az::$app->forms->modelz->data();
$form = $this->activeBegin();
$this->modelSave($model);

$model->configs->rulesAll = [
    [validatorEmail]
];


echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [
                'text_1' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => ZCKeditorJsWidget::class,

                ],
            ]
        ],
    ],
]);

$this->activeEnd();


