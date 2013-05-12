أسم الخدمة 
<?php $id = $this->uri->segment(3); ?>

<?php
$this->db->from('service');
$this->db->where('id', $id);
$query = $this->db->get();
if ($query->num_rows() > 0) {
    $rows = $query->result();
    foreach ($rows as $row) {
        
    }
}
echo form_open('site/confirm_order');
echo $row->name;
echo '</br>
هل انت متاكد من انك تريد شراء هذه الخدمة مقابل';
echo $row->price_point;
//echo form_input('order_id', $row->id);
//echo form_input('order_price', $row->price_point);
//echo form_hidden(array('name' => 'order_id', 'value' => $row->id));
?>
<input type="hidden" name="order_id" value="<?php echo $row->id; ?>"/> 
<input type="hidden" name="order_p" value="<?php echo $row->price_point; ?>" />
<input type="hidden" name="c_id" value="<?php echo $row->c_id; ?>" />
<input type="hidden" name="sc_id" value="<?php echo $row->sc_id; ?>" />
<input type="hidden" name="duration" value="<?php echo $row->duration; ?>" />
<?php
//echo form_hidden(array('name' => 'order_price', 'value' => $row->price_point));
echo form_submit(array('name' => 'submit', 'class' => "cta1"), 'تأكيد عملية الشراء');
echo form_close();
?>
<!--<a href="<?php echo base_url(); ?>site/order/<?php echo $row->id ?>">confirm</a>-->
