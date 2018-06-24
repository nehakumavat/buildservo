<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PackageController extends CI_Controller {

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
        $this->load->model('package_model');
        $this->load->model('service_model');
        
    }
    
    public function index() {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
           
            $data['package_list'] = $this->package_model->get_package();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('package/list', $data);
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
                $this->form_validation->set_rules('package_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('cost', 'Mobile Number', 'trim|required|numeric');
                $this->form_validation->set_rules('service_id[]','Service', 'required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == TRUE){
                    $details = $this->input->post();
                    $details['service_id']= implode(',',$details['service_id']);
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->package_model->add_package($details);
                    if ($result) {
                        $this->session->set_flashdata('add_success', 'Package Added Succesfully');
                        return redirect('package', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to add package');
                        $data['service_list']=$this->service_model->get_service();
                        $data['title']='Add';
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('package/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['service_list']=$this->service_model->get_service();
                    $data['title']='Add';
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('package/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['service_list']=$this->service_model->get_service();
                $data['title']='Add';
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('package/form_data', $data);
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
                $this->form_validation->set_rules('package_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('cost', 'Mobile Number', 'trim|required|numeric');
                $this->form_validation->set_rules('service_id[]','Service', 'required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $post = $this->input->post();
                if($this->form_validation->run() == TRUE){
                    $details=$post;
                    $details['service_id']= implode(',',$details['service_id']);
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->package_model->edit_package($details);
                    if($result) {
                        $this->session->set_flashdata('add_success', 'Package Updated Succesfully');
                        return redirect('package', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to update package');
                        $data['package_detail']=$this->package_model->get_package_by_id($details['package_id']);
                        $data['title']='Edit';
                        $data['service_list']=$this->service_model->get_service();
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('package/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['package_detail']=$this->package_model->get_package_by_id($post['package_id']);
                    $data['title']='Edit';
                    $data['service_list']=$this->service_model->get_service();
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('package/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['package_detail']=$this->package_model->get_package_by_id($get['id']);
                $data['title']='Edit';
                $data['service_list']=$this->service_model->get_service();
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('package/form_data', $data);
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
                $result=$this->package_model->delete_package($get['id']);
                if($result){
                    $this->session->set_flashdata('add_success', 'Package Deleted Succesfully');
                    return redirect('package', 'refresh');
                }else{
                    $this->session->set_flashdata('add_failed', 'Package cannot deleted');
                    return redirect('package', 'refresh');
                }
            }else{
                return redirect('package', 'refresh');
            }
        }
        
    }
    public function customer_groups() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $data['customer_groups'] = $this->customer_model->customer_groups();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('customer-groups', $data);
            $this->load->view('includes/footer');
        }
    }

    public function add_customer_group() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $group_data = $this->input->post();
            $group_data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->customer_model->add_customer_group($group_data);
            if ($result) {
                $this->session->set_flashdata('add_success', 'Customer Group Added Succesfully');
                return redirect('customer-groups', 'refresh');
            } else {
                $this->session->set_flashdata('add_failed', 'Failed to add Customer Group');
                return redirect('customer-groups', 'refresh');
            }
        }
    }

    public function delete_group() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $id = $_POST['id'];

            $result = $this->customer_model->delete_group($id);
            if ($result) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }

    public function customers() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $data['customer_groups'] = $this->customer_model->customer_groups();
            $data['customers'] = $this->customer_model->customers();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('customers', $data);
            $this->load->view('includes/footer');
        }
    }

    public function add_customer() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $customer_data = $this->input->post();
            $customer_data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->customer_model->add_customer($customer_data);
            if ($result) {
                $this->session->set_flashdata('add_success', 'Customer Added Succesfully');
                return redirect('customers', 'refresh');
            } else {
                $this->session->set_flashdata('add_failed', 'Failed to add Customer');
                return redirect('customers', 'refresh');
            }
        }
    }

    public function delete_customer() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $id = $_POST['id'];

            $result = $this->customer_model->delete_customer($id);
            if ($result) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }

    public function customer() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $id = $_POST['id'];
            $result = $this->customer_model->customer($id);

            if ($result) {
                echo json_encode($result);
            } else {
                echo "false";
            }
        }
    }

    public function update_customer() {
        $logged_in = $_SESSION['logged_in'];


        if (!isset($logged_in) || $logged_in != TRUE) {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        } else {
            $customer_id = $this->input->post('customer_id');
            $customer_data = $this->input->post();
            $result = $this->customer_model->update_customer($customer_id, $customer_data);
            if ($result) {
                $this->session->set_flashdata('update_success', 'Customer Updated Succesfully');
                return redirect('customers', 'refresh');
            } else {
                $this->session->set_flashdata('update_failed', 'Failed to update Customer');
                return redirect('customers', 'refresh');
            }
        }
    }

}
