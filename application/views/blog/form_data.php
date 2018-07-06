<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>New Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $title?> Blog</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <a href="<?= base_url()?>blog" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus mr-2"></i> Blog List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $title?> Blog Details</h5>
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
                                <label for="name">Blog Name</label>
                                <input class="form-control" type="text"  name="name"  value="<?php echo !empty($blog_detail['name'])?$blog_detail['name']:set_value('name'); ?>" required>
                                <div class="error"><?php echo form_error('name'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="5"> <?php echo !empty($blog_detail['description'])?$blog_detail['description']:set_value('description'); ?></textarea>
<!--                                <input class="form-control" type="text" name="description"  value="<?php echo !empty($blog_detail['description'])?$blog_detail['description']:set_value('description'); ?>" required="" >-->
                                <div class="error"><?php echo form_error('description'); ?></div>
                            </div>

                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="author">Author</label>
                                <input class="form-control" type="text"  name="author"  value="<?php echo !empty($blog_detail['author'])?$blog_detail['author']:set_value('author'); ?>">
                                <div class="error"><?php echo form_error('author'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="images">Blog Image</label>
                                <input type="file" name="images"><br>
                                <?php if(!empty($blog_detail['images'])){ ?>
                                    <input type="hidden" name="images_hidden" value="<?= $blog_detail['images']?$blog_detail['images']:''?>">
                                    <img src="<?= base_url()?>assets/images/blogs/<?= $blog_detail['images']?>" style="width:150px;height:150px">
                                <?php } ?>
                            </div>
                        </div>
                        <?php if(!empty($blog_detail['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $blog_detail['id']?$blog_detail['id']:''?>">
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Save Blog</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

    