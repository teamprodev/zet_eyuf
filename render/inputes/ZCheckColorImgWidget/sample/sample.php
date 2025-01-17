<?php


use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use kartik\builder\Form;
use zetsoft\widgets\inptest\ZImageCheckboxGroupWidget_OLD;


$model = $this->modelGet(\zetsoft\models\core\CoreInput::class, 6);
/** @var ZView $this */

$form = $this->activeBegin();
$this->modelSave($model);
$this->modelPost();
?>

<?php

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [
                'jsonb_2' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => ZImageCheckboxGroupWidget_OLD::class,
                    'options' => [
                        'config' => [
                            'radio' => true,
                        ]
                    ],
                ],
            ]
        ],
    ]
]);
$this->activeEnd();

