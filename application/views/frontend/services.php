<div role="main" class="main" style="margin-top: 100px;">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Services</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <h2>Our <strong>Services</strong></h2>

        <div class="row">
            <div class="col-md-10">
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non pulvinar. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh metus.
                </p>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>contact-us" class="btn btn-lg btn-primary mt-xl pull-right">Contact Us!</a>
            </div>
        </div>

        <hr>

        <div class="featured-boxes">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="featured-box featured-box-primary featured-box-effect-1 mt-xlg">
                        <div class="box-content">
                            <i class="icon-featured fa fa-user"></i>
                            <h4 class="text-uppercase"><?= $service_list[0]['name']?></h4>
                            <p>
                                <?php 
                                    $string = strip_tags($service_list[0]['description']);
                                    if (strlen($string) > 50) {
                                        $stringCut = substr($string, 0, 50);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                ?>
                            </p>
                            <p><a href="<?php echo base_url(); ?>service-details?id=<?= $service_list[0]['id'];?>" class="lnk-primary learn-more">Learn More <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="featured-box featured-box-secondary featured-box-effect-1 mt-xlg">
                        <div class="box-content">
                            <i class="icon-featured fa fa-book"></i>
                            <h4 class="text-uppercase"><?= $service_list[1]['name']?></h4>
                            <p>
                                <?php 
                                    $string = strip_tags($service_list[1]['description']);
                                    if (strlen($string) > 50) {
                                        $stringCut = substr($string, 0, 50);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                ?>
                            </p>
                            <p><a href="<?php echo base_url(); ?>service-details?id=<?= $service_list[0]['id'];?>" class="lnk-secondary learn-more">Learn more <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="featured-box featured-box-tertiary featured-box-effect-1 mt-xlg">
                        <div class="box-content">
                            <i class="icon-featured fa fa-trophy"></i>
                            <h4 class="text-uppercase"><?= $service_list[2]['name']?></h4>
                            <p>
                                <?php 
                                    $string = strip_tags($service_list[2]['description']);
                                    if (strlen($string) > 50) {
                                        $stringCut = substr($string, 0, 50);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                ?>
                            </p>
                            <p><a href="<?php echo base_url(); ?>service-details?id=<?= $service_list[0]['id'];?>" class="lnk-tertiary learn-more">Learn more <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="featured-box featured-box-quaternary featured-box-effect-1 mt-xlg">
                        <div class="box-content">
                            <i class="icon-featured fa fa-cogs"></i>
                            <h4 class="text-uppercase"><?= $service_list[3]['name']?></h4>
                            <p>
                                <?php 
                                    $string = strip_tags($service_list[3]['description']);
                                    if (strlen($string) > 50) {
                                        $stringCut = substr($string, 0, 50);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                ?>
                            </p>
                            <p><a href="<?php echo base_url(); ?>service-details?id=<?= $service_list[0]['id'];?>" class="lnk-quaternary learn-more">Learn more <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">

            <div class="row center">
                <div class="col-md-12">
                    <h1 class="mb-sm word-rotator-title">
                        Porto is
                        <strong class="inverted">
                            <span class="word-rotate" data-plugin-options='{"delay": 2000, "animDelay": 300}'>
                                <span class="word-rotate-items">
                                    <span>incredibly</span>
                                    <span>especially</span>
                                    <span>extremely</span>
                                </span>
                            </span>
                        </strong>
                        beautiful and fully responsive.
                    </h1>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum.
                    </p>
                </div>
            </div>

        </div>

        <div class="home-concept">
            <div class="container">

                <div class="row center">
                    <span class="sun"></span>
                    <span class="cloud"></span>
                    <div class="col-md-2 col-md-offset-1">
                        <div class="process-image appear-animation" data-appear-animation="bounceIn">
                            <img src="<?php echo base_url(); ?>assets/frontend/img/strategy.jpg" alt="" />
                            <strong>Strategy</strong>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="process-image appear-animation" data-appear-animation="bounceIn" data-appear-animation-delay="200">
                            <img src="<?php echo base_url(); ?>assets/frontend/img/planning.jpg" alt="" />
                            <strong>Planning</strong>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="process-image appear-animation" data-appear-animation="bounceIn" data-appear-animation-delay="400">
                            <img src="<?php echo base_url(); ?>assets/frontend/img/build.jpg" alt="" />
                            <strong>Build</strong>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="project-image">
                            <div id="fcSlideshow" class="fc-slideshow">
                                <ul class="fc-slides">
                                    <li><a href="portfolio-single-small-slider.html"><img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/projects/work.jpg" alt="" /></a></li>
                                    <li><a href="portfolio-single-small-slider.html"><img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/projects/work1.jpg" alt="" /></a></li>
                                    <li><a href="portfolio-single-small-slider.html"><img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/img/projects/work2.jpg" alt="" /></a></li>
                                </ul>
                            </div>
                            <strong class="our-work">Our Work</strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>