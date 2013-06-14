<?php

class c_offer extends CI_Controller {

    public function loadAddOffer() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_addOffer');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function addOffer() {
        $this->load->model('sitead');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('servicename', 'Service Name ', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('discription', 'Discription ', 'required|trim|xss_clean');
        $this->form_validation->set_rules('instruction', 'Instruction ', 'required|trim|xss_clean');
        $this->form_validation->set_rules('duration', 'duration ', 'required|trim|xss_clean');
//        $this->form_validation->set_rules('userfile', 'Photo ', 'required|trim|xss_clean');

        if ($this->form_validation->run() == false) {
            $message = array("mes" => " لا تترك النص فارغ");
            $this->load->view('civou/view_addOffer', $message);
        } else {
            $name = $this->input->post('servicename');
            $detail = $this->input->post('discription');
            $instruction = $this->input->post('instruction');
            $duration = $this->input->post('duration');
            //**********8
            $photo = $this->sitead->do_upload();
            //**********8
            $data = array(
                'name' => $name,
                'detail' => $detail,
                'instruction' => $instruction,
                'duration' => $duration,
                'photo_name' => $photo
            );
            if ($this->sitead->addOffer($data)) {
                $message = array("mes" => "تم أضافة ألعرض");
                $this->load->view('civou/view_addOffer', $message);
                redirect("civou/c_service/loadaddOffer");
            } else {
                $message = array("mes" => "لقد حدثت مشكله فى الاضافه .");
                $this->load->view('civou/view_addOffer', $message);
            }
        }
    }

}

?>
