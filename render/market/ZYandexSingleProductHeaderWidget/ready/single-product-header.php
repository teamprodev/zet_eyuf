<?
/**@var \zetsoft\system\kernels\ZView $this */
/**
 *
 *
 * @license SherzodMangliyev
 *
 */
use zetsoft\dbitem\shop\ProductItem;
use zetsoft\dbitem\shop\SingleProductItem;
use zetsoft\system\Az;
use zetsoft\widgets\navigat\ZBreadcrumbsWidget;

$product_id = $this->httpGet('id');
$product = Az::$app->market->product->product($product_id, null, true);

if (!isset($product) || $product === null) {
    $product = new SingleProductItem();
    $product->id = 2;
    $product->name = 'Смартфон HONOR 30 8/256GB';
    $product->title = 'Test Desc';
    $product->new_price = 39990;
    $product->price_old = 188920;
    $product->barcode = 34234234;
    $product->exist = ProductItem::exists['not'];
    $product->image = [
        'https://images.pexels.com/photos/1095550/pexels-photo-1095550.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://previews.123rf.com/images/veneratio/veneratio1511/veneratio151100044/48203428-landscape-iamge-of-river-flowing-through-lush-green-forest-in-summer.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVDh2D2fzRSBYnwaA-70G74wjOeeZWbRnEVBMxfu1jVqcP9fMv&usqp=CAU',
    ];
    $product->currency = 'сум';
    $product->currencyType = 'after';
    $product->measure = 'шт';
    $product->rating = 3.5;
    $product->discount = -10;
    $product->catalogId = 19;
    $product->sale = 'sdadsa';
    $product->is_multi = false;
    $product->in_wish = false;
    $product->in_compare = false;
    $product->reviewCount = 15;
}

?>

<div class="card-title w-100 px-3 my-3">

    <?

    if (isset($companyId))

        echo ZBreadcrumbsWidget::widget([
            'config' => [
                /*'mainUrl' => '/shop/user/product/single-productAzizjonSherzod2.php',*/
                'mode' => ZBreadcrumbsWidget::mode['category'],
                'category_id' => $companyId,
            ]
        ])
    ?>
    <!--todo:start ShezodMangliyev-->
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-3">
        <h2 class="ml-3"><?= $product->name ?></h2>
        <h3 class="mr-2 mt-0 ml-3"><? if ($product->currencyType == 'before') {
                echo $product->currency;
            }
            if (!$product->is_multi) {
                echo number_format($product->new_price, 0, '.', ' ');
                if ($product->currencyType == 'after') {
                    echo $product->currency;
                }
            } else {
                echo number_format($product->min_price, 0, '.', ' ');
                if ($product->currencyType == 'after') {
                    echo $product->currency;
                }
                echo ' - ';
                echo number_format($product->max_price, 0, '.', ' ');
                if ($product->currencyType == 'after') {
                    echo $product->currency;
                }
            }

            ?></h3>
    </div>
    <div class="row ml-0">
        <div class="col-md-12 bg-white py-2">
            <? if (!empty($product)) : ?>
                <!-- Answer and question  icons -->
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="fp-20">
                        <span class="badge badge-success fp-16 mr-3"><?= number_format($product->rating, 1) ?></span>
                        <a href="review.aspx?id=<?= $product->id ?>">
                            <span class="text-muted mr-3 fp-20"><?= $product->reviewCount . Az::l(" отзывов") ?></span>
                        </a>
                        <a href="/shop/user/product-single/questions-answers.aspx?id=<?= $product->id ?>">
                            <span class="text-muted fp-20"><?= $product->reviewCount . Az::l(" вопросов") ?> </span>
                        </a>
                    </div>
                    <!--todo:end ShezodMangliyev-->

                    <!-- Wish and Compare -->
                    <div class="mt-2">
                        <div class="d-flex px-2">
                            <a class="text-muted mb-1 hint--top"
                               aria-label="<?= Az::l('Добавить в избранное') ?>"
                               onclick="add_wish_list(<?= $product->id; ?>,$(this),true)"
                            >
                                <i class="fas fa-heart fp-20 <?= $product->in_wish ? 'text-success' : '' ?>"></i> <span
                                        class="fp-20"> <?= Az::l('В избранное') ?></span>
                            </a>
                            <a class="text-muted ml-4 mb-1 hint--top"
                               aria-label="<?= Az::l('Добавить к сравнению') ?>"
                               onclick="add_compare_list(<?= $product->id; ?>,$(this),false)"
                            >
                                <i class="far fa-chart-bar fp-20 <?= $product->in_compare ? 'text-success' : '' ?>"> </i>
                                <span
                                        class="fp-20"> <?= Az::l('Сравнить') ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            <? endif ?>
        </div>
    </div>

</div>

