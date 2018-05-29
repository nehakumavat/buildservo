<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrandController extends CI_Controller {

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
        $this->load->model('brand_model');
    }
	public function brands()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
	    {
			$data['brands']=$this->brand_model->brands();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('brands',$data);
			$this->load->view('includes/footer');
		}
	}
	public function add_brand()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$brand_data = $this->input->post();
			$brand_data['created_at']=date('Y-m-d H:i:s');
			$result=$this->brand_model->add_brand($brand_data);
			if ($result) 
			{
				$this->session->set_flashdata('add_success', 'Brand Added Succesfully');
				return redirect('brands', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('add_failed', 'Failed to add Brand');
				return redirect('brands', 'refresh');
			}
		}
	}
	public function delete_brand()
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

	        $result=$this->brand_model->delete_brand($id);
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
}
