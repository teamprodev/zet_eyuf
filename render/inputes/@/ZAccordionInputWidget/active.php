<?php


use zetsoft\models\core\CoreInput;
use zetsoft\service\cores\Langs;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZHTML;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use kartik\builder\Form;
//use zetsoft\widgets\inputes\ZAccordionInputWidget;
use zetsoft\widgets\inputes\ZAccordionInputWidget;
use zetsoft\widgets\inputes\ZCountryPickerWidgetOld;
use zetsoft\widgets\inputes\ZCheckboxButtonGroup;
use zetsoft\widgets\inputes\ZKSelect2Widget;

$model = $this->modelGet(\zetsoft\models\core\CoreInput::class, 1);
/** @var ZView $this */

$items = Az::$app->forms->modelz->data();
$form = $this->activeBegin();
$this->modelSave($model);

$data = array_flip($items);
$data = array_merge($data);

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [
                'zaccordioninputwidget' => array(
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => ZAccordionInputWidget::class,
                    'options' => array(),
                )
            ]
        ],


    ]
]);

$this->activeEnd();

