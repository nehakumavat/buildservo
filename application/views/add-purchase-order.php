<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Purchase Order</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Purchase Order</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Purchase Order <small>Add Purchase Order Details</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Select Supplier</label> 
                                        <select class="select2_demo_2 form-control" name="supplier_id" id="supplier_id">
                                            <option value="">Select Supplier</option>
                                        <?php
                                        if (!empty($suppliers)) 
                                        {
                                            foreach ($suppliers as $key => $value) 
                                            {
                                                ?>
                                                <option value="<?=$value->supplier_id?>"><?=$value->supplier_name?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Shipping Address</label> 
                                        <textarea name="shipping_address" id="shipping_address" class="form-control" id="shipping_address" cols="30" rows="10"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="data_1">
                                <label class="font-noraml">Purchase Order Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014" name="purchase_order_date" id="purchase_order_date">
                                </div>
                            </div>
                            <h3 class="logo-name" style="margin-left: -20px;">TRENDZ</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Item Details<small>Add Item Details</small></h5>
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
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only">Select Product</label>
                                    <select class="select2_demo_2" name="product_id" id="product_id" style="width: 250px;">
                                        <option>Select Product</option>
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
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only">Select UOM</label>
                                    <select class="select2_demo_2" name="unit_of_measure" id="unit_of_measure" style="width: 250px;">
                                        <option>Select UOM</option>
                                        <option value="PCS">PCS</option>
                                        <option value="BOX">BOX</option>
                                        <option value="Pack">Pack</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2" class="sr-only">Select Brand</label>
                                    <select class="select2_demo_2" name="brand_id" id="brand_id" style="width: 250px;">
                                        <option>Select Brand</option>
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
                                <div class="form-group">
                                    <label for="exampleInputPassword2" class="sr-only">Quantity</label>
                                    <input type="text" placeholder="Enter Quantity" id="quantity" name="quantity" class="form-control" style="width: 250px;">
                                </div>
                                <a href="javascript:{}" class="btn btn-icon waves-effect btn-success" id="add-row"><i class="fa fa-plus "></i> Add New Item </a>
                            </div>
                            <hr><table class="table table-bordered" style="margin-top: 24px;" id="items" >
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th >UOM</th>
                                                    <th>Brand</th>
                                                    <th>Qty</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="package_product_body">


                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th width="34%">Product</th>
                                                    <th>UOM</th>
                                                    <th>Brand</th>
                                                    <th width="10%">Qty</th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br><br><br>
                                                    <label for="sales_note" class="col-2 col-form-label">Supplier Note</label>
                                                    <textarea class="form-control" id="note" name="note" ></textarea>
                                                </div>



                                            </div>




                        </div>
                    </div>
                </div>
                
        </div>
        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-link waves-effect w-md">Cancel</button>
                            </div>
                            <div class="col-md-6 pull-right text-right">
                                <!-- <button type="button" class="btn btn-light waves-light waves-effect w-md">Save and Add Another</button> -->
                                <a href="javascript:void(0);"  id="saveInvoice" class="btn btn-success waves-light waves-effect w-md">Save Purchase Order Order</a>
                            </div>
                        </div>
        </div>



<!-- Script For Adding Purchase Order -->
<script>

    var products1=[];


    $( document ).ready(function()
    {

        $( "#add-row" ).click(function() {

            if($('#quantity').val() === "" )
            {
                setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                    toastr.error('Please enter the Quantity', 'Oops..!');

                }, 1300);
             }
            else
            {
                var a = {};

                $("#package_product_body").empty();
                a.id = window.products1.length;

                a.product_id = $('#product_id option:selected').val();

                a.product_name = $('#product_id option:selected').text();

                a.unit_of_measure = $('#unit_of_measure option:selected').val();
                a.brand_id = $('#brand_id option:selected').val();
                a.brand_name =$('#brand_id option:selected').text();

                a.quantity = parseInt($('#quantity').val());

                window.products1.push(a);

                window.products1.forEach(table1);

                console.log(window.products1);


                $("#product_id option:first").text("");
                $("#quantity").val('');


            }
        });


        function table1(item, index)
        {
            var arrTables = document.getElementById('package_product_body');
            var oRows = arrTables.rows;
            var numRows = oRows.length;
            var newRow = document.getElementById('package_product_body').insertRow( numRows );
                    //$('newRow').attr('id',index);
                    newRow.id = "product_id_"+ item.id ;

                    var cell1 = newRow.insertCell();
                    var cell2 = newRow.insertCell();
                    var cell3 = newRow.insertCell();
                    var cell4 = newRow.insertCell();
                    var cell5 = newRow.insertCell();
                    cell1.innerHTML = item.product_name;
                    cell2.innerHTML = item.unit_of_measure;
                    cell3.innerHTML=item.brand_name;
                    cell4.innerHTML = item.quantity;
                    cell5.innerHTML = "<a href='javascript:{}' onclick='removeProduct(this,"+ item.id +")'  class='text-center text-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>"
                }
            });

    function removeProduct(self, id1)
    {
        $("#product_id_"+id1).remove();
        delete window.products1[id1];
    }



    $('#saveInvoice').click(function () {

        var supplier_id = $('#supplier_id').val();
        var shipping_address = $('#shipping_address').val();
        var purchase_order_date = $('#purchase_order_date').val();
        var note= $('#note').val();
        var items = window.products1;
        if(!supplier_id || !items.length === 0 )
        {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                    toastr.error('Please enter the Values', 'Oops..!');

                }, 1300);
        }

        else {

            
            $.ajax({
                url: 'add-purchase-order-details',
                type: "post",
                cache: false,
                async: "true",
                data: {
                    'supplier_id': supplier_id,
                    'shipping_address':shipping_address,
                    'purchase_order_date':purchase_order_date,
                    'note': note,
                    'items': items
                },

                success: function (data) {

                    /*if (data.status === 'success') {*/
                        setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                            toastr.success('Purchase Order Created Successfully', 'Well Done..!');

                        }, 1300);
                        $('#supplier_id').val(" ");
                        $('#quantity').val(" ");
                        $('#shipping_address').val(" ");
                        $('#shipping_address').val(" ");
                        $('#purchase_order_date').val(" ");
                        $('#note').val(" ");

                   /* }*/


                },
               /* error: function (data) {
                    if (data.status === 422) {
                        setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                            toastr.error('Something Went Wrong', 'Oops..!');

                        }, 1300);
                    }
                }*/


            });

        } /*end of if*/
        return false;
    });


</script>
<!-- Script For Adding Purchase Order -->