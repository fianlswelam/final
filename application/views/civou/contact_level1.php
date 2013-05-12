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
		table{width:600px;margin:auto;border:2px;}
		table tr td{text-align:center;font-size:20px;} 
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
<table width="600" border="2">
<?php if(isset($contacts)){
	foreach($contacts as $contact){
	?>
  <tr>
    <td width="90%"><a href="<?php echo base_url();?>civou/c_sitead/contact_level2/<?php echo $contact->id?>"><?php echo $contact->mail; ?></a></td>
    <td>
	<?php if($contact->read == 0){ ?>
   <a href="<?php echo base_url();?>civou/c_sitead/contact_level2/<?php echo $contact->id?>">
    <img src="<?php echo base_url();?>images/incorrect.png" width="50" height="60" /></a>
	
	<?php }else{?>
       <a href="<?php echo base_url();?>civou/c_sitead/contact_level2/<?php echo $contact->id?>">
    <img src="<?php echo base_url();?>images/sa7.png" width="50" height="60" /><?php }?></a>
    
    </td>
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