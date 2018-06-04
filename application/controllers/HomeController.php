<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->model('employee_model');
        $this->load->model('designation_model');
    }

    public function login() {
        
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/login');
        $this->load->view('frontend/includes/footer');
    }

    public function register() {
        if($this->input->post()){
            $this->form_validation->set_rules('customer_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('customer_mob', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('customer_email','E-mail', 'required');
            $this->form_validation->set_rules('customer_address', 'Address', 'trim|required');
            $this->form_validation->set_rules('customer_city', 'City', 'trim|required');
            $this->form_validation->set_rules('customer_pincode', 'Pincode', 'trim|required|regex_match[/^[0-9]{6}$/]');
            $this->form_validation->set_rules('customer_password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[customer_password]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $this->input->post();
                if(isset($details['confirm_password'])){
                    unset($details['confirm_password']);
                }
                $details['customer_password'] = md5($details['customer_password']);
                $details['is_active'] = 1;
                $details['is_deleted'] = 0;
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->customer_model->add_customer($details);
                if ($result) {
                    $this->session->set_flashdata('add_success', 'Register Succesfully');
                    return redirect('login', 'refresh');
                } else {
                    $this->session->set_flashdata('add_failed', 'Failed to add employee');
                    $data['title']='Add';
                    $this->load->view('frontend/includes/header');
                    $this->load->view('frontend/register');
                    $this->load->view('frontend/includes/footer');
                }
            }else{
                $data['title']='Add';
                $this->load->view('frontend/includes/header');
                $this->load->view('frontend/register');
                $this->load->view('frontend/includes/footer');
            }
        }else{
            
            $data['title']='Add';
            $this->load->view('frontend/includes/header');
            $this->load->view('frontend/register');
            $this->load->view('frontend/includes/footer');
        }
        
    }

    public function home() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/home');
        $this->load->view('frontend/includes/footer');
    }

    public function about_us() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/about-us');
        $this->load->view('frontend/includes/footer');
    }

    public function services() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/services');
        $this->load->view('frontend/includes/footer');
    }

    public function service_details() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/service-details');
        $this->load->view('frontend/includes/footer');
    }

    public function pricing() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/pricing');
        $this->load->view('frontend/includes/footer');
    }

    public function blogs() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/blogs');
        $this->load->view('frontend/includes/footer');
    }

    public function blog_details() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/blog-details');
        $this->load->view('frontend/includes/footer');
    }

    public function contact_us() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/contact-us');
        $this->load->view('frontend/includes/footer');
    }

    public function sitemap() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/sitemap');
        $this->load->view('frontend/includes/footer');
    }

    public function faq() {
        $this->load->view('frontend/includes/header');
        $this->load->view('frontend/faq');
        $this->load->view('frontend/includes/footer');
    }

}
