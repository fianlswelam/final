<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>
<!--


-->
<meta charset="UTF-8">
<title>الصفحه الرئيسيه| شلينات دوت كوم</title>
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
<link rel="stylesheet" href="<?php echo base_url();?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">
<script src="<?php echo base_url();?>js/modernizr-2.6.2-respond-1.1.0.min.js" ></script>


 <link rel="stylesheet" href="<?php echo base_url(); ?>themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/sstyle.css" type="text/css" media="screen" />
</head>

<style type="text/css">
#page-content{margin:0px  0 0 0px; padding:20px; background-color:#fff; border-left:1px solid #ccc; min-height:1200px;}
body{text-align:right;font-family:myfont;}
footer{ line-height:30px; text-align:center; font-size:14px; height:30px; padding:0 20px; background-color:#f6f6f6; border-top:1px solid #ccc; border-left:1px solid #ccc; margin:0 0 0 0px; color:#555}
#wrapper{width:70%;height:400px;margin-bottom:20px}
#wrapper img{width:100%;height:400px;}
#video{width:70%;height:400px;}
#login{padding:20px 25px 0px 20px ;width:25%;height:380px;border-top:1px solid #eee; border:1px solid #eee; background-color:#f9f9f9}
#login1{ border:1px solid #eee; background-color:#f9f9f9;padding-top:10px;}
#login2{ border:1px solid #eee; background-color:#f9f9f9;margin-top:10px;}
.thumbnail{height:350px;}
.thumbnail a{color:#036}
.img-markt-details{
                        width: 200px;
                        height: 150px;
                    }
			 li{list-style:none}
#page-content{width:97.5%;float:left;padding:20px;background-color:#fff; border-left:1px solid #ccc; min-height:1200px;}			 
</style>
<body >
<div id="page-container" >
<?php include('tempelet/head_page.php') ;?>
<div id="inner-container" >
<div id="page-content" >
<div 
<?php include('header2.php')?>
</div>
<div style="clear:both"></div>

 <div id="login" style="float:right">
 <div id="login1">
    <?php echo form_open('site/login_validation',array('id'=>'form-validation'));  ?>
    <div style="color:#F00;margin-right:140px;">
									 <?php if(isset($sent)){echo '<p style="color:#3C3;">'.$sent.'</p>' ;}else{ 
                                                                             echo validation_errors()  ;} ?></div>
<div class="form-box-content">            
<div class="control-group">

<label class="control-label" for="val_username">* اسم العضو </label>
<div class="controls">
<div class="input-prepend">

<input type="text" id="val_username" name="username" value="<?php echo $this->input->post('username') ; ?>" >
<span class="add-on"><i class="icon-user"></i></span>
</div>
</div>
</div>
<div class="control-group">
<label class="control-label" for="val_email"> * كلمه السر  </label>
<div class="controls">
<div class="input-prepend">

<input type="password" id="val_email" name="password" value="<?php echo $this->input->post('password') ; ?>" >
<span class="add-on"><i class="icon-asterisk"></i></span>
</div>
</div>
</div>


<div class="form-actons">

<button type="submit" class="btn btn-success"><i class="icon-ok"></i> تسجيل الدخول</button>
</div>
</div>

</div>
</form>
<div id="login2" >
<p style="font-size:14px;color:#000;padding:10px;text-align:right">
أيتها المُنتقبة، لا تجعليني أكرهك، نعم أكرهك :
• عندما أرى وجهَكِ مستترًا و كفّيكِ و قدميكِ ظاهرتين.
• عندما أراك تبحثين عن أقل أنواع النقاب سترًا وأكثرِها زينةً.
• عندما ترسمين عينيك وحاجبيك بالمكياج فتكونين أشد فتنة من السافرات.
</p>
</div>
</div>


 <div id="wrapper" style="float:left">
      
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="<?php echo base_url(); ?>images/toystory.jpg" data-thumb="images/toystory.jpg" height="400" alt="" />
                <img src="images/up.jpg" data-thumb="images/up.jpg" alt=""  height="400" />
                <img src="<?php echo base_url(); ?>images/walle.jpg" data-thumb="images/walle.jpg" alt="" data-transition="slideInLeft" height="400" />
                <img src="<?php echo base_url(); ?>images/nemo.jpg" data-thumb="images/nemo.jpg" alt="" height="400" />
            </div>
            
        </div>

    </div>
    <div style="clear:both"></div>
   <div id="video" style="float:right;margin-bottom:20px;">
   <iframe id="video" src="http://www.youtube.com/embed/_rrKjUFji8A?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
   </div>
   <div style="clear:both"></div>
   <div class="dash-tiles row-fluid" style="text-align:right;font-family:myfont;font-size:20px;font-weight:bold;float:left;margin-top:-420px;"  >



<div class="span3">
<div class="dash-tile dash-tile-oil clearfix">
<div class="dash-tile-header">
<div class="dash-tile-options">
<div class="btn-group">

</div>
</div>
 العروض والهدايا
</div>

<div class="dash-tile-text"></div>
<p style="font-size:14px;padding-top:7px;color:#fff">
أيتها المُنتقبة، لا تجعليني أكرهك، نعم أكرهك :
• عندما أرى وجهَكِ مستترًا و كفّيكِ و قدميكِ ظاهرتين.
• عندما أراك تبحثين عن أقل أنواع النقاب سترًا وأكثرِها زينةً.
• عندما ترسمين عينيك وحاجبيك بالمكياج فتكونين أشد فتنة من السافرات.
</p>
</div>
<div class="dash-tile dash-tile-dark clearfix">
<div class="dash-tile-header">
<div class="dash-tile-options">

</div>
<a href="#">
المدونه
</a>
</div>
<div class="dash-tile-icon"></div>
<div class="dash-tile-text"></div>
<p style="font-size:14px;padding-top:7px;color:#fff">
أيتها المُنتقبة، لا تجعليني أكرهك، نعم أكرهك :
• عندما أرى وجهَكِ مستترًا و كفّيكِ و قدميكِ ظاهرتين.
• عندما أراك تبحثين عن أقل أنواع النقاب سترًا وأكثرِها زينةً.
• عندما ترسمين عينيك وحاجبيك بالمكياج فتكونين أشد فتنة من السافرات.
</p>
</div>
</div>
<div class="span3">
<div class="dash-tile dash-tile-balloon clearfix">
<div class="dash-tile-header">
<div class="dash-tile-options">

</div>
الخدمات
</div>

<div class="dash-tile-text" ></div>
<p style="font-size:14px;padding-top:7px;color:#fff">
أيتها المُنتقبة، لا تجعليني أكرهك، نعم أكرهك :
• عندما أرى وجهَكِ مستترًا و كفّيكِ و قدميكِ ظاهرتين.
• عندما أراك تبحثين عن أقل أنواع النقاب سترًا وأكثرِها زينةً.
• عندما ترسمين عينيك وحاجبيك بالمكياج فتكونين أشد فتنة من السافرات.
</p>
</div>
<div class="dash-tile dash-tile-doll clearfix">
<div class="dash-tile-header">
<div class="dash-tile-options">

</div>
<a href="#">
العضويه
</a>
</div>

<div class="dash-tile-text"></div>
<p style="font-size:14px;padding-top:7px;color:#fff">
أيتها المُنتقبة، لا تجعليني أكرهك، نعم أكرهك :
• عندما أرى وجهَكِ مستترًا و كفّيكِ و قدميكِ ظاهرتين.
• عندما أراك تبحثين عن أقل أنواع النقاب سترًا وأكثرِها زينةً.
• عندما ترسمين عينيك وحاجبيك بالمكياج فتكونين أشد فتنة من السافرات.
</p>
</div>
</div>
</div>
  <div style="clear:both;"></div>
  <h2 style="text-align:right;margin:10px 0 20px 0;">تصفح بعض خدمات موقعنا   </h2>
 
  <?php 
   $sql = 'SELECT id,c_id, left( name, 16 ) as name, price_point, left( detail, 100 )  AS detail, photo_name, c_id, sc_id FROM service limit 5 ';
   $query = $this->db->query($sql);
  ?>
  <?php if (isset($query)) {
                        if ($query->num_rows() > 0) {
                            $rows = $query->result();
                            foreach ($rows as $row) {
                                ?>
                                <li class="span4" style="width: 200px;  padding: auto;float:right">
                                    <div class="thumbnail" style="height: 220px;">
                                        <a href="<?php echo base_url(); ?>site/market_deatils/<?php echo $row->id ?>/<?php echo $row->c_id; ?>">  
                                            <img class="img-markt-details" src="<?php echo base_url(); ?>imagesService/thumb/<?php echo $row->photo_name; ?>" height="100" >
                                        </a>
                                        <h4 style="color:#036"><?php echo $row->name ?></h4>
                                            <!--<p style="color:#036">تفاصيل للخدمه تفاصيل للخدمه تفاصيل للخدمه تفاصيل للخدم </p>-->
                                      
                                            <a  href="<?php echo base_url(); ?>site/market_deatils/<?php echo $row->id ?>/<?php echo $row->c_id; ?>" class="btn btn-warning">طلب الخدمة</a>
                                       
                                         <h4 style="color:#036;text-align:left;margin-top:-20px;padding-left:5px;"> <?php echo $row->price_point ?> <small style="text-align:left">شيلن</small></h4>
                                    </div>
                                </li>

                                <?php
                            }
                        } else {
                            ?>
                            <h3 style="float:right;color:#fff;width:800px;text-align:center">لا يوجد خدمات في السوق حاليا عفوا </h3> 
                            <?php
                        } }?>
                        
                  <div id="login2" >
                  
<p style="font-size:14px;color:#000;padding:10px;text-align:right;height:200px;width:30%">
أيتها المُنتقبة، لا تجعليني أكرهك، نعم أكرهك :
• عندما أرى وجهَكِ مستترًا و كفّيكِ و قدميكِ ظاهرتين.
• عندما أراك تبحثين عن أقل أنواع النقاب سترًا وأكثرِها زينةً.
• عندما ترسمين عينيك وحاجبيك بالمكياج فتكونين أشد فتنة من السافرات.
</p>
</div>      
    <script src="<?php echo base_url(); ?>js/jquery.min.js" ></script>
  
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    <div style="clear:both;margin-bottom:20px;"></div>
    
</div>
  
<?php include('footer.php'); ?>
</div>
</div>

<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"/*tpa=http://pixelcave.com/demo/uadmin/js/vendor/jquery-1.8.3.min.js*/%3E%3C/script%3E'));</script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/js-sensor=true.js" tppabs="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url(); ?>js/plugins-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/plugins-1.2.js"></script>
<script src="<?php echo base_url(); ?>js/main-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/main-1.2.js"></script><script>$(function(){$("#example-tabs a").click(function(e){e.preventDefault();$(this).tab("show")});$("#example-tabs2 a").click(function(e){e.preventDefault();$(this).tab("show")});$("#example-tabs3 a").click(function(e){e.preventDefault();$(this).tab("show")});var e=$("#example-progress-bar .bar");$("#example-progress-bar-button").click(function(){$(this).button("loading");var t=1;interval=setInterval(function(){e.css("width",t+"%");if(t>15)e.html(t*10+"/1000");if(t===33)e.removeClass("bar-danger").addClass("bar-warning");if(t===66)e.removeClass("bar-warning").addClass("bar-success");t++;if(t>100){clearInterval(interval);pbButton.html("Done!");e.html('<i class="icon-ok"></i>')}},50)})})</script>
<script type="text/javascript">
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