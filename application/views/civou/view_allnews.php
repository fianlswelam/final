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
                        <h4><span class="bold">News</span></h4>
                        <table border="5" >
                            <?php
                            $this->db->from('news');
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                ?>
                                <tr>
                                    <td><p>العنوان<p></td>
                                    <td style="width: 200px;"></td>
                                    <td><p>الحالة</p></td>
                                    <td style="width: 200px;"></td>
                                    <td><p>اللينك</p></td>
                                    <td style="width: 200px;"></td>
                                </tr>
                                <?php
                                foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <td><h6><?php echo $row->title; ?></h6></td>
                                        <td style="width: 200px;"></td>
                                        <td><h6><a style="color: #1a1a1a;" href="<?php echo base_url(); ?>civou/c_news/active/<?php echo $row->id; ?>/<?php echo $row->active; ?>"><?php echo $row->active; ?></a></h6></td>
                                        <td style="width: 200px;"></td>
                                        <td><h6><?php echo $row->link; ?></h6></td>
                                        <td style="width: 200px;"></td>
                                        <td><h6><a style="color: #1a1a1a;" href="<?php echo base_url(); ?>civou/c_news/delete/<?php echo $row->id; ?>">Delete</a></h6></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <?php echo"<p> $row->content </p>"; ?>
                                        </td>
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