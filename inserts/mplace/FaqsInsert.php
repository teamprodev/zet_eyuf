<?php

namespace zetsoft\inserts\mplace;

use zetsoft\system\actives\ZInsert;
use zetsoft\system\Az;
use zetsoft\system\kernels\ZMigration;
use zetsoft\models\faqs\Faqs;

class FaqsInsert extends ZInsert
{

    public function run()
    {

        $this->model = new Faqs();

        $this->model->id = 2;
        $this->model->sort = null;
        $this->model->name = 'Что такое Маркетплейс ?';
        $this->model->title = '';
        $this->model->tranz = null;
        $this->model->accept = null;
        $this->model->active = 1;
        $this->model->text = '<p><strong>Маркетплейс</strong>&nbsp;(<a href=\\\\\\\\\\\\\\\"https://ru.wikipedia.org/wiki/%D0%90%D0%BD%D0%B3%D0%BB%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA\\\\\\\\\\\\\\\">англ.</a>&nbsp;online marketplace, online e-commerce marketplace)&nbsp;&mdash; платформа&nbsp;<a href=\\\\\\\\\\\\\\\"https://ru.wikipedia.org/wiki/%D0%AD%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%BD%D0%BD%D0%B0%D1%8F_%D0%BA%D0%BE%D0%BC%D0%BC%D0%B5%D1%80%D1%86%D0%B8%D1%8F\\\\\\\\\\\\\\\">электронной коммерции</a>, онлайн-магазин электронной торговли, предоставляющий информацию о продукте или услуге третьих лиц, чьи операции обрабатываются оператором маркетплейса.</p><p>В целом маркетплейс представляет собой оптимизированную онлайн-платформу по предоставлению продуктов и услуг. Один и тот же товар зачастую можно купить у нескольких ритейлеров, при этом цена на товар может отличаться.</p><p>Поскольку маркетплейсы объединяют продукты от широкого круга поставщиков, выбор этих продуктов более широк, а доступность выше, чем в специализированных розничных онлайн-магазинах<sup><a href=\\\\\\\\\\\\\\\"https://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%BF%D0%BB%D0%B5%D0%B9%D1%81#cite_note-1\\\\\\\\\\\\\\\">[1]</a></sup>. Начиная с 2014 года число маркетплейсов в глобальной сети Интернет быстро растёт вслед за ростом их востребованности</p>';
        $this->model->faqs_type_id = 1;
        $this->model->role = "";
        $this->save();


        $this->model = new Faqs();

        $this->model->id = 1;
        $this->model->sort = null;
        $this->model->name = 'Как оформить заказ?';
        $this->model->title = '';
        $this->model->tranz = null;
        $this->model->accept = null;
        $this->model->active = 1;
        $this->model->text = '<p>Для того чтобы оформить заказ Вам необходимо: 1) Найти нужный Вам товар или ввести запрос в поисковую систему, которая расположена на верху сайта. 2) Далее открываем необходимый товар, выбираем нужные для Вас параметры и нажимаем кнопку &laquo;Купить&raquo;. 3) Товар автоматически добавляется в корзину. Для заказа и просмотра товара, Вам необходимо перейти в корзину. Нажав на нее будет показана общая сумма всех товаров которые Вы хотели приобрести. 4) После того как Вы ознакомились с товарами в корзине и готовы к оформлению заказа нажмите на кнопку &laquo;Оформить заказ&raquo;. 5) Следующий этап является очень важным! Заполнение профиля доставки. Введите все свои данные: &laquo;Контактная информация&raquo;, &laquo;Способ доставки&raquo;, &laquo;Тип доставки&raquo;. На этой же страницы нужно выбрать наиболее подходящий способ оплаты и нажать на кнопку &laquo;Оформить заказ&raquo;. Примечание! Вы можете совершить покупку без прохождения регистрации на сайте, но у Вас не будет возможности проверить историю заказов и т.д. Если хотите пройти регистрацию на сайте и Вам нужна помощь, нажмите &laquo;как зарегистрироваться&raquo;</p>';
        $this->model->faqs_type_id = 1;
        $this->model->role = "";
        $this->save();


        $this->model = new Faqs();

        $this->model->id = 3;
        $this->model->sort = null;
        $this->model->name = 'Предоставляете ли Вы услугу по установке бытовой технике?';
        $this->model->title = '';
        $this->model->tranz = null;
        $this->model->accept = null;
        $this->model->active = 1;
        $this->model->text = '<p>&laquo;Mplace.uz&raquo; работает над этим вопросом, но нужно учесть, что правильная установка техники влияет на работоспособность товара. Установка (подключение) товара разрешена только организациям, у которых есть разрешение на установку. Также, мастер фирмам, авторизированных на распространение и обслуживание того или иного товара. Гарантию на монтаж даёт та организация, которая занимается установкой.</p>';
        $this->model->faqs_type_id = 1;
        $this->model->role = "";
        $this->save();


    }

}
