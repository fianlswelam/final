<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>
        <!--
        -->
        <meta charset="UTF-8">	
        <title>صفحة الرسائل
        </title><link rel="shortcut icon" href="img/favicon.ico">
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

  <script src="<?php echo base_url(); ?>js/jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
var base_url="<?php echo base_url();?>";
var from_id=" <?php echo $this->session->userdata('user_id') ;?> ";

var to_id="<?php echo $this->uri->segment(3);?>"



</script>
<script type="text/javascript" src="<?php echo base_url();?>js/chat.js" ></script>



    </head>

    <style type="text/css">
        body{font-family:myfont;text-align:right}
        #pic{width:50px;height:40px;}
        body{text-align:right;font-family:myfont;}
        .pull-left{float:right;padding-left:10px;}
        .content-text p{text-align:right}
        .table th {text-align:right;}
        .table tr td {text-align:right;}
		#profile{width:50px;height:50px}


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
                


                    <!------------------------------------->
<?php if(isset($segment)){?>   
                    <table class="table" style="width:70%;float:right;margin-right:10px;">
                        <thead>
                            <tr>

                                <th class="">فتح الرساله <i class="icon-bolt"></i></th>
                                <th class="hidden-phone">الرساله <i class="icon-envelope-alt"></i></th>


                                <th> المراسل <i class="icon-user"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                               
                             <?php if(isset($contacts)){ foreach($contacts as $contact){?>
                             <tr>
                                <td class="hidden-phone"><a href="<?php echo base_url();?>/user/show_messages/<?php echo $contact->id?>">افتح الرساله</a></td>
                                <td class="hidden-phone">الرساله</td>
                              
                                <td><a href="<?php echo base_url();?>/user/show_messages/<?php echo $contact->id?>"><?php echo $contact->username;?>  <i class="icon-user"></a></td>
                                         <?php }}else{ ?>
								   <li><a href="#">لا يوجد اعضاء ف شجرتك حتي الان</i></a></li>
                                   </tr>
								  <?php }?>
                                    
                                

                        </tbody>
                    </table>
                    <?php }else{?>
                    <!-------------------------------------------->
                    <!-------------------------------------------->




 <div style="clear:all"></div>
 <div class="row-flui" style="float:left;height:600px;" >
                        <div class="span8 offset2">
                            <div class="dash-tile dash-tile-dark no-opacity remove-margin">
                                <div class="dash-tile-header  ">الرسائل<i class="gemicon-small-pen"></i></div>
                                <div class="dash-tile-content">
                                    <div class="dash-tile-content-inner-fluid dash-tile-content-light" id="chatmessageinner" style="height:400px;overflow-y: scroll;
    overflow-x: hidden;">

                                        <!---------------------->

                             <?php if(!isset($segment)){?>            
                                                    
 <div class="media media-hover" id="messages_content">
                                                     
                         </div>
                                                    
                                                     <?php }else{?>
                                                     <h3 style="text-align:center">اختار احد الاعضاء من القائمه حتي تبدأ التحدث معه</h3>
                                                     <?php }?>
                                                      <div class="media media-hover">
                                            
                                      
                                               
                                                 
                                        <!---------------------->


                    <!------------------------------------->
                    <?php } ?>

                </div>
                
            </div>
            
                                        
                                        <div class="media media-hover">
                                            
                                            <div class="media-body">
                                             
                                                  <div class="control-group" style="height:30px;">

                                                <input type="submit" value="ارسال" style="padding:8px; margin-top:-10px;" id="message_button" class="btn btn-success"> 
                                                 <input type="text" id="msgbox" name="msgbox" style="width:90%;height:25px;"   />
                                                </div>

                                                <div class="control-group">
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
           
        </div>
    </div>
   
  
    <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"/*tpa=http://pixelcave.com/demo/uadmin/js/vendor/jquery-1.8.3.min.js*/%3E%3C/script%3E'));</script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/js-sensor=true.js" tppabs="http://maps.google.com/maps/api/js?sensor=true"></script>
  
  
     
</body>
</html>