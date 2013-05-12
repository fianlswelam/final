<?php

class c_news extends CI_Controller {

    function loadAddnews() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_addnews');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function addnews() {
        $this->load->model('sitead');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('link', 'Link', 'required|trimxss_clean');
        $this->form_validation->set_rules('content', 'Content', 'required|trimxss_clean');
        //c_id 	sc_id
        if ($this->form_validation->run() == false) {
            $message = array("mes" => " لا تترك النص فارغ");
            $this->load->view('civou/view_addnews', $message);
//            $this->loadAddCategory();
        } else {
            $content = $this->input->post('content');
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $data = array(
                'title' => $title,
                'content' => $content,
                'link' => $link,
                'active' => "on"
            );
            if ($this->sitead->add($data, "news")) {
                $message = array("mes" => "تم أضافة " . $username . " .");
//                unset($this->input->post('categoryname'));
//                $this->load->view('civou/view_allnews');
                redirect('civou/c_news/allnews');
//                $this->load->view('civou/view_addadmin', $message);
//                $this->loadAddCategory();
            } else {
                $message = array("mes" => "لقد حدثت مشكله فى الاضافه .");
                $this->load->view('civou/view_addnews', $message);
//                $this->loadAddCategory($message);
            }
        }
    }

    function allnews() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_allnews');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function delete() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->model('sitead');
            if ($this->uri->segment(4) != '') {
                $id = $this->uri->segment(4);
                if ($this->sitead->delete($id, 'news')) {
//                    $this->load->view('civou/view_allnews');
                    redirect('civou/c_news/allnews');
                } else {
                    
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function active() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->model('sitead');
            if ($this->uri->segment(4) != '' && $this->uri->segment(5) != '') {
                $id = $this->uri->segment(4);
                $active = $this->uri->segment(5);
                if($active=='on'){
                    $active='off';
                }else{
                    $active='on';
                }
                if ($this->sitead->active($id,$active)) {
//                    $this->load->view('civou/view_allnews');
                    redirect('civou/c_news/allnews');
                } else {
                    
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

}