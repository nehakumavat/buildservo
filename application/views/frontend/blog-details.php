<div role="main" class="main" style="margin-top: 100px;">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>blogs">Blogs</a></li>
                        <li class="active"><?= $blog_detail['name']?></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog Post</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post">
                        <div class="post-image">
                            <div class="owl-carousel owl-theme" data-plugin-options='{"items":1}'>
                                <div>
                                    <div class="img-thumbnail">
                                        <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/blogs/<?= $blog_detail['images']?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-date">
                            <?php $timestamp = strtotime($blog_detail['created_at']); ?>
                            <span class="day"><?= date("d", $timestamp);?></span>
                            <span class="month"><?= date("M", $timestamp);?></span>
                        </div>

                        <div class="post-content">

                            <h2><a href="javascript:void(0)"><?= $blog_detail['name']?></a></h2>

                            <div class="post-meta">
                                <span><i class="fa fa-user"></i> By <a href="#"><?= $blog_detail['author']?></a> </span>
<!--                                <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>-->
                                <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                            </div>
                            <p><?= $blog_detail['description']?></p>
                            
                        </div>
                    </article>

                </div>
            </div>

            <div class="col-md-3">
                <aside class="sidebar">
                    <h4 class="heading-primary">Quick Links</h4>
                    <ul class="nav nav-list mb-xlg">
                        <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
                        <li><a href="<?php echo base_url(); ?>services">Services</a></li>
                        <li><a href="<?php echo base_url(); ?>pricing">Pricing</a></li>
                        <li><a href="<?php echo base_url(); ?>blogs">Blogs</a></li>
                        <li><a href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
                    </ul>

                </aside>
            </div>
        </div>

    </div>

</div>