<?php

use zetsoft\models\page\PageAction;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\former\ZGrapesJsWidget;
use zetsoft\widgets\notifier\ZSweetAlert2Widget;

$action = new WebItem();
$action->debug = false;


$actionId = $this->httpGet('key');
$PageAction = PageAction::findOne($actionId);

$name = 'core/kernel/widget/class';

if ($PageAction)
    $name = $PageAction->name;

$path = Root . '/webhtm/' . $name . '.php';
$path = str_replace('\\', '/', $path);


$assets = $this->viewAsset($path);
$pregs = Az::$app->utility->pregs;

$scripts = ZArrayHelper::getValue($pregs->pregMatchAll($assets, '<script src="(.*?)".*?>'), 1);
$links = ZArrayHelper::getValue($pregs->pregMatchAll($assets, '<link href="(.*?)".*?>'), 1);

$page = $this->requirePartFile($path);

\zetsoft\widgets\former\ZGrapesJsWidgetIlyas::begin([
    'config' => [
        'scripts' => $scripts,
        'styles' => $links,
        'categories' => [
            'former',
            'inputes',
            'columns'
        ],
        'saveFile' => $path
    ]
]);

echo $page;

\zetsoft\widgets\former\ZGrapesJsWidgetIlyas::end();

$this->title = Az::l('Конструктор сайтов');
