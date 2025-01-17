<?php

namespace zetsoft\widgets\market;

use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use function GuzzleHttp\Psr7\str;
use zetsoft\system\kernels\ZWidget;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/**
 *
 * Class ZKSelect2Widget
 * https://github.com/chinchang/hint.css
 * Created By: Malika Parmanova
 * Refactored: Malika Parmanova
 */

class ZMCategoriesWidget extends ZKSelect2Widget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [];


    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [

    ];

    public $layout = [];
    public $_layout = [





        'css' => <<<CSS
     
    
    
CSS,
    ];




    public function asset()
    {
        $this->fileJs('https://cdn.statically.io/gist/rafaelrinaldi/5880355/raw/3042ea8a8f92d27d035c733ce24711d836fd3a96/home.js');
        $this->fileCss('/render/market/ZMCategoriesWidget/demo_files/home.css');
        $this->fileCss('/render/market/ZMCategoriesWidget/demo_files/ae-header-ru.css');

    }


    public function codes()
    {
        $this->layout = [
        'main' => <<<HTML
<div class="page-container" style="margin-top: 20px;">
        <div id="home-firstscreen" class="home-firstscreen" style="background-color: rgb(96, 203, 222);">
            <div class="home-firstscreen-top-bar">
            </div>
            <div class="container">
                <div class="home-firstscreen-main">
                    <!--ams-region-end 1026-->
                    <div class="categories">
                        <!--ams-region-start 1242-->
                        <div class="categories-main new-categories-main categories-main-home"
                             data-role="category-content" data-spm="16005" data-widget-cid="widget-3">
                            <div class="categories-content-title" data-role="exclude"><a
                                    href="https://aliexpress.ru/all-wholesale-products.html"><span>Категории</span><i
                                    class="iconfont icon-arrow-right-x">&nbsp;</i></a></div>

                            <div class="categories-list-box"><!--ams-region-start 874-->
                                    <dl class="cl-item cl-item-computer cl-item-unfold" data-role="first-menu"
                                    data-spm="104">
                                    <dt class="cate-name"><span><a
                                            href="https://aliexpress.ru/category/202000006/computer-office.html"> Компьютеры и оргтехника </a></span>
                                    </dt>
                                    <dd class="sub-cate" data-path="c-computer-content-ru" data-role="first-menu-main">
                                        <!--ams-region-start 883-->
                                        <style type="text/css">.sub-cate-items dt a {
                                            max-width: 100%;
                                        }
                                        </style>
                                        <div class="cl-item cl-item-computer" data-role="first-menu" data-spm="105">
                                            <div class="sub-cate-main">
                                                <div class="sub-cate-content" style="display:inline-block">
                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202000006/computer-office.html">Ноутбуки,
                                                                    компьютеры, мониторы</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202000104/laptops.html">Ноутбуки</a><a
                                                                    href="https://aliexpress.ru/category/202060445/gaming-laptops.html">Игровые
                                                                ноутбуки</a><a
                                                                    href="https://aliexpress.ru/category/202000104/laptops.html?&amp;brandValueIds=105790,3426,200702996">Ноутбуки
                                                                Apple</a><a
                                                                    href="https://aliexpress.ru/category/202060570/desktops.html">Системные
                                                                блоки</a><a
                                                                    href="https://aliexpress.ru/category/202001221/lcd-monitors.html?&amp;g=y">Мониторы</a><a
                                                                    href="https://aliexpress.ru/category/202060516/tablets.html?&amp;g=y">Планшеты</a><a
                                                                    href="https://aliexpress.ru/category/202000286/ebook-reader.html?&amp;g=y">Электронные
                                                                книги</a><a
                                                                    href="https://aliexpress.ru/category/202001502/mini-pc.html">Мини
                                                                PC</a></dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202005903/office-electronics.html">Комплектующие</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202001169/cpus.html?&amp;g=y">Процессоры</a><a
                                                                    href="https://aliexpress.ru/category/202001171/graphics-cards.html?&amp;g=y">Видеокарты</a><a
                                                                    href="https://aliexpress.ru/category/202001172/motherboards.html?&amp;g=y">Материнские
                                                                платы</a><a
                                                                    href="https://aliexpress.ru/category/202001174/rams.html?&amp;g=y">Модули
                                                                памяти</a><a
                                                                    href="https://aliexpress.ru/category/205734013/fan-cooling.html?&amp;g=y">Системы
                                                                охлаждения</a><a
                                                                    href="https://aliexpress.ru/category/202060462/internal-solid-state-drives.html">Жесткие
                                                                диски, SSD</a><a
                                                                    href="https://aliexpress.ru/category/202000568/pc-power-supplies.html">Блоки
                                                                питания</a><a
                                                                    href="https://aliexpress.ru/category/202000109/computer-cases-towers.html">Корпуса</a>
                                                            </dd>
                                                        </dl>
                                                    </div>

                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/wholesale?&amp;SearchText=+%D0%BA%D0%BE%D0%BC%D0%BF%D1%8C%D1%8E%D1%82%D0%B5%D1%80%D0%BD%D1%8B%D0%B5+%D0%B0%D0%BA%D1%81%D0%B5%D1%81%D1%81%D1%83%D0%B0%D1%80%D1%8B&amp;CatId=202000006">Аксессуары</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202002190/mouse-keyboards.html?&amp;g=y">Клавиатуры
                                                                    и мыши</a><a
                                                                    href="https://aliexpress.ru/category/202001078/laptop-bags-cases.html">Сумки
                                                                и чехлы для ноутбуков</a><a
                                                                    href="https://aliexpress.ru/category/202061439/computer-speakers.html">Компьютерные
                                                                колонки</a><a
                                                                    href="https://aliexpress.ru/category/202060518/earphones-headphones.html">Наушники
                                                                и гарнитуры</a><a
                                                                    href="https://aliexpress.ru/category/202004372/video-games.html">Игровые
                                                                аксессуары</a></dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202005903/office-electronics.html">Оргтехника</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202000265/printers.html">Принтеры,
                                                                    МФУ</a><a
                                                                    href="https://aliexpress.ru/category/202040036/3d-printers.html">3D
                                                                принтеры</a><a
                                                                    href="https://aliexpress.ru/category/202005916/printer-supplies.html">Расходные
                                                                материалы</a></dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202004327/external-storage.html">Устройства
                                                                    хранения</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202004327/external-storage.html">USB
                                                                    флэшки</a><a
                                                                    href="https://aliexpress.ru/category/202000400/memory-cards.html">Карты
                                                                памяти</a><a
                                                                    href="https://aliexpress.ru/category/202002182/external-hard-drives.html">Внешние
                                                                жесткие диски</a></dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202004326/networking.html">Сеть</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202001500/wireless-routers.html">Роутеры</a><a
                                                                    href="https://aliexpress.ru/category/202004347/3g-modems.html">3G-модемы</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <ul class="clearfix bottom-show-list">
                                                        <li>
                                                            <a href="https://tmall.ru/wholesale?catId=202000006&amp;SearchText=0-0-12&amp;g=y"><span
                                                                    class="activity-name">Игровые ПК и периферия</span>
                                                                <span class="activity-pic"><img
                                                                        src="./demo_files/HTB1W7b.X.LrK1Rjy1zbq6AenFXaB.jpg_140x140.jpg_.webp"></span>
                                                            </a></li>
                                                        <li class="hidden-sm"><a
                                                                href="https://tmall.ru/category/202000104/laptops.html?g=y">
                                                                <span
                                                                class="activity-name">Ноутбуки, доставка от 2 дн<i
                                                                class="zap"></i></span> <span class="activity-pic"><img
                                                                src="./demo_files/HTB1GmN7SFXXXXXwapXXq6xXFXXXu.jpg_140x140.jpg_.webp"></span>
                                                        </a></li>
                                                    </ul>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://campaign.aliexpress.com/wow/gf/upr-cs?wh_pid=gaming_channel&amp;wh_weex=true&amp;preDownLoad=true&amp;preInitInstance=rax">Игровые
                                                                решения <i class="zap"></i></a></dt>
                                                        <dd>
                                                            <a href="https://tmall.ru/wholesale?CatId=202000104&amp;SearchText=gaming">Игровые
                                                                ноутбуки</a><a
                                                                href="https://tmall.ru/wholesale?CatId=202060570&amp;SearchText=gaming">Игровые
                                                            ПК</a><a
                                                                href="https://tmall.ru/wholesale?CatId=202000565&amp;SearchText=gaming">Игровые
                                                            мониторы</a><a
                                                                href="https://tmall.ru/wholesale?CatId=202002190&amp;SearchText=gaming">Игровые
                                                            мыши и клавиатуры</a><a
                                                                href="https://tmall.ru/wholesale?CatId=202001171&amp;SearchText=gaming">Игровые
                                                            видеокарты</a><a
                                                                href="https://tmall.ru/wholesale?CatId=202001429&amp;SearchText=gaming">Кресла
                                                            для геймеров</a></dd>
                                                    </dl>
                                                </div>

                                                <div class="sub-cate-row">
                                                            <dl class="sub-cate-items hidden-md hidden-sm" data-role="two-menu">
                                                                <dd class="mall-brands-list"><a
                                                                        href="https://tmall.ru/wholesale?catId=202000006&amp;brandValueIds=3426&amp;SearchText=APPLE"><img
                                                                        src="./demo_files/HTB1s5kNrOOYBuNjSsD4q6zSkFXas.jpg"></a><a
                                                                        href="https://tmall.ru/wholesale?catId=202000006&amp;brandValueIds=100012872&amp;SearchText=Lenovo"><img
                                                                        src="./demo_files/HTB1s.JGAXuWBuNjSszbq6AS7FXaC.jpg"></a><a
                                                                        href="https://tmall.ru/wholesale?catId=202000006&amp;brandValueIds=200004888&amp;SearchText=MSI"><img
                                                                        src="./demo_files/HTB1pZEvPxjaK1RjSZFAq6zdLFXar.jpg"></a><a
                                                                        href="https://aliexpress.ru/store/4924114"><img
                                                                src="./demo_files/HTB1exMSrLuSBuNkHFqDq6xfhVXae.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?catId=202000006&amp;brandValueIds=7469&amp;SearchText=Acer"><img
                                                                src="./demo_files/HTB10N.trIyYBuNkSnfoq6AWgVXaQ.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?catId=202000006&amp;brandValueIds=200911295&amp;SearchText=THUNDEROBOT&amp;g=y"><img
                                                                src="./demo_files/HTB1xIBsxbZnBKNjSZFrq6yRLFXac.jpg"></a><a
                                                                href="https://citilink.aliexpress.ru/store/5082457"><img
                                                                src="./demo_files/H237f57bf670f4c8abb5937c0cb0f1a160.jpg"></a><a
                                                                href="https://tmall.ru/pages/tmall_1111_epson.htm"><img
                                                                src="./demo_files/H53ae7d3fe3bf44258097c43c05bd0150k.jpg"></a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ams-region-end 883-->

                                    </dd>
                                </dl>
                                <!--ams-region-end 883--><!--ams-region-start 881-->
                                <dl class="cl-item cl-item-electronics" data-role="first-menu" data-spm="105">
                                    <dt class="cate-name"><span><a
                                            href="https://aliexpress.ru/category/202000020/consumer-electronics.html"> Электроника </a></span>
                                    </dt>
                                    <dd class="sub-cate" data-path="c-electronics-content-ru"
                                        data-role="first-menu-main">
                                        <!--ams-region-start 881-->
                                        <style type="text/css">.sub-cate-items dt a {
                                            max-width: 100%;
                                        }
                                        </style>
                                        <div class="cl-item cl-item-electronics" data-role="first-menu" data-spm="110">
                                            <div class="sub-cate-main">
                                                <div class="sub-cate-content" style="display:inline-block">
                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202004374/portable-audio-video.html">Портативная
                                                                    электроника</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202000540/earphones-headphones.html">Наушники
                                                                    и гарнитуры</a><a
                                                                    href="https://aliexpress.ru/category/202000058/portable-speakers.html">Портативные
                                                                колонки</a><a
                                                                    href="https://aliexpress.ru/category/202000543/mp3-player.html">MP3-плееры</a><a
                                                                    href="https://aliexpress.ru/category/202000286/ebook-reader.html">Электронные
                                                                книги</a><a
                                                                    href="https://aliexpress.ru/category/202059222/vr-ar-devices.html">Устройства
                                                                VR/AR</a></dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202004373/home-audio-video.html">Телевизоры
                                                                    и видеотехника</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202060663/smart-tv.html">Телевизоры</a><a
                                                                    href="https://aliexpress.ru/category/202061591/projectors.html">Проекторы</a><a
                                                                    href="https://aliexpress.ru/category/202001872/tv-receivers.html">ТВ-приставки
                                                                и медиаплееры</a><a
                                                                    href="https://aliexpress.ru/category/202001761/tv-mount.html">Кронштейны
                                                                для ТВ</a><a
                                                                    href="https://aliexpress.ru/category/202000086/remote-controls.html">Пульты
                                                                ДУ</a><a
                                                                    href="https://aliexpress.ru/wholesale?d=y&amp;CatId=0&amp;SearchText=%D0%BE%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD-%D0%BA%D0%B8%D0%BD%D0%BE%D1%82%D0%B5%D0%B0%D1%82%D1%80&amp;ltype=wholesale&amp;SortType=default&amp;isTmall=y&amp;page=1">Онлайн-кинотеатры</a>
                                                            </dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202040670/Smart-Electronics.html">Умная
                                                                    электроника</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202040723/wearable-devices.html">Смарт-часы
                                                                    и браслеты</a><a
                                                                    href="https://aliexpress.ru/category/202040642/smart-remote-control.html">Умные
                                                                гаджеты</a></dd>
                                                        </dl>
                                                    </div>

                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202004372/video-games.html">Игры
                                                                    и консоли</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202061837/video-game-consoles.html">Игровые
                                                                    консоли</a><a
                                                                    href="https://aliexpress.ru/category/202059178/handheld-game-players.html">Портативные
                                                                игровые консоли</a><a
                                                                    href="https://aliexpress.ru/category/205779001/Game-Deals.html">Игры
                                                                (диски и картриджи)</a><a
                                                                    href="https://aliexpress.ru/category/205857902/Prepaid-Digital-Codes.html">Игры
                                                                и цифровой контент</a><a
                                                                    href="https://aliexpress.ru/category/202059177/gamepads.html">Геймпады</a>
                                                            </dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202061423/speakers.html">Аудиосистемы</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202061441/ai-speakers.html">Умные
                                                                    колонки</a><a
                                                                    href="https://aliexpress.ru/category/202061439/computer-speakers.html">Компьютерные
                                                                АС</a><a
                                                                    href="https://aliexpress.ru/category/202061440/bookshelf-speakers.html">Полочные
                                                                АС</a><a
                                                                    href="https://aliexpress.ru/category/202061446/soundbar.html">Саундбары
                                                                для ТВ</a><a
                                                                    href="https://aliexpress.ru/category/202061685/hifi-devices.html">Hi-Fi
                                                                аудиотехника</a></dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt><a href="https://aliexpress.ru/home.htm#">Умный дом</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202040732/Smart-Home.html">Устройства
                                                                    для умного дома</a></dd>
                                                        </dl>
                                                    </div>
                                                    <ul class="clearfix bottom-show-list">
                                                        <li>
                                                            <a href="https://tmall.ru/wholesale?catId=202000020&amp;SearchText=0-0-12&amp;g=y"><span
                                                                    class="activity-name"><span style="color:red;">Электроника в рассрочку</span></span>
                                                                <span class="activity-pic"><img
                                                                        src="./demo_files/HTB1D16.XZvrK1Rjy0Feq6ATmVXaE.jpg_140x140.jpg_.webp"></span>
                                                            </a></li>
                                                        <li class="hidden-sm"><a
                                                                href="https://tmall.ru/category/202004372/video-games.html?g=y"><span
                                                                class="activity-name">Игровые консоли и игры</span>
                                                            <span class="activity-pic"><img
                                                                    src="./demo_files/HTB1tLQagq6qK1RjSZFmq6x0PFXa2.jpg_140x140.jpg_.webp"></span>
                                                        </a></li>
                                                    </ul>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/category/202060507/home-electronic-accessories.html">Аксессуары
                                                                для электроники</a></dt>
                                                        <dd><a href="https://aliexpress.ru/af/category/202004370.html">Кабели
                                                            и адаптеры</a><a
                                                                href="https://aliexpress.ru/category/202062371/power-source.html">Батареи
                                                            и аккумуляторы</a></dd>
                                                    </dl>
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/category/202004371/camera-photo.html">Фото-
                                                                и видеотехника</a></dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202040662/camera-drones.html">Квадрокоптеры
                                                                и дроны</a><a
                                                                href="https://aliexpress.ru/category/202062355/action-cameras.html">Экшн-камеры</a><a
                                                                href="https://aliexpress.ru/category/202060484/digital-cameras.html">Фотоаппараты</a><a
                                                                href="https://aliexpress.ru/category/202060502/photo-studio.html">Фотостудия</a><a
                                                                href="https://aliexpress.ru/category/202062346/live-equipment.html">Съёмочное
                                                            оборудование</a><a
                                                                href="https://aliexpress.ru/category/202000238/camera-photo-accessories.html">Аксессуары
                                                            для фото- и видеокамер</a><a
                                                                href="https://aliexpress.ru/category/202002436/dvr-dash-camera.html">Видеорегистраторы</a></dd>
                                                    </dl>
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt><a href="https://aliexpress.ru/home.htm#">Системы нагревания
                                                            табака</a></dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202006251/electronic-cigarettes.html">Электронные
                                                                нагревающие системы</a></dd>
                                                    </dl>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items hidden-md hidden-sm" data-role="two-menu">
                                                        <dd class="mall-brands-list"><a
                                                                href="https://aliexpress.ru/wholesale?brandValueIds=200022764&amp;SearchText=Skyworth"><img
                                                                src="./demo_files/HTB1cERaXovrK1RjSszf760JNVXaS.png"></a><a
                                                                href="https://aliexpress.ru/wholesale?brandValueIds=203476203&amp;SearchText=polarline&amp;isCompetitiveProducts=y&amp;g=y"><img
                                                                src="./demo_files/Ha490e139c54042859e071daf2a824a63L.png"></a><a
                                                                href="https://aliexpress.ru/w/wholesale-xiaomi.html?d=y&amp;CatId=202000020&amp;SearchText=xiaomi&amp;ltype=wholesale&amp;SortType=default&amp;isTmall=y&amp;isrefine=y&amp;page=1"><img
                                                                src="./demo_files/H1f78cde50b0241e59b53ea7d80d24ad36.png"></a><a
                                                                href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200227004957&amp;SearchText=telefunken"><img
                                                                src="./demo_files/H670987c2493d4daaba543e7c08eab65dU.png"></a><a
                                                                href="https://aliexpress.ru/w/wholesale-apple.html?d=y&amp;CatId=202000020&amp;SearchText=apple&amp;ltype=wholesale&amp;SortType=default&amp;g=y&amp;page=1&amp;isTmall=y&amp;brandValueIds=3426%2C105790%2C200702996&amp;isrefine=y"><img
                                                                src="./demo_files/Hf63b0a6ae9b64f8f91959d8d48210dacg.png"></a><a
                                                                href="https://aliexpress.ru/wholesale?catId=202000020&amp;brandValueIds=200026969"><img
                                                                src="./demo_files/HTB1AMhnjyMnBKNjSZFzq6A_qVXaH.jpg"></a><a
                                                                href="https://aliexpress.ru/wholesale?CatId=202000020&amp;SearchText=Samsung&amp;ltype=wholesale&amp;SortType=default&amp;g=y&amp;isTmall=y&amp;isrefine=y&amp;page=1"><img
                                                                src="./demo_files/HTB1kXgqOFXXXXb9apXXq6xXFXXXE.jpg"></a><a
                                                                href="https://aliexpress.ru/wholesale?catId=202000020&amp;brandValueIds=361795"><img
                                                                src="./demo_files/HTB1HAkxzVmWBuNjSspdq6zugXXaM.jpg"></a><a
                                                                href="https://aliexpress.ru/wholesale?SearchText=Hisense&amp;ltype=wholesale&amp;SortType=default&amp;isTmall=y&amp;CatId=0&amp;page=1"><img
                                                                src="./demo_files/HTB1Frbqd7voK1RjSZFwq6AiCFXab.jpg"></a><a
                                                                href="https://aliexpress.ru/wholesale?d=y&amp;CatId=0&amp;SearchText=KIVI&amp;ltype=wholesale&amp;SortType=default&amp;page=1&amp;isTmall=y&amp;brandValueIds=203544291&amp;isrefine=y"><img
                                                                src="./demo_files/Ha9c5006093404b77b6dab82deea06400E.png"></a><a
                                                                href="https://aliexpress.ru/wholesale?catId=202000020&amp;brandValueIds=201467533&amp;SearchText=PlayStation&amp;g=y"><img
                                                                src="./demo_files/H3a6bb36e8b494e4d869eb4b16766e097L.jpg"></a><a
                                                                href="https://aliexpress.ru/wholesale?catId=202000020&amp;brandValueIds=200518871&amp;SearchText=XBOX&amp;g=y"><img
                                                                src="./demo_files/H7c2870cce286433196380a02e6549efcS.jpg"></a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ams-region-end 881-->

                                    </dd>
                                </dl>
                                <!--ams-region-end 881--><!--ams-region-start 885-->
                                <dl class="cl-item cl-item-homeImprovement" data-role="first-menu" data-spm="113">
                                    <dt class="cate-name"><span><a
                                            href="https://aliexpress.ru/category/202000005/home-appliances.html"> Бытовая техника </a></span>
                                    </dt>
                                    <dd class="sub-cate" data-path="c-homeimprovement-content-ru"
                                        data-role="first-menu-main">
                                        <!--ams-region-start 885-->
                                        <style type="text/css">.sub-cate-items dt a {
                                            max-width: 100%;
                                        }
                                        </style>
                                        <div class="cl-item cl-item-homeImprovement" data-role="first-menu"
                                             data-spm="113">
                                            <div class="sub-cate-main">
                                                <div class="sub-cate-content" style="display:inline-block">
                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/w/wholesale-coffee.html?seoChannel=wholesale&amp;trafficChannel=seo&amp;d=y&amp;CatId=202000005&amp;SearchText=coffee&amp;ltype=wholesale&amp;g=y&amp;SortType=total_tranpro_desc&amp;groupsort=1&amp;page=1&amp;isrefine=y">Приготовление
                                                                    напитков</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202061601/coffee-machines.html?SortType=total_tranpro_desc&amp;g=y">Автоматические
                                                                    кофемашины</a><a
                                                                    href="https://aliexpress.ru/category/202000095/coffee-makers.html?SortType=total_tranpro_desc&amp;g=y">Кофеварки</a><a
                                                                    href="https://aliexpress.ru/category/202062465/capsule-coffee-machine.html?SortType=total_tranpro_desc">Капсульные
                                                                кофемашины</a><a
                                                                    href="https://aliexpress.ru/category/202001763/electric-coffee-grinders.html?SortType=total_tranpro_desc&amp;g=y">Кофемолки</a><a
                                                                    href="https://aliexpress.ru/category/202061861/milk-frothers.html?SortType=total_tranpro_desc">Капучинаторы</a><a
                                                                    href="https://aliexpress.ru/category/202000097/electric-kettles.html?SortType=total_tranpro_desc&amp;g=y">Электрические
                                                                чайники</a><a
                                                                    href="https://aliexpress.ru/category/202000078/juicers.html?SortType=total_tranpro_desc&amp;g=y">Соковыжималки</a><a
                                                                    href="https://aliexpress.ru/category/202001522/electric-air-pots.html?SortType=total_tranpro_desc&amp;g=y">Термопоты</a>
                                                            </dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/wholesale?trafficChannel=main&amp;d=y&amp;CatId=0&amp;SearchText=food+processor&amp;ltype=wholesale&amp;g=y&amp;SortType=total_tranpro_desc&amp;groupsort=1&amp;page=1">Измельчение
                                                                    продуктов</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202000545/blenders.html?SortType=total_tranpro_desc&amp;g=y">Блендеры</a><a
                                                                    href="https://aliexpress.ru/category/202000546/food-processors.html?SortType=total_tranpro_desc&amp;g=y">Кухонные
                                                                комбайны</a><a
                                                                    href="https://aliexpress.ru/category/202000557/meat-grinders.html?SortType=total_tranpro_desc&amp;g=y">Мясорубки</a><a
                                                                    href="https://aliexpress.ru/category/202000079/food-mixers.html?SortType=total_tranpro_desc&amp;g=y">Миксеры</a><a
                                                                    href="https://aliexpress.ru/category/202001523/food-waste-disposers.html?g=y&amp;SortType=total_tranpro_desc">Измельчители
                                                                отходов</a></dd>
                                                        </dl>
                                                    </div>

                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202001511/cooking-appliances.html?trafficChannel=main&amp;catName=cooking-appliances&amp;CatId=202001511&amp;ltype=wholesale&amp;g=y&amp;SortType=total_tranpro_desc&amp;groupsort=1&amp;isrefine=y&amp;page=1">Приготовление
                                                                    блюд</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202000073/microwave-ovens.html?SortType=total_tranpro_desc&amp;g=y">Микроволновые
                                                                    печи</a><a
                                                                    href="https://aliexpress.ru/category/202001530/electric-grills-electric-griddles.html?SortType=total_tranpro_desc&amp;g=y">Электрические
                                                                грили</a><a
                                                                    href="https://aliexpress.ru/wholesale?trafficChannel=main&amp;d=y&amp;CatId=0&amp;SearchText=multicooker&amp;ltype=wholesale&amp;g=y&amp;SortType=total_tranpro_desc&amp;groupsort=1&amp;page=1">Мультиварки</a><a
                                                                    href="https://aliexpress.ru/category/202000548/induction-cookers.html?SortType=total_tranpro_desc&amp;g=y">Индукционные
                                                                плиты</a><a
                                                                    href="https://aliexpress.ru/category/202000549/bread-makers.html?SortType=total_tranpro_desc&amp;g=y">Хлебопечки</a><a
                                                                    href="https://aliexpress.ru/category/202001537/vacuum-food-sealers.html?SortType=total_tranpro_desc&amp;g=y">Вакуумные
                                                                упаковщики</a><a
                                                                    href="https://aliexpress.ru/category/202001531/waffle-makers.html?SortType=total_tranpro_desc&amp;g=y">Вафельницы
                                                                и мультипекари</a><a
                                                                    href="https://aliexpress.ru/category/202000096/toasters.html?SortType=total_tranpro_desc&amp;g=y">Тостеры</a>
                                                            </dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202061484/major-appliances.html?trafficChannel=main&amp;catName=major-appliances&amp;CatId=202061484&amp;ltype=wholesale&amp;SortType=total_tranpro_desc&amp;groupsort=1&amp;page=1&amp;isTmall=y&amp;isrefine=y">Крупная
                                                                    бытовая техника</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202000071/washing-machines.html?trafficChannel=main&amp;catName=washing-machines&amp;CatId=202000071&amp;ltype=wholesale&amp;isTmall=y&amp;page=1&amp;g=y&amp;SortType=total_tranpro_desc">Стиральные
                                                                    машины</a><a
                                                                    href="https://aliexpress.ru/category/202000526/refrigerators.html?trafficChannel=main&amp;catName=refrigerators&amp;CatId=202000526&amp;ltype=wholesale&amp;g=y&amp;SortType=total_tranpro_desc&amp;isTmall=y&amp;page=1&amp;isrefine=y">Холодильники</a><a
                                                                    href="https://aliexpress.ru/category/202062458/bulit-in-induction-cookers.html?SortType=total_tranpro_desc&amp;g=y">Варочные
                                                                панели</a><a
                                                                    href="https://aliexpress.ru/category/202000098/range-hoods.html?SortType=total_tranpro_desc&amp;g=y">Вытяжки</a><a
                                                                    href="https://aliexpress.ru/category/202062464/bulit-in-ovens.html?SortType=total_tranpro_desc&amp;g=y">Духовые
                                                                шкафы</a><a
                                                                    href="https://aliexpress.ru/category/202000082/dish-washers.html?trafficChannel=main&amp;catName=dish-washers&amp;CatId=202000082&amp;ltype=wholesale&amp;SortType=total_tranpro_desc&amp;g=y&amp;page=1&amp;isTmall=y&amp;isrefine=y">Посудомоечные
                                                                машины</a><a
                                                                    href="https://aliexpress.ru/category/202000070/air-conditioners.html?SortType=total_tranpro_desc&amp;g=y">Кондиционеры</a><a
                                                                    href="https://aliexpress.ru/category/202001525/ranges.html?trafficChannel=main&amp;catName=ranges&amp;CatId=202001525&amp;ltype=wholesale&amp;g=y&amp;SortType=total_tranpro_desc&amp;groupsort=1&amp;page=1&amp;pvid=251-351803&amp;isrefine=y">Плиты</a><a
                                                                    href="https://aliexpress.ru/category/202001543/water-heaters.html?SortType=total_tranpro_desc&amp;g=y">Водонагреватели</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <ul class="clearfix bottom-show-list">
                                                        <li>
                                                            <a href="https://tmall.ru/ru/__pc/pages/krupnaya_bytovaya_tehnika.htm"><span
                                                                    class="activity-name">Крупная техника </span> <span
                                                                    class="activity-pic"><img
                                                                    src="./demo_files/Ha170075980de41e3a4f4a26e29a1ae6aQ.png_140x140.png_.webp"></span>
                                                            </a></li>
                                                    </ul>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/category/202058174/household-appliances.html?trafficChannel=main&amp;catName=household-appliances&amp;CatId=202058174&amp;ltype=wholesale&amp;g=y&amp;page=1&amp;SortType=default&amp;isrefine=y">Техника
                                                                для дома</a></dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202000075/vacuum-cleaners.html?SortType=total_tranpro_desc&amp;g=y">Пылесосы</a><a
                                                                href="https://aliexpress.ru/category/202000088/humidifiers.html?SortType=total_tranpro_desc&amp;g=y">Увлажнители
                                                            воздуха</a><a
                                                                href="https://aliexpress.ru/category/202000076/electric-irons.html?SortType=total_tranpro_desc&amp;g=y">Утюги
                                                            и парогенераторы</a><a
                                                                href="https://aliexpress.ru/category/202000561/garment-steamers.html?SortType=total_tranpro_desc&amp;g=y">Отпариватели</a><a
                                                                href="https://aliexpress.ru/category/202000084/fans.html?SortType=total_tranpro_desc&amp;g=y">Вентиляторы</a><a
                                                                href="https://aliexpress.ru/category/202000099/steam-cleaners.html?SortType=total_tranpro_desc&amp;g=y">Пароочистители</a><a
                                                                href="https://aliexpress.ru/category/202001544/electric-heaters.html?SortType=total_tranpro_desc&amp;g=y">Обогреватели</a><a
                                                                href="https://aliexpress.ru/category/202061970/electric-floor-mops.html?SortType=total_tranpro_desc&amp;g=y">Паровые
                                                            швабры</a></dd>
                                                    </dl>
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/category/202058162/personal-care-appliances.html?trafficChannel=main&amp;catName=personal-care-appliances&amp;CatId=202058162&amp;ltype=wholesale&amp;g=y&amp;SortType=total_tranpro_desc&amp;groupsort=1&amp;isrefine=y&amp;page=1">Техника
                                                                для красоты</a></dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202061813/hair-clippers.html?SortType=total_tranpro_desc&amp;g=y">Машинки
                                                                для стрижки волос</a><a
                                                                href="https://aliexpress.ru/category/202004454/hair-trimmers.html?SortType=total_tranpro_desc&amp;g=y">Триммеры</a><a
                                                                href="https://aliexpress.ru/category/202000329/electric-shavers.html?SortType=total_tranpro_desc&amp;g=y">Электробритвы</a><a
                                                                href="https://aliexpress.ru/category/202061858/electric-toothbrushes.html?SortType=total_tranpro_desc&amp;g=y">Зубные
                                                            щетки</a><a
                                                                href="https://aliexpress.ru/category/202004451/hair-dryers.html?g=y&amp;SortType=total_tranpro_desc">Фены
                                                            для волос</a><a
                                                                href="https://aliexpress.ru/category/202061473/oral-irrigators.html?SortType=total_tranpro_desc&amp;g=y">Ирригаторы</a><a
                                                                href="https://aliexpress.ru/category/202001493/epilators.html?SortType=total_tranpro_desc&amp;g=y">Эпиляторы</a><a
                                                                href="https://aliexpress.ru/category/205848502/straightening-irons.html?SortType=total_tranpro_desc&amp;g=y">Выпрямители
                                                            для волос</a><a
                                                                href="https://aliexpress.ru/category/205848402/curling-irons.html?SortType=total_tranpro_desc&amp;g=y">Электрощипцы
                                                            и плойки</a></dd>
                                                    </dl>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items hidden-md hidden-sm" data-role="two-menu">
                                                        <dd class="mall-brands-list"><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=200053630,202252824"><img
                                                                src="./demo_files/HTB1.kykAmBYBeNjy0Feq6znmFXae.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=201444630"><img
                                                                src="./demo_files/Hfccafe8ee6bb42e8b9b4547b9510bf66x.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=1908914771,201441358"><img
                                                                src="./demo_files/Hb17af6fcf7f2461cb99d755062680148Z.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=200023364,203575633"><img
                                                                src="./demo_files/H346c6c7a2faa4c05808ec09e040ae5bcx.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=7472"><img
                                                                src="./demo_files/Hf71d4eeff84c4138b764fb7558f517d2m.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=361795"><img
                                                                src="./demo_files/Hf7d1e6def3e748b18f81e5b7e762243bk.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=201447678"><img
                                                                src="./demo_files/H726ab4284cc2472392a1b23df9a7a008u.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=100007876"><img
                                                                src="./demo_files/Hefb02d1d74e9436286cfd84e06c2e326I.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=201902817,201459379"><img
                                                                src="./demo_files/UT8TYslX6NXXXcUQpbXM.png"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=202421806"><img
                                                                src="./demo_files/Hdc8af6896bb6478b9e94671db8a7b249W.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=201490262"><img
                                                                src="./demo_files/HTB1zPHzBNuTBuNkHFNRq6A9qpXaI.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=234222604"><img
                                                                src="./demo_files/H388e6c31c886452399e7e9d17a493671Z.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=201441373"><img
                                                                src="./demo_files/H3bd187571ad34578acc5e39ea255a2b2E.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=201479872,201447678"><img
                                                                src="./demo_files/HTB1yjQBzVmWBuNjSspdq6zugXXaP.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=200020294"><img
                                                                src="./demo_files/HTB1vldaXiDxK1RjSsphq6zHrpXa8.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=202775821,203537101"><img
                                                                src="./demo_files/H1f62a9a9c1a64323babe393d54dfeb47s.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=200658765"><img
                                                                src="./demo_files/HTB1NVh9AeySBuNjy1zdq6xPxFXaB.jpg"></a><a
                                                                href="https://aliexpress.ru/category/202000005/home-appliances.html?SortType=total_tranpro_desc&amp;g=y&amp;brandValueIds=203598058,200016639,48837114"><img
                                                                src="./demo_files/Ha842f11daa1140959409c10c7768c9a4L.jpg"></a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ams-region-end 885-->

                                    </dd>
                                </dl>
                                <!--ams-region-end 885--><!--ams-region-start 871-->
                                <dl class="cl-item cl-item-women" data-role="first-menu" data-spm="101">
                                    <dt class="cate-name"><span><a
                                            href="https://aliexpress.ru/category/202001900/women-clothing-accessories.html"> Одежда для женщин </a></span>
                                    </dt>
                                    <dd class="sub-cate" data-path="c-women-content-ru" data-role="first-menu-main">
                                        <!--ams-region-start 871-->
                                        <style type="text/css">.sub-cate-items dt a {
                                            max-width: 100%;
                                        }
                                        </style>
                                        <div class="cl-item cl-item-women" data-role="first-menu" data-spm="101">
                                            <div class="sub-cate-main">
                                                <div class="sub-cate-content" style="display:inline-block">
                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202001900/women-clothing.html">КАТЕГОРИИ</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202003912/blouses-shirts.html">Блузки
                                                                    и рубашки</a><a
                                                                    href="https://aliexpress.ru/category/202001905/pants-capris.html">Брюки</a><a
                                                                    href="https://aliexpress.ru/category/202003449/sweaters.html">Джемперы
                                                                и кардиганы</a><a
                                                                    href="https://aliexpress.ru/category/205873302/jeans.html">Джинсы</a><a
                                                                    href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=AS_20200220011827&amp;SearchText=%D0%B4%D0%BE%D0%BC%D0%B0%D1%88%D0%BD%D1%8F%D1%8F+%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0+%D0%B4%D0%BB%D1%8F+%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD">Домашняя
                                                                одежда</a><a
                                                                    href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=AS_20200220012229&amp;SearchText=%D0%96%D0%B0%D0%BA%D0%B5%D1%82%D1%8B+%D0%B8+%D0%BF%D0%B8%D0%B4%D0%B6%D0%B0%D0%BA%D0%B8+%D0%BA%D0%BE%D1%81%D1%82%D1%8E%D0%BC%D0%BD%D1%8B%D0%B5+%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B8%D0%B5">Жакеты
                                                                и пиджаки</a><a
                                                                    href="https://aliexpress.ru/category/202001903/vests-waistcoats.html">Жилеты</a><a
                                                                    href="https://aliexpress.ru/category/202003589/jumpsuits.html">Комбинезоны</a><a
                                                                    href="https://aliexpress.ru/category/202003448/suits-sets.html">Костюмы</a><a
                                                                    href="https://aliexpress.ru/category/205776618/underwear-sleepwears.html?&amp;SearchText=%D0%BD%D0%B8%D0%B6%D0%BD%D0%B5%D0%B5+%D0%B1%D0%B5%D0%BB%D1%8C%D0%B5+%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%BE%D0%B5">Нижнее
                                                                белье</a><a
                                                                    href="https://aliexpress.ru/category/202003447/women-socks-hosiery.html">Носки,
                                                                чулки и колготки</a><a
                                                                    href="https://aliexpress.ru/category/205871801/dress.html">Платья</a><a
                                                                    href="https://aliexpress.ru/category/202001904/hoodies-sweatshirts.html">Толстовки
                                                                и свитшоты</a><a
                                                                    href="https://aliexpress.ru/category/202003451/tops-tees.html">Футболки
                                                                и топы</a><a
                                                                    href="https://aliexpress.ru/category/202001909/shorts.html">Шорты</a><a
                                                                    href="https://aliexpress.ru/category/202002388/skirts.html">Юбки</a>
                                                            </dd>
                                                        </dl>
                                                    </div>

                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202003444/jackets-coats.html">ВЕРХНЯЯ
                                                                    ОДЕЖДА</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200221000726&amp;SearchText=%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B8%D0%B5+%D0%B4%D0%B6%D0%B8%D0%BD%D1%81%D0%BE%D0%B2%D1%8B%D0%B5+%D0%BA%D1%83%D1%80%D1%82%D0%BA%D0%B8">Джинсовые
                                                                    куртки</a><a
                                                                    href="https://aliexpress.ru/category/202005128/leather-jackets.html">Кожаные
                                                                куртки</a><a
                                                                    href="https://aliexpress.ru/category/202003530/jackets.html">Куртки</a><a
                                                                    href="https://aliexpress.ru/category/202005130/wool-blends.html">Пальто</a><a
                                                                    href="https://aliexpress.ru/category/202005126/parkas.html">Парки</a><a
                                                                    href="https://aliexpress.ru/category/202005129/trench.html">Плащи
                                                                и тренчи</a><a
                                                                    href="https://aliexpress.ru/category/202060221/down-coats.html">Пуховики
                                                                и зимние куртки</a></dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202003420/women-accessories.html">АКСЕССУАРЫ</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202004146/women-hair-accessories.html">Аксессуары
                                                                    для волос</a><a
                                                                    href="https://aliexpress.ru/category/202003439/women-hats.html">Головные
                                                                уборы</a><a
                                                                    href="https://aliexpress.ru/category/202003424/women-glasses.html">Очки</a><a
                                                                    href="https://aliexpress.ru/category/202003423/women-gloves.html">Перчатки
                                                                и руковицы</a><a
                                                                    href="https://aliexpress.ru/category/202005122/women-belts.html">Ремни</a><a
                                                                    href="https://aliexpress.ru/category/202003426/women-scarves.html">Шарфы</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <ul class="clearfix bottom-show-list">
                                                        <li>
                                                            <a href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=AS_20200424035319&amp;SearchText=%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0+%D0%B1%D0%BE%D0%BB%D1%8C%D1%88%D0%BE%D0%B3%D0%BE+%D1%80%D0%B0%D0%B7%D0%BC%D0%B5%D1%80%D0%B0"><span
                                                                    class="activity-name">Большие размеры</span> <span
                                                                    class="activity-pic"><img
                                                                    src="./demo_files/H6b0d670e8ad943fc9a7314dd98c0715ed.jpg_140x140.jpg_.webp"></span>
                                                            </a></li>
                                                        <li class="hidden-sm"><a
                                                                href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200221004134&amp;SearchText=%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B8%D0%B5+%D0%BA%D1%83%D0%BF%D0%B0%D0%BB%D1%8C%D0%BD%D0%B8%D0%BA%D0%B8+%D0%B8+%D0%BF%D0%BB%D1%8F%D0%B6%D0%BD%D0%B0%D1%8F+%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0"><span
                                                                class="activity-name">Купальники и пляжная одежда</span>
                                                            <span class="activity-pic"><img
                                                                    src="./demo_files/H510940ec86f943358cceace5777a16cbc.jpg_140x140.jpg_.webp"></span>
                                                        </a></li>
                                                    </ul>
                                                </div>
                                                <!--<div class="sub-cate-row sub-cate-row-mall">-->

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/category/202001900/women-clothing.html?trafficChannel=main&amp;catName=women-clothing&amp;CatId=202001900&amp;ltype=wholesale&amp;SortType=default&amp;spid=201484040&amp;page=1">БЫСТРАЯ
                                                                ДОСТАВКА</a></dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202001905/pants-capris.html?trafficChannel=main&amp;catName=pants-capris&amp;CatId=202001905&amp;ltype=wholesale&amp;SortType=default&amp;spid=201484040&amp;page=1">Брюки</a><a
                                                                href="https://aliexpress.ru/category/202003444/jackets-coats.html?trafficChannel=main&amp;catName=jackets-coats&amp;CatId=202003444&amp;ltype=wholesale&amp;SortType=default&amp;spid=201484040&amp;page=1">Верхняя
                                                            одежда </a><a
                                                                href="https://aliexpress.ru/category/205873302/jeans.html?trafficChannel=main&amp;catName=jeans&amp;CatId=205873302&amp;ltype=wholesale&amp;SortType=default&amp;spid=201484040&amp;page=1">Джинсы</a><a
                                                                href="https://aliexpress.ru/category/202005148/dresses.html?trafficChannel=main&amp;catName=dresses&amp;CatId=202005148&amp;ltype=wholesale&amp;SortType=default&amp;spid=201484040&amp;page=1">Платья</a><a
                                                                href="https://aliexpress.ru/category/202001904/hoodies-sweatshirts.html?trafficChannel=main&amp;catName=hoodies-sweatshirts&amp;CatId=202001904&amp;ltype=wholesale&amp;SortType=default&amp;spid=201484040&amp;page=1">Толстовки
                                                            и свитшоты</a><a
                                                                href="https://aliexpress.ru/store/all-wholesale-products/5079550.html">Нижнее
                                                            белье</a><a
                                                                href="https://aliexpress.ru/category/202003451/tops-tees.html?trafficChannel=main&amp;catName=tops-tees&amp;CatId=202003451&amp;ltype=wholesale&amp;SortType=default&amp;spid=201484040&amp;page=1">Футболки
                                                            и топы</a></dd>
                                                    </dl>
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200220074054&amp;SearchText=%D1%82%D1%80%D0%B5%D0%BD%D0%B4%D0%BE%D0%B2%D0%B0%D1%8F+%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0">ТРЕНДЫ</a>
                                                        </dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202001900/women-clothing.html?trafficChannel=main&amp;catName=women-clothing&amp;CatId=202001900&amp;ltype=wholesale&amp;SortType=create_desc&amp;groupsort=1&amp;page=1">Новинки</a><a
                                                                href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200220073738&amp;SearchText=%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0+%D1%86%D0%B2%D0%B5%D1%82%D0%BE%D1%87%D0%BD%D1%8B%D0%B9+%D0%BF%D1%80%D0%B8%D0%BD%D1%82">Цветочный
                                                            принт</a><a
                                                                href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200220072718&amp;SearchText=%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0+%D0%B2+%D0%B3%D0%BE%D1%80%D0%BE%D1%85">Горох</a><a
                                                                href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200220073334&amp;SearchText=%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0+%D0%B8%D0%B7+%D0%BA%D0%BE%D0%B6%D0%B8">ЭКО-кожа</a><a
                                                                href="https://aliexpress.ru/wholesale?catId=0&amp;initiative_id=SB_20200220073515&amp;SearchText=%D0%BF%D0%BB%D0%B0%D1%82%D1%8C%D1%8F+%D0%B4%D0%BB%D1%8F+%D0%B2%D0%B5%D1%87%D0%B5%D1%80%D0%B8%D0%BD%D0%BE%D0%BA">Платья
                                                            для вечеринок</a></dd>
                                                    </dl>
                                                </div>
                                                <!--   <ul class="clearfix bottom-show-list">-->
                                               
                                                <!--            <a href="{{item.url}}">-->
                                                <!--                <span class="activity-name">{{item.title}}</span>-->
                                                <!--                <span class="activity-pic"><img data-src="{{item.imgUrl}}"></span>-->
                                                <!--            </a>--><!--        </li>--><!--</ul>-->
                                                <!--<div class="sub-cate-row sub-cate-row-mall">-->

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items hidden-md hidden-sm" data-role="two-menu">
                                                        <dd class="mall-brands-list"><a
                                                                href="https://finnflare.aliexpress.ru/store/5427066"><img
                                                                src="./demo_files/Ha972b1d48f6b4841873259a280c162b4G.jpg"></a><a
                                                                href="https://shein.aliexpress.ru/store/1159363"><img
                                                                src="./demo_files/Hf30d5df2ee884544ac60cf4d09a2c3e7K.jpg"></a><a
                                                                href="https://miegofce.aliexpress.ru/store/1846541"><img
                                                                src="./demo_files/H24f2ad68b7dc4289b15afd01d96ad59bM.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?site=rus&amp;CatId=202001900&amp;SearchText=icebear&amp;isCompetitiveProducts=y&amp;g=y&amp;isrefine=y"><img
                                                                src="./demo_files/H83c50152c17d4d4d872376ac028d781b7.jpg"></a><a
                                                                href="https://simplee.aliexpress.ru/store/1192351"><img
                                                                src="./demo_files/H97ded090a1b54016904cb2087eddbeaen.jpg"></a><a
                                                                href="https://only.aliexpress.ru/store/4248021"><img
                                                                src="./demo_files/Hf6fd6477cfa04711b893e97736511961v.jpg"></a><a
                                                                href="https://veromoda.aliexpress.ru/store/4272022"><img
                                                                src="./demo_files/H3a04a1bc12254204b0b1474860cace8eY.jpg"></a><a
                                                                href="https://astrid-frisky.aliexpress.ru/store/1454819"><img
                                                                src="./demo_files/H6deb7d99c10b472ab75399a1a73a7473A.jpg"></a><a
                                                                href="https://eam168.aliexpress.ru/store/1487249"><img
                                                                src="./demo_files/Hf21dfb40cef64456b0dc11540d6b4888E.jpg"></a><a
                                                                href="https://tangada.aliexpress.ru/store/103224"><img
                                                                src="./demo_files/H026c30e6c7894339b6845305e22741706.jpg"></a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ams-region-end 871-->

                                    </dd>
                                </dl>
                                <!--ams-region-end 871--><!--ams-region-start 872-->
                                <dl class="cl-item cl-item-men" data-role="first-menu" data-spm="102">
                                    <dt class="cate-name"><span><a
                                            href="https://aliexpress.ru/category/202001892/men-clothing-accessories.html"> Одежда для мужчин </a></span>
                                    </dt>
                                    <dd class="sub-cate" data-path="c-men-content-ru" data-role="first-menu-main">
                                        <!--ams-region-start 872-->
                                        <style type="text/css">.sub-cate-items dt a {
                                            max-width: 100%;
                                        }
                                        </style>
                                        <div class="cl-item cl-item-men" data-role="first-menu" data-spm="102">
                                            <div class="sub-cate-main">
                                                <div class="sub-cate-content" style="display:inline-block">
                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202001892/men-clothing-accessories.html">КАТЕГОРИИ</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202032005/pants.html">Брюки</a><a
                                                                    href="https://aliexpress.ru/category/202003404/sweaters.html">Джемперы,
                                                                свитеры и кардиганы</a><a
                                                                    href="https://aliexpress.ru/category/202001897/jeans.html">Джинсы</a><a
                                                                    href="https://aliexpress.ru/category/202003392/men-sleep-lounge.html">Домашняя
                                                                одежда</a><a
                                                                    href="https://aliexpress.ru/category/202001894/vests-waistcoats.html">Жилеты</a><a
                                                                    href="https://aliexpress.ru/category/202003410/men-underwear.html">Нижнее
                                                                белье</a><a
                                                                    href="https://aliexpress.ru/category/202005156/men-socks.html">Носки</a><a
                                                                    href="https://aliexpress.ru/category/202003398/suits-blazers.html">Пиджаки
                                                                и костюмы</a><a
                                                                    href="https://aliexpress.ru/category/202003411/board-shorts.html">Плавки
                                                                и шорты для плавания</a><a
                                                                    href="https://aliexpress.ru/category/202003388/shirts.html">Рубашки</a><a
                                                                    href="https://aliexpress.ru/category/202001895/hoodies-sweatshirts.html">Толстовки
                                                                и свитшоты</a><a
                                                                    href="https://aliexpress.ru/category/202001893/t-shirts.html">Футболки
                                                                и поло</a><a
                                                                    href="https://aliexpress.ru/category/202001898/casual-shorts.html">Шорты</a>
                                                            </dd>
                                                        </dl>
                                                    </div>

                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202003386/jackets-coats.html">ВЕРХНЯЯ
                                                                    ОДЕЖДА</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202003417/boxers.html">Джинсовые
                                                                    куртки</a><a
                                                                    href="https://aliexpress.ru/category/202060226/genuine-leather-coats.html">Кожаные
                                                                куртки</a><a
                                                                    href="https://aliexpress.ru/category/202003387/jackets.html">Куртки</a><a
                                                                    href="https://aliexpress.ru/category/202005162/wool-blends.html">Пальто</a><a
                                                                    href="https://aliexpress.ru/category/202032007/parkas.html">Парки</a><a
                                                                    href="https://aliexpress.ru/category/202005144/trench.html">Плащи</a><a
                                                                    href="https://aliexpress.ru/category/202005135/down-jackets.html">Пуховики</a>
                                                            </dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202003366/accessories.html">АКСЕССУАРЫ</a>
                                                            </dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202003368/men-ties-handkerchiefs.html">Галстуки
                                                                    и платки</a><a
                                                                    href="https://aliexpress.ru/category/202003377/men-hats.html">Головные
                                                                уборы</a><a
                                                                    href="https://aliexpress.ru/category/202003375/men-glasses.html">Очки</a><a
                                                                    href="https://aliexpress.ru/category/202003371/men-gloves.html">Перчатки
                                                                и рукавицы</a><a
                                                                    href="https://aliexpress.ru/category/202003385/suspenders.html">Подтяжки</a><a
                                                                    href="https://aliexpress.ru/category/202003367/men-belts.html">Ремни</a><a
                                                                    href="https://aliexpress.ru/category/202003373/men-scarves.html">Шарфы </a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <ul class="clearfix bottom-show-list">
                                                        <li>
                                                            <a href="https://aliexpress.ru/category/202003387/jackets.html"><span
                                                                    class="activity-name">Куртки</span> <span
                                                                    class="activity-pic"><img
                                                                    src="./demo_files/Hbfcb5b99bcb34a9abe2c83a520fecc03o.png_140x140.png_.webp"></span>
                                                            </a></li>
                                                        <li class="hidden-sm"><a
                                                                href="https://aliexpress.ru/category/202001895/hoodies-sweatshirts.html"><span
                                                                class="activity-name">Толстовки и свитшоты</span> <span
                                                                class="activity-pic"><img
                                                                src="./demo_files/H11142d49e3d84f43a9999531e3a5790ec.png_140x140.png_.webp"></span>
                                                        </a></li>
                                                    </ul>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://tmall.ru/category/202001892/category.html?SearchText=&amp;g=y&amp;pvId=">БЫСТРАЯ
                                                                ДОСТАВКА</a></dt>
                                                        <dd>
                                                            <a href="https://tmall.ru/category/202032005/category.html?SearchText=&amp;g=y&amp;pvId=">Брюки</a><a
                                                                href="https://tmall.ru/category/202003386/category.html?SearchText=&amp;g=y&amp;pvId=">Верхняя
                                                            одежда</a><a
                                                                href="https://tmall.ru/category/202003404/category.html?SearchText=&amp;g=y&amp;pvId=">Джемперы
                                                            и кардиганы</a><a
                                                                href="https://tmall.ru/category/202001897/category.html?SearchText=&amp;g=y&amp;pvId=">Джинсы</a><a
                                                                href="https://tmall.ru/category/202003392/category.html?SearchText=&amp;g=y&amp;pvId=">Домашняя
                                                            одежда</a><a
                                                                href="https://tmall.ru/category/202003410/category.html?SearchText=&amp;g=y&amp;pvId=">Нижнее
                                                            белье</a><a
                                                                href="https://tmall.ru/category/202005156/category.html?SearchText=&amp;g=y&amp;pvId=">Носки</a><a
                                                                href="https://tmall.ru/category/202001895/category.html?SearchText=&amp;g=y&amp;pvId=">Толстовки
                                                            и свитшоты</a><a
                                                                href="https://tmall.ru/category/202001893/category.html?SearchText=&amp;g=y&amp;pvId=">Футболки
                                                            и поло</a></dd>
                                                    </dl>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items hidden-md hidden-sm" data-role="two-menu">
                                                        <dd class="mall-brands-list"><a
                                                                href="https://finnflare.aliexpress.ru/store/5427066"><img
                                                                src="./demo_files/Ha972b1d48f6b4841873259a280c162b4G.jpg"></a><a
                                                                href="https://simwood.aliexpress.ru/store/1472219"><img
                                                                src="./demo_files/H2cc6bcb59d2a4e819d6982b42104fa4d2.png"></a><a
                                                                href="https://selected.aliexpress.ru/store/4235053"><img
                                                                src="./demo_files/Hec57c8dc6f38464da01ce5773b4ad0aey.jpg"></a><a
                                                                href="https://jackjones.aliexpress.ru/store/4215049"><img
                                                                src="./demo_files/Hcd5e577fc4204002808dc9ae8cdc970dU.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?catId=&amp;SearchText=Adidas&amp;g=y"><img
                                                                src="./demo_files/UTB8U_KgpFfFXKJk43Otq6xIPFXaq.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?catId=&amp;SearchText=Reebok&amp;g=y"><img
                                                                src="./demo_files/UTB8cEmOoU_4iuJk43Fqq6z.FpXaI.jpg"></a><a
                                                                href="https://tmall.ru/category/202001892/men-clothing-accessories.html?brandValueIds=201563850&amp;needQuery=n&amp;isCompetitiveProducts=y&amp;g=y"><img
                                                                src="./demo_files/UTB8U3yYd9bIXKJkSaefq6yasXXar.jpg"></a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ams-region-end 872-->

                                    </dd>
                                </dl>
                                <!--ams-region-end 872--><!--ams-region-start 873-->
                                <dl class="cl-item cl-item-toys" data-role="first-menu" data-spm="109">
                                    <dt class="cate-name"><span><a
                                            href="https://aliexpress.ru/category/202000215/mother-kids.html"> Всё для детей </a></span>
                                    </dt>
                                    <dd class="sub-cate" data-path="c-toysbaby-content-ru" data-role="first-menu-main">
                                        <!--ams-region-start 873-->
                                        <style type="text/css">.sub-cate-items dt a {
                                            max-width: 100%;
                                        }
                                        </style>
                                        <div class="cl-item cl-item-toys" data-role="first-menu" data-spm="103">
                                            <div class="sub-cate-main">
                                                <div class="sub-cate-content" style="display:inline-block">
                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202000215/mother-kids.html">Для
                                                                    самых маленьких</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202060591/disposable-diapers.html">Подгузники</a><a
                                                                    href="https://aliexpress.ru/category/202003325/baby-boys-clothing.html">Мальчикам</a><a
                                                                    href="https://aliexpress.ru/category/202003351/girls-baby-clothing.html">Девочкам</a><a
                                                                    href="https://aliexpress.ru/category/202003352/accessories.html">Аксессуары</a>
                                                            </dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202001910/boys-clothing.html">Одежда
                                                                    для мальчиков</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202001911/t-shirts.html">Футболки</a><a
                                                                    href="https://aliexpress.ru/category/202001919/clothing-sets.html">Комплекты
                                                                одежды</a><a
                                                                    href="https://aliexpress.ru/category/202001914/hoodies-sweatshirts.html">Толстовки
                                                                и кофты</a><a
                                                                    href="https://aliexpress.ru/category/202001915/pants.html">Брюки
                                                                и штаны</a><a
                                                                    href="https://aliexpress.ru/category/202004210/boys.html">Обувь</a>
                                                            </dd>
                                                        </dl>
                                                    </div>

                                                    <div class="sub-cate-row">
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202000013/toys-hobbies.html">Игрушки
                                                                    и хобби</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202004594/remote-control-toys.html">Радиоуправляемые
                                                                    модели</a><a
                                                                    href="https://aliexpress.ru/category/202005019/dolls-stuffed-toys.html">Мягкие
                                                                игрушки</a><a
                                                                    href="https://aliexpress.ru/category/202000305/action-toy-figures.html">Игрушечные
                                                                фигурки</a><a
                                                                    href="https://aliexpress.ru/category/202004589/model-building.html">Конструкторы</a>
                                                            </dd>
                                                        </dl>
                                                        <dl class="sub-cate-items" data-role="two-menu">
                                                            <dt>
                                                                <a href="https://aliexpress.ru/category/202001922/girls-clothing.html">Одежда
                                                                    для девочек</a></dt>
                                                            <dd>
                                                                <a href="https://aliexpress.ru/category/202002383/dresses.html">Платья</a><a
                                                                    href="https://aliexpress.ru/category/202001929/clothing-sets.html">Комплекты
                                                                одежды</a><a
                                                                    href="https://aliexpress.ru/category/202003497/tops-tees.html">Топы
                                                                и футболки</a><a
                                                                    href="https://aliexpress.ru/category/202004213/girls.html?site=rus&amp;g=y&amp;needQuery=n&amp;isrefine=y">Обувь</a><a
                                                                    href="https://aliexpress.ru/category/202003490/accessories.html">Аксессуары</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <ul class="clearfix bottom-show-list">
                                                        <li>
                                                            <a href="https://tmall.ru/category/202000302/dolls.html"><span
                                                                    class="activity-name">Куклы.  Доставка от 2 дн</span>
                                                                <span class="activity-pic"><img
                                                                        src="./demo_files/HTB1jlApa.rrK1RkSne1763rVVXaJ.png_140x140.png_.webp"></span>
                                                            </a></li>
                                                        <li class="hidden-sm"><a
                                                                href="https://aliexpress.ru/category/202001088/school-bags.html"><span
                                                                class="activity-name">Школьные рюкзаки</span> <span
                                                                class="activity-pic"><img
                                                                src="./demo_files/UTB8nXzIXL2JXKJkSanrq6y3lVXah.jpg_140x140.jpg_.webp"></span>
                                                        </a></li>
                                                    </ul>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://sale.aliexpress.ru/ru/mall_kids.htm?tracelog=kids.nav.links">Tmall
                                                                | Доставка из России</a></dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202061413/car-seats-accessories.html?trafficChannel=main&amp;catName=car-seats-accessories&amp;CatId=202061413&amp;ltype=wholesale&amp;SortType=default&amp;isTmall=y&amp;page=1">Детские
                                                                автокресла</a><a
                                                                href="https://tmall.ru/wholesale?spm=a2g0r.8955498.tmallpcmenufromcommon.10.68c17d4fpbFprj&amp;catId=202061437&amp;SearchText=&amp;g=y">Коляски</a><a
                                                                href="https://tmall.ru/wholesale?SortType=total_tranpro_desc&amp;site=rus&amp;g=y&amp;isrefine=y&amp;CatId=202004403&amp;SearchText=diaper&amp;isCompetitiveProducts=y">Подгузники</a><a
                                                                href="https://tmall.ru/category/202000013/tmall.html">Игрушки</a><a
                                                                href="https://tmall.ru/wholesale?catId=0&amp;initiative_id=AS_20190205004154&amp;SearchText=%D1%80%D0%B0%D0%B4%D0%B8%D0%BE%D0%BD%D1%8F%D0%BD%D1%8F">Радионяни</a><a
                                                                href="https://tmall.ru/category/202001922/category_tree.html">Одежда
                                                            для девочек</a><a
                                                                href="https://tmall.ru/category/202001910/category_tree.html">Одежда
                                                            для мальчиков</a><a
                                                                href="https://tmall.ru/wholesale?spm=a2g0r.8955498.tmall-banners-in-row.7.11ed7d4ffYrXm3&amp;SortType=total_tranpro_desc&amp;catId=0&amp;SearchText=%D0%B4%D0%B5%D1%82%D1%81%D0%BA%D0%B0%D1%8F%20%D0%BE%D0%B1%D1%83%D0%B2%D1%8C&amp;initiative_id=AS_20181204231244">Детская
                                                            обувь</a></dd>
                                                    </dl>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items hidden-md hidden-sm" data-role="two-menu">
                                                        <dd class="mall-brands-list"><a
                                                                href="https://tmall.ru/wholesale?catId=0&amp;initiative_id=AS_20170928130608&amp;SearchText=pampers"><img
                                                                src="./demo_files/UT8Yz.TXTlaXXagOFbXm.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?catId=0&amp;initiative_id=SB_20180823055457&amp;SearchText=huggies"><img
                                                                src="./demo_files/HTB1doU0mbZnBKNjSZFhq6A.oXXa0.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?catId=0&amp;initiative_id=SB_20190205011048&amp;SearchText=nerf"><img
                                                                src="./demo_files/HTB12GmhadjvK1RjSspiq6AEqXXaj.jpg"></a><a
                                                                href="https://auchan.aliexpress.ru/store/group/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B5-%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D1%8B/5230008_516085540.html"><img
                                                                src="./demo_files/H0ec2887a95984ded94786a877b3c35349.jpg"></a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ams-region-end 873-->

                                    </dd>
                                </dl>
                                <!--ams-region-end 873--><!--ams-region-start 878-->
                                <dl class="cl-item cl-item-jewelry" data-role="first-menu" data-spm="106">
                                    <dt class="cate-name"><span><a
                                            href="https://aliexpress.ru/category/202000219/jewelry-accessories.html"> Бижутерия </a> и <a
                                            href="https://aliexpress.ru/category/202000220/watches.html"> часы </a></span>
                                    </dt>
                                    <dd class="sub-cate" data-path="c-jewelry-content-ru" data-role="first-menu-main">
                                        <!--ams-region-start 878-->
                                        <div class="cl-item cl-item-jewelry" data-role="first-menu" data-spm="107">
                                            <div class="sub-cate-main">
                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/category/202000219/jewelry-accessories.html">Бижутерия</a>
                                                        </dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202048003/earrings.html">Серьги</a><a
                                                                href="https://aliexpress.ru/category/202048001/rings.html">Кольца</a><a
                                                                href="https://aliexpress.ru/category/202048005/pendants.html">Подвески</a><a
                                                                href="https://aliexpress.ru/category/202048007/necklaces.htm">Ожерелья</a><a
                                                                href="https://aliexpress.ru/category/202048010/bracelets-bangles.html">Браслеты</a><a
                                                                href="https://aliexpress.ru/category/202048002/bracelets-bangles.html">Шармы</a><a
                                                                href="https://aliexpress.ru/category/202048006/jewelry-sets.html">Ювелирные
                                                            комплекты</a><a
                                                                href="https://aliexpress.ru/category/202003036/wedding-engagement-jewelry.html">Обручальные
                                                            кольца</a><a
                                                                href="https://aliexpress.ru/category/202048008/fine-jewelry.html?&amp;SearchText=silver">Серебро </a>
                                                        </dd>
                                                    </dl>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt>
                                                            <a href="https://aliexpress.ru/category/202000220/watches.html">Часы</a>
                                                        </dt>
                                                        <dd>
                                                            <a href="https://aliexpress.ru/category/202058117/men-watches.html">Мужские
                                                                часы</a><a
                                                                href="https://aliexpress.ru/category/202058121/mechanical-watches.html">Механические
                                                            часы</a><a
                                                                href="https://aliexpress.ru/category/202058118/quartz-watches.html">Кварцевые
                                                            часы</a><a
                                                                href="https://aliexpress.ru/category/202058119/sports-watches.html">Спортивные
                                                            часы</a><a
                                                                href="https://aliexpress.ru/category/202058120/digital-watches.html">Цифровые
                                                            часы</a><a
                                                                href="https://aliexpress.ru/category/202058116/dual-display-watches.html">Часы
                                                            с двойным циферблатом</a><a
                                                                href="https://aliexpress.ru/category/202058113/women-watches.html">Женские
                                                            часы</a><a
                                                                href="https://aliexpress.ru/category/202058106/women-bracelet-watches.html">Часы-браслеты</a><a
                                                                href="https://aliexpress.ru/category/202058110/lover-watches.html">Парные
                                                            часы</a><a
                                                                href="https://aliexpress.ru/category/202058107/children-watches.html">Детские
                                                            часы</a><a
                                                                href="https://aliexpress.ru/category/202002986/watch-accessories.html">Аксессуары
                                                            для часов</a></dd>
                                                    </dl>
                                                </div>

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items" data-role="two-menu">
                                                        <dt><a href="https://tmall.ru/">Tmall | Доставка из России</a>
                                                        </dt>
                                                        <dd>
                                                            <a href="https://tmall.ru/wholesale?&amp;catId=202048003&amp;SearchText=earrings&amp;g=y">Серьги</a><a
                                                                href="https://tmall.ru/wholesale?&amp;catId=202048001&amp;SearchText=rings&amp;g=y">Кольца</a><a
                                                                href="https://tmall.ru/wholesale?&amp;catId=202048005&amp;SearchText=&amp;g=y">Подвески </a><a
                                                                href="https://tmall.ru/wholesale?&amp;catId=202048007&amp;SearchText=&amp;g=y">Колье
                                                            и цепочки</a><a
                                                                href="https://tmall.ru/wholesale?&amp;catId=202048010&amp;SearchText=&amp;g=y">Браслеты</a><a
                                                                href="https://tmall.ru/wholesale?&amp;catId=202048002&amp;SearchText=&amp;g=y">Шармы </a><a
                                                                href="https://tmall.ru/wholesale?&amp;catId=202048009&amp;SearchText=brooches&amp;g=y">Броши</a><a
                                                                href="https://tmall.ru/wholesale?&amp;catId=202048009&amp;SearchText=piercing&amp;g=y">Пирсинг</a><a
                                                                href="https://tmall.ru/wholesale?&amp;SortType=total_tranpro_desc&amp;catId=202048008&amp;SearchText=silver&amp;g=y">Серебро </a><a
                                                                href="https://tmall.ru/wholesale?&amp;SortType=total_tranpro_desc&amp;catId=202048008&amp;SearchText=gold&amp;g=y">Золото</a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <!--brand-->

                                                <div class="sub-cate-row">
                                                    <dl class="sub-cate-items hidden-md hidden-sm" data-role="two-menu">
                                                        <dd class="mall-brands-list"><a
                                                                href="https://tmall.ru/wholesale?SearchText=Slava&amp;brandValueIds=201713967&amp;g=y"><img
                                                                src="./demo_files/H04316df5aa4341deaa0651f15716c2b2Q.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?SearchText=Daniel+Wellington&amp;brandValueIds=201447661&amp;g=y"><img
                                                                src="./demo_files/Ha06d5f5fe84440f6a9aa943e780881c2o.jpeg"></a><a
                                                                href="https://tmall.ru/wholesale?SearchText=Casio&amp;brandValueIds=&amp;g=y"><img
                                                                src="./demo_files/He19dd14bd9994ea9a0337078c030f25ex.jpeg"></a><a
                                                                href="https://tmall.ru/wholesale?SearchText=EXCLAiM&amp;brandValueIds=202692990&amp;g=y"><img
                                                                src="./demo_files/Hde85cc75fa574a808b617d96ce7e3958C.jpeg"></a><a
                                                                href="https://tmall.ru/wholesale?SearchText=VALTERA&amp;brandValueIds=788614911&amp;g=y"><img
                                                                src="./demo_files/Ha1e78bc44a44498bacab5596d880da72U.jpg"></a><a
                                                                href="https://tmall.ru/wholesale?SearchText=PANDORA&amp;brandValueIds=1496929770&amp;g=y"><img
                                                                src="./demo_files/Hef1de0fd39ef42fc857d39b13973adcdy.jpeg"></a><a
                                                                href="https://tmall.ru/wholesale?SearchText=SOKOLOV&amp;brandValueIds=203633011&amp;g=y"><img
                                                                src="./demo_files/H5ed76f4b620746f291201512207711d3l.jpeg"></a><a
                                                                href="https://tmall.ru/wholesale?SearchText=SUNLIGHT&amp;brandValueIds=201469330&amp;g=y"><img
                                                                src="./demo_files/He4c01fea351f4c92ad7107a4039966c99.jpeg"></a>
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <!--brand over-->
                                                <ul class="clearfix bottom-show-list">
                                                    <li>
                                                        <a href="https://aliexpress.ru/category/202000219/jewelry.html?g=y&amp;isCompetitiveProducts=y&amp;shipCountry=ru"><span
                                                                class="activity-name">Украшения с гарантией</span> <span
                                                                class="activity-pic"><img
                                                                src="./demo_files/TB1VonwIpXXXXXyXFXXIpPTHFXX-60-60.jpg"></span>
                                                        </a></li>
                                                    <li class="hidden-sm"><a
                                                            href="https://aliexpress.ru/category/202000219/jewelry.html"><span
                                                            class="activity-name">Ювелирные изделия</span> <span
                                                            class="activity-pic"><img
                                                            src="./demo_files/TB1w4_WJXXXXXXVXFXXwu0bFXXX.png"></span>
                                                    </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--ams-region-end 878-->

                                    </dd>
                                </dl>

                                </div>
                            <div class="product-container" data-role="product-container"></div>
                        </div>
                        <!--ams-region-end 1242-->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


HTML
            ];




        $this->js = <<<JS

 var headerConfig = {
            locale: "ru_RU",
            site: "rus"
                    }
 var q = (window.goldlog_queue || (window.goldlog_queue = []));
        q.push({
            paramAction: 'goldlog.appendMetaInfo',
            'arguments': ['aplus-exdata', {
                UTABTest: 'aliabtest30916_32254'
            }]
        });
        q.push({
            paramAction: 'goldlog.appendMetaInfo',
            'arguments': ['aplus-cpvdata', {
                UTABTest: 'aliabtest30916_32254'
            }]
        });
JS;


    }
}







