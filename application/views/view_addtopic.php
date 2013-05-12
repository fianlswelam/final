<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>أضافة موضوع جديد</title>

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


        <?php include 'tempelet/ajax.php'; ?>
    </head>
    <body>

        <!-- start of wrapper -->
        <div id="wrapper">

            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include('header.php') ?>

                </div>
            </section>
            <!-- end of section top -->

            <!-- start of section middle -->
            <?php include 'tempelet/news.php'; ?>
            <section id="">	
                <div class="container totop30">
                    <section id="middle">
                        <div id="content">
                            <div id="left" style="background:#111">       
                                <div class="featured_form">
                                    <?php echo form_open('#'); ?>
                                    <div class="heading center">
                                        <h4><span class="bold">أضافة موضوع جديد للمدونة</span></h4>
                                        <div class="dotted"></div>
                                    </div>
                                    <ul>
                                        <li>
                                            <label for="name">عنوان الموضوع</label>
                                            <?php echo form_input(array('name' => 'title', 'id' => "name", 'onblur' => "if(this.value=='')this.value='اسم الموضوع';", 'onfocus' => "if(this.value=='اسم الموضوع')this.value='';", 'value' => "اسم الموضوع")); ?>

                                        </li>
                                        <li>
                                            <label for="name"> القسم</label>
                                            <div class="both">
                                                <select name="search_category"  id="search_category_id">
                                                    <option value="none" selected="selected" >اختار القسم الرئيسى</option>
                                                    <?php
                                                    $query = "select * from category";
                                                    $results = mysql_query($query);
                                                    while ($rows = mysql_fetch_assoc(@$results)) {
                                                        ?>
                                                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>		
                                            </div>

                                            <div class="both">
                                                <div id="show_sub_categories" align="center">
                                                    <img src="<?php echo base_url(); ?>images/loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
                                                </div>
                                            </div>
                                            <br clear="all" /><br clear="all" />
                                        </li>

                                        <li>
                                            <label for="name">الموضوع كاملا</label>
                                            <?php echo form_textarea(array('name' => 'discription', 'id' => "name", 'rows' => 5, 'cols' => 100)); ?>
                                        </li>
                                        <li>
                                            <label for="name">صوره للموضوع</label>
                                            <?php echo form_upload('userfile'); ?>

                                        </li>

                                    </ul>
                                    <div class="centerdiv">
                                        <div class="cta-button optin small">
                                            <?php echo form_button(array('name' => 'button', 'class' => "cta1"), 'تسجيل') ?>

                                            <span class="text"> من فضلك ادخل جميع بياناتك صحيحه لانه في حاله معرفه انها بيانات خاطئه يتم إيقاف العضويه تلقائيا</span>

                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>

                            <div id="right">

                                <div id="clear"></div>

                                <?php include 'tempelet/righ.php'; ?>
                            </div>	
                    </section>

                </div>		
            </section>
            <!-- end of section middle -->

            <!-- start of section bottom -->
            <?php include('footer.php') ?>
            <!-- end of section bottom -->

        </div>
        <!-- end of wrapper -->

    </body>
</html>