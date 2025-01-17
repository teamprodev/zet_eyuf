<?php

use zetsoft\system\Az;
use zetsoft\widgets\market\ZCategoryWidget;
use zetsoft\widgets\market\ZHotOfferWidget;
/*
 * Template
 * /render/market/XeMart%20-%20Ecommerce%20Template/html/06-shopping-cart.html
 * */
Az::$app->controller->layout = 'bozorMain';
?>
<div class="container">
    <div class="row">
        <div class="col-md-2 border">
            <?
                echo ZCategoryWidget::widget([
                'config' => [
                    'class' =>'zetColor'
                ]
                ])
            ?>
        </div>
        <div class="col-md-10 border">
            <?
                echo ZHotOfferWidget::widget([
                    'config' => [
                        'class' =>'zetColor'
                    ]
                ])
            ?>
        </div>
    </div>

</div>
