<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>
        <!--
        
        -->
        <meta charset="UTF-8">
        <title>مدونه شلينات</title>
        <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="index, follow">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">

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
            <?php include 'tempelet/head_page.php'; ?>
            <div id="inner-container">
                <?php include 'tempelet/main_menu.php'; ?>
                <div id="page-content" >
                  <ul id="nav-info"  class="clearfix" style="text-align:right">
                           

                        <li class="active" style="text-align:right;float:right"><a href="">سوق خدمات شلينات</a> <i class="icon-book"></i> </li>
                    </ul>
                    <?php include('header2.php') ?>
                    <?php
                    if ($this->uri->segment(3) != '') {
                        $id = $this->uri->segment(3);
                        $this->db->from('service');
                        $this->db->where('id', $id);
                        $query = $this->db->get();
                        if ($query->num_rows() > 0) {
                            $rows = $query->result();
                            foreach ($rows as $row) {
                                
                            }
                        }
                    }
                    ?>
                    <div class=" sub-header" style="margin-top:-30px;">
                        <div class="row-fluid">
                            <div class="span8 offset2">
                                <h3><a href="<?php echo base_url(); ?>site/market_deatils/<?php echo $row->id ?>/<?php echo $row->c_id; ?>"><?php echo $row->name; ?></a><i class="icon-file"></i></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid"  >
                        <div class="span8 offset2">
                            <div class="dash-tile">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-success" data-toggle="tooltip" title="اضافه الي المفضله"><i class="icon-star"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <iframe  src="https://www.facebook.com/plugins/like.php?href
                                                     <?php echo base_url(); ?>site/blog_details/<?php
                                                     echo $id = $this->uri->segment(3);
                                                     ?>"
                                                     scrolling="no" frameborder="0" 
                                                     style="width:330px; height:50px"></iframe> </div>

                                    </div>

                                    <span class="label label-important">تمت الأضافة فى  : <?php echo $row->add_date; ?></span> 

                                </div>
                                <div class="dash-tile-content"  >
                                    <div class="dash-tile-content-inner-fluid dash-tile-content-light content-text">
                                        <p><img src="<?php echo base_url(); ?>imagesService/thumb/<?php echo $row->photo_name; ?>"   alt="Image" class="pull-left" > 

                                        <div class="row-fluid" >
                                            <div class="span6" style="float:right;margin-top:-10px;">
                                                <table id="example-datatables2" class="table table-striped table-bordered table-hover">


<!--                                                    <tr>
                                                        <td><span class="label label-important">Unapproved</span></td>
                                                        <td><a href="">مقدم الخدمه</a></td>
                                                        <td><li class="icon-user"></li></td>
                                                    </tr>-->



                                                    <tr>
                                                        <td><span class="label label-important"><?php echo $row->duration; ?> أيام</span></td>
                                                        <td><a href="#">مده انجاز الخدمه </a></td>
                                                        <td><li class="icon-time"></li></td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="label label-important"><?php echo $row->price_point; ?> شلن</span></td>
                                                        <td><a href="#">سعر الخدمه</a></td>
                                                        <td><li class="icon-money"></li></td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="label label-important"><?php echo $row->order_num; ?></span></td>
                                                        <td><a href="#">عدد الطلبات</a></td>
                                                        <td><li class="icon-asterisk"></li></td>
                                                    </tr>

<!--                                                    <tr>
                                                        <td><span class="label label-important">Unapproved</span></td>
                                                        <td><a href="#">تقيم الموظف</a></td>
                                                        <td><li class="icon-signal"></li></td>
                                                    </tr>-->

                                                    <tr>
                                                        <td><span class="label label-important"><?php echo $row->rate_up;?></span></td>
                                                        <td><a href="#">تقيم الخدمه</a></td>
                                                        <td><li class="icon-signal"></li></td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="label label-important"><?php echo substr($row->add_date, 0, 10); ?></span></td>
                                                        <td><a href="">تاريخ العرض</a></td>
                                                        <td><li class="icon-calendar"></li></td>
                                                    </tr>



                                                </table>


                                            </div>



                                        </div>
                                        <p>
                                            <?php echo $row->detail; ?>
                                        </p>

                                        <a href="<?php echo base_url(); ?>site/order/<?php echo $row->id ?>" class="btn-primary" style="padding:10px;margin:15px 0 15px 0" >اطلب الخدمه</a>

                                        <ul class="pager">
<!--                                            <li class="previous"><a href="javascript:void(0)" data-toggle="tooltip" title="Previous Article"><i class="icon-chevron-left"></i></a></li>
                                            <li class="next"><a href="javascript:void(0)" data-toggle="tooltip" title="Next Article"><i class="icon-chevron-right"></i></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        
                        <div class="span5 offset2">
                            
                        </div>
                        <div class="span3">
                            <div class="dash-tile dash-tile-leaf no-opacity">
                                <div class="dash-tile-header"> خدمات مشابهه <i class="icon-magic"></i></div>
                                <div class="dash-tile-content">
                                    <div class="dash-tile-content-inner-fluid dash-tile-content-light">
                                        <ul class="icons">

                                            <?php
                                            if (isset($same_topics1)) {
                                                foreach ($same_topics1 as $topic1) {
                                                    ?>
                                                    <li> <a href="<?php echo base_url(); ?>site/market_deatils/<?php echo $topic1->id . '/' . $topic1->c_id; ?>"><?php echo $topic1->name; ?></a> <i style="padding:0 0 0 10px;" class="icon-arrow-left"></i></li>
                                                    <?php
                                                }
                                            }
                                            if (isset($same_topics2)) {
                                                foreach ($same_topics2 as $topic1) {
                                                    ?>
                                                    <li> <a href="<?php echo base_url(); ?>site/market_deatils/<?php echo $topic1->id . '/' . $topic1->c_id; ?>"><?php echo $topic1->name; ?></a> <i style="padding:0 0 0 10px;" class="icon-arrow-left"></i></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8 offset2">
                            <div class="dash-tile dash-tile-dark no-opacity remove-margin">
                                <div class="dash-tile-header  ">التعليقات<i class="gemicon-small-pen"></i></div>
                                <div class="dash-tile-content">
                                    <div class="dash-tile-content-inner-fluid dash-tile-content-light">

                                        <!---------------------->

                                        <?php
                                        $this->db->where('post_id', $id);
                                        $this->db->where('on', "service");
                                        $this->db->where('parent', "0");
                                        $q = $this->db->get('comments');

                                        if ($q->num_rows() > 0) {
                                            $recordes = $q->result();
                                            foreach ($recordes as $record) {
                                                ?>
                                                <?php
                                                if ($record->u_type == 'user') {
                                                    $this->db->from('user');
                                                    $this->db->where('id', $record->u_id);
                                                    $user_query = $this->db->get();
                                                    if ($user_query->num_rows() > 0) {
                                                        $user_rows = $user_query->result();
                                                        foreach ($user_rows as $user_row) {
                                                            
                                                        }
                                                    }
                                                    ?>

                                                    <div class="media media-hover">
                                                        <a href="" class="pull-left">
                                                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $user_row->profile_pic; ?> " width="60" height="60" class="media-object img-polaroid" alt="Image">
                                                        </a>

                                                        <div class="media-body">
                                                            <h5 class="media-heading"> <small><span class="label label-info"><?php echo $record->date; ?></span> في</small> <a href="#">
                                                                    <?php echo $user_row->username; //$record->u_id;   ?>
                                                                </a></h5>
                                                            <p><?php echo $record->comment; ?></p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    $this->db->from('employee');
                                                    $this->db->where('id', $record->u_id);
                                                    $employe_query = $this->db->get();
                                                    if ($employe_query->num_rows() > 0) {
                                                        $employe_rows = $employe_query->result();
                                                        foreach ($employe_rows as $employe_row) {
                                                            ?>
                                                            <div class="media media-hover">
                                                                <a href="" class="pull-left">
                                                                    <img src="<?php echo base_url(); ?>images/image_dark_64x64.png" class="media-object img-polaroid" alt="Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h5 class="media-heading"> <small><span class="label label-info"><?php echo $record->date; ?></span> في</small> <a href="#">
                                                                            <?php echo 'أدمن' . $employe_row->username; // $record->u_id;   ?>
                                                                        </a></h5>
                                                                    <p><?php echo $record->comment; ?></p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <!---------------------->

                                        <!-------------------------------------------->
<!--                                        <div class="media media-hover">
                                            <a href="#" class="pull-left">
                                                <img src="<?php echo base_url(); ?>images/image_dark_64x64.png"  class="media-object img-polaroid" alt="Image">
                                            </a>
                                            <div class="media-body">
                                                <form class="form-horizontal" onsubmit="return false;">
                                                <?php
                                                echo form_open('site/addcomment');
                                                ?>
                                                <input type="hidden" name="type" value="service"/>
                                                <input type="hidden" name="post_id" value="<?php echo $id; ?>"/>
                                                <input type="hidden" name="sc_id" value="<?php echo $this->uri->segment(4); ?>"/>
                                                <input type="hidden" name="parent" value="0"/>
                                                <?php //echo form_textarea(array('name' => 'comment', 'id' => "comment"));   ?>

                                                <div class="control-group">
                                                    <textarea name="comment" id="example-textarea-large"  class="textarea-large textarea-elastic" rows="4"></textarea>
                                                </div>

                                                <div class="control-group">
                                                    <input type="submit" value="تعليق" style="padding:10px;"  class="btn btn-success"> 
                                                </div>
                                                <?php
                                                echo form_close();
                                                ?>
                                                </form>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <span id="year-copy"></span> &copy; <strong>uAdmin 1.2</strong> - Crafted with <i class="icon-heart"></i> by <strong><a href="javascript:if(confirm(%27http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave%27" tppabs="http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave" target="_blank">pixelcave</a></strong>
                </footer>
            </div>
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