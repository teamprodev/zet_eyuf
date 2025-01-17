<?php


use zetsoft\service\utility\Views;
use zetsoft\widgets\animo\ZFakeLoaderWidget;
use zetsoft\widgets\animo\ZSimpleLoaderWidget;
use zetsoft\widgets\themes\ZFontYandexWidget;


use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\kernels\ZView;

/** @var ZView $this */

$this->fileCss('/render/asrorz/fontawesome-pro-5.12.0-web/css/all.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.8.2/css/all.min.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css');
$this->fileCss('/render/asrorz/mdb/css/mdb.min.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/hint.css@2.6.0/hint.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/file-icon-vectors@1.0.0/dist/file-icon-classic.min.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/file-icon-vectors@1.0.0/dist/file-icon-square-o.min.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/file-icon-vectors@1.0.0/dist/file-icon-vivid.min.css');
$this->fileCss('https://cdn.jsdelivr.net/npm/file-icon-vectors@1.0.0/dist/file-icon-vectors.min.css');
$this->fileCss('/render/asrorz/css/ALL.css');
$this->fileCss('/render/asrorz/css/font.css');
$this->fileCss('/render/asrorz/css/media.css');
$this->fileCss('/render/asrorz/css-app/market.css');


$this->fileCss('/render/asrorz/css-app/' . App . '.css');


Az::$app->params['position'] = Views::position['head'];

$this->fileJs('/render/asrorz/js/jquery3.4.1.js');
/*$this->fileJs('https://cdn.jsdelivr.net/npm/jquery-slimscroll@1.3.8/jquery.slimscroll.min.js');*/
//$this->fileJs('/render/asrorz/fontawesome-pro-5.12.0-web/js/ALL.js');
/*$this->fileJs('https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js');
$this->fileJs('https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.js');
$this->fileJs('https://cdn.jsdelivr.net/npm/mobile-detect@1.4.4/mobile-detect.min.js');
$this->fileJs('https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js');
$this->fileJs('https://cdn.jsdelivr.net/npm/bootstrap-popover-x@1.4.7/js/bootstrap-popover-x.js');*/

/*$this->fileJs('/render/asrorz/js/ALL.js');

$this->fileJs('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');
$this->fileJs('/render/asrorz/market/js/loadData.js');
$this->fileJs('/render/cards/ZVMarketWidget/asset/main2.js');
*/



$this->linkAll();

$this->registerLinkTag([
    'rel' => 'icon',
    'type' => 'image/x-icon',
    'href' => Az::getAlias('@web/favicon.ico')
]);


echo ZFontYandexWidget::widget([
    'config' => [
        'fonts' => ZFontYandexWidget::fonts['sibirix'], //yandex,  sibirix
    ],

]);

//echo ZSimpleLoaderWidget::widget();
//echo ZFakeLoaderWidget::widget([]);
?>



                                                                                                                
