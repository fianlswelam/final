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
                        <?php
                        if ($this->session->userdata('employee_id')) {
                            $id = $this->session->userdata('employee_id');
                            $sql = "SELECT employee.id AS id, employee.name AS employee_name, employee.c_id AS c_id, employee.sc_id AS sc_id,employee.num_service, category.name AS categ_name FROM `employee` , `category` WHERE employee.c_id = category.id AND employee.id =" . $id;
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                foreach ($rows as $row) {
                                    $sql_count = 'SELECT count( * ) as count FROM `order` WHERE `e_id` ='.$this->session->userdata('employee_id');
                                    $count_query = $this->db->query($sql_count);
                                    $counts = $count_query->result();
                                    foreach ($counts as $count) {
//                                        echo  $count->count;
                                    }
                                    if ($row->num_service >= $count->count) {
                                        ?>
                                        <p id="user_name"> <?php echo $row->employee_name; ?></p>
                                        </br>
                                        <p>مرحبا بك </p>
                                        <div style="clear: both;"> </div>
                                        <p><a style="font-size: 20px; color: #ffffff;"> أنت مسؤال عن قسم رئيسى   : <?php echo $row->categ_name; ?></a></p>
                                        <?php
                                    } else {
                                        
                                    }
                                }
                            }
                        }
                        if ($row->num_service >= $count->count) {
//                        echo $row->sc_id;
                            if ($row->sc_id == 0) {
                                $this->db->where('c_id', $row->c_id);
//                          $this->db->where('c_id', $roww->id);
                                $this->db->where('sc_id', $row->sc_id);
                                $sql = 'SELECT order.id as order_id ,order.u_id ,order.start,order.end ,order.duration ,
                                user.id as user_id,user.username ,service.name ,service.price_point,service.id as service_id,
                                order.c_id ,order.sc_id FROM `order` INNER JOIN `user` ON order.u_id = user.id 
                                INNER JOIN `service` ON order.s_id = service.id where order.c_id=' . $row->c_id . ' AND order.statu=0';
//                            $sql = "SELECT * FROM `order` INNER JOIN `user` ON order.u_id = user.id INNER JOIN `service` ON order.s_id = service.id where order.c_id=$row->c_id";
                                //$q = $this->db->get('order');
                                $q = $this->db->query($sql);
                                if ($q->num_rows() > 0) {
                                    $res = $q->result();
                                    include 'tempelet/employe_content.php';
                                }
                            } else {
                                $this->db->where('id', $row->sc_id);
                                $qu = $this->db->get('sub_categ');
//                            $qu = $this->db->query($sql);
                                if ($qu->num_rows() > 0) {
                                    $rowss = $qu->result();
                                    foreach ($rowss as $roww) {
                                        ?>
                                        <p><a style="font-size: 20px; color: #ffffff;">قسم فرعى  : <?php echo $roww->name; ?></a></p>
                                        <?php
//                                        $this->db->where('c_id', $roww->id);
                                        //$this->db->where('sc_id', $row->sc_id);
                                        //$q = $this->db->get('order');
                                        ////
                                        $sql = 'SELECT order.id as order_id ,order.u_id ,order.start,order.end ,order.duration ,
                                user.id as user_id,user.username ,service.name ,service.price_point,service.id as service_id,
                                order.c_id ,order.sc_id FROM `order` INNER JOIN `user` ON order.u_id = user.id 
                                INNER JOIN `service` ON order.s_id = service.id where order.sc_id=' . $row->sc_id . ' AND order.statu =0';
//                                    $sql = "SELECT * FROM `order` INNER JOIN `user` ON order.u_id = user.id INNER JOIN `service` ON order.s_id = service.id where  order.sc_id=$row->sc_id";
                                        $q = $this->db->query($sql);
                                        ///
                                        if ($q->num_rows() > 0) {
                                            $res = $q->result();
                                            include 'tempelet/employe_content.php';
                                        }
                                    }
                                }
                            }
                        } else {
                            ?>
                            </br>
                            <p><a style="font-size: 20px; color: #ffffff;"> لا يمكنكنك حجز خدمات حتى الانتهاء من تنفيذ الخدامات الجارى تنفيذها</a></p>
                            <div class="clear"></div>
                            <?php
                        }
                        ?>

                        <div class="clear"></div>
                        <div class="dotted"></div>
                        <div class="clear"></div>
                        <p><a style="font-size: 20px; color: #ffffff;">خدمات جارى تنفيذها</a></p>
                        <div class="clear"></div>
                        <table border="1"  style="width: 800px;">
                            <tr>
                                <td><p>تفاصيل الخدمة</p></td>
                                <td><p>سعر الخدمة</p></td>
                                <td> <p>وقت الحجز</p></td>
                                <td> <p>مدة التنفيذ</p></td>
                                <td> <p>تاريخ التنفيذ</p></td>
                                <td><p>اسم المستخدم</p> </td>
                                <td><p>اسم الخدمة</p> </td>
                            </tr>
                            <?php
                            $sql = 'SELECT order.id as order_id ,order.u_id ,order.start,order.end ,order.duration ,
                                user.id as user_id,user.username ,service.name ,service.price_point,service.id as service_id,
                                order.c_id ,order.sc_id FROM `order` INNER JOIN `user` ON order.u_id = user.id 
                                INNER JOIN `service` ON order.s_id = service.id where order.e_id=' . $this->session->userdata('employee_id');
                            $q = $this->db->query($sql);
                            ///
                            if ($q->num_rows() > 0) {
                                $res = $q->result();
                                foreach ($res as $record) {
                                    ?>
                                    <tr>
                                        <td>
                                            <p> <a href="<?php echo base_url();?>csad/c_service/index/<?php echo $record->order_id;?>">التفاصيل</a></p> 
                                        </td>

                                        <td>
                                            <p> <?php echo $record->price_point; ?></p> 
                                        </td>
                                        <td>
                                            <p> <?php echo $record->start; ?></p> 
                                        </td>
                                        <td>
                                            <p> <?php echo $record->duration; ?></p> 
                                        </td>
                                        <td>
                                            <p> <?php echo 'تاريخ الانتهاء'; //$record->duration;          ?></p> 
                                        </td>
                                        <td>
                                            <p><?php echo $record->username; ?></p> 
                                        </td>
                                        <td>
                                            <p>  <?php echo $record->name; ?></p> 
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>


                        <p><a style="font-size: 20px; color: #ffffff;"></a></p>


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