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
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <?php if($message = $this ->session->flashdata('Message')){?>
            <div class="col-md-12 ">
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$message ?>
                </div>
            </div>
        <?php }?> 
        <?php if($message = $this ->session->flashdata('Error')){?>
            <div class="col-md-12 ">
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$message ?>
                </div>
            </div>
        <?php }?>
        <div class="row">
            <div class="col-md-12" style="margin-left: 270px;">
                <div class="featured-boxes">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="featured-box featured-box-primary align-left mt-xlg">
                                <div class="box-content">
                                    <h4 class="heading-primary text-uppercase mb-md">I'm a Returning Customer</h4>
                                    <form  id="frmSignIn" method="post">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>E-mail</label>
                                                    <input type="email" name="customer_email" class="form-control input-lg" value="<?php echo set_value('customer_email'); ?>" required="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <a class="pull-right" href="#">(Lost Password?)</a>
                                                    <label>Password</label>
                                                    <input type="password" name="customer_password" class="form-control input-lg" value="<?php echo set_value('customer_password'); ?>" required="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="remember-box checkbox">
                                                    <label for="rememberme">
                                                        <input type="checkbox" id="rememberme" name="rememberme">Remember Me
                                                    </label>
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="submit" value="Login" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
<script>
    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>