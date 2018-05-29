<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarcodeController extends CI_Controller {

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
        $this->load->model('barcode_model');
    }
	public function barcodes()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$data['barcodes']=$this->barcode_model->barcodes();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('barcodes',$data);
			$this->load->view('includes/footer');
		}
	}
	public function add_barcode()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$barcode_quantity=$this->input->post('barcode_quantity');
	        for ($i=0; $i < $barcode_quantity ; $i++) 
	        { 
	            $barcode=random_string('numeric', 8);
	            $barcode_data = array(
	            	'barcode' => $barcode,
	                'barcode_status'=>'active',
	                'created_at'=> date('Y-m-d H:i:s'),
	            );
	            $result=$this->barcode_model->add_barcode($barcode_data);
	        }
			if ($result) 
			{
				$this->session->set_flashdata('add_success', 'Barcode Added Succesfully');
				return redirect('barcodes', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('add_failed', 'Failed to add Barcode');
				return redirect('barcodes', 'refresh');
			}
		}
	}
	public function delete_barcode()
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

	        $result=$this->barcode_model->delete_barcode($id);
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
    public function print_barcode()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$print_quantity=$this->input->post('print_quantity');
			$barcode=$this->input->post('barcode');
			$data['print_quantity']=$print_quantity;
			$data['barcode']=$barcode;
			$this->load->view('print-barcode',$data);
		}
		
	}
}
