<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>Employee Login</title>

        <meta name="keywords" content="content">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">		


<?php include 'tempelet/links.php';?>
    </head>
    <body>
        <?php include 'tempelet/header.php';?>
        <!-- start of wrapper -->

            <section id="">	
                <div class="container totop30">
                    <section id="middle">
                        <div id="content">
                            <div id="left" style="background:#111">       
                                <div class="featured_form">
                                    
                                    
                                    <?php echo form_open('csad/c_sad/valid_loign'); ?>
                                    <div class="heading center">
                                        <h4><span class="bold">تسجيل الدخول</span></h4>
                                        <div class="dotted"></div>
                                    </div>
                                    <ul>
                                        <li>
                                            <label for="name">اسم المستخدم</label>
                                            <?php echo form_input(array('name' => 'username', 'id' => "name", 'onblur' => "if(this.value=='')this.value='اسم المستخدم';", 'onfocus' => "if(this.value=='اسم المستخدم')this.value='';", 'value' => "اسم المستخدم")); ?>

                                        </li>

                                        <li>
                                            <label for="email">كلمه السر</label>

                                            <?php echo form_password(array('name' => 'password', 'id' => "password", 'onblur' => "if(this.value=='')this.value='البريد الالكتروني';", 'onfocus' => "if(this.value=='البريد الالكتروني')this.value='';", 'value' => "البريد الالكتروني")); ?>
                                        </li>
                                      </ul>
                                    <div class="centerdiv">
                                        <div class="cta-button optin small">
                                            <?php echo form_submit(array('name' => 'submit', 'class' => "cta1"), 'تسجيل') ?>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>


                                </div>
                            </div>	
                    </section>

                </div>		
            </section>
            <!-- end of section middle -->
        </div>
        <?php include 'tempelet/footer.php';?>
        <!-- end of wrapper -->

    </body>
</html>