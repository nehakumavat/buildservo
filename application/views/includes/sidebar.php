<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url();?>assets/backend/img/defaultimage.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin</strong>
                             </span>  </span> </a>
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
                    <li>
                        <a href="<?php echo base_url();?>employee"><h3><i class="fa fa-users"></i> <span class="nav-label">Employee</span></h3></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>designation"><h3><i class="fa fa-sitemap"></i> <span class="nav-label">Designation</span></h3></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>barcodes"><h3><i class="fa fa-barcode"></i> <span class="nav-label">Barcodes</span></h3></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>brands"><h3><i class="fa fa-certificate"></i> <span class="nav-label">Brands</span></h3></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>customers"><h3><i class="fa fa-users"></i> <span class="nav-label">Customers</span></h3></a>
                    </li>
                    
                    <li>
                        <a href="index.html"><h3><i class="fa fa-th-large"></i> <span class="nav-label">Inventory</span> <span class="fa arrow"></span></h3></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url();?>products"><h3><i class="fa fa-cube"></i> <span class="nav-label">Products</span></h3></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>product-stock"><h3><i class="fa fa-cubes"></i> <span class="nav-label">Product Stock</span></h3></a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                    <li>
                        <a href="<?php echo base_url();?>purchase-orders"><h3><i class="fa fa-file-excel-o"></i><span class="nav-label">Purchase Orders</span></h3></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>sales-orders"><h3><i class="fa fa-file-code-o"></i><span class="nav-label">Sales Orders</span></h3></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>suppliers"><h3><i class="fa fa-truck"></i> <span class="nav-label">Suppliers</span></h3></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>transactions"><h3><i class="fa fa-money"></i> <span class="nav-label">Transactions</span></h3></a>
                    </li>
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to TRENDZ Admin Panel.</span>
                </li>
                <li>
                    <a href="<?php echo base_url();?>logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>