<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Sales Orders</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Sales Orders</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                    <a href="<?php echo base_url();?>add-sales-order" class="btn btn-success" style="margin-bottom: -80px;margin-left: -22px;"><i class="fa fa-plus mr-2"></i> Add New Sales Order</a>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sales Orders</h5>
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>SO Number</th>
                        <th>Customer Name</th>
                        <th>Grand Total</th>
                        <th>SO Date</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($sales_orders)) 
                    {
                        foreach ($sales_orders as $key => $value) 
                        {
                            ?>
                                <tr class="gradeX" id="sales-order-<?=$value->order_id?>">
                                    <td><a href="<?php echo base_url();?>print-sales-order/<?=$value->sales_order_number;?>"><?=$value->sales_order_number;?></a></td>
                                    <td><?=$value->customer_name;?></td>
                                    <td><?=$value->grand_total;?></td>
                                    <td><?=$value->bill_date;?></td>
                                    <td class="center"><?=$value->created_at;?></td>
                                    <td>
                                        <!-- <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#print-sales-order"  data-id="<?=$value->sales_order_number?>" name="print_sales_order" id="print_sales_order">Print</a> -->
                                        <a href="javascript:{}" class="btn btn-danger delete-sales-order" data-index="<?=$value->order_id?>" name="delete-sales-order">Delete</a><br></td>
                                </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            
        </div>
    

<script>
     $("a[name=delete-sales-order]").on("click", function () { 
            var order_id = $(this).data("index"); 
            $.ajax({
                url: 'delete-sales-order',
                type: 'POST',
                data:  { 'id' : order_id},
                success: function(response,status,xhr) {
                    console.info(response);
                    if (response) 
                    {
                              $(".delete-sales-order").closest("#sales-order-"+order_id).remove();
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.success('Good Work', 'Sales Order Deleted Successfully');

                                }, 1300);
                    }
                    else
                    {
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.error('Oops', 'Something went wrong');

                                }, 1300);
                    }

                }
            }); 
        });
</script>
<?php
if($error = $this->session->flashdata('add_success'))
{
?>
    <script>
        setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('<?php echo $this->session->flashdata('add_success'); ?>', 'Success');

            }, 1300);
    </script>
<?php
}
elseif($error = $this->session->flashdata('add_failed'))
{
?>
    <script>
        setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('<?php echo $this->session->flashdata('add_failed'); ?>', 'Error');

            }, 1300);
    </script>
<?php
}
?>
    