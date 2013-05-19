<?php

class paymentModel extends CI_Model {

    public function addBank($dat) {
        $this->db->insert("payment_setting", $dat);
    }

    public function showAll($bank_name) {
        $this->db->where('bank_name', $bank_name);
        $query = $this->db->get('payment_setting');
        return $query->result();
    }
    
   function  addShelinAndDolar($dat){
          $this->db->insert("shelin_convert_setting", $dat);
       
    }

    
    function updateBankDetail($data,$name){
        $this->db->where('bank_name', $name);
        $this->db->update('payment_setting', $data);
    }
}

?>
