<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Online Service Booking</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Dashboard</a>
            </li>
            <li class="active">
                <strong>Service Booking</strong>
            </li>
        </ol>
    </div>
    
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="container">
                        <div class="col-md-9">
                            <h2>List of Services</h2>
                            <div class="list-group">
                                <?php
                                    if (!empty($service_list)) {
                                        foreach ($service_list as $key => $value) {
                                ?>
                                    <div class="row list-group-item">
                                        <div class="col-md-8">
                                            <a href="<?= base_url()?>service/service_booking_view?id=<?= $value['id'] ?>">
                                                <h4 class=""><?= $value['name']; ?></h4>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= base_url()?>service/book_service?id=<?= $value['id'] ?>"  class="btn btn-primary" name="book_service">Book Now</a>
                                            <a href="<?= base_url()?>service/service_booking_view?id=<?= $value['id'] ?>" class="btn btn-danger" name="service_booking_view">View Details</a>
                                        </div>
                                    </div>
                                        
                                    
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
<!--                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($service_list)) {
                                    foreach ($service_list as $key => $value) {
                                        ?>
                                        <tr class="gradeX" id="service-<?= $value['id'] ?>">
                                            <td><?= $value['name']; ?></td>
                                            <td><?= $value['description']; ?></td>
                                            <td>
                                                <a href="<?= base_url()?>service/book_service?id=<?= $value['id'] ?>"  class="btn btn-primary" data-id="<?= $value['id'] ?>" name="book_service">Book Now</a>
                                                <a href="<?= base_url()?>service/view_service_booking?id=<?= $value['id'] ?>" class="btn btn-danger delete-customer" data-index="<?= $value['id'] ?>" name="view_service">View Details</a><br>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </tbody>            
                        </table>
                    </div>-->

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
    