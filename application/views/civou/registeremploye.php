<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>لوحة الأدمن</title>
        <?php include 'tempelet/links.php'; ?>
    </head>
    <body>

        <div id="wrapper">
            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include('tempelet/header.php') ?>
                </div>
            </section>
            <?php include 'tempelet/news.php'; ?>

            <div id="content">

                <div id="left" style="background:#111">       
                    <div class="featured_form">
                        <?php echo form_open('#'); ?>
                        <div class="heading center">
                            <h4><span class="bold">يجب ادخال جميع البيانات بشكل صحيح</span></h4>
                            <div class="dotted"></div>
                        </div>
                        <ul>
                            <li>
                                <label for="name">اسم المستخدم</label>
                                <?php echo form_input(array('name' => 'username', 'id' => "name", 'onblur' => "if(this.value=='')this.value='اسم المستخدم';", 'onfocus' => "if(this.value=='اسم المستخدم')this.value='';", 'value' => "اسم المستخدم")); ?>

                            </li>

                            <li>
                                <label for="email">البريد الالكتروني</label>

                                <?php echo form_input(array('name' => 'email', 'id' => "email", 'onblur' => "if(this.value=='')this.value='البريد الالكتروني';", 'onfocus' => "if(this.value=='البريد الالكتروني')this.value='';", 'value' => "البريد الالكتروني")); ?>
                            </li>
                            <li>
                                <label for="email">الدوله</label>
                            </li> 
                            <li>

                                <label for="email">المدينه</label>

                                <?php echo form_input(array('name' => 'city', 'id' => "email", 'onblur' => "if(this.value=='')this.value='المدينه';", 'onfocus' => "if(this.value=='المدينه')this.value='';", 'value' => "المدينه")); ?>
                            </li> 
                            <li>

                                <label for="email">الرقم البريدي</label>

                                <?php echo form_input(array('name' => 'zip_code', 'id' => "email", 'onblur' => "if(this.value=='')this.value='الرقم البريدي';", 'onfocus' => "if(this.value=='الرقم البريدي')this.value='';", 'value' => "الرقم البريدي")); ?>
                            </li>

                            <li>
                                <label for="email">كلمه السر</label>

                                <?php echo form_password(array('name' => 'password', 'id' => "email", 'onblur' => "if(this.value=='')this.value='البريد الالكتروني';", 'onfocus' => "if(this.value=='البريد الالكتروني')this.value='';", 'value' => "البريد الالكتروني")); ?>
                            </li>
                            <li>
                                <label for="email">تأكيد كلمه السر</label>
                                <?php echo form_password(array('name' => 'cpassword', 'id' => "email", 'onblur' => "if(this.value=='')this.value='البريد الالكتروني';", 'onfocus' => "if(this.value=='البريد الالكتروني')this.value='';", 'value' => "البريد الالكتروني")); ?>
                            </li>
                        </ul>
                        <div class="centerdiv">
                            <div class="cta-button optin small">
                                <?php echo form_button(array('name' => 'button', 'class' => "cta1"), 'تسجيل') ?>

                                <span class="text"> من فضلك ادخل جميع بياناتك صحيحه لانه في حاله معرفه انها بيانات خاطئه يتم إيقاف العضويه تلقائيا</span>

                            </div>
                        </div>
                        <?php echo form_close(); ?>
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