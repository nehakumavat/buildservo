<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
   function add_transaction($transaction_data)
   {
   		$this->db->trans_start();
        $this->db->insert('tbl_transactions', $transaction_data);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
   }
   function transactions()
   {
   		$query = $this->db->query("SELECT c.* from tbl_transactions c");
		return $query->result();
   }
   public function delete_transaction($id)
   {
   		return $this->db->delete('tbl_transactions',['transaction_id'=>$id]);
   }
   /*function transaction($id)
   {
   		$query = $this->db->query("SELECT c.* from tbl_transactions c WHERE c.transaction_id='$id'");
		return $query->row();
   }
   public function update_transaction($transaction_id,$transaction_data)
  {
    $query= $this->db
    ->where('transaction_id',$transaction_id)
    ->update('tbl_transactions',$transaction_data);

    if($query)
    {
      return true; 
    }
    else
    {
      return false;
    }  
  }*/
}

  