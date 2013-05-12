<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>لوحة الأدمن</title>
        <?php include 'tempelet/links.php'; ?>
    </head>
    <style type="text/css">
        h3{font-weight: bold;text-align: right;}
        table tr td a{color: #fff;text-align: right; font-family: cursive; color: #000;}

    </style>
    <body>

        <div id="wrapper">
            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include('tempelet/header.php'); ?>
                </div>
            </section>
            <?php include 'tempelet/news.php'; ?>

            <div id="content">
                <div id="left">
                    <div id="profile_half1">
                        <table border="5" >
                            <?php
                            $this->db->from('topic');
                            $this->db->where('statue', '0');
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <td><h6><?php echo $row->title; ?></h6></td>
                                        <td style="width: 250px;"></td>
                                        <?php
                                        $this->db->from('user');
                                        $this->db->where('id', $row->id);
                                        $qu_user = $this->db->get();
                                        if ($qu_user->num_rows() > 0) {
                                            $rows_user = $qu_user->result();
                                            foreach ($rows_user as $user) {
                                                
                                            }
                                        }
                                        ?>
                                        <td><h6><?php echo $user->username; ?></h6></td>
                                        <td style="width: 250px;"></td>
                                        <td><h6><a href="<?php echo base_url()?>civou/c_b_subcategory/show_unapprovedTopic_detail/<?php echo $row->id;?>"><?php echo substr($row->content, 0, 100); ?></a></h6></td>
                                        <td style="width: 250px;"></td>
                                        <td><h6><a style="color: #1a1a1a;" href="<?php echo base_url(); ?>civou/c_admin/delete/<?php echo $row->id; ?>">Delete</a></h6></td>
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