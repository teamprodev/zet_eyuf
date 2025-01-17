<?php


use kartik\checkbox\CheckboxX;

use rmrevin\yii\fontawesome\FA;
use zetsoft\models\core\CoreInput;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZHTML;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use kartik\builder\Form;
use zetsoft\widgets\inputes\ZCountryPickerWidgetOld;
use zetsoft\widgets\inputes\ZCheckboxButtonGroup;
use zetsoft\widgets\inputes\ZKCheckboxXWidget;
use zetsoft\widgets\inputes\ZKCheckboxXWidget2;
use zetsoft\widgets\inputes\ZKSelect2Widget;

$model = $this->modelGet(CoreInput::class, 1);
/** @var ZView $this */

$items = Az::$app->forms->modelz->data();
$form = $this->activeBegin();
$this->modelSave($model);
$this->modelPost();

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [       // 2 column layout
                'bool_4' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => CheckboxX::class,
                    'options' => [
                        'pluginOptions' => [
                            'threeState' => true,
                            'iconChecked' => "<i class='fas fa-check'/>",
                            'iconUnchecked' => '',
                        ]

                    ]
                ],

            ]
        ],


    ]
]);

$this->activeEnd();

