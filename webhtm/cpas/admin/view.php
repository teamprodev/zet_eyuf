<?php

use kartik\grid\DataColumn;
use zetsoft\dbitem\core\WebItem;
use zetsoft\models\cpas\CpasOffer;
use zetsoft\models\cpas\CpasOfferItem;
use zetsoft\models\cpas\CpasLand;
use zetsoft\models\place\PlaceCountry;
use zetsoft\system\assets\ZColor;
use zetsoft\system\Az;
use zetsoft\system\column\ZKDataColumn;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\kernels\ZView;
use zetsoft\system\kernels\ZWidget;
use zetsoft\widgets\ajaxify\ZIntercoolerWidget;
use zetsoft\widgets\blocks\ZNProgressWidget;
use zetsoft\widgets\former\ZDynaWidget;
use zetsoft\widgets\navigat\ZButtonWidget;
use zetsoft\widgets\navigat\ZGAccordionWidget;
use zetsoft\widgets\navigat\ZGAccordionReadmoreWidget;
use zetsoft\widgets\notifier\ZSessionGrowlWidget;
use zetsoft\widgets\themes\ZCardWidget;


/** @var ZView $this */


/**
 *
 * Action Params
 */

$action = new WebItem();

$action->title = Azl . 'Детали оффера';
$action->icon = 'fa fa-globe';
$action->type = WebItem::type['html'];
$action->csrf = true;
$action->loader = false;
$action->debug = true;



$this->paramSet(paramAction, $action);

$this->title();
$this->toolbar();


/**
 *
 * Start Page
 */

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <?php

    require Root . '/webhtm/block/metas/main.php';
    require Root . '/webhtm/block/assets/App/main_arbit.php';

    $this->head();

    ?>

</head>


<body class="<?= ZWidget::skin['white-skin'] ?>">

<?php

$this->beginBody();

echo $this->require( '\webhtm\cpas\blocks\header.php');



?>

    <div class="my-2 p-2 px-3 shadow-sm p-3 bg-white">
        <h2 class="text-muted"><?= Az::l('Детали оффера')?></h2>
        <div>
            <a href="/cpas/admin/statistic.aspx"><?= Az::l('Главная')?></a>
            <a href="/cpas/admin/offer.aspx"> / <?= Az::l('Офферы')?></a>
            <span href="/cpas/admin/view.aspx?id=1"> / <?= Az::l('Детали оффера')?></span>
        </div>
    </div>
    <div class="container-fluid  grey lighten-4">
        <div class="row py-3">
            <div class="col-md-4 pb-2">
                <?php


                /** @var ZView $this * */

                $id = (int)$this->httpGet('id');
                $model = CpasOffer::findOne($id);

                #errorCheck
                if ($model === null)
                    return $this->urlRedirect('/cpas/redirect/404.aspx');



                $title = $model->title;
                $footer = $model->text;
                ZCardWidget::begin([
                    'config' => [
                        'title' => $title,
                        'type' => ZCardWidget::type['dynCard'],
                        'headerColor' => ZColor::color['green-special'],
                        'classHeadColor' => 'bg-white text-dark px-4 p-2',
                        'footerText' => '',
                        'hasFooter' => true,
                        'footerColor' => ZColor::color['green-special'] . ' text-black',
                    ]
                ]); ?>

                <div class="row d-block px-3">
                    <div class="px-4 pb-3">

                        <img class="rounded w-100" height="auto"
                             src="<?= '/upload/uploaz/' . App . '/' . $model->className . '/' . 'photo/' . $model->id . '/' . ZArrayHelper::getValue($model->photo, 0) ?>"
                        />

                    </div>
                    <div class="border-top py-2">
                        <h6 class=""><?= Az::l('Краткое описание')?></h6>
                        <P class="text-muted">
                            <?php
                             if ($model->text)
                                echo $model->text
                             ?>
                        </p>
                    </div>
                    <div class="border-top py-2">
                        <h6 class=""><?= Az::l('Форм фактор')?></h6>
                        <P class="text-muted">
                            <?php
                             if ($model->substance)
                                $model->substance
                             ?>
                        </p>
                    </div>
                    <!--<div class="border-top">
                        <h6 class="">Производитель</h6>
                        <P class="text-muted">
                            <? /*= $model->user_company_id */ ?>
                        </p>
                    </div>-->
                    <!--<div class="border-top py-2">
                        <h6 class="">Состав</h6>
                        <P class="text-muted">
                            <?php
/*                                if ($model->composition)
                                    $model->composition
                            */?>
                        </p>
                    </div>-->
                    <div class="border-top py-2">
                        <h6 class=""><?= Az::l('Доставки')?></h6>
                        <P class="text-muted">
                            <?
                            if ($model->deliver)
                                foreach ($model->deliver as $item) {
                                    echo PlaceCountry::findOne($item)->name;
                                }
                            ?>
                        </p>
                    </div>


                </div>

                <? ZCardWidget::end(); ?><br>
                <?php
                // todo: AzimjonToirov
                ZCardWidget::begin([
                    'config' => [
                        'title' => Az::l('Источники траффика'),
                        'type' => ZCardWidget::type['dynCard'],
                        'headerColor' => ZColor::color['green-special'],
                        'classHeadColor' => 'bg-white text-dark',
                        'footerText' => '',
                        'hasFooter' => true,
                        'footerColor' => ZColor::color['green-special'] . ' text-black',
                    ]
                ]);

                echo Az::$app->cpas->cpa->trafficNames($model);

                ZCardWidget::end();
                // todo: AzimjonToirov
                ?>
            </div>

            <div class="col-md-8">

                <div class="mb-2">
                    <?php
                    ZCardWidget::begin([
                        'config' => [
                            'title' => $title,
                            'type' => ZCardWidget::type['dynCard'],
                            'classHeadColor' => 'bg-white text-dark',
                            //'headerRight' => $btn,
                            'footerText' => $footer,
                            'hasFooter' => true,
                            'footerColor' => ZColor::color['green-special'] . ' text-black',
                        ]
                    ]);


                    $offerItems = CpasOfferItem::findAll(['cpas_offer_id' => $id]);
                    $offer_item_ids = ZArrayHelper::getColumn($offerItems,'id');
                    //vdd($offer_item_ids);
                    $cpasLands = new CpasLand();
                    $cpasLands->query = CpasLand::find()
                        ->where([
                            'cpas_offer_item_id' => $offer_item_ids
                        ]);

                    $cpasLands->configs->readonly = true;

                    $cpasLands->configs->nameOn = [
                        'place_country_id',
                        'title',
                        'type',

                    ];

                    $cpasLands->configs->after = [
                        'type' => [
                            [
                                'class' => ZKDataColumn::class,
                                'label' => Az::l('Посмотреть Лендинг'),
                                'width' => '100px',
                                'value' => function ($cpasLand, $key, $index, DataColumn $dataColumn) use ($model) {
                                    $url = ZArrayHelper::getValue($cpasLand, 'path'). 'landing.html';
                                    return ZButtonWidget::widget([
                                        'config' => [
                                            'url' => $url,
                                            'title' => ZArrayHelper::getValue($cpasLand, 'title'),
                                            'hasIcon' => true,
                                            'isPjax' => false,
                                            'pjax' => false,
                                            'icon' => 'fal fa-external-link fa-lg',
                                            'btn' => false,
                                            'target' => ZButtonWidget::target['_blank'],
                                        ]
                                    ]);

                                }
                            ],
                            [
                                'class' => ZKDataColumn::class,
                                'label' => Az::l('Скриншот лендинга'),
                                'width' => '100px',
                                'value' => function ($cpasLand, $key, $index, DataColumn $dataColumn) use ($cpasLands) {
                                    $path = '/upload/uploaz/' . App . '/' . $cpasLands->className . '/' . 'screen/' . ZArrayHelper::getValue($cpasLand, 'id') . '/' . ZArrayHelper::getValue(ZArrayHelper::getValue($cpasLand, 'screen'), 0) ;

                                    return <<<HTML
                <img src="$path" style="width: 100px; height: 60px;">          
HTML;


                                }
                            ],

                        ],

                    ];

                    $cpasLands->columns();
                    //vdd($cpasLand);

                    echo ZDynaWidget::widget([
                        'model' => $cpasLands,
                        'config' => [
                            'showFooter' => false,
                            'titleSummary' => true,
                            'isCard' => false,
                            'columnBefore' => [
                                'action'
                            ],
                            'actionButtons' => [
                                'delete'
                            ],
                            'columnAfter' => false,
                            'hasToolbar' => false,
                            'search' => false,
                            'heighbody' => '100%',
                            'summary' => true,
                            'perfectScrollbar' => false,
                            'striped' => false,
                            'hasWidth' => false,
                            'panelTemplate' => "{items}",

                        ]
                    ]);

                    ZCardWidget::end();


                    ?>
                </div>

                <div class="mb-2">
                    <?php
                    ZCardWidget::begin([
                        'config' => [
                            'title' => Az::l('Элементы'),
                            'type' => ZCardWidget::type['dynCard'],
                            'classHeadColor' => 'bg-white text-dark',
                            //'headerRight' => $btn,
                            'footerText' => $footer,
                            'hasFooter' => true,
                            'footerColor' => ZColor::color['green-special'] . ' text-black',
                        ]
                    ]);

                    $itemsOffer = new CpasOfferItem();
                    $itemsOffer->query = CpasOfferItem::find()
                        ->where([
                            'cpas_offer_id' => $id
                        ]);

                    $itemsOffer->configs->nameOn = [
                        'place_country_id',
                        'pay',
                        'pay_currency',
                        'cost',
                        'cost_currency',

                    ];
                    $itemsOffer->configs->before = [
                        'place_country_id' =>  [
                            [
                                'class' => ZKDataColumn::class,
                                'label' => Az::l('Изменить'),
                                //'format' => 'html',
                                'width' => '100px',
                                'value' => function ($item, $key, $index, DataColumn $dataColumn) use ($id) {
                                    $url = ZUrl::to([
                                        '/cpas/admin/processItem',
                                        'id' => ZArrayHelper::getValue($item, 'id'),
                                        'model' => 'CpasOfferItem',
                                        'related' => 'CpasLand',
                                        'offer_id' => $id,
                                        'attribute' => 'cpas_offer_item_id'
                                    ]);
                                    return ZButtonWidget::widget([
                                        'config' => [
                                            'text' => '',
                                            'url' => $url,
                                            'btnSize' => ZButtonWidget::btnSize['btn-lg'],
                                            'class' => "ZDynaBTN p-0",
                                            'title' => Az::l('Изменить'),
                                            'btnRounded' => false,
                                            'btn' => false,
                                            'hasIcon' => '',
                                            'imgWidth' => '42px',
                                            'imgHeight' => '42px',
                                            'src' => '/render/former/ZDynaWidget/assets/img/edit.svg',
                                            'img' => true,
                                            //'target' => ZButtonWidget::target['_blank'],
                                        ],
                                    ]);



                                }
                            ]
                        ],
                    ];
                    $itemsOffer->configs->readonly = true;
                    $itemsOffer->columns();
                    echo ZDynaWidget::widget([
                        'model' => $itemsOffer,
                        'config' => [
                            'showFooter' => false,
                            'titleSummary' => true,
                            'isCard' => false,
                            'columnBefore' => [
                                'action'
                            ],
                            'actionButtons' => [
                                'delete',
                                //'update'
                            ],
                            'columnAfter' => false,
                            'hasToolbar' => false,
                            'search' => false,
                            'heighbody' => '100%',
                            'summary' => true,
                            'perfectScrollbar' => false,
                            'striped' => false,
                            'hasWidth' => false,
                            'showPageSummary' => false,
                            /*'updateUrl' => '/cpas/admin/processItem.aspx?id={id}&model={modelClassName}&related=CpasLand&offer_id='.$id,
                            'spaArray' => [
                                'update' => true
                            ]*/


                        ]
                    ]);

                    ZCardWidget::end();


                    ?>
                </div>

            </div>


        </div>

    </div>
</div>


<? echo $this->require( '\webhtm\cpas\blocks\footer.php'); ?>

        <?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>
