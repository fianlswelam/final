<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>لوحة الأدمن</title>
        <?php include 'tempelet/links.php'; ?>
           <?php include 'tempelet/ajaxa.php'; ?>
    </head>
    <body>

        <div id="wrapper">
            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include('tempelet/header.php') ?>
                     <?php include 'dbcon.php'; ?>
                </div>
            </section>
            <?php include 'tempelet/news.php'; ?>

            <div id="content">

                <div id="left" style="background:#111">       
                    <div class="featured_form">
                        <?php echo form_open_multipart('civou/c_b_subcategory/validation_add_topic'); ?>

                        <div class="heading center" style="background-color:transparent">
                            <div class="dotted"></div>
                            <h4><span class="bold" style="color:#fff">لاضافه موضوع الي المدونه</span></h4>
                            <div class="dotted"></div>
                        </div>
                        <div style="color:#FC3;margin-right:140px;">
                            <?php
                            if (isset($topic_added)) {
                                echo '<p style="margin-left:30px;color:#3C3;font-size:16px;font-weight:bold;">' . $topic_added . '</p>';
                            } else {
                                echo validation_errors();
                            }
                            ?></div>


                        <table width="790" border="0" id="topic">
                            <tr>
                                <td>

                                    <div id='file_browse_wrapper2'>
                                        <?php echo form_upload(array('id' => 'file_browse2', 'name' => 'userfile')); ?>
                                    </div>
                                </td>
                                <td><p>صوره الموضوع</p></td>
                            </tr>
                            <tr>

                                <td width="604"> <?php echo form_input(array('name' => 'topic_name', 'id' => "name", 'value' => $this->input->post('username'))); ?></td>
                                <td width="136"><p style="position:absolute;margin-top:10px;float:right;margin-left:50px;">عنوان الموضوع</p></td>
                            </tr>

                            <tr>

                                <td> <?php echo form_textarea(array('name' => 'topic', 'id' => "email", 'value' => $this->input->post('email'))); ?></td>
                                <td><p style="position:absolute;margin-top:10px;float:right;margin-left:80px;">الموضوع</p></td>
                            </tr>
                            <tr>

                                <td>
                                    <div class="both" style="margin-left:113px;">



                                        <select name="search_category"  id="search_category_id">
                                            <option value="none" selected="selected" >اختار القسم الرئيسى</option>
                                            <?php
                                            $query = "select * from blog_category";
                                            $results = mysql_query($query);
                                            while ($rows = mysql_fetch_assoc(@$results)) {
                                                ?>
                                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                                            <?php }
                                            ?>
                                        </select>		
                                    </div>
                                    <div class="both" style="margin-left:0px;">
                                        <div id="show_sub_categories" align="center">
                                            <img src="<?php echo base_url(); ?>images/loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
                                        </div>
                                    </div>
                                    <br clear="all" /><br clear="all" />
                                </td>
                                <td>
                                    <p> القسم</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="usertype" value="admin"/> 
                                </td>
                            </tr>

                        </table>

                        <div class="centerdiv">
                            <div class="cta-button optin small">

                                <button type="submit" class="cta1">اضافه</button>
                                <span class="text" style="width:370px;"> سيتم اضافه الموضوع تلقائيا الي المدونه بعد الضغط علي زر الاضافه للموضوع</span>

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