<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Customer Groups</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Customers</a>
                        </li>
                        <li class="active">
                            <strong>Customer Groups</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add-customer"   class="btn btn-success" style="margin-bottom: -80px; margin-left: -30px;"><i class="fa fa-plus mr-2"></i> Add New Customer Group</a>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Customer Groups</h5>
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
                        <th>Group Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($customer_groups)) 
                    {
                        foreach ($customer_groups as $key => $value) 
                        {
                            ?>
                            <tr class="gradeX" id="group-<?=$value->group_id?>">
                                <td><?=$value->group_name?></td>
                                <td><?=$value->created_at?></td>
                                <td> <a href="javascript:{}" class="btn btn-danger delete-group" data-index="<?=$value->group_id?>" name="delete-group">Delete</a><br></td>
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
    <div id="add-customer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" action="<?php echo base_url();?>add-customer-group" method="post">
                   
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">New Customer Group</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Group Name</label>
                                <input class="form-control" type="text"  name="group_name"  required="" >
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Group</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
<script>
     $("a[name=delete-group]").on("click", function () { 
            var group_id = $(this).data("index"); 
            $.ajax({
                url: 'delete-group',
                type: 'POST',
                data:  { 'id' : group_id},
                success: function(response,status,xhr) {
                    console.info(response);
                    if (response) 
                    {
                              $(".delete-group").closest("#group-"+group_id).remove();
                              setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    toastr.success('Good Work', 'Group Deleted Successfully');

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
    