<!DOCTYPE html>
<html>
    <head>

        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

        <title>Porto - Responsive HTML5 Template 4.5.1</title>	

        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Porto - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/frontend/img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/magnific-popup/magnific-popup.min.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-blog.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-shop.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-animate.css">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/rs-plugin/css/settings.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/rs-plugin/css/layers.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/rs-plugin/css/navigation.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/circle-flip-slideshow/css/component.css" media="screen">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/skins/skin-corporate-7.css">

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/custom.css">

        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/modernizr/modernizr.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>
    <body>

        <div class="body">
            <header id="header" class="header-narrow header-semi-transparent header-transparent-sticky-deactive header-transparent-bottom-border" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 1, "stickySetTop": "1"}'>
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img alt="Porto" width="82" height="40" src="<?php echo base_url(); ?>assets/frontend/img/logo-default-slim-dark.png">
                                    </a>
                                </div>
                            </div>
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-nav header-nav-dark-dropdown">
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1 collapse">
                                            <nav>
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="dropdown active">
                                                        <a href="<?php echo base_url(); ?>home">
                                                            Home
                                                        </a>
                                                    </li>
                                                    <li class="dropdown active">
                                                        <a href="<?php echo base_url(); ?>about-us">
                                                            About Us
                                                        </a>
                                                    </li>
                                                    <li class="dropdown active">
                                                        <a href="<?php echo base_url(); ?>services">
                                                            Services
                                                        </a>
                                                    </li>
                                                    <li class="dropdown active">
                                                        <a href="<?php echo base_url(); ?>pricing">
                                                            Pricing
                                                        </a>
                                                    </li>
                                                    <li class="dropdown active">
                                                        <a href="<?php echo base_url(); ?>blogs">
                                                            Blogs
                                                        </a>
                                                    </li>
                                                    <li class="dropdown active">
                                                        <a href="<?php echo base_url(); ?>contact-us">
                                                            Contact Us
                                                        </a>
                                                    </li>
                                                    <?php if(!$this->session->userdata('logged_in')){ ?>
                                                        <li class="dropdown active">
                                                            <a href="<?php echo base_url(); ?>login">
                                                                Sign In
                                                            </a>
                                                        </li>
                                                        <li class="dropdown active">
                                                            <a href="<?php echo base_url(); ?>register">
                                                                Sign Up
                                                            </a>
                                                        </li>											
                                                    <?php }else{ ?>    
                                                            <li class="dropdown active">
                                                                <a href="<?php echo base_url(); ?>logout">
                                                                    Sign out
                                                                </a>
                                                            </li>
                                                            <li class="dropdown active">
                                                                <a href="<?php echo base_url(); ?>dashboard">
                                                                    <b>Hi, <?= $this->session->userdata('customer_name')?></b>
                                                                </a>
                                                            </li>
                                                    <?php }?>        
                                                </ul>
                                                
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>