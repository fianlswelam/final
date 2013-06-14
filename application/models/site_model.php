<?php

class Site_model extends CI_Model {

    public function add_temp_user($key) {


        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'payment_email' => $this->input->post('bank_email'),
            'country' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'pass' => $this->input->post('password'),
            'parent_link' => $this->input->post('parent_link'),
            'zip_code' => $this->input->post('zip_code'),
            'sec_pass' => $this->input->post('sec_password'),
            'key' => $key
        );

        $query = $this->db->insert('user_temp', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

/////////////////////////////////////add the user to it's orgin table //////////////////////////////////////////

    public function is_key_valid_user($key) {
        $this->db->where('key', $key);
        $query = $this->db->get('user_temp');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    //////////////////////////////////////////
    public function add_user($key) {
        $this->db->where('key', $key);
        $temp_user = $this->db->get('user_temp');

        if ($temp_user) {
            $row = $temp_user->row();
            $data = array(
                'username' => $row->username,
                'email' => $row->email,
                'payment_email' => $row->payment_email,
                'country' => $row->country,
                'city' => $row->city,
                'address' => $row->address,
                'phone' => $row->phone,
                'pass' => $row->pass,
                'sec_pass' => $row->sec_pass,
                'parent_link' => $row->parent_link,
                'zip_code' => $row->zip_code,
                'profile_pic' => 'default_pic.jpg',
            );


            $did_add_user = $this->db->insert('user', $data);

            if ($did_add_user) {
                $this->db->where('key', $key);
                $this->db->delete('user_temp');
                return $data['email'];
            } else {
                return false;
            }
        }
    }

    ///////////////////////////////////////////login method////////////////////////////////////////////
    public function check_can_log_in($username, $password) {

        $query = "select * from user where username=? and pass=? or sec_pass=? ";
        $result = $this->db->query($query, array($username, $password, $password));
        if ($result) {
            $result = array('id' => $result->row(0)->id,
                'email' => $result->row(0)->email,
                'amount_point' => $result->row(0)->amount_point,
                'amount_money' => $result->row(0)->amount_money
            );

            return $result;
        } else {
            return false;
        }
    }

    ///////////////////////////////////////////////////////////////
    public function can_log_in() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        // $emaiil= $this->db->where('email', $this->input->post('email'));
        // $password= $this->db->where('password', md5($this->input->post('password')));

        $query = "select id from user where username=? and pass=?  or sec_pass=?";
        $result = $this->db->query($query, array($username, $password, $password));

        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    ////////////////////////////////////////////////////////////
    function select_user($id) {
        $query = "select id,email,username,phone,country,city,address,profile_pic,zip_code,payment_email from user where id=?";
        $result = $this->db->query($query, $id);
        if ($result->num_rows() == 1) {
            $data_result = array('id' => $result->row(0)->id, 'username' => $result->row(0)->username, 'address' => $result->row(0)->address,
                'city' => $result->row(0)->city, 'country' => $result->row(0)->country, 'email' => $result->row(0)->email, 'pic' => $result->row(0)->profile_pic,
                'phone' => $result->row(0)->phone, 'zip_code' => $result->row(0)->zip_code, 'payment_email' => $result->row(0)->payment_email
            );
            return $data_result;
        } else {
            return false;
        }
    }

////////////////////////////////////////////////////////////////////////

    function contact_form($name, $mail, $type, $message) {
        $sql = 'insert into contact(name,mail,message,type)
			              values(?,?,?,?)';
        $result = $this->db->query($sql, array($name, $mail, $message, $type));
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

////////////////////////////////////////////
    function select_contacts() {
        $sql = 'select * from contact ';
        $result = $this->db->query($sql);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

    /////////////////////////////////
    function select_contacts_level2($id) {
        $sql = 'select * from contact where id=? ';
        $result = $this->db->query($sql, $id);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

    //////////////////////////////
    function read_message($id) {
        $v = 1;
        $sql = 'update contact set `read`=? where id=? ';
        $result = $this->db->query($sql, array($v, $id));
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    ///////////////////////////
    /////////////////////////////
    function select_price() {
        $sql = "SELECT distinct `price_point`
FROM `service`";
        $result = $this->db->query($sql);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

//////////////////////////////////
    function filter_date() {
        $sql = 'SELECT id, name, price_point, left( detail, 100 ) AS detail, photo_name, c_id, sc_id FROM service order by add_date DESC ';
        $result = $this->db->query($sql);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

//////////////////////////////////
    function filter_rate() {
        $sql = 'SELECT id, name, price_point, left( detail, 100 ) AS detail, photo_name, c_id, sc_id FROM service order by rate_up DESC ';
        $result = $this->db->query($sql);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

//////////////////////////////////
    function filter_order() {
        $sql = 'SELECT id, name, price_point, left( detail, 100 ) AS detail, photo_name, c_id, sc_id FROM service order by order_num DESC ';
        $result = $this->db->query($sql);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

////////////////////////////////////////
///////////////////////////////////
    function select_same_topic2($c_id) {
        $sql = 'SELECT id, c_id, left(title,30 )as title,left(content,40) as content,t_photo_name from topic where c_id=?  order by date ASC limit 2  ';
        $result = $this->db->query($sql, $c_id);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

////////////////////////////////////////
///////////////////////////////////
    function select_same_serv2($c_id) {
        $sql = 'SELECT id, left(name,30)as name, price_point, left( detail, 50 )  AS detail, photo_name, c_id, sc_id FROM service where c_id=? order by add_date ASC limit 2';
        $result = $this->db->query($sql, $c_id);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

//////////////////////////////////
    function filter_price($price1, $price2) {
        $sql = 'SELECT id, name, price_point, left( detail, 100 ) AS detail, photo_name, c_id, sc_id FROM service where price_point between ? and ? ';
        $result = $this->db->query($sql, array($price1, $price2));
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

    ///////////////////////////////////
    function select_same_topic1($c_id) {
        $sql = 'SELECT id, c_id, left(title,30) as title,left(content,40) as content,t_photo_name from topic where c_id=? limit 5';
        $result = $this->db->query($sql, $c_id);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

////////////////////////////////////////
    function select_same_serv1($c_id) {
        $sql = 'SELECT id, left(name,30)as name, price_point, left( detail, 50 ) AS detail, photo_name, c_id, sc_id FROM service where c_id=? order by add_date DESC limit 5';
        $result = $this->db->query($sql, $c_id);
        if ($result->num_rows() >= 1) {
            return $result;
        } else {
            return false;
        }
    }

   function  getOffer($id){
          $this->db->where('id', $id);
        $query = $this->db->get('offers');
        return $query->result();
    }
    function getUserData($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->result();
    }

////////////////////////////////////////
}

//////////////////////////////////
?>
