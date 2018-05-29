<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Product Stock Details</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <strong>Product Stock Details</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Product Details</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" action="<?php echo base_url();?>add-product-stock-details" method="POST" role="form">
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Purchase Order</label>
                            <div class="col-lg-8">
                                <select class="select2_demo_2 form-control" name="purchase_order_number">
                                    <option value="Without PO">Without PO</option>
                                    <?php
                                    if (!empty($purchase_order_number)) 
                                    {
                                        foreach ($purchase_order_number as $key => $value) 
                                        {
                                            ?>
                                            <option value="<?=$value->purchase_order_number?>"><?=$value->purchase_order_number?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Product</label>
                            <div class="col-lg-8">
                                <select class="select2_demo_2 form-control" name="product_id">
                                    <option value="Select Product">Select Product</option>
                                    <?php
                                    if (!empty($products)) 
                                    {
                                        foreach ($products as $key => $value) 
                                        {
                                            ?>
                                            <option value="<?=$value->product_id?>"><?=$value->product_name?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Brand</label>
                            <div class="col-lg-8">
                                <select class="select2_demo_2 form-control" name="brand_id">
                                    <option value="Select Brand">Select Brand</option>
                                    <?php
                                    if (!empty($brands)) 
                                    {
                                        foreach ($brands as $key => $value) 
                                        {
                                            ?>
                                            <option value="<?=$value->brand_id?>"><?=$value->brand_name?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select UOM</label>
                            <div class="col-lg-8">
                                <select class="select2_demo_2 form-control" name="unit_of_measure">
                                    <option>Select UOM</option>
                                    <option value="PCS">PCS</option>
                                    <option value="BOX">BOX</option>
                                    <option value="Pack">Pack</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Enter Barcode</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Enter Barcode">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Enter Quantity</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Enter Purchase Price</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="purchase_price" id="purchase_price" placeholder="Enter Purchase Price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Enter Selling Price</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="selling_price" id="selling_price" placeholder="Enter Selling Price">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save Stock" class="btn btn-primary pull-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>