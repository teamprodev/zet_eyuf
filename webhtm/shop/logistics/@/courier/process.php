<?php

use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;
use zetsoft\dbitem\core\WebItem;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\TabItem;
use zetsoft\models\ware\WareAccept;
use zetsoft\service\forms\Active;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\kernels\ZView;
use zetsoft\system\kernels\ZWidget;
use zetsoft\widgets\ajaxify\ZIntercoolerWidget;
use zetsoft\widgets\blocks\ZNProgressWidget;
use zetsoft\widgets\former\ZFormBuildWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\menus\ZMmenuWidget;
use zetsoft\widgets\navigat\ZSmartTabWidget;
use zetsoft\widgets\notifier\ZSessionGrowlWidget;


/** @var ZView $this */


/**
 *
 * Action Params
 */

$action = new WebItem();

$action->title = Azl . 'Приёмка от курьера';


$action->icon = 'fal fa-film';
$action->type = WebItem::type['html'];
$action->csrf = true;
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
    require Root . '/webhtm/block/assets/main.php';

    $this->head();

    ?>

</head>


<body class="<?= ZWidget::skin['white-skin'] ?>">

<?php

$this->beginBody();

echo ZNProgressWidget::widget([]);
echo ZMmenuWidget::widget([

]);
?>

<style>
    .iframe-orders {
        border: none;
        height: 100vh;
    }
</style>

<div id="page">

    <?

    require Root . '/webhtm/block/header/main.php';
    require Root . '/webhtm/block/navbar/admin.php';

    echo ZSessionGrowlWidget::widget();?>

    <div id="content" class="content-footer p-3">


        <div class="row">
            <div class="col-md-12 col-12">

                <?

                $wareAccept = new WareAccept();
                
                $shop_shipment_id = $this->httpGet('id');

                $tabData = [];

                $orderSrc = ZUrl::to([
                    'orders',
                    'shop_shipment_id' => $shop_shipment_id,
                ]);

                $orderItemsSrc = ZUrl::to([
                    'orderItems',
                    'shop_shipment_id' => $shop_shipment_id,
                ]);


                $tab = new TabItem();
                $tab->title = Az::l('Заказы');
                $tab->content = "<iframe id='shop_orders' class='iframe-orders' width='100%' height='auto' src='$orderSrc'></iframe>";

                $tabData[] = $tab;

                $tab = new TabItem();
                $tab->title = Az::l('Товары');
                $tab->content = "<iframe id='shop_order_items' class='iframe-orders' width='100%' height='auto' src='$orderItemsSrc'></iframe>";

                $tabData[] = $tab;

                echo ZSmartTabWidget::widget([
                    'data' => $tabData,
                ]);

                ?>
            </div>
        </div>

    </div>
    <? require Root . '\webhtm\block\footer\footerAdmin.php' ?>

</div>

<div class="col-md-4">

    <?
/*echo $this->require( '/webhtm/shop/admin/ware-accept/refundOrders.php', [
        'ware_accept_id' => $ware_accept_id,
    ]);*/

    ?>

</div>
<?php $this->endBody(); ?>

<script>

    function setSumma() {
        var currency = $(document).find('#wareaccept-currency').val();
        var in_dollar = $(document).find('#wareaccept-in_dollar').val();

        var summa = parseInt(currency) * parseInt(in_dollar);


        $(document).find('#wareaccept-converted').val(summa)
    }

    setSumma()

    $(document).on('pjax:end', function () {

        setSumma()

    })

    $(document).on('keyup', '#wareaccept-in_dollar', function() {

          $.ajax({
            url: '/api/orders/accept.aspx',
            data: {
               value: $(this).val(),
               currency: $(document).find('#wareaccept-currency').val()
            },
            success: function(response) {

                 $(document).find('#wareaccept-converted').val(response.value)

            }
          })
    })
</script>


</body>
</html>

<?php $this->endPage() ?>
                                      
