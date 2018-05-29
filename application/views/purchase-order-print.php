<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TRENDZ | Purchase Order</title>

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
                                    <h5>From:</h5>
                                    <address>
                                        <strong>Trendz.</strong><br>
                                        Bhel Chowk,Pradhikaran,Pune<br>
                                        <abbr title="Phone">P:</abbr> 9004054277
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Purchase Order No.</h4>
                                    <h4 class="text-navy"><?=$purchase_order[0]->purchase_order_number?></h4>
                                    <span>To:</span>
                                    <address>
                                        <strong><?=$purchase_order[0]->firm_name?></strong><br>
                                        <?=$purchase_order[0]->supplier_address?><br>
                                        <abbr title="Phone">P:</abbr> <?=$purchase_order[0]->supplier_phone?>
                                    </address>
                                    <p>
                                        <span><strong>Order Date:</strong> <?=$purchase_order[0]->purchase_order_date?></span><br/>
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
                                        <th>Unit of Measure</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($purchase_order_details)) 
                                    {
                                        foreach ($purchase_order_details as $key => $value) 
                                        {
                                            ?>
                                            <tr>
                                                <td><div><strong><?=$value->product_name?></strong></div></td>
                                                <td><?=$value->brand_name?></td>
                                                <td><?=$value->unit_of_measure?></td>
                                                <td><?=$value->quantity?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <!-- <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>$1026.00</td>
                                </tr>
                                <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td>$235.98</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>$1261.98</td>
                                </tr>
                                </tbody>
                            </table> -->
                            <div class="well m-t"><strong>Comments</strong>
                                <?=$purchase_order[0]->note?>
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
