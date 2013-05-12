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
                        <?php echo form_open('civou/c_subcategory/addSubCategory'); ?>
                        <div class="heading center">
                            <h4><span class="bold">تسجيل قسم فرعى</span></h4>
                            <div class="dotted"></div>
                        </div>
                        <ul>
                            <li>
                                <label for="name">اسم القسم</label>
                                <?php echo form_input(array('name' => 'categoryname', 'id' => "name")); ?>

                            </li>

                            <li>

                                <label for="name">اسم القسم التابع له</label>

                                <select name="categoryid" id="CmbCountry" class="home" style="width:570px;text-align:right" >

                                    <option value="none" selected="selected" >اختار القسم </option>
                                    <?php
                                    $this->load->model('sitead');
                                    $rows = $this->sitead->SelectCategory();
                                    foreach ($rows as $row) {
                                        echo "<option value=\"$row->id\">$row->name</option>";
                                    }
                                    ?>
                                </select>
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