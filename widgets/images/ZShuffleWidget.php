<?php

namespace zetsoft\widgets\images;

use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\helpers\ZFileHelper;
use zetsoft\system\helpers\ZInflector;
use zetsoft\system\helpers\ZStringHelper;
use function GuzzleHttp\Psr7\str;
use zetsoft\system\kernels\ZWidget;
use zetsoft\widgets\themes\ZCardWidget;
use kartik\widgets\Select2;
use yii\web\JsExpression;

class ZShuffleWidget extends ZWidget
{
    public $data = [
        9 => "d:/Develop/Projects/asrorz/zetsoft/exweb/eyuf/image/profile.png",
        10 => "d:/Develop/Projects/asrorz/zetsoft/exweb/eyuf/image/unblock.png",
        11 => "d:/Develop/Projects/asrorz/zetsoft/exweb/eyuf/image/unnamed.png"
    ];

    /**
     * Configuration
     */

    public $config = [];
 


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
        $this->fileCss('https://cdn.statically.io/gh/Vestride/Shuffle/acf85b9b/docs/css/material.css');

        $this->fileJs('https://cdn.statically.io/gh/Vestride/Shuffle/acf85b9b/docs/js/demos/homepage.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/shufflejs@5.2.3/dist/shuffle.min.js');

    }
     public function getData($data)
     {

         $item = '';

       if(is_string($data) === true) {
           $path = $data;
           $imagePath = Az::getAlias(Az::getAlias('@webroot') . $path);
           $data = ZFileHelper::findFiles($imagePath, [
               'only' => [
                   '*.jpg',
                   '*.png',
                   '*.gif'
               ]
           ]);
       }

         foreach ($data as $key => $val) {

             $listfile[bname($val)] = strtr($val, [
                 Az::getAlias('@webroot') => '',
                 '\\' => '/'
             ]);

         }

         foreach ($listfile as $key => $value) {
             $item .= <<<HTML
            <div class="slider-div"><img class="img-fluid" src="{$value}"></div>
            HTML;

         }


         return $item;
     }

    private function itemGen()
    {


        $data = $this->data;
    }

    public $layout = [];
    public $_layout = [
        'main' => <<<HTML
         
   
    <section id="demo">
        <div class="container">
            <div class="row">
                <div class="col-4@sm col-3@md">
                    <div class="filters-group">
                        <label for="filters-search-input" class="filter-label">Search</label>
                        <input class="textfield filter__search js-shuffle-search" type="search"
                               id="filters-search-input">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12@sm filters-group-wrap">
                    <div class="filters-group">
                        <p class="filter-label">Filter</p>
                        <div class="btn-group filter-options">
                            <button class="btn btn--primary" data-group="space">Space</button>
                            <button class="btn btn--primary" data-group="nature">Nature</button>
                            <button class="btn btn--primary" data-group="animal">Animal</button>
                            <button class="btn btn--primary active" data-group="city">City</button>
                        </div>
                    </div>
                    <fieldset class="filters-group">
                        <legend class="filter-label">Sort</legend>
                        <div class="btn-group sort-options">
                            <label class="btn active">
                                <input type="radio" name="sort-value" value="dom"> Default
                            </label>
                            <label class="btn">
                                <input type="radio" name="sort-value" value="title"> Title
                            </label>
                            <label class="btn">
                                <input type="radio" name="sort-value" value="date-created"> Date Created
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>

        </div>

        <div class="container">
            <div id="grid" class="row my-shuffle-container shuffle"
                 style="height: 488px; transition: height 250ms cubic-bezier(0.4, 0, 0.2, 1) 0s;">


                <figure class="col-3@xs col-4@sm col-3@md picture-item shuffle-item shuffle-item--hidden"
                        data-group="[&quot;nature&quot;]" data-date-created="2017-04-30" data-title="Lake Walchen"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity; transform: translate(0px, 0px) scale(0.001);"
                        aria-hidden="true">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1493585552824-131927c85da2"
                                     srcset="https://images.unsplash.com/photo-1493585552824-131927c85da2?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6ef0f8984525fc4500d43ffa53fe8190 1x, https://images.unsplash.com/photo-1493585552824-131927c85da2?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6ef0f8984525fc4500d43ffa53fe8190 2x"
                                     alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees">
                                <img class="picture-item__blur" src="./demo_files/photo-1493585552824-131927c85da2"
                                     srcset="https://images.unsplash.com/photo-1493585552824-131927c85da2?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6ef0f8984525fc4500d43ffa53fe8190 1x, https://images.unsplash.com/photo-1493585552824-131927c85da2?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6ef0f8984525fc4500d43ffa53fe8190 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/zshyCr6HGw0"
                                                                       target="_blank" rel="noopener">Lake Walchen</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">nature</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay shuffle-item shuffle-item--visible"
                        data-group="[&quot;city&quot;]" data-date-created="2016-07-01" data-title="Golden Gate Bridge"
                        style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transform: translate(0px, 0px) scale(1); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                    <div class="picture-item__inner">


                        <img src="./demo_files/photo-1467348733814-f93fc480bec6"
                             srcset="https://images.unsplash.com/photo-1467348733814-f93fc480bec6?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=2590c736835ec6555e952e19bb37f06e 1x, https://images.unsplash.com/photo-1467348733814-f93fc480bec6?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=2590c736835ec6555e952e19bb37f06e 2x"
                             alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below">
                        <img class="picture-item__blur" src="./demo_files/photo-1467348733814-f93fc480bec6"
                             srcset="https://images.unsplash.com/photo-1467348733814-f93fc480bec6?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=2590c736835ec6555e952e19bb37f06e 1x, https://images.unsplash.com/photo-1467348733814-f93fc480bec6?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=2590c736835ec6555e952e19bb37f06e 2x"
                             alt="" aria-hidden="true">

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/RRNbMiPmTZY"
                                                                       target="_blank" rel="noopener">Golden Gate
                                Bridge</a></figcaption>
                            <p class="picture-item__tags hidden@xs">city</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-3@xs col-4@sm col-3@md picture-item shuffle-item shuffle-item--hidden"
                        data-group="[&quot;animal&quot;]" data-date-created="2016-08-12" data-title="Crocodile"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transform: translate(0px, 0px) scale(0.001); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;"
                        aria-hidden="true">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1471005197911-88e9d4a7834d"
                                     srcset="https://images.unsplash.com/photo-1471005197911-88e9d4a7834d?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bd8b952c4c983d4bde5e2018c90c9124 1x, https://images.unsplash.com/photo-1471005197911-88e9d4a7834d?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bd8b952c4c983d4bde5e2018c90c9124 2x"
                                     alt="A close, profile view of a crocodile looking directly into the camera">
                                <img class="picture-item__blur" src="./demo_files/photo-1471005197911-88e9d4a7834d"
                                     srcset="https://images.unsplash.com/photo-1471005197911-88e9d4a7834d?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bd8b952c4c983d4bde5e2018c90c9124 1x, https://images.unsplash.com/photo-1471005197911-88e9d4a7834d?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bd8b952c4c983d4bde5e2018c90c9124 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/YOX8ZMTo7hk"
                                                                       target="_blank" rel="noopener">Crocodile</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">animal</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2 shuffle-item shuffle-item--hidden"
                        data-group="[&quot;space&quot;]" data-date-created="2016-03-07" data-title="SpaceX"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transform: translate(0px, 0px) scale(0.001); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;"
                        aria-hidden="true">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1457364559154-aa2644600ebb"
                                     srcset="https://images.unsplash.com/photo-1457364559154-aa2644600ebb?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=3d0e3e8d72fc5667fd9fbe354e80957b 1x, https://images.unsplash.com/photo-1457364559154-aa2644600ebb?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=3d0e3e8d72fc5667fd9fbe354e80957b 2x"
                                     alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station">
                                <img class="picture-item__blur" src="./demo_files/photo-1457364559154-aa2644600ebb"
                                     srcset="https://images.unsplash.com/photo-1457364559154-aa2644600ebb?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=3d0e3e8d72fc5667fd9fbe354e80957b 1x, https://images.unsplash.com/photo-1457364559154-aa2644600ebb?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=3d0e3e8d72fc5667fd9fbe354e80957b 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/GDdRP7U5ct0"
                                                                       target="_blank" rel="noopener">SpaceX</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">space</p>
                        </div>

                        <p class="picture-item__description">SpaceX launches a Falcon 9 rocket from Cape Canaveral Air
                            Force Station</p>

                    </div>
                </figure>


                <figure class="col-3@xs col-4@sm col-3@md picture-item shuffle-item shuffle-item--visible"
                        data-group="[&quot;city&quot;]" data-date-created="2016-06-09" data-title="Crossroads"
                        style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transform: translate(580px, 0px) scale(1); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1465447142348-e9952c393450"
                                     srcset="https://images.unsplash.com/photo-1465447142348-e9952c393450?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=7d97e22d36a9a73beb639a936e6774e9 1x, https://images.unsplash.com/photo-1465447142348-e9952c393450?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=7d97e22d36a9a73beb639a936e6774e9 2x"
                                     alt="A multi-level highway stack interchange in Puxi, Shanghai">
                                <img class="picture-item__blur" src="./demo_files/photo-1465447142348-e9952c393450"
                                     srcset="https://images.unsplash.com/photo-1465447142348-e9952c393450?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=7d97e22d36a9a73beb639a936e6774e9 1x, https://images.unsplash.com/photo-1465447142348-e9952c393450?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=7d97e22d36a9a73beb639a936e6774e9 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/7nrsVjvALnA"
                                                                       target="_blank" rel="noopener">Crossroads</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">city</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay shuffle-item shuffle-item--hidden"
                        data-group="[&quot;space&quot;,&quot;nature&quot;]" data-date-created="2016-06-29"
                        data-title="Milky Way"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transform: translate(290px, 0px) scale(0.001); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;"
                        aria-hidden="true">
                    <div class="picture-item__inner">


                        <img src="./demo_files/photo-1467173572719-f14b9fb86e5f"
                             srcset="https://images.unsplash.com/photo-1467173572719-f14b9fb86e5f?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=e641d6b3c4c2c967e80e998d02a4d03b 1x, https://images.unsplash.com/photo-1467173572719-f14b9fb86e5f?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=e641d6b3c4c2c967e80e998d02a4d03b 2x"
                             alt="Dimly lit mountains give way to a starry night showing the Milky Way">
                        <img class="picture-item__blur" src="./demo_files/photo-1467173572719-f14b9fb86e5f"
                             srcset="https://images.unsplash.com/photo-1467173572719-f14b9fb86e5f?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=e641d6b3c4c2c967e80e998d02a4d03b 1x, https://images.unsplash.com/photo-1467173572719-f14b9fb86e5f?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=e641d6b3c4c2c967e80e998d02a4d03b 2x"
                             alt="" aria-hidden="true">

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/_4Ib-a8g9aA"
                                                                       target="_blank" rel="noopener">Milky Way</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">space, nature</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--h2 shuffle-item shuffle-item--hidden"
                        data-group="[&quot;space&quot;]" data-date-created="2015-11-06" data-title="Earth"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transform: translate(290px, 244px) scale(0.001); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;"
                        aria-hidden="true">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1446776811953-b23d57bd21aa"
                                     srcset="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=f4856588634def31d5885dc396fe9a2e 1x, https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=f4856588634def31d5885dc396fe9a2e 2x"
                                     alt="NASA Satellite view of Earth">
                                <img class="picture-item__blur" src="./demo_files/photo-1446776811953-b23d57bd21aa"
                                     srcset="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=f4856588634def31d5885dc396fe9a2e 1x, https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=f4856588634def31d5885dc396fe9a2e 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/yZygONrUBe8"
                                                                       target="_blank" rel="noopener">Earth</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">space</p>
                        </div>

                        <p class="picture-item__description">NASA Satellite view of Earth</p>

                    </div>
                </figure>


                <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2 shuffle-item shuffle-item--hidden"
                        data-group="[&quot;animal&quot;]" data-date-created="2015-07-23" data-title="Turtle"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transform: translate(290px, 0px) scale(0.001); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;"
                        aria-hidden="true">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1437622368342-7a3d73a34c8f"
                                     srcset="https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bc4e1180b6b8789d38c614edc8d0dd01 1x, https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bc4e1180b6b8789d38c614edc8d0dd01 2x"
                                     alt="A close up of a turtle underwater">
                                <img class="picture-item__blur" src="./demo_files/photo-1437622368342-7a3d73a34c8f"
                                     srcset="https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bc4e1180b6b8789d38c614edc8d0dd01 1x, https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=bc4e1180b6b8789d38c614edc8d0dd01 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/L-2p8fapOA8"
                                                                       target="_blank" rel="noopener">Turtle</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">animal</p>
                        </div>

                        <p class="picture-item__description">A close up of a turtle underwater</p>

                    </div>
                </figure>


                <figure class="col-3@xs col-4@sm col-3@md picture-item shuffle-item shuffle-item--hidden"
                        data-group="[&quot;nature&quot;]" data-date-created="2014-10-12" data-title="Stanley Park"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transform: translate(870px, 0px) scale(0.001); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;"
                        aria-hidden="true">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/d141726c"
                                     srcset="https://images.unsplash.com/uploads/1413142095961484763cf/d141726c?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6141097da144d759176d77b4024c064b 1x, https://images.unsplash.com/uploads/1413142095961484763cf/d141726c?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6141097da144d759176d77b4024c064b 2x"
                                     alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada">
                                <img class="picture-item__blur" src="./demo_files/d141726c"
                                     srcset="https://images.unsplash.com/uploads/1413142095961484763cf/d141726c?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6141097da144d759176d77b4024c064b 1x, https://images.unsplash.com/uploads/1413142095961484763cf/d141726c?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=6141097da144d759176d77b4024c064b 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/b-yEdfrvQ50"
                                                                       target="_blank" rel="noopener">Stanley Park</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">nature</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-3@xs col-4@sm col-3@md picture-item shuffle-item shuffle-item--hidden"
                        data-group="[&quot;animal&quot;]" data-date-created="2017-01-12" data-title="Astronaut Cat"
                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; will-change: transform; opacity: 0; transform: translate(580px, 0px) scale(0.001); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;"
                        aria-hidden="true">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1484244233201-29892afe6a2c"
                                     srcset="https://images.unsplash.com/photo-1484244233201-29892afe6a2c?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=98423596f72d9f0913a4d44f0580a34c 1x, https://images.unsplash.com/photo-1484244233201-29892afe6a2c?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=98423596f72d9f0913a4d44f0580a34c 2x"
                                     alt="An intrigued cat sits in grass next to a flag planted in front of it with an astronaut space kitty sticker on beige fabric.">
                                <img class="picture-item__blur" src="./demo_files/photo-1484244233201-29892afe6a2c"
                                     srcset="https://images.unsplash.com/photo-1484244233201-29892afe6a2c?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=98423596f72d9f0913a4d44f0580a34c 1x, https://images.unsplash.com/photo-1484244233201-29892afe6a2c?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=98423596f72d9f0913a4d44f0580a34c 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/FqkBXo2Nkq0"
                                                                       target="_blank" rel="noopener">Astronaut Cat</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">animal</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay shuffle-item shuffle-item--visible"
                        data-group="[&quot;city&quot;]" data-date-created="2017-01-19" data-title="San Francisco"
                        style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transform: translate(0px, 244px) scale(1); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                    <div class="picture-item__inner">


                        <img src="./demo_files/photo-1484851050019-ca9daf7736fb"
                             srcset="https://images.unsplash.com/photo-1484851050019-ca9daf7736fb?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=05325a7cc678f7f765cbbdcf7159ab89 1x, https://images.unsplash.com/photo-1484851050019-ca9daf7736fb?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=05325a7cc678f7f765cbbdcf7159ab89 2x"
                             alt="Pier 14 at night, looking towards downtown San Francisco&#39;s brightly lit buildings">
                        <img class="picture-item__blur" src="./demo_files/photo-1484851050019-ca9daf7736fb"
                             srcset="https://images.unsplash.com/photo-1484851050019-ca9daf7736fb?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=05325a7cc678f7f765cbbdcf7159ab89 1x, https://images.unsplash.com/photo-1484851050019-ca9daf7736fb?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=584&amp;h=329&amp;fit=cropLength&amp;s=05325a7cc678f7f765cbbdcf7159ab89 2x"
                             alt="" aria-hidden="true">

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/h3jarbNzlOg"
                                                                       target="_blank" rel="noopener">San Francisco</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">city</p>
                        </div>

                    </div>
                </figure>


                <figure class="col-3@xs col-4@sm col-3@md picture-item shuffle-item shuffle-item--visible"
                        data-group="[&quot;nature&quot;,&quot;city&quot;]" data-date-created="2015-10-20"
                        data-title="Central Park"
                        style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transform: translate(870px, 0px) scale(1); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                    <div class="picture-item__inner">

                        <div class="aspect aspect--16x9">
                            <div class="aspect__inner">


                                <img src="./demo_files/photo-1445346366695-5bf62de05412"
                                     srcset="https://images.unsplash.com/photo-1445346366695-5bf62de05412?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=1822bfd69c4021973a3d926e9294b70f 1x, https://images.unsplash.com/photo-1445346366695-5bf62de05412?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=1822bfd69c4021973a3d926e9294b70f 2x"
                                     alt="Looking down on central park and the surrounding builds from the Rockefellar Center">
                                <img class="picture-item__blur" src="./demo_files/photo-1445346366695-5bf62de05412"
                                     srcset="https://images.unsplash.com/photo-1445346366695-5bf62de05412?ixlib=rb-0.3.5&amp;auto=format&amp;q=80&amp;fm=jpg&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=1822bfd69c4021973a3d926e9294b70f 1x, https://images.unsplash.com/photo-1445346366695-5bf62de05412?ixlib=rb-0.3.5&amp;auto=format&amp;q=55&amp;fm=jpg&amp;dpr=2&amp;cropLength=entropy&amp;cs=tinysrgb&amp;w=284&amp;h=160&amp;fit=cropLength&amp;s=1822bfd69c4021973a3d926e9294b70f 2x"
                                     alt="" aria-hidden="true">

                            </div>
                        </div>

                        <div class="picture-item__details">
                            <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/utwYoEu9SU8"
                                                                       target="_blank" rel="noopener">Central Park</a>
                            </figcaption>
                            <p class="picture-item__tags hidden@xs">nature, city</p>
                        </div>

                    </div>
                </figure>


                <div class="col-1@sm col-1@xs my-sizer-element"></div>
            </div>
        </div>

    </section>

HTML,

        'jscode' => <<<JS
                   !function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'twitter-wjs');

        (function () {
            var po = document.createElement('script');
            po.type = 'text/javascript';
            po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
        })();
JS,

    ];

    public function codes()
    {
        $content = $this->itemGen();

        $this->htm = strtr($this->_layout['main'], [
            '{content}' => $content,
            
        ]);


    }

}
