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


body{text-align:right;font-family:myfont;}
table{float:right;width:100%;margin-bottom:50px;}

table tr td{color:#fff;font-size:20px;}
#level1 #td_level1{background:#636}
#level4 #td_level4{background:#663}
#level3 #td_level3{background:#630}
#level2 #td_level2{background:#666}
#tree{text-indent: -9999px; background:url(<?php echo base_url();?>images/tree.png); background-repeat:repeat-x;}

        </style>
    </head>
    <body>
        <div id="page-container">
            <?php include 'tempelet/head_page.php'; ?>
            <?php include 'tempelet/main_menu.php'; ?>
            <div id="page-content">
             <ul id="nav-info"  class="clearfix" style="text-align:right">




<li class="active" style="text-align:right;float:right" ><a href="<?php echo base_url(); ?>user/user_tree/<?php
if ($this->session->userdata('user_id')) {
    echo $this->session->userdata('user_id');
}
?>">شجره الاعضاء <i class="icon-sitemap"></i></a></li>
</ul>
                <?php include 'header2.php'; ?>
                <!---------------------------- start of content---------------------------------------->
      
<h3>للاستفسار عن اي معلومه او الابلاغ عن شكوي ما بالموقع ادخل البيانات التاليه من فضلك </h3>
 <table border="1">
            <td>
                <table border="1" id="level1">
                    <?php
                    $id=$this->session->userdata('user_id');
                    $this->db->where('parent_id', 10);
                    $this->db->from('user');
                    $query_level1 = $this->db->get();
                    if ($query_level1->num_rows() > 0) {
                        $rows_level1 = $query_level1->result();
                        foreach ($rows_level1 as $row_level1) {
                            ?>
                            <tr>
                                <td>
                                
                                    <table border="1" style="border-right:2px solid #fff" id="level2">
                                        <?php
                                        $this->db->where('parent_id', $row_level1->id);
                                        $this->db->from('user');
                                        $query_level2 = $this->db->get();
                                        if ($query_level2->num_rows() > 0) {
                                            $rows_level2 = $query_level2->result();
                                            foreach ($rows_level2 as $row_level2) {
                                                ?>
                                                                        <!--<tr><td><?php echo $row_level2->id; ?></td></tr>-->
                                                <tr>
                                                    <td >
                                                        <table border="1" id="level3">
                                                            <?php
                                                            $this->db->where('parent_id', $row_level2->id);
                                                            $this->db->from('user');
                                                            $query_level3 = $this->db->get();
                                                            if ($query_level3->num_rows() > 0) {
                                                                $rows_level3 = $query_level3->result();
                                                                foreach ($rows_level3 as $row_level3) {
                                                                    ?>
                                                                            <!--<tr><td><?php echo $row_level3->id; ?></td></tr>-->
                                                                    <tr>
                                                                        <td>
                                                                            <table border="1" id="level4">
                                                                                <?php
                                                                                $this->db->where('parent_id', $row_level3->id);
                                                                                $this->db->from('user');
                                                                                $query_level4 = $this->db->get();
                                                                                if ($query_level4->num_rows() > 0) {
                                                                                    $rows_level4 = $query_level4->result();
                                                                                    foreach ($rows_level4 as $row_level4) {
                                                                                        ?>
                                                                                        <tr><td id="td_level4"><?php echo $row_level4->id; ?> </td></tr>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </table>
                                                                        </td>
                                                                        <td id="td_level3"><?php echo $row_level3->id; ?> </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </table>
                                                    </td>
                                                    <td id="td_level2"><?php echo $row_level2->id; ?> </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </td>
                                <td id="td_level1"><?php echo $row_level1->id; ?> </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
<!--                    <tr><td>5</td></tr>
<tr><td>5</td></tr>
<tr><td>5</td></tr>-->
                </table>
            </td>
            <td width="160" style="color:#111">root<?php echo $this->session->userdata('user_id'); ?> </td>
            </tr>
        </table>


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