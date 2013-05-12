
<table width="450" border="0" style="float:right;text-align:right;margin-right:-20px;">

    <?php
    $flag = 0;
    foreach ($res as $record) {
        ?>
        <?php
        if ($flag == 0) {
            echo '<tr>';
            $flag = 1;
        } else {
            $flag=0;
        }
        ?>
            <!--<tr>-->
        <td>
            <div id="most">
                <img src="<?php echo base_url(); ?>imagesService/thumb/<?php echo $record->photo_name; ?>"  width="60" height="50"/>
                <h6 id="h6"><a href="#"><?php echo $record->name; ?></a></h6>
                <p>سعر الخدمة : <?php echo $record->price_point; ?></p><br/>
                <p id="p">تصميم مواقع خلال خمس ايام مع تقديم استضافه لمده شهر مجانا </p>
            </div>
        </td>
        <!--</tr>-->
        <?php
        if ($flag == 1) {
            
        } else {
            $flag == 0;
            echo '</tr>';
        }
        ?>

        <?php
    }
    ?></table>
