<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>New Service</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $title?> Service</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <a href="<?= base_url()?>service" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Service List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $title?> Service Details</h5>
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
                                <label for="name">Service Name</label>
                                <input class="form-control" type="text"  name="name"  value="<?php echo !empty($service_detail['name'])?$service_detail['name']:set_value('name'); ?>" required>
                                <div class="error"><?php echo form_error('name'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <input class="form-control" type="text"  name="description" value="<?php echo !empty($service_detail['description'])?$service_detail['description']:set_value('description'); ?>" required="" >
                                <div class="error"><?php echo form_error('description'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="service_status">Service Status</label>
                                <select class="form-control" name="service_status">
                                    <option disabled="disabled" selected="selected">Select Service Status</option>
                                    <option value="1" <?= !empty($service_detail['service_status'])? $service_detail['service_status']==1?'selected="selected"':'' :'';?>>Active</option>
                                    <option value="2" <?= !empty($service_detail['service_status'])? $service_detail['service_status']==2?'selected="selected"':'' :'';?>>Not Active</option>
                                </select>
                                <div class="error"><?php echo form_error('service_status'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="address">Service Image</label>
                                <input type="file" name="service_image"><br>
                                <?php if(!empty($service_detail['service_image'])){ ?>
                                    <input type="hidden" name="service_image_hidden" value="<?= $service_detail['service_image']?$service_detail['service_image']:''?>">
                                    <img src="<?= base_url()?>assets/images/service/<?= $service_detail['service_image']?>" style="width:150px;height:150px">
                                <?php } ?>
                            </div>
                        </div>
                        <?php if(!empty($service_detail['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $service_detail['id']?$service_detail['id']:''?>">
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

    