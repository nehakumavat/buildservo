<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
            $this->load->model('admin_model');
            $this->load->model('employee_model');
            $this->load->model('service_model');
        }
        
	public function dashboard()
	{
            if(!$this->session->userdata('logged_in')){
                $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
                redirect('LoginController/index', 'refresh');
            }else{
                $session_value=$this->session->userdata();
                if($session_value['type']==1){
                    $data['service']=$this->service_model->get_service();
                    $data['selected_service']=$this->service_model->get_selected_service();
                    $data['customers']=$this->customer_model->get_customer();
                    $data['feedbacks']=$this->admin_model->get_feedback();
                    $data['user_details']=$this->session->userdata();
                }else{
                    $data['selected_service']=$this->service_model->get_selected_service_by_customer_id($session_value['customer_profile_id']);
                    $data['feedbacks']=$this->admin_model->get_feedback_customer_id($session_value['customer_profile_id']);
                    $data['user_details']=$this->session->userdata();
                }
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('dashboard',$data);
                $this->load->view('includes/footer');
            }
	}
}
