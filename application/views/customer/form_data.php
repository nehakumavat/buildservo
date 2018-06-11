<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Profile</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $title?> Profile</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $title?> Customer Details</h5>
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
                                <label for="customer_name">Full Name</label>
                                <input class="form-control" type="text"  name="customer_name"  value="<?php echo !empty($customer_details['customer_name'])?$customer_details['customer_name']:set_value('customer_name'); ?>" required>
                                <div class="error"><?php echo form_error('customer_name'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label for="customer_email">Email</label>
                                <input class="form-control" type="email"  name="customer_email" value="<?php echo !empty($customer_details['customer_email'])?$customer_details['customer_email']:set_value('customer_email'); ?>" required="" >
                                <div class="error"><?php echo form_error('customer_email'); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label for="customer_mob">Mobile number</label>
                                <input class="form-control" type="text" name="customer_mob"  value="<?php echo !empty($customer_details['customer_mob'])?$customer_details['customer_mob']:set_value('customer_mob'); ?>" required="" >
                                <div class="error"><?php echo form_error('customer_mob'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="customer_address">Address</label>
                                <input class="form-control" type="text" name="customer_address"  value="<?php echo !empty($customer_details['customer_address'])?$customer_details['customer_address']:set_value('customer_address'); ?>" required="" >
                                <div class="error"><?php echo form_error('customer_address'); ?></div>
                            </div>

                        </div>
                        
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label>City</label>
                                <input type="text" name="customer_city"  class="form-control input-lg" value="<?php echo !empty($customer_details['customer_city'])?$customer_details['customer_city']:set_value('customer_city'); ?>" required>
                                <div class="error"><?php echo form_error('customer_city'); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label>Pincode</label>
                                <input type="text" name="customer_pincode"  class="form-control input-lg" value="<?php echo !empty($customer_details['customer_pincode'])?$customer_details['customer_pincode']:set_value('customer_pincode'); ?>" required>
                                <div class="error"><?php echo form_error('customer_pincode'); ?></div>
                            </div>
                        </div>
                            
<!--                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="address">Profile Image</label>
                                <input type="file" name="profile_image"><br>
                                <?php //if(!empty($customer_details['profile_image'])){ ?>
                                    <input type="hidden" name="profile_image_hidden" value="<?= $customer_details['profile_image']?$customer_details['profile_image']:''?>">
                                    <img src="<?= base_url()?>assets/images/employee/<?= $customer_details['profile_image']?>" style="width:150px;height:150px">
                                <?php //} ?>
                            </div>
                        </div>-->
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
    