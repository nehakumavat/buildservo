<div id="wrapper">

<!--    <div class="row  border-bottom white-bg dashboard-header">

        <div class="col-sm-3">
            <h2>Welcome</h2>
            <small>You have 42 messages and 6 notifications.</small>
            <ul class="list-group clear-list m-t">
                <li class="list-group-item fist-item">
                    <span class="pull-right">
                        09:00 pm
                    </span>
                    <span class="label label-success">1</span> Please contact me
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        10:16 am
                    </span>
                    <span class="label label-info">2</span> Sign a contract
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        08:22 pm
                    </span>
                    <span class="label label-primary">3</span> Open new shop
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        11:06 pm
                    </span>
                    <span class="label label-default">4</span> Call back to Sylvia
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        12:00 am
                    </span>
                    <span class="label label-primary">5</span> Write a letter to Sandra
                </li>
            </ul>
        </div>
        <div class="col-sm-6">
            <div class="flot-chart dashboard-chart">
                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
            </div>
            <div class="row text-left">
                <div class="col-xs-4">
                    <div class=" m-l-md">
                        <span class="h4 font-bold m-t block">$ 406,100</span>
                        <small class="text-muted m-b block">Sales marketing report</small>
                    </div>
                </div>
                <div class="col-xs-4">
                    <span class="h4 font-bold m-t block">$ 150,401</span>
                    <small class="text-muted m-b block">Annual sales revenue</small>
                </div>
                <div class="col-xs-4">
                    <span class="h4 font-bold m-t block">$ 16,822</span>
                    <small class="text-muted m-b block">Half-year revenue margin</small>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="statistic-box">
                <h4>
                    Project Beta progress
                </h4>
                <p>
                    You have two project with not compleated task.
                </p>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <canvas id="polarChart" width="80" height="80"></canvas>
                        <h5 >Kolter</h5>
                    </div>
                    <div class="col-lg-6">
                        <canvas id="doughnutChart" width="78" height="78"></canvas>
                        <h5 >Maxtor</h5>
                    </div>
                </div>
                <div class="m-t">
                    <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                </div>

            </div>
        </div>

    </div>-->
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Selected Services</h5>
                                <div class="ibox-tools">
                                    <span class="label label-warning-light pull-right"><?= count($selected_service)?> Service</span>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div>
                                    <div class="feed-activity-list">
                                        <?php foreach($selected_service as $service){ ?>
                                            <div class="feed-element">
<!--                                                <a href="profile.html" class="pull-left">
                                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                                </a>-->
                                                <div class="media-body ">
                                                    <?php
                                                        $data_feed=$this->service_model->get_selected_service_by_ids($service['id']);
                                                        $timestamp = strtotime($data_feed['created_at']);
                                                        $strTime = array("second", "minute", "hour", "day", "month", "year");
                                                        $length = array("60","60","24","30","12","10");
                                                        $currentTime = time();
                                                        if($currentTime >= $timestamp) {
                                                            $diff  = time()- $timestamp;
                                                            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                                                               $diff = $diff / $length[$i];
                                                            }
                                                            $diff = round($diff);
                                                            $time=$diff . " " . $strTime[$i] . "(s) ago ";
                                                        }else{
                                                            $time= "0 minutes ago";
                                                        }
                                                    ?>
                                                    <small class="pull-right"><?= $time?></small>
                                                    <strong><?= $service['customer_name']?></strong>  
                                                    <span><?= $service['name']; ?></span>
                                                    <br>
                                                    <small class="text-muted">
                                                        <?php 
                                                            if($service['service_status']==1){
                                                                echo "Pending";
                                                            }else if($service['service_status']==2){
                                                                echo "Confirmed";
                                                            }else if($service['service_status']==3){
                                                                echo "Cancelled";
                                                            }else if($service['service_status']==4){
                                                                echo "In progress";
                                                            }else{
                                                                echo "Completed";
                                                            } 
                                                        ?>
                                                    </small>

                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
<!--                                    <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>-->
                                    <?php 
                                        if($this->session->userdata('type')==1){
                                            $href=base_url().'admin/customers_selected_services';
                                            $name='More Selected Services';
                                        }else{
                                            $href=base_url().'service/service_booking';
                                            $name='More Services';
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="small-box bg-yellow">
                                <a href="<?= $href?>" class="small-box-footer"><?= $name; ?><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5><?= $this->session->userdata('type')==1?'Customer':''; ?> Feedbacks</h5>
                                <div class="ibox-tools">
                                    <span class="label label-warning-light pull-right"><?= count($feedbacks)?> Feedback</span>
                                </div>
                            </div>
                            <div class="ibox-content no-padding">
                                <ul class="list-group">
                                    <?php foreach($feedbacks as $feedback){ ?>
                                        <li class="list-group-item">
                                            <p><a class="text-info" href="#">@<?= $feedback['customer_name']?></a> <?= $feedback['comment']?></p>
                                            <?php
                                                $data_feed=$this->admin_model->get_feedback_by_id($feedback['feedback_id']);
                                                $timestamp = strtotime($data_feed['created_at']);
                                                $strTime = array("second", "minute", "hour", "day", "month", "year");
                                                $length = array("60","60","24","30","12","10");
                                                $currentTime = time();
                                                if($currentTime >= $timestamp) {
                                                    $diff  = time()- $timestamp;
                                                    for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                                                       $diff = $diff / $length[$i];
                                                    }
                                                    $diff = round($diff);
                                                    $time=$diff . " " . $strTime[$i] . "(s) ago ";
                                                }else{
                                                    $time= "0 minutes ago";
                                                }
                                            ?>
                                            <small class="block text-muted"><i class="fa fa-clock-o"></i> <?= $time ?></small>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                            <?php 
                                if($this->session->userdata('type')==1){
                                    $href=base_url().'admin/feedback';
                                }else{
                                    $href=base_url().'customer/feedback';
                                }
                            ?>
                            <div class="small-box bg-yellow">
                                <a href="<?= $href?>" class="small-box-footer">More Feedback <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
<!--                            <div class="ibox-title">
                                <h5>Total Customer Register</h5> 
                                <span class="label label-primary">IN+</span>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>-->
                            <?php if(!empty($customers)){ ?>
                                <div class="ibox-content">
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                          <h3><?= count($customers) ?></h3>

                                          <p>Customer Registrations</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fa fa-user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="small-box bg-yellow">
                                    <a href="<?= base_url()?>customer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            <?php } ?>        
                        </div>
                        
                    </div>
                    
<!--                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Alpha project</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3>You have meeting today!</h3>
                                <small><i class="fa fa-map-marker"></i> Meeting is on 6:00am. Check your schedule to see detail.</small>
                            </div>
                            <div class="ibox-content inspinia-timeline">

                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-briefcase"></i>
                                            6:00 am
                                            <br/>
                                            <small class="text-navy">2 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content no-top-border">
                                            <p class="m-b-xs"><strong>Meeting</strong></p>

                                            <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the
                                                sale.</p>

                                            <p><span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,4,7,3,2,9,8,7,4,5,1,2,9,5,4,7,2,7,7,3,5,2</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-file-text"></i>
                                            7:00 am
                                            <br/>
                                            <small class="text-navy">3 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>Send documents to Mike</strong></p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-coffee"></i>
                                            8:00 am
                                            <br/>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>Coffee Break</strong></p>
                                            <p>
                                                Go to shop and find some products.
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-phone"></i>
                                            11:00 am
                                            <br/>
                                            <small class="text-navy">21 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>Phone with Jeronimo</strong></p>
                                            <p>
                                                Lorem Ipsum has been the industry's standard dummy text ever since.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-user-md"></i>
                                            09:00 pm
                                            <br/>
                                            <small>21 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>Go to the doctor dr Smith</strong></p>
                                            <p>
                                                Find some issue and go to doctor.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 date">
                                            <i class="fa fa-comments"></i>
                                            12:50 pm
                                            <br/>
                                            <small class="text-navy">48 hour ago</small>
                                        </div>
                                        <div class="col-xs-7 content">
                                            <p class="m-b-xs"><strong>Chat with Monica and Sandra</strong></p>
                                            <p>
                                                Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>-->

                </div>
            </div>
            <?php
            if ($error = $this->session->flashdata('login_success')) {
                ?>
                <script>
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('<?php echo $this->session->flashdata('login_success'); ?>', 'Success');

                    }, 1300);
                </script>
                <?php
            }
            ?>