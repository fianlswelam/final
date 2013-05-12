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
                <div id="left">
                    <div id="profile_half1">
                        <h4><span class="bold">Users</span></h4>
                        <table border="5" >
                            <?php
                            $this->db->from('user');
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                ?>
                            <tr style="text-align: right;">
                                    <td>اسم المستخدم</td>
                                    <td style="width: 20px;"></td>
                                    <td>رصيد المستخدم</td>
                                    <td style="width: 20px;"></td>
                                    <td>الايميل</td>
                                    <td style="width: 20px;"></td>
                                    <td>رقم التلفون</td>
                                    <td style="width: 20px;"></td>
                                    <td>العنوان</td>
                                    <td style="width: 20px;"></td>
                                    <td>تاريخ التسجيل</td>
                                    <td style="width: 20px;"></td>
                                </tr>
                                <?php
                                foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <td><h6><?php echo $row->username; ?></h6></td>
                                        <td style="width: 20px;"></td>
                                        <td><h6>
                                                <?php
                                                if ($row->amount_point == null) {
                                                    echo "0";
                                                } else {
                                                    echo $row->amount_point;
                                                }
                                                ?>
                                            </h6></td>

                                        <td style="width: 20px;"></td>
                                        <td><h6><?php echo $row->email; ?></h6></td>
                                        <td style="width: 20px;"></td>
                                        <td><h6><?php echo $row->phone; ?></h6></td>
                                        <td style="width: 20px;"></td>
                                        <td><h6><?php echo $row->address; ?></h6></td>
                                        <td style="width: 20px;"></td>
                                        <td><h6><?php echo $row->reg_date; ?></h6></td>
                                        <td style="width: 20px;"></td>
                                        <td><h6><a style="color: #1a1a1a;" href="<?php echo base_url(); ?>civou/c_user/delete/<?php echo $row->id; ?>">Delete</a></h6></td>
                                        <td style="width: 20px;"></td>
                                        <td><h6><a style="color: #1a1a1a;" href="<?php echo base_url(); ?>civou/c_user/charge/<?php echo $row->id; ?>">تحويل رضيد</a></h6></td>
                                    
                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                        </table>

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