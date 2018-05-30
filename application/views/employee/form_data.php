<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>New Employee</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong>Add Employee</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <a href="<?= base_url()?>employee" data-toggle="modal" data-target="#add-customer"   class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Employee List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Employee Details</h5>
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
                    <form class="form-horizontal" action="<?php echo base_url(); ?>employee/add" method="post" enctype="multipart/form-data">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Full Name</label>
                                <input class="form-control" type="text"  name="name"  value="<?php echo set_value('name'); ?>" required>
                                <div class="error"><?php echo form_error('name'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input class="form-control" type="email"  name="email_id" value="<?php echo set_value('email_id'); ?>" required="" >
                                <div class="error"><?php echo form_error('email_id'); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Mobile number</label>
                                <input class="form-control" type="text" name="mobile_no"  value="<?php echo set_value('mobile_no'); ?>" required="" >
                                <div class="error"><?php echo form_error('mobile_no'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <input class="form-control" type="text" name="address"  value="<?php echo set_value('address'); ?>" required="" >
                                <div class="error"><?php echo form_error('address'); ?></div>
                            </div>

                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label for="designation_id">Designation</label>
                                <select class="form-control" name="designation_id">
                                    <option disabled="disabled" selected="selected">Select Designation</option>
                                    <?php
                                        if (!empty($designation)) {
                                            foreach ($designation as $key => $value) {
                                    ?>  
                                                <option value="<?= $value['id']?>"><?= $value['designation_name'] ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <div class="error"><?php echo form_error('designation_id'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="address">Profile Image</label>
                                <input class="" type="file" name="profile_image">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Save Employee</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

    