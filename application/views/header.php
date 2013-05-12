<header>
<style type="text/css">
nav ul , nav li{margin:0px;padding:0px;}
</style>
    <div class="container" style="width:1157px;margin:auto;background:#111">
        <div  class="clearfix">
            <div class="grid_4" style="float:left" >
                <div class="logo">
                    <a href="index.html" ><img src="<?php echo base_url(); ?>images/logo.png"  alt="" /></a>
                </div>	

            </div>

            <div class="grid_8" style="float:right">
                <!-- start navigation -->						
                <nav id="navigation">
                    <ul class="menu">
                         <?php if ($this->session->userdata('logged_in')) {?>
						  <li class="home"><a href="<?php echo base_url(); ?>site/logout"  >تسجيل الخروج</a></li>
						 
						 <?php }?>
                        <li class="home" ><a href="<?php echo base_url(); ?>site/about"  >عن الموقع</a></li>
                        <li class="home"><a href="<?php echo base_url(); ?>site/contact_us"  >اتصل بنا</a></li> 
                        <li class="home"><a href="<?php echo base_url(); ?>site/blog">المدونه</a></li>
                        <li class="home"><a href="<?php echo base_url(); ?>site/market">السوق</a></li>
                        <?php if (!$this->session->userdata('logged_in')) {?>
                        <li class="home"><a href="<?php echo base_url(); ?>site/user_register"  >التسجيل</a></li>
                        <?php }?>
                        <?php if (!$this->session->userdata('logged_in')) {?>
                        <li class="home"><a href="<?php echo base_url(); ?>site/"  >الرئيسيه</a></li>
                        <?php }else{?>
                        <li class="home"><a href="<?php echo base_url(); ?>site/"  >الحساب الشخصي</a></li>
                        <?php } ?>
                        
                    </ul> <!-- end .menu -->
                </nav>
                <!-- End navigation -->	

            </div>
        </div>
    </div>
</header>
