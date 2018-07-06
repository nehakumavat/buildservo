<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>New Package</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $title?> Package</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <a href="<?= base_url()?>package" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Package List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $title?> Package Details</h5>
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
                                <label for="name">Package Name</label>
                                <input class="form-control" type="text"  name="package_name"  value="<?php echo !empty($package_detail['package_name'])?$package_detail['package_name']:set_value('package_name'); ?>" required>
                                <div class="error"><?php echo form_error('package_name'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="email">Cost</label>
                                <input class="form-control" type="text"  name="cost" value="<?php echo !empty($package_detail['cost'])?$package_detail['cost']:set_value('cost'); ?>" required="" >
                                <div class="error"><?php echo form_error('cost'); ?></div>
                            </div>
                        </div>
                        
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label for="designation_id">Select Service</label>
                                <select class="form-control services" name="service_id[]" multiple="multiple">
                                    <option disabled="disabled">Select Service</option>
                                    <?php
                                        if (!empty($service_list)) {
                                            foreach ($service_list as $key => $value) {
                                                if(in_array($value['id'], explode(',',$package_detail['service_id']))){
                                                    $selected='selected="selected"';
                                                }else{
                                                    $selected='';
                                                }
                                    ?>  
                                                <option value="<?= $value['id']?>" <?= $selected?>><?= $value['name'] ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <div class="error"><?php echo form_error('service_id'); ?></div>
                            </div>
                        </div>
                        
                        <?php if(!empty($package_detail['package_id'])){ ?>
                                <input type="hidden" name="package_id" value="<?= $package_detail['package_id']?$package_detail['package_id']:''?>">
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Save Package</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.services').select2();   
</script>