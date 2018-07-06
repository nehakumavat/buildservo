<div role="main" class="main" style="margin-top: 100px;">

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    <div id="googlemaps" class="google-map"></div>

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
            <div class="col-md-6">
                
                <h2 class="mb-sm mt-sm"><strong>Contact</strong> Us</h2>
                <form id="contactForm"  method="POST" name="contactform">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Your name *</label>
                                <input type="text" value="<?= !empty($this->session->userdata('customer_name'))?$this->session->userdata('customer_name'):set_value('name')?>" data-msg-required="Please enter your name." class="form-control" name="name" id="name" required>
                                <div class="error"><?php echo form_error('name'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Your Mobile Number *</label>
                                <input type="text" value="<?= !empty($this->session->userdata('customer_mob'))?$this->session->userdata('customer_mob'):set_value('mobile_no')?>" data-msg-required="Please enter your mobile number."  class="form-control" name="mobile_no" id="mobile_no" required>
                                <div class="error"><?php echo form_error('mobile_no'); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label>Your email address *</label>
                                <input type="email" value="<?= !empty($this->session->userdata('customer_email'))?$this->session->userdata('customer_email'):set_value('email_id')?>" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email_id" id="email_id" required>
                                <div class="error"><?php echo form_error('email_id'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Subject *</label>
                                <input type="text" value="<?= set_value('subject')?>" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                                <div class="error"><?php echo form_error('subject'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Message *</label>
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
                                <div class="error"><?php echo form_error('message'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

                <h4 class="heading-primary mt-lg">Get in <strong>Touch</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <hr>

                <h4 class="heading-primary">The <strong>Office</strong></h4>
                <ul class="list list-icons list-icons-style-3 mt-xlg">
                    <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>
                    <li><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</li>
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
                </ul>

                <hr>

                <h4 class="heading-primary">Business <strong>Hours</strong></h4>
                <ul class="list list-icons list-dark mt-xlg">
                    <li><i class="fa fa-clock-o"></i> Monday - Friday 9am to 5pm</li>
                    <li><i class="fa fa-clock-o"></i> Saturday - 9am to 2pm</li>
                    <li><i class="fa fa-clock-o"></i> Sunday - Closed</li>
                </ul>

            </div>

        </div>

    </div>

</div>