<?php

use zetsoft\dbitem\data\TabItem;
use zetsoft\former\shop\ProductItemForm;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\Az;
use zetsoft\widgets\former\ZDatatableWidget;
use zetsoft\widgets\former\ZDatatableWidgetJ;
use zetsoft\widgets\former\ZDatatableWidgetNew;
use zetsoft\widgets\former\ZSmartWizardWidget;
use zetsoft\widgets\former\ZWizardStepsWidget;
use zetsoft\dbitem\shop\ProductItem;


$model = ShopOrder::findOne(1);

$noModel = new ShopOrder();
$noModel->date_deliver = '20.20.20';
$noModel->date_transfer = '20.20.20';
$noModel->name = '20.20.20';

$data = [];

$item = new ShopOrder();
$item->id = 1;
$item->name = 'dfsdqwe';

//$data[] = $item;
  $data = Az::$app->market->order->getUserOrderList();
  //vdd($data);
$model = new ShopOrder();
$model->configs->nameOn = [
    'id',
    'name',
];
$model->columns();

?>





<style>
    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard > div.wizard-inner {
        position: relative;
        margin-bottom: 50px;
        text-align: center;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 75%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 15px;
        z-index: 1;
    }

    span.round-tab {
        width: 30px;
        height: 30px;
        line-height: 30px;
        display: inline-block;
        border-radius: 50%;
        background: #fff;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 16px;
        color: #0e214b;
        font-weight: 500;
        border: 1px solid #ddd;
    }

    span.round-tab i {
        color: #555555;
    }

    .wizard li.active span.round-tab {
        background: #0db02b;
        color: #fff;
        border-color: #0db02b;
    }

    .wizard li.active span.round-tab i {
        color: #5bc0de;
    }

    .wizard .nav-tabs > li {
        width: 25%;
    }

    .wizard .nav-tabs > li a {
        width: 30px;
        height: 30px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
        background-color: transparent;
        position: relative;
        top: 0;
    }

    .wizard .nav-tabs > li a i {
        position: absolute;
        top: -15px;
        font-style: normal;
        font-weight: 400;
        white-space: nowrap;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 12px;
        font-weight: 700;
        color: #000;
    }
</style>
<div class="orders">
    <div class="container">
    <h6 class="text-success">Мой Профиль / Oreders </h6>
        <div class="wizard pt-3">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#step1"><span class="round-tab">1 </span> <i>Step 1</i></a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step2"><span class="round-tab">2</span> <i>Step 2</i></a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3"><span class="round-tab">3</span> <i>Step 3</i></a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step4"><span class="round-tab">4</span> <i>Step 4</i></a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
        <h6>Orders to shop</h6>
        <div class="row">
            <?

                echo ZDatatableWidgetNew::widget([
                    'model' => $model,
                    'data' => $data,
                    'config' => [
                        'searching' => false,
                        'paging' => false,
                    ]
                ]);


            ?>
        </div>
    </div>
</div>
