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
        $this->load->view('includes/header');
        $this->load->view('login');
        $this->load->view('includes/footer');
    }

    public function login() {//function for admin login

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        //$result = $this->login_model->validate($username, $password);
        $result = $this->login_model->validate_admin($username, $password);  // For admin login only
        if (!empty($result)) {
//            foreach ($result as $res) {
//                if ($res->status === '1') {
//                    $newdata = array
//                        (
//                        'id' => $res->id,
//                        'name' => $res->name,
//                        'username' => $res->username,
//                        'password' => $res->password,
//                        'type' => $res->type,
//                        'status' => $res->status,
//                        'privileges' => $res->privileges,
//                        //'image'=>$res->adminfile,
//                        'logged_in' => TRUE
//                    );
//                    $this->session->set_userdata($newdata);
//                    $this->session->set_flashdata('login_success', 'Welcome to your Dashboard');
//                    redirect('dashboard', 'refresh');
//                }
//            }
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
    public function logout() {
        $this->session->sess_destroy();

        redirect('LoginController/index', 'refresh');
    }

}
