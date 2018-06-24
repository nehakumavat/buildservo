<div role="main" class="main" style="margin-top: 100px;">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li class="active">Pricing</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Pricing Packages</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-none"><strong>Pricing</strong> Packages</h2>
                <p>You can configure your pricing table using the grid system in order to make it <span class="alternative-font">responsive</span> for small devices.</p>

                <hr class="tall">
            </div>
        </div>

        <div class="row">
            <div class="pricing-table">
                <?php 
                    $i=1;
                    foreach ($package_list as $package){ 
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="plan <?= $i==2 ?'most-popular':'' ?>">
                            <?php if ($i==2){ ?>
                                <div class="plan-ribbon-wrapper"><div class="plan-ribbon">Popular</div></div>
                            <?php } ?>
                                <h3><?= $package['package_name'];?><span> &#8377;<?= $package['cost'];?></span></h3>
                            <ul>
                                <?php foreach(explode(',',$package['service_id']) as $service){ 
                                        $service=$this->service_model->get_service_by_id($service); 
                                        
                                ?>
                                    <li><strong><?= $service['name']?></strong></li>
                                <?php }?>
                                <li><a class="btn btn-lg btn-primary" href="javascript:void(0)">Purchase</a></li>
                            </ul>
                        </div>
                    </div>
                <?php $i++; } ?>
<!--                <div class="col-md-3 col-sm-6 center">
                    <div class="plan most-popular">
                        <div class="plan-ribbon-wrapper"><div class="plan-ribbon">Popular</div></div>
                        <h3>Professional<span>$29</span></h3>
                        <a class="btn btn-lg btn-primary" href="#">Sign up</a>
                        <ul>
                            <li><strong>5GB</strong> Disk Space</li>
                            <li><strong>50GB</strong> Monthly Bandwidth</li>
                            <li><strong>10</strong> Email Accounts</li>
                            <li><strong>Unlimited</strong> subdomains</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="plan">
                        <h3>Standard<span>$17</span></h3>
                        <a class="btn btn-lg btn-primary" href="#">Sign up</a>
                        <ul>
                            <li><strong>3GB</strong> Disk Space</li>
                            <li><strong>25GB</strong> Monthly Bandwidth</li>
                            <li><strong>5</strong> Email Accounts</li>
                            <li><strong>Unlimited</strong> subdomains</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="plan">
                        <h3>Basic<span>$9</span></h3>
                        <a class="btn btn-lg btn-primary" href="#">Sign up</a>
                        <ul>
                            <li><strong>1GB</strong> Disk Space</li>
                            <li><strong>10GB</strong> Monthly Bandwidth</li>
                            <li><strong>2</strong> Email Accounts</li>
                            <li><strong>Unlimited</strong> subdomains</li>
                        </ul>
                    </div>
                </div>-->
            </div>

        </div>

    </div>



</div>