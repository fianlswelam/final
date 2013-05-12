<?php

class c_user extends CI_Controller {

    function loadAdduser() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_adduser');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function alluser() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_allusers');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function delete() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->model('sitead');
            if ($this->uri->segment(4) != '') {
                $id = $this->uri->segment(4);
                if ($this->sitead->delete($id, 'user')) {
//                    $this->load->view('civou/view_alluser');
                    redirect('civou/c_user/alluser/');
                } else {
                    
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function charge() {
        if ($this->session->userdata('admin_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $id = $this->uri->segment(4);
                $data = array(
                    'id' => $id
                );
                $this->load->view('civou/view_charge', $data);
            } else {
                $this->load->view('civou/c_user/alluser/');
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function do_charge() {
        if (isset($_POST['user_id'])) {
            $this->load->model('sitead');
            $this->load->library('form_validation');
//            $this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean');
//            if ($this->form_validation->run() == false) {
            $id = $_POST['user_id'];
            $amount = $this->input->post('amount');
            ;
            $data = array(
                'amount_point' => $amount
            );
            if ($this->sitead->update_amount($id, $amount)) {
                $this->load->view('civou/view_allusers');
                redirect('civou/c_user/alluser');
            } else {
                //error
            }
//            } else {
            //error message
//                $this->load->view('civou/view_allusers');
//            }
        } else {
            //redirect
            echo "here";
        }
    }

}