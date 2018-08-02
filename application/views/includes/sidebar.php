<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <div class="row">
                                <div class="col-md-3">
                                    <img alt="image" class="img-circle" src="<?php echo base_url();?>assets/images/admin.png" width="50px" height="50px" />
                                </div>
                                <div class="col-md-9">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="margin: 33px 20px;">
                                        <span class="clear"> 
                                            <span class="block m-t-xs"> 
                                                <strong class="font-bold">
                                                    <?php if($this->session->userdata('type')==2){
                                                            echo $this->session->userdata('customer_name');
                                                        }else{
                                                            echo $this->session->userdata('name');
                                                        }
                                                    ?>
                                                </strong>
                                            </span>  
                                        </span> 
                                    </a>
                                </div>
                            </div>
                            <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul> -->
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard"><h3><i class="fa fa-bars"></i> <span class="nav-label">Dashboard</span></h3></a>
                    </li>
                    <?php if($this->session->userdata('logged_in') && $this->session->userdata('type')==1){ ?>
                        <li>
                            <a href="<?php echo base_url();?>employee"><h3><i class="fa fa-user"></i> <span class="nav-label">Employee</span></h3></a>
                        </li>
<!--                        <li>
                            <a href="<?php echo base_url();?>designation"><h3><i class="fa fa-sitemap"></i> <span class="nav-label">Designation</span></h3></a>
                        </li>-->
                        <li>
                            <a href="<?php echo base_url();?>customer"><h3><i class="fa fa-users"></i> <span class="nav-label">Customers</span></h3></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>service"><h3><i class="fa fa-cube"></i> <span class="nav-label">Service</span></h3></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/customers_selected_services"><h3><i class="fa fa-cubes"></i> <span class="nav-label">Customers Selected Service</span></h3></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>package"><h3><i class="fa fa-money"></i> <span class="nav-label">Package</span></h3></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>blog"><h3><i class="fa fa-rss-square"></i> <span class="nav-label">Blogs</span></h3></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/feedback"><h3><i class="fa fa-comments-o"></i> <span class="nav-label">Customer Feedback</span></h3></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/contact_us"><h3><i class="fa fa-mobile-phone"></i> <span class="nav-label">Contact us</span></h3></a>
                        </li>
                    <?php }else{ ?>
                            <li>
                                <a href="<?php echo base_url();?>service/service_booking"><h3><i class="fa fa-bookmark-o"></i> <span class="nav-label">Service Booking</span></h3></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>service/selected_services"><h3><i class="fa fa-cubes"></i> <span class="nav-label">Seleted Services</span></h3></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>customer/feedback"><h3><i class="fa fa-comments-o"></i> <span class="nav-label">Feedback</span></h3></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><h3><i class="fa fa-th-large"></i> <span class="nav-label">Profile</span> <span class="fa arrow"></span></h3></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url();?>customer/editprofile"><h3><i class="fa fa-user-plus"></i> <span class="nav-label">Edit Profile</span></h3></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>customer/resetpassword"><h3><i class="fa fa-key"></i> <span class="nav-label">Reset Password</span></h3></a>
                                    </li>

                                </ul>
                            </li>

                    <?php } ?>
                    
<!--                    <li>
                        <a href="index.html"><h3><i class="fa fa-th-large"></i> <span class="nav-label">Inventory</span> <span class="fa arrow"></span></h3></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url();?>products"><h3><i class="fa fa-cube"></i> <span class="nav-label">Products</span></h3></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>product-stock"><h3><i class="fa fa-cubes"></i> <span class="nav-label">Product Stock</span></h3></a>
                            </li>
                            
                        </ul>
                    </li>-->
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!-- <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> -->
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Build Servo</span>
                </li>
                <li>
                    <a href="<?php echo base_url();?>admin/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>