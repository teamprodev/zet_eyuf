<?php


use zetsoft\models\core\CoreInput;
use zetsoft\system\Az;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWidget;
use kartik\builder\Form;
use zetsoft\widgets\inputes\ZImgRadioGroupWidget;
use zetsoft\widgets\inputes\ZMImageRadioGroupWidget;

$model = $this->modelGet(CoreInput::class, 1);
/** @var ZView $this */

$items = Az::$app->forms->modelz->data();
$form = $this->activeBegin();
$this->modelSave($model);
//$this->modelPost();

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
    'rows' => [
        [
            'attributes' => [       // 2 column layout
                'jsonb_2' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => \zetsoft\widgets\inputes\ZMImageRadioGroupWidget::class,
                    'options' => [
                        'data' => [
                            '<img src="http://townandcountryremovals.com/wp-content/uploads/2013/10/firefox-logo-200x200.png">',
                            '<img src="http://townandcountryremovals.com/wp-content/uploads/2013/10/firefox-logo-200x200.png">',
                            '<img src="http://townandcountryremovals.com/wp-content/uploads/2013/10/firefox-logo-200x200.png">'
                        ],
                        'config' => [
                            'url' => ZMImageRadioGroupWidget::imageUrl['none']
                        ]
                    ]
                ],
            ],
        ]
    ]
]);



$this->activeEnd();

