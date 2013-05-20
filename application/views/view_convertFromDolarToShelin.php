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

        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

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
            <?php include 'tempelet/head_page.php'; ?>
            <?php include 'tempelet/main_menu.php'; ?>
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
                        </ul>
                    </div>

                    <!------------------------------------->
                    <div>
                        <form method="post" action="<?php echo base_url(); ?>payment_user/fromDolarToShelin" >

                            <label class="control-label" for="val_email"> المبلغ بعد الخصم  </label>

                            <input type="text" name="amount"  />
                            <select name="bank_type">
                                <option value="payza">Payza</option>
                                <option value="paypal">paypal</option>
                            </select>
                            <input type="submit" value="حفظ">
                        </form>
                    </div>


                    <!------------------------------------->


                    <!------------------------------------->
                    <div>

                        <!-------------------------------------------------------------------------------->
                        <form method="post" action="https://secure.payza.com/checkout" >
                            <input type="hidden" name="ap_merchant" value="mohamedsaad2085@yahoo.com"/>
                            <input type="hidden" name="ap_purchasetype" value="Service"/>
                            <input type="hidden" name="ap_itemname" value="creidit"/>
                            <div class="control-group">
                                <label class="control-label" for="val_email"> *  المبلغ </label>
                                <div class="controls">
                                    <div class="input-prepend">
                                        <?php if (isset($res)) { ?>
                                        <input type="text" name="ap_amount"  id="val_email" value="<?php  echo $res;?>"readonly="readonly" />
                                        <?php } ?>
                                        <span class="add-on"><i class="icon-money"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!---------------------------------------------------------------------------->
                            <input type="hidden" name="ap_currency" value="USD"/>
                                    <!--<input type="hidden" name="ap_quantity" value="20"/>-->
<!--                                    <input type="hidden" name="ap_itemcode" value="XYZ123"/>
                                    <input type="hidden" name="ap_description" value="Service"/>-->
                            <input type="hidden" name="ap_returnurl" value="http://localhost/shelen/payment/okMessage">
                            <input type="hidden" name="ap_cancelurl" value="http://localhost/shelen/payment/cancelMessage"/>
                                    <!--<input type="hidden" name="ap_taxamount" value="2.49"/>-->
                                    <!--<input type="hidden" name="ap_additionalcharges" value="1.19"/>-->
                                    <!--<input type="hidden" name="ap_shippingcharges" value="7.99"/>--> 

                                        <!--<input type="hidden" name="ap_discountamount" value="4.99"/>--> 
                            <input type="hidden" name="apc_1" value="Blue"/>
                            <input type="image" src="https://www.payza.com/images/payza-buy-now.png"/>
                        </form>
                        <!-------------------------------------------->

                    </div>
                </div>
            </div>
            <footer>
                <span id="year-copy"></span> &copy; <strong>uAdmin 1.2</strong> - Crafted with <i class="icon-heart"></i> by <strong><a href="javascript:if(confirm(%27http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave%27" tppabs="http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave" target="_blank">pixelcave</a></strong>
            </footer>
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