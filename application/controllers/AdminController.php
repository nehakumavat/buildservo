<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
        $this->load->model('admin_model');
        
    }
    
//    public function index() {
//            
//        if (!$this->session->userdata('logged_in')) {
//            $this->session->set_flashdata('access_denied', 'Please login');
//            redirect('LoginController/index', 'refresh');
//        } else {
//           
//            $data['service_list'] = $this->service_model->get_service();
//            $this->load->view('includes/header');
//            $this->load->view('includes/sidebar');
//            $this->load->view('service/list', $data);
//            $this->load->view('includes/footer');
//        }
//    }
    
    public function customers_selected_services(){
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('admin', 'refresh');
        } else {
            $data['selected_service_list'] = $this->service_model->get_selected_service();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('admin/selected_service_list', $data);
            $this->load->view('includes/footer');
        }
    }
    public function customer_selected_services_view() {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('admin', 'refresh');
        } else {
            $get=$this->input->get();
            if($this->input->post()){
                $details = $this->input->post();
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->service_model->update_selected_service_status($details);
                if ($result) {
                    $this->session->set_flashdata('add_success', 'Selected Service updated Succesfully');
                    return redirect('admin/customers_selected_services', 'refresh');
                } else {
                    $this->session->set_flashdata('add_failed', 'Failed to update');
                    $selected_service_details = $this->service_model->get_selected_service_by_id($details['id']);
                    $data['selected_service_detail'] = $selected_service_details;
                    $data['service_detail']=$this->service_model->get_service_by_id($selected_service_details['service_id']);    
                    $data['employee_list']=$this->employee_model->get_employee();    
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('admin/selected_service_view', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $selected_service_details = $this->service_model->get_selected_service_by_id($get['id']);
                $data['selected_service_detail'] = $selected_service_details;
                $data['service_detail']=$this->service_model->get_service_by_id($selected_service_details['service_id']);    
                $data['employee_list']=$this->employee_model->get_employee();    
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('admin/selected_service_view', $data);
                $this->load->view('includes/footer');
            }
        }
    }
    public function contact_us(){
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('admin', 'refresh');
        } else {
            $data['contact_list'] = $this->admin_model->get_contact();
            //pr($data);die;
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('admin/list_contact_us', $data);
            $this->load->view('includes/footer');
        }
    }
    public function contact_delete()
    {   
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
            $get=$this->input->get();
            if(!empty($get)){
                $result=$this->admin_model->delete_contact($get['id']);
                if($result){
                    $this->session->set_flashdata('add_success', 'Contact  Deleted Succesfully');
                    return redirect('admin/contact_us', 'refresh');
                }else{
                    $this->session->set_flashdata('add_failed', 'Contact cannot deleted');
                    return redirect('admin/contact_us', 'refresh');
                }
            }else{
                return redirect('admin/contact_us', 'refresh');
            }
        }
        
    }
    public function feedback(){
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('admin', 'refresh');
        } else {
            $data['feedback_list'] = $this->admin_model->get_feedback();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('admin/list_feedback', $data);
            $this->load->view('includes/footer');
        }
    }
}
