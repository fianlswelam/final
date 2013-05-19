<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        
        <?php
       
        echo form_open('payment/showAllBankDetail');
        echo "اسم البنك ";
        ?>
        
        <select name="bankname">
            <option> payza </option>
            <option> paypal </option>
        </select>
        
        <?php
        echo form_submit('submit', 'عرض ');
          ?>
    </body>
</html>
