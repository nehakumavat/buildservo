<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Reset Password</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $title?> Password</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $title?> Customer Password</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php echo validation_errors('<div class="error">', '</div>'); ?>
                    <br>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="customer_password">New Password</label>
                                <input class="form-control" type="password"  name="customer_password"  value="<?php echo set_value('customer_password'); ?>" required>
                                <div class="error"><?php echo form_error('customer_password'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="confirm_password">Confirm Password</label>
                                <input class="form-control" type="password"  name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" required="" >
                                <div class="error"><?php echo form_error('confirm_password'); ?></div>
                            </div>
                            
                        </div>
                        
                        <?php if(!empty($customer_details['customer_profile_id'])){ ?>
                                <input type="hidden" name="customer_profile_id" value="<?= $customer_details['customer_profile_id']?$customer_details['customer_profile_id']:''?>">
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

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
    