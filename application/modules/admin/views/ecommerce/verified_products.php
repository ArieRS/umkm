<div id="products">
    <?php
    if ($this->session->flashdata('result_delete')) {
        ?>
        <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_delete') ?></div>
        <hr>
        <?php
    }
    if ($this->session->flashdata('result_publish')) {
        ?>
        <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_publish') ?></div>
        <hr>
        <?php
    }
    $langs = $languages->result();
    ?>
    <h1><img src="<?= base_url('assets/imgs/products-img.png') ?>" class="header-img" style="margin-top:-2px;">Verified Products</h1>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <hr>
            <?php
            if ($products) {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Vendor</th>
                                <th>Position</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $row) {
                                $u_path = 'attachments/shop_images/';
                                if ($row->image != null && file_exists($u_path . $row->image)) {
                                    $image = base_url($u_path . $row->image);
                                } else {
                                    $image = base_url('attachments/no-image.png');
                                }
                                ?>

                                <tr>
                                    <td>
                                        <img src="<?= $image ?>" alt="No Image" class="img-thumbnail" style="height:100px;">
                                    </td>
                                    <td>
                                        <?= $row->title ?>
                                    </td>
                                    <td>
                                        <?= $row->price ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row->quantity > 5) {
                                            $color = 'label-success';
                                        }
                                        if ($row->quantity <= 5) {
                                            $color = 'label-warning';
                                        }
                                        if ($row->quantity == 0) {
                                            $color = 'label-danger';
                                        }
                                        ?>
                                        <span style="font-size:12px;" class="label <?= $color ?>">
                                            <?= $row->quantity ?>
                                        </span>
                                    </td>
                                    <td><?= $row->vendor_id > 0 ? '<a href="?show_vendor=' . $row->vendor_id . '">' . $row->vendor_name . '</a>' : 'No vendor' ?></td>
                                    <td><?= $row->position ?></td>
                                    <td>
                                        <div class="pull-right">
                                            <a href="<?= base_url('admin/ecommerce/publish/updatePublish/' . $row->id) ?>" class="btn btn-info"><?= lang('items_verification') ?></a>
                                            <a href="<?= base_url('admin/products?delete=' . $row->id) ?>"  class="btn btn-danger confirm-delete"><?= lang('items_delete') ?></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?= $links_pagination ?>
            </div>
            <?php
        } else {
            ?>
            <div class ="alert alert-info">No products found!</div>
        <?php } ?>
    </div>