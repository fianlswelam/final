<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>

        <?php
        echo form_open('payment/addBank');

        echo "  من    دولار  لشلنات  ";
        echo "-----------------------------------------------------------------";
        echo "<br/>";
        echo "<br/>";

        echo "اقل  مبلغ ممكن ان  يحول فى المره الواحده  : ";
        echo form_input('min_amount_add');
        echo "<br/>";
        echo "<br/>";

        echo "  الضريبه : ";
        echo form_input('fees_pers_add');
        echo " + ";
        echo form_input('fees_dolar_add');

        echo "<br/>";
        echo "<br/>";
        echo "-----------------------------------------------------------------";
        echo "   من  شلنات   لدولارات   ";
        echo "-----------------------------------------------------------------";
        echo "<br/>";
        echo "<br/>";

        echo "اقل  مبلغ ممكن ان  يحول فى المره الواحده  : ";
        echo form_input('min_amount_add');
        echo "<br/>";
        echo "<br/>";

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
