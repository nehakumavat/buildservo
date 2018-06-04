<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  public function login()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/login');
    $this->load->view('frontend/includes/footer');
  }
  public function register()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/register');
    $this->load->view('frontend/includes/footer');
  }
  public function home()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/home');
    $this->load->view('frontend/includes/footer');
  }
  public function about_us()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/about-us');
    $this->load->view('frontend/includes/footer');
  }
  public function services()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/services');
    $this->load->view('frontend/includes/footer');
  }
  public function service_details()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/service-details');
    $this->load->view('frontend/includes/footer');
  }
  public function pricing()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/pricing');
    $this->load->view('frontend/includes/footer');
  }
  public function blogs()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/blogs');
    $this->load->view('frontend/includes/footer');
  }
  public function blog_details()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/blog-details');
    $this->load->view('frontend/includes/footer');
  }
  public function contact_us()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/contact-us');
    $this->load->view('frontend/includes/footer');
  }
  public function sitemap()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/sitemap');
    $this->load->view('frontend/includes/footer');
  }
  public function faq()
  {
    $this->load->view('frontend/includes/header');
    $this->load->view('frontend/faq');
    $this->load->view('frontend/includes/footer');
  }
}
