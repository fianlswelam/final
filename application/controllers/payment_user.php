<?php

class payment_user extends CI_Controller {

    function getAmountAfterFees() {

        $amount = $this->input->post('amount');
        $bank_type = $this->input->post('bank_type');
        $this->load->model('paymentModel');
        $data = $this->paymentModel->showAll($bank_type);

        foreach ($data as $value) {
            $pers = $value->fees_pers_add;
            $dolar = $value->fees_dolar_add;
        }

        $discount = (($pers / 100) * $amount) + $dolar;
        $final_amount = $amount - $discount;
        $data['res'] = $final_amount;
        $this->load->view("view_selectBank", $data);
    }

    function getAmountAfterFees_withdraw() {
        $amount = $this->input->post('amount');
        $bank_type = $this->input->post('bank_type');
        $this->load->model('paymentModel');
        $data = $this->paymentModel->showAll($bank_type);

        foreach ($data as $value) {
            $pers = $value->fees_pers_depo;
            $dolar = $value->fees_dolar_depo;
        }

        $discount = (($pers / 100) * $amount) + $dolar;
        $final_amount = $amount - $discount;
        $data['res'] = $final_amount;
        $this->load->view("view_selectBank_withdraw", $data);
    }

    function getAmountAfterFees_ToShelin() {
        $amount = $this->input->post('amount');
        $this->load->model('paymentModel');
        $data = $this->paymentModel->get_Shelin_convert_Setting();

        foreach ($data as $value) {
            $pers = $value->d_s_per;
            $dolar = $value->d_s_dolar;
        }

        $discount = (($pers / 100) * $amount) + $dolar;
        $final_amount = $amount - $discount;
        $data['res'] = $final_amount;
        $this->load->view("view_selectBank_ToShelin", $data);
    }

    function getAmountAfterFees_ToDolar() {
        $amount = $this->input->post('amount');
        $this->load->model('paymentModel');
        $data = $this->paymentModel->get_Shelin_convert_Setting();

        foreach ($data as $value) {
            $pers = $value->s_d_per;
            $dolar = $value->s_d_dolar;
        }

        $discount = (($pers / 100) * $amount) + $dolar;
        $final_amount = $amount - $discount;
        $data['res'] = $final_amount;
        $this->load->view("view_selectBank_ToDolar", $data);
    }

    function updateUserAmount() {

        $amount = $this->input->post('amount');
        $type = $this->input->post('type');
        $id = $this->session->userdata('user_id');
        $this->load->model('paymentModel');

        if ($type == 1) {
            $this->paymentModel->incrementDolar($id,$amount);
            $this->paymentModel->decrementShelin($id,$amount);
        } else if ($type == 2) {
            $this->paymentModel->incrementShelin($id,$amount);
            $this->paymentModel->decrementDolar($id,$amount);
        }
    }

}

?>
