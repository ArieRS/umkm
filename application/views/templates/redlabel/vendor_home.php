
<body>
<div id="wrapper">
    <div id="content">
        <?php if ($multiVendor == 1) { ?>
            <div id="top-user-panel">
                <div class="container">
                    <a href="<?= LANG_URL . '/vendor/login' ?>" class="btn btn-blue-round pull-right"><?= lang('u_login') ?></a>
                    <a href="<?= LANG_URL . '/vendor/register' ?>" class="btn btn-blue-round pull-right"><?= lang('register_me') ?></a>

                    <!--<form class="form-inline" method="POST" action="<?= LANG_URL . '/vendor/login' ?>">
                                <div class="form-group">
                                    <input type="email" name="u_email" class="form-control" placeholder="<?= lang('email') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="u_password" class="form-control" placeholder="<?= lang('password') ?>">
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember_me"><?= lang('remember_me') ?></label>
                                </div>
                                <button type="submit" name="login" class="btn btn-blue-round"><?= lang('u_login') ?></button>
                            </form> -->
                </div>
            </div>
        <?php } ?>

        <div id="top-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 left">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url('attachments/site_logo/' . $sitelogo) ?>" class="site-logo" alt="<?= $_SERVER['HTTP_HOST'] ?>">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-5">
                        <div class="input-group" id="adv-search">
                            <input type="text" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>" id="search_in_title" class="form-control" placeholder="<?= lang('search_by_keyword_title') ?>" />
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                        <button type="button" class="button-more dropdown-toggle mine-color" data-toggle="dropdown" aria-expanded="false"><?= lang('more') ?> <span class="caret"></span></button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <form class="form-horizontal" method="GET" action="<?= isset($vendor_url) ? $vendor_url : LANG_URL ?>" id="bigger-search">
                                                <input type="hidden" name="category" value="<?= isset($_GET['category']) ? $_GET['category'] : '' ?>">
                                                <input type="hidden" name="in_stock" value="<?= isset($_GET['in_stock']) ? $_GET['in_stock'] : '' ?>">
                                                <input type="hidden" name="search_in_title" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>">
                                                <input type="hidden" name="order_new" value="<?= isset($_GET['order_new']) ? $_GET['order_new'] : '' ?>">
                                                <input type="hidden" name="order_price" value="<?= isset($_GET['order_price']) ? $_GET['order_price'] : '' ?>">
                                                <input type="hidden" name="order_procurement" value="<?= isset($_GET['order_procurement']) ? $_GET['order_procurement'] : '' ?>">
                                                <input type="hidden" name="brand_id" value="<?= isset($_GET['brand_id']) ? $_GET['brand_id'] : '' ?>">
                                                <div class="form-group">
                                                    <label for="quantity_more"><?= lang('quantity_more_than') ?></label>
                                                    <input type="text" value="<?= isset($_GET['quantity_more']) ? $_GET['quantity_more'] : '' ?>" name="quantity_more" id="quantity_more" placeholder="<?= lang('type_a_number') ?>" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="added_after"><?= lang('added_after') ?></label>
                                                            <div class="input-group date">
                                                                <input type="text" value="<?= isset($_GET['added_after']) ? $_GET['added_after'] : '' ?>" name="added_after" id="added_after" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="added_before"><?= lang('added_before') ?></label>
                                                            <div class="input-group date">
                                                                <input type="text" value="<?= isset($_GET['added_before']) ? $_GET['added_before'] : '' ?>" name="added_before" id="added_before" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="search_in_body"><?= lang('search_by_keyword_body') ?></label>
                                                    <input class="form-control" value="<?= isset($_GET['search_in_body']) ? $_GET['search_in_body'] : '' ?>" name="search_in_body" id="search_in_body" type="text" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="price_from"><?= lang('price_from') ?></label>
                                                            <input type="text" value="<?= isset($_GET['price_from']) ? $_GET['price_from'] : '' ?>" name="price_from" id="price_from" class="form-control" placeholder="<?= lang('type_a_number') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="price_to"><?= lang('price_to') ?></label>
                                                            <input type="text" name="price_to" value="<?= isset($_GET['price_to']) ? $_GET['price_to'] : '' ?>" id="price_to" class="form-control" placeholder="<?= lang('type_a_number') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-inner-search">
                                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                </button>
                                                <a class="btn btn-default" id="clear-form" href="javascript:void(0);"><?= lang('clear_form') ?></a>
                                            </form>
                                        </div>
                                    </div>
                                    <button type="button" onclick="submitForm()" class="btn-go-search mine-color">
                                        <img src="<?= base_url('template/imgs/search-ico.png') ?>" alt="Search">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="basket-box">
                            <table>
                                <tr>
                                    <td>
                                        <img src="<?= base_url('template/imgs/green-basket.png') ?>" class="green-basket" alt="">
                                    </td>
                                    <td>
                                        <div class="center">
                                            <h4><?= lang('your_basket') ?></h4>
                                            <a href="<?= LANG_URL . '/checkout' ?>"><?= lang('checkout_top_header') ?></a> |
                                            <a href="<?= LANG_URL . '/shopping-cart' ?>"><?= lang('shopping_cart_only') ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="shop-dropdown">
                                            <li class="dropdown text-center">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <div><span class="sumOfItems"><?= $cartItems['array'] == 0 ? 0 : $sumOfItems ?></span> <?= lang('items') ?></div>
                                                    <img src="<?= base_url('template/imgs/shopping-cart-icon-515.png') ?>" alt="">
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right dropdown-cart" role="menu">
                                                    <?= $load::getCartItems($cartItems) ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar gradient-color">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php if ($naviText != null) { ?>
                        <a class="navbar-brand" href="<?= base_url() ?>"><?= $naviText ?></a>
                    <?php } ?>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" style="<?= $naviText == null ? 'margin-left:-15px;' : '' ?>">
                        <li<?= uri_string() == '' || uri_string() == MY_LANGUAGE_ABBR ? ' class="active"' : '' ?>><a href="<?= LANG_URL ?>"><?= lang('home') ?></a></li>
                        <?php
                        if (!empty($nonDynPages)) {
                            foreach ($nonDynPages as $addonPage) {
                                ?>
                                <li<?= uri_string() == $addonPage || uri_string() == MY_LANGUAGE_ABBR . '/' . $addonPage ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/' . $addonPage ?>"><?= mb_ucfirst(lang($addonPage)) ?></a></li>
                                <?php
                            }
                        }
                        if (!empty($dynPages)) {
                            foreach ($dynPages as $addonPage) {
                                ?>
                                <li<?= urldecode(uri_string()) == 'page/' . $addonPage['pname'] || uri_string() == MY_LANGUAGE_ABBR . '/' . 'page/' . $addonPage['pname'] ? ' class="active"' : ''
                                ?>><a href="<?= LANG_URL . '/page/' . $addonPage['pname'] ?>"><?= mb_ucfirst($addonPage['lname']) ?></a></li>
                                <?php
                            }
                        }
                        ?>
                        <li<?= uri_string() == 'checkout' || uri_string() == MY_LANGUAGE_ABBR . '/checkout' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/checkout' ?>"><?= lang('checkout') ?></a></li>
                        <li<?= uri_string() == 'shopping-cart' || uri_string() == MY_LANGUAGE_ABBR . '/shopping-cart' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/shopping-cart' ?>"><?= lang('shopping_cart') ?></a></li>
                        <li<?= uri_string() == 'contacts' || uri_string() == MY_LANGUAGE_ABBR . '/contacts' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/contacts' ?>"><?= lang('contacts') ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
<body>
<div id="wrapper">
    <div id="content">
        <div id="top-part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-5">
                        <div class="input-group" id="adv-search">
                            <input type="text" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>" id="search_in_title" class="form-control" placeholder="<?= lang('search_by_keyword_title') ?>" />
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                        <button type="button" class="button-more dropdown-toggle mine-color" data-toggle="dropdown" aria-expanded="false"><?= lang('more') ?> <span class="caret"></span></button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <form class="form-horizontal" method="GET" action="<?= isset($vendor_url) ? $vendor_url : LANG_URL ?>" id="bigger-search">
                                                <input type="hidden" name="category" value="<?= isset($_GET['category']) ? $_GET['category'] : '' ?>">
                                                <input type="hidden" name="in_stock" value="<?= isset($_GET['in_stock']) ? $_GET['in_stock'] : '' ?>">
                                                <input type="hidden" name="search_in_title" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>">
                                                <input type="hidden" name="order_new" value="<?= isset($_GET['order_new']) ? $_GET['order_new'] : '' ?>">
                                                <input type="hidden" name="order_price" value="<?= isset($_GET['order_price']) ? $_GET['order_price'] : '' ?>">
                                                <input type="hidden" name="order_procurement" value="<?= isset($_GET['order_procurement']) ? $_GET['order_procurement'] : '' ?>">
                                                <input type="hidden" name="brand_id" value="<?= isset($_GET['brand_id']) ? $_GET['brand_id'] : '' ?>">
                                                <div class="form-group">
                                                    <label for="quantity_more"><?= lang('quantity_more_than') ?></label>
                                                    <input type="text" value="<?= isset($_GET['quantity_more']) ? $_GET['quantity_more'] : '' ?>" name="quantity_more" id="quantity_more" placeholder="<?= lang('type_a_number') ?>" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="added_after"><?= lang('added_after') ?></label>
                                                            <div class="input-group date">
                                                                <input type="text" value="<?= isset($_GET['added_after']) ? $_GET['added_after'] : '' ?>" name="added_after" id="added_after" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="added_before"><?= lang('added_before') ?></label>
                                                            <div class="input-group date">
                                                                <input type="text" value="<?= isset($_GET['added_before']) ? $_GET['added_before'] : '' ?>" name="added_before" id="added_before" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="search_in_body"><?= lang('search_by_keyword_body') ?></label>
                                                    <input class="form-control" value="<?= isset($_GET['search_in_body']) ? $_GET['search_in_body'] : '' ?>" name="search_in_body" id="search_in_body" type="text" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="price_from"><?= lang('price_from') ?></label>
                                                            <input type="text" value="<?= isset($_GET['price_from']) ? $_GET['price_from'] : '' ?>" name="price_from" id="price_from" class="form-control" placeholder="<?= lang('type_a_number') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="price_to"><?= lang('price_to') ?></label>
                                                            <input type="text" name="price_to" value="<?= isset($_GET['price_to']) ? $_GET['price_to'] : '' ?>" id="price_to" class="form-control" placeholder="<?= lang('type_a_number') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-inner-search">
                                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                </button>
                                                <a class="btn btn-default" id="clear-form" href="javascript:void(0);"><?= lang('clear_form') ?></a>
                                            </form>
                                        </div>
                                    </div>
                                    <button type="button" onclick="submitForm()" class="btn-go-search mine-color">
                                        <img src="<?= base_url('template/imgs/search-ico.png') ?>" alt="Search">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="basket-box">
                            <table>
                                <tr>
                                    <td>
                                        <img src="<?= base_url('template/imgs/green-basket.png') ?>" class="green-basket" alt="">
                                    </td>
                                    <td>
                                        <div class="center">
                                            <h4><?= lang('your_basket') ?></h4>
                                            <a href="<?= LANG_URL . '/checkout' ?>"><?= lang('checkout_top_header') ?></a> |
                                            <a href="<?= LANG_URL . '/shopping-cart' ?>"><?= lang('shopping_cart_only') ?></a>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-->
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container" id="home-page">
    <div class="row">
<!--        <div class="col-md-3">-->
<!--            <div class="filter-sidebar">-->
<!--                <div class="title">-->
<!--                    <span>--><?//= lang('categories') ?><!--</span>-->
<!--                    --><?php //if (isset($_GET['category']) && $_GET['category'] != '') { ?>
<!--                        <a href="javascript:void(0);" class="clear-filter" data-type-clear="category" data-toggle="tooltip" data-placement="right" title="--><?//= lang('clear_the_filter') ?><!--"><i class="fa fa-times" aria-hidden="true"></i></a>-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--                <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">-->
<!--                    <span class="show-sp">--><?//= lang('showXsNav') ?><!--<i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></span>-->
<!--                    <span class="hidde-sp">--><?//= lang('hideXsNav') ?><!--<i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></span>-->
<!--                </a>-->
<!--                <div id="nav-categories">-->
<!--                    --><?php
//
//                    function loop_tree($pages, $is_recursion = false)
//                    {
//                        ?>
<!--                        <ul class="--><?//= $is_recursion === true ? 'children' : 'parent' ?><!--">-->
<!--                            --><?php
//                            foreach ($pages as $page) {
//                                $children = false;
//                                if (isset($page['children']) && !empty($page['children'])) {
//                                    $children = true;
//                                }
//                                ?>
<!--                                <li>-->
<!--                                    --><?php //if ($children === true) {
//                                        ?>
<!--                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>-->
<!--                                    --><?php //} else { ?>
<!--                                        <i class="fa fa-circle-o" aria-hidden="true"></i>-->
<!--                                    --><?php //} ?>
<!--                                    <a href="javascript:void(0);" data-categorie-id="--><?//= $page['id'] ?><!--" class="go-category left-side --><?//= isset($_GET['category']) && $_GET['category'] == $page['id'] ? 'selected' : '' ?><!--">-->
<!--                                        --><?//= $page['name'] ?>
<!--                                    </a>-->
<!--                                    --><?php
//                                    if ($children === true) {
//                                        loop_tree($page['children'], true);
//                                    } else {
//                                        ?>
<!--                                    </li>-->
<!--                                    --><?php
//                                }
//                            }
//                            ?>
<!--                        </ul>-->
<!--                        --><?php
//                        if ($is_recursion === true) {
//                            ?>
<!--                            </li>-->
<!--                            --><?php
//                        }
//                    }
//
//                    loop_tree($home_categories);
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //if ($showBrands == 1) { ?>
<!--                <div class="filter-sidebar">-->
<!--                    <div class="title">-->
<!--                        <span>--><?//= lang('brands') ?><!--</span>-->
<!--                        --><?php //if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
<!--                            <a href="javascript:void(0);" class="clear-filter" data-type-clear="brand_id" data-toggle="tooltip" data-placement="right" title="--><?//= lang('clear_the_filter') ?><!--"><i class="fa fa-times" aria-hidden="true"></i></a>-->
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--                    <ul>-->
<!--                        --><?php //foreach ($brands as $brand) { ?>
<!--                            <li>-->
<!--                                <i class="fa fa-chevron-right" aria-hidden="true"></i> <a href="javascript:void(0);" data-brand-id="--><?//= $brand['id'] ?><!--" class="brand --><?//= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ? 'selected' : '' ?><!--">--><?//= $brand['name'] ?><!--</a>-->
<!--                            </li>-->
<!--                        --><?php //} ?>
<!--                    </ul>-->
<!--                </div>-->
<!--            --><?php //} if ($showOutOfStock == 1) { ?>
<!--                <div class="filter-sidebar">-->
<!--                    <div class="title">-->
<!--                        <span>--><?//= lang('store') ?><!--</span>-->
<!--                        --><?php //if (isset($_GET['in_stock']) && $_GET['in_stock'] != '') { ?>
<!--                            <a href="javascript:void(0);" class="clear-filter" data-type-clear="in_stock" data-toggle="tooltip" data-placement="right" title="--><?//= lang('clear_the_filter') ?><!--"><i class="fa fa-times" aria-hidden="true"></i></a>-->
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0);" data-in-stock="1" class="in-stock --><?//= isset($_GET['in_stock']) && $_GET['in_stock'] == '1' ? 'selected' : '' ?><!--">--><?//= lang('in_stock') ?><!-- (--><?//= $countQuantities['in_stock'] ?><!--)</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="javascript:void(0);" data-in-stock="0" class="in-stock --><?//= isset($_GET['in_stock']) && $_GET['in_stock'] == '0' ? 'selected' : '' ?><!--">--><?//= lang('out_of_stock') ?><!-- (--><?//= $countQuantities['out_of_stock'] ?><!--)</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            --><?php //} if ($shippingOrder != 0 && $shippingOrder != null) { ?>
<!--                <div class="filter-sidebar">-->
<!--                    <div class="title">-->
<!--                        <span>--><?//= lang('freeShippingHeader') ?><!--</span>-->
<!--                    </div>-->
<!--                    <div class="oaerror info">-->
<!--                        <strong>--><?//= lang('promo') ?><!--</strong> - --><?//= str_replace(array('%price%', '%currency%'), array($shippingOrder, CURRENCY), lang('freeShipping')) ?><!--!-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!--        </div>-->
        <div class="col-md-9 eqHeight" id="products-side">
            <div class="alone title">
                <span><?= lang('products') ?></span>
            </div>
            <div class="product-sort gradient-color">
                <div class="row">
                    <div class="ord col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-order-to="order_new">
                                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?> <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc"><?= lang('new') ?> </option>
                                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('old') ?> </option>
                            </select>
                        </div>
                    </div>
                    <div class="ord col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-order-to="order_price" title="<?= lang('price_title') ?>..">
                                <option label="<?= lang('not_selected') ?>"></option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('price_low') ?> </option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('price_high') ?> </option>
                            </select>
                        </div>
                    </div>
                    <div class="ord col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-order-to="order_procurement" title="<?= lang('procurement_title') ?>..">
                                <option label="<?= lang('not_selected') ?>"></option>
                                <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('procurement_desc') ?> </option>
                                <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('procurement_asc') ?> </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (!empty($products)) {
                $load::getProducts($products, 'col-sm-4 col-md-4', false);
            } else {
                ?>
                <script>
                    $(document).ready(function () {
                        ShowNotificator('alert-info', '<?= lang('no_results') ?>');
                    });
                </script>
                <?php
            }
            ?>
        </div>
    </div>
    <?php if ($links_pagination != '') { ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?= $links_pagination ?>
            </div>
        </div>
    <?php } ?>
</div>
        <!-- footer-->
        <?php if ($this->session->flashdata('emailAdded')) { ?>
            <script>
                $(document).ready(function () {
                    ShowNotificator('alert-info', '<?= lang('email_added') ?>');
                });
            </script>
            <?php
        }
        echo $addedJs;
        ?>
    </div>
</div>
<div id="notificator" class="alert"></div>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-confirmation.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap-select-1.12.1/js/bootstrap-select.min.js') ?>"></script>
<script src="<?= base_url('assets/js/placeholders.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script>
    var variable = {
        clearShoppingCartUrl: "<?= base_url('clearShoppingCart') ?>",
        manageShoppingCartUrl: "<?= base_url('manageShoppingCart') ?>",
        discountCodeChecker: "<?= base_url('discountCodeChecker') ?>"
    };
</script>
<script src="<?= base_url('assets/js/system.js') ?>"></script>
<script src="<?= base_url('templatejs/mine.js') ?>"></script>
</body>
        <footer>
            <div class="footer" id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6 f-col">
                            <h3><?= lang('about_us') ?></h3>
                            <p><?= $footerAboutUs ?></p>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6 f-col">
                            <h3><?= lang('pages') ?></h3>
                            <ul>
                                <li><a href="<?= base_url() ?>">» <?= lang('home') ?> </a></li>
                                <li><a href="<?= LANG_URL . '/checkout' ?>">» <?= lang('checkout') ?> </a></li>
                                <li><a href="<?= LANG_URL . '/contacts' ?>">» <?= lang('contacts') ?> </a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6 f-col">
                            <h3><?= lang('categories') ?></h3>
                            <?php if (!empty($footerCategories)) { ?>
                                <ul>
                                    <?php foreach ($footerCategories as $key => $categorie) { ?>
                                        <li><a href="javascript:void(0);" data-categorie-id="<?= $key ?>" class="go-category"><?= $categorie ?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } else { ?>
                                <p><?= lang('no_categories') ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6 f-col">
                            <h3><?= lang('contacts') ?></h3>
                            <ul class="footer-icon">
                                <?php if ($footerContactAddr != '') { ?>
                                    <li>
                                        <span class="pull-left"><i class="fa fa-map-marker"></i></span>
                                        <span class="pull-left f-cont-info"> <?= $footerContactAddr ?></span>
                                    </li>
                                <?php }if ($footerContactPhone != '') { ?>
                                    <li>
                                        <span class="pull-left"><i class="fa fa-phone"></i></span>
                                        <span class="pull-left f-cont-info"> <?= $footerContactPhone ?></span>
                                    </li>
                                <?php } if ($footerContactEmail != '') { ?>
                                    <li>
                                        <span class="pull-left"><i class="fa fa-envelope"></i></span>
                                        <span class="pull-left f-cont-info"><a href="mailto:<?= $footerContactEmail ?>"><?= $footerContactEmail ?></a></span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 f-col">
                            <h3><?= lang('newsletter') ?></h3>
                            <ul>
                                <li>
                                    <div class="input-append newsletter-box text-center">
                                        <form method="POST" id="subscribeForm">
                                            <input type="text" class="full text-center" name="subscribeEmail" placeholder="<?= lang('email_address') ?>">
                                            <button class="btn bg-gray" onclick="checkEmailField()" type="button"> <?= lang('subscribe') ?> <i class="fa fa-long-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            <ul class="social">
                                <?php if ($footerSocialFacebook != '') { ?>
                                    <li> <a href="<?= $footerSocialFacebook ?>"><i class=" fa fa-facebook"></i></a></li>
                                <?php } if ($footerSocialTwitter != '') { ?>
                                    <li> <a href="<?= $footerSocialTwitter ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php } if ($footerSocialGooglePlus != '') { ?>
                                    <li> <a href="<?= $footerSocialGooglePlus ?>"><i class="fa fa-google-plus"></i></a></li>
                                <?php } if ($footerSocialPinterest != '') { ?>
                                    <li> <a href="<?= $footerSocialPinterest ?>"><i class="fa fa-pinterest"></i></a></li>
                                <?php } if ($footerSocialYoutube != '') { ?>
                                    <li> <a href="<?= $footerSocialYoutube ?>"><i class="fa fa-youtube"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <p class="pull-left"><?= $footerCopyright ?></p>
                    <div class="pull-right">
                        <ul class="nav nav-pills payments">
                            <li><i class="fa fa-cc-visa"></i></li>
                            <li><i class="fa fa-cc-mastercard"></i></li>
                            <li><i class="fa fa-cc-amex"></i></li>
                            <li><i class="fa fa-cc-paypal"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <?php if ($this->session->flashdata('emailAdded')) { ?>
            <script>
                $(document).ready(function () {
                    ShowNotificator('alert-info', '<?= lang('email_added') ?>');
                });
            </script>
            <?php
        }
        echo $addedJs;
        ?>
    </div>
</div>
<div id="notificator" class="alert"></div>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-confirmation.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap-select-1.12.1/js/bootstrap-select.min.js') ?>"></script>
<script src="<?= base_url('assets/js/placeholders.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script>
    var variable = {
        clearShoppingCartUrl: "<?= base_url('clearShoppingCart') ?>",
        manageShoppingCartUrl: "<?= base_url('manageShoppingCart') ?>",
        discountCodeChecker: "<?= base_url('discountCodeChecker') ?>"
    };
</script>
<script src="<?= base_url('assets/js/system.js') ?>"></script>
<script src="<?= base_url('templatejs/mine.js') ?>"></script>

