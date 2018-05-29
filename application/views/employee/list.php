<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Employee</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Dashboard</a>
            </li>
            <li class="active">
                <strong>Employee</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
<!--        <a href="javascript:void(0);" data-toggle="modal" data-target="#add-customer"   class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Customer</a>-->
        <a href="<?= base_url()?>employee/add" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Employee</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Employee Records</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <!--                            <ul class="dropdown-menu dropdown-user">
                                                        <li><a href="#">Config option 1</a>
                                                        </li>
                                                        <li><a href="#">Config option 2</a>
                                                        </li>
                                                    </ul>-->
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
                                    <th>Name</th>
                                    <th>Email id</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Designation</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($employee_list)) {
                                    foreach ($employee_list as $key => $value) {
                                        ?>
                                        <tr class="gradeX" id="employee-<?= $value['id'] ?>">
                                            <td><?= $value['name']; ?></td>
                                            <td><?= $value['email_id']; ?></td>
                                            <td><?= $value['mobile_id']; ?></td>
                                            <td class="center"><?= $value['address']; ?></td>
                                            <td class="center"><?= $value['created_at']; ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#edit-customer"  data-id="<?= $value['id'] ?>" name="edit_employee" id="edit_employee">Edit</a>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-customer" data-index="<?= $value['id'] ?>" name="delete-customer">Delete</a><br>
                                            </td>
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
            <form class="form-horizontal" action="<?php echo base_url(); ?>add-customer" method="post">

                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">New Customer</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row m-b-25">
                        <div class="col-md-12">
                            <label for="name">Full Name</label>
                            <input class="form-control" type="text"  name="customer_name"  required="" >
                        </div>
                    </div>

                    <div class="form-group row m-b-25">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" type="email"  name="customer_email" required="" >
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <input class="form-control" type="text" name="customer_phone"  required="" >
                        </div>
                    </div>

                    <div class="form-group row m-b-25">
                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <input class="form-control" type="text" name="customer_address"  required="" >
                        </div>

                    </div>

                    <div class="form-group row m-b-25">

                        <div class="col-md-6">
                            <label for="username">Group</label>
                            <select class="form-control" name="group_id">
                                <option>Select Group for Customer</option>
                                <?php
                                if (!empty($customer_groups)) {
                                    foreach ($customer_groups as $key => $value) {
                                        ?>
                                        <option value="<?= $value->group_id ?>"><?= $value->group_name ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Customer</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit Customer modal content -->
<div id="edit-customer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" action="<?php echo base_url(); ?>update-customer" method="post">

                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Edit Customer</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row m-b-25">
                        <div class="col-md-12">
                            <label for="name">Full Name</label>
                            <input class="form-control" type="text"  name="customer_name" id="customer_name"  required="" >
                            <input type="hidden" name="customer_id" id="customer_id">
                        </div>
                    </div>

                    <div class="form-group row m-b-25">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" type="email"  name="customer_email" id="customer_email" required="" >
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <input class="form-control" type="text" name="customer_phone" id="customer_phone"  required="" >
                        </div>
                    </div>

                    <div class="form-group row m-b-25">
                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <input class="form-control" type="text" name="customer_address" id="customer_address"  required="" >
                        </div>

                    </div>

                    <div class="form-group row m-b-25">

                        <div class="col-md-6">
                            <label for="username">Group</label>
                            <select class="form-control" name="group_id" id="group_id">
                                <option>Select Group for Customer</option>
<?php
if (!empty($customer_groups)) {
    foreach ($customer_groups as $key => $value) {
        ?>
                                        <option value="<?= $value->group_id ?>"><?= $value->group_name ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $("a[name=delete-customer]").on("click", function () {
        var customer_id = $(this).data("index");
        $.ajax({
            url: 'delete-customer',
            type: 'POST',
            data: {'id': customer_id},
            success: function (response, status, xhr) {
                console.info(response);
                if (response)
                {
                    $(".delete-customer").closest("#customer-" + customer_id).remove();
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('Good Work', 'Customer Deleted Successfully');

                    }, 1300);
                } else
                {
                    setTimeout(function () {
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
    $('#edit-customer').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');

        $.ajax({
            type: 'POST',
            url: 'customer',
            data: {'id': id}, //Pass $id
            success: function (data) {
                var a = jQuery.parseJSON(data);
                console.info(a);

                console.info(a.customer_name);
                $('#customer_id').val(a.customer_id);
                $('#customer_name').val(a.customer_name);
                $('#customer_email').val(a.customer_email);
                $('#customer_phone').val(a.customer_phone);
                $('#customer_address').val(a.customer_address);
                $('#group_id').val(a.group_id).change();




            }
        });
    });

</script>


<?php
if ($error = $this->session->flashdata('update_success')) {
    ?>
    <script>
        setTimeout(function () {
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
} elseif ($error = $this->session->flashdata('update_failed')) {
    ?>
    <script>
        setTimeout(function () {
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
?>
    