<?php

class c_sitead extends CI_Controller {

    public function index() {
        $this->is_loged_in();
    }

    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_admin');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    public function addservice() {
        $this->load->view('civou/view_addService');
    }

    public function is_loged_in() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_admin');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function valid_loign() {
        $this->load->model('sitead');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[32]|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('civou/view_login');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $user_id = $this->sitead->valid_user_pass($username, $password);
            if (!$user_id) {
                $login_data = array("login_error" => true);
                $this->load->view('civou/view_login', $login_data);
            } else {
                $login_data = array("admin_logged_in" => true, "admin_id" => $user_id);
                $this->session->set_userdata($login_data);
                $this->is_loged_in();
            }
        }
    }

    function civou_index() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_index_admin');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////
    function contact_level1() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->model('site_model');
            if ($this->site_model->select_contacts()) {
                $contacts = $this->site_model->select_contacts();
                if ($contacts->num_rows() > 0) {
                    $data['contacts'] = $contacts->result();
                } else {
                    $data['error'] = "لا يوجد رسائل ارسلت بعد ";
                }
            } else {
                $data['error'] = "لا يوجد رسائل ارسلت بعد ";
            }
            $this->load->view('civou/contact_level1', $data);
        } else {
            $this->load->view('civou/view_login');
        }
    }

    ////////////////////////////////////////////
    function contact_level2() {
        if ($this->session->userdata('admin_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $id = mysql_escape_string($this->uri->segment(4));
                $this->load->model('site_model');
                $this->site_model->read_message($id);
                if ($this->site_model->select_contacts_level2($id)) {
                    $contacts = $this->site_model->select_contacts_level2($id);
                    if ($contacts->num_rows() > 0) {
                        $data['contacts'] = $contacts->result();
                    } else {
                        $data['error'] = "محتوي الرساله غير موجود";
                    }
                } else {
                    $data['error'] = "محتوي الرساله غير موجود";
                }
                $this->load->view('civou/contact_level2', $data);
            } else {
                $data['error'] = "لا يوجد رسائل بهذا العنوان ";
                $this->load->view('civou/contact_level2', $data);
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

    ////////////////////////////////////////////////////////
    function admin_edit_user() {
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('site_model');
            $id = 10;
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
                $data['amount_point'] = $user_data['amount_point'];
                $data['amount_money'] = $user_data['amount_money'];
                $data['pic'] = $user_data['pic'];
                $id = $user_data['id'];
            }

            if ($this->session->userdata('user_id') == $id) {
                $data['owner'] = 'yes';
            } else {
                $data['owner'] = 'no';
            }

            $this->load->view('civou/admin_edit_user', $data);
        } else {
            $this->load->view('civou/view_login');
        }
    }

////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
    public function edit_user_validation() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean|max_length[100]');

            if ($this->form_validation->run()) {
                // print_r($this->session->userdata); 
                $name = $this->input->post('username');
                $this->load->model('user_model');
                if ($this->user_model->select_user_by_name($name)) {

                    $user_data = $this->user_model->select_user_by_name($name);
                    $data['id'] = $user_data['id'];
                    $data['username'] = $user_data['username'];
                    $data['email'] = $user_data['email'];
                    $data['city'] = $user_data['city'];
                    $data['address'] = $user_data['address'];
                    $data['phone'] = $user_data['phone'];
                    $data['country'] = $user_data['country'];
                    $data['zip_code'] = $user_data['zip_code'];
                    $data['amount_point'] = $user_data['amount_point'];
                    $data['amount_money'] = $user_data['amount_money'];
                    $data['pic'] = $user_data['pic'];
                    $id = $user_data['id'];

                    $this->load->view('civou/admin_edit_user_level2', $data);
                } else {
                    $data['cant_get'] = "sorry data can not be reterive right now please try again ";
                    $this->load->view('civou/admin_edit_user_level2', $data);
                }
            } else {
                $this->load->view('civou/admin_edit_user');
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

/////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
    public function update_user_validation() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[100]|
											 ');
            $this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean');
            $this->form_validation->set_rules('city', 'city', 'required|max_length[30]|trim|xss_clean');
            $this->form_validation->set_rules('zip_code', 'Zip code', 'required|max_length[30]|trim|xss_clean|numeric');

            $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]|trim|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[20]|trim|xss_clean|numeric');
            $this->form_validation->set_rules('amount_point', 'amount point', 'required|max_length[11]|trim|xss_clean|numeric');
            $this->form_validation->set_rules('amount_money', 'amount money', 'required|max_length[11]|trim|xss_clean|numeric');






            $this->form_validation->set_message('valid_email', "البريد الالكتروني الذي تم ادخاله غير صحيح ");




            if ($this->form_validation->run()) {


                // print_r($this->session->userdata); 
                $id = $_POST['id'];
                $this->load->model('user_model');
                if ($this->user_model->update_user2($id)) {
                    $data['updated'] = 'تم تعديل بيانات المستخدم بنجاح';
                    $name = $_POST['username'];
                    $this->load->model('user_model');

                    if ($this->user_model->select_user_by_name($name)) {

                        $user_data = $this->user_model->select_user_by_name($name);
                        $data['id'] = $user_data['id'];
                        $data['username'] = $user_data['username'];
                        $data['email'] = $user_data['email'];
                        $data['city'] = $user_data['city'];
                        $data['address'] = $user_data['address'];
                        $data['phone'] = $user_data['phone'];
                        $data['country'] = $user_data['country'];
                        $data['zip_code'] = $user_data['zip_code'];
                        $data['amount_point'] = $user_data['amount_point'];
                        $data['amount_money'] = $user_data['amount_money'];
                        $data['pic'] = $user_data['pic'];
                        $id = $user_data['id'];

                        $this->load->view('civou/admin_edit_user_level2', $data);
                    } else {
                        $data['cant_get'] = "sorry data can not be reterive right now please try again ";
                        $this->load->view('civou/admin_edit_user_level2', $data);
                    }
                }
            } else {
                $name = $_POST['username'];
                $this->load->model('user_model');

                if ($this->user_model->select_user_by_name($name)) {

                    $user_data = $this->user_model->select_user_by_name($name);
                    $data['id'] = $user_data['id'];
                    $data['username'] = $user_data['username'];
                    $data['email'] = $user_data['email'];
                    $data['city'] = $user_data['city'];
                    $data['address'] = $user_data['address'];
                    $data['phone'] = $user_data['phone'];
                    $data['country'] = $user_data['country'];
                    $data['zip_code'] = $user_data['zip_code'];
                    $data['amount_point'] = $user_data['amount_point'];
                    $data['amount_money'] = $user_data['amount_money'];
                    $data['pic'] = $user_data['pic'];
                    $id = $user_data['id'];

                    $this->load->view('civou/admin_edit_user_level2', $data);
                } else {
                    $data['cant_get'] = "sorry data can not be reterive right now please try again ";
                    $this->load->view('civou/admin_edit_user_level2', $data);
                }
            }
        } else {
            $this->load->view('civou/view_login');
        }
    }

//////////////////////////////////////////////////////////////////////////////
}

?>
