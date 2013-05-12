<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('user/profile');
        } else {
            $this->load->view('view_index');
        }
    }

///////////////////////////
    function home() {
        $this->load->view('home');
    }

//////////////////////////////////
    function market_date() {

        $this->load->model('site_model');
        if ($this->site_model->filter_date()) {
            $filter_date = $this->site_model->filter_date();
            $data['filter_date'] = $filter_date->result();
            if ($this->site_model->select_price()) {
                $price = $this->site_model->select_price();
                $data['prices'] = $price->result();
                $this->load->view('index_market', $data);
            }
        } else {
            redirect("site/market");
        }
    }

//////////////////////////////////
    function market_order() {


        $this->load->model('site_model');
        if ($this->site_model->filter_order()) {
            $filter_order = $this->site_model->filter_order();
            $data['filter_order'] = $filter_order->result();
            if ($this->site_model->select_price()) {
                $price = $this->site_model->select_price();
                $data['prices'] = $price->result();
                $this->load->view('index_market', $data);
            }
        } else {
            redirect("site/market");
        }
    }

//////////////////////////////////
    function market_rate() {


        $this->load->model('site_model');
        if ($this->site_model->filter_rate()) {
            $filter_rate = $this->site_model->filter_rate();
            $data['filter_rate'] = $filter_rate->result();
            if ($this->site_model->select_price()) {
                $price = $this->site_model->select_price();
                $data['prices'] = $price->result();
                $this->load->view('index_market', $data);
            }
        } else {
            redirect("site/market");
        }
    }

///////////////////////////


    function order() {
        if ($this->session->userdata('logged_in')) {
            if ($this->uri->segment(3) != '') {
                $this->load->view('view_order');
            } else {
                redirect("site/market");
            }
        } else {
            redirect("user/profile");
        }
    }

    function confirm_order() {
        $this->load->model('sitead');
        if ($this->session->userdata('logged_in')) {
            if ($_POST['order_id']) {
                $order_id = $this->input->post('order_id');
//                $order_id = $_POST['order_id'];
//                echo 'Heree' . $this->input->post('order_id') . "</br>";
//                echo "Price : " . $this->input->post('order_price') . "</br>";
                $user_id = $this->session->userdata('user_id');
//                $order_point = $this->input->post('order_point');
                $order_p = $this->input->post('order_p');
                $c_id = $this->input->post('c_id');
                $sc_id = $this->input->post('sc_id');
                $duration = $this->input->post('duration');
//                $order_point = $_POST['order_price'];
///valid price
                $amount = $this->sitead->vaild_amount_point($user_id);
//                echo $amount;
                if ($amount < $order_p) {
//redirect
//                    echo 'Not Engh';
                    $data = array(
                        "title" => 'حدث مشكلة',
                        "mesg" => 'رصيدك لا يكفى لأتمام عملية الشراء'
                    );
                    $this->load->view('message', $data);
                } else {
// decrimint from user point and insert in orders 
//                    echo $user_id . $order_id . $order_point . $amount;
                    $amount = $this->sitead->do_buy_process($user_id, $order_id, $order_p, $amount, $c_id, $sc_id, $duration);
// order->order_num+1 where $order_id
                    $this->sitead->update_num_service($order_id);
                }
///
            } else {
                redirect("site/market");
            }
        } else {
            redirect("user/profile");
        }
    }

///////////////////////////
//////////////////
    function post_topic() {
        if ($this->session->userdata('logged_in')) {

// print_r($this->session->userdata);
            $id = $this->session->userdata('user_id');
            $this->load->model('site_model');
            if ($this->site_model->select_user($id)) {
                $user_data = $this->site_model->select_user($id);
                $data['username'] = $user_data['username'];
                $data['email'] = $user_data['email'];
                $data['city'] = $user_data['city'];
                $data['country'] = $user_data['country'];
                $data['pic'] = $user_data['pic'];
                $data['user_id'] = $user_data['id'];

                $id = $user_data['id'];
                if ($this->session->userdata('user_id') == $id) {
                    $data['owner'] = 'yes';
                } else {
                    $data['owner'] = 'no';
                }
            }



            $this->load->view('add_topic', $data);
        } else {
            redirect('site/index');
        }
    }

///////////////////
    function change_pic() {
        if ($this->session->userdata('logged_in')) {

// print_r($this->session->userdata);
            $id = $this->session->userdata('user_id');
            $this->load->model('site_model');
            if ($this->site_model->select_user($id)) {
                $user_data = $this->site_model->select_user($id);
                $data['username'] = $user_data['username'];
                $data['email'] = $user_data['email'];
                $data['city'] = $user_data['city'];
                $data['country'] = $user_data['country'];
                $data['pic'] = $user_data['pic'];
                $data['user_id'] = $user_data['id'];

                $id = $user_data['id'];
                if ($this->session->userdata('user_id') == $id) {
                    $data['owner'] = 'yes';
                } else {
                    $data['owner'] = 'no';
                }
            }



            $this->load->view('change_pic_v', $data);
        } else {
            redirect('site/index');
        }
    }

///////////////////////////
    function addcomment() {
        if ($this->session->userdata('logged_in')) {
            $u_type = "user";
            $u_id = $this->session->userdata('user_id');
        } elseif ($this->session->userdata('employe_logged_in')) {
            $u_type = "employee";
            $u_id = $this->session->userdata('employee_id');
        } elseif ($this->session->userdata('admin_logged_in')) {
            $u_type = "admin"; //admin_id
            $u_id = $this->session->userdata('admin_id');
        } else {
            $on = $_POST['type'];
            if ($on == "blog") {
//                redirect('site/blog_details/');
            } else {
//                redirect('site/market_deatils/');
            }
            return;
//redirect//exit//you must login first
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment', 'Comment', 'required|trim|xss_clean');
        if ($this->form_validation->run()) {
            $this->load->model('sitead');
            $comment = $this->input->post('comment');
            $on = $_POST['type'];
            $post_id = $_POST['post_id'];
            $parent = $_POST['parent'];
            $sc_id = $_POST['sc_id'];
            $data = array(
                'u_id' => $u_id,
                'u_type' => $u_type,
                'comment' => $comment,
                'on' => $on,
                'parent' => $parent,
                'post_id' => $post_id
            );
            if ($this->sitead->add($data, "comments")) {
                if ($on == 'blog') {
                    echo 'here ';
                    redirect("site/blog_details/$post_id/$sc_id");
                } else {
                    echo 'mesh here ';
                    redirect("site/market_deatils/$post_id/$sc_id");
                }
            } else {
//redirect//error
            }
        }
    }

///////////////////////////
    function user_register() {
        $this->load->view('user_register');
    }

//////////////////////////////////////// user registration /////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////// validate user
    public function sign_user_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required|max_length[25]|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[150]|is_unique[user_temp.email]|is_unique[user.email]
											 ');
        $this->form_validation->set_rules('bank_email', 'Payment email', 'required|trim|xss_clean|valid_email|max_length[150]|is_unique[user_temp.email]|is_unique[user.email]
											 ');
        $this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city', 'city', 'required|max_length[30]|trim|xss_clean');
        $this->form_validation->set_rules('zip_code', 'Zip code', 'required|max_length[30]|trim|xss_clean|numeric');


        $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]|trim|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[20]|trim|xss_clean|numeric');
        $this->form_validation->set_rules('parent_link', 'parent link', 'required|max_length[500]|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|md5|max_length[250]|trim');
        $this->form_validation->set_rules('sec_password', 'Second Password', 'required|md5|max_length[250]|trim');

        $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]|md5|max_length[250]|trim');

        $this->form_validation->set_message('is_unique', "هذا البريد الالكتروني استخدم مره قبل ذلك ");
        $this->form_validation->set_message('valid_email', "البريد الالكتروني الذي تم ادخاله غير صحيح ");
        $this->form_validation->set_message('matches', "كلمتين السر اللذان تم ادخالهما غير متشابهاش ");



        if ($this->form_validation->run()) {
//generate a rundom key
            $key = md5(uniqid());
            $this->load->library('email', array('mailtype' => 'html'));
            $this->email->from('me@website.com', "temraz");
            $this->email->to($this->input->post('email'));
            $this->email->subject("تفعيل حسابك");
            $message = "<p> شكرا للتسجيل معنا لتفعيل حسابك اضغط علي الرابط التالي من فضلك </p>";
            $message.="<p><a href='" . base_url() . "site/register_user/$key' >اضغط هنا</a>لتفعيل حسابك</p>";
            $this->email->message($message);
            if ($this->email->send()) {
                echo " تم ارسال الرساله بنجاح";
            } else {
                echo "غير قادر علي ارسال الرساله حاليا حاول مره اخري من فضلك";
            }
//			
//send email to the user			
//add them ti the temp_users db
            $this->load->model('site_model');

            if ($this->site_model->add_temp_user($key)) {
//$data['regist']='تم التسجيل بنجاح, من فضلك اذهب الي بريدك الالكتروني لتفعيل حسابك ,شكرا لك';
//$this->load->view('user_register',$data);
                $data['key'] = $key;
                $this->load->view("activation", $data);
            }
        } else {

            $this->load->view('user_register');
        }
    }

///////////////////////////   email activation ////////////////////////////////// 
    public function register_user($key2) {
        $this->load->model('site_model');

        if ($this->site_model->is_key_valid_user($key2)) {
            if ($newmail = $this->site_model->add_user($key2)) {

//$data=array(
//'email'=>$newmail,
//'is_logged_in'=>1
//);
//$this->session->set_userdata($data);
                redirect('site/');
            } else {

                echo"فشل في تفعيل الحساب ,من فضلك حاول مره اخري";
            }
        } else {
            echo "رابط التفعيل غير صحيح";
        }
    }

/////////////////////////////////////////////// end of user registration /////////////////////////////////////////				
//function login_user_valied(){
//		$username=$this->input->post("username", true);
//	    $password=md5($this->input->post("password", true));
//		$this->load->model('site_model');
//		if($this->site_model->check_can_log_in($username, $password)){
//			redirect('site/market');
//			}else{
//				echo "اسم المستخدم او كلمه المرور غير صحيحه";
//				}
//	}
///////////////////////////////////////////////////////////////////////////
///////////////////////////////
    public function login_validation() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('view_index');
        } else {

            $this->load->model('site_model');

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->site_model->check_can_log_in($username, $password)) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->site_model->check_can_log_in($username, $password);

                $login_data = array("logged_in" => true, "user_id" => $user['id'], "user_email" => $user['email'], "user_name" => $username);
                $this->session->set_userdata($login_data);
                redirect('user/profile');
            } else {
                redirect('site/load_404');
            }
        }
    }

/////////////////////////////
    public function validate_credentials() {
        $this->load->model('site_model');

        if ($this->site_model->can_log_in()) {
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'اسم المستخدم او كلمه السر غير صحيحه');
            return false;
        }
    }

//////////////////////////////////////////
    function blog() {
        $this->load->view('view_blog');
    }

    ////////////////////////////////////////////
    function contact_us() {

        $this->load->view('view_contact');
    }

//////////////////////////////////////
    function contact_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[60]|trim|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'required|max_length[500]|trim|xss_clean');
        $this->form_validation->set_rules('country', 'The message type', 'required|max_length[500]|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[200]|xss_clean');



        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $mail = $this->input->post('email');
            $type = $this->input->post('country');
            $message = $this->input->post('message');
            $this->load->model('site_model');
            if ($this->site_model->contact_form($name, $mail, $type, $message)) {
                $data1 = array();
                $data1['sent'] = "تم ارسال الرساله بنجاح شكرا لك";

                $this->load->view('view_contact', $data1);
            } else {
                $data1 = array();
                $data1['dont_sent'] = "عفوا لم ترسل الرساله لخطأ ما <br />
حاول مره ثانيه ";


                $this->load->view('view_contact', $data1);
            }
        } else {

            $this->load->view('view_contact');
        }
    }

///////////////////////////////////////
    function about() {
        $this->load->view('view_about');
    }

///////////////////////////////////////
//////////////////////////////////////////
    function logout() {
        $this->session->sess_destroy();
        $this->load->view('view_index');
    }

//////////////////////////////////////////
////////////////////
    function market() {

        $this->load->view('index_market');
    }

////////////////////////////////////
    function price_market() {
        $price1 = $this->input->post('price1');
        $price2 = $this->input->post('price2');
        if (isset($price1)) {
            if (isset($price2)) {
                $this->load->model('site_model');
                if ($this->site_model->filter_price($price1, $price2)) {
                    $filter_price = $this->site_model->filter_price($price1, $price2);

                    $data['filter_prices'] = $filter_price->result();
                } else {
                    $data['filter_prices'] = 1;
                    redirect("site/market");
                }
                $this->load->view('index_market', $data);
            } else {
                redirect("site/market");
            }
        } else {
            redirect("site/market");
        }
    }

//////////////////////////////////
///////////////////////////
    function market_deatils() {
        if ($this->uri->segment(4) != '') {

            $c_id = $this->uri->segment(4);
            $this->load->model('site_model');
            if ($this->site_model->select_same_serv1($c_id)) {
                $topics1 = $this->site_model->select_same_serv1($c_id);

                $data['same_topics1'] = $topics1->result();


                $this->load->view('market_details', $data);
            }
        } else {
            redirect('site/blog');
        }
    }

//////////////////////////////////////////
    function blog_details() {
        if ($this->uri->segment(4) != '') {
            $c_id = $this->uri->segment(4);
            $this->load->model('site_model');
            if ($this->site_model->select_same_topic1($c_id)) {
                $topics1 = $this->site_model->select_same_topic1($c_id);

                $data['same_topics1'] = $topics1->result();


                $this->load->view('blog_details', $data);
            }
        } else {
            redirect('site/blog');
        }
    }

//////////////////////////////////////////////// 
}
