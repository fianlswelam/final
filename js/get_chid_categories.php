
<?php
include('dbcon.php');
if ($_REQUEST) {
    $id = $_REQUEST['parent_id'];
    $query = "select * from blog_sub_categ where b_c_id = " . $id;
    $results = mysql_query($query);
    ?>
<div class="control-group">
<label class="control-label" for="val_username">  القسم الفرعي </label>
<div class="controls">
<div class="input-prepend">
 <div class="both" style="margin-left:113px;">
 
    <select name="sub_category"  id="sub_category_id">
        <option value="none" selected="selected" >اختار القسم الفرعى</option>
        <?php
        while ($rows = mysql_fetch_assoc(@$results)) {
            ?>
            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
        <?php }
        ?>
    </select>	
</div>
<span class="add-on"><i class="icon-pushpin"></i></span>
</div>
</div>

</div>
    <?php
}
?>