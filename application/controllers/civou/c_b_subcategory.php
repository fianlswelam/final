<?php

class c_b_subcategory extends CI_Controller {

    function loadAddbSubCategory() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_addblogsubcategory');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function approve() {

        if ($this->session->userdata('admin_logged_in')) {
            $topic_id = $this->uri->segment(4);
            $this->load->model('sitead');
            $data = array('statue' => '1');
            $this->sitead->approve_topic($topic_id,$data);
            redirect('site/blog');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function show_unapprovedTopic_detail() {
        if ($this->session->userdata('admin_logged_in')) {
            $topic_id = $this->uri->segment(4);
            $this->load->model('sitead');
            $data['detail'] = $this->sitead->getTopicDetails($topic_id);
            $this->load->view('civou/view_unapprovesTopics_detail', $data);
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function show_unapproved_topics() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_unapprovedTopics');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function addTopic() {

        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('civou/view_addTopic');
        } else {
            $this->load->view('civou/view_login');
        }
    }

    function validation_add_topic() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('topic_name', 'username', 'required|max_length[125]|trim|xss_clean');
            $this->form_validation->set_rules('topic', 'topic', 'required|trim|xss_clean|');
            $this->form_validation->set_rules('search_category', 'topic', 'required|trim|xss_clean|');
            $this->form_validation->set_rules('sub_category', 'sub_category', 'required|trim|xss_clean|');
            $this->form_validation->set_message('required', "جميع البيانات مطلوبه");
            $this->form_validation->set_message('max_length', "العنوان لا يجب ان يزيد عن 125 حرف");

            if ($this->form_validation->run()) {
                $name = $this->input->post('topic_name');
                $topic = $this->input->post('topic');
                $cat = $this->input->post('search_category');
                $s_cat = $this->input->post('sub_category');
                $type = $_POST['usertype'];
                $id = $this->session->userdata('admin_id');
                $gallery_path = realpath(APPPATH . '../upload/topic/');
                $gallery_path_thumb = realpath(APPPATH . '../upload/topic/thumb/');
                $gallery_path_url = base_url() . 'upload/';
                $config = array(
                    'allowed_types' => 'jpg|JPEG|png|gif',
                    'upload_path' => $gallery_path,
                    'max_size' => 4000
                );
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    return $error = array("error" => $this->upload->display_errors());
                }
                //////////////////////////////////////////////
                $image_data = $this->upload->data();
                //////////////////////////////////////////////
                $config2 = array(
                    'source_image' => $image_data['full_path'],
                    'new_image' => $gallery_path_thumb,
                    'maintain_ratio' => TRUE,
                    'width' => 200,
                    'height' => 200
                );

                $this->load->library('image_lib', $config2);

                $this->image_lib->resize();
                ////////////////////////////////////////////////////
                $query_str = "insert into topic ( user_id, title ,content, t_photo_name,c_id,sc_id ,user_type,statue) values (?,?,?,?,?,?,?,?) ";
                $result = $this->db->query($query_str, array($id, $name, $topic, $image_data['file_name'], $cat, $s_cat, $type,'1'));

                if ($result) {
                    redirect('civou/c_sitead');
                } else {
                    
                }
            }
        }
    }

    function addbSubCategory() {
        $this->load->model('sitead');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('categoryid', 'Category Name Not Selected', 'required|trim|max_length[100]|xss_clean');
        $this->form_validation->set_rules('categoryname', 'Sub Category Name', 'required|trim|max_length[100]|xss_clean');

        if ($this->form_validation->run() == false) {
            $message = array("mes" => " لا تترك النص فارغ");
            $this->load->view('civou/view_addblogsubcategory', $message);
        } else {
            $categoryname = $this->input->post('categoryname');
            $categoryid = $this->input->post('categoryid');
            if ($categoryid == "none") {
                $message = array("mes" => "لم يتم اختيار القسم الرئيسى التابع له");
                $this->load->view('civou/view_addblogsubcategory', $message);
            } else {
                if ($this->sitead->addbsubcategory($categoryname, $categoryid)) {
                    $message = array("mes" => "تم أضافة " . $categoryname . " .");
                    $this->load->view('civou/view_addblogsubcategory', $message);
                } else {
                    $message = array("mes" => "لقد حدثت مشكله فى الاضافه .");
                    $this->load->view('civou/view_addblogsubcategory', $message);
                }
            }
        }
    }

}

