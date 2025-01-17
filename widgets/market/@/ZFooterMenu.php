<?php


namespace zetsoft\widgets\market;
// Author: jamshid Tojiboyev

use zetsoft\models\shop\ShopCategory;
use zetsoft\system\assets\ZColor;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZUrl;
use zetsoft\system\kernels\ZWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\navigat\ZButtonWidget;

class ZFooterMenu extends ZWidget
{
    /**
     * Configuration
     */
    public $config = [];
    public $_config = [

        'color' => 'white',
        'class' => 'fa fa-angle-right',
        'url' => '',
        'registrationUrl' => '',


    ];


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

        'main' => <<<HTML
        <footer class="footer-div list stic  p-30">
        <section class="footer-top success-color">
            <div class="container">
                <div class="row">
                  {menulist}
                 
                </div>
            </div>
        </section>
        <section class="footer-btm success-color">
            <div class="container">
                <div class="row zleft d-flex align-items-center text-align-center">
                    <div class="col-md-6">
                        <p class="zcolor zlr text-white">Copyright &copy; 2020 | MarketPlace<i class="fa fa-heart zcolor red-text ml-1"></i> by <a href="#" target="_blank" class="zcolor text-white">ZetSoft</a></p>
                    </div>
                    
                </div>
            </div>
        </section>
    </footer>
          
HTML,
        'menulist' => <<< HTML
  <div class="col-md-3 d-flex justify-content-center">
                        <div class="f-cat">
                            <h5 style="color: {color};">{Categories}</h5>
                            <ul class="list-unstyled">      
                                {categoryList}
     
                            </ul>
                        </div>
                    </div>
HTML,

        'categoryList' => <<<HTML
        <li><a href="{url}" class="white-text"><i class="{class}"></i>{categoryListNames}</a></li>
HTML,
        'List' => <<<HTML
        <li id={id}><a href="{url}" class="white-text"
        ><i class="{class}"></i>{ListName}</a></li>
HTML,


        'css' => <<<CSS


            
CSS,
        'js' => <<<JS
  \$(document).on('click', '#{id}', function(){\$("#loginNavbar").modal('show')});
 \$(document).on('click', '#fv{id}', function(){\$(fastRegisterVendor).modal('show')});
  \$(document).on('click', '#fu{id}', function(){\$(fastRegister).modal('show')});

            
JS,
    ];


    public function asset()
    {
        $this->fileCss('https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css');
    }

    public function codes()
    {

        $categoryListCode = '';
        /** @var Category[] $categories */
        
        $parent_categories = ShopCategory::find()
        ->where([
            'parent_id' => null
        ])
        ->all();

        $categories = $parent_categories;
        $count = 0;
        foreach ($categories as $category) {
                if($count==6) break;
                if(!empty($category->name))
                $categoryListCode .= strtr($this->_layout['categoryList'], [
                    '{categoryListNames}' => $category->name,
                  '{url}' => ZUrl::to(['/shop/user/filter-common/main','id' => $category->id,]),
                ]);
            $count++;
        }
        $categoryListCode = strtr($this->_layout['menulist'], [
            '{color}' => $this->_config['color'],
            '{Categories}' => Az::l('Категории'),
            '{categoryList}' => $categoryListCode,
        ]);

        //Info start
        $info = '';
        $info .= strtr($this->_layout['List'], [
            '{icon}' => 'http://bozorboy.com/pictures/icons/5039.png',
            '{ListName}' => 'О нашем сервисе',
            '{url}' => $this->_config['url']
        ]);
        $info .= strtr($this->_layout['List'], [
            '{icon}' => 'http://bozorboy.com/pictures/icons/5040.png',
            '{ListName}' => 'Принимаемые платежи'
        ]);
        $info .= strtr($this->_layout['List'], [
            '{icon}' => 'http://bozorboy.com/pictures/icons/5041.png',
            '{ListName}' => 'Правила доставки'
        ]);
        $info .= strtr($this->_layout['List'], [
            '{icon}' => 'http://bozorboy.com/pictures/icons/5042.png',
            '{ListName}' => 'Обработка данных'                                          
        ]);
        $info .= strtr($this->_layout['List'], [
            '{icon}' => 'http://bozorboy.com/pictures/icons/5044.png',
            '{ListName}' => 'Наши контакты'
        ]);
        $categoryListCode .= strtr($this->_layout['menulist'], [
            '{color}' => $this->_config['color'],
            '{Categories}' => Az::l('Информация'),
            '{categoryList}' => $info,
            '{url}' => $this->_config['url']
        ]);

        $this->htm = strtr($this->_layout['categoryList'], [
            '{url}' => $this->_config['url']
        ]);

        //Info end

//Register start       
        $login = '';
        $login .= strtr($this->_layout['List'], [
            '{id}' => $this->id,
            '{icon}' => 'http://bozorboy.com/pictures/icons/5045.png',
            '{ListName}' => 'Вход',
            '{url}' => $this->_config['url']
        ]);
        $login .= strtr($this->_layout['List'], [
            '{id}' => 'fu' . $this->id,
            '{icon}' => 'http://bozorboy.com/pictures/icons/5042.png',
            '{ListName}' => 'Регистрация пользователя',
            '{url}' => $this->_config['registrationUrl']

        ]);
//Register end

        $categoryListCode .= strtr($this->_layout['menulist'], [
            '{color}' => $this->_config['color'],
            '{Categories}' => Az::l('Личный кабинет'),
            '{categoryList}' => $login,
            '{url}' => $this->_config['url']
        ]);

        $this->htm = strtr($this->_layout['main'], [
            '{color}' => $this->_config['color'],
            '{color_company}' => '#0049ff',
            '{class}' => $this->_config['class'],
            '{menulist}' => $categoryListCode,
            '{url}' => $this->_config['url']
        ]);

        $this->css = strtr($this->_layout['css'], [
            '{color}' => $this->_config['color'],
        ]);
        $this->js = strtr($this->_layout['js'], [
            '{id}' => $this->id,
        ]);

        $categoryListCode .= strtr($this->_layout['menulist'], [
            '{color}' => $this->_config['color'],
            '{Categories}' => Az::l(' '),
            '{categoryList}' => '
<div class="logo-footer mt-0">
                        <a href="" class="zetshop-footer">
                          <svg width="180" height="31" viewBox="0 0 180 31" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M160.167 27.5C160.167 26.2114 161.211 25.1667 162.5 25.1667C163.789 25.1667 164.833 26.2114 164.833 27.5C164.833 28.7887 163.789 29.8334 162.5 29.8334C161.211 29.8334 160.167 28.7887 160.167 27.5Z" fill="white"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M173 27.5C173 26.2114 174.045 25.1667 175.333 25.1667C176.622 25.1667 177.667 26.2114 177.667 27.5C177.667 28.7887 176.622 29.8334 175.333 29.8334C174.045 29.8334 173 28.7887 173 27.5Z" fill="white"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M152 4.16667C152 3.52233 152.522 3 153.167 3H157.833C158.389 3 158.868 3.39245 158.977 3.9377L159.957 8.83333H178.833C179.181 8.83333 179.511 8.98842 179.732 9.25631C179.954 9.52421 180.044 9.87701 179.979 10.2185L178.111 20.0156C177.951 20.8213 177.513 21.545 176.873 22.0601C176.236 22.5727 175.44 22.8461 174.623 22.8333H163.303C162.486 22.8461 161.691 22.5727 161.054 22.0601C160.414 21.5453 159.976 20.8219 159.816 20.0166C159.816 20.0163 159.816 20.0169 159.816 20.0166L157.867 10.2791C157.859 10.2469 157.852 10.2141 157.847 10.1809L156.877 5.33333H153.167C152.522 5.33333 152 4.811 152 4.16667ZM160.424 11.1667L162.104 19.561C162.158 19.8296 162.304 20.0709 162.517 20.2426C162.73 20.4143 162.997 20.5055 163.271 20.5002L163.293 20.5H174.633L174.656 20.5002C174.929 20.5055 175.196 20.4143 175.41 20.2426C175.622 20.0717 175.768 19.8319 175.822 19.5648L177.423 11.1667H160.424Z" fill="white"/>
<path d="M25.51 27.09L25.15 28.2C24.63 28.24 24.24 28.26 23.98 28.26C22.78 28.26 21.8 27.75 21.04 26.73C20.3 25.73 19.93 24.42 19.93 22.8C19.93 21.82 20.15 19.97 20.59 17.25C21.05 14.51 21.58 12.01 22.18 9.75C22.3 9.25 22.36 8.92 22.36 8.76C22.36 8.6 22.29 8.52 22.15 8.52C22.01 8.52 21.56 9.27 20.8 10.77C20.06 12.25 19.17 14.08 18.13 16.26C17.09 18.42 16.49 19.66 16.33 19.98C16.19 20.28 16.07 20.53 15.97 20.73C15.89 20.91 15.71 21.25 15.43 21.75C15.17 22.23 14.92 22.66 14.68 23.04C14.02 24.04 13.5 24.54 13.12 24.54C12.86 24.54 12.57 24.47 12.25 24.33C11.95 24.19 11.75 24.04 11.65 23.88C11.43 23.54 11.32 22.48 11.32 20.7C11.32 16.98 11.62 13.43 12.22 10.05C12.42 8.93 12.52 8.34 12.52 8.28C12.52 8.08 12.44 7.98 12.28 7.98C11.96 7.98 11.45 8.98 10.75 10.98L9.88 13.47C8.6 17.09 7.3 19.91 5.98 21.93C4.68 23.95 3.18 25.37 1.48 26.19L0.7 24.54C2.64 23.1 4.13 21.63 5.17 20.13C6.23 18.63 7.38 16.21 8.62 12.87L9.64 10.14C10.34 8.24 10.95 6.89 11.47 6.09C11.99 5.27 12.57 4.86 13.21 4.86C14.27 4.86 14.8 5.5 14.8 6.78C14.8 6.88 14.61 8.91 14.23 12.87C13.85 16.81 13.66 19.41 13.66 20.67C13.66 21.03 13.72 21.22 13.84 21.24C13.94 21.24 14.05 21.14 14.17 20.94C15.79 18.24 17.34 15.3 18.82 12.12C19 11.72 19.31 11.03 19.75 10.05C20.19 9.07 20.62 8.2 21.04 7.44C21.46 6.68 21.78 6.22 22 6.06C22.22 5.88 22.57 5.79 23.05 5.79C23.53 5.79 23.94 5.97 24.28 6.33C24.64 6.67 24.82 7.08 24.82 7.56C24.82 8.04 24.75 8.59 24.61 9.21C23.05 16.83 22.27 21.39 22.27 22.89C22.27 24.37 22.51 25.38 22.99 25.92C23.47 26.48 24.31 26.87 25.51 27.09ZM38.3692 20.97L39.0592 21.48C38.7792 22.08 38.2592 22.65 37.4992 23.19C36.7592 23.73 36.0792 24 35.4592 24C34.2792 24 33.6892 23.38 33.6892 22.14C33.6892 21.56 33.8392 20.87 34.1392 20.07L33.0292 21.21C31.9492 22.31 31.0092 23.05 30.2092 23.43C29.4292 23.81 28.6592 24 27.8992 24C27.1392 24 26.5592 23.79 26.1592 23.37C25.7792 22.93 25.5892 22.33 25.5892 21.57C25.5892 20.17 26.1292 18.79 27.2092 17.43C28.2892 16.05 29.6692 14.93 31.3492 14.07C33.0292 13.21 34.7092 12.77 36.3892 12.75L36.4492 13.74L35.1892 14.01C33.3692 14.41 31.7592 15.21 30.3592 16.41C28.9792 17.61 28.2892 18.81 28.2892 20.01C28.2892 21.19 28.7692 21.78 29.7292 21.78C30.6292 21.78 31.7392 21.15 33.0592 19.89C34.3792 18.63 35.4792 17.15 36.3592 15.45L37.6192 16.2C36.3792 18.7 35.7592 20.29 35.7592 20.97C35.7592 21.25 35.8492 21.49 36.0292 21.69C36.2292 21.87 36.4192 21.96 36.5992 21.96C36.7992 21.96 36.9292 21.95 36.9892 21.93C37.0492 21.91 37.1092 21.89 37.1692 21.87C37.2292 21.83 37.2992 21.78 37.3792 21.72C37.4792 21.66 37.5592 21.6 37.6192 21.54C37.6992 21.48 37.8192 21.39 37.9792 21.27C38.1392 21.15 38.2692 21.05 38.3692 20.97ZM47.9617 13.38C48.4617 13.38 48.8717 13.55 49.1917 13.89C49.5117 14.23 49.6717 14.67 49.6717 15.21C49.6717 16.29 49.0517 17.43 47.8117 18.63L47.0917 18.06C47.3717 17.44 47.5117 16.99 47.5117 16.71C47.5117 16.17 47.2117 15.9 46.6117 15.9C46.0117 15.9 45.4417 16.28 44.9017 17.04C44.3617 17.8 43.7217 18.98 42.9817 20.58C42.2617 22.16 41.7117 23.28 41.3317 23.94L39.6217 23.19C40.7217 20.69 41.3517 19.22 41.5117 18.78C42.0517 17.22 42.3217 15.24 42.3217 12.84L44.0017 12.39C43.9417 13.69 43.8517 14.7 43.7317 15.42C43.6117 16.12 43.3217 17.27 42.8617 18.87C44.8817 15.21 46.5817 13.38 47.9617 13.38ZM62.3458 20.94L63.0958 21.6C61.9358 23.5 60.7058 24.45 59.4058 24.45C58.6058 24.45 57.7858 23.86 56.9458 22.68C56.1058 21.5 55.6858 20.53 55.6858 19.77C55.6858 19.29 56.4058 18.81 57.8458 18.33C58.3858 18.15 58.8758 17.88 59.3158 17.52C59.7758 17.14 60.0058 16.75 60.0058 16.35C60.0058 15.95 59.8958 15.65 59.6758 15.45C59.4558 15.23 59.1758 15.12 58.8358 15.12C56.6358 15.32 54.3358 18.28 51.9358 24L50.1058 23.37C50.1058 22.51 51.2658 19.03 53.5858 12.93C55.9258 6.83 57.5858 3.14 58.5658 1.86L60.0358 2.4C57.3358 7.1 55.0758 12.56 53.2558 18.78C54.8158 16.44 56.1558 14.88 57.2758 14.1C58.3958 13.32 59.4658 12.93 60.4858 12.93C61.1058 12.93 61.5958 13.12 61.9558 13.5C62.3358 13.88 62.5258 14.37 62.5258 14.97C62.5258 15.55 62.3758 16.08 62.0758 16.56C61.7958 17.04 61.3858 17.46 60.8458 17.82C60.0658 18.34 59.1058 18.85 57.9658 19.35C58.1458 20.29 58.4558 21 58.8958 21.48C59.3358 21.96 59.8358 22.2 60.3958 22.2C60.6958 22.2 61.3458 21.78 62.3458 20.94ZM72.2195 20.46L72.9095 21C72.2895 21.86 71.4395 22.58 70.3595 23.16C69.2795 23.72 68.2295 24 67.2095 24C66.1895 24 65.3695 23.7 64.7495 23.1C64.1295 22.5 63.8195 21.71 63.8195 20.73C63.8195 18.89 64.7895 17.08 66.7295 15.3C68.6895 13.52 70.6695 12.63 72.6695 12.63C73.9895 12.63 74.6495 13.15 74.6495 14.19C74.6495 15.27 73.9495 16.36 72.5495 17.46C71.1695 18.56 69.2195 19.56 66.6995 20.46C66.8795 20.92 67.1595 21.28 67.5395 21.54C67.9195 21.8 68.3095 21.93 68.7095 21.93C69.5695 21.93 70.7395 21.44 72.2195 20.46ZM66.5495 19.56C68.1695 19 69.5595 18.3 70.7195 17.46C71.8795 16.62 72.4595 15.85 72.4595 15.15C72.4595 14.89 72.3595 14.66 72.1595 14.46C71.9595 14.26 71.7295 14.16 71.4695 14.16C70.5295 14.16 69.5095 14.75 68.4095 15.93C67.3295 17.09 66.7095 18.3 66.5495 19.56ZM82.2653 20.64L82.9253 21.39C82.4253 22.17 81.8153 22.78 81.0953 23.22C80.3953 23.66 79.6853 23.88 78.9653 23.88C78.2453 23.88 77.6753 23.68 77.2553 23.28C76.8353 22.86 76.6253 22.29 76.6253 21.57C76.6253 19.89 77.2553 17.57 78.5153 14.61C77.4953 14.77 76.4753 15.01 75.4553 15.33L75.2453 14.16L75.2153 14.13C76.2153 13.71 77.5253 13.37 79.1453 13.11C79.3053 12.81 79.6653 12.08 80.2253 10.92C81.3453 8.62 82.1453 7.13 82.6253 6.45L83.9153 6.96C83.7153 7.4 83.3653 8.14 82.8653 9.18C82.3653 10.2 81.8053 11.36 81.1853 12.66C82.0853 12.6 82.7953 12.57 83.3153 12.57C83.8353 12.57 84.2353 12.65 84.5153 12.81V14.1C84.2353 14.04 83.8253 14.01 83.2853 14.01C82.7653 14.01 81.8253 14.1 80.4653 14.28C79.2853 16.92 78.6953 18.84 78.6953 20.04C78.6953 20.5 78.8353 20.88 79.1153 21.18C79.4153 21.48 79.8053 21.63 80.2853 21.63C80.7853 21.63 81.4453 21.3 82.2653 20.64ZM95.6777 7.5C97.3177 6.38 98.4377 5.7 99.0377 5.46C99.6377 5.2 100.338 5.07 101.138 5.07C101.958 5.07 102.588 5.35 103.028 5.91C103.468 6.47 103.688 7.27 103.688 8.31C103.688 10.17 103.088 12.17 101.888 14.31C100.688 16.45 99.1877 18.25 97.3877 19.71C95.5877 21.15 93.8877 21.87 92.2877 21.87C91.8877 21.87 91.4277 21.85 90.9077 21.81C89.9277 23.89 89.0377 25.46 88.2377 26.52C87.4377 27.58 86.6377 28.11 85.8377 28.11C85.3377 28.11 84.9477 27.93 84.6677 27.57C84.3877 27.21 84.2477 26.71 84.2477 26.07C84.2477 24.01 85.1977 21.26 87.0977 17.82C88.9977 14.36 91.0877 11.59 93.3677 9.51C93.6877 8.19 93.8477 7.23 93.8477 6.63C93.8477 6.01 93.8277 5.54 93.7877 5.22L95.9477 4.86C95.9477 5 95.8577 5.88 95.6777 7.5ZM88.8077 19.65L89.6477 20.07C90.9077 17.61 91.9677 14.85 92.8277 11.79C90.9877 14.09 89.4777 16.43 88.2977 18.81C87.1177 21.19 86.5277 23.02 86.5277 24.3C86.5277 24.68 86.6477 24.87 86.8877 24.87C87.0677 24.87 87.3877 24.5 87.8477 23.76C88.3077 23 88.6977 22.23 89.0177 21.45C88.7577 21.33 88.5077 21.15 88.2677 20.91L88.8077 19.65ZM91.5377 20.49L92.1077 20.52C94.0477 20.52 95.8677 19.5 97.5677 17.46C98.5277 16.28 99.3377 14.93 99.9977 13.41C100.678 11.89 101.018 10.6 101.018 9.54C101.018 8.96 100.858 8.5 100.538 8.16C100.238 7.82 99.8177 7.65 99.2777 7.65C98.2977 7.65 96.9977 8.19 95.3777 9.27C95.0177 11.97 93.7377 15.71 91.5377 20.49ZM109.574 21.12L110.204 21.63C109.524 22.69 108.934 23.46 108.434 23.94C107.954 24.4 107.414 24.63 106.814 24.63C106.214 24.63 105.724 24.39 105.344 23.91C104.964 23.43 104.774 22.83 104.774 22.11C104.774 20.71 105.694 17.7 107.534 13.08C109.374 8.44 111.264 4.36 113.204 0.84L114.524 1.56C112.564 5.36 110.794 9.14 109.214 12.9C107.634 16.64 106.844 19.33 106.844 20.97C106.844 21.91 107.194 22.38 107.894 22.38C108.454 22.38 109.014 21.96 109.574 21.12ZM125.908 20.97L126.598 21.48C126.318 22.08 125.798 22.65 125.038 23.19C124.298 23.73 123.618 24 122.998 24C121.818 24 121.228 23.38 121.228 22.14C121.228 21.56 121.378 20.87 121.678 20.07L120.568 21.21C119.488 22.31 118.548 23.05 117.748 23.43C116.968 23.81 116.198 24 115.438 24C114.678 24 114.098 23.79 113.698 23.37C113.318 22.93 113.128 22.33 113.128 21.57C113.128 20.17 113.668 18.79 114.748 17.43C115.828 16.05 117.208 14.93 118.888 14.07C120.568 13.21 122.248 12.77 123.928 12.75L123.988 13.74L122.728 14.01C120.908 14.41 119.298 15.21 117.898 16.41C116.518 17.61 115.828 18.81 115.828 20.01C115.828 21.19 116.308 21.78 117.268 21.78C118.168 21.78 119.278 21.15 120.598 19.89C121.918 18.63 123.018 17.15 123.898 15.45L125.158 16.2C123.918 18.7 123.298 20.29 123.298 20.97C123.298 21.25 123.388 21.49 123.568 21.69C123.768 21.87 123.958 21.96 124.138 21.96C124.338 21.96 124.468 21.95 124.528 21.93C124.588 21.91 124.648 21.89 124.708 21.87C124.768 21.83 124.838 21.78 124.918 21.72C125.018 21.66 125.098 21.6 125.158 21.54C125.238 21.48 125.358 21.39 125.518 21.27C125.678 21.15 125.808 21.05 125.908 20.97ZM135.231 19.74L135.951 20.34C135.471 21.44 134.701 22.32 133.641 22.98C132.581 23.64 131.551 23.97 130.551 23.97C129.571 23.97 128.751 23.66 128.091 23.04C127.451 22.42 127.131 21.57 127.131 20.49C127.131 19.41 127.601 18.24 128.541 16.98C129.481 15.72 130.691 14.68 132.171 13.86C133.671 13.04 135.141 12.63 136.581 12.63C136.781 12.63 137.081 12.65 137.481 12.69L137.391 13.86C135.191 13.96 133.361 14.63 131.901 15.87C130.461 17.11 129.741 18.43 129.741 19.83C129.741 20.41 129.921 20.88 130.281 21.24C130.641 21.6 131.111 21.78 131.691 21.78C132.611 21.78 133.791 21.1 135.231 19.74ZM146.458 20.46L147.148 21C146.528 21.86 145.678 22.58 144.598 23.16C143.518 23.72 142.468 24 141.448 24C140.428 24 139.608 23.7 138.988 23.1C138.368 22.5 138.058 21.71 138.058 20.73C138.058 18.89 139.028 17.08 140.968 15.3C142.928 13.52 144.908 12.63 146.908 12.63C148.228 12.63 148.888 13.15 148.888 14.19C148.888 15.27 148.188 16.36 146.788 17.46C145.408 18.56 143.458 19.56 140.938 20.46C141.118 20.92 141.398 21.28 141.778 21.54C142.158 21.8 142.548 21.93 142.948 21.93C143.808 21.93 144.978 21.44 146.458 20.46ZM140.788 19.56C142.408 19 143.798 18.3 144.958 17.46C146.118 16.62 146.698 15.85 146.698 15.15C146.698 14.89 146.598 14.66 146.398 14.46C146.198 14.26 145.968 14.16 145.708 14.16C144.768 14.16 143.748 14.75 142.648 15.93C141.568 17.09 140.948 18.3 140.788 19.56Z" fill="white"/>
</svg>

 
                        </a>
                 </div>
                 <div class="zleft-left d-flex justify-content-center align-items-center">
                <div class="zleft-icon"><a href="http://telegram.com">
                <i class="fab fa-telegram-plane fa-2x white-text Super"></i></a>
                </div>
                <div class="zleft-icon m-3"><a href="http://instagram.com">
                <i class="fab fa-instagram fa-2x white-text"></i></a>
                </div>
                <div class="zleft-icon"><a href="http://telegram.com">
                <i class="fab fa-facebook-f fa-2x white-text"></i></i></a>
                </div>
                </div>
                
                
            '. ZHInputWidget::widget(
                [
                    'id'=>'subscribe',
                    'config'=>[
                        'placeholder'=>Az::l('Email'),
                        '::placeholder' => 'white-text',
                        'class' => 'white-text'
                    ]
                ]
            ) . ZButtonWidget::widget([
                    'config' => [
                        'text' => Az::l('Subscribe'),
                        /*'btnStyle' => ZButtonWidget::btnStyle['btn-danger'],*/
                        'btnSize' => ZButtonWidget::btnSize['btn-lg'],
                        'btnRounded' => false,
                        'hasIcon' => true,
                        'icon'=>'far fa-bell',
                        'class'=>'w-100 success-color white-text border-white'
                    ]
                ]),
            '{url}' => $this->_config['url']
        ]);

        $this->htm = strtr($this->_layout['main'], [
            '{color}' => $this->_config['color'],
            '{color_company}' => '#0049ff',
            '{class}' => $this->_config['class'],
            '{menulist}' => $categoryListCode,
        ]);

        $this->css = strtr($this->_layout['css'], [
            '{color}' => $this->_config['color'],
        ]);
        $this->js = strtr($this->_layout['js'], [
            '{id}' => $this->id,
        ]);


    }

}

