<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>لوحة الأدمن</title>
        <?php include 'tempelet/links.php'; ?>
    </head>
    <style type="text/css">
        h3{font-weight: bold;text-align: right;}
        table tr td a{color: #fff;text-align: right; font-family: cursive; color: #000;}

    </style>
    <body>

        <div id="wrapper">
            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include('tempelet/header.php'); ?>
                </div>
            </section>
            <?php include 'tempelet/news.php'; ?>

            <div id="content">
                <div id="left">
                    <div id="profile_half1">
                        <div class="featured_form">
                        
									 <?php echo form_open('civou/c_sitead/edit_user_validation');  ?>
                                     
									<div class="heading center">
										<h4><span class="bold">يجب ادخال جميع البيانات بشكل صحيح</span></h4>
										<div class="dotted"></div>
									</div>
                                     <div style="color:#FC3;margin-right:140px;">
									 <?php if(isset($regist)){echo '<p style="margin-left:30px;color:#3C3;">'.$regist.'</p>' ;}else{ 
                                                                             echo validation_errors()  ;
									  } ?></div>
                                     
                                     
                                     <table width="750" border="0">
  
  <tr>
   
    <td> <?php echo form_input(array('name'=>'username','id'=>"email",'value'=>$this->input->post('username'))); ?></td>
     <td><label for="email">اسم المستخدم</label></td>
  </tr>
 
 
</table>

                                     
                                     
                                     
							
										<div class="centerdiv">
										<div class="cta-button optin small">
                                         <button type="submit" class="cta1">دخول</button>
                                      
											<span class="text"> من فضلك ادخل جميع بياناتك صحيحه لانه في حاله معرفه انها بيانات خاطئه يتم إيقاف العضويه تلقائيا</span>
											
										</div>
										</div>
									  <?php echo form_close();?>
								</div> 
                    </div>
                </div>
                <div id="right">
                    <?php include 'tempelet/menu.php'; ?>
                    <div id="clear"></div>
                    <?php include 'tempelet/serv_block.php'; ?>
                </div>
            </div>
            <?php include('tempelet/footer.php') ?>
        </div>
    </body>
</html>