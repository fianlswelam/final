<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>تسويق الكتروني</title>

        <meta name="keywords" content="content">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">		


        <link rel="stylesheet" href="<?php echo base_url(); ?>css/stylesheet.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/angelina.css" type="text/css" >		
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" >		
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/prettyPhoto.css" type="text/css" >	
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen">
        <!-- template skin -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/skin.css"type="text/css" >	

        <link href="<?php echo base_url(); ?>css/ticker-style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js" type="text/javascript" ></script>

        <!-- FlexSlider -->	
        <script src="<?php echo base_url(); ?>js/jquery.flexslider.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>js/function.js" type="text/javascript" ></script> 
        <script src="<?php echo base_url(); ?>js/custom.js" type="text/javascript" ></script> 
        <!-- Ticker -->	
        <script src="<?php echo base_url(); ?>js/ticker.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>js/setting.js"  type="text/javascript" ></script> 

        <!-- prettyPhoto -->	
        <script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>js/setting-1.js"type="text/javascript"  ></script> 

        <!-- ui totop -->	
        <script src="<?php echo base_url(); ?>js/smoothscroll.js"  type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>js/jquery.ui.totop.js"  type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>js/jquery.ticker.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/site.js" type="text/javascript"></script>
        <style type="text/css"> 
            .box img{width:250px;height:150px;}
            a:hover{text-decoration:underline;}
            #mail_icon{background:#fff; padding:1px; border: 1px solid #ccc;-webkit-border-radius: 3px;
                       -moz-border-radius: 3px;
                       border-radius: 3px;}
            </style>

        </head>
        <body>

            <!-- start of wrapper -->
            <div id="wrapper">

            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include 'tempelet/header.php'; ?>
                </div>
            </section>
            <!-- end of section top -->

            <!-- start of section middle -->
            <?php
            include 'tempelet/news.php';
            ?>


            <div id="content">
                <div id="left" style="min-height:500px;">
                    <h3 style="float:right;color:#fff;width:800px;text-align:center">اخر الرسائل الوارده اليك</h3>                       


                    <?php
                    if (isset($user_messages)) {
                        foreach ($user_messages as $user_message) {
                            ?>


                            <div class="blog-one left" <?php if ($user_message->receiv_seen == 0) { ?> style="background:#333" <?php } else { ?>style="background:#111" <?php } ?> >
                                <a href="<?php echo base_url(); ?>user/visit_profile/<?php echo $user_message->id; ?>"><img id="mail_icon" src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $user_message->photo ?>" width="40" height="40" />	</a>
                                <p id="sender" style="color:#eeeeee;padding-right:5px;">  </p>
                                <p id="sender" style="padding:0 5px 0 5px;color:#3C6"><a style="color:#fff" id="user" href="<?php echo base_url(); ?>user/visit_profile/<?php echo $user_message->id; ?>"><?php echo $user_message->username; ?></a></p>

                                <p id="sender" style=""><a style="color:#FC0" href="<?php echo base_url(); ?>user/messages/<?php echo $user_message->sender_id; ?>"><?php echo $user_message->message; ?></a></p>
                                <p id="sender" style="color:#F90;">....</p>
                                <p id="sender" style="color:#fff;float:left;padding-left:20px;"><?php echo $user_message->timestamp; ?></p>
                            </div><!--/blog-one-->

                            <?php
                        }
                    } else {
                        ?>
                        <div style="color:#fff;font-size:30px; text-align:center;font-family:myfont">عفوا لا يوجد رسائل في صندوك الرسائل الخاص بك حاليا</div>
                    <?php } ?>



                </div>


                <div id="right">
                    <?php include 'tempelet/menu.php'; ?>

                    <div id="clear"></div>

                    <?php include 'tempelet/serv_block.php'; ?>
                </div>

            </div>


            <!-- end of section middle -->

            <!-- start of section bottom -->
            <?php include 'tempelet/footer.php'; ?>
            <!-- end of section bottom -->

        </div>
        <!-- end of wrapper -->

    </body>
</html>