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
       select{width:87%;}
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
                        
									 <?php echo form_open('civou/c_sitead/update_user_validation');  ?>
                                     
									<div class="heading center">
										<h4><span class="bold">يجب ادخال جميع البيانات بشكل صحيح</span></h4>
										<div class="dotted"></div>
									</div>
                                     <div style="color:#FC3;margin-right:140px;">
                                    <?php echo validation_errors()  ;?>
									 <?php if(isset($updated)){echo '<p style="margin-left:30px;color:#3C3;">'.$updated.'</p>' ;}else{ 
                                    if(isset($cant_get)){echo '<p style="margin-left:30px;color:#3C3;">'.$cant_get.'</p>' ;}            
									 }?></div>
                                     
                                     <?php if(isset($id)){?>
  <input type="hidden" name="id" value="<?php echo $id?>" />
    <input type="hidden" name="username" value="<?php echo $username?>" />
  <?php } ?>
                                     <table width="750" border="0">
  
  <tr>
  
    <td><?php if(isset($email)){ echo form_input(array('name'=>'email','id'=>"email",'value'=>$email ));} ?></td>
     <td><label for="email">البريد الالكتروني</label></td>
  </tr>
  <tr>
   
    <td>
     <?php $options = array(
                  ''  => 'اختار دولتك',
				  'الأردن'  => 'الأردن',
				  'الإمارات'=>'الإمارات',
                  'البحرين'=>'البحرين',
				  'السعودية'=>'السعودية',
				  'الجزائر'=>'الجزائر',
				  'السودان'=> 'السودان',
				  'الصومال'=>'الصومال',
				  'العراق'=>'العراق',
				  'الكويت'=>'الكويت',
				  'المغرب'=>'المغرب',
				  'اليمن'=>'اليمن',
				  'تونس'=>'تونس',
				  'جزر القمر'=>'جزر القمر',
				  'جيبوتي'=>'جيبوتي',
				  'سلطنة عمان'=>'سلطنة عمان',
				  'سوريا'=>'سوريا',
				  'فلسطين'=>'فلسطين',
				  'قطر'=>'قطر',
				  'لبنان'=>'لبنان',
				  'ليبيا'=>'ليبيا',
				  'مصر'=>'مصر',
				  'موريتانيا'=>'موريتانيا',
				  
		
                );

if(isset($country)){
echo form_dropdown('country', $options, $country);}
?>
    </td>
 <td><label for="email">الدوله</label></td>
  </tr>
  <tr>
    
    <td> <?php 
						 if(isset($city)){
						 echo form_input(array('name'=>'city','value'=>$this->input->post('city'),'value'=>$city));
						 }
						 ?></td>
    <td><label for="email">المدينه</label></td>
  </tr>
  <tr>
    
    <td>  <?php
						 if(isset($address)){
						 echo form_input(array('name'=>'address','value'=>$this->input->post('address'),'value'=>$address));} ?></td>
    <td><label for="email">العنوان</label></td>
  </tr>
  <tr>
   
    <td>
     <?php
						 if(isset($phone)){
						  echo form_input(array('name'=>'phone','value'=>$this->input->post('phone'),'value'=>$phone));} ?>
    
    </td>
     <td><label for="email">التليفون</label></td>
  </tr>
  <tr>
   
    <td>
     <?php
		if(isset($zip_code)){
		echo form_input(array('name'=>'zip_code','value'=>$this->input->post('zip_code'),'value'=>$zip_code)); }?>
    
    </td>
     <td><label for="email">الرقم البريدي</label></td>
  </tr>
  
   <tr>
   
    <td>
     <?php
		if(isset($amount_point)){
		echo form_input(array('name'=>'amount_point','value'=>$this->input->post('amount_point'),'value'=>$amount_point)); }?>
    
    </td>
     <td><label for="email"> الحساب بالنقط</label></td>
  </tr>
  
   <tr>
   
    <td>
     <?php
		if(isset($amount_money)){
		echo form_input(array('name'=>'amount_money','value'=>$this->input->post('amount_money'),'value'=>$amount_money)); }?>
    
    </td>
     <td><label for="email">الحساب  بالدولار</label></td>
  </tr>
 
</table>

                                     
                                     
                                     
							
										<div class="centerdiv">
										<div class="cta-button optin small">
                                         <button type="submit" class="cta1">تعديل</button>
                                      
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