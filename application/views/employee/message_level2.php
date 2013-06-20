<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>
        <!--
        
        -->
        <meta charset="UTF-8">
        <title>مدونه شلينات</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" >
        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" ></script>

    </head>


    <style type="text/css">

        body{text-align:right;font-family:myfont;}
        .pull-left{float:right;padding-left:10px;}
        .content-text p{text-align:right}
        table tr td{}
        #example-datatables2 tr td{text-align:right;}
        #example-datatables2 tr td a:hover {text-decoration:none; cursor:default;}
        .btn-primary:hover{text-decoration:none}
    </style>

    <body>
        <div id="page-container">

            <?php //include('tempelet/head_page.php'); ?>
            <div id="inner-container">
                <?php //include('tempelet/main_menu.php'); ?>
                <div id="page-content" >
                    <?php //include('header2.php') ?>
                    <?php
                    $order_id = $this->uri->segment(4); //s_id
                    $employee_id = $this->uri->segment(5);
//                    $user_id = $this->session->userdata('user_id');
                    //get from order s_id , get service where s_id
                    $sql = '
                            SELECT `service`.`id` AS service_id, `order`.`id` AS order_id, u_id, e_id,
                            START ,`order`.statu,
                            END , service.name AS service_name, price_point, detail, photo_name, instruction, `employee`.`username` AS e_username, `user`.`username` AS u_username, `user`.profile_pic
                            FROM `order`
                            INNER JOIN `service`
                            INNER JOIN `employee`
                            INNER JOIN `user`
                            WHERE `order`.`id` =' . $order_id . '
                            AND `service`.id = `order`.`s_id`
                            AND `employee`.`id`=`order`.`e_id` 
                            AND `user`.`id`=`order`.`u_id`                            
                        ';
                    //AND `user`.`id` =' . $user_id . '
                    $query = $this->db->query($sql);

                    if ($query->num_rows() > 0) {
                        $rows = $query->result();

                        foreach ($rows as $row) {
                            
                        }
                    }
                    ?>
                    <div class=" sub-header" style="margin-top:-30px;">
                        <div class="row-fluid">
                            <div class="span8 offset2">
                                <h3> <?php echo $row->service_name; ?> <i class="icon-file"></i></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid"  >
                        <div class="span8 offset2">
                            <div class="dash-tile">
                                <div class="dash-tile-header">


                                    <span class="label label-important"><?php echo $row->END; ?></span> 
                                    <span>من</span>
                                    <span class="label label-important"><?php echo $row->START; ?></span> 
                                    <span>الى</span>
                                    <a href="#"><?php echo $row->e_username; ?></a> مقدم الخدمة
                                </div>
                                <?php
                                if ($row->statu == 1) {
                                    ?>
                                    <div class="dash-tile-header">
                                        <a href="<?php echo base_url(); ?>csad/c_sad/block/<?php echo $row->order_id ?>"> حذف الخدمة </a><i class="icon-minus-sign"></i>
                                        <a href="<?php echo base_url(); ?>csad/c_sad/reject/<?php echo $row->order_id ?>"> رفض الخدمة </a><i class="icon-ok"></i>
                                        <a href="<?php echo base_url(); ?>csad/c_sad/sucsses/<?php echo $row->order_id ?>"> تاكيد أنهاء الخدمة </a><i class="icon-remove"></i>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="dash-tile-content"  >
                                    <div class="dash-tile-content-inner-fluid dash-tile-content-light content-text">
                                        <p><img src="<?php echo base_url(); ?>imagesService/thumb/<?php echo $row->photo_name; ?>"   alt="Image" class="pull-left" > 

                                        <div class="row-fluid" >
                                            <div class="span6" style="float:right;margin-top:-10px;">
                                            </div>
                                        </div>
                                        <h2>تفاصيل الخدمه</h2>
                                        <p><?php echo $row->detail; ?></p>
                                        <h2>تعليمات الخدمه</h2>
                                        <p><?php echo $row->instruction; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span8 offset2">
                            <div class="dash-tile dash-tile-dark no-opacity remove-margin">
                                <div class="dash-tile-header">Comments</div>     
                                <div class="dash-tile-content">
                                    <div class="dash-tile-content-inner-fluid dash-tile-content-light">
                                        <?php
                                        $this->db->from('service_message');
                                        $this->db->order_by("date", "desc");
                                        echo $order_id;
                                        $user_id = $this->session->userdata('user_id');
                                        $this->db->where('order_id', $order_id);
                                        $query = $this->db->get();
                                        if ($query->num_rows() > 0) {
                                            $rows = $query->result();

                                            foreach ($rows as $row_ch) {
                                                echo '
										<div class="media media-hover">
                                            <a href="' . base_url() . 'user/visit_profile/' . $row_ch->sender_id . '" class="pull-left">
                                               ';
                                                if ($row_ch->type == "user") {
                                                    echo '
                                                        <img src="' . base_url() . 'images/profile/thumb_profile/' . $row->profile_pic . '" width="50" height="45"  class="media-object img-polaroid" alt="Image">
                                                           ';
                                                }
//                                               
                                                echo '
                                               
                                               </a>
                                            <div class="media-body">
                                                <h5 class="media-heading"> <small><span class="label label-info">' . $row_ch->date . '</span> في</small> <a href="#">' . $row_ch->sender_u_name . '</a></h5>
												<p>' . $row_ch->message . '</p>
											</div>
                                        </div>
								';
                                            }
                                        }
                                        ?>
                                        <div class="media media-hover">
                                            <a href="#" class="pull-left">
                                                <img src="<?php echo base_url(); ?>images/image_dark_64x64.png" class="media-object img-polaroid" alt="Image">
                                            </a>
                                            <div class="media-body">
                                                <!--<form class="form-horizontal" onsubmit="return false;">-->
                                                <?php echo form_open('csad/c_sad/addcomment'); ?>

                                                <div class="control-group">
                                                    <textarea name="chat_message" id="example-textarea-large" class="textarea-large textarea-elastic" rows="4"></textarea>
                                                </div>
                                                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />

                                                <div class="control-group">
                                                    <input value="تعليق" style="padding:10px;" class="btn btn-success" type="submit"> 
                                                </div>

                                                <?php echo form_close(); ?>
                                                <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <footer>
                      </footer>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>js/jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"/*tpa=http://pixelcave.com/demo/uadmin/js/vendor/jquery-1.8.3.min.js*/%3E%3C/script%3E'));</script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/plugins-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/plugins-1.2.js"></script>

    </body>
</html>