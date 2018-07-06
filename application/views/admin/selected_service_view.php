<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Online Service Booking</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url()?>service/service_services">Selected Service </a>
            </li>
            <li class="active">
                <strong>
                    <?php echo $service_detail['name']; ?> 
                </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
        <a href="<?= base_url()?>admin/customers_selected_services" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-backward" aria-hidden="true"></i>  Your Service List</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3><?= $service_detail['name']?> Service</h3>
<!--                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>-->
                </div>
                <div class="ibox-content">
                    <?php echo validation_errors('<div class="error">', '</div>'); ?>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <h4 for="name">Service Name</h4>
                                <p><?= $service_detail['name']?></p>
                            </div>
                            <div class="col-md-6">
                                <h4 for="name">Customer Name</h4>
                                <p><?= $selected_service_detail['customer_name']?></p>
                            </div>
                            
                        </div>

                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <h4 for="address">Address</h4>
                                <p><?= $selected_service_detail['address'] ?></p>

                            </div>
                            <div class="col-md-6">
                                <h4 for="booking_date">Booking Date</h4>
                                <p>
                                    <?php $date= date_create($selected_service_detail['booking_date']);
                                        echo date_format($date,"d/m/Y");
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <h4 for="city">City</h4>
                                <p><?= $selected_service_detail['city'] ?></p>

                            </div>
                            <div class="col-md-6">
                                <h4 for="address">Pincode</h4>
                                <p><?= $selected_service_detail['pincode'] ?></p>
                            </div>
                        </div>
                        <div class="form-group row m-b-25">
                            <div class="col-md-6">
                                <h4 for="employee_id">Assign Employee</h4>
                                <select class="form-control" name="employee_id" id="employee_id">
                                    <option disabled="disabled" selected="selected">Select Employee Name</option>
                                    <?php foreach($employee_list as $employee){ 
                                                if($employee['id']==$selected_service_detail['employee_id']){
                                                    $selected='selected="selected"';
                                                }else{
                                                    $selected='';
                                                }
                                    ?>  
                                    <option value="<?= $employee['id']?>" <?= $selected;?>><?= $employee['name']?></option>
                                    <?php } ?>
                                </select>
                                <div class="error"><?php echo form_error('employee_id'); ?></div>
                            </div>
                            <div class="col-md-6">
                                <h4 for="city">Booking Status</h4>
                                <?php if($selected_service_detail['service_status']==3) { ?>
                                        <p>Booking Cancelled</p>
                                <?php }else{ ?>
                                    <select class="form-control" name="service_status" id="service_status">
                                        <option disabled="disabled" selected="selected">Select Booking Status</option>
                                        <option value="1" <?= $selected_service_detail['service_status']==1?'selected="selected"':''; ?> data-status_name="Pending" >Pending</option>
                                        <option value="2" <?= $selected_service_detail['service_status']==2?'selected="selected"':'';?> data-status_name="Confirmed" >Confirmed</option>
                                        <option value="3" <?= $selected_service_detail['service_status']==3?'selected="selected"':'';?> data-status_name="Cancelled" >Cancelled</option>
                                        <option value="4" <?= $selected_service_detail['service_status']==4?'selected="selected"':'';?> data-status_name="In progress" >In progress</option>
                                        <option value="5" <?= $selected_service_detail['service_status']==5?'selected="selected"':'';?> data-status_name="Completed" >Completed</option>
                                    </select>
                                    <div class="error"><?php echo form_error('service_status'); ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row m-b-25"></div>
                        <div class="form-group row m-b-25">
                            <?php if($selected_service_detail['service_status']!=3){ ?>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="javascript:void(0)" data-id="<?= $selected_service_detail['id'] ?>" class="btn btn-danger" name="selected_service_cancle" id="selected_service_cancle">Cancle Booking</a>
                                </div>
                            <?php } ?>            
                        </div>
                        <input type="hidden" id="customer_id" value="<?= $selected_service_detail['customer_id'] ?>" name="customer_id">
                        <input type="hidden" id="id" value="<?= $selected_service_detail['id'] ?>" name="id">
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="modal fade delete-popup" id="bookingConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    
                    <h2>Booking Status : <span id="modal_status"></span></h2>
                    <h3> By clicking on <span>"YES"</span>, booking status will be change. Do you wish to proceed?</h3>
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>-->
<!--<script> 
    $("#booking_status").on('change',function(){
        var status_name=$(this).find(':selected').attr('data-status_name');
        $('#modal_status').text(status_name);
        $('#bookingConfirmationModal').modal('show');
    });
    $("#confirm_btn").on('click',function(){
        var id=$("#id_modal").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "service/selected_services_cancle",
            data: { 'id' : id },
            success: function(result){
                $('#deleteConfirmationModal').modal('hide');
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                $('.float-e-margins').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Booking has been cancelled successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                $('.alert').fadeIn().delay(3000).fadeOut(function () {
                    $(this).remove();
                });
                setTimeout(function(){ 
                    location.reload();
                }, 3000);
            }
        });
    });
    
</script>-->