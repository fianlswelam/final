

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
                        <a href="<?php echo base_url();?>site/rss">
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
<?php if ($this->session->userdata('logged_in')) {
	$id = $this->session->userdata('user_id');
	  $sql = "select * from chat where `to`=? and to_seen=?";
                            $query = $this->db->query($sql,array($id,0));

                            if ($query->num_rows() > 0) {
                                $count_message = count($query->result());
								$rows = $query->result();
							
							}
	
	?>
                    <li class="divider-vertical remove-margin"></li>
                    <li id="messages-widget" class="dropdown dropdown-left-responsive">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="badge badge-success"><?php if(isset($count_message)){ echo $count_message;}else{ echo '0' ;}?></span>
                        </a>
                        <ul class="dropdown-menu widget pull-right">
                            <li class="widget-heading"><i class="icon-comment pull-right"></i>الرسائل الجديده</li>
                            <?php
                          if(isset($rows)){
                                foreach ($rows as $row) {
									$username=$this->user_model->select_user_chat($row->to)->row(0)->username;

							$seder_pic=$this->user_model->select_user_chat($row->to)->row(0)->profile_pic;
                                    ?>
                                    <tr>
                                        
                                        
                                    <li class="new-on">
                                        <div class="media">
                                            <a class="pull-left" href="<?php echo base_url() ?>user/messages/<?php echo $row->message ?>">
                                                <img id="msg_img" src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $seder_pic?>"  alt="fakeimg" width="32" height="32">
                                            </a>
                                            <div class="media-body">
                                                <h6 class="media-heading"><a href="<?php echo base_url(); ?>user/show_messages/<?php echo $row->from; ?>"><?php echo $username; ?></a></h6>
                                                <div class="media"><a href="<?php echo base_url() ?>user/show_messages/<?php echo $row->from ?>"><?php echo $row->message; ?></a></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <?php
                                }
						  }
                            ?>

                            <li class="text-center"><a href="<?php echo base_url() ?>user/show_messages/">مشاهده كل الرسائل</a></li>
                        </ul>
                    </li>
                     <?php
                            $this->db->from('notifications');
                            $this->db->where('user_id', $this->session->userdata('user_id'));
                            $this->db->order_by("date", "desc");
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
								$notif_count=count($query->result());
                                $rows2 = $query->result();
							}
								?>
                    <li class="divider-vertical remove-margin"></li>
                    <li id="notifications-widget" class="dropdown dropdown-center-responsive">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-flag"></i>
                            <span class="badge badge-important"><?php if(isset($notif_count)){echo $notif_count;}else{ echo '0' ;}?></span>

                        </a>
                        <ul class="dropdown-menu widget">

                            <li class="widget-heading"><a href="#" class="pull-right widget-link"><i class="icon-bookmark"></i></a><a href="javascript:void(0)" class="widget-link">مركز  التنبيهات </a></li>
                           <?php
						   if(isset($rows2)){
                                foreach ($rows2 as $row) {
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
                              
                            </li>
                            <li>
                               
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
                    <?php }?>
                </ul>
            </div>
        </div>
    </header>

  