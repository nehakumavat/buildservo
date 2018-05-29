<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrderController extends CI_Controller {

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
        $this->load->model('purchaseorder_model');
        $this->load->model('product_model');
        $this->load->model('brand_model');
        $this->load->model('supplier_model');
    }
	public function purchase_orders()
	{
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
    		$data['purchase_orders']=$this->purchaseorder_model->purchase_orders();
    		$this->load->view('includes/header');
    		$this->load->view('includes/sidebar');
    		$this->load->view('purchase-orders',$data);
    		$this->load->view('includes/footer');
        }
	}
	public function add_purchase_order()
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
    		$data['products']=$this->product_model->products();
    		$data['brands']=$this->brand_model->brands();
    		$this->load->view('includes/header');
    		$this->load->view('includes/sidebar');
    		$this->load->view('add-purchase-order',$data);
    		$this->load->view('includes/footer');
        }
	}
	public function add_purchase_order_details()
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
    		$shipping_address=$this->input->post('shipping_address');
            $purchase_order_date=$this->input->post('purchase_order_date');
            $note=$this->input->post('note');
            
            $year=date("Y");
            $month=date("M");
            $order_id=$this->purchaseorder_model->GetPurchaseOrderNumber();
            if ($order_id) 
            {
                $order_id = $order_id+1;
            }
            else
            {
                $order_id=1;
            }
            $purchase_order_number='PO'.'-'.$year.'-'.$month.'-'.$order_id;
            
            $purchaseOrderInfo = array('purchase_order_number'=>$purchase_order_number,'supplier_id' =>$supplier_id,'shipping_address' =>$shipping_address,'note'=>$note,'purchase_order_date' =>$purchase_order_date,'created_at'=>date('Y-m-d H:i:s'));
            $result=$this->purchaseorder_model->add_purchase_order_details($purchaseOrderInfo);
            $result1=$this->purchaseorder_model->GetPurchaseOrderNumber();


            $len=sizeof($_POST['items']);
            $result2;
            for ($i=0; $i <$len; $i++) { 
                
                if (sizeof($_POST['items'][$i])) 
                {
                    $product_id=$_POST['items'][$i]['product_id'];
                    $unit_of_measure=$_POST['items'][$i]['unit_of_measure'];
                    $brand_id=$_POST['items'][$i]['brand_id'];
                    $quantity=$_POST['items'][$i]['quantity'];
                    
                    $created_at=date('Y-m-d H:i:s');
                    $info = array('purchase_order_number' => $purchase_order_number,'product_id'=>$product_id,'quantity'=>$quantity,'unit_of_measure'=>$unit_of_measure,'brand_id'=>$brand_id,'created_at'=>$created_at);
                    $result2=$this->purchaseorder_model->add_purchase_order_details_one($info);
                }
                
               
            }
            echo "success";
        }
	}
	public function delete_purchase_order()
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
            $purchase_order_number=$this->purchaseorder_model->purchase_order_number($id);
            $result=$this->purchaseorder_model->delete_purchase_order($purchase_order_number);
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
    public function print_purchase_order($purchase_order_number)
    {
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
        	$data['purchase_order']=$this->purchaseorder_model->get_purchase_order($purchase_order_number);
        	$data['purchase_order_details']=$this->purchaseorder_model->get_purchase_order_details($purchase_order_number);
        	$this->load->view('purchase-order-print',$data);
        }
    }
}
