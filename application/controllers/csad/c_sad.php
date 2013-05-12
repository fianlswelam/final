<?php

class c_sad extends CI_Controller {

    public function index() {
        $this->is_loged_in();
    }

    public function login() {
        if ($this->session->userdata('employe_logged_in')) {
            $this->load->view('employee/view_employe');
        } else {
            $this->load->view('employee/view_login');
        }
    }

    public function is_loged_in() {
        if ($this->session->userdata('employe_logged_in')) {
            $this->load->view('employee/view_employe');
//            redirect('csad/c_sad/');
        } else {
            $this->load->view('employee/view_login');
        }
    }

    function valid_loign() {
        $this->load->model('csad');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[32]|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('employee/view_login');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $user_id = $this->csad->valid_employee_pass($username, $password);
            if (!$user_id) {
                $login_data = array("login_error" => true);
                $this->load->view('employee/view_login', $login_data);
            } else {
                $login_data = array("employe_logged_in" => true, "employee_id" => $user_id);
                $this->session->set_userdata($login_data);
                $this->is_loged_in();
            }
        }
    }

    /////////////////////////////////////////////////////////////////////////////
    public function perform() {
        if ($this->session->userdata('employe_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $id = $this->uri->segment(4);
                $e_id = $this->session->userdata('employee_id');
                //update db u_id
                //date
                //duration
                $this->load->helper('date');
                $data = array(
                    'e_id' => $e_id,
                    'statu' => 1,
                    'end' => date('Y-m-d H:i:s', now()),
                    'start' => date('Y-m-d H:i:s', now())
                );
                $this->load->model('csad');
                if ($this->csad->update($data, "order", $id)) {
                    $this->load->view('employee/view_employe');
                }
            } else {
                //redirect
                $this->load->view('employee/view_employe');
            }
        } else {
            $this->load->view('employee/view_login');
        }
    }

    /////////////////////////////////////////////////////////////////////////////
}

?>
