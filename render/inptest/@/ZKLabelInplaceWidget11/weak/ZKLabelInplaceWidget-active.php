<?php


use kartik\builder\Form;
use rmrevin\yii\fontawesome\FA;
use zetsoft\models\core\CoreInput;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\inptest\ZHFileInputWidget;
use zetsoft\widgets\inptest\ZHInputGroupWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inptest\ZKLabelInplaceWidget;
$model = $this->modelGet(CoreInput::class, 7);
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
                'string_1' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => ZKLabelInplaceWidget::class,
                    'options' => [
                        'config' => [
                            'hasIcon' => true,
                            'icon' => 'fas fa-' . FA::_USERS
                        ]
                    ]
                ],
            ]
        ],

    ]
]);

$this->activeEnd();


