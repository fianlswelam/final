<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>تسويق الكتروني</title>

        <meta name="keywords" content="content">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">		
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/stylesheet.css" type="text/css" media="screen">


        <link rel="stylesheet" href="<?php echo base_url(); ?>css/prettyPhoto.css" type="text/css" >	
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen">



        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/common.css"  media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/atp_print.css"  media="print" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/atp.css-v6.css"  media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/TopTeaser.css" media="all" /> 
        <!-- template skin -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/skin.css" type="text/css" >	

        <link href="<?php echo base_url(); ?>css/ticker-style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js" type="text/javascript" ></script>

        <!-- prettyPhoto -->	
        <script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>js/setting-1.js" type="text/javascript"  ></script> 

        <!-- ui totop -->	

        <script src="<?php echo base_url(); ?>js/jquery.ticker.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/site.js" type="text/javascript"></script>




        <style type="text/css"> 
            .box img{width:250px;height:150px;}
            .user_profile{float:right;}

            ul li {
                list-style:none;
            }

            a {
                text-decoration:none;
                color:#00aff0;
            }
            a:hover {
                text-decoration:underline;
            }
            .blue {
                color:#00aff0;
            }
            .clearBoth {
                clear: both;
            }
            .testLayoutBox {
                background:white;
                min-height:300px;
            }
            .openHTMLModule h1,
            .openHTMLModule h2,
            .openHTMLModule h3,
            .openHTMLModule h4,
            .openHTMLModule h5,
            .openHTMLModule h6 {
                font-size:20px;
                margin-bottom:10px;
            }
            .openHTMLModule2 {
                font-family:Verdana,Arial,Helvetica,sans-serif;
                font-size:12px;
                min-height:1%;
                padding:15px 9px;
                background:white;
                border:1px solid #BEBEBE;
            }
            .player a{color:#fff}
            p .player{color:#fff}
            .scores p{color:#eeeeee}
            .scores a{color:#fff}
            .playerWrap p{color:#fff}
            #cphMain_phExtra_ctl00_ctl05_ctl01_Player1Label{color:#FFF}
            .drawItem{}
        </style>

    </head>
    <body>



        <!-- start of section top -->
        <section id="top">
            <div id="top-wrapp">
                <?php include('header.php') ?>
            </div>
        </section>
        <!-- end of section top -->
        <?php include 'tempelet/news.php'; ?>

        <div id="content">
            <div id="left" style="width:100%;padding:0px;min-height:700px;">
                <div id="profile_half1" style="padding:20px;">
                    <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php
        if (isset($pic)) {
            echo $pic;
        }
        ?>"   class="user_profile" width="190" height="160" />                  


                    <table width="400" id="user_data" border="">
                        <tr>
                            <td> <p id="user_name">
                                    <a href="<?php echo base_url(); ?>user/visit_profile/<?php
                         if (isset($user_id)) {
                             echo $user_id;
                         }
        ?>">
                                           <?php
                                           if (isset($username)) {
                                               echo $username;
                                           }
                                           ?></a></p></td>
                        </tr>
                        <tr>
                            <td>  
                                <?php
                                if (isset($owner)) {
                                    if ($owner == 'yes') {
                                        ?>
                                        <a href="<?php echo base_url(); ?>user/show_messages"  id="message"><span style="color:#F90">3</span> صندوق الرسائل</a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(); ?>user/messages/<?php
                                if (isset($recev_id)) {
                                    echo $recev_id;
                                }
                                        ?>"  id="message"> ارسال رساله</a>
                                       <?php
                                       }
                                   }
                                   ?>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            if (isset($owner)) {
                                if ($owner == 'yes') {
                                    ?>
                                    <td><a href="<?php echo base_url(); ?>user/edit_profile" id="edit">تعديل حسابي الشخصي</a></td>
    <?php
    }
}
?>
                        </tr>
                        <tr>
                            <td>  <p id="state"><?php
                                    if (isset($country)) {
                                        echo $country;
                                    }
?><span>,</span><?php
                                    if (isset($city)) {
                                        echo $city;
                                    }
?></p></td>
                        </tr>
                        <tr>
                            <td>  <a href="<?php echo base_url(); ?>user/user_tree/<?php
                                     if (isset($user_id)) {
                                         echo $user_id;
                                     }
?> " id="message">شجره الاعضاء</a></td>
                        </tr>
                        <tr>
                                <?php
                                if (isset($owner)) {
                                    if ($owner == 'yes') {
                                        ?>
                                    <td>
        <?php echo form_open_multipart('user/upload_pic'); ?>


                                        <div id='file_browse_wrapper'>
                                        <?php echo form_upload(array('id' => 'file_browse', 'name' => 'userfile')); ?>
                                        </div>


        <?php echo form_submit(array('id' => 'upload_button', 'name' => 'post_upload2'), 'تحميل'); ?>
        <?php echo form_close(); ?></td>
    <?php
    }
}
?> 
                        </tr>
                    </table>
                </div>

                <div id="refer">
                    <p>الرابط الخاص بك</p><p><?php echo base_url() . "user/user_tree/" . $user_id; ?></p>  
                    <p style="width:600px;text-align:right;">يمكنك استخدام هذا الرابط باعطائه للعضاء الجدد للتسجيل من خلاله لكي ينضمو الي شجرتك الخاصه بك حيث بعد اكتمال شجرتك بالاعضاء سوف تحصل علي هديمه من الموقع قيمتها </p>
                </div>
                <div id="clear"></div>

                <div id="wrapper" style="background-color:#5e8d03;margin-left:140px;padding:30px;width:800px;" >
                    <div id="navAdCol">


                    </div>
                    <div id="mainContentColWrap" style="background-color:#5e8d03;" >

                        <div id="mainContentColExtra" style="background-color:#5e8d03;">

                            <div id="drawDetailContainer" class="tournamentDetail" style="background-color:#5e8d03;color:#fff">
                                <h3>&nbsp;</h3>
                                <div class="drawBracketContainer" style="background-color:#5e8d03;">
                                    <table cellspacing="0" border="0" style="display:block;">
                                        <thead>
                                            <tr>
                                                <th>Round 1</th>
                                                <th>Round 2</th>
                                                <th>Round 3</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>

                                                <td class="col_1" width="264">
                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl00_DrawNodeDiv" class="drawItem first">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl00_Player1Link" class=" winner">Nadal, Rafael</a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl03_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl03_Player1Link">Souza, Joao</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl04_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl04_Player1Link">Kuznetsov, Andrey</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl05_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl05_Player1Link">Berlocq, Carlos</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl06_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl06_Player1Link">Garcia-Lopez, Guillermo</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl07_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" class=" winner">Ramos, Albert</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl08_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl08_Player1Link" class=" winner">Chardy, Jeremy</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl09_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl09_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl10_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl10_Player1Link">Mello, Ricardo</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl11_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl11_Player1Link">Alund, Martin</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl12_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl12_Player1Link">Gimeno-Traver, Daniel</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl13_DrawNodeDiv" class="drawItem even">


                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl13_Player1Link">Volandri, Filippo</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl14_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl14_Player1Link">Clezar, Guilherme</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl15_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl15_Player1Link" class=" winner">Bellucci, Thomaz</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl16_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl16_Player1Link" class=" winner">Andujar, Pablo</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl17_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl17_Player1Link">Giraldo, Santiago</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl18_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl18_Player1Link">Lorenzi, Paolo</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl19_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl19_Player1Link">Montanes, Albert</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl20_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl20_Player1Link">Robredo, Tommy</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl21_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#"  id="cphMain_phExtra_ctl00_ctl01_ctl21_Player1Link">Bolelli, Simone</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl22_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl22_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl23_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl23_Player1Link" class=" winner">Monaco, Juan</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl24_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl24_Player1Link" class=" winner">Fognini, Fabio</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl25_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl25_Player1Link">Pella, Guido</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl26_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#" id="cphMain_phExtra_ctl00_ctl01_ctl26_Player1Link">Nalbandian, David</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl27_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="" id="cphMain_phExtra_ctl00_ctl01_ctl27_Player1Link">Aguilar, Jorge</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl28_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#"  id="cphMain_phExtra_ctl00_ctl01_ctl28_Player1Link">Zeballos, Horacio</a>

                                                            </div>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl01_ctl29_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="">Capdeville, Paul</a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl30_DrawNodeDiv" class="drawItem">

                                                        <div class="playerWrap">
                                                            <div class="player">


                                                                <p id="cphMain_phExtra_ctl00_ctl01_ctl30_Player1Label">Bye</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl01_ctl31_DrawNodeDiv" class="drawItem even">

                                                        <div class="playerWrap">
                                                            <div class="player">

                                                                <a href="#">Almagro, Nicolas</a>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </td>
                                                <!-----------------------level2--------------------------->
                                                <td class="col_2" width="170">

                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl00_DrawNodeDiv" class="drawItem first">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl00_Player1Label" style="color:#fff" class="player">R. Nadal [1899]</p>

                                                        </div>

                                                    </div>



                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p  id="cphMain_phExtra_ctl00_ctl02_ctl01_Player1Label" style="color:#fff" class="player">J. Souza</p>

                                                        </div>


                                                    </div>



                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl02_Player1Label" style="color:#fff" class="player">C. Berlocq</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p  id="cphMain_phExtra_ctl00_ctl02_ctl01_Player1Label" style="color:#fff" class="player">J. Souza</p>

                                                        </div>


                                                    </div>



                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl02_Player1Label" style="color:#fff" class="player">C. Berlocq</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p  id="cphMain_phExtra_ctl00_ctl02_ctl01_Player1Label" style="color:#fff" class="player">J. Souza</p>

                                                        </div>


                                                    </div>



                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl02_Player1Label" style="color:#fff" class="player">C. Berlocq</p>

                                                        </div>


                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p  id="cphMain_phExtra_ctl00_ctl02_ctl01_Player1Label" style="color:#fff" class="player">J. Souza</p>

                                                        </div>


                                                    </div>



                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl02_Player1Label" style="color:#fff" class="player">C. Berlocq</p>

                                                        </div>


                                                    </div>
                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p  id="cphMain_phExtra_ctl00_ctl02_ctl01_Player1Label" style="color:#fff" class="player">J. Souza</p>

                                                        </div>


                                                    </div>



                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl02_Player1Label" style="color:#fff" class="player">C. Berlocq</p>

                                                        </div>


                                                    </div>


                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl03_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl03_Player1Label" style="color:#fff" class="player">A. Ramos [8]</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl04_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl04_Player1Label" style="color:#fff" class="player">J. Chardy [4]</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl05_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl05_Player1Label" style="color:#fff" class="player">M. Alund</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl06_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl06_Player1Label" style="color:#fff" class="player">F. Volandri</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl07_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl07_Player1Label" style="color:#fff" class="player">T. Bellucci [5]</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl08_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl08_Player1Label" style="color:#fff" class="player">P. Andujar [7]</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl09_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl09_Player1Label" style="color:#fff" class="player">A. Montanes</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl10_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl10_Player1Label" style="color:#fff" class="player">S. Bolelli</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl11_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl11_Player1Label" style="color:#fff" class="player">J. Monaco [3]</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl12_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl12_Player1Label" style="color:#fff" class="player">G. Pella</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl13_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl13_Player1Label" style="color:#fff" class="player">mohamed samy</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl02_ctl14_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl14_Player1Label" style="color:#fff" class="player">malah</p>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl02_ctl15_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl02_ctl15_Player1Label" style="color:#fff" class="player">temraz</p>

                                                        </div>


                                                    </div>
                                                </td>

                                                <td class="col_3" width="170">
                                                    <div id="cphMain_phExtra_ctl00_ctl03_ctl00_DrawNodeDiv" class="drawItem first">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl00_Player1Label" style="color:#fff" class="player">ahmed atia</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl03_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl01_Player1Label" style="color:#fff" class="player">mohamed temraz</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl03_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl02_Player1Label" style="color:#fff" class="player">hany mohamed</p>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl03_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl01_Player1Label" style="color:#fff" class="player">mohamed temraz</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl03_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl02_Player1Label" style="color:#fff" class="player">hany mohamed</p>

                                                        </div>




                                                    </div><div id="cphMain_phExtra_ctl00_ctl03_ctl03_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl03_Player1Label" style="color:#fff" class="player">ahmed samy</p>

                                                        </div>

                                                    </div><div id="cphMain_phExtra_ctl00_ctl03_ctl04_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl04_Player1Label" style="color:#fff" class="player">Mohamed saad</p>

                                                        </div>


                                                    </div><div id="cphMain_phExtra_ctl00_ctl03_ctl05_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl05_Player1Label" style="color:#fff" class="player">nader</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl03_ctl06_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl06_Player1Label" style="color:#fff" class="player">samy</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl03_ctl07_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl07_Player1Label" style="color:#fff" class="player">Tamer</p>

                                                        </div>


                                                    </div>
                                                    <div id="cphMain_phExtra_ctl00_ctl03_ctl06_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl06_Player1Label" style="color:#fff" class="player">samy</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl03_ctl07_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl03_ctl07_Player1Label" style="color:#fff" class="player">Tamer</p>

                                                        </div>


                                                    </div>

                                                </td>

                                                <!----------------------------level2------------------------------->



                                                <td class="col_4" width="170">
                                                    <div id="cphMain_phExtra_ctl00_ctl04_ctl00_DrawNodeDiv" class="drawItem first">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl04_ctl00_Player1Label" style="color:#fff" class="player">temraz</p>

                                                        </div>


                                                    </div>




                                                    <div id="cphMain_phExtra_ctl00_ctl04_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl04_ctl01_Player1Label" style="color:#fff" class="player">badran</p>

                                                        </div>

                                                    </div>





                                                    <div id="cphMain_phExtra_ctl00_ctl04_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl04_ctl02_Player1Label" style="color:#fff" class="player">mohamed gado </p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl04_ctl03_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl04_ctl03_Player1Label" style="color:#fff" class="player">mohamed sheir</p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl04_ctl02_DrawNodeDiv" class="drawItem">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl04_ctl02_Player1Label" style="color:#fff" class="player">mohamed gado </p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl04_ctl03_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl04_ctl03_Player1Label" style="color:#fff" class="player">mohamed sheir</p>

                                                        </div>


                                                    </div>





                                                </td>
                                                <!---------------------level 1-------------------------------->


                                                <td class="col_5" width="170">
                                                    <div id="cphMain_phExtra_ctl00_ctl05_ctl00_DrawNodeDiv" class="drawItem first">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl05_ctl00_Player1Label" style="color:#fff" class="player"><a href="#">mohamed temraz</a></p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl05_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl05_ctl01_Player1Label" style="color:#fff" class="player"><a href="#">mohamed malah</a></p>

                                                        </div>


                                                    </div>

                                                    <div id="cphMain_phExtra_ctl00_ctl05_ctl01_DrawNodeDiv" class="drawItem even">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl05_ctl01_Player1Label" style="color:#fff" class="player"><a href="#">mohamed malah</a></p>

                                                        </div>


                                                    </div>




                                                </td>



                                                <td class="col_6" width="170">
                                                    <div id="cphMain_phExtra_ctl00_ctl06_ctl00_DrawNodeDiv" class="drawItem first">
                                                        <div class="playerWrap">

                                                            <p id="cphMain_phExtra_ctl00_ctl06_ctl00_Player1Label" class="player"></p>

                                                        </div>
                                                        <div class="scores">
                                                            <a href="#" id="cphMain_phExtra_ctl00_ctl06_ctl00_ScoreLink"></a>

                                                        </div>

                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>



                        </div>


                    </div>
                </div>

            </div><!----------left----------->




        </div>


        <!-- end of section middle -->

        <!-- start of section bottom -->
<?php include('footer.php') ?>
        <!-- end of section bottom -->


    </body>
</html>