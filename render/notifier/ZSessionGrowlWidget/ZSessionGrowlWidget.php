    <?php

/*use zetsoft\widgets\dialogs\ZKGrowlWidget;*/
use kartik\widgets\Growl;
use zetsoft\widgets\notifier\ZSessionGrowlWidget;


echo ZSessionGrowlWidget::widget([

    'config'=>[
        'type' => Growl::TYPE_SUCCESS,
        'title' => 'Well done!',
        'body' => 'You successfully read this important alert message. 1',

        ]

    ]);
?>                                                                                                                                                                                                                                                                                                                                                           
