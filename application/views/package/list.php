<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Package</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Dashboard</a>
            </li>
            <li class="active">
                <strong>Package</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
<!--        <a href="javascript:void(0);" data-toggle="modal" data-target="#add-customer"   class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Customer</a>-->
        <a href="<?= base_url()?>package/add" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add New Package</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Package Records</h5>
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
                                    <th class="hidden">ID</th>
                                    <th>Package Name</th>
                                    <th>Cost</th>
                                    <th>Service Name</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($package_list)) {
                                    foreach ($package_list as $key => $value) {
                                        ?>
                                        <tr class="gradeX" id="package-<?= $value['package_id'] ?>">
                                            <td class="hidden"><?= $value['package_id']; ?></td>
                                            <td><?= $value['package_name']; ?></td>
                                            <td><?= $value['cost']; ?></td>
                                            <td class="center">
                                                <?php
                                                    $services=array();
                                                    foreach(explode(',',$value['service_id']) as $service){
                                                        $service=$this->service_model->get_service_by_id($service);
                                                        $services[]=$service['name'];
                                                    }
                                                    echo implode(',',$services);
                                                    
                                                ?>
                                            </td>
                                            <td class="center"><?= $value['created_at']; ?></td>
                                            <td>
                                                <a href="<?= base_url()?>package/edit?id=<?= $value['package_id'] ?>"  class="btn btn-primary" name="edit_employee">Edit</a>
                                                <a href="<?= base_url()?>package/delete?id=<?= $value['package_id'] ?>" class="btn btn-danger" name="delete-customer">Delete</a><br>
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
    