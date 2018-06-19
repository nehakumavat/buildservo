<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Feedback</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Dashboard</a>
            </li>
            <li class="active">
                <strong>Feedback</strong>
            </li>
        </ol>
    </div>
    <?php if($this->session->userdata('type')==2) { ?>
        <div class="col-lg-3">
            <a href="<?= base_url()?>customer/add_feedback" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Add Feedback</a>
        </div>
    <?php } ?>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Feedback List</h5>
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
                                    <?php if($this->session->userdata('type')==1) { ?>
                                        <th>Customer Name</th>
                                    <?php } ?>
                                    <th>Subject</th>
                                    <th>Comment</th>
                                    <th>Rating</th>
                                    <th>Employee Name</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($feedback_list)) {
                                    foreach ($feedback_list as $key => $value) {
                            ?>
                                        <tr class="gradeX" id="employee-<?= $value['feedback_id'] ?>">
                                            <?php if($this->session->userdata('type')==1) { ?>
                                                <td><?= $value['customer_name']; ?></td>
                                            <?php } ?>
                                            <td><?= $value['subject']; ?></td>
                                            <td><?= $value['comment']; ?></td>
                                            <td><?= $value['rating']; ?></td>
                                            <td class="center"><?= $value['name']; ?></td>
                                            <td class="center"><?= $value['created_at']; ?></td>
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
    