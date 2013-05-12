<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

<meta charset="UTF-8">
<title>شلينات | الدعم الفني</title>
<meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
<meta name="author" content="pixelcave">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png">
<link rel="stylesheet" href="css-family=Roboto-400,400italic,700,700italic.css" >

<link rel="stylesheet" href="<?php echo base_url();?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">

<script src="<?php echo base_url();?>js/modernizr-2.6.2-respond-1.1.0.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<style type="text/css">
body{text-align:right;font-family:myfont;}
#control-group label{float:right}
#control-group input{float:left}
input{width:560px;}
input ,textarea,select{text-align:right}
</style>

</head>

<body>
<div id="page-container">
<?php include('tempelet/head_page.php') ;?>
<div id="inner-container">
<?php include('tempelet/main_menu.php')?>
<div id="page-content">
<ul id="nav-info"  class="clearfix" style="text-align:right">


<li class="active" style="text-align:right;float:right"><a href="<?php echo base_url(); ?>site/contact_us">الدعم الفني</a> <i class="icon-cogs"></i> </li>
</ul>

<?php include('header2.php')?>
<h3>للاستفسار عن اي معلومه او الابلاغ عن شكوي ما بالموقع ادخل البيانات التاليه من فضلك </h3>
<?php echo form_open('site/contact_validation',array('id'=>'form-validation'));  ?>
    <div style="color:#F00;margin-right:140px;">
									 <?php if(isset($sent)){echo '<p style="color:#3C3;">'.$sent.'</p>' ;}else{ 
                                                                             echo validation_errors()  ;} ?></div>
<div class="form-box-content">            
<div class="control-group">

<label class="control-label" for="val_username">* اسم العضو </label>
<div class="controls">
<div class="input-prepend">

<input type="text" id="val_username" name="name" value="<?php echo $this->input->post('name') ; ?>" >
<span class="add-on"><i class="icon-user"></i></span>
</div>
</div>
</div>
<div class="control-group">
<label class="control-label" for="val_email"> * البريد الالكتروني </label>
<div class="controls">
<div class="input-prepend">

<input type="text" id="val_email" name="email" value="<?php echo $this->input->post('email') ; ?>" >
<span class="add-on"><i class="icon-envelope"></i></span>
</div>
</div>
</div>








<div class="control-group">
<label class="control-label" for="val_website">* سبب المراسله </label>
<div class="controls">
<select id="val_skill" name="country">

<option value="">سبب المراسله </option>
<option value="شكوي">شكوي</option>
<option value="استفسار">استفسار</option>
<option value="تقديم فكره جديده">تقديم فكره جديده</option>
<option value="مشكله في الدفع">مشكله في الدفع</option>
<option value="سبب اخر">سبب اخر</option>


</select>
<div class="input-prepend">


<span class="add-on"><i class="icon-info-sign"></i></span>
</div>
</div>
</div>






<div class="control-group">
<label class="control-label" for="val_username">* الرساله  </label>
<div class="controls">
<div class="input-prepend">

<textarea style="width:560px;height:100px;resize:vertical;" name="message" ><?php echo $this->input->post('message') ; ?></textarea>
<span class="add-on"><i class="icon-pencil"></i></span>
</div>
</div>
</div>



<div class="form-actons">
<button type="reset" class="btn btn-danger"><i class="icon-repeat"></i> مسح</button>
<button type="submit" class="btn btn-success"><i class="icon-ok"></i> ارسال</button>
</div>
</div>
</form>
</div>

</div>
</div>

<script src="<?php echo base_url();?>js/jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url();?>js/jquery-1.8.3.min.js"/*tpa=http://pixelcave.com/demo/uadmin/js/vendor/jquery-1.8.3.min.js*/%3E%3C/script%3E'));</script>
<script src="<?php echo base_url();?>js/bootstrap.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/js-sensor=true.js" tppabs="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url();?>js/plugins-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/plugins-1.2.js"></script>
<script src="<?php echo base_url();?>js/main-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/main-1.2.js"></script><script>$(function(){$("#form-validation").validate({errorClass:"help-inline text-error",errorElement:"span",errorPlacement:function(e,t){t.parents(".controls").append(e)},highlight:function(e){$(e).closest(".control-group").removeClass("success error").addClass("error")},success:function(e){e.addClass("valid").closest(".control-group").removeClass("success error").addClass("success")},rules:{val_username:{required:true,minlength:2},val_password:{required:true,minlength:5},val_confirm_password:{required:true,minlength:5,equalTo:"#val_password"},val_email:{required:true,email:true},val_website:{required:true,url:true},val_date:{required:true,date:true},val_range:{required:true,range:[1,100]},val_number:{required:true,number:true},val_digits:{required:true,digits:true},val_skill:{required:true},val_credit_card:{required:true,creditcard:true},val_terms:{required:true}},messages:{val_username:{required:"Please enter a username",minlength:"Your username must consist of at least 2 characters"},val_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long"},val_confirm_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long",equalTo:"Please enter the same password as above"},val_email:"Please enter a valid email address",val_website:"Please enter your website!",val_date:"Please select a date!",val_range:"Please enter a number between 1 and 100!",val_number:"Please enter a number!",val_digits:"Please enter digits!",val_credit_card:"Please enter a valid credit card!",val_skill:"Please select a skill!",val_terms:"You must agree to the terms!"}})})</script>
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