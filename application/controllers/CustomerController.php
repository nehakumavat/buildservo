<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {

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
    }
    public function index() 
    {
            
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('LoginController/index', 'refresh');
        } else {
           
            $data['customer_list'] = $this->customer_model->get_customer();
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');
            $this->load->view('customer/list', $data);
            $this->load->view('includes/footer');
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
                $result=$this->customer_model->delete_customer($get['id']);
                if($result){
                    $this->session->set_flashdata('add_success', 'Customer Deleted Succesfully');
                    return redirect('customer', 'refresh');
                }else{
                    $this->session->set_flashdata('add_failed', 'Customer cannot deleted');
                    return redirect('customer', 'refresh');
                }
            }else{
                return redirect('customer', 'refresh');
            }
        }
        
    }
    public function editprofile()
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('login', 'refresh');
        }else{
            
            if($this->input->post()){
                $this->form_validation->set_rules('customer_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('customer_mob', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
                $this->form_validation->set_rules('customer_email','E-mail', 'required');
                $this->form_validation->set_rules('customer_address', 'Address', 'trim|required');
                $this->form_validation->set_rules('customer_city', 'City', 'trim|required');
                $this->form_validation->set_rules('customer_pincode', 'Pincode', 'trim|required|regex_match[/^[0-9]{6}$/]');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == TRUE){
                    $details = $this->input->post();
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->customer_model->edit_customer($details);
                    if ($result) {
                        $session_data=array('customer_profile_id'=>$details['customer_profile_id'],
                                            'customer_name'=>$details['customer_name'],
                                            'customer_mob'=>$details['customer_mob'],
                                            'customer_email'=>$details['customer_email'],
                                        );
                        $this->session->set_userdata($session_data);
                        $this->session->set_flashdata('add_success', 'Profile Updated Succesfully');
                        redirect('customer/editprofile', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to update profile');
                        $data['title']='Edit';
                        $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('customer/form_data', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['title']='Edit';
                    $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('customer/form_data', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['title']='Edit';
                $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('customer/form_data', $data);
                $this->load->view('includes/footer');
            }
        }
    }
    public function resetpassword()
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'Please login');
            redirect('login', 'refresh');
        }else{
            
            if($this->input->post()){
                $this->form_validation->set_rules('customer_password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[customer_password]');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == TRUE){
                    $details = $this->input->post();
                    if(isset($details['confirm_password'])){
                        unset($details['confirm_password']);
                    }
                    $details['customer_password'] = md5($details['customer_password']);
                    $result = $this->customer_model->edit_customer($details);
                    if ($result) {
                        $this->session->set_flashdata('add_success', 'Password Changed Succesfully');
                        redirect('dashboard', 'refresh');
                    } else {
                        $this->session->set_flashdata('add_failed', 'Failed to update password');
                        $data['title']='Reset';
                        $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                        $this->load->view('includes/header');
                        $this->load->view('includes/sidebar');
                        $this->load->view('customer/reset_password', $data);
                        $this->load->view('includes/footer');
                    }
                }else{
                    $data['title']='Reset';
                    $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                    $this->load->view('includes/header');
                    $this->load->view('includes/sidebar');
                    $this->load->view('customer/reset_password', $data);
                    $this->load->view('includes/footer');
                }
            }else{
                $data['title']='Reset';
                $data['customer_details']=$this->customer_model->get_customer_by_id($this->session->userdata('customer_profile_id'));
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('customer/reset_password', $data);
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
