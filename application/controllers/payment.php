<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class payment extends CI_Controller {

    function addCreditPage() {

        if ($this->session->userdata('logged_in')) {

            $id = $this->session->userdata('user_id');
            $this->load->model('site_model');
            if ($this->site_model->select_user($id)) {
                $user_data = $this->site_model->select_user($id);
                $data['id'] = $user_data['id'];
                $data['username'] = $user_data['username'];
                $data['email'] = $user_data['email'];
                $data['city'] = $user_data['city'];
                $data['address'] = $user_data['address'];
                $data['phone'] = $user_data['phone'];
                $data['country'] = $user_data['country'];
                $data['zip_code'] = $user_data['zip_code'];
                $data['payment_email'] = $user_data['payment_email'];
                $data['pic'] = $user_data['pic'];
                $id = $user_data['id'];
            }

            if ($this->session->userdata('user_id') == $id) {
                $data['owner'] = 'yes';
            } else {
                $data['owner'] = 'no';
            }

            $this->load->view('view_selectBank', $data);
        } else {
            
        }
    }

    function convertFromCreditToShelinat() {
        
    }

    function okMessage() {
        echo "ok message ";
    }

    function cancelMessage() {
        echo "cancel  message ";
    }

    function view_addBank() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view("civou/view_addBankDetail");
        } else {
            $this->load->view("");
        }
    }

    function addBank() {
        
    }

    function view_allBankDetail() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view("civou/view_showAllBankDetail");
        } else {
            $this->load->view("");
        }
    }

    function show_allBankDetail() {
        
    }

    function view_shelinAndDolar() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view("civou/view_showAllBankDetail");
        } else {
            $this->load->view("");
        }
    }

}

?>
