<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DesignationController extends CI_Controller {

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
        $this->load->model('customer_model');
        $this->load->model('employee_model');
        $this->load->model('designation_model');
        
    }
    
    public function index() {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
           
            $data['designation_list'] = $this->designation_model->get_designation();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('designation/list', $data);
            $this->load->view('includes/footer');
        }
    }
    public function add()
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
            if($this->input->post()){
                $this->form_validation->set_rules('designation_name', 'Designation Name', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == TRUE){
                    $details = $this->input->post();
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $result = $this->designation_model->add_designation($details);
                    if ($result) {
                        $this->session->set_flashdata('add_success', 'Designation Added Succesfully');
                        return redirect('designation', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to add designation');
                        $data['title']='Add';
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('designation/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['title']='Add';
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('designation/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['title']='Add';
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('designation/form_data', $data);
                $this->load->view('includes/footer');
            }
            
        }
        
    }
    public function edit()
    {
        
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
            $get=$this->input->get();
            if($this->input->post()){
                $this->form_validation->set_rules('designation_name', 'Designation Name', 'trim|required');
                $post = $this->input->post();
                if($this->form_validation->run() == TRUE){
                    $details=$post;
                    $result = $this->designation_model->edit_designation($details);
                    if($result) {
                        $this->session->set_flashdata('add_success', 'Designaiton Updated Succesfully');
                        return redirect('designation', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to update designation');
                        $data['designation_detail']=$this->designation_model->get_designation_by_id($details['id']);
                        $data['title']='Edit';
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('designation/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['title']='Edit';
                    $data['designation_detail']=$this->designation_model->get_designation_by_id($post['id']);
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('designation/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['designation_detail']=$this->designation_model->get_designation_by_id($get['id']);
                $data['title']='Edit';
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('designation/form_data', $data);
                $this->load->view('includes/footer');
            }
            
        }
        
    }
    public function delete()
    {   
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
            $get=$this->input->get();
            if(!empty($get)){
                $result=$this->designation_model->delete_designation($get['id']);
                if($result){
                    $this->session->set_flashdata('add_success', 'Designation Deleted Succesfully');
                    return redirect('designation', 'refresh');
                }else{
                    $this->session->set_flashdata('add_failed', 'Designation cannot deleted');
                    return redirect('designation', 'refresh');
                }
            }else{
                return redirect('designation', 'refresh');
            }
        }
        
    }
}
