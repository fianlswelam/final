<?php 
header('Content-Type: text/xml');  
echo '<?xml version="1.0" encoding="UTF-8"?>' ;?>

<rss version="2.0">  
<channel>  
<title>Shelinat rss feeds</title>  
<description>sheleinat.com</description>  
<link><?php echo base_url();?></link>
 <?php
//                        $this->load->model('sitead');
                    $this->db->order_by("date", "desc"); 
                    if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {
                        $c_id = $this->uri->segment(3);
                        $sc_id = $this->uri->segment(4);
                        $this->db->from('topic');
                        $this->db->where('statue', '1');
                        $this->db->where('sc_id', $sc_id);
                        $query = $this->db->get();
                    } else if ($this->uri->segment(3) != '') {
                        $c_id = (int) $this->uri->segment(3);
                        $this->db->from('topic');
                        $this->db->where('c_id', $c_id);
                        $this->db->where('statue', '1');
                        $query = $this->db->get();
                    } else {
                        $this->db->where('statue', '1');
                        $query = $this->db->get('topic');
                    }
					
                    if (isset($query)) {
                        if ($query->num_rows() > 0) {
                            $rows = $query->result();
                            $flag = 0;
                            //<!----------------------------------------------------------> 
                            foreach ($rows as $row) { ?>
                                <item>
                                <title><?php echo $row->title; ?></title>
                                <description><?php echo substr($row->content, 0, 190); ?></description>
                                <link><?php echo base_url(); ?>/site/blog_details/<?php echo $row->id . '/' . $row->c_id; ?></link>
                                <pubDate><?php echo $row->date; ?></pubDate>
                                </item>
                                
                                <?php }}}?>

</channel>  
</rss>  