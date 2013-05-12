<div class="bg-menu right">
    <div class="bg-menu-left left"></div>

    <nav>
        <div class="menu-menu-container">
            <ul id="menu-menu" class="sf-menu">

                <?php if ($this->session->userdata('logged_in')) { ?>
                    <li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom  current_page_item menu-item-home menu-item-52">
                        <a href="<?php echo base_url(); ?>site/logout" >
                            <div class="bullet left"></div>
                            تسجيل خروج</a></li>
                <?php } ?>
                <li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom  current_page_item menu-item-home menu-item-52">
                    <a href="#" >
                        <div class="bullet left"></div>
                        عن الموقع</a></li>
                <?php if (!$this->session->userdata('logged_in')) { ?>
                    <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16">
                        <a href="#" >
                            <div class="bullet left"></div>
                            اتصل بنا</a>

                    </li>
                <?php } ?>
                <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17">
                    <a href="<?php echo base_url(); ?>site/blog">
                        <div class="bullet left"></div>
                        المدونه</a>

                </li>
                <li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20">
                    <a href="<?php echo base_url(); ?>site/market" >
                        <div class="bullet left"></div>
                        السوق</a></li>

                <?php if (!$this->session->userdata('logged_in')) { ?>
                    <li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19">
                        <a href="<?php echo base_url(); ?>site/user_register" >
                            <div class="bullet left"></div>
                            التسجيل</a>

                    </li>
                <?php }; ?>
                <?php if (!$this->session->userdata('logged_in')) { ?>
                    <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="<?php echo base_url(); ?>site/" >
                            <div class="bullet left"></div>
                            الرئيسيه</a></li>
                <?php } else { ?>

                    <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="<?php echo base_url(); ?>site/" >
                            <div class="bullet left"></div>
                            حسابي الشخصي</a></li>
                <?php } ?> 
            </ul>
        </div>
        </ul>
    </nav>
    <div class="bg-menu-right left"></div>
</div>
