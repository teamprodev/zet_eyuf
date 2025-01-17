<?php


use zetsoft\models\core\CoreInput;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZHTML;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use kartik\builder\Form;
use zetsoft\widgets\inputes\ZAccordionInputWidget;
use zetsoft\widgets\inputes\ZCountryPickerWidgetOld;
use zetsoft\widgets\inputes\ZCheckboxButtonGroup;
use zetsoft\widgets\inputes\ZCheckboxListWidget;
use zetsoft\widgets\inputes\ZHCheckboxWidget;
use zetsoft\widgets\inputes\ZHRadioButtonGroupWidget;
use zetsoft\widgets\inputes\ZRadioButtonGroup;
use zetsoft\widgets\inputes\ZRadioListWidget;
use zetsoft\widgets\inputes\ZHRadioWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;

$model = $this->modelGet(\zetsoft\models\core\CoreInput::class, 2);
/** @var ZView $this */

$items = Az::$app->forms->modelz->data();
$form = $this->activeBegin();
$this->modelSave($model);

//$data = array_flip(ZLang::lang);
//$data = array_merge($data, $model->accordioninputwidget);

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [

                'string_3' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => ZHRadioButtonGroupWidget::class,
                    'options' => [
                        'data' => [
                            'khvbdcd',
                            'vjcvahgs',
                            ',nd cb',
                        ],
                        'value' => 1
                    ]
                ],

            ]
        ]


    ]
]);

$this->activeEnd();

