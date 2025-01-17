<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * Date:    9/14/2019
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */


use kartik\builder\Form;
use yii\web\JsExpression;
use yii\web\Response;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\former\test\TestLaptopForm;
use zetsoft\models\core\CoreInput;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\assets\ZAjaxForm;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZHTML;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZFormWizardWidget;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\themes\ZCardWidget;


/** @var ZView $this */
//$model = $this->modelGet(Computer::class, 66);

$model = new TestLaptopForm();
Az::$app->forms->modelz->form($model);



$this->modelPost();

// $form = $this->activeBegin();
$form = ZAjaxForm::begin([
    'ajaxSubmitOptions' => [
        'success' => new JsExpression('function(response) {
        console.log(response);
         $("#test").html(response);   
        }'),
        'complete' => new JsExpression('function() {console.log("request completed.")}')
    ]
]);

ZCardWidget::begin([
    'config' => [
        'title' => 'dsafasdf'
    ]
]);

?>


<?php

echo ZFormWidget::widget([
    'model' => $model,
    'form' => $form,
]);


ZCardWidget::end();
// $this->activeEnd();
ZAjaxForm::end();
