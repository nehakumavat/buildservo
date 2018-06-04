<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceController extends CI_Controller {

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
        $this->load->model('service_model');
        $this->load->model('designation_model');
        
    }
    
    public function index() {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
           
            $data['service_list'] = $this->service_model->get_service();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('service/list', $data);
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
                $this->form_validation->set_rules('name', 'Service Name', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                $this->form_validation->set_rules('service_status','Service Status', 'required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == TRUE){
                    $details = $this->input->post();
                    if (!empty($_FILES['service_image']['name'])) {
                        $config = array();
                        $config['upload_path'] = 'assets/images/service/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('service_image');
                        $upload_data = $this->upload->data();
                        $service_image= $upload_data['file_name'];   
                    } else {
                        $service_image= '';   
                    }
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $details['service_image'] = $service_image;
                    $result = $this->service_model->add_service($details);
                    if ($result) {
                        $this->session->set_flashdata('add_success', 'Service Added Succesfully');
                        return redirect('service', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to add service');
                        $data['title']='Add';
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('service/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['title']='Add';
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('service/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['title']='Add';
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('service/form_data', $data);
                $this->load->view('includes/footer');
            }
            
        }
        
    }
    public function edit()
    {
        $get=$this->input->get();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Service Name', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                $this->form_validation->set_rules('service_status','Service Status', 'required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $post = $this->input->post();
                if($this->form_validation->run() == TRUE){
                    if (!empty($_FILES['service_image']['name'])) {
                        $config = array();
                        $config['upload_path'] = 'assets/images/service/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('service_image');
                        $upload_data = $this->upload->data();
                        $service_image= $upload_data['file_name'];   
                    } else {
                        $service_image= !empty($post['service_image_hidden'])?$post['service_image_hidden']:'';   
                    }
                    $details=$post;
                    if(isset($details['service_image_hidden'])){
                        unset($details['service_image_hidden']);
                    }
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $details['service_image'] = $service_image;
                    $result = $this->service_model->edit_service($details);
                    if($result) {
                        $this->session->set_flashdata('add_success', 'Service Updated Succesfully');
                        return redirect('service', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to update service');
                        $data['service_detail']=$this->service_model->get_service_by_id($details['id']);
                        $data['title']='Edit';
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('service/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['service_detail']=$this->service_model->get_service_by_id($details['id']);
                    $data['title']='Edit';
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('service/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['service_detail']=$this->service_model->get_service_by_id($get['id']);
                $data['title']='Edit';
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('service/form_data', $data);
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
                $result=$this->service_model->delete_service($get['id']);
                if($result){
                    $this->session->set_flashdata('add_success', 'Service Deleted Succesfully');
                    return redirect('service', 'refresh');
                }else{
                    $this->session->set_flashdata('add_failed', 'Service cannot deleted');
                    return redirect('service', 'refresh');
                }
            }else{
                return redirect('service', 'refresh');
            }
        }
        
    }
    
}
