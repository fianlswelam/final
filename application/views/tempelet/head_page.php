<?php
if ($this->session->userdata('logged_in')) {
    ?>

    <style type="text/css">

        #msg_img{float:right;float:right;width:32px;height:32px;margin-right:0px;}

    </style>

    <header class="navbar navbar-inverse">
        <div class="navbar-inner remove-radius remove-box-shadow">

            <div class="container-fluid">
                <ul class="nav pull-right visible-phone visible-tablet">
                    <li class="divider-vertical remove-margin"></li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target=".nav-collapse">
                            <i class="icon-reorder"></i>
                        </a>
                    </li>
                </ul>
                <a href="index.php.htm"  class="brand"><img src="<?php echo base_url(); ?>images/logo.png" alt="logo"></a>


                <ul id="widgets" class="nav pull-right">
                    <li class="divider-vertical remove-margin"></li>
                    <!------------------------------>
                    <li id="messages-widget" class="dropdown dropdown-left-responsive">
                        <a href="#">
                            <i class="icon-rss"></i>

                        </a>

                    </li>
                    <!----------------------------------->
                    <li class="divider-vertical remove-margin"></li>
                    <!------------------------------>
                    <!------------------------------>
                    <li id="messages-widget" class="dropdown dropdown-left-responsive">
                        <a href="#" >
                            <i class="icon-google-plus"></i>

                        </a>

                    </li>
                    <!----------------------------------->
                    <li class="divider-vertical remove-margin"></li>
                    <!------------------------------>
                    <li id="messages-widget" class="dropdown dropdown-left-responsive">
                        <a href="#" >
                            <i class="icon-twitter"></i>

                        </a>

                    </li>
                    <!----------------------------------->
                    <li class="divider-vertical remove-margin"></li>
                    <!------------------------------>
                    <li id="messages-widget" class="dropdown dropdown-left-responsive">
                        <a href="https://www.facebook.com/" >
                            <i class="icon-facebook-sign"></i>

                        </a>

                    </li>
                    <!----------------------------------->

                    <li class="divider-vertical remove-margin"></li>
                    <li id="messages-widget" class="dropdown dropdown-left-responsive">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="badge badge-success">1</span>
                        </a>
                        <ul class="dropdown-menu widget pull-right">
                            <li class="widget-heading"><i class="icon-comment pull-right"></i>الرسائل الجديده</li>
                            <?php
                            $sql = "select * from chat_id where user_id1=" . $this->session->userdata('user_id') . " or user_id2=" . $this->session->userdata('user_id');
                            $query = $this->db->query($sql);

                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <?php
                                        if ($row->user_id1 == $this->session->userdata('user_id')) {
                                            $user_id = $row->user_id2;
                                        } else {
                                            $user_id = $row->user_id1;
                                        }
                                        $this->db->where('id', $user_id);
                                        $this->db->from('user');
                                        $query_sender = $this->db->get();
                                        if ($query_sender->num_rows() > 0) {
                                            $sender = $query_sender->result();
                                            foreach ($sender as $sender_data) {
                                                
                                            }
                                        }
                                        $mess_sql = '
                                            SELECT *
                                            FROM `user_chat`
                                            WHERE mess_id=' . $row->id . '
                                            ORDER BY `user_chat`.`mess_date` DESC
                                            LIMIT 0 , 1
                                            ';
                                        $mess_query = $this->db->query($mess_sql);

                                        if ($mess_query->num_rows() > 0) {
                                            $mess = $mess_query->result();
                                            foreach ($mess as $mess_data) {
                                                
                                            }
                                        }
                                        ?>
                                    <li class="new-on">
                                        <div class="media">
                                            <a class="pull-left" href="<?php echo base_url() ?>user/messages/<?php echo $user_id ?>">
                                                <img id="msg_img" src="<?php echo base_url(); ?>images/image_light_64x64.png"  alt="fakeimg" width="32" height="32">
                                            </a>
                                            <div class="media-body">
                                                <h6 class="media-heading"><a href="<?php echo base_url(); ?>user/visite_profile/<?php echo $user_id; ?>"><?php echo $sender_data->username; ?></a></h6>
                                                <div class="media"><a href="<?php echo base_url() ?>user/messages/<?php echo $user_id ?>"><?php echo $mess_data->message; ?></a></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <?php
                                }
                            }
                            ?>

                            <li class="text-center"><a href="javascript:void(0)">مشاهده كل الرسائل</a></li>
                        </ul>
                    </li>
                    <li class="divider-vertical remove-margin"></li>
                    <li id="notifications-widget" class="dropdown dropdown-center-responsive">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-flag"></i>
                            <span class="badge badge-important">1</span>

                        </a>
                        <ul class="dropdown-menu widget">

                            <li class="widget-heading"><a href="javascript:void(0)" class="pull-right widget-link"><i class="icon-bookmark"></i></a><a href="javascript:void(0)" class="widget-link">مركز  التنبيهات </a></li>
                            <?php
                            $this->db->from('notifications');
                            $this->db->where('user_id', $this->session->userdata('user_id'));
                            $this->db->order_by("date", "desc");
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                foreach ($rows as $row) {
                                    ?>
                                    <li>
                                        <ul>
                                            <li class="label label-success"><?php echo $row->date ?></li>
                                            <li class="text-success"> <?php echo $row->content; ?></li>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <li>
                                <ul>
                                    <li class="label label-info">1 month ago</li>
                                    <li class="text-info">Milestone #3 achieved!</li>
                                    <li class="text-info"><a href="javascript:void(0)" class="widget-link">John Doe</a> joined the project!</li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li class="label">1 year ago</li>
                                    <li class="text-muted">This is an old notification</li>
                                </ul>
                            </li>
                            <li class="divider"></li>

                        </ul>
                    </li>
                    <li class="divider-vertical remove-margin"></li>
                    <li class="dropdown dropdown-user">
                        <?php
                        $this->db->from('user');
                        $this->db->where('id', $this->session->userdata('user_id'));
                        $query = $this->db->get();
                        if ($query->num_rows() > 0) {
                            $rows = $query->result();
                            foreach ($rows as $row) {
                                
                            }
                        }
                        ?>
                        <style>
                            .image-head{
                                width: 32px;
                                height: 32px;
                            }
                        </style>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="image-head" src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $row->profile_pic;?>"  alt="avatar"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url(); ?>user/profile" role="button" data-toggle="modal">حسابي الشخصي <i class="icon-user"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>user/edit_profile">تعديل حسابي الشخصي <i class="icon-wrench"></i></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url(); ?>site/logout" > تسجيل الخروج <i class="icon-lock"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <?php
}
?>