<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>لوحة الأدمن</title>
        <?php include 'tempelet/links.php'; ?>
        <?php include 'tempelet/ajax.php'; ?>

    </head>
    <body>

        <?php include('dbcon.php'); ?>
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
                        <?php echo form_open_multipart('civou/c_service/addservice'); ?>
                        <div class="heading center">
                            <h4><span class="bold">اضافة خدمة جديده</span></h4>
                            <div class="dotted"></div>
                        </div>
                        <ul>
                            <li>
                                <label for="name">اسم الخدمة</label>
                                <?php echo form_input(array('name' => 'servicename', 'id' => "name")); ?>

                            </li>


                            <li>
                                <label for="name">سعر الخدمة بالنقاط</label>
                                <?php echo form_input(array('name' => 'serviceprice', 'id' => "name")); ?>

                            </li>
                            <li>
                                <label for="name"> فتره التنفيذ </label>
                                <?php echo form_input(array('name' => 'duration', 'id' => "name")); ?>

                            </li>
                            <li>
                                <label for="name"> القسم</label>
                                <div class="both">
                                    <select name="search_category"  id="search_category_id">
                                        <option value="none" selected="selected" >اختار القسم الرئيسى</option>
                                        <?php
                                        $query = "select * from category";
                                        $results = mysql_query($query);
                                        while ($rows = mysql_fetch_assoc(@$results)) {
                                            ?>
                                            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                                        <?php }
                                        ?>
                                    </select>		
                                </div>

                                <div class="both">
                                    <div id="show_sub_categories" align="center">
                                        <img src="<?php echo base_url(); ?>images/loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
                                    </div>
                                </div>
                                <br clear="all" /><br clear="all" />

                            </li>

                            <li>
                                <label for="name">وصف الخدمة </label>
                                <?php echo form_textarea(array('name' => 'discription', 'id' => "name", 'rows' => 5, 'cols' => 100)); ?>
                            </li>

                            <li>
                                <label for="name"> تعليمات للمشترى </label>
                                <?php echo form_textarea(array('name' => 'instruction', 'id' => "name", 'rows' => 5, 'cols' => 100)); ?>
                            </li>
                            <li>
                                <label for="name">صوره للخدمة</label>
                                <?php echo form_upload('userfile'); ?>

                            </li>
                        </ul>
                        <div class="centerdiv">
                            <div class="cta-button optin small">
                                <?php echo form_submit(array('name' => 'button', 'class' => "cta1"), 'تسجيل') ?>
                            </div>
                        </div>

                        <div class="centerdiv">
                            <div class="cta-button optin small">
                                <label> 
                                    <?php
                                    if (isset($mes)) {
                                        echo $mes;
                                    }
                                    ?>
                                </label>
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