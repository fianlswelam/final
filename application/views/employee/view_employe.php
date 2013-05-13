<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>لوحة الأدمن</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">

        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" ></script>
    </head>
    <body>
        <div id="page-container">

            <div id="inner-container">
                <div id="page-content">
                    <ul id="nav-info" class="clearfix">


                        <li><a href="index.php.htm" ><i class="icon-home"></i></a></li>
                        <?php
                        if ($this->session->userdata('employee_id')) {
                            $id = $this->session->userdata('employee_id');
                            $sql = "SELECT employee.id AS id, employee.name AS employee_name, employee.c_id AS c_id, employee.sc_id AS sc_id,employee.num_service, category.name AS categ_name FROM `employee` , `category` WHERE employee.c_id = category.id AND employee.id =" . $id;
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                                $rows = $query->result();
                                foreach ($rows as $row) {
                                    $sql_count = 'SELECT count( * ) as count FROM `order` WHERE `e_id` =' . $this->session->userdata('employee_id').' AND statu=1';
                                    $count_query = $this->db->query($sql_count);
                                    $counts = $count_query->result();
                                    foreach ($counts as $count) {
//                                        echo  $count->count;
                                    }
                                    if ($row->num_service >= $count->count) {
                                        ?>
                                        <?php
                                    } else {
                                        
                                    }
                                }
                            }
                        }
                        ?>
                        <li id="user_name"> <?php echo $row->employee_name; ?></li>
                        <li>مرحبا بك </li>
                        <li>أنت مسؤال عن قسم رئيسى   </li><li> <?php echo $row->categ_name; ?></li>
                    </ul>
                    <?php
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

                                    <h3 class="page-header page-header-top">أنت مسؤل عن قسم <?php echo $roww->name; ?></h3>
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
                        <h3 class="page-header page-header-top"> ="لا يمكنكنك حجز خدمات حتى الانتهاء من تنفيذ الخدامات الجارى تنفيذها </h3>
                        <?php
                    }
                    ?>
                    <h3 class="text-right">خدمات جارى تنفيذها</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>تفاصيل الخدمة</td>
                                <th>سعر الخدمة</td>
                                <th>وقت الحجز</td>
                                <th>مدة التنفيذ</td>
                                <th>تاريخ التنفيذ</td>
                                <th>اسم المستخدم</td>
                                <th>اسم الخدمة</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = 'SELECT order.id as order_id ,order.u_id ,order.start,order.end ,order.duration ,
                                user.id as user_id,user.username ,service.name ,service.price_point,service.id as service_id,
                                order.c_id ,order.sc_id FROM `order` INNER JOIN `user` ON order.u_id = user.id 
                                INNER JOIN `service` ON order.s_id = service.id where order.e_id=' . $this->session->userdata('employee_id') . ' AND order.statu=1';
                            $q = $this->db->query($sql);
                            ///
                            if ($q->num_rows() > 0) {
                                $res = $q->result();
                                foreach ($res as $record) {
                                    ?>
                                    <tr>
                                        <td>
                                            <p> <a href="<?php echo base_url(); ?>csad/c_sad/chat_user/<?php echo $record->order_id;?>/<?php echo $record->user_id; ?>">التفاصيل</a></p> 
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
                                            <p> <?php echo 'تاريخ الانتهاء'; //$record->duration;           ?></p> 
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
                        </tbody>
                    </table>
                     <h3 class="text-right">خدمات تم الأنتهاء من تنفيذها</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>تفاصيل الخدمة</td>
                                <th>سعر الخدمة</td>
                                <th>وقت الحجز</td>
                                <th>مدة التنفيذ</td>
                                <th>تاريخ التنفيذ</td>
                                <th>اسم المستخدم</td>
                                <th>اسم الخدمة</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = 'SELECT order.id as order_id ,order.u_id ,order.start,order.end ,order.duration ,
                                user.id as user_id,user.username ,service.name ,service.price_point,service.id as service_id,
                                order.c_id ,order.sc_id FROM `order` INNER JOIN `user` ON order.u_id = user.id 
                                INNER JOIN `service` ON order.s_id = service.id where order.e_id=' . $this->session->userdata('employee_id') . ' AND order.statu=2';
                            $q = $this->db->query($sql);
                            ///
                            if ($q->num_rows() > 0) {
                                $res = $q->result();
                                foreach ($res as $record) {
                                    ?>
                                    <tr>
                                        <td>
                                            <p> <a href="<?php echo base_url(); ?>csad/c_sad/chat_user/<?php echo $record->order_id;?>/<?php echo $record->user_id; ?>">التفاصيل</a></p> 
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
                                            <p> <?php echo 'تاريخ الانتهاء'; //$record->duration;           ?></p> 
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
                        </tbody>
                    </table>
                </div>
                <footer>
                    <span id="year-copy"></span> &copy; <strong>uAdmin 1.2</strong> - Crafted with <i class="icon-heart"></i> by <strong><a href="javascript:if(confirm(%27http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave%27" tppabs="http://themeforest.net/user/pixelcave/portfolio?ref=pixelcave" target="_blank">pixelcave</a></strong>
                </footer>
            </div>
        </div>
        <a href="#" id="to-top"><i class="icon-chevron-up"></i></a>
        <div id="modal-user-settings" class="modal hide">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Profile Settings</h4>
            </div>
            <div class="modal-body">
                <ul id="example-user-tabs" class="nav nav-tabs">
                    <li class="active"><a href="#example-user-tabs-account"><i class="icon-cogs"></i> Account</a></li>
                    <li><a href="#example-user-tabs-profile"><i class="icon-user"></i> Profile</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="example-user-tabs-account">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> Password changed!
                        </div>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="example-user-username">Username</label>
                                <div class="controls">
                                    <input type="text" id="example-user-username" class="disabled" value="administrator" disabled="">
                                    <span class="help-block">You can't change your username!</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-pass">Password</label>
                                <div class="controls">
                                    <input type="password" id="example-user-pass">
                                    <span class="help-block">if you want to change your password enter your current for confirmation!</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-newpass">New Password</label>
                                <div class="controls">
                                    <input type="password" id="example-user-newpass">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="example-user-tabs-profile">
                        <h5 class="page-header-sub hidden-phone">Image</h5>
                        <div class="form-horizontal hidden-phone">
                            <div class="control-group">
                                <img src="image_dark_120x120.png" tppabs="http://pixelcave.com/demo/uadmin/img/placeholders/image_dark_120x120.png" alt="image">
                            </div>
                            <div class="control-group">
                                <form action="http://pixelcave.com/demo/uadmin/index.php" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form class="form-horizontal">
                            <h5 class="page-header-sub">Details</h5>
                            <div class="control-group">
                                <label class="control-label" for="example-user-firstname">Firstname</label>
                                <div class="controls">
                                    <input type="text" id="example-user-firstname" value="John">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-lastname">Lastname</label>
                                <div class="controls">
                                    <input type="text" id="example-user-lastname" value="Doe">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-gender">Gender</label>
                                <div class="controls">
                                    <select id="example-user-gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-birthdate">Birthdate</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-birthdate" class="input-small input-datepicker">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-skills">Skills</label>
                                <div class="controls">
                                    <select id="example-user-skills" multiple="multiple" class="select-chosen">
                                        <option selected>html</option>
                                        <option selected>css</option>
                                        <option>javascript</option>
                                        <option>php</option>
                                        <option>mysql</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-bio">Bio</label>
                                <div class="controls">
                                    <textarea id="example-user-bio" class="textarea-elastic" rows="3">Bio Information..</textarea>
                                </div>
                            </div>
                            <h5 class="page-header-sub">Social</h5>
                            <div class="control-group">
                                <label class="control-label" for="example-user-fb">Facebook</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-fb">
                                        <span class="add-on"><i class="icon-facebook"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-twitter">Twitter</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-twitter">
                                        <span class="add-on"><i class="icon-twitter"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-pinterest">Pinterest</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-pinterest">
                                        <span class="add-on"><i class="icon-pinterest"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-github">Github</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-github">
                                        <span class="add-on"><i class="icon-github"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i> Close</button>
                <button class="btn btn-success"><i class="icon-spinner icon-spin"></i> Save changes</button>
            </div>
        </div>
        <script src="jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="jquery-1.8.3.min.js"/*tpa=http://pixelcave.com/demo/uadmin/js/vendor/jquery-1.8.3.min.js*/%3E%3C/script%3E'));</script>
        <script src="bootstrap.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/bootstrap.min.js"></script>
        <script src="js-sensor=true.js" tppabs="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="plugins-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/plugins-1.2.js"></script>
        <script src="main-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/main-1.2.js"></script><script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-16158021-6']);
            _gaq.push(['_setDomainName', 'http://pixelcave.com/demo/uadmin/pixelcave.com']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www/') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>