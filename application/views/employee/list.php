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
                                            <td><?= $value['mobile_no']; ?></td>
                                            <td class="center"><?= $value['address']; ?></td>
                                            <td class="center">
                                                <?php  
                                                    $designation=$this->designation_model->get_designation_by_id($value['designation_id']);
                                                    echo $designation['designation_name'];
                                                ?>
                                            </td>
                                            <td class="center"><?= $value['created_at']; ?></td>
                                            <td>
                                                <a href="<?= base_url()?>employee/edit?id=<?= $value['id'] ?>"  class="btn btn-primary" data-id="<?= $value['id'] ?>" name="edit_employee">Edit</a>
                                                <a href="<?= base_url()?>employee/delete?id=<?= $value['id'] ?>" class="btn btn-danger delete-customer" data-index="<?= $value['id'] ?>" name="delete-customer">Delete</a><br>
                                            </td>
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

<?php
    if (($error = $this->session->flashdata('update_success')) || $error = $this->session->flashdata('add_success')) {
?>
    <script>
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('<?php echo $error; ?>', 'Success');

        }, 1300);
    </script>
<?php
    }elseif ($error = $this->session->flashdata('update_failed') || $error = $this->session->flashdata('add_failed')) {
?>
    <script>
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.error('<?php echo $error; ?>', 'Error');

        }, 1300);
    </script>
<?php
    }
?>
    