<div class="text-center animated fadeInDown">
            <div class="">
                <h1 class="logo-name">Build Servo</h1>
            </div>
            <div class="middle-box loginscreen">
                <h3>Welcome to Build Servo Admin Panel</h3>
                <!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                    Continually expanded and constantly improved Inspinia Admin Them (IN+)
                </p> -->
                <p>Login in. To see it in action.</p>
                <form class="m-t" role="form" action="<?= base_url()?>admin/login" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <!-- <a href="#"><small>Forgot password?</small></a> -->
                    <!-- <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
                </form>
                <p class="m-t"> <small>Mavericks Infotech &copy; 2018</small> </p>
            </div>
    </div>
<?php
if($error = $this->session->flashdata('login_failed'))
{
?>
    <script>
        setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('<?php echo $this->session->flashdata('login_failed'); ?>', 'Error');

            }, 1300);
    </script>
<?php
}
elseif($error = $this->session->flashdata('access_denied'))
{
?>
    <script>
        setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('<?php echo $this->session->flashdata('access_denied'); ?>', 'Error');

            }, 1300);
    </script>
<?php
}
?>