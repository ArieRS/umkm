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
    
    ?>
    <h1><img src="<?= base_url('assets/imgs/products-img.png') ?>" class="header-img" style="margin-top:-2px;"> Slider Image</h1>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <div class="well hidden-xs"> 
                <div class="row">
                    <form method="GET" id="searchProductsForm" action="">
                        <div class="col-sm-4">
                            <label>Order:</label>
                            <select name="order_by" class="form-control selectpicker change-products-form">
                                <option <?= isset($_GET['order_by']) && $_GET['order_by'] == 'id=desc' ? 'selected=""' : '' ?> value="id=desc">Newest</option>
                                <option <?= isset($_GET['order_by']) && $_GET['order_by'] == 'id=asc' ? 'selected=""' : '' ?> value="id=asc">Latest</option>
                                <option <?= isset($_GET['order_by']) && $_GET['order_by'] == 'quantity=asc' ? 'selected=""' : '' ?> value="quantity=asc">Low Quantity</option>
                                <option <?= isset($_GET['order_by']) && $_GET['order_by'] == 'quantity=desc' ? 'selected=""' : '' ?> value="quantity=desc">High Quantity</option>
                            </select>
                        </div>
                        
                    </form>
                </div>
            </div>
            <hr>
            <?php
            if ($sliderimage) {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>                                
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($sliderimage as $row) {
                                $u_path = 'attachments/slider_image/';
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
                                        <div class="pull-right">
                                            <a href="<?= base_url('admin/publishslider/' . $row->id) ?>" class="btn btn-info">Edit</a>
                                            <a href="<?= base_url('admin/sliderimage?delete=' . $row->id) ?>"  class="btn btn-danger confirm-delete">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
            <?php
        } else {
            ?>
            <div class ="alert alert-info">No slider found!</div>
        <?php } ?>
    </div>