<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>
        <!--
        -->
        <meta charset="UTF-8">
        <title> صفحة 
            <?php
            if (isset($username)) {
                echo $username;
            }
            ?>
        </title>
        <link rel="stylesheet" href="css-family=Roboto-400,400italic,700,700italic.css" >

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">

        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    </head>

    <style type="text/css">
        body{font-family:myfont;text-align:right}
        #pic{width:50px;height:40px;}
    </style>
    <body>
        <div id="page-container">
            <?php include 'tempelet/head_page.php'; ?>
            <?php include 'tempelet/main_menu.php'; ?>
            <div id="page-content" style="width:81%">
                <ul id="nav-info"  class="clearfix" style="text-align:right">


                    <li class="active" style="text-align:right;float:right"><a href="#">الحساب الشخصي</a> <i class="icon-user"></i> </li>
                </ul>
                <?php include('header2.php') ?>
                <h3 class="page-header page-header-top">
                   <?php echo base_url();?>/site/user_register/<?php echo $id; ?> :

                    هو 
                    <?php
                    if (isset($username)) {
                        echo $username;
                    }
                    ?> الاين اب الخاص ب

                    <i class="icon-user"></i>  <small></small></h3>
                <div class="row-fluid">

                    <div class="span3" style="float:right">

                        <div class="text-center">
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php
                    if (isset($pic)) {
                        echo $pic;
                    }
                    ?>" alt="image" width="310" height="200">
                        </div>

                        <ul class="nav nav-tabs nav-stacked" >
                            
                            <?php
                            if (isset($owner)) {
                                if ($owner == 'yes') {
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>user/change_pic">تغير الصوره الشخصيه <i class="icon-camera"></i> </a></li>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($owner)) {
                                if ($owner == 'yes') {
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>user/show_messages"  id="message"><span style="color:#F90">3</span> صندوق الرسائل <i class="icon-envelope-alt"></i> </a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo base_url(); ?>user/messages/<?php
                            if (isset($recev_id)) {
                                echo $recev_id;
                            }
                                    ?>"  id="message"><i class="icon-envelope-alt"></i>  ارسال رساله</a></li>
                                           <?php
                                       }
                                   }
                                   ?>
                                   <?php
                                   if (isset($owner)) {
                                       if ($owner == 'yes') {
                                           ?>
                                    <li><a href="<?php echo base_url(); ?>user/post_topic">اضافه موضوع الي المدونه <i class="icon-book"></i> </a></li>
                                    <?php
                                }
                            }
                            ?>


                            <?php
                            if (isset($owner)) {
                                if ($owner == 'yes') {
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>user/edit_profile">تعديل حسابي الشخصي <i class="icon-paper-clip"></i> </a></li>
                                    <?php
                                }
                            }
                            ?>
                            <li><a href="<?php echo base_url(); ?>user/user_tree/<?php
                            if ($this->session->userdata('user_id')) {
                                echo $this->session->userdata('user_id');
                            }
                            ?>">شجره الاعضاء <i class="icon-sitemap"></i></a></li>
                        </ul>
                        <ul class="nav nav-tabs nav-stacked">
                            <?php
                            if (isset($owner)) {
                                if ($owner == 'yes') {
                                    ?>
                                    <li><a href="<?php echo base_url('payment/addCreditPage') ?>">ايداع رصيد <i class="icon-money"></i></a></li>
                                    <li><a href="<?php echo base_url('payment/withdraw') ?>" >  سحب رصيد  <i class="icon-money"></i></a></li>
                                    <li><a href="<?php echo base_url('payment/convertFromCreditToShelinat') ?>">تحويل من دولار  الي شلينات <i class="icon-money"></i></a></li>
                                    <li><a href="<?php echo base_url('payment/convertFromShelinToCredit') ?>">تحويل من شلنات  الي دولار  <i class="icon-money"></i></a></li>


                                    <?php
                                }
                            }
                            ?>

                        </ul></div>



                    <!------------------------------------->


                    <div class="span3" style="float:left;margin:0px;padding:0px;">
                        <div class="dash-tile dash-tile-2x">
                            <div class="dash-tile-header">
                                <div class="dash-tile-options">

                                </div>
                                الخدمات محجوزه  لم تنفذ
                            </div>
                            <div class="dash-tile-content">
                                <div class="dash-tile-content-inner scrollable-tile-2x">
                                    <?php
                                    $sql = "SELECT order.id as order_id,photo_name,name,price_point,e_id FROM `order` INNER JOIN `user` ON order.u_id = user.id INNER JOIN `service` ON order.s_id = service.id  where order.statu=0 and user.id=";
                                    if ($this->session->userdata('user_id')) {
                                        $sql.=$this->session->userdata('user_id');
                                        $sql.=' ORDER BY `order`.`start` DESC';
                                    }
                                    $q = $this->db->query($sql);
                                    if ($q->num_rows() > 0) {
                                        $res = $q->result();
                                        foreach ($res as $record) {
                                            ?>
                                            <h5 class="page-header-sub">
                                                <!--<a href="chat_service/<?php echo $record->order_id; ?>/<?php echo $record->e_id ?>">-->
                                                    <?php echo $record->name; ?>

                                                    <img id="pic" src="<?php echo base_url(); ?>imagesService/thumb/<?php echo $record->photo_name; ?>"  />
                                                <!--</a>-->
                                            </h5>
                                            <div class="progress progress-warning">
                                                <div class="bar" style="width: 100%"><i class="icon-time"></i> لم ينفذ</div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------------------------------------------->
                    <div class="span3" style="float:left">
                        <div class="dash-tile dash-tile-2x">
                            <div class="dash-tile-header">
                                <div class="dash-tile-options">

                                </div>
                                الخدمات المحجوزه وجاري تنفيذاها
                            </div>
                            <div class="dash-tile-content">
                                <div class="dash-tile-content-inner scrollable-tile-2x">
                                    <?php
                                    $sql = "SELECT order.id as order_id,photo_name,name,price_point,e_id FROM `order` INNER JOIN `user` ON order.u_id = user.id INNER JOIN `service` ON order.s_id = service.id  where order.statu=1 and user.id=";
                                    if ($this->session->userdata('user_id')) {
                                        $sql.=$this->session->userdata('user_id');
                                        $sql.=' ORDER BY `order`.`start` DESC';
                                    }
                                    $q = $this->db->query($sql);
                                    if ($q->num_rows() > 0) {
                                        $res = $q->result();
                                        foreach ($res as $record) {
                                            ?>
                                            <h5 class="page-header-sub">
                                                <a href="chat_service/<?php echo $record->order_id; ?>/<?php echo $record->e_id ?>"><?php echo $record->name; ?>
                                                    <img id="pic" src="<?php echo base_url(); ?>imagesService/thumb/<?php echo $record->photo_name; ?>"  />
                                                </a></h5>
                                            <div class="progress progress-info">
                                                <div class="bar" style="width: 100%"><i class="icon-asterisk icon-spin"></i> جارى التنفيذ </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span3" style="float:left;">
                        <div class="dash-tile dash-tile-2x">
                            <div class="dash-tile-header">
                                <div class="dash-tile-options">

                                </div>
                                الخدمات التي تم شرائها
                            </div>
                            <div class="dash-tile-content">
                                <div class="dash-tile-content-inner scrollable-tile-2x">
                                    <?php
                                    $sql = "SELECT order.id as order_id,photo_name,name,price_point,e_id FROM `order` INNER JOIN `user` ON order.u_id = user.id INNER JOIN `service` ON order.s_id = service.id  where order.statu=2 and user.id=";
                                    if ($this->session->userdata('user_id')) {
                                        $sql.=$this->session->userdata('user_id');
                                        $sql.=' ORDER BY `order`.`start` DESC';
                                    }
                                    $q = $this->db->query($sql);
                                    if ($q->num_rows() > 0) {
                                        $res = $q->result();
                                        foreach ($res as $record) {
                                            ?>
                                            <h5 class="page-header-sub">
                                                <a href="chat_service/<?php echo $record->order_id; ?>/<?php echo $record->e_id ?>"><?php echo $record->name; ?>

                                                    <img src="<?php echo base_url(); ?>imagesService/thumb/<?php echo $record->photo_name; ?>"  width="40" height="50"/>
                                                </a></h5>

                                            <div class="progress progress-success">
                                                <div class="bar" style="width: 100%"><i class="icon-ok"></i> تم التنفيذ </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------------------------------------------->

                    <!------------------------------------->

                </div>

            </div>

            <?php include('footer.php') ?>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>js/jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"/*tpa=http://pixelcave.com/demo/uadmin/js/vendor/jquery-1.8.3.min.js*/%3E%3C/script%3E'));</script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/js-sensor=true.js" tppabs="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo base_url(); ?>js/plugins-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/plugins-1.2.js"></script>
    <script src="<?php echo base_url(); ?>js/main-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/main-1.2.js"></script><script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-16158021-6']);
        _gaq.push(['_setDomainName', 'http://pixelcave.com/demo/uadmin/pixelcave.com']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www/') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>
</html>