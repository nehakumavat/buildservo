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
    public function service_booking() {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('home', 'refresh');
        } else {
           
            $data['service_list'] = $this->service_model->get_service();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('service/service_booking_list', $data);
            $this->load->view('includes/footer');
        }
    }
    public function service_booking_view() 
    {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('home', 'refresh');
        } else {
            $get=$this->input->get();    
            $data['service_detail']=$this->service_model->get_service_by_id($get['id']);
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('service/service_booking_view', $data);
            $this->load->view('includes/footer');
        }
    }
    public function book_service()
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('home', 'refresh');
        } else {
            $get=$this->input->get();
            if($this->input->post()){
                $this->form_validation->set_rules('booking_date', 'Booking Date', 'trim|required');
                $this->form_validation->set_rules('address', 'Adderss', 'trim|required');
                $this->form_validation->set_rules('city','City', 'required');
                $this->form_validation->set_rules('pincode','Pincode', 'required|numeric|regex_match[/^[0-9]{6}$/]');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $details = $this->input->post();
                if($this->form_validation->run() == TRUE){
                    
                    $date=date_create($details['booking_date']);
                    $booking_date=date_format($date,"Y-m-d");      
                    $details['booking_date'] = $booking_date;
                    $details['service_status'] = 1;
                    $details['customer_id'] = $this->session->userdata('customer_profile_id');
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->service_model->book_service($details);
                    if ($result) {
                        $this->session->set_flashdata('add_success', 'Your Service is book successfully.');
                        return redirect('service/selected_services', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to book service');
                        $data['title']='Add';
                        $data['service_detail']=$this->service_model->get_service_by_id($details['service_id']);
                        $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('service/book_service_form', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['title']='Add';
                    $data['service_detail']=$this->service_model->get_service_by_id($details['service_id']);
                    $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('service/book_service_form', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['title']='Add';
                $data['service_detail']=$this->service_model->get_service_by_id($get['id']);
                $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('service/book_service_form', $data);
                $this->load->view('includes/footer');
            }
            
        }
    }
    public function selected_services(){
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('home', 'refresh');
        } else {
            $data['selected_service_list'] = $this->service_model->get_selected_service_by_customer_id($this->session->userdata('customer_profile_id'));
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('service/selected_service_list', $data);
            $this->load->view('includes/footer');
        }
    }
    public function selected_services_view() {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('home', 'refresh');
        } else {
            $get=$this->input->get();
            
            $selected_service_details = $this->service_model->get_selected_service_by_id($get['id']);
            $data['selected_service_detail'] = $selected_service_details;
            $data['service_detail']=$this->service_model->get_service_by_id($selected_service_details['service_id']);    
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('service/selected_service_view', $data);
            $this->load->view('includes/footer');
        }
    }
    public function selected_services_cancle() {
        $post=$this->input->post();
        $data=array('id'=>$post['id'],
                    'service_status'=>3
                );
        $result=$this->service_model->update_selected_service_status($data);
        echo $result;
        
    }
    
}
