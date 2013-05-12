<h3 class="text-right">حجزات قيد التنفيذ</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="span1 text-center">تنفيذ الخدمة</th>
            <th class="span1 text-center">سعر الخدمة</th>
            <th class="hidden-phone">وقت الحجز</th>
            <th class="hidden-phone">اسم المستخدم</th>
            <th class="hidden-phone">اسم الخدمة</th>
        </tr>
    </thead>
    <?php
    foreach ($res as $record) {
        ?>
    <tbody>
        <tr>
            <td class="span1 text-center">
                <a href="<?php echo base_url(); ?>csad/c_sad/perform/<?php echo $record->order_id; ?>/<?php echo $record->duration ?>">
                    تنفيذ الخدمة
                </a>
                <a href="<?php echo base_url(); ?>csad/c_sad/perform/<?php echo $record->order_id; ?>/<?php echo $record->duration ?>" data-toggle="tooltip" title="Details" class="btn btn-mini btn-info"><i class="icon-ok"></i></a>

            </td>
            <td><?php echo $record->price_point; ?></td>
            <td class="hidden-phone"><?php echo $record->start; ?></td>
            <td class="hidden-phone"><?php echo $record->username; ?></td>
            <td class="hidden-phone"><?php echo $record->name; ?></td>

        </tr>
    </tbody>
        <?php
    }
    ?>
</table>
