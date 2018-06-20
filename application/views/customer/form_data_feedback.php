<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Add Feedback</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $title?> Feedback</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
        <a href="<?= base_url()?>customer/feedback" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-backward mr-2"></i>  Feedback List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $title?> Feedback Details</h5>
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
                                <label for="customer_name">Subject</label>
                                <input class="form-control" type="text"  name="subject"  value="<?php echo set_value('subject'); ?>" required>
                                <div class="error"><?php echo form_error('subject'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="customer_email">Comment</label>
                                <textarea name="comment" class="form-control" rows="5" required></textarea>
                                <div class="error"><?php echo form_error('comment'); ?></div>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label for="rating">Rating</label><br>
<!--                                <div class="form-group row m-b-25">
                                    <div class="col-md-2">
                                        <input type="radio" name="rating" value="1">
                                        <br>
                                        <span>Bad</span>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="rating" value="2" class="">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="rating" value="3" class="">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="rating" value="4" class="">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="rating" value="5" class="">
                                    </div>
                                </div>-->
                                <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" name="rating" value="5"/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="rating" value="4"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="rating" value="3"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="rating" value="2"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="rating" value="1"/>
                                    <label class="star star-1" for="star-1"></label>    
                                </div>
                                <div class="error"><?php echo form_error('rating'); ?></div>
                            </div>

                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label for="customer_address">Employee</label>
                                <select class="form-control" name="employee_id" id="employee_id">
                                    <option disabled="disabled" selected="selected">Select Employee Name</option>
                                    <?php foreach($employee_list as $employee){ ?>  
                                        <option value="<?= $employee['id']?>"><?= $employee['name']?></option>
                                    <?php } ?>
                                </select>
                                <div class="error"><?php echo form_error('employee_id'); ?></div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
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
    