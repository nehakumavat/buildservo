<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Selected Service</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Dashboard</a>
            </li>
            <li class="active">
                <strong>Selected Service</strong>
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
                <div class="ibox-content">
                    <div class="container">
                        <div class="col-md-9">
                            <h2>List of Your Services</h2>
                            <div class="list-group">
                                <?php
                                    if (!empty($selected_service_list)) {
                                        foreach ($selected_service_list as $key => $value) {
                                ?>
                                    <div class="row list-group-item">
                                        <div class="col-md-4">
                                            <a href="<?= base_url()?>service/selected_services_view?id=<?= $value['id'] ?>">
                                                <h4 class="">
                                                    <?php 
                                                        $service_detail=$this->service_model->get_service_by_id($value['service_id']);
                                                        echo $service_detail['name']; 
                                                    ?>
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Booking Date</p>
                                            <h4 class="">
                                                <?php 
                                                    $date=date_create($value['booking_date']);
                                                    echo date_format($date,"d/m/Y");
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="col-md-4">
                                            <p for="city">Booking Status</p>
                                            <h4><?php 
                                                    if($value['service_status']==1){
                                                        echo "Pending";
                                                    }else if($value['service_status']==2){
                                                        echo "Confirmed";
                                                    }else if($value['service_status']==3){
                                                        echo "Cancelled";
                                                    }else if($value['service_status']==4){
                                                        echo "In progress";
                                                    }else{
                                                        echo "Completed";
                                                    } 
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= base_url()?>service/selected_services_view?id=<?= $value['id'] ?>"  class="btn btn-primary" name="book_service">View Details</a>
                                            <?php if($value['service_status']!=3){ ?>
                                                <a href="javascript:void(0)" data-id="<?= $value['id'] ?>" class="btn btn-danger" name="selected_service_cancle" id="selected_service_cancle">Cancle Booking</a>
                                            <?php } ?>            
                                        </div>
                                    </div>
                                        
                                    
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade delete-popup" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    <h3> By clicking on <span>"YES"</span>, your booking will be cancle. Do you wish to proceed?</h3>
                    <input  type="hidden" name="id_modal" id="id_modal" value=""> 
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script> 
    $("#selected_service_cancle").on('click',function(){
        var id=$(this).data('id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
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
    
</script>    
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
    