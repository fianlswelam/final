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
                        <?php echo form_open('civou/c_user/do_charge'); ?>
                        <div class="heading center">
                            <h4><span class="bold">أضافة رصيد</span></h4>
                            <div class="dotted"></div>
                        </div>
                        <ul>
                            <li>
                                <?php
                                if ($this->uri->segment(4) != '') {
                                    $id = $this->uri->segment(4);
                                    $this->db->where('id', $id);
                                    $query = $this->db->get('user');
                                    if ($query->num_rows() == 1) {
                                        $rows = $query->result();
                                        foreach ($rows as $row) {
                                            
                                        }
                                    } else {
                                        redirect('civou/c_user/alluser');
                                    }
                                } else {
                                    redirect('civou/c_user/alluser');
                                }
                                ?>
                                <label for="title">user name</label> <p><h6><?php echo $row->username; ?></h6></p>
                                <input type="hidden" name="user_id" value="<?php echo $row->id; ?>"/> 
                            </li>
                            <li>
                                <label for="content">amount </label>
                                <?php echo form_input(array('name' => 'amount')); ?>
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