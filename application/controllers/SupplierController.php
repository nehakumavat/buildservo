<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller {

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
	public function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_model');
    }
	public function suppliers()
	{
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
    		$data['suppliers']=$this->supplier_model->suppliers();
    		$this->load->view('includes/header');
    		$this->load->view('includes/sidebar');
    		$this->load->view('suppliers',$data);
    		$this->load->view('includes/footer');
        }
	}
    public function add_supplier()
	{
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
    		$supplier_data = $this->input->post();
    		$supplier_data['created_at']=date('Y-m-d H:i:s');
    		$result=$this->supplier_model->add_supplier($supplier_data);
    		if ($result) 
    		{
    			$this->session->set_flashdata('add_success', 'Supplier Added Succesfully');
    			return redirect('suppliers', 'refresh');
    		}
    		else
    		{
    			$this->session->set_flashdata('add_failed', 'Failed to add Supplier');
    			return redirect('suppliers', 'refresh');
    		}
        }
	}
	public function delete_supplier()
    {
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
            $id=$_POST['id'];

            $result=$this->supplier_model->delete_supplier($id);
            if ($result) 
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
        
    }
    public function supplier()
    {
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
            $id=$_POST['id'];
            $result=$this->supplier_model->supplier($id);
            
            if ($result) 
            {
                echo json_encode($result);
            }
            else
            {
                echo "false";
            }
        }
        
    }
    public function update_supplier()
    {
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
        	$supplier_id=$this->input->post('supplier_id');
        	$supplier_data=$this->input->post();
       
        	$result=$this->supplier_model->update_supplier($supplier_id,$supplier_data);
        	if ($result) 
        	{
        		$this->session->set_flashdata('update_success', 'Supplier Updated Succesfully');
    			return redirect('suppliers', 'refresh');
        	}
        	else
        	{
        		$this->session->set_flashdata('update_failed', 'Failed to update Supplier');
    			return redirect('suppliers', 'refresh');
        	}
        }


    }
}
