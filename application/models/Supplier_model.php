<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
   function add_supplier($supplier_data)
   {
   		$this->db->trans_start();
        $this->db->insert('tbl_suppliers', $supplier_data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
   }
   function suppliers()
   {
   		$query = $this->db->query("SELECT * from tbl_suppliers");
		  return $query->result();
   }
   public function delete_suppliers($id)
   {
   		return $this->db->delete('tbl_suppliers',['supplier_id'=>$id]);
   }
   function supplier($id)
   {
   		$query = $this->db->query("SELECT s.* from tbl_suppliers s WHERE s.supplier_id='$id'");
		  return $query->row();
   }
   public function update_supplier($supplier_id,$supplier_data)
  {
    $query= $this->db
    ->where('supplier_id',$supplier_id)
    ->update('tbl_suppliers',$supplier_data);

    if($query)
    {
      return true; 
    }
    else
    {
      return false;
    }  
  }
  public function delete_supplier($id)
   {
      return $this->db->delete('tbl_suppliers',['supplier_id'=>$id]);
   }
}

  