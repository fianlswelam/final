<?php

class Search extends CI_Controller {

    public function index() {
        $this->search_golden();
    }

    function search_golden() {

        if ($this->input->post('keywords') != '') {
            $this->load->model("search_model");
            $suffix = "";
            $key = mysql_real_escape_string(trim($this->input->post('keywords')));
            $errors = array();
            if (empty($key)) {
                $errors[] = "من فضلك ادخل كلمه البحث";
            } else if (strlen($key) < 3) {
                $errors[] = "عفوا كلمه البحث يجب ان لا تقل عن 3 احرف";
            } else if ($this->search_model->search_results($key) === false) {
                $errors[] = "عفوا لا يوجد نتائج عن كلمه البحث التي ادخلتها";
            }

            if (empty($errors)) {
                //search
                //echo '<pre>' ,print_r( search_results($key)), '</pre>';
                $result = $this->search_model->search_results($key)->result();
                $data['results'] = $this->search_model->search_results($key)->result();
                $result_num = count($result);
                $suffix = ($result_num != 1) ? 's' : '';
                $data['result_num'] = '<p class="result">يوجد عدد <strong>' . $result_num . '</strong> نتيجه للبحث عن <strong> ' . $key . ' </strong>  </p>';
            } else {
                foreach ($errors as $error) {
                    $data['error'] = $error . '</br>';
                }
            }
        }

        $this->load->view('search_blog', $data);
    }

    ////////////////////////////////////
    function search_market() {

        if ($this->input->post('keywords') != '') {
            $this->load->model("search_model");
            $suffix = "";
            $key = mysql_real_escape_string(trim($this->input->post('keywords')));
            $errors = array();
            if (empty($key)) {
                $errors[] = "من فضلك ادخل كلمه البحث";
            } else if (strlen($key) < 3) {
                $errors[] = "عفوا كلمه البحث يجب ان لا تقل عن 3 احرف";
            } else if ($this->search_model->search_market_results($key) === false) {
                $errors[] = "عفوا لا يوجد نتائج عن كلمه البحث التي ادخلتها";
            }

            if (empty($errors)) {
                //search
                //echo '<pre>' ,print_r( search_results($key)), '</pre>';
                $result = $this->search_model->search_market_results($key)->result();
                $data['results'] = $this->search_model->search_market_results($key)->result();
                $result_num = count($result);
                $suffix = ($result_num != 1) ? 's' : '';
                $data['result_num'] = '<p class="result">يوجد عدد <strong>' . $result_num . '</strong> نتيجه للبحث عن <strong> ' . $key . ' </strong>  </p>';
            } else {
                foreach ($errors as $error) {
                    $data['error'] = $error . '</br>';
                }
            }
        }



        $this->load->view('search_market', $data);
    }

}