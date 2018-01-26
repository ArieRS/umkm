<?php
$timeNow = time();
?>
<?php if ($this->session->flashdata('update_vend_err')) { ?>
    <div class="alert alert-danger"><?= implode('<br>', $this->session->flashdata('update_vend_err')) ?></div>
<?php } ?>
<?php if ($this->session->flashdata('update_vend_details')) { ?>
    <div class="alert alert-success"><?= $this->session->flashdata('update_vend_details') ?></div>
<?php } ?>
<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/bootstrap-select-1.12.1/bootstrap-select.min.css') ?>">
<div class="container" id="checkout-page">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="content">
            <form class="form-box" method="POST" action="<?= LANG_URL . '/vendor/profile' ?>" id="goOrder">
                <div class="form-group">
                    <label><?= lang('name') ?> (<sup><?= lang('requires') ?></sup>)</label>
                    <input style="display: inline-block" type="text" class="form-control" value="<?= $vendor_name  ?>" name="vendor_name">
                </div>
                <div class="form-group">
                    <label><?= lang('email') ?> (<sup><?= lang('requires') ?></sup>)</label>
                    <input type="text" class="form-control" value="<?=$vendor_email  ?>" name="vendor_email">
                </div>
                <div class="form-group">
                    <label><?= lang('phone') ?> (<sup><?= lang('requires') ?></sup>)</label>
                    <input type="text" class="form-control" value="<?=$vendor_phone  ?>" name="vendor_phone">
                </div>
                <div class="form-group">
                    <label><?= lang('address') ?> (<sup><?= lang('requires') ?></sup>)</label>
                    <input type="text" class="form-control" value="<?= $vendor_address  ?>" name="vendor_address">
                </div>
                <div class="form-group">
                    <label><?= lang('city') ?> (<sup><?= lang('requires') ?></sup>)</label>
                    <input type="text" class="form-control" value="<?=$vendor_city  ?>" name="vendor_city">
                </div>
                <div class="form-group">
                    <label><?= lang('post_code') ?> (<sup><?= lang('requires') ?></sup>)</label>
                    <input type="text" class="form-control" value="<?=$vendor_post_code  ?>" name="vendor_post_code">
                </div>
                <div class="form-group">
                    <button type="submit" name="saveVendorDetails" class="btn btn-default"><span
                                class="glyphicon glyphicon-floppy-disk"><?= lang('save') ?></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>