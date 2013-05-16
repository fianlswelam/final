<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        echo form_open('payment/addBank');
        echo "اسم البنك ";
        echo form_input('bank_name');

        echo "<br/>";
        echo "<br/>";
        echo "تفاصيل  السحب   :  ";
        echo "<br/>";
        echo "-----------------------------------------------------------------";
        echo "<br/>";
        echo "اكبر مبلغ ممكن ان يسحب فى المره الواحده : ";
        echo form_input('max_amount_deposit');
        echo "<br/>";
        echo "<br/>";
        echo "  عدد مرات السحب فى الاسبوع : ";
        echo form_input('number_deposit');
        echo "<br/>";
        echo "<br/>";
        echo "  الضريبه : ";
        echo form_input('fees_pers_deposite');
        echo " + ";
        echo form_input('fees_dolar_deposite');

        echo "<br/>";
        echo "<br/>";
        echo "تفاصيل  الايداع    :  ";
        echo "<br/>";
        echo "-----------------------------------------------------------------";
        echo "<br/>";
        echo "<br/>";
        echo "اقل  مبلغ ممكن ان يودع  فى المره الواحده : ";
        echo form_input('min_amount_add');
        echo "<br/>"; echo "<br/>";
        echo "  الضريبه : ";
        echo form_input('fees_pers_add');
        echo " + ";
        echo form_input('fees_dolar_add');
        echo "<br/>";
        echo "<br/>";
        echo form_submit('submit', 'حفظ');
          echo "<br/>";
        
          ?>

    </body>
</html>
