<?php

class c_sad extends CI_Controller {

    public function index() {
        $this->is_loged_in();
    }

    public function login() {
        if ($this->session->userdata('employe_logged_in')) {
            $this->load->view('employee/view_employe');
        } else {
            $this->load->view('employee/view_login');
        }
    }

    public function is_loged_in() {
       if ($this->session->userdata('employe_logged_in')) {
            $this->load->view('employee/view_employe');
//            redirect('csad/c_sad/');
        } else {
           $this->load->view('employee/view_login');
       }
    }

    function valid_loign() {
        $this->load->model('csad');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[32]|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('employee/view_login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user_id = $this->csad->valid_employee_pass($username, $password);
            if (!$user_id) {
                $login_data = array("login_error" => true);
                $this->load->view('employee/view_login', $login_data);
            } else {
                $login_data = array("employe_logged_in" => true, "employee_id" => $user_id, "employee_name" => $username);
                $this->session->set_userdata($login_data);
                $this->is_loged_in();
            }
        }
    }

    /////////////////////////////////////////////////////////////////////////////
    public function perform() {
        if ($this->session->userdata('employe_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $id = $this->uri->segment(4);
                $e_id = $this->session->userdata('employee_id');
                //update db u_id
                //date
                //duration
                $this->load->helper('date');
                $data = array(
                    'e_id' => $e_id,
                    'statu' => 1,
                    'end' => date('Y-m-d H:i:s', now()),
                    'start' => date('Y-m-d H:i:s', now())
                );
                $this->load->model('csad');
                if ($this->csad->update($data, "order", $id)) {
                    $this->load->view('employee/view_employe');
                }
            } else {
                //redirect
                $this->load->view('employee/view_employe');
            }
        } else {
            $this->load->view('employee/view_login');
        }
    }

    function per($id) {
        $e_id = $this->session->userdata('employee_id');
        $this->load->helper('date');
        $data = array(
            'e_id' => $e_id,
//            'statu' => 1,
            'end' => 5,
            'start' => date('Y-m-d H:i:s', now())
        );
        $this->load->model('csad');
        if ($this->csad->update($data, "order", $id)) {
            //get user_id
            $this->load->model('notifications');
            $this->notifications->add($this->csad->get_user_id($id), 'تم حجز خدمتك قيد التنفيذ', 'user/chat_service/' . $id . '/' . $this->session->userdata('employee_id'), 'employee', 'employee', 'خدماتك');
            //
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function chat_user() {
        if ($this->session->userdata('employe_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $data['order_id'] = $this->uri->segment(4);
                $data['user_id'] = $this->uri->segment(5);
                if ($this->per($this->uri->segment(4))) {
                    $this->load->view('employee/message_level2', $data);
                } else {
                    
                }
            } else {
                //redirect
                $this->load->view('employee/view_employe');
            }
        } else {
            $this->load->view('employee/view_login');
        }
    }

    function addcomment() {
        $this->load->model('csad');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('chat_message', 'Chat Message', 'required|trim|max_length[100]|xss_clean');
        $this->load->helper('date');

        if ($this->form_validation->run() == false) {
            $message = array("mes" => " لا تترك النص فارغ");
            $this->load->view('csad/c_sad/', $message);
//            $this->loadAddCategory();
        } else {
            $chat_message = $this->input->post('chat_message');
            $order_id = $_POST['order_id'];
            $user_id = $_POST['user_id'];
            //
            $this->db->from('user');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            $name = "";
            if ($query->num_rows() == 1) {
                $rows = $query->result();
                foreach ($rows as $row) {
                    $name = $row->username;
                }
            }
            //
            $data = array(
                'sender_id' => $this->session->userdata('employee_id'),
                'sender_u_name' => $this->session->userdata('employee_name'),
                'resiver_id' => $user_id, //user_name
                'order_id' => $order_id, //
                'reciver_u_name' => $name,
                'message' => $chat_message,
                'recive_seen' => 0,
                'date' => date('Y-m-d H:i:s', now()),
                'type' => 'employee'
            );
            if ($this->csad->addcomment($data)) {
                //get user_id
                $this->load->model('notifications');
                $this->notifications->add($user_id, 'لقد وصلك رساله على الخدمة الخاصه بك', 'user/chat_service/' . $order_id . '/' . $this->session->userdata('employee_id'), 'employee', 'employee', 'خدماتك');
                //
                $message = array("mes" => "تم أضافة " . $chat_message . " .");
//                unset($this->input->post('categoryname'));
//                $this->load->view('civou/view_allcategory', $message);
                redirect('csad/c_sad/chat_user/' . $order_id . '/' . $user_id);
//                $this->loadAddCategory();
            } else {
                $message = array("mes" => "لقد حدثت مشكله فى الاضافه .");
                $this->load->view('csad/c_sad/chat_user/', $message);
//                $this->loadAddCategory($message);
            }
        }
    }

    function block() {
        if ($this->session->userdata('employe_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $order_id = $this->uri->segment(4);
                echo $order_id;
                //update statu = 3 -> blocked
                $this->load->model('csad');
                $data = array(
                    "statu" => 3
                );
                if ($this->csad->update($data, 'order', $order_id)) {
//                    redirect('csad/c_sad/');
                }
            } else {
                //redirect
                $this->load->view('employee/view_employe');
            }
        } else {
            $this->load->view('employee/view_login');
        }
    }

    function reject() {
        if ($this->session->userdata('employe_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $order_id = $this->uri->segment(4);
                echo $order_id;
                $this->load->model('csad');
                $data = array(
                    "statu" => 0
                );
                if ($this->csad->update($data, 'order', $order_id)) {
                    $this->load->view('employee/view_employe');
                }
            } else {
                //redirect
                redirect('csad/c_sad/');
            }
        } else {
            $this->load->view('employee/view_login');
        }
    }

    function sucsses() {
        if ($this->session->userdata('employe_logged_in')) {
            if ($this->uri->segment(4) != '') {
                $order_id = $this->uri->segment(4);
                echo $order_id;
                $this->load->model('csad');
                $data = array(
                    "statu" => 2
                );
                if ($this->csad->update($data, 'order', $order_id)) {
//                    $this->load->view('employee/view_employe');
                    redirect('csad/c_sad/');
                }
            } else {
                //redirect
                $this->load->view('employee/view_employe');
            }
        } else {
            $this->load->view('employee/view_login');
        }
    }

    /////////////////////////////////////////////////////////////////////////////
}

?>
