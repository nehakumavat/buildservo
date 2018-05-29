<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class SalesOrder_model extends CI_Model
{
   function add_sales_order_details($salesOrderInfo)
   {
   	$this->db->trans_start();
      $this->db->insert('tbl_sales_orders', $salesOrderInfo);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function add_sales_order_details_one($info)
   {
      $this->db->trans_start();
      $this->db->insert('tbl_sales_order_details', $info);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function sales_orders()
   {
      		$query = $this->db->query("SELECT so.*,c.customer_name from tbl_sales_orders so,tbl_customers c WHERE so.customer_id=c.customer_id");
   		  return $query->result();
   }
   public function GetSalesOrderNumber()
   {
     $this->db->select('order_id');
     $this->db->from('tbl_sales_orders');
     $this->db->order_by("order_id","DESC");
     $this->db->limit(1);

     $query = $this->db->get();

     return $query->row('order_id');
  }
   public function delete_sales_order($sales_order_number)
   {
   		$this->db->delete('tbl_sales_orders',['sales_order_number'=>$sales_order_number]);
         return $this->db->delete('tbl_sales_order_details',['sales_order_number'=>$sales_order_number]);
   }
   public function sales_order_number($id)
   {
     $this->db->select('sales_order_number');
     $this->db->from('tbl_sales_orders');
     $this->db->where('order_id',$id);

     $query = $this->db->get();

     return $query->row('sales_order_number');
  }
  public function get_sales_order($sales_order_number)
  {
      $query = $this->db->query("SELECT so.*,c.* FROM tbl_sales_orders so,tbl_customers c WHERE so.customer_id=c.customer_id AND so.sales_order_number='$sales_order_number'");
        return $query->result();
  }
  public function get_sales_order_details($sales_order_number)
  {
      $query = $this->db->query("SELECT sod.*,p.product_name,b.brand_name FROM tbl_sales_order_details sod,tbl_products p,tbl_brands b WHERE sod.product_id=p.product_id AND sod.brand_id=b.brand_id AND sod.sales_order_number='$sales_order_number'");
        return $query->result();
  }



  function get_customer_details($customer_phone)
  {
    $query = $this->db->query("SELECT c.*,cg.group_name from tbl_customers c,tbl_customer_groups cg WHERE c.group_id=cg.group_id AND c.customer_phone='$customer_phone'");
    return $query->row();
  }
  function get_product_details($barcode)
  {
    $query = $this->db->query("SELECT ps.*,p.product_name,b.brand_name from tbl_product_stock ps,tbl_products p,tbl_brands b WHERE ps.product_id=p.product_id AND ps.brand_id=b.brand_id AND ps.barcode='$barcode'");
    return $query->row();
  }


  function getRequiredStock($barcode,$product_id)
  {
    $query = $this->db->query("SELECT ps.product_stock_id,ps.selling_price,ps.product_id,ps.barcode,ps.quantity,ps.brand_id FROM tbl_product_stock ps WHERE ps.product_id='$product_id' AND ps.barcode='$barcode' ORDER BY ps.product_stock_id ASC");
    return $query->result();
  }
  function UpdateStock($product_stock_id,$product_id,$barcode,$qty)
  {
    $query = $this->db->query("UPDATE tbl_product_stock SET quantity=quantity-'$qty' WHERE product_id='$product_id' AND barcode='$barcode' AND product_stock_id='$product_stock_id'");
    return TRUE;
  }
   
}

  