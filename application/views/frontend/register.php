<div role="main" class="main" style="margin-top: 100px;">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Pages</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Register</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-sm-6" style="margin-left: 270px;">
                <div class="featured-box featured-box-primary align-left mt-xlg">
                    <div class="box-content">
                        <h4 class="heading-primary text-uppercase mb-md">Register An Account</h4>
                        <form  id="frmSignUp" method="post" >
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Full name</label>
                                        <input type="text" name="customer_name"  class="form-control input-lg" value="<?php echo set_value('customer_name')?>" required>
                                        <div class="error"><?php echo form_error('customer_name'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Mobile number</label>
                                        <input type="text" name="customer_mob"  class="form-control input-lg" value="<?php echo set_value('customer_mob')?>" required>
                                        <div class="error"><?php echo form_error('customer_mob'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>E-mail</label>
                                        <input type="email" name="customer_email"  class="form-control input-lg" value="<?php echo set_value('customer_email')?>" required>
                                        <div class="error"><?php echo form_error('customer_email'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input type="text" name="customer_address"  class="form-control input-lg" value="<?php echo set_value('customer_address')?>" required>
                                        <div class="error"><?php echo form_error('customer_address'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input type="text" name="customer_city"  class="form-control input-lg" value="<?php echo set_value('customer_city')?>" required>
                                        <div class="error"><?php echo form_error('customer_city'); ?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Pincode</label>
                                        <input type="text" name="customer_pincode"  class="form-control input-lg" value="<?php echo set_value('customer_pincode')?>" required>
                                        <div class="error"><?php echo form_error('customer_pincode'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" name="customer_password" class="form-control input-lg" value="<?php echo set_value('customer_password')?>" required >
                                        <div class="error"><?php echo form_error('customer_password'); ?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Re-enter Password</label>
                                        <input type="password" name="confirm_password" class="form-control input-lg" value="<?php echo set_value('confirm_password')?>" required>
                                        <div class="error"><?php echo form_error('confirm_password'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Register" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>