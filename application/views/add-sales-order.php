<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Sales Order</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Sales Order</strong>
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
                        <h5>Sales Order <small>Add Sales Order Details</small></h5>
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
                            <div class="col-sm-4 b-r">
                                    <div class="form-group">
                                        <label>Customer Phone</label> 
                                        <input type="text" name="customer_phone" id="customer_phone" class="form-control" placeholder="Enter Customer Phone Number">
                                        <a href="<?php echo base_url();?>customers"><i class="fa fa-plus mr-2"></i>Add New Customer</a>
                                    </div>
                            </div>
                            <div class="col-sm-2 b-r">
                            	<div class="form-group">
                                    <label>Customer Name</label><br>
                                    <label for="" id="customer_name" class="font-noraml"></label>
                                    <input type="hidden" name="customer_id" id="customer_id">
                                </div>
                            </div>
                            <div class="col-sm-2 b-r">
                            	<div class="form-group">
                                    <label>Customer Email</label><br>
                                    <label for="" id="customer_email" class="font-noraml"></label>
                                </div>
                            </div>
                            <div class="col-sm-2 b-r">
                            	<div class="form-group">
                                    <label>Customer Address</label><br>
                                    <label for="" id="customer_address" class="font-noraml"></label>
                                </div>
                            </div>
                            <div class="col-sm-2 b-r">
                            	<div class="form-group">
                                    <label>Customer Group</label><br> 
                                    <label for="" id="group_name" class="font-noraml"></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4 b-r">
                            	<div class="form-group" id="data_1">
                            		<label>Select Bill Date</label>
                            		<div class="input-group date">
                            			<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014" name="bill_date" id="bill_date">
                            		</div>
                            	</div>
                            </div>
                            <div class="col-sm-4 b-r">
                            	<div class="form-group">
                            		<label>Select Bill Type</label>
                            		<select class="form-control select2_demo_2" name="bill_type" id="bill_type">
                                        <option>Select Bill Type</option>
                                        <option value="General Bill">General Bill</option>
                                        <option value="GST Bill">GST Bill</option>
                                    </select>
                            	</div>
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
                            	<div class="col-sm-3">
                            		<div class="form-group">
	                                    <label for="exampleInputEmail2" class="br-only">Enter Barcode</label><br>
	                                    <input type="text" class="form-control" name="barcode" id="barcode">
	                                    <input type="hidden" name="product_name" id="product_name">
	                                    <input type="hidden" name="brand_name" id="brand_name">
	                                    <input type="hidden" name="product_id" id="product_id">
	                                    <input type="hidden" name="brand_id" id="brand_id">
	                                </div>	
                            	</div>
                                <div class="col-sm-2">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail2" class="br-only">Avail. Qty</label><br>
	                                    <label for="exampleInputEmail2" class="br-only font-noraml" id="available_quantity"></label>
	                                </div>
	                            </div>
	                            <div class="col-sm-2">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail2" class="br-only">Price</label><br>
	                                    <label for="exampleInputEmail2" class="br-only font-noraml" id="price"></label>
	                                </div>
	                            </div>

                                <div class="col-sm-2">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail2" class="br-only">Enter Quantity</label><br>
	                                    <input type="text" id="quantity" name="quantity" class="form-control"">
	                                </div>
	                            </div>&nbsp;&nbsp;
	                            <div class="col-sm-2">
	                                <div class="form-group">
	                                    <label for="exampleInputEmail2" class="br-only">Sub Total</label><br>
	                                    <label for="exampleInputEmail2" class="br-only font-noraml" id="sub_total"></label>
	                                </div>
	                            </div>
	                            <div class="col-sm-1">
	                            	<label for=""></label>
	                            	<a href="javascript:{}" class="btn btn-icon btn-primary" id="add-row"><i class="fa fa-plus" style="margin-bottom: -60px"></i> </a>	
	                            </div>
                                
                            </div>
                            <br><br><br>
                            <table class="table table-bordered" style="margin-top: 24px;" id="items" >
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th >Barcode</th>
                                                    <th>Brand</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="package_product_body">


                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th width="34%">Product</th>
                                                    <th>Barcode</th>
                                                    <th>Brand</th>
                                                    <th width="10%">Qty</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <br><br><br>
                                                    <label for="sales_note" class="col-2 col-form-label">Note</label>
                                                    <textarea class="form-control" id="note" name="note" ></textarea>
                                                </div>
                                                <div class="col-md-4 pull-right">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>Rs. <span id="main_subtotal"></span></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Discount (%)</th>
                                                            <td>
                                                                <input type="text" name="discount" id="discount" class="form-control">
                                                                <span id="error-discount" class="text-danger"></span>
                                                                Amount: Rs. <span id="discount_value"></span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Tax </th>
                                                            <td>
                                                                <select class="form-control select2 tax" id="tax">
                                                                    <option>Select Tax</option>
                                                                   <option value="18">GST 18%</option>
                                                                   <option value="0">Tax Inclusive</option>
                                                                </select>

                                                                Amount: Rs.  <span id="tax_value"></span>
                                                            </td>
                                                        </tr>
                                                        <tr class="total-table">
                                                            <th>Grand Total</th>
                                                            <td>Rs. <span id="grand_total"></span></td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <th>Due Amount</th>
                                                            <th>
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox"  class="custom-control-input">
                                                                    <span class="custom-control-indicator"></span>
                                                                </label>
                                                            </th>
                                                        </tr>
                                                        <tr class="due_status">
                                                            <th>Amount Paid</th>
                                                            <td><input type="text" class="form-control" id="amount_pid" name="amount_pid">
                                                                <span id="error-amount-paid" class="text-danger"></span>
                                                            </td>
                                                        
                                                        </tr>
                                                        <tr class="due_status">
                                                            <th>Due Date</th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input class="form-control due_date" type="date" name="due_date">
                                                                    <span class="input-group-addon"><i class="mdi mdi-calendar-check"></i></span>
                                                                </div>input-group
                                                            </td>
                                                        </tr> -->
                                                        </tbody>
                                                    </table>
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
                                <a href="javascript:void(0);"  id="saveInvoice" class="btn btn-success waves-light waves-effect w-md">Save Sales Order Order</a>
                            </div>
                        </div>
        </div>



<!-- Script For Adding Purchase Order -->
<script>

    var products1=[];
    var subtotal=0;
    var total=0;

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

                a.barcode = $('#barcode').val();
                a.product_id = $('#product_id').val();
				a.product_name = $('#product_name').val();
                a.brand_id = $('#brand_id').val();
                a.brand_name =$('#brand_name').val();
                a.price =$('#sub_total').text();
				a.quantity = parseInt($('#quantity').val());

                window.products1.push(a);

                window.products1.forEach(table1);

                console.log(window.products1);
                subtotal+= parseInt(a.price);
                $("#main_subtotal").text(subtotal);

                $("#barcode").val("");
                $("#product_name").val("");
                $("#product_id").val("");
                $("#brand_name").val("");
                $("#brand_name").val("");
                $("#quantity").val('');
                $("#available_quantity").text("");
                $("#price").text("");
                $("#sub_total").text("");
                $("#discount").val("");
                $("#discount_value").text("");
                $("#tax_value").text("");
                $("#grand_total").text("");



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
                    var cell6 = newRow.insertCell();
                    cell1.innerHTML = item.product_name;
                    cell2.innerHTML = item.barcode;
                    cell3.innerHTML=item.brand_name;
                    cell4.innerHTML = item.quantity;
                    cell5.innerHTML = item.price;
                    cell6.innerHTML = "<a href='javascript:{}' onclick='removeProduct(this,"+ item.id +")'  class='text-center text-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>"
                }
            });

    function removeProduct(self, id1)
    {
        $("#product_id_"+id1).remove();
        console.info(window.products1[id1].price);
        subtotal= subtotal - window.products1[id1].price;
        $("#main_subtotal").text(subtotal);
        delete window.products1[id1];
    }



    $('#saveInvoice').click(function () {

        var customer_id = $('#customer_id').val();
        var bill_date = $('#bill_date').val();
        var bill_type = $('#bill_type').val();
        var note= $('#note').val();
        var discount= $('#discount').val();
        var main_subtotal= $('#main_subtotal').text();
        var discount_value= $('#discount_value').text();
        var tax= $('#tax').val();
        var tax_value= $('#tax_value').text();
        var grand_total=$('#grand_total').text();
        var items = window.products1;
        if(!customer_id || !items.length === 0 )
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
                url: 'add-sales-order-details',
                type: "post",
                cache: false,
                async: "true",
                data: {
                    'customer_id' : customer_id,
			        'bill_date' : bill_date,
			        'bill_type' : bill_type,
			        'note': note,
			        'discount': discount,
			        'main_subtotal': main_subtotal,
			        'discount_value': discount_value,
			        'tax': tax,
			        'tax_value': tax_value,
			        'grand_total':grand_total,
			        'items' : items,
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
                            toastr.success('Sales Order Created Successfully', 'Well Done..!');

                        }, 1300);
                        $("#package_product_body").empty();
                        $('#customer_id').val("");
				        $('#bill_date').val("");
				        $('#bill_type').val("");
				        $('#note').val("");
				        $('#discount').val("");
				        $('#main_subtotal').text("");
				        $('#discount_value').text("");
				        $('#tax').val("");
				        $('#tax_value').text("");
				        $('#grand_total').text("");
				        

                   /* }*/


                },


            });

        } /*end of if*/
        return false;
    });


</script>
<!-- Script For Adding Purchase Order -->
<script>
  $(function () { 
    $( "#customer_phone" ).blur(function() {
        var customer_phone = $('#customer_phone').val();
        console.info(customer_phone);
        $.ajax({
        	type: 'POST',
        	url: 'get-customer-details',
            data: { 'customer_phone' : customer_phone}, //Pass $id
            success: function (data) {
                var a=jQuery.parseJSON(data);
                console.info(a);
                if (a === 'false') 
                {
                	$("#customer_phone").val(" ");
                	setTimeout(function() {
	                toastr.options = {
	                    closeButton: true,
	                    progressBar: true,
	                    showMethod: 'slideDown',
	                    timeOut: 4000
	                };
	                    toastr.error('Customer Not Present', 'Please add the Customer..!');

	                }, 1300);
                }
                else
                {
	                $('#customer_id').val(a.customer_id);
	                $('#customer_name').text(a.customer_name);
	                $('#customer_email').text(a.customer_email);
	                /*$('#customer_phone').text(a.customer_phone);*/
	                $('#customer_address').text(a.customer_address);
	                $('#group_name').text(a.group_name).change();

                }
			}
        });  
    });
});
</script>

<script>
  $(function () { 
    $( "#barcode" ).blur(function() {
        var barcode = $('#barcode').val();
        console.info(barcode);
        $.ajax({
        	type: 'POST',
        	url: 'get-product-details',
            data: { 'barcode' : barcode}, //Pass $id
            success: function (data) {
                var a=jQuery.parseJSON(data);
                console.info(a);
                if (a === 'false') 
                {
                	$("#barcode").val(" ");
                	setTimeout(function() {
	                toastr.options = {
	                    closeButton: true,
	                    progressBar: true,
	                    showMethod: 'slideDown',
	                    timeOut: 4000
	                };
	                    toastr.error('Barcode Not Present', 'Oops Wrong Barcode..!');

	                }, 1300);
                }
                else
                {
	                $('#available_quantity').text(a.quantity);
	                $('#price').text(a.selling_price);
	                $('#product_name').val(a.product_name);
	                $('#brand_name').val(a.brand_name);
	                $('#product_id').val(a.product_id);
	                $('#brand_id').val(a.brand_id);

                }
			}
        });  
    });
});
</script>
<script>
  $(function () { 
    $( "#quantity" ).blur(function() {
        var quantity = parseInt($('#quantity').val());
        var price = $('#price').text();
        var available_quantity = parseInt($('#available_quantity').text());
        var subtotal=quantity*price;
        if (quantity > available_quantity) 
        {
        	$( "#quantity" ).val(" ");
        	setTimeout(function() {
	                toastr.options = {
	                    closeButton: true,
	                    progressBar: true,
	                    showMethod: 'slideDown',
	                    timeOut: 4000
	                };
	                    toastr.error('Quantity you Entered is greater than available quantity', 'Oops..!');

	                }, 1300);
        }
        else
        {
        	$("#sub_total").text(subtotal);
        }
        
    });
});
</script>
<script>
  $(function () { 
    $( "#discount" ).blur(function() {
        var discount = parseInt($('#discount').val());
        var main_subtotal = parseInt($('#main_subtotal').text());
        
        var discount_amount=main_subtotal*discount/100;
        total=main_subtotal-discount_amount;
        
        $("#discount_value").text(discount_amount);
        
        
    });
});
</script>
<script>
  $(function () { 
    $( "#tax" ).change(function() {
        var tax = parseInt($('#tax').val());
        /*var discount_value = parseInt($('#discount_value').text());
        console.info(tax);

console.info(discount_value);  */      
        var tax_value=total*tax/100;
        
        var grand_total=total + tax_value;
        $("#tax_value").text(tax_value);
        $("#grand_total").text(grand_total);

        
        
    });
});
</script>