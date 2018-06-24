<div role="main" class="main" style="margin-top: 100px;">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li class="active">Service Details</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Service Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">


        <div class="row">
            <div class="col-md-4">

                <div class="owl-carousel owl-theme" data-plugin-options='{"items": 1, "margin": 10, "animateOut": "fadeOut", "autoplay": true, "autoplayTimeout": 3000}'>
                    <div>
                        <span class="img-thumbnail">
                            <img alt="" class="img-responsive" src="<?php echo base_url(); ?>assets/images/service/<?= $service_detail['service_image']?>">
                        </span>
                    </div>
<!--                    <div>
                        <span class="img-thumbnail">
                            <img alt="" class="img-responsive" src="<?php echo base_url(); ?>assets/images/service/<?= $service_detail['service_image']?>">
                        </span>
                    </div>-->
                </div>

            </div>

            <div class="col-md-8">
                <h5 class="mt-sm"><?= $service_detail['name']?></h5>
                <p class="mt-xlg"><?= $service_detail['description']?></p>
<!--                <a href="<?php echo base_url(); ?>contact-us" class="btn btn-primary btn-icon"><i class="fa fa-external-link"></i>Send Enquiry</a> <span class="arrow hlb appear-animation" data-appear-animation="rotateInUpLeft" data-appear-animation-delay="800"></span>-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr class="tall">
                <h4 class="mb-md text-uppercase">Other <strong>Services</strong></h4>
                <div class="row">
                    <ul class="portfolio-list">
                        <?php 
                            $i=1;
                            if(!empty($service_list)){ 
                                foreach($service_list as $service){
                                    if($service['id']!=$service_detail['id'] && $i<=4){
                                        
                        ?>
                                    <li class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="portfolio-item">
                                            <a href="<?php echo base_url(); ?>service-details?id=<?= $service['id'];?>">
                                                <span class="thumb-info thumb-info-lighten">
                                                    <span class="thumb-info-wrapper">
                                                        <img src="<?php echo base_url(); ?>assets/images/service/<?= $service['service_image']?>" class="img-responsive" alt="<?= $service['name']?>" style="height:209px" >
                                                        <span class="thumb-info-title">
                                                            <span class="thumb-info-inner"><?= $service['name']?></span>
<!--                                                            <span class="thumb-info-type">Brand</span>-->
                                                        </span>
                                                        <span class="thumb-info-action">
                                                            <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                        <?php $i++; } } } ?>
<!--                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="portfolio-item">
                                <a href="portfolio-single-small-slider.html">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <img src="<?php echo base_url(); ?>assets/frontend/img/projects/project-2.jpg" class="img-responsive" alt="">
                                            <span class="thumb-info-title">
                                                <span class="thumb-info-inner">Identity</span>
                                                <span class="thumb-info-type">Logo</span>
                                            </span>
                                            <span class="thumb-info-action">
                                                <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="portfolio-item">
                                <a href="portfolio-single-small-slider.html">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <img src="<?php echo base_url(); ?>assets/frontend/img/projects/project-3.jpg" class="img-responsive" alt="">
                                            <span class="thumb-info-title">
                                                <span class="thumb-info-inner">Watch Mockup</span>
                                                <span class="thumb-info-type">Brand</span>
                                            </span>
                                            <span class="thumb-info-action">
                                                <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="portfolio-item">
                                <a href="portfolio-single-small-slider.html">
                                    <span class="thumb-info thumb-info-lighten">
                                        <span class="thumb-info-wrapper">
                                            <img src="<?php echo base_url(); ?>assets/frontend/img/projects/project-4.jpg" class="img-responsive" alt="">
                                            <span class="thumb-info-title">
                                                <span class="thumb-info-inner">Three Bottles</span>
                                                <span class="thumb-info-type">Logo</span>
                                            </span>
                                            <span class="thumb-info-action">
                                                <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </li>-->
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>