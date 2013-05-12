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
                        <?php echo form_open('civou/c_news/addnews'); ?>
                        <div class="heading center">
                            <h4><span class="bold">تسجيل خبر جديد </span></h4>
                            <div class="dotted"></div>
                        </div>
                        <ul>
                            <li>
                                <label for="title">Title </label>
                                <?php echo form_input(array('name' => 'title')); ?>
                            </li>
                            <li>
                                <label for="content">Link </label>
                                <?php echo form_input(array('name' => 'link')); ?>
                            </li>
                            <li>
                                <label for="content">Content </label>
                                <?php echo form_textarea(array('name' => 'content')); ?>
                            </li>
                        </ul>
                        <div class="centerdiv">
                            <div class="cta-button optin small">
                                <?php echo form_submit(array('name' => 'submit', 'class' => "cta1"), 'تسجيل') ?>
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