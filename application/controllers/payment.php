<?php

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

    function withdraw() {

        if ($this->session->userdata('logged_in')) {
                  $this->load->view('view_selectBank_withdraw');
        } else {
            
        }
    }

    function okMessage() {
        echo "ok message ";
    }

    function cancelMessage() {
        echo "cancel  message ";
    }

    function view_addBank() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_addBankDetail');
        } else {
            
        }
    }

    function addBank() {


        $this->load->library('form_validation');
        $this->form_validation->set_rules('bank_name', 'bank_name', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('max_amount_deposit', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('number_deposit', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_pers_deposite', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_dolar_deposite', '  ', 'required|trim|max_length[100]|xss_clean');

        $this->form_validation->set_rules('min_amount_add', 'num_service', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_pers_add', 'fees_pers_add', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_dolar_add', 'fees_dolar_add', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {
            $message = array("mes" => " لا تترك النص فارغ");
            $this->load->view('payment/addBank', $message);
//            $this->loadAddCategory();
        } else {
            $bank_name = $this->input->post('bank_name');
            $max_amount_deposit = $this->input->post('max_amount_deposit');
            $number_deposit = $this->input->post('number_deposit');
            $fees_pers_deposite = $this->input->post('fees_pers_deposite');
            $fees_dolar_deposite = $this->input->post('fees_dolar_deposite');

            $min_amount_add = $this->input->post('min_amount_add');
            $fees_pers_add = $this->input->post('fees_pers_add');
            $fees_dolar_add = $this->input->post('fees_dolar_add');

            $data = array(
                'bank_name' => $bank_name,
                'max_deposite' => $max_amount_deposit,
                'num_deposite' => $number_deposit,
                'fees_pers_depo' => $fees_pers_deposite,
                'fees_dolar_depo' => $fees_dolar_deposite,
                'min_add' => $min_amount_add,
                'fees_pers_add' => $fees_pers_add,
                'fees_dolar_add' => $fees_dolar_add
            );

            $this->load->model('paymentModel');
            $this->paymentModel->addBank($data);

            $d['name'] = "ok";
            $this->load->view('civou/view_addBankDetail', $d);
        }
    }

    function updateBank() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('max_amount_deposit', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('number_deposit', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_pers_deposite', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_dolar_deposite', '  ', 'required|trim|max_length[100]|xss_clean');

        $this->form_validation->set_rules('min_amount_add', 'num_service', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_pers_add', 'fees_pers_add', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_dolar_add', 'fees_dolar_add', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {
            $message = array("mes" => " لا تترك النص فارغ");
            $this->load->view('payment/addBank', $message);
//            $this->loadAddCategory();
        } else {
            $bank_name = $this->input->post('bank_name');
            $max_amount_deposit = $this->input->post('max_amount_deposit');
            $number_deposit = $this->input->post('number_deposit');
            $fees_pers_deposite = $this->input->post('fees_pers_deposite');
            $fees_dolar_deposite = $this->input->post('fees_dolar_deposite');

            $min_amount_add = $this->input->post('min_amount_add');
            $fees_pers_add = $this->input->post('fees_pers_add');
            $fees_dolar_add = $this->input->post('fees_dolar_add');

            $data = array(
                'bank_name' => $bank_name,
                'max_deposite' => $max_amount_deposit,
                'num_deposite' => $number_deposit,
                'fees_pers_depo' => $fees_pers_deposite,
                'fees_dolar_depo' => $fees_dolar_deposite,
                'min_add' => $min_amount_add,
                'fees_pers_add' => $fees_pers_add,
                'fees_dolar_add' => $fees_dolar_add
            );

            $this->load->model('paymentModel');
            $this->paymentModel->updateBankDetail($data, $bank_name);

            $d['name'] = "ok";
            $this->load->view('civou/view_addBankDetail', $d);
        }
    }

    function view_allBankDetail() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_showAllBankDetail');
        } else {
            $this->load->view("");
        }
    }

    function showAllBankDetail() {
        $bank_name = $this->input->post('bank_name');
        $this->load->model('paymentModel');
        $data['res'] = $this->paymentModel->showAll($bank_name);
        $this->load->view('civou/view_updateBankDetail', $data);
    }

    function view_shelinAndDolar() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view("civou/view_shelinAndDolar");
        } else {
            $this->load->view("");
        }
    }

    function shelinAndDolar() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('min_amount_d_s', 'bank_name', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_pers_d_s', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_dolar_d_s', ' ', 'required|trim|max_length[100]|xss_clean');

        $this->form_validation->set_rules('min_amount_s_d', ' ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_pers_s_d', '  ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('fees_dolar_s_d', 'num_service', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {
            
        } else {
            $min_amount_d_s = $this->input->post('min_amount_d_s');
            $fees_pers_d_s = $this->input->post('fees_pers_d_s');
            $fees_dolar_d_s = $this->input->post('fees_dolar_d_s');

            $min_amount_s_d = $this->input->post('min_amount_s_d');
            $fees_pers_s_d = $this->input->post('fees_pers_s_d');
            $fees_dolar_s_d = $this->input->post('fees_dolar_s_d');

            $data = array(
                'd_s_min' => $min_amount_d_s,
                'd_s_per' => $fees_pers_d_s,
                'd_s_dolar' => $fees_dolar_d_s,
                's_d_min' => $min_amount_s_d,
                's_d_per' => $fees_pers_s_d,
                's_d_dolar' => $fees_dolar_s_d
            );

            $this->load->model('paymentModel');
            $this->paymentModel->addShelinAndDolar($data);

            $d['name'] = "ok";
            $this->load->view('civou/view_shelinAndDolar', $d);
        }
    }

}

?>
