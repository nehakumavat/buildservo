<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Products</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Products</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add-product"   class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Product</a>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Products</h5>
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
                        <th>Product Name</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($products)) 
                    {
                        foreach ($products as $key => $value) 
                        {
                            ?>
                                <tr class="gradeX" id="product-<?=$value->product_id?>">
                                    <td><?=$value->product_name;?></td>
                                    <td class="center"><?=$value->created_at;?></td>
                                    <td>
                                        <a href="javascript:{}" class="btn btn-danger delete-product" data-index="<?=$value->product_id?>" name="delete-product">Delete</a><br></td>
                                </tr>
                            <?php
                        }
                    }
                    ?>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            
        </div>

    <!-- Add New Customer modal content -->
    <div id="add-product" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url();?>add-product" method="post">
                   
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">New Product</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Product Name</label>
                                <input class="form-control" type="text"  name="product_name"  required="" >
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
     $("a[name=delete-product]").on("click", function () { 
            var product_id = $(this).data("index"); 
            $.ajax({
                url: 'delete-product',
                type: 'POST',
                data:  { 'id' : product_id},
                success: function(response,status,xhr) {
                    console.info(response);
                    if (response) 
                    {
                              $(".delete-product").closest("#product-"+product_id).remove();
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.success('Good Work', 'Product Deleted Successfully');

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
    