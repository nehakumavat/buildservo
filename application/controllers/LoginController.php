<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('dashboard', 'refresh');
        }else{
            $this->load->view('includes/header');
            $this->load->view('login');
            $this->load->view('includes/footer');
        }
    }

    public function login() {//function for admin login
        
        if ($this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('dashboard', 'refresh');
        }else{
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->login_model->validate_admin($username, $password);  // For admin login only
            if (!empty($result)) {
                          $newdata = array (
                                            'id' => 1,
                                            'name' => 'Admin Master',
                                            'username' => 'admin',
                                            'type' =>1,
                                            'status' => 1,
                                            'logged_in' => TRUE
                                        );
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('login_success', 'Welcome to your Dashboard');
                redirect('dashboard', 'refresh');

            } else {
                $this->session->set_flashdata('login_failed', 'Invalid Credentials, Please Enter correct ID and Password');
                redirect('LoginController/index', 'refresh');
            }
        }
    }
    public function logout() {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('admin', 'refresh');
        }else{
            if($this->session->userdata('type')==2){
                $this->session->sess_destroy();
                redirect('home', 'refresh');
            }else{
                $this->session->sess_destroy();
                redirect('LoginController/index', 'refresh');
            }
        }
    }

}
