<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>تأكيد تنفيذ الخدمة</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/css-family=Roboto-400,400italic,700,700italic.css" >       

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" tppabs="http://pixelcave.com/demo/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/plugins-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/plugins-1.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main-1.2.css" tppabs="http://pixelcave.com/demo/uadmin/css/main-1.2.css">
        <script src="<?php echo base_url(); ?>js/modernizr-2.6.2-respond-1.1.0.min.js" ></script>
        <style type="text/css">
            body{font-family:myfont;text-align:right}
            .table-borderless .table-condensed .row-fluid .span6 {float:right}
            .span6 img{float:right}
            .pull-left{float:right;padding-left:10px;}
            .media-heading a {color:#036}
            .media-heading p  {color:#111}

        </style>
    </head>
    <body>
        <div id="page-container">
            <?php include 'tempelet/head_page.php'; ?>
            <div id="inner-container">
                <?php include 'tempelet/main_menu.php'; ?>
                <div id="page-content">
                    <ul id="nav-info" class="clearfix">
                    </ul>
                    <?php include 'header2.php'; ?>
                    <?php $id = $this->uri->segment(3); ?>

                    <?php
                    $this->db->from('service');
                    $this->db->where('id', $id);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        $rows = $query->result();
                        foreach ($rows as $row) {
                            
                        }
                    }
                    ?>
                    <h3 class = "sub-header text-center"> فاتوره <i class="icon-file-alt"></i></h3>
                    <div class = "row-fluid">
                        //<?php
//                        $this->db->from('user');
//                        $this->db->where('id', $this->session->userdata('user_id'));
//                        $user_query = $this->db->get();
//                        if ($user_query->num_rows() > 0) {
//                            $user_rows = $user_query->result();
//                            foreach ($user_rows as $user_row) {
//                                
//                            }
//                        }
//                        ?>
                        <div class = "span8 offset2">
                            <div class = "dash-tile dash-tile-dark no-opacity remove-margin">
                                <div class = "dash-tile-content">
                                    <div class = "dash-tile-content-inner-fluid dash-tile-content-light" >
                                        <div class = "row-fluid">
                                            <div class = "span6" style = "float: right;">
<!--                                                <address style = "float: right;">
                                                    <strong>
                                                        <?php echo $this->session->userdata('user_name'); ?>
                                                        <i class = "icon-home"></i>
                                                    </strong><br>
                                                    <?php echo $user_row->phone . ' '; ?>
                                                    <abbr title = "Phone"><i class = "icon-phone"></i> </abbr> <br>
                                                    <?php echo $user_row->country; ?>
                                                    <br>
                                                </address>-->
                                            </div>


                                        </div>
                                        <table class = "table table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th class = "hidden-phone text-right">وصف </th>
                                                    <th class = "text-right">تخفيض</th>
                                                    <th class = "text-right">سعر الخدمة</th>
                                                    <th class = "text-right">اسم الخدمة</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class = "success">
                                                    <td class = "text-right"><?php echo substr($row->detail, 0, 100); ?></td>
                                                    <td class = "hidden-phone text-right">-</td>
                                                    <td class = "text-right"><?php echo $row->price_point ?></td>
                                                    <td class = "text-right"><?php echo $row->name; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class = "table table-borderless table-hover">
                                        </table>
                                        <div class = "clearfix">

                                            <?php echo form_open('site/confirm_order'); ?>
                                            <input type="hidden" name="order_id" value="<?php echo $row->id; ?>"/> 
                                            <input type="hidden" name="order_p" value="<?php echo $row->price_point; ?>" />
                                            <input type="hidden" name="c_id" value="<?php echo $row->c_id; ?>" />
                                            <input type="hidden" name="sc_id" value="<?php echo $row->sc_id; ?>" />
                                            <input type="hidden" name="duration" value="<?php echo $row->duration; ?>" />

                                            <input type="submit" class = "btn btn-large btn-success pull-right push" value="تاكيد عمليت الشراء"> </input>
                                            <a href = "<?php echo base_url(); ?>site/market/" class = "btn btn-large btn-danger pull-right push">ألغاء</a>
                                            <?php echo form_close();?>
                                            <!--<p><strong>Sent To:</strong> <a href = ""><?php echo $user_row->email; ?></a>-->
                                                <br> <span class = "label label-success"><?php
                                            $this->load->helper('date');
                                            echo date('Y-m-d H:i:s', now());
                                            ?></span>التاريخ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <span id = "year-copy"></span> &copy;
                    <strong>uAdmin 1.2</strong> - Crafted with <i class = "icon-heart"></i> by <strong><a href = " ">shelinat</a></strong>
                </footer>
            </div>
        </div>
        <a href = "#" id = "to-top"><i class = "icon-chevron-up"></i></a>
        <div id = "modal-user-settings" class = "modal hide">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">×</button>
                <h4>Profile Settings</h4>
            </div>
            <div class = "modal-body">
                <ul id = "example-user-tabs" class = "nav nav-tabs">
                    <li class = "active"><a href = "#example-user-tabs-account"><i class = "icon-cogs"></i> Account</a></li>
                    <li><a href = "#example-user-tabs-profile"><i class = "icon-user"></i> Profile</a></li>
                </ul>
                <div class = "tab-content">
                    <div class = "tab-pane active" id = "example-user-tabs-account">
                        <div class = "alert alert-success">
                            <button type = "button" class = "close" data-dismiss = "alert">&times;
                            </button>
                            <strong>Success!</strong> Password changed!
                        </div>
                        <form class = "form-horizontal">
                            <div class = "control-group">
                                <label class = "control-label" for = "example-user-username">Username</label>
                                <div class = "controls">
                                    <input type = "text" id = "example-user-username" class = "disabled" value = "administrator" disabled = "">
                                    <span class = "help-block">You can't change your username!</span>
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
        <script>!window.jQuery && document.write(unescape('%3Cscript src = "jquery-1.8.3.min.js"/* tpa=http://pixelcave.com/demo/uadmin/js/vendor/jquery-1.8.3.min.js */%3E%3C/script%3E'));</script>
        <script src="bootstrap.min.js" tppabs="http://pixelcave.com/demo/uadmin/js/vendor/bootstrap.min.js"></script>
        <script src="js-sensor=true.js" tppabs="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="plugins-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/plugins-1.2.js"></script>
        <script src="main-1.2.js" tppabs="http://pixelcave.com/demo/uadmin/js/main-1.2.js"></script><script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-16158021-6']);
            _gaq.push(['_setDomainName', 'http://pixelcave.com/demo/uadmin/pixelcave.com']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www/') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>