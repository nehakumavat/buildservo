<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class PurchaseOrder_model extends CI_Model
{
   function add_purchase_order_details($purchaseOrderInfo)
   {
   	$this->db->trans_start();
      $this->db->insert('tbl_purchase_orders', $purchaseOrderInfo);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function add_purchase_order_details_one($info)
   {
      $this->db->trans_start();
      $this->db->insert('tbl_purchase_order_details', $info);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function purchase_orders()
   {
      		$query = $this->db->query("SELECT po.*,s.supplier_name from tbl_purchase_orders po,tbl_suppliers s WHERE po.supplier_id=s.supplier_id");
   		  return $query->result();
   }
   public function GetPurchaseOrderNumber()
   {
     $this->db->select('order_id');
     $this->db->from('tbl_purchase_orders');
     $this->db->order_by("order_id","DESC");
     $this->db->limit(1);

     $query = $this->db->get();

     return $query->row('order_id');
  }
   public function delete_purchase_order($purchase_order_number)
   {
   		$this->db->delete('tbl_purchase_orders',['purchase_order_number'=>$purchase_order_number]);
         return $this->db->delete('tbl_purchase_order_details',['purchase_order_number'=>$purchase_order_number]);
   }
   public function purchase_order_number($id)
   {
     $this->db->select('purchase_order_number');
     $this->db->from('tbl_purchase_orders');
     $this->db->where('order_id',$id);

     $query = $this->db->get();

     return $query->row('purchase_order_number');
  }
  public function get_purchase_order($purchase_order_number)
  {
      $query = $this->db->query("SELECT po.*,pod.*,s.supplier_name,s.firm_name,s.supplier_address,s.supplier_phone,p.product_name,b.brand_name FROM tbl_purchase_orders po,tbl_purchase_order_details pod,tbl_suppliers s,tbl_products p,tbl_brands b WHERE po.purchase_order_number=pod.purchase_order_number AND po.supplier_id=s.supplier_id AND pod.product_id=p.product_id AND pod.brand_id=b.brand_id AND po.purchase_order_number='$purchase_order_number'");
        return $query->result();
  }
  public function get_purchase_order_details($purchase_order_number)
  {
      $query = $this->db->query("SELECT pod.*,p.product_name,b.brand_name FROM tbl_purchase_order_details pod,tbl_products p,tbl_brands b WHERE pod.product_id=p.product_id AND pod.brand_id=b.brand_id AND pod.purchase_order_number='$purchase_order_number'");
        return $query->result();
  }
   
}

  