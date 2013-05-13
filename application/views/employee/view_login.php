<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

        <meta charset="UTF-8">
        <title>uAdmin - Professional, Responsive and Flat Admin Template</title>
                <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">

        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" ></script>
   
    </head>
    <body class="login">
        <div id="login-container">
            <div id="login-logo" style="background-color: #5a5a5a;">
                <a href="">
                    <img src="<?php echo base_url(); ?>images/logo.png" alt="logo">
                </a>
            </div>
            <?php //echo form_open('csad/c_sad/valid_loign'); ?>
            <form style="display: block;" id="login-form" action="valid_loign" method="post" class="form-inline">
                <div class="control-group">
                    <a href="<?php echo base_url();?>" class="login-back"><i class="icon-arrow-left"></i></a>
                </div>
                <div class="control-group">
                    <div class="input-append">
                        <input id="login-email" placeholder="UserName.." type="text" name="username">
                        <span class="add-on"><i class="icon-envelope-alt"></i></span>
                    </div>
                </div>
                <div class="control-group">
                    <div class="input-append">
                        <input id="login-password" placeholder="Password.." type="password" name="password">
                        <span class="add-on"><i class="icon-asterisk"></i></span>
                    </div>
                </div>
                <div class="control-group remove-margin clearfix">
                    <div class="btn-group pull-right">
                        <button data-original-title="Forgot pass?" id="login-button-pass" class="btn btn-small btn-warning" data-toggle="tooltip" title=""><i class="icon-lock"></i></button>
                        <button class="btn btn-small btn-success"><i class="icon-arrow-right"></i> Login</button>
                    </div>
                    <div data-original-title="Remember me" class="input-switch switch-small pull-left has-switch" data-toggle="tooltip" title="" data-on="success" data-off="danger" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                        <div class="switch-off switch-animate"><input type="checkbox"><span class="switch-left switch-small switch-success"><i class="icon-ok icon-white"></i></span><label class="switch-small">&nbsp;</label><span class="switch-right switch-small switch-danger"><i class="icon-remove"></i></span></div>
                    </div>
                </div>
            </form>
        </div>
       
    </body>
</html>