<?php

class notifications extends CI_Model {

    public function add($user_id, $content, $link, $user_type, $from, $about) {
        $this->load->helper('date');
        $con = '<a href="' . base_url() . '' . $link . '">' . $content . ' at ' . now() . '</a> ';
        $not_data = array(
            'user_id' => $user_id,
            'content' => $con,
            'link' => $link,
            'user_type' => $user_type,
            'from' => $from,
            'about' => $about
        );
        return $this->db->insert('notifications', $not_data);
    }

}

?>