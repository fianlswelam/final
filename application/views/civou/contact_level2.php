<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>لوحة الأدمن</title>
        <?php include 'tempelet/links.php'; ?>
    </head>
    <style type="text/css">
		h3{font-weight: bold;text-align: right;}
		table tr td a{color: #fff;text-align: right; font-family: cursive; color: #000;}
		table{width:790px;margin:auto;border:2px solid #000;margin-left:-200px;}
		table tr td{text-align:center;font-size:20px;border:2px solid #000;padding:10px;} 
		#message{width:600px;margin:auto;padding-top:60px;}
    </style>
    <body>

        <div id="wrapper">
            <!-- start of section top -->
            <section id="top">
                <div id="top-wrapp">
                    <?php include('tempelet/header.php'); ?>
                </div>
            </section>
            <?php include 'tempelet/news.php'; ?>

            <div id="content">
                <div id="left">
                    <div id="profile_half1">
                        
<div id="message">
<?php if(isset($error)){?><P style="float:right"><?php echo $error?> </P><?php }?>
<table  border="1">
<?php if(isset($contacts)){
	foreach($contacts as $contact){
	?>
     <tr>
    <td width="82%"><?php echo $contact->type?></td>
    <td>سبب المراسله</td>
  </tr>
  
  <tr>
    <td width="82%"><?php echo $contact->name?></td>
    <td width="18%">الاسم</td>
  </tr>
  <tr>
    <td width="82%"><?php echo $contact->mail?></td>
    <td>الايميل</td>
  </tr>
 
  <tr>
    <td width="82%"><?php echo $contact->message?></td>
    <td>الرساله</td>
  </tr>
  <?php }} ?>
</table>
</div>
                    </div>
                </div>
                <div id="right">
                    <?php include 'tempelet/menu.php'; ?>
                    <div id="clear"></div>
                    <?php include 'tempelet/serv_block.php'; ?>
                </div>
            </div>
            <?php include('tempelet/footer.php') ?>
        </div>
    </body>
</html>