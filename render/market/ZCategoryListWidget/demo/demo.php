<?php

namespace zetsoft\widgets\market;


use zetsoft\dbitem\wdg\MenuItem;
use zetsoft\models\menu\MenuImage;
use zetsoft\service\menu\ALL;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\kernels\ZWidget;


/**
 *
 * Class ZKSelect2Widget
 * http://demos.krajee.com/widget-details/select2
 *
 * Created By: Maftuna Kodirova
 */
class ZCategoryListWidgetsad extends ZWidget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [
        'isAll' => true,
        'grapes' => true,
        'open' => true,
        'mode' => ZMenuWidget::mode['shop'],
        'name' => "All Categories",
        'col_number' => 4,
    ];

    public $colors=[
        'primary-color'=>'#797979',
        'secondary-color'=>'#10b410'
    ];

    public const mode = [
        'menu' => 'menu',
        'shop' => 'shop',

    ];

    public $menu_data = '';
    public $defaul_image = "/render/market2/ZMenuWidget/asset/images/m-cloth.png";
    public $data = [];
    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [

    ];

    public function asset()
    {
 
        $this->fileCss('/render/market/ZMenuWidget/asset/css/style.css');
        //$this->fileJs("/render/market/ZMenuWidget/asset/js/custom.js");
    }

    public $layout = [];
    public $_layout = [
        'main' => <<<HTML
<div class="category-list-menu">
<ul class="list-inline category-list">
    <li class="nav-item">
        <a target="_blank" class="nav-link" href="/discount">
            <i class="fas fa-percent text-danger mr-2 align-middle"></i>
            {discount_string} 
        </a>
    </li>
    {menu_data}
</ul>
</div>
HTML,

        'main_li' => <<<HTML
            <li class="nav-item">
                <a target="{target}" class="nav-link" href="{url}">
                    <i class="fas fa-{icon} mr-2 align-middle"></i>
                    {label} 
                </a>
            </li>
HTML,

        'css' => <<<CSS
        .category-list-menu{
            max-height: 36.4px;
            overflow: hidden;
        }

        .category-list li{
            display: inline-block;
            border-right: 1px solid _primaryColor_;
        }
        .category-list li:last-child{
            border: none;
        }
        .category-list li a{
            font-weight: 600;
            font-size: 1.1rem;              
            color: _primaryColor_!important;
            transition: 0.4s ease-in-out all;
        }
        .category-list li a:hover{
            color:_secondaryColor_!important;  
        }
        
CSS,


        'js' => <<<JS
       
JS,

    ];

    public function all($items)
    {
        $col_number = $this->_config['col_number'];
        foreach ($items as $item) {
            $url = $item->url ?? '#';
            $icon = $item->icon ?? $this->defaul_image;
            $target = $item->target ?? 'self';
            $label = $item->label ?? 'default label';
            $this->menu_data .= strtr($this->_layout['main_li'], [
                '{url}' => $url,
                '{target}' => $target,
                '{icon}' => $icon,
                '{label}' => $label,
            ]);
        }
    }

    public function codes()
    {
        switch ($this->_config['mode']) {
            case 'shop':

                $this->data = Az::$app->market->category->generateDBMenuItems();
                $new_data = [];
                foreach ($this->data as $key => $a)
                {
                    $new_data[] = $a;
                    if ($key > 3)
                        break;
                }
                $this->data = $new_data;
                break;

            default:

                if (!empty($this->_config['names']))
                    $this->data = Az::$app->cores->menus->create($this->_config['names']);

                if ($this->_config['isAll'] or empty($this->_config['names'])) {
                    $this->data = ZArrayHelper::merge(
                        $this->data,
                        (new ALL())->run()
                    );
                }
        }

        $this->all($this->data);

        $this->htm = strtr($this->_layout['main'], [
            '{name}' => $this->_config['name'],
            '{menu_data}' => $this->menu_data,
            '{discount_string}'=>Az::l('Скидки')
        ]);

        $this->css = strtr($this->_layout['css'], [
            '_primaryColor_'=>$this->colors['primary-color'],
            '_secondaryColor_'=>$this->colors['secondary-color'],
        ]);

        $this->js = strtr($this->_layout['js'], [

        ]);
    }
}
