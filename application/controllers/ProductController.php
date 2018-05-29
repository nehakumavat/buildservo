<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

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
        $this->load->model('product_model');
    }
	public function products()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$data['products']=$this->product_model->products();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('products',$data);
			$this->load->view('includes/footer');
		}
	}
	public function add_product()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$product_data = $this->input->post();
			$product_data['created_at']=date('Y-m-d H:i:s');
			$result=$this->product_model->add_product($product_data);
			if ($result) 
			{
				$this->session->set_flashdata('add_success', 'Product Added Succesfully');
				return redirect('products', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('add_failed', 'Failed to add Product');
				return redirect('products', 'refresh');
			}
		}
	}
	public function delete_product()
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

	        $result=$this->product_model->delete_product($id);
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



    /*Code for Product Stock*/
    public function product_stock()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$data['product_stock']=$this->product_model->product_stock();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('product-stock',$data);
			$this->load->view('includes/footer');
		}
	}
	public function add_product_stock()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$data['purchase_order_number']=$this->product_model->purchase_order_number();
			$data['products']=$this->product_model->products();
			$data['brands']=$this->product_model->brands();
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view('add-product-stock',$data);
			$this->load->view('includes/footer');
		}
	}
	public function add_product_stock_details()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
			$product_stock_data = $this->input->post();
			$barcode=$product_stock_data['barcode'];
			$product_stock_data['created_at']=date('Y-m-d H:i:s');
			$result=$this->product_model->add_product_stock_details($product_stock_data);
			if ($result) 
			{
				$result1=$this->product_model->update_barcode_status($barcode);
				$this->session->set_flashdata('add_success', 'Product Stock Added Succesfully');
				return redirect('product-stock', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('add_failed', 'Failed to add Product Stock');
				return redirect('product-stock', 'refresh');
			}
		}
	}
	public function delete_product_stock()
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

	        $result=$this->product_model->delete_product_stock($id);
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
    /*Code for Product Stock*/
}
