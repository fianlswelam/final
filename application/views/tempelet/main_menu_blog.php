         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>
 <script src="<?php echo base_url(); ?>js/custom.js" type="text/javascript" ></script> 
<aside id="page-sidebar" class="nav-collapse collapse">
<div class="main_menu" >
<nav id="primary-nav">

    <ul class="nav" style="margin-top:-10px">
        <h3 id="dept">اقسام المدونه</h3>
          <?php
        $query1 = $this->db->get('blog_category');
        if ($query1->num_rows() > 0) {
            $rows = $query1->result();
            foreach ($rows as $row) {
                $base = base_url() . "site/blog/";
//                                    echo $rows->num_rows();
                $this->db->where('b_c_id', $row->id);
                $query2 = $this->db->get('blog_sub_categ');
			     $count=count($query2->result());
                if ($query2->num_rows() > 0) {
                    echo "<li><a>($count) $row->name </a></li>";
                    ?>
                    <div class="sub_links" style="display: none; ">

                        <?php
                        $rowsSub = $query2->result();
                        foreach ($rowsSub as $rowSub) {
                            echo "<p><a href=\"$base$rowSub->b_c_id/$rowSub->id\">$rowSub->name</a></p> ";
                        }
                        ?> 
                    </div>

                    <?php
                } else {
                    echo "<li><a href=\"$base$row->id\">$row->name</a></li>";
                }
            }
        }
        ?>

                        </ul>  
                        </nav>
</div>

<div id="service">
<h3>الخدمات الاكثر شرائا</h3>
<div style="background-color:#e9e9e9;padding:0 6px 0 6px;">

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

</div>

</div>

<div id="service">
<h3>الخدمات الاكثر شرائا</h3>
<div  style="background-color:#e9e9e9;padding:0 6px 0 6px;">

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

</div>

</div>
<div id="service">
<h3>الخدمات الاكثر شرائا</h3>
<div  style="background-color:#e9e9e9;padding:0 6px 0 6px;">

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

<div id="all">

<p>تفاصيل الخدمه تفاصيل الخدمه</p>
<img src="<?php echo base_url()?>images/t.jpg" width="50" height="70" />
</div>

</div>

</div>




</aside>