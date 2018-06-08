<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>View Service Booking</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url()?>dashboard">Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url()?>service/service_booking">Service Booking</a>
            </li>
            <li class="active">
                <strong>View Service Booking</strong>
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
                    <h5><?= $service_detail['name']?> Details</h5>
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
                    <h2><?= $service_detail['name']?></h2>
                    <h4>Description :</h4>
                    <p><?= $service_detail['description']?></p>
                    <br>
                    <img src="<?= base_url()?>assets/images/service/<?= $service_detail['service_image']?>" style="width:150px;height:150px">
                    <br>
                    <br>
                    <a href="<?= base_url()?>service/book_service?id=<?= $service_detail['id'] ?>"  class="btn btn-primary" name="book_service">Book Now</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

    