<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 	
echo "the email has been sent<br /> <p> Please &nbsp; <a href='".base_url()."site/register_user/$key' >Click here</a> &nbsp; to confirm your account</p>";
		
	?>
    <a href="<?php echo base_url(); ?>site/register_user/<?php echo $key ;?>">تفعيل الحساب</a>
    
</body>
</html>