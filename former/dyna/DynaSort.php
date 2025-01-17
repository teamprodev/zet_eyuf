<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\dyna;

use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\Form;
use zetsoft\dbdata\wdg\WidgetData;
use zetsoft\widgets\inputes\ZHRadioButtonGroupWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class DynaSort
 */
class DynaSort extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $sorts */
    public $sorts;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'sorts',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'DepsDataForm';

    public function init()
    {
        parent::init();
    }

    #endregion

    #region Config

    /**
     *
     * Function  config
     * @return  \Closure
     */

    public function config()
    {
        return function (Config $config) {

            $config->title = Az::l('DepsDataForm');
            return $config;
        };
    }

    #endregion

    #region Column

    /**
     *
     * Function column
     * @return array
     */
    public function column()
    {
        if (!empty($this->configs->column))
            return $this->configs->column;

        return ZArrayHelper::merge(parent::column(), [
           
            'name' => function (Form $column) {

                $column->title = Az::l('Название сорта');


                return $column;
            },
            
           
            'sorts' => function (Form $column) {

                $column->title = Az::l('Сохранённые сорты');
                $column->widget = ZHRadioButtonGroupWidget::class;


                return $column;
            },
            

        ], $this->configs->replace);
    }


    #endregion

    #region Blocks

    /**
     *
     * Function  blocks
     * @return  array
     */

    public function card()
    {
        return [
            [
                'title' => Az::l('Первый этап'),
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'items' => [
                            [
                                'name',
                                'sorts',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
