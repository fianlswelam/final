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

    
    
    
    
    
}

?>
