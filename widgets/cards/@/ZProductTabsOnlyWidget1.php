<?php

/**
 *
 *
 * Author:  Maxamadjonov Jaxongir
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\widgets\cards;


use yii\data\Pagination;
use zetsoft\system\column\ZLinkPager;
use zetsoft\system\column\ZScrollPager;
use zetsoft\system\kernels\ZWidget;
use zetsoft\widgets\former\ZListViewWidgetOld;
use zetsoft\system\Az;
use zetsoft\widgets\inputes\ZSelect2Widget;

class ZProductTabsOnlyWidget1 extends ZWidget
{
    public $config = [];
    public $_config = [
        'widget' => '',
        'categoryId' => null,
        'url' => 'market/main/simgle-product',
        'pager' => ZProductTabsOnlyWidget1::type['scroll'],
        'addButton' => false,
        'cols' => 3,
        'sort' => 3,
        'key'=>'price',
        'withFilter' =>true
    ];

    public const type = [
        'link' => 'link',
        'scroll' => 'scroll'
    ];
    public $layout = [];
    public $_layout = [
        'main' => <<<HTML

<div  class="container-fluid my-2"> 
    <div class="row {filter_class}">
    
        <div class="col-md-3">
            <div class="switch-parent">
                <button class="mx-0 btn btn-success" id="switch_to_col">
                    <i class="fa fa-th-list"></i>
                </button>
                <button class="mx-0 btn btn-outline-success" id="switch_to_list">
                    <i class="fa fa-th-large"></i>
                </button>
            </div>
        </div>
        <div class="col-md-9 d-block">
                {filter}
        </div>
        
    </div>
    
    <div class="row wrapper-product">
        
        {content}
    
    </div>
    
    <div class="dilshod">
        {pager}
    </div>     
</div>     
   
   
    
   

HTML,
        'js' => <<<JS
let items = $('.pre-tab-item');

let cols = $('.zcol');
let lists = $('.zlist');

for (let i=0;i<cols.length;i++){
    $(lists[i]).hide();
    $(cols[i]).show();
}

$('#switch_to_list, #switch_to_col').on('click',function () {
    cols = $('.zcol');
    lists = $('.zlist');
    items = $('.pre-tab-item')
    
    $(this).removeClass('btn-outline-success')
    $(this).addClass('btn-success')
    
    if ($(this).attr('id')==='switch_to_list'){
        for (let i=0;i<lists.length;i++){
            $(lists[i]).show();
            $(cols[i]).hide();
            $(items[i]).addClass('col-md-12')
            $(items[i]).removeClass('col-sm-6 col-md-4 col-lg-3 col-xl-2')
        }
        $('#switch_to_col').addClass('btn-outline-success')
        $('#switch_to_col').removeClass('btn-success')                                          
    }
    if ($(this).attr('id')==='switch_to_col'){
         for (let i=0;i<lists.length;i++){
            $(lists[i]).hide();
            $(cols[i]).show();
            $(items[i]).addClass('col-sm-6 col-md-4 col-lg-3 col-xl-3')
            $(items[i]).removeClass('col-md-12')
        }
        $('#switch_to_list').addClass('btn-outline-success')
        $('#switch_to_list').removeClass('btn-success') 
    } 
})

function eventload() {
    cols = $('.zcol');
    items = $('.pre-tab-item')
    lists = $('.zlist');
  
    let inputs = $(".inputhide")
    for (let i=0;i<inputs.length;i++){
        $(inputs[i]).hide()
    }
    if ($('#switch_to_col').hasClass('btn-success')){
        for (let i=0;i<cols.length;i++){
            $(lists[i]).hide();
            $(cols[i]).show();
            $(items[i]).removeClass('col-md-12')
            $(items[i]).addClass('col-sm-6 col-md-4 col-lg-3 col-xl-3')
        }                                                
    }
    if ($('#switch_to_list').hasClass('btn-success')){
        for (let i=0;i<lists.length;i++){
            $(lists[i]).show();
            $(cols[i]).hide();
            $(items[i]).addClass('col-md-12')
            $(items[i]).removeClass('col-sm-6 col-md-4 col-lg-3 col-xl-3')
        }
    }
}

JS,
        'css' => <<<CSS

CSS,

    ];


    public function codes()
    {
        $this->model = Az::$app->market->product->sortProduct($this->model, [$this->_config['key']], [$this->_config['sort']]);

        $listview = ZListViewWidgetOld::widget([
            'model' => $this->model,
            'config' => [
                'itemView' => function ($model, $key, $index, $widget) {
                    echo "  <div class=\"pre-tab-item px-0 col-sm-6 col-md-4 col-lg-3 col-xl-2  mb-3\">";
                    echo ZMarketCardsOnlyWidget1::widget([
                        'config' => [
                            'url' => $this->_config['url'],
                            'button' => $this->_config['addButton']
                        ],
                        'model' => $model
                    ]);
                    echo "</div>";
                },
                'layout' => '{items}',
                'pageSize' => 5,
            ]
        ]);


        $count = \Dash\count($this->model);
        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' =>5,
        ]);

        if ($this->_config['pager'] === 'link') {
            $pager = ZLinkPager::widget([
                'pagination' => $pagination,
            ]);
        } else if ($this->_config['pager'] === 'scroll')
            $pager = ZScrollPager::widget([
                'isGrid' => false,
                'pagination' => $pagination,
                'container' => '.wrapper-product',
                'item' => '.pre-tab-item',
                'paginationSelector' => '.dilshod .pagination ',
                'triggerTemplate' => '<div class="ias-trigger col-md-12 pre-tab-items mb-3 pt-3" style="text-align: center; cursor: pointer;"><a>{text}</a></div>',
                'eventOnRendered' => 'eventload();',
                'spinnerTemplate' => '<div class="ias-spinner col-md-12 pre-tab-items mb-3 pt-3" style="text-align: center;"><img src="{src}"/></div>',
            ]);


        $current = $pagination->getPage() + 1;


        $this->htm = strtr($this->_layout['main'], [
            '{content}' => $listview,
            '{pager}' => $pager,
            '{filter}' => ZSortWidget::widget(['name' => 'filter',
                'id' => 'depend1',
                'data' => [
                    'name'=>'по названию',
                     'rating'=>'Рейтинг',
                    'price' => 'Цена',

                ]]),
            '{filter_class}'=>!$this->_config['withFilter']?'d-none':''

            //'{summary}' => Az::l("Страница {$current} из {$pagination->getPageCount()}"),
        ]);
        $this->js .= $this->_layout['js'];
        $this->css .= $this->_layout['css'];
        $this->js = strtr($this->_layout['js'], [
            '{cols}' => $this->_config['cols']
        ]);
    }

}
