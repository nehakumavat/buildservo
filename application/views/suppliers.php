<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Suppliers</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Suppliers</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add-supplier"   class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Supplier</a>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Supplier Records</h5>
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
                        <th>Firm Name</th>
                        <th>Supplier Name</th>
                        <th>Supplier Email</th>
                        <th>Supplier Phone</th>
                        <th>Supplier Address</th>
                        <th>PAN Number</th>
                        <th>GST Number</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($suppliers)) 
                    {
                        foreach ($suppliers as $key => $value) 
                        {
                            ?>
                                <tr class="gradeX" id="supplier-<?=$value->supplier_id?>">
                                    <td><?=$value->firm_name;?></td>
                                    <td><?=$value->supplier_name;?></td>
                                    <td><?=$value->supplier_email;?></td>
                                    <td><?=$value->supplier_phone;?></td>
                                    <td class="center"><?=$value->supplier_address;?></td>
                                    <td class="center"><?=$value->pan_number;?></td>
                                    <td class="center"><?=$value->gst_number;?></td>
                                    <td class="center"><?=$value->website;?></td>
                                    <td>
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#edit-supplier"  data-id="<?=$value->supplier_id?>" name="edit_supplier" id="edit_supplier">Edit</a>
                                        <a href="javascript:{}" class="btn btn-danger delete-supplier" data-index="<?=$value->supplier_id?>" name="delete-supplier">Delete</a><br></td>
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

    <!-- Add New Supplier modal content -->
    <div id="add-supplier" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url();?>add-supplier" method="post">
                   
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">New Supplier</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Firm Name</label>
                                <input class="form-control" type="text"  name="firm_name"  required="">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-4">
                                <label for="contact_name">Supplier name</label>
                                <input class="form-control" type="text"  name="supplier_name" required="">
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Supplier Phone</label>
                                <input class="form-control" type="text" name="supplier_phone"  required="">
                            </div>
                            <div class="col-md-4">
                                <label for="alt_phone">Supplier Email</label>
                                <input class="form-control" type="text" name="supplier_email">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-4">
                                <label for="email">PAN Number</label>
                                <input class="form-control" type="text"  name="pan_number">
                            </div>
                            <div class="col-md-4">
                                <label for="phone">GST Number</label>
                                <input class="form-control" type="text" name="gst_number">
                            </div>
                            <div class="col-md-4">
                                <label for="alt_phone">Website</label>
                                <input class="form-control" type="text" name="website">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <input class="form-control" type="text" name="supplier_address"  required="">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            
                            <div class="col-md-12">
                                <label for="emailaddress">Note</label>
                                <input class="form-control" type="text" name="note" id="note">
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Supplier</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Edit Supplier modal content -->
    <div id="edit-supplier" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url();?>update-supplier" method="post">
                   
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Edit Supplier</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Firm Name</label>
                                <input class="form-control" type="text"  name="firm_name" id="firm_name"  required="">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-4">
                                <label for="contact_name">Supplier name</label>
                                <input class="form-control" type="text"  name="supplier_name" id="supplier_name" required="">
                                <input class="form-control" type="hidden"  name="supplier_id" id="supplier_id">
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Supplier Phone</label>
                                <input class="form-control" type="text" name="supplier_phone" id="supplier_phone"  required="">
                            </div>
                            <div class="col-md-4">
                                <label for="alt_phone">Supplier Email</label>
                                <input class="form-control" type="text" name="supplier_email" id="supplier_email">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-4">
                                <label for="email">PAN Number</label>
                                <input class="form-control" type="text" name="pan_number" id="pan_number">
                            </div>
                            <div class="col-md-4">
                                <label for="phone">GST Number</label>
                                <input class="form-control" type="text" name="gst_number" id="gst_number">
                            </div>
                            <div class="col-md-4">
                                <label for="alt_phone">Website</label>
                                <input class="form-control" type="text" name="website" id="website">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <input class="form-control" type="text" name="supplier_address" id="supplier_address"  required="">
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            
                            <div class="col-md-12">
                                <label for="note">Note</label>
                                <input class="form-control" type="text" name="note" id="note">
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Supplier</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
     $("a[name=delete-supplier]").on("click", function () { 
            var supplier_id = $(this).data("index"); 
            $.ajax({
                url: 'delete-supplier',
                type: 'POST',
                data:  { 'id' : supplier_id},
                success: function(response,status,xhr) {
                    console.info(response);
                    if (response) 
                    {
                              $(".delete-supplier").closest("#supplier-"+supplier_id).remove();
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.success('Good Work', 'Supplier Deleted Successfully');

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
    $('#edit-supplier').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                
                $.ajax({
                    type: 'POST',
                    url: 'supplier',
                    data: { 'id' : id}, //Pass $id
                    success: function (data) {
                        var a=jQuery.parseJSON(data);
                        console.info(a);
                            $('#supplier_id').val(a.supplier_id);
                            $('#firm_name').val(a.firm_name);
                            $('#supplier_name').val(a.supplier_name);
                            $('#supplier_email').val(a.supplier_email);
                            $('#supplier_phone').val(a.supplier_phone);
                            $('#supplier_address').val(a.supplier_address);
                            $('#pan_number').val(a.pan_number);
                            $('#gst_number').val(a.gst_number);
                            $('#website').val(a.website);
                            $('#note').val(a.note);



                        
                    }
                });
            });
        
</script>


<?php
if($error = $this->session->flashdata('update_success'))
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
                toastr.success('<?php echo $this->session->flashdata('update_success'); ?>', 'Success');

            }, 1300);
    </script>
<?php
}
elseif($error = $this->session->flashdata('update_failed'))
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
                toastr.error('<?php echo $this->session->flashdata('update_failed'); ?>', 'Error');

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
elseif($error = $this->session->flashdata('add_success'))
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
?>
    