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

    function addShelinAndDolar($dat) {
        $this->db->insert("shelin_convert_setting", $dat);
    }

    function updateBankDetail($data, $name) {
        $this->db->where('bank_name', $name);
        $this->db->update('payment_setting', $data);
    }

    function incrementShelin($id, $new_amount) {
        $query = "update user set amount_point = amount_point+" . $new_amount . " where id=?";
        $this->db->query($query, $id);
    }

    function decrementShelin($id, $new_amount) {
        $query = "update user set amount_point = amount_point-" . $new_amount . " where id=?";
        $this->db->query($query, $id);
    }

    function incrementDolar($id, $new_amount) {
        $query = "update user set amount_money = amount_money+" . $new_amount . " where id=?";
        $this->db->query($query, $id);
    }

    function decrementDolar($id, $new_amount) {
        $query = "update user set amount_money = amount_money-" . $new_amount . " where id=?";
        $this->db->query($query, $id);
    }

    function get_Shelin_convert_Setting() {
        $query = $this->db->get('shelin_convert_setting');
        return $query->result();
    }

}

?>