<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!--
        
        -->
        <meta charset="UTF-8">
        <title>السوق</title>
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


        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" ></script>
        <style type="text/css">
            body{font-family:myfont;text-align:right}
            .thumbnail{height:350px;}
            .thumbnail a{color:#036}

        </style>
    </head>
    <body>
        <div id="page-container">
            <?php include 'tempelet/head_page.php'; ?>
            <?php include 'tempelet/main_menu.php'; ?>
            <div id="page-content">
                <ul id="nav-info"  class="clearfix" style="text-align:right">


                    <li class="active" style="text-align:right;float:right">
                        <a href="<?php echo base_url() ?>site/market">الخدمات</a> <i class="icon-shopping-cart"></i> </li>

                </ul>
                <?php include 'header2.php'; ?>
                <!---------------------------- start of content---------------------------------------->
                  <div class="page-header page-header-top clearfix" style="height:30px" >
<div class="btn-group pull-right" style="padding:0px;margin:0 0 0 5px;">
<a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href=""> <i class="icon-angle-down" style="padding-top:5px;"></i> ترتيب علي حسب</a>
<ul class="dropdown-menu pull-right" style="width:130px;">
<li ><a href="<?php echo base_url(); ?>site/market_date/">التاريخ <i class="icon-circle"></i></a></li>
<li><a href="<?php echo base_url(); ?>site/market_order/">الطلب <i class="icon-circle"></i></a></li>
<li><a href="<?php echo base_url(); ?>site/market_rate/">التقيم <i class="icon-circle"></i></a></li>

</ul>
</div>
<div >
 <?php echo form_open('site/price_market',array('id'=>'form-validation'));  ?>
<div class="input-append" >
<button style="text-align:left;padding:4px;margin-top:-1px;"><i class="icon-search"></i></button>
<input type="text" name="price2" style="text-align:right;background:#fff;width:70px;margin-left:2px;" placeholder="...الي " />
<input type="text" name="price1" style="text-align:right;background:#fff;width:70px;margin-left:5px;" placeholder="...السعر من " />

</div>
<?php echo form_close();?>
</div>

<div style="float:left;position:absolute;margin-top:-60px;">
 <?php echo form_open('search/search_market',array('id'=>'form-validation'));  ?>
<div class="input-append" >
<button style="text-align:left;padding:4px;margin-top:-1px;"><i class="icon-search"></i></button>

<input type="text" name="keywords" style="text-align:right;background:#fff;width:200px;" placeholder="...البحث في السوق " />

</div>
<?php echo form_close();?>
</div>
</div>
                <style>
                    .img-markt-details{
                        width: 200px;
                        height: 150px;
                    }
                </style>
                <ul class="thumbnails" data-toggle="gallery-options">
                 <?php if (!isset($filter_prices)) { ?>
                            <?php if (!isset($filter_rate)) { ?>
                                <?php if (!isset($filter_date)) { ?>
                                    <?php if (!isset($filter_order)) { ?>
                    <?php
					
					
                    if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                        $c_id = $this->uri->segment(3);
                        $sc_id = $this->uri->segment(4);
                        $sql = 'SELECT id,c_id, name, price_point, left( detail, 100 )  AS detail, photo_name, c_id, sc_id FROM service where sc_id=' . $sc_id;
                        $query = $this->db->query($sql);
                    } else if ($this->uri->segment(3) != '') {
                        $c_id = (int) $this->uri->segment(3);
                        $sql = 'SELECT id,c_id, name, price_point, left( detail, 100 )  AS detail, photo_name, c_id, sc_id FROM service where c_id=' . $c_id;
                        $query = $this->db->query($sql);
                    } else {
                        $sql = 'SELECT id,c_id, name, price_point, left( detail, 100 )  AS detail, photo_name, c_id, sc_id FROM service';
                        $query = $this->db->query($sql);
                    }
                    if (isset($query)) {
                        if ($query->num_rows() > 0) {
                            $rows = $query->result();
                            foreach ($rows as $row) {
                                ?>
                                <li class="span4" style="width: 200px; margin: 20px; padding: auto;">
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
                            <h3 style="float:right;color:#fff;width:800px;text-align:center">لا توجد نتائج بحث يرجى أعاده المحاولة</h3> 
                            <?php
                        }
                    }
					}}}}
                    ?>
                    
                     <!--------------------------------------->
                 <?php 
                       if (isset($filter_date)) {
                         if (!isset($filter_rate)) { 
						if (!isset($filter_order)) { 
						if (!isset($filter_prices)) { 
                            foreach ($filter_date as $row) {
                                ?>
                                <li class="span4" style="width: 200px; margin: 20px; padding: auto;">
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
                            <h3 style="float:right;color:#fff;width:800px;text-align:center">لا توجد نتائج بحث يرجى أعاده المحاولة</h3> 
                            <?php
                        }
                    }}}
					
                    ?> 
          <!------------------------------>
                    
                    <?php 
                       if (isset($filter_order)) {
                        if (!isset($filter_rate)) { 
						if (!isset($filter_date)) { 
						if (!isset($filter_prices)) { 
                            foreach ($filter_order as $row) {
                                ?>
                                <li class="span4" style="width: 200px; margin: 20px; padding: auto;">
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
                            <h3 style="float:right;color:#fff;width:800px;text-align:center">لا توجد نتائج بحث يرجى أعاده المحاولة</h3> 
                            <?php
                        }
						}}}
					
                    ?>  
             
                 <!------------------------------>
                    
                    <?php 
                       if (isset($filter_rate)) {
                        if (!isset($filter_order)) { 
						if (!isset($filter_date)) { 
						if (!isset($filter_prices)) { 
                            foreach ($filter_rate as $row) {
                                ?>
                                <li class="span4" style="width: 200px; margin: 20px; padding: auto;">
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
                            <h3 style="float:right;color:#fff;width:800px;text-align:center">لا توجد نتائج بحث يرجى أعاده المحاولة</h3> 
                            <?php
                        }
						}}}
					
                    ?>   
                <!------------------------------>
                    
                    <?php 
                       if (isset($filter_prices)) {
                        if (!isset($filter_order)) { 
						if (!isset($filter_date)) { 
						if (!isset($filter_rate)) { 
                            foreach ($filter_prices as $row) {
                                ?>
                                <li class="span4" style="width: 200px; margin: 20px; padding: auto;">
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
                            <h3 style="float:right;color:#fff;width:800px;text-align:center">لا توجد نتائج بحث يرجى أعاده المحاولة</h3> 
                            <?php
                        }
						}} }
						
						?>
					
                   
         
              
              
              
                </ul>
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