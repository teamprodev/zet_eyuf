<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\service\smart;


use zetsoft\dbitem\data\FormDb;
use zetsoft\dbitem\shop\PropertyItem;
use zetsoft\dbitem\data\ALLApp;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\models\page\PageAction;
use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\place\PlaceCountry;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\drag\DragForm;
use zetsoft\models\drag\DragFormDb;
use zetsoft\models\core\CoreInput;
use zetsoft\models\menu\Menu;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopOptionBranch;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\models\shop\ShopOrder;
use zetsoft\models\shop\ShopProduct;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\helpers\ZVarDumper;
use zetsoft\system\kernels\ZFrame;
use zetsoft\system\kernels\ZView;
use zetsoft\widgets\incores\ZMCheckboxGroupWidget;
use zetsoft\widgets\incores\ZMCheckboxWidget;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZHCheckboxButtonGroupWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\widgets\navigat\ZGAccordionWidget;


class Order extends ZFrame
{

     public function getAllShopOrder() {
        return ShopOrder::find()->all();
     }

}
