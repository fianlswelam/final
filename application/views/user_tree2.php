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



        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/tree.css" media="all" /> 
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
          #tree ul li{color:#FFF;font-size:18px;padding-left:80px; }

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
                <div id="clear" style="margin-bottom:70px;"></div>

                <div id="tree">
                <ul id="big">
 <!------------------------- level 1--------------------------------->               
    <li id="level_1" style="border-bottom:2px  solid #ccc">
    <span class="Collapsable" id="sub_level1">item 1-1</span>
        <ul id="root">
      
         <ul>
            <li>
            <span class="Collapsable" id="sub_level3">item 1-3</span>
             <ul id="sub_level4" style="border-bottom:2px solid #ccc">
            <li >
            
            <span class="Collapsable">item 1-4</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 2</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>            
            </li>
            
            <li>
            <span class="Collapsable">item 3</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 4</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            </ul>
            
            </li>
            
            <li style="border-bottom:2px solid #ccc">
            <span class="Collapsable" id="sub_level3">item 2</span>
             <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span>
             <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 2</span>
             <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 3</span>
             <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            
            </li>
            <li>
          
             </ul>
            </li>
            
            <li id="test" style="border-bottom:2px solid #ccc">
            <span class="Collapsable" style="margin-top:330px;" id="sub_level3">item 3</span>
             <ul id="sub_level4">
            <li>
            <span class="Collapsable">item 1-4</span>
             <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 2</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 3</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 4</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
               <li>
            <span class="Collapsable">item 4</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
        </ul>
            
            </li>
            
          <li id="test" style="border-bottom:2px solid #ccc">
            <span class="Collapsable" style="margin-top:330px;" id="sub_level3">item 3</span>
             <ul id="sub_level4">
            <li>
            <span class="Collapsable">item 1-4</span>
             <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 2</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 3</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
            
            <li>
            <span class="Collapsable">item 4</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
               <li>
            <span class="Collapsable">item 4</span>
            <ul id="sub_level4">
            <li><span class="Collapsable">item 1-4</span></li>
            <li><span class="Collapsable">item 2</span></li>
            <li><span class="Collapsable">item 3</span></li>
            <li><span class="Collapsable">item 4</span></li>
            </ul>
            </li>
        </ul>
            
            </li>
               
        
      
    </ul>
    <!--------------------------------->
    </li>
    
  
    <!-------------------------- level 1 ------------------------------------>
    
    
   </ul>


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