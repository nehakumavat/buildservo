<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Barcodes</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Barcodes</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add-barcode"   class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Barcode</a>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Barcodes</h5>
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
                        <th>Barcode</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($barcodes)) 
                    {
                        foreach ($barcodes as $key => $value) 
                        {
                            ?>
                                <tr class="gradeX" id="barcode-<?=$value->barcode_id?>">
                                    <td><?=$value->barcode;?></td>
                                    <td><?=$value->barcode_status;?></td>
                                    <td class="center"><?=$value->created_at;?></td>
                                    <td>
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#print-barcode"  data-id="<?=$value->barcode?>" name="print_barcode" id="print_barcode">Print</a>
                                        <a href="javascript:{}" class="btn btn-danger delete-barcode" data-index="<?=$value->barcode_id?>" name="delete-barcode">Delete</a><br></td>
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
    <div id="add-barcode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url();?>add-barcode" method="post">
                   
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">New Barcode</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Enter Number of Barcode You need to Generate</label>
                                <input class="form-control" type="text"  name="barcode_quantity"  required="" >
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Barcode</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Print Barcode modal content -->
    <div id="print-barcode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url();?>print-barcode" method="post">
                   
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Print Barcode</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Enter Number of Barcode You need to Print</label>
                                <input class="form-control" type="text"  name="print_quantity"  required="" >
                                <input type="hidden" name="barcode" id="barcode">
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Print Barcode</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
     $("a[name=delete-barcode]").on("click", function () { 
            var barcode_id = $(this).data("index"); 
            $.ajax({
                url: 'delete-barcode',
                type: 'POST',
                data:  { 'id' : barcode_id},
                success: function(response,status,xhr) {
                    console.info(response);
                    if (response) 
                    {
                              $(".delete-barcode").closest("#barcode-"+barcode_id).remove();
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.success('Good Work', 'Barcode Deleted Successfully');

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
<script>
     $("a[name=print_barcode]").on("click", function () { 
            var barcode = $(this).data("id");
            console.info(barcode); 
            $("#barcode").val(barcode);
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
    