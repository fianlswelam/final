<?php

class csad extends CI_Model {

    public function valid_employee_pass($user, $pass) {

        $this->db->select('id,username,pass');
        $this->db->from('employee');
        $this->db->where('username', $user);
        $this->db->where('pass', $pass);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row(0)->id;
        } else {
            return false;
        }
    }

    public function update($data, $table, $where) {
        $this->db->where('id', $where);
        return $this->db->update($table, $data);
    }

}

?>