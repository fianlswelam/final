<?php

class User_model extends CI_Model {

    function chat_user($sender_id, $receiv_id) {

        $sql = 'select * from chat_id where (user_id1=' . $sender_id . ' and user_id2=' . $receiv_id . ')or (user_id2=' . $sender_id . ' and user_id1=' . $receiv_id . ')';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $rows = $query->result();
            foreach ($rows as $row) {
                
            }
            return $row->id;
        } else {
            $sql = "INSERT INTO `market2`.`chat_id` (`user_id1`, `user_id2`) VALUES (" . $sender_id . "," . $receiv_id . ");";
            $this->db->query($sql);
//            $this->chat_user($sender_id, $receiv_id);
//            $this->user_model->chat_user($sender_id, $receiv_id);
            $sql = 'select * from chat_id where (user_id1=' . $sender_id . ' and user_id2=' . $receiv_id . ')or (user_id2=' . $sender_id . ' and user_id1=' . $receiv_id . ')';
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $rows = $query->result();
                foreach ($rows as $row) {
                    
                }
                return $row->id;
            }
        }
    }

    function do_upload($id) {

        $gallery_path = realpath(APPPATH . '../images/profile/');
        $gallery_path_thumb = realpath(APPPATH . '../images/profile/thumb_profile/');
        $gallery_path_url = base_url() . 'images/';
        $config = array(
            'allowed_types' => 'jpg|JPEG|png|gif',
            'upload_path' => $gallery_path,
            'max_size' => 3000
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            return $error = array("error" => $this->upload->display_errors());
        }



        $image_data = $this->upload->data();
        //////////////////////////////////////////////
        //////////////////////////////////////////////
        $config2 = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $gallery_path_thumb,
            'maintain_ratio' => TRUE,
            'width' => 300,
            'height' => 200
        );

        $this->load->library('image_lib', $config2);


        if (!$this->image_lib->resize()) {
            return $error = array("error" => $this->upload->display_errors());
        }

        $sql_select = "select profile_pic from user where id= '{$id}' ";
        $result = $this->db->query($sql_select);
        if ($result->num_rows() == 1) {
            $pic_name = $result->row(0)->profile_pic;
            if ($pic_name != 'default_pic.jpg') {

                $path1 = APPPATH . '../images/profile/' . $pic_name;
                $path2 = APPPATH . '../images/profile/thumb_profile/' . $pic_name;
                unlink($path1);
                unlink($path2);
            }
        } else {
            return false;
        }

        $query_str = "update user set profile_pic = ? where id = '{$id}' ";
        $this->db->query($query_str, $image_data['file_name']);
    }

    ///////////////////////////////////////////
    function update_user($id) {
        $data = array(
            'email' => $this->input->post('email'),
			'payment_email' => $this->input->post('bank_email'),
			
            'country' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'zip_code' => $this->input->post('zip_code'),
        );

        $query_str = "update user set email=?,payment_email=?,country=?,city=?,address=?,phone=?,zip_code=? where id = '{$id}' ";
        $result = $this->db->query($query_str, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //////////////////////////////////////////////
    function update_user2($id) {
        $data = array(
            'email' => $this->input->post('email'),
            'country' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'zip_code' => $this->input->post('zip_code'),
            'amount_point' => $this->input->post('amount_point'),
            'amount_money' => $this->input->post('amount_money'),
        );

        $query_str = "update user set email=?,country=?,city=?,address=?,phone=?,zip_code=?, amount_point=? , amount_money=? where id = '{$id}' ";
        $result = $this->db->query($query_str, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    ///////////////////////////////////////////
    function update_user_by_name($id) {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'country' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'zip_code' => $this->input->post('zip_code'),
            'amount_point' => $this->input->post('amount_point'),
            'amount_money' => $this->input->post('amount_money'),
        );

        $query_str = "update user set username= ? , email=?, country=?, city=?, address=?, phone=?, zip_code=?, amount_point=? , amount_money=? where id = '{$id}' ";
        $result = $this->db->query($query_str, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /////////////////////////////////////////////
    function add_topic($id) {
        $name = $this->input->post('topic_name');
        $topic = $this->input->post('topic');
        $tags = $this->input->post('tags');
        $cat = $this->input->post('search_category');
        $s_cat = $this->input->post('sub_category');

        $gallery_path = realpath(APPPATH . '../upload/topic/');
        $gallery_path_thumb = realpath(APPPATH . '../upload/topic/thumb/');
        $gallery_path_url = base_url() . 'upload/';
        $config = array(
            'allowed_types' => 'jpg|JPEG|png|gif',
            'upload_path' => $gallery_path,
            'max_size' => 4000
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            return $error = array("error" => $this->upload->display_errors());
        }
        //////////////////////////////////////////////
        $image_data = $this->upload->data();
        //////////////////////////////////////////////
        $config2 = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $gallery_path_thumb,
            'maintain_ratio' => TRUE,
            'width' => 200,
            'height' => 200
        );

        $this->load->library('image_lib', $config2);

        $this->image_lib->resize();
        ////////////////////////////////////////////////////


        $query_str = "insert into topic ( user_id, title ,content, tags,t_photo_name,c_id,sc_id ) values ( ?,? , ? , ?,? , ?,?) ";
        $result = $this->db->query($query_str, array($id, $name, $topic, $tags, $image_data['file_name'], $cat, $s_cat));
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //////////////////////////////////////////////////////// can visit user profile check id for the user profile
    function can_visit_user($id) {
        $sql = "select id from user where id=?";
        $result = $this->db->query($sql, $id);
        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

  

    ///////////////////////////////////////////////////////////		 
    function select_messages_level1($id) {
        //$sql="select * from user_chat where receiv_id=?";
        $sql = "select c.id, c.receiv_id ,
				   c.sender_id,left(c.message,60) as message,c.receiv_seen,c.sender_seen,
				   DATE_FORMAT(c.mess_date, '%d of %M %Y ')

				   AS timestamp,
				   u.profile_pic as photo , u.username,u.id 
				   from user_chat c 
				   join user u on c.receiv_id=u.id
                    where receiv_id=?  or sender_id=?
				    order by c.mess_date DESC;
";

        $result = $this->db->query($sql, array($id, $id));
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return false;
        }
    }

   

///////////////////////////////////////////////////
    function select_user_by_name($name) {
        $query = "select id,email,username,phone,country,city,address,profile_pic,zip_code,amount_point,amount_money from user where username=?";
        $result = $this->db->query($query, $name);
        if ($result->num_rows() == 1) {
            $data_result = array('id' => $result->row(0)->id, 'username' => $result->row(0)->username, 'address' => $result->row(0)->address,
                'city' => $result->row(0)->city, 'country' => $result->row(0)->country, 'email' => $result->row(0)->email, 'pic' => $result->row(0)->profile_pic,
                'phone' => $result->row(0)->phone, 'zip_code' => $result->row(0)->zip_code, 'amount_point' => $result->row(0)->amount_point, 'amount_money' => $result->row(0)->amount_money
            );
            return $data_result;
        } else {
            return false;
        }
    }

    function add($table, $data) {
        return $this->db->insert($table, $data);
    }
        function addcomment($data) {
        $insert = $this->db->insert('service_message', $data);
        return $insert;
    }

////////////////////////////////////////////////////
function select_contacts($id,$parent_id){
	$sql='select id,email,username,phone,country,city,address,profile_pic,zip_code,amount_point,amount_money  from user where parent_id=? or id=?';
	
	$result = $this->db->query($sql, array($id,$parent_id));
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return false;
        }
	}					
/////////////////////////////////////////////////////

	function add_chat_message($from_id , $to_id, $chat_message_content){
		$data = array(
            'from' => $from_id,
            'to' => $to_id,
            'message' => $chat_message_content,
			
            );
        $query = $this->db->insert('chat', $data);
        if($this->db->affected_rows()==1){
			 
			return true;
			}else{
				return false;
				}		
		        }
	////////////////////////////////////////////////			
	function get_chat_messages($from_id ,$to_id){
	$sql='select * from chat where `from`=? and `to`=? or `from`=? and `to`=? order by message_date ASC';
	$result=$this->db->query($sql,array($from_id,$to_id,$to_id,$from_id));
	if($result->num_rows() >= 1){
	
            return $result;
        } else {
            return false;
        }	
		}
		//////////////////////////////////////////////
			////////////////////////////////////////////////
	function update_message_seen($from_id ,$to_id){
		$sql='update chat set to_seen=1 where `from`=? and `to`=? or `from`=? and `to`=?';
		$result=$this->db->query($sql,array($from_id,$to_id,$to_id,$from_id));
           if($this->db->affected_rows()==1){
			 
			return true;
			}else{
				return false;
				}
		}
	///////////////////////////////////////////////////////

function get_chat_messages_last_one($from_id ,$to_id){
	$sql='select * from chat where `from`=? and `to`=? or `from`=? and `to`=?  order by id desc limit 1 ';
	$result=$this->db->query($sql,array($from_id,$to_id,$to_id,$from_id));
	if($result->num_rows() == 1){
	
            return $result;
        } else {
            return false;
        }
	
	}		
	////////////////////////////////////////////////////////
	function select_user_chat($id){
		$sql='select id,email,username,phone,country,city,address,profile_pic,zip_code,amount_point,amount_money  from user where  id=?';
	
	$result = $this->db->query($sql, array($id));
        if ($result->num_rows() == 1) {
            return $result;
        } else {
            return false;
        }
		}	

}?>