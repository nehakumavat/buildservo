<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesOrderController extends CI_Controller {

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
        $this->load->model('salesorder_model');
        $this->load->model('product_model');
        $this->load->model('brand_model');
        $this->load->model('supplier_model');
    }
	public function sales_orders()
	{
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
    		$data['sales_orders']=$this->salesorder_model->sales_orders();
    		$this->load->view('includes/header');
    		$this->load->view('includes/sidebar');
    		$this->load->view('sales-orders',$data);
    		$this->load->view('includes/footer');
        }
	}
	public function add_sales_order()
	{
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
    		$this->load->view('includes/header');
    		$this->load->view('includes/sidebar');
    		$this->load->view('add-sales-order');
    		$this->load->view('includes/footer');
        }
	}
	public function add_sales_order_details()
	{
		$logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
    		$customer_id = $this->input->post('customer_id');
            $bill_date = $this->input->post('bill_date');
            $bill_type = $this->input->post('bill_type');
            $note= $this->input->post('note');
            $discount= $this->input->post('discount');
            $subtotal= $this->input->post('main_subtotal');
            $discount_value= $this->input->post('discount_value');
            $tax= $this->input->post('tax');
            $tax_value= $this->input->post('tax_value');
            $grand_total=$this->input->post('grand_total');
            
            
            $year=date("Y");
            $month=date("M");
            $order_id=$this->salesorder_model->GetSalesOrderNumber();
            if ($order_id) 
            {
                $order_id = $order_id+1;
            }
            else
            {
                $order_id=1;
            }
            $sales_order_number='SO'.'-'.$year.'-'.$month.'-'.$order_id;
            
            $salesOrderInfo = array('sales_order_number'=>$sales_order_number,'customer_id' =>$customer_id,'bill_date' =>$bill_date,'bill_type'=>$bill_type,'subtotal' =>$subtotal,'discount' =>$discount,'discount_value' =>$discount_value,'tax' =>$tax,'tax_value' =>$tax_value,'grand_total' =>$grand_total,'note' =>$note,'created_at'=>date('Y-m-d H:i:s'));
            $result=$this->salesorder_model->add_sales_order_details($salesOrderInfo);
            $result1=$this->salesorder_model->GetSalesOrderNumber();


            $len=sizeof($_POST['items']);
            $result2;
            $items1=array();
            for ($i=0; $i <$len; $i++) 
            { 
                if (sizeof($_POST['items'][$i])) 
                {
                    $barcode=$_POST['items'][$i]['barcode'];
                    $product_id=$_POST['items'][$i]['product_id'];
                    $items1[$i]=$this->salesorder_model->getRequiredStock($barcode,$product_id);
                }
            }
            $qty=0;
            $len1=sizeof($items1);

            for ($i=0; $i < $len1; $i++) 
            { 
                $qty=0;
                $remaining=0;
                for ($j=0; $j < sizeof($items1[$i]); $j++) 
                { 
                    $remaining=0;
                    if ($items1[$i][$j]->quantity <= $_POST['items'][$i]['quantity']) 
                    {
                        $qty=$_POST['items'][$i]['quantity']-$items1[$i][$j]->quantity;
                        $remaining=$_POST['items'][$i]['quantity']-$qty;
                        //$_POST['items'][$i]['quantity']=$qty;


                        $product_stock_id=$items1[$i][$j]->product_stock_id;
                        $quantity=$_POST['items'][$i]['quantity'];
                        $barcode=$items1[$i][$j]->barcode;
                        $product_id=$items1[$i][$j]->product_id;
                        $brand_id=$items1[$i][$j]->brand_id;
                        $selling_price=$items1[$i][$j]->selling_price;
                        $subtotal1=$quantity*$items1[$i][$j]->selling_price;

                        $result11=$this->salesorder_model->UpdateStock($product_stock_id,$product_id,$barcode,$remaining);
                        $info = array('sales_order_number' => $sales_order_number,'product_id'=>$product_id,'brand_id'=>$brand_id,'barcode'=>$barcode,'product_stock_id'=>$product_stock_id,'quantity'=>$quantity,'price'=>$selling_price,'subtotal'=>$subtotal1,'created_at'=>date('Y-m-d H:i:s'));
                        $result12=$this->salesorder_model->add_sales_order_details_one($info);
                    }
                    else
                    {

                        $qty=$items1[$i][$j]->quantity-$_POST['items'][$i]['quantity'];
                        $remaining=$items1[$i][$j]->quantity-$qty;

                        $product_stock_id=$items1[$i][$j]->product_stock_id;
                        $barcode=$items1[$i][$j]->barcode;
                        $quantity=$_POST['items'][$i]['quantity'];
                        $product_id=$items1[$i][$j]->product_id;
                        $brand_id=$items1[$i][$j]->brand_id;
                        $_POST['items'][$i]['quantity']=0;
                        $selling_price=$items1[$i][$j]->selling_price;
                        $subtotal1=$quantity*$items1[$i][$j]->selling_price;


                        $result11=$this->salesorder_model->UpdateStock($product_stock_id,$product_id,$barcode,$remaining);
                        

                        if ((int)$quantity > 0) 
                        {
                            $info = array('sales_order_number' => $sales_order_number,'product_id'=>$product_id,'brand_id'=>$brand_id,'barcode'=>$barcode,'product_stock_id'=>$product_stock_id,'quantity'=>$quantity,'price'=>$selling_price,'subtotal'=>$subtotal1,'created_at'=>date('Y-m-d H:i:s'));
                            $result12=$this->salesorder_model->add_sales_order_details_one($info);
                        }
                    }

                }
            }
            echo "success";
        }
	}
	public function delete_sales_order()
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
            $sales_order_number=$this->salesorder_model->sales_order_number($id);
            $result=$this->salesorder_model->delete_sales_order($sales_order_number);
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
    public function print_sales_order($sales_order_number)
    {
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
        	$data['sales_order']=$this->salesorder_model->get_sales_order($sales_order_number);
        	$data['sales_order_details']=$this->salesorder_model->get_sales_order_details($sales_order_number);
        	$this->load->view('sales-order-print',$data);
        }
    }
    public function get_customer_details()
    {
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
            $customer_phone=$_POST['customer_phone'];
            $result=$this->salesorder_model->get_customer_details($customer_phone);
            
            if ($result) 
            {
                echo json_encode($result);
            }
            else
            {
                echo json_encode("false");
            }
        }
        
    }
    public function get_product_details()
    {
        $logged_in = $_SESSION['logged_in'];


        if(!isset($logged_in) || $logged_in != TRUE)
        {
            $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
            redirect('LoginController/index', 'refresh');
        }
        else
        {
            $barcode=$_POST['barcode'];
            $result=$this->salesorder_model->get_product_details($barcode);
            
            if ($result) 
            {
                echo json_encode($result);
            }
            else
            {
                echo json_encode("false");
            }
        }
        
    }
}
