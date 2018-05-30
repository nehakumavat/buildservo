<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeController extends CI_Controller {

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
           
            $data['employee_list'] = $this->employee_model->get_employee();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('employee/list', $data);
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
                $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
                $this->form_validation->set_rules('designation_id','Designation', 'required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('email_id', 'Email', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == TRUE){
                    $details = $this->input->post();
                    if (!empty($_FILES['profile_image']['name'])) {
                        $config = array();
                        $config['upload_path'] = 'assets/images/employee/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('profile_image');
                        $upload_data = $this->upload->data();
                        $profile_image= $upload_data['file_name'];   
                    } else {
                        $profile_image= '';   
                    }
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $details['profile_image'] = $profile_image;
                    $result = $this->employee_model->add_employee($details);
                    if ($result) {
                        $this->session->set_flashdata('add_success', 'Employee Added Succesfully');
                        return redirect('employee', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to add employee');
                        $data['designation']=$this->designation_model->get_designation();
                        $data['title']='Add';
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('employee/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['designation']=$this->designation_model->get_designation();
                    $data['title']='Add';
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('employee/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['designation']=$this->designation_model->get_designation();
                $data['title']='Add';
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('employee/form_data', $data);
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
                $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
                $this->form_validation->set_rules('designation_id','Designation', 'required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('email_id', 'Email', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $post = $this->input->post();
                if($this->form_validation->run() == TRUE){
                    if (!empty($_FILES['profile_image']['name'])) {
                        $config = array();
                        $config['upload_path'] = 'assets/images/employee/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('profile_image');
                        $upload_data = $this->upload->data();
                        $profile_image= $upload_data['file_name'];   
                    } else {
                        $profile_image= !empty($post['profile_image_hidden'])?$post['profile_image_hidden']:'';   
                    }
                    $details=$post;
                    if(isset($details['profile_image_hidden'])){
                        unset($details['profile_image_hidden']);
                    }
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $details['profile_image'] = $profile_image;
                    $result = $this->employee_model->edit_employee($details);
                    if($result) {
                        $this->session->set_flashdata('add_success', 'Employee Updated Succesfully');
                        return redirect('employee', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to update employee');
                        $data['employee_detail']=$this->employee_model->get_employee_by_id($details['id']);
                        $data['title']='Edit';
                        $data['designation']=$this->designation_model->get_designation();
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('employee/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['employee_detail']=$this->employee_model->get_employee_by_id($post['id']);
                    $data['title']='Edit';
                    $data['designation']=$this->designation_model->get_designation();
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('employee/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['employee_detail']=$this->employee_model->get_employee_by_id($get['id']);
                $data['title']='Edit';
                $data['designation']=$this->designation_model->get_designation();
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('employee/form_data', $data);
                $this->load->view('includes/footer');
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
