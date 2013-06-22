<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function index() {

        $this->profile();
    }

    //////////////////////////////////////////////////////////////////////// add topic
    function validation_add_topic() {
        if ($this->session->userdata('logged_in')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('topic_name', 'Topic title', 'required|max_length[125]|trim|xss_clean');
            $this->form_validation->set_rules('tags', 'tags', 'required|max_length[200]|trim|xss_clean');
            $this->form_validation->set_rules('topic', 'topic', 'required|trim|xss_clean|');
            $this->form_validation->set_rules('search_category', 'topic', 'required|trim|xss_clean|');
          
            
            $this->form_validation->set_message('max_length', "العنوان لا يجب ان يزيد عن 125 حرف");

            if ($this->form_validation->run()) {
                $id = $this->session->userdata('user_id');
                $this->load->model('user_model');
                if ($this->user_model->add_topic($id)) {

                    $data['topic_added'] = 'تم اضافه الموضوع بنجاح الي المدونه يجب انتظار تأكيد الادمن علي الموضوع حتي يظهر ف المدونه';

                    $this->load->model('site_model');
                    if ($this->site_model->select_user($id)) {
                        $user_data = $this->site_model->select_user($id);
                        $data['username'] = $user_data['username'];
                        $data['email'] = $user_data['email'];
                        $data['city'] = $user_data['city'];
                        $data['country'] = $user_data['country'];
                        $data['pic'] = $user_data['pic'];


                        $id = $user_data['id'];
                        if ($this->session->userdata('user_id') == $id) {
                            $data['owner'] = 'yes';
                        } else {
                            $data['owner'] = 'no';
                        }
                    }


                    $this->load->view('add_topic', $data);
                }
            } else {
                $id = $this->session->userdata('user_id');
                $this->load->model('site_model');
                if ($this->site_model->select_user($id)) {
                    $user_data = $this->site_model->select_user($id);
                    $data['username'] = $user_data['username'];
                    $data['email'] = $user_data['email'];
                    $data['city'] = $user_data['city'];
                    $data['country'] = $user_data['country'];
                    $data['pic'] = $user_data['pic'];


                    $id = $user_data['id'];
                    if ($this->session->userdata('user_id') == $id) {
                        $data['owner'] = 'yes';
                    } else {
                        $data['owner'] = 'no';
                    }
                }



                $this->load->view('add_topic', $data);
            }
        } else {
            redirect('site/index');
        }
    }


//////////////////////////////////////// upload profile pic

    function upload_pic() {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('user_model');

            $id = $this->session->userdata('user_id');
            $upload = $this->user_model->do_upload($id);
            $data['error'] = "svsdf";
            redirect('user/profile', $data);
        } else {
            redirect('site/index');
        }
    }

/////////////////////////////////////////////////////
///////////////////
    function edit_profile() {
        if ($this->session->userdata('logged_in')) {

// print_r($this->session->userdata);
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

            $this->load->view('user_edit', $data);
        } else {
            redirect('site/index');
        }
    }

/////////////////////////////////////////////////////////////
    public function edit_user_validation() {
        if ($this->session->userdata('logged_in')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[100]|
');
            $this->form_validation->set_rules('bank_email', 'payment_email', 'required|trim|xss_clean|valid_email|max_length[100]|
');
            $this->form_validation->set_rules('country', 'Country', 'required|trim|xss_clean');
            $this->form_validation->set_rules('city', 'city', 'required|max_length[30]|trim|xss_clean');
            $this->form_validation->set_rules('zip_code', 'Zip code', 'required|max_length[30]|trim|xss_clean|numeric');


            $this->form_validation->set_rules('address', 'Address', 'required|max_length[100]|trim|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[20]|trim|xss_clean|numeric');






            $this->form_validation->set_message('valid_email', "البريد الالكتروني الذي تم ادخاله غير صحيح ");




            if ($this->form_validation->run()) {


// print_r($this->session->userdata);
                $id = $this->session->userdata('user_id');
                $this->load->model('user_model');
                if ($this->user_model->update_user($id)) {
                    $data['updated'] = 'تم تعديل بياناتك بنجاح';


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
                    }
                    $this->load->view('user_edit', $data);
                }
            } else {

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
                }

                $data['not_updated'] = 'عفوا لا يمكن تعديل بيناتك حاليا حاول مره اخري من فضلك';
                $this->load->view('user_edit', $data);
            }
        } else {
            redirect('site/index');
        }
    }

    /////////////////
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

/////////////////////

    function addfavouritb() {

        if ($this->session->userdata('logged_in')) {

            if ($this->uri->segment(3) != '') {
                if ($this->uri->segment(4) != '') {
                    $id = $this->uri->segment(3);
                    $categ = $this->uri->segment(4);
                    //select name
                    $this->db->from('topic');
                    $this->db->where('id', $id);

                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        $rows = $query->result();
                        foreach ($rows as $row) {
                            
                        }
                    }
                    $title = $row->title;
                    ///
                    $link = '<a href="' . base_url() . 'site/blog_details/' . $id . '/' . $categ . '">' . $title . '</a>';
                    $data = array(
                        'name' => $title,
                        'link' => $link,
                        'user_id' => $this->session->userdata('user_name')
                    );
                    echo $link;
                    $this->load->model('user_model');
                    if ($this->user_model->add('favourit', $data)) {
                        redirect('site/blog_details/' . $id . '/' . $categ);
                    }
                }
            }
        }
    }

    ///
    function addfavouritm() {

        if ($this->session->userdata('logged_in')) {

            if ($this->uri->segment(3) != '') {
                if ($this->uri->segment(4) != '') {
                    $id = $this->uri->segment(3);
                    $categ = $this->uri->segment(4);
                    //select name
                    $this->db->from('service');
                    $this->db->where('id', $id);

                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        $rows = $query->result();
                        foreach ($rows as $row) {
                            
                        }
                    }
                    $title = $row->name;
                    ///
                    $link = '<a href="' . base_url() . 'site/market_deatils/' . $id . '/' . $categ . '">' . $title . '</a>';
                    $data = array(
                        'name' => $title,
                        'link' => $link,
                        'user_id' => $this->session->userdata('user_name')
                    );
                    echo $link;
                    $this->load->model('user_model');
                    if ($this->user_model->add('favourit', $data)) {
                        redirect('site/market_deatils/' . $id . '/' . $categ);
                    }
                }
            }
        }
    }

   ///////////////////
    function profile() {
        if ($this->session->userdata('logged_in')) {

            // print_r($this->session->userdata); 
            $id = $this->session->userdata('user_id');
            $this->load->model('site_model');
            if ($this->site_model->select_user($id)) {
                $user_data = $this->site_model->select_user($id);
                $data['username'] = $user_data['username'];
				$data['id'] = $user_data['id'];
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



            $this->load->view('user_profile', $data);
        } else {
            redirect('site/index');
        }
    }

    ///////////////////////////////////////////////////////////////////  message level1
    function user_messages() {
        $this->load->view('user_messages');
    }

    //////////////////////////////////////////////////////////////////////// message level2
    function user_chat() {
        $this->load->view('user_chat');
    }

    function comment_user() {
        if ($this->session->userdata('logged_in')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('comment', 'Comment', 'required|trim|xss_clean');
            if ($this->form_validation->run()) {
                $sender_id = $_POST['sender_id'];
                $receiv_id = $_POST['receiv_id'];
                $comment = $this->input->post('comment');
                $this->load->model('user_model');
                $id = $this->user_model->chat_user($sender_id, $receiv_id);
                $data = array(
                    'mess_id' => $id,
                    'sender_id' => $sender_id,
                    'receiv_id' => $receiv_id,
                    'message' => $comment,
                    'receiv_seen' => 0,
                    'sender_seen' => 1
                );
                if ($this->user_model->add('user_chat', $data)) {
                    redirect('user/messages/' . $receiv_id);
                }
            }
        }
    }

    ////////////////////////////////////////////////////// profile visitor
    function visit_profile() {
        if ($this->session->userdata('logged_in')) {
            if ($this->uri->segment(3) != '') {
                $user_id = $this->uri->segment(3);
                $this->load->model('user_model');
                if ($this->user_model->can_visit_user($user_id)) {


                    $this->load->model('site_model');
                    if ($this->site_model->select_user($user_id)) {
                        $user_data = $this->site_model->select_user($user_id);
                        $data['recev_id'] = $user_data['id'];
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



                    $this->load->view('user_profile', $data);
                } else {
                    redirect('site/error');
                }
            } else {
                redirect('site/error');
            }
        } else {
            redirect('site/index');
        }
    }

    ////////////////////////////////////////////////////// recived messages
    function show_messages() {
        if ($this->session->userdata('logged_in')) {
			 $user_id = $this->session->userdata('user_id');
			      $this->load->model('site_model');
                    
                        $user_data = $this->site_model->select_user($user_id);
                        $parent_id = $user_data['parent_id'];
		 if ($this->uri->segment(3) != '') {	
           
	       
                    
						
			
			if($this->user_model->select_contacts($user_id,$parent_id)){
				$data['contacts']=$this->user_model->select_contacts($user_id,$parent_id)->result();
				 $this->load->view('message_level1',$data);
				}else{
					$data['no_contacts']=1;
					 $this->load->view('message_level1',$data);
					}
		 }else{
			 if($this->user_model->select_contacts($user_id,$parent_id)){
				$data['contacts']=$this->user_model->select_contacts($user_id,$parent_id)->result();
				 $data['segment']=1;
				 $this->load->view('message_level1',$data);
				}else{
					$data['no_contacts']=1;
					 $data['segment']=1;
					 $this->load->view('message_level1',$data);
					}
			
			 		 
			 }
          
        } else {
            redirect('site/index');
        }
    }

    ////////////////////////////////////////////////////// level2 messages	
    function messages() {
        if ($this->session->userdata('logged_in')) {
            if ($this->uri->segment(3) != '') {
                $user_id = $this->uri->segment(3);
                $this->load->model('user_model');
                if ($this->user_model->can_visit_user($user_id)) {
                    $data['sender_id'] = $this->session->userdata('user_id');
                    $data['receiv_id'] = $this->uri->segment(3);
                    $this->load->view('message_level2', $data);
                } else {
                    redirect('site/error');
                }
            } else {
                redirect('site/error');
            }
        } else {
            redirect('site/index');
        }
    }

    /////////////////////////////////////////////////////// add chat_messages
    function ajax_add_chat() {
        if ($this->session->userdata('logged_in')) {
			
			   $this->load->library('form_validation');
        $this->form_validation->set_rules('from_id', 'The employee', 'required|trim|numeric|xss_clean');
		$this->form_validation->set_rules('to_id', 'the manager', 'required|trim|xss_clean|numeric');
		$this->form_validation->set_rules('msg', 'the manager', 'required|trim|xss_clean');
	
       
		
        if ($this->form_validation->run() == false) {
			    echo 'no1';
		}else{
			  $from_id = $this->input->post('from_id');;
            $to_id = $this->input->post('to_id');
            $message_content = $this->input->post("msg", true);


            if ($this->user_model->add_chat_message($from_id, $to_id, $message_content)) {
                $result = "ok";
                echo $result;
            } else {
				echo 'no2';
                //no chat return
            }
			
			}
			
			
          
        } else {

            redirect('site/index');
        }
    }
////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
		function ajax_select_last_message(){
			 $from_id=$this->input->post('from_id');
		     $to_id=$this->input->post('to_id');
			 echo $this->_ajax_select_last_message($from_id ,$to_id);
			 }
			 
		 function _ajax_select_last_message($from_id ,$to_id){
			 		
					$chat_messages=$this->user_model->get_chat_messages_last_one($from_id ,$to_id);
					if(isset($chat_messages)){
	
						$result=$chat_messages->row(0)->to;
						$my_id=$this->session->userdata('user_id');
						if($my_id==$result){
							$this->user_model->update_message_seen($from_id,$to_id);
							}
						
						}else{
							//no chat return
						$result=array('status'=>'no' ,'content'=>'there is know');
						return json_encode($result);
							exit();
							}
					
			 }
    ///////////////////////////////////////////////////////// update messages by ajax

	
//////////////////////////////////////////////////////// get messages by ajax

//////////////////////////////////////////////////////////////
		 function ajax_get_chat_messages(){
			 $from_id=$this->input->post('from_id');
		     $to_id=$this->input->post('to_id');
			 echo $this->_get_chat_messages($from_id ,$to_id);
			 }
		 
		 
		 function _get_chat_messages($from_id ,$to_id){
			 		
					$chat_messages=$this->user_model->get_chat_messages($from_id ,$to_id)->result();
					if(isset($chat_messages)){
						//we have some messages
                             $chat_message_html='<span>';
						
						foreach($chat_messages as $chat_message){
							
								
						    $username=$this->user_model->select_user_chat($chat_message->from)->row(0)->username;

							$seder_pic=$this->user_model->select_user_chat($chat_message->from)->row(0)->profile_pic;
							
							
							$chat_message_html.='
							   <a href="" class="pull-left">
                                                            <img src="http://localhost/final_s/images/profile/thumb_profile/'.$seder_pic.' " width="60" height="60" class="media-object img-polaroid" id="profile" alt="Image">
                                                        </a>

                                                        <div class="media-body">
                                                            <h5 class="media-heading"> <small><span class="label label-info">'.$chat_message->message_date.'</span> في</small> <a href="#">
                                                                    '.$username.'                                                                </a></h5>
																	
                                                            <p>'.$chat_message->message.'</p>
                                                            
                                                        </div>
														<br/>
							   
							';
							
							}
							
							
						$chat_message_html.='</span>';
						
						
						$result=array('status'=>'ok' ,'content'=>$chat_message_html);
						return json_encode($result);
						exit();
						}else{
							//no chat return
						$result=array('status'=>'no' ,'content'=>'there is know');
						return json_encode($result);
							exit();
							}
					
			 }
		///////////////////////////////////////////////////////////////
///////////////////////////////////////////
    function addcomment() {
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('chat_message', 'Chat Message', 'required|trim|max_length[100]|xss_clean');
        $this->load->helper('date');

        if ($this->form_validation->run() == false) {
            $message = array("mes" => " لا تترك النص فارغ");
            $this->load->view('user/chat_service/', $message);
//            $this->loadAddCategory();
        } else {
            $chat_message = $this->input->post('chat_message');
            $order_id = $_POST['order_id'];
            $employe_id = $_POST['employe_id'];
            //
            $this->db->from('employee');
            $this->db->where('id', $employe_id);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                $rows = $query->result();
                foreach ($rows as $row) {
                    $name = $row->username;

                    //
                    $data = array(
                        'sender_id' => $this->session->userdata('user_id'),
                        'sender_u_name' => $this->session->userdata('user_name'), //user_name
                        'resiver_id' => $employe_id, //user_name
                        'order_id' => $order_id, //
                        'reciver_u_name' => $name,
                        'message' => $chat_message,
                        'recive_seen' => 0,
                        'date' => date('Y-m-d H:i:s', now()),
                        'type' => 'user'
                    );
                    if ($this->user_model->addcomment($data)) {
                        $message = array("mes" => "تم أضافة " . $chat_message . " .");
//                unset($this->input->post('categoryname'));
//                $this->load->view('civou/view_allcategory', $message);
                        redirect('user/chat_service/' . $order_id . '/' . $employe_id);
//                $this->loadAddCategory();
                    } else {
                        $message = array("mes" => "لقد حدثت مشكله فى الاضافه .");
                        $this->load->view('user/chat_service/' . $order_id, $message);
//                $this->loadAddCategory($message);
                    }
                }
            }
        }
    }

    ///////////////////////////////////////////////////////  user_tree
    function user_tree() {
        if ($this->session->userdata('logged_in')) {
            if ($this->uri->segment(3) != '') {
                $user_id = $this->uri->segment(3);
                $this->load->model('user_model');
                if ($this->user_model->can_visit_user($user_id)) {


                    $this->load->model('site_model');
                    if ($this->site_model->select_user($user_id)) {
                        $user_data = $this->site_model->select_user($user_id);
                        $data['recev_id'] = $user_data['id'];
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



                    $this->load->view('user_tree', $data);
                } else {
                    redirect('site/error');
                }
            } else {
                redirect('site/error');
            }
        } else {
            redirect('site/index');
        }
    }

}

?>