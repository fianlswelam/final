<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>تسويق الكتروني</title>

        <meta name="keywords" content="content">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">		


        <link rel="stylesheet" href="<?php echo base_url(); ?>_css/stylesheet.css" type="text/css" media="screen">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>_css/angelina.css" type="text/css" >		
        <link rel="stylesheet" href="<?php echo base_url(); ?>_css/flexslider.css" type="text/css" >		
        <link rel="stylesheet" href="<?php echo base_url(); ?>_css/prettyPhoto.css" type="text/css" >	
        <link rel="stylesheet" href="<?php echo base_url(); ?>_css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>_css/style_login.css" type="text/css" media="screen">
        <!-- template skin -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>_css/skin.css"type="text/css" >	


 <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>_js/jquery.easing.1.3.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>_js/login.js" type="text/javascript" ></script>

        <!-- FlexSlider -->	
        <script src="<?php echo base_url(); ?>_js/jquery.flexslider.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>_js/function.js" type="text/javascript" ></script> 

        <!-- Ticker -->	
        <script src="<?php echo base_url(); ?>_js/ticker.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>_js/setting.js"  type="text/javascript" ></script> 

        <!-- prettyPhoto -->	
        <script src="<?php echo base_url(); ?>_js/jquery.prettyPhoto.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>_js/setting-1.js"type="text/javascript"  ></script> 

        <!-- ui totop -->	
        <script src="<?php echo base_url(); ?>_js/smoothscroll.js"  type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>_js/jquery.ui.totop.js"  type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>_js/setting-2.js"  type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>_js/functions.js"type="text/javascript"  ></script>
        <script type="text/javascript">
            var base_url=" <?php echo base_url(); ?>";
        </script>
        <script src="<?php echo base_url(); ?>_js/ajax.js"type="text/javascript"  ></script>


    </head>
    <body>

        <!-- start of wrapper -->
        <div id="wrapper">

            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <header>
                        <div class="container" >
                            <div  class="clearfix">
                                <div class="grid_4" style="float:left" >
                                    	
                                    <!-- Login Starts Here -->
                                    <div id="loginContainer">
                                        <a href="#" id="loginButton"><span>الدخول</span><em></em></a>
                                        <div style="clear:both"></div>
                                        <div id="loginBox">
                                            <?php include 'tempelet/login.php'; ?>
                                        </div>

                                        <!-- Login Ends Here -->



                                    </div>
                                </div>

                                <div class="grid_8" style="float:right;" >
                                    <!-- start navigation -->						
  		                            <?php include('header2.php') ?>
                                    <!-- End navigation -->	

                                </div>
                            </div>
                        </div>
                    </header>

                    <div id="featured" class="clearfix">
                        <div class="container">
                            <div id="intro" class="grid_12" style="float:right">
                                <?php
                                $this->db->where('name', 'main_title');
                                $this->db->from('block');
                                $query = $this->db->get();
                                if ($query->num_rows() > 0) {
                                    $rows = $query->result();
                                    foreach ($rows as $row) {
                                        echo '<h1><span>' . $row->content . '</span></h1>';
                                    }
                                }
                                ?>
                                <!--<h1> انت تحتاج الي <span>تحقيق الربح ؟؟</span>  وبدون مجهود ؟؟</h1>-->
                                <h3>
                                    <?php
                                    $this->db->where('name', 'second_title');
                                    $this->db->from('block');
                                    $query = $this->db->get();
                                    if ($query->num_rows() > 0) {
                                        $rows = $query->result();
                                        foreach ($rows as $row) {
                                            echo $row->content;
                                        }
                                    }
                                    ?>
                                    <!--"يوفر موقعنا لك ذالك وانت في بيتك"-->
                                </h3>
                            </div>
                            <div class="grid_7" style="float:left">
                                <!-- ********* flexslider ******** -->
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <img src="<?php echo base_url(); ?>_images/img-1.png"  alt="" class="scale-grid" />
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url(); ?>_images/img-2.png" alt="" class="scale-grid" />
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url(); ?>_images/img-3.png"  alt="" class="scale-grid" />
                                        </li>
                                    </ul>
                                </div>	
                                <!-- ********* Endflexslider ******** -->
                            </div>

                            <div class="grid_5 featured_text">
                                <p>
                                    <?php
                                    $this->db->where('name', 'slider_txt');
                                    $this->db->from('block');
                                    $query = $this->db->get();
                                    if ($query->num_rows() > 0) {
                                        $rows = $query->result();
                                        foreach ($rows as $row) {
                                            echo $row->content;
                                        }
                                    }
                                    ?>
                                </p>
<!--                                <p>
                                    الاعمال الصغيرة تكسبك المال من البيت, تكسبك دخل إضافي وتسمح لك بكسب المزيد من المال على الإنترنيت. إذا ما كنت تعيش في الجزائر, لبنان مصر, السعودية, الإمارات العربية المتحدة, قطر, عمان, البحرين, الكويت, المغرب, تونس, ليبيا, السودان, الأردن, سوريا, العراق أو أي مكان آخر يمكنك العمل في المنزل وكسب اموال اضافية مع فرص الأعمال الصغيرة.
                                </p>
                                <p>
                                    ضاعف ارباحك من خلال الانترنت واستفد من شهره موقعك وعدد زياراته واربح المال مع زوار ربح لن تحتاج بعد اليوم للبحث عن معلن لموقعك
                                    يدخل من بوابه كبيره ويمشي في الطرقه حتى وصل الى الغرفه السريه.. دفع الباب فإذا كل من في الغرفه ينظرون اليه بعيون مليئه بالترقب..
                                    هو ده يا باشا الخبير اللي بعتنا نجيبه
                                    هو ده اللي هيقفل اليوتيوب؟
                                    أيوه يا باشا..
                                    - يأخذ الشاب الخبير مكانه أمام شاشه حاسوب كبيره ويبدأ في الضغط على الأزرار ثم فجأه يصرخ..

                                </p>-->
                                <div class="cta-button big" style="float:left"><span class="text" style="float:left">$10</span><a href="<?php echo base_url(); ?>site/market" class="cta1">تصفح خدماتنا الان</a></div>


                            </div>	


                        </div>
                    </div>

                </div>
            </section>
            <!-- end of section top -->

            <!-- start of section middle -->
            <section id="middle">	
                <div class="container totop30">
                    <div class="row clearfix center">
                        <div class="grid_4 rotate">
                            <img src="<?php echo base_url(); ?>_images/circle-1.png"  alt="" class="rotate" />
                            <h3 class="spacer15">شجره الاعضاء <span class="bold"></span></h3>
                            <div class="clear"></div>
                            <img src="<?php echo base_url(); ?>_images/tree.png"   alt="" class="dummy scale-grid" />
                            <?php
                            $this->db->where('name', 'tree_txt');
                            $this->db->from('block');
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                foreach ($rows as $row) {
                                    echo $row->content;
                                }
                            }
                            ?>
<!--                            <p>
                                إمشي علي إللي هيوديك تفكيرك ليه و المهم خليك جرئ
                                حاول توصل فكرك للناس يمكن تقنعهم أو تلاقي ناس عندهم نفس الفكر و ساعتها هتبقوا أقوي
                            </p>-->
                        </div>
                        <div class="grid_4 rotate">
                            <img src="<?php echo base_url(); ?>_images/circle-2.png" alt="" class="rotate" />
                            <h3 class="spacer15">الخدمات <span class="bold"></span></h3>
                            <div class="clear"></div>
                            <img src="<?php echo base_url(); ?>_images/image-2.png"  alt="" class="dummy scale-grid" />
                            <p>
                                <?php
                                $this->db->where('name', 'service_txt');
                                $this->db->from('block');
                                $query = $this->db->get();
                                if ($query->num_rows() > 0) {
                                    $rows = $query->result();
                                    foreach ($rows as $row) {
                                        echo $row->content;
                                    }
                                }
                                ?>
                            </p>
    <!--                            <p>
                                    إمشي علي إللي هيوديك تفكيرك ليه و المهم خليك جرئ
                                    حاول توصل فكرك للناس يمكن تقنعهم أو تلاقي ناس عندهم نفس الفكر و ساعتها هتبقوا أقوي
                                </p>				-->
                        </div>
                        <div class="grid_4 rotate">
                            <img src="<?php echo base_url(); ?>_images/circle-3.png" alt="" class="rotate scale-grid" />
                            <h3 class="spacer15">حالات الاعضاء<span class="bold"></span></h3>
                            <div class="clear"></div>
                            <img src="<?php echo base_url(); ?>_images/image-3.png"  alt="" class="dummy" />
                            <p>
                                <?php
                                $this->db->where('name', 'user_txt');
                                $this->db->from('block');
                                $query = $this->db->get();
                                if ($query->num_rows() > 0) {
                                    $rows = $query->result();
                                    foreach ($rows as $row) {
                                        echo $row->content;
                                    }
                                }
                                ?>
                            </p>
<!--                            <p>
                                إمشي علي إللي هيوديك تفكيرك ليه و المهم خليك جرئ
                                حاول توصل فكرك للناس يمكن تقنعهم أو تلاقي ناس عندهم نفس الفكر و ساعتها هتبقوا أقوي
                            </p>				-->
                        </div>

                    </div>


                    <div class="row clearfix">
                        <div class="grid_12" >
                            <div class="title margintop20" style="float:right;border:none">
                                <h3 >ما يقدمه الموقع <span class="bold">لك</span> <span class="icon a">icon</span></h3>
                            </div>
                        </div>
                        <div class="grid_8">
                            <div class="grid_4 alpha">
                                <div class="row rotate">
                                    <img src="<?php echo base_url(); ?>_images/3.png" style="float:right"  alt="" class="left" />
                                    <h5>الهدايا</h5>
                                    <p>اللهم لا تعلق قلبى بما ليس لى واجعل لى فيما أحببت نصيباواللهم دبرلى فأنى لا أحســـــن التدبير
                                    </p>
                                  
                                </div>

                                <div class="rotate">
                                    <img src="<?php echo base_url(); ?>_images/2.png" style="float:right"  alt="" class="left" />
                                    <h5>العضويه</h5>
                                    <p>اللهم لا تعلق قلبى بما ليس لى واجعل لى فيما أحببت نصيباواللهم دبرلى فأنى لا أحســـــن التدبير
                                    </p>
                                  
                                </div>
                            </div>
                            <div class="grid_4 omega">
                                <div class="row rotate">
                                    <img src="<?php echo base_url(); ?>_images/1.png" style="float:right"  alt="" class="left" />
                                    <h5 style="text-align:right">المدونات</h5>
                                    <p style="text-align:right">اللهم لا تعلق قلبى بما ليس لى واجعل لى فيما أحببت نصيباواللهم دبرلى فأنى لا أحســـــن التدبير
                                    </p>
                                   
                                </div>
                                <div class="rotate">
                                    <img src="<?php echo base_url(); ?>_images/4.png"style="float:right"  alt="" class="left" />
                                    <h5>الخدمات</h5>
                                    <p>اللهم لا تعلق قلبى بما ليس لى واجعل لى فيما أحببت نصيباواللهم دبرلى فأنى لا أحســـــن التدبير
                                    </p>
                                   
                                </div>
                            </div>

                        </div>

                        <div class="grid_4" >
                            <div class="video">
                                <?php
                                $this->db->where('name', 'vido');
                                $this->db->from('block');
                                $query = $this->db->get();
                                if ($query->num_rows() > 0) {
                                    $rows = $query->result();
                                    foreach ($rows as $row) {
                                        ?>
                                        <iframe width="400" height="300" src="<?php echo $row->content; ?>" frameborder="0" allowfullscreen></iframe>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>



                    </div>		








                    <div class="row clearfix">
                        <div class="grid_12">
                            <div class="title">
                                <h3>تصفح بعض الخدمات <span class="bold">التي يقدمها الموقع</span> <span class="icon a">icon</span></h3>
                            </div>	
                        </div>
                        <div class="grid_3">
                            <div class="box">
                                <div class="box-image">
                                    <a href="<?php echo base_url(); ?>upload/img1.jpg"  data-pretty="prettyPhoto" title="تفاصيل الخدمه" class="thumb"><img src="<?php echo base_url(); ?>upload/img1.jpg" alt="" class="scale-grid"/></a>
                                </div>
                                <div class="box-desc center">
                                    <h5><a href="#"> تصميم موقع خلال خمس ايام</a></h5>
                                    <p>
                                        زى مقولتلك بقى متعملش اى بش تانى خالص لحد منا اخلص واقولك
                                    </p>
                                    <a href="#" id="ask">اطلب الخدمه</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid_3">
                            <div class="box">
                                <div class="box-image">
                                    <a href="<?php echo base_url(); ?>upload/img2.jpg"  data-pretty="prettyPhoto" title="تفاصيل الخدمه" class="thumb"><img src="<?php echo base_url(); ?>upload/img2.jpg" alt="" class="scale-grid"/></a>
                                </div>
                                <div class="box-desc center">
                                    <h5><a href="#">تصميم موقع خلال خمس ايام</a></h5>
                                    <p>
                                        زى مقولتلك بقى متعملش اى بش تانى خالص لحد منا اخلص واقولك
                                    </p>
                                    <a href="#" id="ask">اطلب الخدمه</a>
                                </div>
                            </div>			
                        </div>
                        <div class="grid_3">
                            <div class="box" >
                                <div class="box-image">
                                    <a href="<?php echo base_url(); ?>upload/img3.jpg" data-pretty="prettyPhoto[video]" title="تفاصيل الخدمه" class="thumb"><img src="<?php echo base_url(); ?>upload/img3.jpg"  alt="" class="scale-grid"/></a>
                                </div>
                                <div class="box-desc center">
                                    <h5><a href="#">تصميم موقع خلال خمس ايام</a></h5>
                                    <p>
                                        زى مقولتلك بقى متعملش اى بش تانى خالص لحد منا اخلص واقولك
                                    </p>
                                    <a href="#" id="ask">اطلب الخدمه</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid_3">
                            <div class="box">
                                <div class="box-image">
                                    <a href="<?php echo base_url(); ?>upload/img4.jpg"  data-pretty="prettyPhoto" title="تفاصيل الخدمه" class="thumb"><img src="<?php echo base_url(); ?>upload/img4.jpg"  alt="" class="scale-grid"/></a>
                                </div>
                                <div class="box-desc center">
                                    <h5><a href="#">تصميم موقع خلال خمس ايام</a></h5>
                                    <p>
                                        زى مقولتلك بقى متعملش اى بش تانى خالص لحد منا اخلص واقولك
                                    </p>
                                    <a href="#" id="ask">اطلب الخدمه</a>
                                </div>
                            </div>			
                        </div>					
                    </div>		

                    <div class="row clearfix">
                        <div class="grid_12">
                            <div class="framed center">


                            </div>	
                        </div>
                    </div>


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