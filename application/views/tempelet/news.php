<div id="news" > 
    <ul id="js-news" class="js-hidden">
        <?php
        $this->db->where('active', 'on');
        $qq = $this->db->get('news');
        $rowsss = $qq->result();
        foreach ($rowsss as $rowww) {
            ?>
            <li class="news-item"><a href="<?php echo $rowww->link; ?>"><?php echo $rowww->content; ?>  </a></li>
            <?php
        }
        ?>
    </ul>
</div>