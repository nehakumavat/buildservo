<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Barcode_model extends CI_Model
{
   function add_barcode($barcode_data)
   {
   	$this->db->trans_start();
      $this->db->insert('tbl_barcodes', $barcode_data);

      $insert_id = $this->db->insert_id();

      $this->db->trans_complete();

      return $insert_id;
   }
   function barcodes()
   {
   		$query = $this->db->query("SELECT * from tbl_barcodes WHERE barcode_status='active'");
		  return $query->result();
   }
   public function delete_barcode($id)
   {
   		return $this->db->delete('tbl_barcodes',['barcode_id'=>$id]);
   }
   
}

  