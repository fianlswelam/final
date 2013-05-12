<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>تسويق الكتروني</title>

        <meta name="keywords" content="content">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">		


        <link rel="stylesheet" href="<?php echo base_url(); ?>css/stylesheet.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/angelina.css" type="text/css" >		
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" >		
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/prettyPhoto.css" type="text/css" >	
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen">
        <!-- template skin -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/skin.css"type="text/css" >	

        <link href="<?php echo base_url(); ?>css/ticker-style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js" type="text/javascript" ></script>


        <!-- prettyPhoto -->	
        <script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js" type="text/javascript" ></script> 	
        <script src="<?php echo base_url(); ?>js/setting-1.js"type="text/javascript"  ></script> 




        <script src="<?php echo base_url(); ?>js/site.js" type="text/javascript"></script>


    </head>
    <body>

        <!-- start of wrapper -->
        <div id="wrapper">

            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include('header.php') ?>
                </div>
            </section>
            <!-- end of section top -->
            <?php include 'tempelet/news.php'; ?>
            <div id="content">
                <div id="left">
                    <div class="featured_form">

                        <?php echo form_open('site/sign_user_validation'); ?>

                        <div class="heading center">
                            <h4><span class="bold">يجب ادخال جميع البيانات بشكل صحيح</span></h4>
                            <div class="dotted"></div>
                        </div>
                        <div style="color:#FC3;margin-right:140px;">
                            <?php
                            if (isset($regist)) {
                                echo '<p style="margin-left:30px;color:#3C3;">' . $regist . '</p>';
                            } else {
                                echo validation_errors();
                                if (isset($$country) && empty($country)) {
                                    echo '<p style="margin-left:500px;">يجب اختيار الدوله</p>';
                                }
                            }
                            ?></div>


                        <table width="750" border="0">

                            <tr>

                                <td> <?php echo form_input(array('name' => 'email', 'id' => "email", 'value' => $this->input->post('email'))); ?></td>
                                <td><label for="email">البريد الالكتروني</label></td>
                            </tr>
                            <tr>

                                <td>
                                    <?php
                                    $options = array(
                                        '' => 'اختار دولتك',
                                        'JO' => 'الأردن',
                                        'AE' => 'الإمارات',
                                        'BH' => 'البحرين',
                                        'SA' => 'السعودية',
                                        'DZ' => 'الجزائر',
                                        'SD' => 'السودان',
                                        'SO' => 'الصومال',
                                        'IQ' => 'العراق',
                                        'KW' => 'الكويت',
                                        'MA' => 'المغرب',
                                        'YE' => 'اليمن',
                                        'TN' => 'تونس',
                                        'KM' => 'جزر القمر',
                                        'DJ' => 'جيبوتي',
                                        'OM' => 'سلطنة عمان',
                                        'SY' => 'سوريا',
                                        'PS' => 'فلسطين',
                                        'QA' => 'قطر',
                                        'LB' => 'لبنان',
                                        'LY' => 'ليبيا',
                                        'EG' => 'مصر',
                                        'MR' => 'موريتانيا',
                                    );

                                    if (isset($country)) {
                                        echo form_dropdown('country', $options, $country);
                                    }
                                    ?>
                                </td>
                                <td><label for="email">الدوله</label></td>
                            </tr>
                            <tr>

                                <td> <?php
                                    if (isset($city)) {
                                        echo form_input(array('name' => 'city', 'value' => $this->input->post('city'), 'value' => $city));
                                    }
                                    ?></td>
                                <td><label for="email">المدينه</label></td>
                            </tr>
                            <tr>

                                <td>  <?php
                                    if (isset($address)) {
                                        echo form_input(array('name' => 'address', 'value' => $this->input->post('address'), 'value' => $address));
                                    }
                                    ?></td>
                                <td><label for="email">العنوان</label></td>
                            </tr>
                            <tr>

                                <td>
                                    <?php
                                    if (isset($phone)) {
                                        echo form_input(array('name' => 'phone', 'value' => $this->input->post('phone'), 'value' => $phone));
                                    }
                                    ?>

                                </td>
                                <td><label for="email">التليفون</label></td>
                            </tr>
                            <tr>

                                <td>
                                    <?php
                                    if (isset($zip_code)) {
                                        echo form_input(array('name' => 'zip_code', 'value' => $this->input->post('zip_code'), 'value' => $zip_code));
                                    }
                                    ?>

                                </td>
                                <td><label for="email">الرقم البريدي</label></td>
                            </tr>

                        </table>





                        <div class="centerdiv">
                            <div class="cta-button optin small">
                                <button type="submit" class="cta1">تسجيل</button>

                                <span class="text"> من فضلك ادخل جميع بياناتك صحيحه لانه في حاله معرفه انها بيانات خاطئه يتم إيقاف العضويه تلقائيا</span>

                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
                <div id="right">

                    <div id="clear"></div>

                    <?php include 'tempelet/righ.php'; ?>
                </div>	

            </div>

        </div>


        <!-- end of section middle -->

        <!-- start of section bottom -->
        <?php include('footer.php') ?>
        <!-- end of section bottom -->

    </div>
    <!-- end of wrapper -->

</body>
</html>