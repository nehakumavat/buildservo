<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{
   function add_customer_group($group_data)
   {
   		$this->db->trans_start();
        $this->db->insert('tbl_customer_groups', $group_data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
   }
   function customer_groups()
   {
   		$query = $this->db->query("SELECT * from tbl_customer_groups");
		return $query->result();
   }
   public function delete_group($id)
   {
   		return $this->db->delete('tbl_customer_groups',['group_id'=>$id]);
   }


   function add_customer($customer_data)
   {
   		$this->db->trans_start();
        $this->db->insert('tbl_customers', $customer_data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
   }
   function customers()
   {
   		$query = $this->db->query("SELECT c.*,cg.group_name from tbl_customers c,tbl_customer_groups cg WHERE c.group_id=cg.group_id");
		return $query->result();
   }
   public function delete_customer($id)
   {
   		return $this->db->delete('tbl_customers',['customer_id'=>$id]);
   }
   function customer($id)
   {
   		$query = $this->db->query("SELECT c.* from tbl_customers c WHERE c.customer_id='$id'");
		return $query->row();
   }
   public function update_customer($customer_id,$customer_data)
  {
    $query= $this->db
    ->where('customer_id',$customer_id)
    ->update('tbl_customers',$customer_data);

    if($query)
    {
      return true; 
    }
    else
    {
      return false;
    }  
  }
}

  