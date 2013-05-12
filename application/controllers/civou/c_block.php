<?php

class c_block extends CI_Controller {

    function main_title() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->model('sitead');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('main_title', 'Main Title', 'required|trim|max_length[100]|xss_clean');
            if ($this->form_validation->run() == false) {
                $message = array("mes" => " لا تترك النص فارغ");
                $this->load->view('civou/view_index_admin', $message);
            } else {
                $main_title = $this->input->post('main_title');
                $data = array(
                    'content' => $main_title
                );
                if ($this->sitead->update_block($data, 'main_title')) {
                    $this->load->view('civou/view_index_admin');
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function second_title() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->model('sitead');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('second_title', 'Main Title', 'required|trim|max_length[100]|xss_clean');
            if ($this->form_validation->run() == false) {
                $message = array("mes" => " لا تترك النص فارغ");
                $this->load->view('civou/view_index_admin', $message);
            } else {
                $second_title = $this->input->post('second_title');
                $data = array(
                    'content' => $second_title
                );
                if ($this->sitead->update_block($data, 'second_title')) {
                    $this->load->view('civou/view_index_admin');
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function slider_txt() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->model('sitead');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('slider_txt', 'Main Title', 'required|trim|xss_clean');
            if ($this->form_validation->run() == false) {
                $message = array("mes" => " لا تترك النص فارغ");
                $this->load->view('civou/view_index_admin', $message);
            } else {
                $slider_txt = $this->input->post('slider_txt');
                $data = array(
                    'content' => $slider_txt
                );
                if ($this->sitead->update_block($data, 'slider_txt')) {
                    $this->load->view('civou/view_index_admin');
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function tree_txt() {
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('sitead');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tree_txt', 'Main Title', 'required|trim|xss_clean');
            if ($this->form_validation->run() == false) {
                $message = array("mes" => " لا تترك النص فارغ");
                $this->load->view('civou/view_index_admin', $message);
            } else {
                $tree_txt = $this->input->post('tree_txt');
                $data = array(
                    'content' => $tree_txt
                );
                if ($this->sitead->update_block($data, 'tree_txt')) {
                    $this->load->view('civou/view_index_admin');
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function service_txt() {
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('sitead');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('service_txt', 'Main Title', 'required|trim|xss_clean');
            if ($this->form_validation->run() == false) {
                $message = array("mes" => " لا تترك النص فارغ");
                $this->load->view('civou/view_index_admin', $message);
            } else {
                $service_txt = $this->input->post('service_txt');
                $data = array(
                    'content' => $service_txt
                );
                if ($this->sitead->update_block($data, 'service_txt')) {
                    $this->load->view('civou/view_index_admin');
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function user_txt() {
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('sitead');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_txt', 'Main Title', 'required|trim|xss_clean');
            if ($this->form_validation->run() == false) {
                $message = array("mes" => " لا تترك النص فارغ");
                $this->load->view('civou/view_index_admin', $message);
            } else {
                $user_txt = $this->input->post('user_txt');
                $data = array(
                    'content' => $user_txt
                );
                if ($this->sitead->update_block($data, 'user_txt')) {
                    $this->load->view('civou/view_index_admin');
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function vido() {
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('sitead');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('vido', 'Main Title', 'required|trim|max_length[100]|xss_clean');
            if ($this->form_validation->run() == false) {
                $message = array("mes" => " لا تترك النص فارغ");
                $this->load->view('civou/view_index_admin', $message);
            } else {
                $vido = $this->input->post('vido');
                $data = array(
                    'content' => $vido
                );
                if ($this->sitead->update_block($data, 'vido')) {
                    $this->load->view('civou/view_index_admin');
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

}