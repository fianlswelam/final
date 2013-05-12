<p style="color: #ffffff;">حجزات قيد التنفيذ</p>
<table border="1"  style="width: 800px;">
    <tr>
        <td><p>تنفيذ الخدمة</p></td>
        <td><p>سعر الخدمة</p></td>
        <td> <p>وقت الحجز</p></td>
        <td><p>اسم المستخدم</p> </td>
        <td><p>اسم الخدمة</p> </td>
    </tr>
    <?php
    foreach ($res as $record) {
        ?>
        <tr>
            <td>
                <p><a href="<?php echo base_url();?>csad/c_sad/perform/<?php echo $record->order_id; ?>/<?php echo $record->duration?>">
                        تنفيذ الخدمة
                    </a></p> 
            </td>

            <td>
                <p><?php echo $record->price_point; ?></p> 
            </td>
            <td>
                <p><?php echo $record->start; ?></p> 
            </td>

            <td>
                <p> <?php echo $record->username; ?></p> 
            </td>
            <td>
                <p> <?php echo $record->name; ?></p> 
            </td>
        </tr>

        <?php
    }
    ?>
</table>
