<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
   function add_product($product_data)
   {
   	$this->db->trans_start();
      $this->db->insert('tbl_products', $product_data);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function products()
   {
   		$query = $this->db->query("SELECT * from tbl_products");
		  return $query->result();
   }
   public function delete_product($id)
   {
   		return $this->db->delete('tbl_products',['product_id'=>$id]);
   }

   /*Code for Product Stock*/
   function add_product_stock_details($product_stock_data)
   {
      $this->db->trans_start();
      $this->db->insert('tbl_product_stock', $product_stock_data);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function product_stock()
   {
      $query = $this->db->query("SELECT ps.*,p.product_name,b.brand_name from tbl_product_stock ps,tbl_products p,tbl_brands b WHERE ps.product_id=p.product_id AND ps.brand_id=b.brand_id");
      return $query->result();
   }
   function delete_product_stock($id)
   {
         return $this->db->delete('tbl_product_stock',['product_stock_id'=>$id]);
   }
   function purchase_order_number()
   {
      $query = $this->db->query("SELECT purchase_order_number from tbl_purchase_orders");
      return $query->result();
   }
   function brands()
   {
         $query = $this->db->query("SELECT * from tbl_brands");
        return $query->result();
   }
   function update_barcode_status($barcode)
   {
      $query = $this->db->query("UPDATE tbl_barcodes set barcode_status='used' where barcode='$barcode'");
      return TRUE;
   }
   /*Code for Product Stock*/
   
}

  