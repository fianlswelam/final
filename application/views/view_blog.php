<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!--
        
        THIS IS THE DEMO VERSION OF THE TEMPLATE!
        COMMENTS ARE REMOVED, CODE IS COMPRESSED IN MANY PLACES AND CODE STYLE IS ALTERED!
        
        
        IN THE FULL VERSION, THE CODE IS INDENTED CORRECTLY AND WELL COMMENTED!
        
        
        THANKS FOR HAVING A LOOK!
        
        -->
        <meta charset="UTF-8">
        <title>المدونة</title>
        <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="index, follow">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">

        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style type="text/css">
            body{font-family:myfont;text-align:right}
            .row-fluid .span6 {float:right}
            .span6 img{float:right}
            .pull-left{float:right;padding-left:10px;}
            .media-heading a {color:#036}
            .media-heading p  {color:#111}
        </style>
    </head>
    <body>
        <div id="page-container">
            <?php include 'tempelet/head_page.php'; ?>
            <div id="inner-container">
                <?php include 'tempelet/main_menu_blog.php'; ?>
                <div id="page-content">
                    <ul id="nav-info"  class="clearfix" style="text-align:right">


                        <li class="active" style="text-align:right;float:right"><a href="#">مدونه شلينات</a> <i class="icon-book"></i> </li>
                    </ul>
                    <?php include('header2.php'); ?>
                      <div class="page-header page-header-top clearfix" style="height:30px">


<?php echo form_open('search',array('id'=>'form-validation'));  ?>
<div class="input-append" >
<button style="text-align:left;padding:4px;margin-top:-1px;"><i class="icon-search"></i></button>
<input type="text" name="keywords" style="text-align:right;padding-right:4px;background:#fff;width:500px;" placeholder="...بحث المدونه" />

</div>
<?php echo form_close();?>
</div>
                    <style type="text/css">
                        .img-blog{
                            width: 180px;
                            height: 150px;
                        }
                    </style>

                    <?php
//                        $this->load->model('sitead');
                    $this->db->order_by("date", "desc"); 
                    if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                        $c_id = $this->uri->segment(3);
                        $sc_id = $this->uri->segment(4);
                        $this->db->from('topic');
                        $this->db->where('statue', '1');
                        $this->db->where('sc_id', $sc_id);
                        $query = $this->db->get();
                    } else if ($this->uri->segment(3) != '') {
                        $c_id = (int) $this->uri->segment(3);
                        $this->db->from('topic');
                        $this->db->where('c_id', $c_id);
                        $this->db->where('statue', '1');
                        $query = $this->db->get();
                    } else {
                        $this->db->where('statue', '1');
                        $query = $this->db->get('topic');
                    }
					
                    if (isset($query)) {
                        if ($query->num_rows() > 0) {
                            $rows = $query->result();
                            $flag = 0;
                            //<!----------------------------------------------------------> 
                            foreach ($rows as $row) {
                                if ($flag == 0) {
                                    echo '<div class="row-fluid">';
                                }
                                ?>
                                <div class="span6">
                                    <div class="media media-hover push">
                                        <a href="<?php echo base_url(); ?>site/blog_details/<?php echo $row->id . '/' . $row->c_id; ?>" class="pull-left">
                                            <img  class="img-blog" src="<?php echo base_url(); ?>upload/topic/thumb/<?php echo $row->t_photo_name; ?>" width="200" height="170">
                                        </a>

                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="<?php echo base_url(); ?>site/blog_details/<?php echo $row->id . '/' . $row->c_id; ?>"><?php echo $row->title; ?></a><small><span class="label label-warning"><?php echo substr($row->date, 0, 10) ?></span></small></h4>
                                            
                                                <p style="height:60px;">
                                                    <?php echo substr($row->content, 0, 190); ?> ...
                                                   
                                                    <a href="<?php echo base_url(); ?>site/blog_details/<?php echo $row->id . '/' . $row->c_id; ?>"> اقراء المزيد</a>
                                                </p>
                                          
                                            <ul class="breadcrumb" style="margin:0px;">
                                                <?php
                                                $this->db->from('user');
                                                $this->db->where('id', $row->user_id);
                                                $user_query = $this->db->get();
                                                if ($user_query->num_rows() > 0) {
                                                    $user_rows = $user_query->result();
                                                    foreach ($user_rows as $user_row) {
                                                        
                                                    }
                                                }
                                                ?>
                                               


                                                <li><?php echo $row->num_seen; ?><span class="divider"><i class="icon-chevron-left"></i></span></li>
                                                <li class="active" style="padding-right:5px;margin-left:-5px;"><a href="#">عدد الزيارات </a></li>


                                                <?php
                                                $sqll = 'SELECT count(id) as count FROM `comments` WHERE `on`="blog" and `post_id`=' . $row->id;
                                                $count_comments = $this->db->query($sqll);
                                                if ($count_comments->num_rows() > 0) {
                                                    $count_comment = $count_comments->result();
                                                    foreach ($count_comment as $comment) {
                                                        
                                                    }
                                                }
                                                ?>
                                                <li><?php echo $comment->count; ?><span class="divider"><i class="icon-chevron-left"></i></span></li>
                                                <li class="active" style="padding-right:5px;margin-left:-5px;"><a href="#">عدد التعليقات </a></li>

                                                <?php
                                                //category name
                                                $this->db->from('blog_category');
                                                $this->db->where('id', $row->c_id);
                                                $blog_name = $this->db->get();
                                                $blog_name = $blog_name->result();
                                                foreach ($blog_name as $name) {
                                                    
                                                }
                                                ?>
                                                <li><?php echo $name->name; ?><span class="divider"><i class="icon-chevron-left"></i></span></li>
                                                <li class="active" style="margin-left:-5px;"><a href="#">الصنف</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($flag == 0) {
                                    $flag = 1;
                                } else {
                                    echo '</div>';
                                    $flag = 0;
                                }
                            }
                        }
                    }
                    ?>
                    <!---------------------------- loop ------------------------------------------->

                  </div> 
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