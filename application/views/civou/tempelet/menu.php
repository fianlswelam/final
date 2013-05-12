
<div class="main_menu" >

    <ul class="nav2" style="margin-top:-10px">
        <h3 id="dept">لوحة الادمن</h3>

        <li><a>Admin</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>civou/c_admin/loadAddAdmin">Add New Admin</a></p> 
            <p><a href="<?php echo base_url(); ?>civou/c_admin/allAdmin">Show All Admins</a></p> 
        </div>
        <li><a>Service</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>civou/c_category/loadAddCategory">Add Category</a></p>
            <p><a href="<?php echo base_url(); ?>civou/c_category/allcategory">Show All Category</a></p> 
            <p><a href="<?php echo base_url(); ?>civou/c_subcategory/addSubCategory">Add Sub Category</a></p> 
            <p><a href="<?php echo base_url(); ?>civou/c_service/loadAddService">Add Service</a></p> 
            <p><a href="<?php echo base_url(); ?>civou/c_service/loadAddService">Show All Service</a></p> 
        </div>
        <li><a>Blog</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>civou/c_b_category/loadaddBCategory">Add Category</a></p> 
            <p><a href="<?php echo base_url(); ?>civou/c_b_subcategory/addbSubCategory">Add Sub Category</a></p>
            <p><a href="<?php echo base_url(); ?>civou/c_b_subcategory/addTopic">Add Topic</a></p>
            <p><a href="<?php echo base_url(); ?>civou/c_b_subcategory/show_unapproved_topics">Show Un approved topics</a></p>

        </div>
        <li><a>Employee</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>civou/c_employee/loadAddemployee">Add New Employee</a></p> 
            <p><a href="<?php echo base_url(); ?>civou/c_employee/allemployee">Show All</a></p> 
        </div>
        <li><a>Members</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>#">Add New Member</a></p> 
            <p><a href="<?php echo base_url(); ?>#">Show All</a></p> 
        </div>
        <li><a>News</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>civou/c_news/loadAddnews">Add News</a></p> 
            <p><a href="<?php echo base_url(); ?>civou/c_news/allnews">Show All</a></p> 
        </div>
        <li><a>Advirtise</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>#">Add Adv</a></p> 
            <p><a href="<?php echo base_url(); ?>#">Show All</a></p> 
        </div>
        <li><a>Blocks</a></li>
        <div class="sub_links" style="display: none; ">
            <p><a href="<?php echo base_url(); ?>#">Add new Block</a></p> 
            <p><a href="<?php echo base_url(); ?>#">Show All</a></p> 
        </div>
        <li><a href="<?php echo site_url('civou/c_sitead/contact_level1'); ?>">messages</a></li>
        <li><a href="<?php echo site_url('civou/c_sitead/admin_edit_user'); ?>">edit user data</a></li>

    </ul>    
</div>