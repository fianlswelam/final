<?php
if ($q->num_rows() > 0) {
    $recordes = $q->result();
    foreach ($recordes as $record) {
        ?>
        <div id="comment_bg">
        <div id="comment">
            <a href="#"> <img src="<?php echo base_url(); ?>images/adv.gif" width="80" height="70" /></a>
            <h6><a href="#"> <?php echo $record->u_type . " " . $record->u_id; ?></a></h6>
            <p class="comment"><?php echo $record->comment; ?></p>
<!--            <div style="clear: both;"></div>
            <div id="comments" style="margin-right: 100px;">
                <h3>أضافة تعليق</h3>
                <?php
                echo form_open('site/addcomment');
                ?>
                <input type="hidden" name="type" value="blog"/>
                <input type="hidden" name="post_id" value="<?php echo $id; ?>"/>
                <input type="hidden" name="parent" value="1"/>
                <?php
                echo form_textarea(array('name' => 'comment', 'id' => "comment", 'rows'=>'1'));
                echo form_submit("add", "أضافى تعليق");
                echo form_close();
                ?>
            </div>-->
        </div>
        </div>
        <?php
    }
}
?>
