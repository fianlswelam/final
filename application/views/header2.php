<ul class="nav-dash" >
   <?php if ($this->session->userdata('logged_in')) {?>
   <li>
        <a href="<?php echo base_url(); ?>site/logout" data-toggle="tooltip" title="تسجيل الخروج">
            <i class="icon-off"></i> 
        </a>
    </li>
     <?php }?>
    
     <li>
        <a href="<?php echo base_url(); ?>site/about" data-toggle="tooltip" title="افهم اكتر موقعنا">
            <i class="icon-lightbulb"></i>
        </a>
    </li>
    
    <li>
        <a href="<?php echo base_url(); ?>site/contact_us" data-toggle="tooltip" title="الدعم الفني">
            <i class="icon-cogs"></i>
        </a>
    </li>
   <?php if ($this->session->userdata('logged_in')) {?>
     <li>
        <a href="<?php echo base_url(); ?>user/post_topic" data-toggle="tooltip" title="اضافه موضوع الي المدونه">
           <i class="icon-pencil"></i>
        </a>
    </li>
         <?php }?>
    <li>
    
        <a href="<?php echo base_url(); ?>site/blog" data-toggle="tooltip" title="المدونة">
           <i class="icon-book"></i>
        </a>
    </li>
    
   
     <li>
        <a href="<?php echo base_url(); ?>site/market" data-toggle="tooltip" title="السوق">
           <i class="icon-shopping-cart"></i>
        </a>
    </li>
     <li>
        <a href="<?php echo base_url(); ?>site/offers" data-toggle="tooltip" title="الهدايا والعروض ">
           <i class="icon-shopping-cart"></i>
        </a>
    </li>
     <li>
     <?php if ($this->session->userdata('logged_in')) {?>
        <a href="<?php echo base_url(); ?>user/profile" data-toggle="tooltip" title="الحساب الشخصى">
            <i class="icon-user"></i>
        </a>
        <?php }else{?>
        <a href="<?php echo base_url(); ?>site/user_register" data-toggle="tooltip" title=" تسجيل عضو جديد">
            <i class="icon-group"></i>
        </a>
        <?php }?>
    </li>
    
     <li>
     <?php if ($this->session->userdata('logged_in')) {?>
        <a href="<?php echo base_url(); ?>site/home" data-toggle="tooltip" title="لوحه التحكم">
            <i class="icon-home"></i> 
        </a>
         <?php }else{?>
          <a href="<?php echo base_url(); ?>site/" data-toggle="tooltip" title=" الرئيسيه">
            <i class="icon-home"></i> 
        </a>
         <?php }?>
    </li>
<!--    <li>
        <a href="javascript:void(0)" data-toggle="tooltip" title="Reader">
            <i class="icon-book"></i>
        </a>
    </li>
    <li>
        <a href="javascript:void(0)" data-toggle="tooltip" title="Settings">
            <i class="icon-cogs"></i>
        </a>
    </li>-->
</ul>
<!---------------------------- start of content---------------------------------------->