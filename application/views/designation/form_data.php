<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>New Designation</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $title?> Designation</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <a href="<?= base_url()?>designation" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Designation List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $title?> Designation Details</h5>
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
                                <label for="name">Designation name</label>
                                <input class="form-control" type="text"  name="designation_name"  value="<?php echo !empty($designation_detail['designation_name'])?$designation_detail['designation_name']:set_value('designation_name'); ?>" required>
                                <div class="error"><?php echo form_error('designation_name'); ?></div>
                            </div>
                        </div>
                        <?php if(!empty($designation_detail['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $designation_detail['id']?$designation_detail['id']:''?>">
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Save Designation</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

    