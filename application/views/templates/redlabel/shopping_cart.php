<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
if (!isset($_SESSION['logged_vendor'])) {
?>
<hr>
<div class="alert alert-danger">
<h4><span class="glyphicon glyphicon-alert"></span> <?= redirect(LANG_URL . '/vendor/login') ?></h4>
</div>
<hr>
<?php
}
?>

<?php
if (!isset($_SESSION['logged_vendor'])) {
redirect(LANG_URL . '/vendor/login');
}
?>


<div class="container" id="shopping-cart">
    <h1><?= lang('shopping_cart') ?></h1>
    <hr>
    <?php
    if ($cartItems['array'] == null) {
        ?>
        <div class="alert alert-info"><?= lang('no_products_in_cart') ?></div>
        <?php
    } else {
        echo purchase_steps(1);
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-products">
                <thead>
                    <tr>
                        <th><?= lang('product') ?></th>
                        <th><?= lang('title') ?></th>
                        <th><?= lang('quantity') ?></th>
                        <th><?= lang('vendor_quantity') ?></th>
                        <th><?= lang('price') ?></th>
                        <th><?= lang('total') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems['array'] as $item) { ?>
                        <tr>
                            <td class="relative">
                                <input type="hidden" name="id[]" value="<?= $item['id'] ?>">
                                <input type="hidden" name="quantity[]" value="<?= ($item['num_added']>=$item['quantity'])?$item['quantity']:$item['num_added']; ?>">
                                <img class="product-image" src="<?= base_url('/attachments/shop_images/' . $item['image']) ?>" alt="">
                                <a href="<?= base_url('home/removeFromCart?delete-product=' . $item['id'] . '&back-to=shopping-cart') ?>" class="btn btn-xs btn-danger remove-product">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                            <td><a href="<?= LANG_URL . '/' . $item['url'] ?>"><?= $item['title'] ?></a></td>
                            <td>
                                <?php if ($item['num_added'] >= $item['quantity']) {
                                    $item['num_added'] = $item['quantity'];
                                    ?>
                                <?php } else { ?>
                                <a class="btn btn-xs btn-primary refresh-me add-to-cart" data-id="<?= $item['id'] ?>" href="javascript:void(0);">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                                <?php } ?>
                                <span class="quantity-num">
                                    <?= $item['num_added'] ?>
                                </span>
                                <a class="btn  btn-xs btn-danger" onclick="removeProduct(<?= $item['id'] ?>, true)" href="javascript:void(0);">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                            </td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= CURRENCY.' '.$item['price']  ?></td>
                            <td><?= CURRENCY.' '.$item['sum_price']  ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5" class="text-right"><?= lang('total') ?></td>
                        <td><?= CURRENCY.' '.$cartItems['finalSum']?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="<?= LANG_URL ?>" class="btn btn-primary go-shop">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
            <?= lang('back_to_shop') ?>
        </a>
        <a class="btn btn-primary go-checkout" href="<?= LANG_URL . '/checkout' ?>">
            <?= lang('checkout') ?> 
            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
        </a>
    <?php } ?>
</div>
<?php
if ($this->session->flashdata('deleted')) {
    ?>
<script>
    $(document).ready(function () {
        ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
    });
</script>
<?php } ?>