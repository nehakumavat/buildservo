<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Online Service Booking</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url()?>service/service_booking">Service Booking</a>
            </li>
            <li class="active">
                <strong><?= $title?> Booking Details</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
        <a href="<?= base_url()?>service/service_booking" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-backward" aria-hidden="true"></i>  Service Booking List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Booking <?= $service_detail['name']?> Service</h5>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="name">Service Name</label>
                                <p><?= $service_detail['name']?></p>
                            </div>
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="booking_date">Booking Date</label>
                                <input class="form-control" type="date"  name="booking_date" value="<?php echo !empty($selected_service_detail['booking_date'])?$selected_service_detail['booking_date']:set_value('booking_date'); ?>" required="" >
                                <div class="error"><?php echo form_error('booking_date'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <input class="form-control" type="text"  name="address" value="<?php echo !empty($selected_service_detail['address'])?$selected_service_detail['address']: $customer_details['customer_address']; ?>" required="" >
                                <div class="error"><?php echo form_error('address'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input class="form-control" type="text"  name="city" value="<?php echo !empty($selected_service_detail['city'])?$selected_service_detail['city']:$customer_details['customer_address']; ?>" required="" >
                                <div class="error"><?php echo form_error('city'); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label for="address">Pincode</label>
                                <input class="form-control" type="text"  name="pincode" value="<?php echo !empty($selected_service_detail['pincode'])?$selected_service_detail['pincode']:$customer_details['customer_pincode']; ?>" required="" >
                                <div class="error"><?php echo form_error('pincode'); ?></div>
                            </div>
                        </div>
                        <input type="hidden" name="service_id" value="<?= $service_detail['id']?$service_detail['id']:''?>">
                        
                        <?php if(!empty($selected_service_detail['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $selected_service_detail['id']?$selected_service_detail['id']:''?>">
                        <?php } ?>
                        <button type="button" class="btn btn-primary" id="book_service">Book Service</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade delete-popup" id="bookingConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    <h3> By clicking on <span>"YES"</span>, your service will be book. Do you wish to proceed?</h3><br>
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script> 
    $("#book_service").on('click',function(){
        $('#bookingConfirmationModal').modal('show');
    });
    $("#confirm_btn").on('click',function(){
        $('form').submit(); 
    });
    
</script>

    