<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TRENDZ | Sales Order</title>

    <link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/backend/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/style.css" rel="stylesheet">

</head>

<body class="white-bg">
                <div class="wrapper wrapper-content p-xl">
                    <div class="ibox-content p-xl">

                            <div class="row">

                                <div class="col-sm-6">
                                    <!-- <h5>From:</h5> -->
                                    <address>
                                        <strong>Trendz.</strong><br>
                                        Bhel Chowk,Pradhikaran,Pune<br>
                                        <abbr title="Phone">P:</abbr> 9004054277
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Sales Order No.</h4>
                                    <h4 class="text-navy"><?=$sales_order[0]->sales_order_number?></h4>
                                    <span>To:</span>
                                    <address>
                                        <strong><?=$sales_order[0]->customer_name?></strong><br>
                                        <?=$sales_order[0]->customer_address?><br>
                                        <abbr title="Phone">P:</abbr> <?=$sales_order[0]->customer_phone?>
                                    </address>
                                    <p>
                                        <span><strong>Order Date:</strong> <?=$sales_order[0]->bill_date?></span><br/>
                                        <!-- <span><strong>Due Date:</strong> March 24, 2014</span> -->
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Product List</th>
                                        <th>Brand</th>
                                        <th>Barcode</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($sales_order_details)) 
                                    {
                                        foreach ($sales_order_details as $key => $value) 
                                        {
                                            ?>
                                            <tr>
                                                <td><div><strong><?=$value->product_name?></strong></div></td>
                                                <td><?=$value->brand_name?></td>
                                                <td><?=$value->barcode?></td>
                                                <td><?=$value->quantity?></td>
                                                <td><?=$value->price?></td>
                                                <td><?=$value->subtotal?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>SUB TOTAL :</strong></td>
                                    <td><?=$sales_order[0]->subtotal?></td>
                                </tr>
                                <tr>
                                    <td><strong>DISCOUNT :</strong></td>
                                    <td><?=$sales_order[0]->discount_value?></td>
                                </tr>
                                <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td><?=$sales_order[0]->tax_value?></td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td><?=$sales_order[0]->grand_total?></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="well m-t"><strong>Comments</strong>
                                <?=$sales_order[0]->note?>
                            </div>
                        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/backend/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/backend/js/inspinia.js"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
