<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionController extends CI_Controller {

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
        $this->load->model('transaction_model');
    }
	public function transactions()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$data['transactions']=$this->transaction_model->transactions();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('transactions',$data);
			$this->load->view('includes/footer');
		}
	}
    public function add_transaction()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$transaction_data = $this->input->post();
			$transaction_data['created_date']=date('Y-m-d H:i:s');
			$result=$this->transaction_model->add_transaction($transaction_data);
			if ($result) 
			{
				$this->session->set_flashdata('add_success', 'Transaction Added Succesfully');
				return redirect('transactions', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('add_failed', 'Failed to add Transaction');
				return redirect('transactions', 'refresh');
			}
		}
	}
	public function delete_transaction()
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

	        $result=$this->transaction_model->delete_transaction($id);
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
    public function transaction()
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
	        $result=$this->transaction_model->transaction($id);
	        
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
    /*public function update_transaction()
    {
    	$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
	    	$transaction_id=$this->input->post('transaction_id');
	    	$transaction_data=$this->input->post();
	    	$result=$this->transaction_model->update_transaction($transaction_id,$transaction_data);
	    	if ($result) 
	    	{
	    		$this->session->set_flashdata('update_success', 'Transaction Updated Succesfully');
				return redirect('transactions', 'refresh');
	    	}
	    	else
	    	{
	    		$this->session->set_flashdata('update_failed', 'Failed to update Transaction');
				return redirect('transactions', 'refresh');
	    	}
	    }


    }*/
}
