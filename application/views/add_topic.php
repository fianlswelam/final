<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>
        <!--
        -->
        <meta charset="UTF-8">
        <title> اضافه موضوع|  
            <?php
            if (isset($username)) {
                echo $username;
            }
            ?>
        </title>
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
        <link rel="stylesheet" href="css-family=Roboto-400,400italic,700,700italic.css" >

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">

        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" ></script>
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
          
         <?php include 'tempelet/ajax.php'; ?>
         <?php include 'dbcon_blog.php'; ?>

    </head>

    <style type="text/css">
        body{font-family:myfont;text-align:right}
		#pic{width:50px;height:40px;}
		#form-validation{margin-left:-20px;}
		textarea{resize:vertical;}
		input ,textarea, select{width:400px}
		textarea{height:70px;}
    </style>
    <body>
        <div id="page-container">
            <?php include 'tempelet/head_page.php';?>
            <?php include 'tempelet/main_menu.php';?>
                <div id="page-content">
                    <ul id="nav-info"  class="clearfix" style="text-align:right">


                        <li class="active" style="text-align:right;float:right"><a href="#">الحساب الشخصي</a> <i class="icon-user"></i> </li>
                    </ul>
                    <?php include('header2.php') ?>
                    <h3 class="page-header page-header-top"><?php
                    if (isset($username)) {
                        echo $username;
                    }
                    ?> <i class="icon-user"></i>  <small><?php
                        if (isset($country)) {
                            echo $country;
                        }
                    ?></small></h3>
                    <div class="row-fluid">

                        <div class="span3" style="float:right;margin-left:20px;">

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
                                        <li><a href="<?php echo base_url('payment/convertFromCreditToShelinat') ?>" >  سحب رصيد  <i class="icon-money"></i></a></li>
                                        <li><a href="<?php echo base_url('payment/convertFromCreditToShelinat') ?>">تحويل من رصيد الي شلينات <i class="icon-money"></i></a></li>

                                        <?php
                                    }
                                }
                                ?>

                            </ul></div>



                        <!------------------------------------->

<div >

<?php echo form_open_multipart('user/validation_add_topic',array('id'=>'form-validation'));  ?>
    <div style="color:#F00;">
									 <?php if(isset($topic_added)){echo '<p class="alert alert-success" >'.$topic_added.'</p>' ;}else{ 
									 
                                                                             echo validation_errors()  ;} ?></div>

<div class="control-group">
<label class="control-label" for="val_email"> * صوره الموضوع </label>
<div class="controls">
<div class="input-prepend">

<input type="file" id="val_email" name="userfile"  >
<span class="add-on"><i class="icon-camera-retro"></i></span>
</div>
</div>
</div>

<div class="control-group">
<label class="control-label" for="val_email"> * عنوان الموضوع </label>
<div class="controls">
<div class="input-prepend">

<input type="text" id="val_email" name="topic_name" value="" >
<span class="add-on"><i class="icon-quote-right"></i></span>
</div>
</div>
</div>

<div class="control-group">
<label class="control-label" for="val_email"> * الموضوع </label>
<div class="controls">
<div class="input-prepend">

<textarea id="val_email" name="topic"  ></textarea>
<span class="add-on"><i class="icon-book"></i></span>
</div>
</div>
</div>




<div class="control-group">
<label class="control-label" for="val_website">* الوسوم </label>
<div class="controls">

<div class="input-prepend">

<textarea id="val_email" name="tags"  ></textarea>
<span class="add-on"><i class="icon-tags"></i></span>
</div>
</div>
</div>

<div class="control-group">
<label class="control-label" for="val_username"> القسم </label>
<div class="controls">
<div class="input-prepend">
 <div class="both" style="margin-left:113px;">

<select name="search_category"  id="search_category_id">
<option value="none" selected="selected" >اختار القسم الرئيسى</option>
			<?php
            $query = "select * from blog_category";
            $results = mysql_query($query);
            while ($rows = mysql_fetch_assoc(@$results)) {
                ?>
                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
            <?php }
            ?>
</select>
</div>
<span class="add-on"><i class="icon-pushpin"></i></span>
</div>
</div>

</div>

 <div class="both" style="float:right;margin-right:-3px">
<div id="show_sub_categories" align="right">
<img src="<?php echo base_url(); ?>images/loading11.gif"  id="loader" alt="" />
</div>
</div>



<div style="clear:top"></div>
<div class="form-action" style="float:right">
<button type="reset" class="btn btn-danger"><i class="icon-repeat"></i> مسح</button>
<button type="submit" class="btn btn-success"><i class="icon-ok"></i> تأكيد</button>
</div>
</div>
</form>
</div>
                        <!-------------------------------------------->

                        <!------------------------------------->

                    </div>
                </div>
                
            </div>
        </div>
       
        <script src="<?php echo base_url(); ?>js/jquery.min.js" ></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"%3E%3C/script%3E'));</script>
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