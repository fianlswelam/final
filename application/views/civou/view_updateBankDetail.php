
<?php

foreach ($res as $value) {
    echo form_open('payment/updateBank');
    echo "اسم البنك ";

    echo form_input('bank_name', $value->bank_name);

    echo "<br/>";
    echo "تفاصيل  السحب   :  ";
    echo "<br/>";
    echo "-----------------------------------------------------------------";
    echo "<br/>";
    echo "اكبر مبلغ ممكن ان يسحب فى المره الواحده : ";
    echo form_input('max_amount_deposit', $value->max_deposite);
    echo "<br/>";
    echo "<br/>";
    echo "  عدد مرات السحب فى الاسبوع : ";
    echo form_input('number_deposit', $value->num_deposite);
    echo "<br/>";
    echo "<br/>";
    echo "  الضريبه : ";
    echo form_input('fees_pers_deposite', $value->fees_pers_depo);
    echo " + ";
    echo form_input('fees_dolar_deposite', $value->fees_dolar_depo);

    echo "<br/>";
    echo "<br/>";
    echo "تفاصيل  الايداع    :  ";
    echo "<br/>";
    echo "-----------------------------------------------------------------";
    echo "<br/>";
    echo "<br/>";
    echo "اقل  مبلغ ممكن ان يودع  فى المره الواحده : ";
    echo form_input('min_amount_add', $value->min_add);
    echo "<br/>";
    echo "<br/>";
    echo "  الضريبه : ";
    echo form_input('fees_pers_add', $value->fees_pers_add);
    echo " + ";
    echo form_input('fees_dolar_add', $value->fees_dolar_add);
    echo "<br/>";
    echo "<br/>";
    echo form_submit('submit', 'تعديل ');
    echo "<br/>";
}
?>



